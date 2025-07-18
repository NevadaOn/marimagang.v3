<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengajuan;
use App\Exports\UserExport;
use App\Exports\PengajuanExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function statistik()
    {
        $totalPengguna = User::count();
        $totalPengajuan = Pengajuan::count();
        $pengajuanDisetujui = Pengajuan::where('status', 'disetujui')->count();
        $pengajuanDitolak = Pengajuan::where('status', 'ditolak')->count();

        return view('admin.reports.statistik', compact(
            'totalPengguna',
            'totalPengajuan',
            'pengajuanDisetujui',
            'pengajuanDitolak'
        ));
    }

    public function pengajuan()
    {
        $pengajuan = Pengajuan::with(['user', 'databidang'])->latest()->get();
        return view('admin.reports.pengajuan', compact('pengajuan'));
    }

    public function users()
    {
        $users = User::withCount('pengajuan')->latest()->get();
        return view('admin.reports.users', compact('users'));
    }

    public function exportPengajuan()
    {
        return Excel::download(new PengajuanExport, 'laporan_pengajuan.xlsx');
    }

    public function exportUsers()
    {
        return Excel::download(new UserExport, 'laporan_pengguna.xlsx');
    }
}
