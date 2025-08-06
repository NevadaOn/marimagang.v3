<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use App\Models\Databidang;
use App\Models\PengajuanDocument;
use App\Models\Anggota;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    private function hasActivePengajuan($userId)
    {
        $inactiveStatuses = ['ditolak', 'selesai', 'dibatalkan'];

        return Pengajuan::where('user_id', $userId)
            ->whereNotIn('status', $inactiveStatuses)
            ->exists();
    }

    public function index()
    {
        $user = auth()->user();

        $pengajuan = Pengajuan::with([
                'databidang',
                'documents',
                'user',
                'anggota'
            ])
            ->where('user_id', $user->id)
            ->get()
            ->unique('id');

        foreach ($pengajuan as $item) {
            $requiredDocuments = ['surat_pengantar', 'proposal'];
            $uploadedTypes = $item->documents->pluck('document_type')->toArray();
            $missingDocuments = array_diff($requiredDocuments, $uploadedTypes);

            $item->dokumen_lengkap = empty($missingDocuments);
            $item->status_lengkap = $item->dokumen_lengkap;
        }

        $pengajuanAktif = $pengajuan->first(fn($p) => !in_array($p->status, ['ditolak', 'selesai', 'dibatalkan']));
        $statusAktif = $pengajuanAktif?->status;

        $hasUniversityInfo = $user->universitas_id && $user->telepon && $user->nim;
        $hasValidSkills = $user->userSkills->isNotEmpty() &&
            $user->userSkills->every(fn($us) => $us->skill && $us->skill->nama && $us->level);

        $completionLevel = 'incomplete';
        if ($hasUniversityInfo && !$hasValidSkills) {
            $completionLevel = 'profile-complete';
        } elseif ($hasUniversityInfo && $hasValidSkills) {
            $completionLevel = 'skills-complete';
        }

        return view('pengajuan.index', compact(
            'pengajuan',
            'statusAktif',
            'completionLevel',
            'user'
        ));
    }

    public function tipe()
    {
        if ($this->hasActivePengajuan(auth()->id())) {
            return redirect()->route('dashboard')
                ->with('error', 'Anda sudah memiliki pengajuan aktif atau undangan yang belum direspon.');
        }

        return view('pengajuan.tipe');
    }

    public function selectType(Request $request)
    {
        if ($this->hasActivePengajuan(auth()->id())) {
            return redirect()->route('dashboard')
                ->with('error', 'Anda sudah memiliki pengajuan aktif atau undangan yang belum direspon.');
        }

        $request->validate([
            'tipe' => 'required|in:mandiri,kelompok',
        ]);

        session(['pengajuan_tipe' => $request->tipe]);

        return redirect()->route('pengajuan.create');
    }

    public function create()
    {
        if ($this->hasActivePengajuan(auth()->id())) {
            return redirect()->route('dashboard')
                ->with('error', 'Anda sudah memiliki pengajuan aktif atau undangan yang belum direspon.');
        }

        $tipe = session('pengajuan_tipe', 'mandiri');
        $bidang = Databidang::all();

        return view('pengajuan.create', compact('bidang', 'tipe'));
    }

    public function store(Request $request)
    {
        if ($this->hasActivePengajuan(auth()->id())) {
            return redirect()->route('dashboard')
                ->with('error', 'Anda sudah memiliki pengajuan aktif atau undangan yang belum direspon.');
        }

        $tipe = session('pengajuan_tipe', 'mandiri');

        $request->validate([
            'databidang_id' => 'required|exists:databidang,id',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',

            'dokumen.surat_pengantar' => 'required|file|mimes:pdf|max:2048',
            'dokumen.proposal' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($tipe === 'kelompok') {
            $request->validate([
                'anggota' => 'required|array|min:1',
                'anggota.*.nama' => 'required|string|max:100',
                'anggota.*.nim' => 'required|string|max:20',
                'anggota.*.skill' => 'nullable|string',
                'anggota.*.email' => 'nullable|email',
                'anggota.*.no_hp' => 'nullable|string|max:20',
            ]);
        }

        $kode = 'MGG-' . date('Y') . '-' . strtoupper(Str::random(6));

        $pengajuan = Pengajuan::create([
            'user_id' => auth()->id(),
            'databidang_id' => $request->databidang_id,
            'kode_pengajuan' => $kode,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => 'diproses'
        ]);

        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $tipeDokumen => $file) {
                $path = $file->store('dokumen_pengajuan');

                PengajuanDocument::create([
                    'pengajuan_id' => $pengajuan->id,
                    'document_type' => $tipeDokumen,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'file_size' => $file->getSize(),
                    'uploaded_at' => now(),
                ]);
            }
        }

        if ($tipe === 'kelompok') {
            Anggota::create([
                'pengajuan_id' => $pengajuan->id,
                'nama' => auth()->user()->nama,
                'nim' => auth()->user()->nim,
                'universitas' => auth()->user()->universitas->nama_universitas ?? null,
                'prodi' => auth()->user()->prodi,
                'fakultas' => auth()->user()->fakultas,
                'email' => auth()->user()->email,
                'no_hp' => auth()->user()->telepon,
                'role' => 'ketua',
                'skill' => null, 
            ]);

            foreach ($request->anggota as $anggota) {
                Anggota::create([
                    'pengajuan_id' => $pengajuan->id,
                    'nama' => $anggota['nama'],
                    'nim' => $anggota['nim'],
                    'skill' => $anggota['skill'] ?? null,
                    'universitas' => auth()->user()->universitas->nama_universitas ?? null,
                    'prodi' => auth()->user()->prodi,
                    'fakultas' => auth()->user()->fakultas,
                    'email' => $anggota['email'] ?? null,
                    'no_hp' => $anggota['no_hp'] ?? null,
                    'role' => 'anggota',
                ]);
            }
        }

        $this->notificationService->internshipSubmitted(auth()->id(), $pengajuan->id);

        session()->forget('pengajuan_tipe');

        return redirect()->route('dashboard')
            ->with('success', 'Pengajuan berhasil dibuat dengan kode: ' . $kode);
    }

    public function show(Pengajuan $pengajuan)
    {
        $this->authorize('view', $pengajuan);

        $pengajuan->load(['databidang', 'anggota.user', 'userSkills.skill', 'documents', 'logbooks']);

        return view('pengajuan.show', compact('pengajuan'));
    }

    public function editAnggota(Pengajuan $pengajuan)
    {
        $this->authorize('update', $pengajuan);

        return view('pengajuan.edit_anggota', compact('pengajuan'));
    }

    public function storeAnggota(Request $request, Pengajuan $pengajuan)
    {
        $this->authorize('update', $pengajuan);

        $request->validate([
            'anggota' => 'required|array|min:1',
            'anggota.*.nama' => 'required|string|max:100',
            'anggota.*.nim' => 'required|string|max:20',
            'anggota.*.skill' => 'nullable|string',
            'anggota.*.email' => 'nullable|email',
            'anggota.*.no_hp' => 'nullable|string|max:20',
        ]);

        foreach ($request->anggota as $anggota) {
            Anggota::create([
                'pengajuan_id' => $pengajuan->id,
                'nama' => $anggota['nama'],
                'nim' => $anggota['nim'],
                'skill' => $anggota['skill'] ?? null,
                'universitas' => auth()->user()->universitas->nama_universitas ?? null,
                'prodi' => auth()->user()->prodi,
                'fakultas' => auth()->user()->fakultas,
                'email' => $anggota['email'] ?? null,
                'no_hp' => $anggota['no_hp'] ?? null,
                'status' => 'diproses',
                'role' => 'anggota',
            ]);
        }

        return redirect()->route('pengajuan.show', $pengajuan)
            ->with('success', 'Anggota berhasil ditambahkan.');
    }
    public function batal($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        if ($pengajuan->user_id !== auth()->id()) {
            abort(403);
        }

        $pengajuan->status = 'dibatalkan';
        $pengajuan->save();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dibatalkan.');
    }

    public function edit($kode_pengajuan)
    {
        $pengajuan = Pengajuan::where('kode_pengajuan', $kode_pengajuan)
            ->with(['documents', 'anggota'])
            ->firstOrFail();

        return view('pengajuan.edit', compact('pengajuan'));
    }

   public function update(Request $request, $kode_pengajuan)
    {
        $pengajuan = Pengajuan::where('kode_pengajuan', $kode_pengajuan)->firstOrFail();

        $request->validate([
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'dokumen.*' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $pengajuan->update([
            'deskripsi' => $request->deskripsi ?? $pengajuan->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $type => $file) {
                $old = $pengajuan->documents()->where('document_type', $type)->first();
                if ($old) {
                    Storage::delete($old->file_path);
                    $old->delete();
                }

                $path = $file->store('dokumen_pengajuan');

                $pengajuan->documents()->create([
                    'document_type' => $type,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'file_size' => $file->getSize(),
                    'uploaded_at' => now(),
                ]);
            }
        }

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diperbarui.');
    }

public function downloadDocumentUser($id, $filename)
{
    // Pastikan hanya user yang sesuai yang bisa akses
    $pengajuan = Pengajuan::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

    $document = $pengajuan->documents()
        ->where('file_name', $filename)
        ->firstOrFail();

    if (!Storage::exists($document->file_path)) {
        abort(404, 'File tidak ditemukan');
    }

    return Storage::download($document->file_path);
}


}