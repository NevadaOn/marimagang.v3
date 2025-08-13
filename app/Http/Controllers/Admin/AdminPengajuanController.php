<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\PengajuanDocument;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengajuanDiterimaMail;
use App\Models\User;


class AdminPengajuanController extends Controller
{
    public function index()
    {
        $status = request('status');
        $query = Pengajuan::query();
        if ($status) {
            $query->where('status', $status);
        }
        $pengajuan = $query->latest()->paginate(10);
        return view('admin.pengajuan.index', compact('pengajuan'));
    }
    public function dinas()
    {
        $pengajuan = Pengajuan::with(['user','anggota', 'databidang'])
        ->latest()
        ->paginate(10);
        return view('admin.pengajuan.dinas', compact('pengajuan'));
    }
    public function bidang()
    {
        $pengajuan = Pengajuan::with(['user','anggota', 'databidang'])
        ->latest()
        ->paginate(10);
        return view('admin.pengajuan.bidang', compact('pengajuan'));
    }
    public function showbidang($id)
    {
        $pengajuan = Pengajuan::with([
            'user.userSkills.skill',
            'anggota',
            'documents',
            'databidang'
        ])->findOrFail($id);

        $listBidang = \App\Models\Databidang::all();

        return view('admin.pengajuan.showbidang', compact('pengajuan', 'listBidang'));
    }

    public function showdinas($id)
    {
        $pengajuan = Pengajuan::with([
            'user.userSkills.skill',
            'anggota',
            'documents',
            'databidang'
        ])->findOrFail($id);

        $listBidang = \App\Models\Databidang::all();

        return view('admin.pengajuan.showdinas', compact('pengajuan', 'listBidang'));
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with([
            'user.userSkills.skill',
            'anggota',
            'documents',
            'databidang'
        ])->findOrFail($id);

        $listBidang = \App\Models\Databidang::all();

        return view('admin.pengajuan.show', compact('pengajuan', 'listBidang'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diproses,diteruskan,diterima,ditolak',
            'catatan_admin' => 'nullable|string',
            'kirim_email' => 'nullable|boolean',
            'lampirkan_surat_pdf' => 'nullable|boolean',
            'lampirkan_form_kesediaan' => 'nullable|boolean',
            'kirim_notifikasi' => 'nullable|boolean',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $admin = auth()->guard('admin')->user();

        $statusLama = $pengajuan->status;
        $statusBaru = $request->status;

        $pengajuan->status = $statusBaru;
        $pengajuan->save();

        if ($statusBaru === 'diterima' && $request->kirim_email) {
            $attachments = [];
            if ($request->lampirkan_surat_pdf && $pengajuan->surat_pdf) {
                $attachments[] = storage_path('app/public/' . $pengajuan->surat_pdf);
            }
            if ($request->lampirkan_form_kesediaan && $pengajuan->form_kesediaan_magang) {
                $attachments[] = storage_path('app/public/' . $pengajuan->form_kesediaan_magang);
            }
            foreach ($pengajuan->anggota as $anggota) {
                if ($anggota->email) {
                    Mail::to($anggota->email)->send(new PengajuanDiterimaMail($anggota, $pengajuan, $request->catatan_admin, $attachments));
                }
            }
            if ($pengajuan->user && $pengajuan->user->email) {
                Mail::to($pengajuan->user->email)->send(new PengajuanDiterimaMail($pengajuan->user, $pengajuan, $request->catatan_admin, $attachments));
            }
        }

        if ($statusBaru === 'diterima' && $request->kirim_notifikasi) {
            Notification::create([
                'user_id' => $pengajuan->user_id,
                'title' => 'Pengajuan Diterima',
                'message' => $request->catatan_admin,
                'type' => 'catatan_pengajuan',
                'data' => json_encode([
                    'pengajuan_id' => $pengajuan->id,
                    'dari_admin' => $admin->name ?? 'Admin'
                ]),
                'is_read' => 0,
            ]);
        }

        return back()->with('success', 'Status pengajuan diperbarui.');
    }

    private function sendDiterimaNotifAndEmail(Pengajuan $pengajuan, $statusLama, $catatanAdmin = null)
    {
        $anggotaList = $pengajuan->anggota;

        foreach ($anggotaList as $anggota) {
            if ($anggota->email) {
                Mail::to($anggota->email)->send(new PengajuanDiterimaMail($anggota, $pengajuan, $catatanAdmin));
            }
        }

        if ($pengajuan->user && $pengajuan->user->email) {
            Mail::to($pengajuan->user->email)->send(new PengajuanDiterimaMail($pengajuan->user, $pengajuan, $catatanAdmin));
        }
    }

    public function updateTanggal(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $admin = auth()->guard('admin')->user();

        if (!in_array($admin->role, ['superadmin', 'admin_bidang'])) {
            return back()->with('error', 'Anda tidak memiliki izin untuk memperbarui tanggal.');
        }

        $pengajuan->tanggal_mulai = $request->tanggal_mulai;
        $pengajuan->tanggal_selesai = $request->tanggal_selesai;
        $pengajuan->save();

        return back()->with('success', 'Tanggal magang berhasil diperbarui.');
    }

    public function updateBidang(Request $request, $id)
    {
        $request->validate([
            'databidang_id' => 'required|exists:databidang,id',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $admin = auth()->guard('admin')->user();

        if (!in_array($admin->role, ['superadmin', 'admin_dinas'])) {
            return back()->with('error', 'Anda tidak memiliki izin untuk mengubah bidang.');
        }

        $pengajuan->databidang_id = $request->databidang_id;
        $pengajuan->save();

        return back()->with('success', 'Bidang pengajuan berhasil diperbarui.');
    }

    public function kirimCatatan(Request $request, $id)
    {
        $request->validate([
            'tujuan' => 'required|in:user,admin_bidang',
            'komentar_admin' => 'required|string',
        ]);

        $pengajuan = Pengajuan::with('anggota')->findOrFail($id);
        $admin = auth()->guard('admin')->user();
        $message = $request->komentar_admin;
        $title = 'Catatan dari Admin';

        if ($request->tujuan === 'admin_bidang') {
            $pengajuan->komentar_admin = $message;
            $pengajuan->save();

            return back()->with('success', 'Komentar berhasil dikirim ke Admin Bidang.');
        }

        Notification::create([
            'user_id' => $pengajuan->user_id,
            'title' => $title,
            'message' => $message,
            'type' => 'catatan_pengajuan',
            'data' => json_encode([
                'pengajuan_id' => $pengajuan->id,
                'dari_admin' => $admin->name ?? 'Admin'
            ]),
            'is_read' => 0,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim ke user pengaju.');
    }


    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'disetujui';
        $pengajuan->save();

        return back()->with('success', 'Pengajuan disetujui.');
    }

    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'ditolak';
        $pengajuan->save();

        return back()->with('danger', 'Pengajuan ditolak.');
    }

    public function downloadDocument($id, $filename)
    {
        $document = PengajuanDocument::where('pengajuan_id', $id)
            ->where('file_name', $filename)
            ->firstOrFail();

        return Storage::download($document->file_path);
    }
    public function uploadSurat(Request $request, $id)
    {
        $request->validate([
            'surat_pdf' => 'nullable|mimes:pdf|max:2048',
            'komentar_admin' => 'nullable|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        if ($request->hasFile('surat_pdf')) {
            $file = $request->file('surat_pdf');
            $filename = 'surat_' . $pengajuan->kode_pengajuan . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('surat_pengajuan', $filename, 'public'); // disimpan di storage/app/public/surat_pengajuan/

            $pengajuan->surat_pdf = $path;
        }

        $pengajuan->komentar_admin = $request->komentar_admin;
        $pengajuan->save();

        return redirect()->back()->with('success', 'Surat dan komentar berhasil disimpan.');
    }
            
    public function generateSurat(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required|string',
            'nip_penanggung_jawab' => 'required|string',
            'nama_penanggung_jawab' => 'required|string',
            'jabatan_penanggung_jawab' => 'required|string',
            'nama_kegiatan' => 'required|string',
        ]);

        $pengajuan = Pengajuan::with('user')->findOrFail($id);

        $penanggungJawab = [
            'nama' => $request->nama_penanggung_jawab,
            'jabatan' => $request->jabatan_penanggung_jawab,
            'nip' => $request->nip_penanggung_jawab,
        ];


        $pdf = Pdf::loadView('surat.template', [
            'pengajuan' => $pengajuan,
            'nomorSurat' => $request->nomor_surat,
            'penanggungJawab' => [
                'nama' => $request->nama_penanggung_jawab,
                'jabatan' => $request->jabatan_penanggung_jawab,
                'nip' => $request->nip_penanggung_jawab,
            ],
            'namaKegiatan' => $request->nama_kegiatan,
        ]);


        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'timesnewroman',
        ]);

        $filename = 'surat_' . $pengajuan->kode_pengajuan . '.pdf';
        $path = 'surat_pengajuan/' . $filename;

        Storage::disk('public')->put($path, $pdf->output());

        $pengajuan->surat_pdf = $path;
        $pengajuan->save();

        return back()->with('success', 'Surat berhasil dibuat dan disimpan.');
    }

    public function generateSuratKesediaan(Request $request, $id)
    {
        $request->validate([
            'penanggung_jawab' => 'required|string|max:255',
            'nama_project' => 'required|string|max:255', 
            'koordinator' => 'required|string|max:255',
        ]);

        $pengajuan = Pengajuan::with(['databidang', 'user'])->findOrFail($id);
        $admin = auth('admin')->user();

        if (!(
            ($admin->role === 'admin_bidang' && $pengajuan->databidang->admin_id === $admin->id) ||
            $admin->role === 'superadmin'
        )) {
            abort(403, 'Anda tidak memiliki akses membuat surat ini.');
        }

        $pdf = Pdf::loadView('surat.template-kesediaan-bidang', [
            'pengajuan' => $pengajuan,
            'project' => $request->nama_project,
            'penanggung_jawab' => $request->penanggung_jawab,
            'koordinator' => $request->koordinator,
            'tanggal' => now()->format('d F Y'),
            'admin' => $admin,
        ]);

        $filename = 'form_kesediaan_' . $pengajuan->kode_pengajuan . '.pdf';
        $path = 'surat_pengajuan/' . $filename;

        Storage::disk('public')->put($path, $pdf->output());

        $pengajuan->form_kesediaan_magang = $path;
        $pengajuan->save();

        return back()->with('success', 'Form kesediaan berhasil dibuat dan disimpan.');
    }
    public function markFinalAsRead()
{
    Pengajuan::whereIn('status', ['diterima', 'ditolak'])
        ->whereNull('admin_read_at')
        ->update(['admin_read_at' => now()]);

    return back()->with('success', 'Notifikasi pengajuan final telah ditandai sudah dibaca.');
}

}