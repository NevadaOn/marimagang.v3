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
        $totalUniversitas = \App\Models\Universitas::selectRaw('TRIM(LOWER(nama_universitas)) as nama_unik')
            ->groupBy('nama_unik')
            ->get()
            ->count();

        // Top 5 Universitas
        // $universitasTerbanyak = Universitas::withCount('users')
        //     ->orderByDesc('users_count')
        //     ->take(5)
        //     ->get();

        $pengajuanPerBidang = Pengajuan::where('status', 'magang')
            ->with('databidang')
            ->get()
            ->groupBy('databidang.nama')
            ->map(function($items, $nama) {
                return [
                    'databidang' => (object)['nama' => $nama],
                    'total' => $items->count()
                ];
            })->values();

        return view('welcome', compact(
            'bidangs',
            'totalUsers',
            'totalPengajuan',
            'totalBidang',
            'totalUniversitas',
            // 'universitasTerbanyak',
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
