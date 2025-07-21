<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\PengajuanDocument;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminPengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::with(['user', 'anggota', 'databidang'])->latest()->get();
        return view('admin.pengajuan.index', compact('pengajuan'));
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with([
            'user.userSkills.skill',
            'anggota.user.userSkills.skill',
            'documents',
            'databidang'
        ])->findOrFail($id);

        $listBidang = \App\Models\Databidang::all();

        return view('admin.pengajuan.show', compact('pengajuan', 'listBidang'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,diteruskan,diterima,ditolak',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $admin = auth()->guard('admin')->user();

        $statusLama = $pengajuan->status;
        $statusBaru = $request->status;

        if ($admin->role === 'superadmin') {
            $pengajuan->status = $statusBaru;
            $pengajuan->save();
            return back()->with('success', 'Status pengajuan diperbarui oleh superadmin.');
        }

        if ($admin->role === 'admin_dinas') {
            if ($statusLama === 'pending' && in_array($statusBaru, ['diteruskan', 'ditolak'])) {
                $pengajuan->status = $statusBaru;
                $pengajuan->save();
                return back()->with('success', 'Status pengajuan diperbarui oleh admin dinas.');
            } else {
                return back()->with('error', 'Admin dinas hanya bisa memproses pengajuan dari status pending.');
            }
        }

        if ($admin->role === 'admin_bidang') {
            if ($statusLama === 'diteruskan' && in_array($statusBaru, ['diproses', 'diterima', 'ditolak'])) {
                $pengajuan->status = $statusBaru;
                $pengajuan->save();
                return back()->with('success', 'Status pengajuan diperbarui oleh admin bidang.');
            } else {
                return back()->with('error', 'Admin bidang hanya bisa memproses pengajuan dari status diteruskan.');
            }
        }

        return back()->with('error', 'Anda tidak memiliki izin untuk mengubah status ini.');
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



}
