<?php
namespace App\Http\Controllers;


use App\Models\Databidang;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Universitas;

class BidangController extends Controller
{
    public function index()
    {
        $bidangs = Databidang::where('status', 'buka')->get();
        $totalUsers = User::count();
        $totalPengajuan = Pengajuan::count();
        $totalBidang = Databidang::count();
        $totalUniversitas = Universitas::count();

        // Top 5 Universitas
        $universitasTerbanyak = Universitas::withCount('users')
            ->orderByDesc('users_count')
            ->take(5)
            ->get();

        // Bar Chart: Jumlah pengajuan per bidang
        $pengajuanPerBidang = Pengajuan::selectRaw('COUNT(*) as total, databidang_id')
            ->groupBy('databidang_id')
            ->orderByDesc('total')
            ->with('databidang:id,nama')
            ->take(5)
            ->get();

        return view('welcome', compact(
            'bidangs',
            'totalUsers',
            'totalPengajuan',
            'totalBidang',
            'totalUniversitas',
            'universitasTerbanyak',
            'pengajuanPerBidang'
        ));
    }

    public function show($slug)
    {
        $bidang = Databidang::where('slug', $slug)
            ->with(['admin', 'skills', 'pengajuan'])
            ->firstOrFail();

        return view('bidang.show', compact('bidang'));
    }

}
