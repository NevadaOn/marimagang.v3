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

class PengajuanController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    private function hasActivePengajuan($userId)
    {
        return Pengajuan::where('user_id', $userId)
            ->whereNotIn('status', ['ditolak', 'selesai'])
            ->exists();
    }


    public function index()
    {
        $user = auth()->user();

        $pengajuan = Pengajuan::with([
                'databidang',
                'anggota.user',
                'documents',
                'user',
            ])
            ->where('user_id', $user->id)
            ->orWhereHas('anggota', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get()
            ->unique('id');

        foreach ($pengajuan as $item) {
            $requiredDocuments = ['surat_pengantar', 'proposal'];
            $uploadedTypes = $item->documents->pluck('document_type')->toArray();
            $missingDocuments = array_diff($requiredDocuments, $uploadedTypes);

            $item->dokumen_lengkap = empty($missingDocuments);

            $item->total_anggota = $item->anggota->count();
            $item->anggota_pending = $item->anggota->where('status', 'pending')->count();
            $item->semua_anggota_accepted = $item->anggota->where('status', 'pending')->isEmpty();
            $item->status_lengkap = $item->dokumen_lengkap && $item->semua_anggota_accepted;
        }

        $pengajuanAktif = $pengajuan->first(fn($p) => !in_array($p->status, ['ditolak', 'selesai']));
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
            'completionLevel', 'user'
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
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',

            'dokumen.surat_pengantar' => 'required|file|mimes:pdf|max:2048',
            'dokumen.proposal' => 'required|file|mimes:pdf|max:2048',

            'user_ids' => $tipe === 'kelompok' ? 'required|array' : 'nullable|array',
            'user_ids.*' => $tipe === 'kelompok' ? 'exists:users,id' : 'nullable|exists:users,id',
            'roles' => $tipe === 'kelompok' ? 'required|array' : 'nullable|array',
            'roles.*' => $tipe === 'kelompok' ? 'in:ketua,anggota' : 'nullable|in:ketua,anggota',
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
            'status' => 'pending'
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
            // Ketua (pengusul)
            Anggota::create([
                'pengajuan_id' => $pengajuan->id,
                'nama' => auth()->user()->name,
                'nim' => auth()->user()->nim,
                'universitas' => auth()->user()->universitas->nama ?? null,
                'prodi' => auth()->user()->prodi,
                'fakultas' => auth()->user()->fakultas,
                'email' => auth()->user()->email,
                'no_hp' => auth()->user()->telepon,
                'status' => 'accepted',
                'role' => 'ketua',
            ]);

            // Anggota lainnya (input manual)
            if ($request->has('anggota')) {
                foreach ($request->anggota as $anggota) {
                    Anggota::create([
                        'pengajuan_id' => $pengajuan->id,
                        'nama' => $anggota['nama'],
                        'nim' => $anggota['nim'],
                        'skill' => $anggota['skill'] ?? null,
                        'universitas' => auth()->user()->universitas->nama ?? null,
                        'prodi' => auth()->user()->prodi,
                        'fakultas' => auth()->user()->fakultas,
                        'email' => $anggota['email'] ?? null,
                        'no_hp' => $anggota['no_hp'] ?? null,
                        'role' => 'anggota',
                        'status' => 'pending',
                    ]);
                }
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
                'universitas' => auth()->user()->universitas->nama ?? null,
                'prodi' => auth()->user()->prodi,
                'fakultas' => auth()->user()->fakultas,
                'email' => $anggota['email'] ?? null,
                'no_hp' => $anggota['no_hp'] ?? null,
                'status' => 'pending',
                'role' => 'anggota',
            ]);
        }

        return redirect()->route('pengajuan.show', $pengajuan)
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

}