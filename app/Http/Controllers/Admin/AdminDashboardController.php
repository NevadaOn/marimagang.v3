<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\User;
use App\Models\Databidang;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $admin = auth()->guard('admin')->user();

        return match ($admin->role) {
            'superadmin'    => $this->superAdminDashboard(),
            'admin_bidang'  => $this->adminBidangDashboard($admin),
            'admin_dinas'   => $this->adminDinasDashboard(),
            default         => abort(403),
        };

    }

    private function superAdminDashboard()
    {
        $totalPengajuan = Pengajuan::count();
        $pengajuanPending = Pengajuan::where('status', 'diproses')->count();
        $pengajuanDiterima = Pengajuan::where('status', 'diterima')->count();
        $pengajuanDitolak = Pengajuan::where('status', 'ditolak')->count();
        $totalUser = User::count();
        $totalBidang = Databidang::count();

        $pengajuanPerBidang = DB::table('pengajuan')
            ->join('databidang', 'pengajuan.databidang_id', '=', 'databidang.id')
            ->select(
                'databidang.nama',
                DB::raw('COUNT(pengajuan.id) as total_pengajuan'),
                DB::raw('COUNT(CASE WHEN pengajuan.status = "diproses" THEN 1 END) as diproses'),
                DB::raw('COUNT(CASE WHEN pengajuan.status = "diterima" THEN 1 END) as diterima'),
                DB::raw('COUNT(CASE WHEN pengajuan.status = "ditolak" THEN 1 END) as ditolak')
            )
            ->groupBy('databidang.id', 'databidang.nama')
            ->orderByDesc('total_pengajuan')
            ->get();

        $userTerbaru = User::with('universitas')->latest()->paginate(5);
        $pengajuanTerbaru = Pengajuan::with(['user', 'databidang'])->latest()->take(10)->get();

        $statusDokumen = DB::table('pengajuan_documents')
            ->selectRaw("
                COUNT(DISTINCT CASE WHEN document_type = 'surat_pengantar' THEN pengajuan_id END) AS ada_surat_pengantar,
                COUNT(DISTINCT CASE WHEN document_type = 'proposal' THEN pengajuan_id END) AS ada_proposal
            ")
            ->first();

        $userPerUniversitas = DB::table('users')
            ->join('universitas', 'users.universitas_id', '=', 'universitas.id')
            ->select('universitas.nama_universitas', DB::raw('COUNT(users.id) as total_user'))
            ->groupBy('universitas.nama_universitas')
            ->orderByDesc('total_user')
            ->take(5)
            ->get();

        $statistikBulanan = Pengajuan::select(
            DB::raw('YEAR(created_at) as tahun'),
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();

        return view('admin.dashboard', compact(
            'totalPengajuan',
            'pengajuanPending',
            'pengajuanDiterima',
            'pengajuanDitolak',
            'totalUser',
            'totalBidang',
            'pengajuanPerBidang',
            'userTerbaru',
            'pengajuanTerbaru',
            'statusDokumen',
            'userPerUniversitas',
            'statistikBulanan'
        ));
    }

    private function adminBidangDashboard($admin)
    {
        $bidang = Databidang::where('admin_id', $admin->id)->first();

        if (!$bidang) {
            return view('admin.dashboard-bidang', [
                'bidang' => null,
                'totalPengajuan' => 0,
                'pengajuanPending' => 0,
                'pengajuanDiterima' => 0,
                'pengajuanDitolak' => 0,
                'userPengajuan' => collect(),
                'statusDokumen' => (object)[
                    'ada_surat_pengantar' => 0,
                    'ada_proposal' => 0
                ],
                'pengajuanTerbaru' => collect(),
                'userPerUniversitas' => collect(),
                'statistikBulanan' => collect()
            ]);
        }

        $totalPengajuan = Pengajuan::where('databidang_id', $bidang->id)->count();
        $pengajuanPending = Pengajuan::where('databidang_id', $bidang->id)->where('status', 'diproses')->count();
        $pengajuanDiterima = Pengajuan::where('databidang_id', $bidang->id)->where('status', 'diterima')->count();
        $pengajuanDitolak = Pengajuan::where('databidang_id', $bidang->id)->where('status', 'ditolak')->count();

        $userPengajuan = DB::table('pengajuan')
            ->join('users', 'pengajuan.user_id', '=', 'users.id')
            ->join('universitas', 'users.universitas_id', '=', 'universitas.id')
            ->where('pengajuan.databidang_id', $bidang->id)
            ->select(
                'users.*',
                'universitas.nama_universitas',
                'pengajuan.status',
                'pengajuan.created_at as tanggal_pengajuan',
                'pengajuan.id as pengajuan_id'
            )
            ->orderByDesc('pengajuan.created_at')
            ->get();

        $statusDokumen = DB::table('pengajuan_documents')
            ->join('pengajuan', 'pengajuan_documents.pengajuan_id', '=', 'pengajuan.id')
            ->selectRaw("
                COUNT(CASE WHEN pengajuan_documents.document_type = 'surat_pengantar' THEN 1 END) AS ada_surat_pengantar,
                COUNT(CASE WHEN pengajuan_documents.document_type = 'proposal' THEN 1 END) AS ada_proposal
            ")
            ->where('pengajuan.databidang_id', $bidang->id)
            ->first();

        $pengajuanTerbaru = Pengajuan::with(['user', 'databidang'])
            ->where('databidang_id', $bidang->id)
            ->latest()
            ->take(5)
            ->get();

        $userPerUniversitas = DB::table('pengajuan')
            ->join('users', 'pengajuan.user_id', '=', 'users.id')
            ->join('universitas', 'users.universitas_id', '=', 'universitas.id')
            ->where('pengajuan.databidang_id', $bidang->id)
            ->select('universitas.nama_universitas', DB::raw('COUNT(pengajuan.id) as total_pengajuan'))
            ->groupBy('universitas.id', 'universitas.nama_universitas')
            ->orderByDesc('total_pengajuan')
            ->get();

        $statistikBulanan = Pengajuan::where('databidang_id', $bidang->id)
            ->select(
                DB::raw('YEAR(created_at) as tahun'),
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();

        $bidangStats = Databidang::withCount(['pengajuan as total_pengajuan' => function ($q) {
            $q->where('status', '!=', 'draft'); // atau hilangkan if ingin semua pengajuan
        }])->get();

                    
        return view('admin.dashboard-bidang', compact(
            'bidang',
            'totalPengajuan',
            'pengajuanPending',
            'pengajuanDiterima',
            'pengajuanDitolak',
            'userPengajuan',
            'statusDokumen',
            'pengajuanTerbaru',
            'userPerUniversitas',
            'statistikBulanan',
            'bidangStats'
        ));
    }

    private function adminDinasDashboard()
    {
        $totalPengajuan = Pengajuan::count();
        $pengajuanPending = Pengajuan::where('status', 'diproses')->count();
        $pengajuanDiterima = Pengajuan::where('status', 'diterima')->count();
        $pengajuanDitolak = Pengajuan::where('status', 'ditolak')->count();

        $pengajuanTerbaru = Pengajuan::with(['user', 'databidang'])->latest()->take(10)->get();

        $userPerUniversitas = DB::table('users')
            ->join('universitas', 'users.universitas_id', '=', 'universitas.id')
            ->select('universitas.nama_universitas', DB::raw('COUNT(users.id) as total_user'))
            ->groupBy('universitas.id', 'universitas.nama_universitas')
            ->orderByDesc('total_user')
            ->take(10)
            ->get();

        $statistikBulanan = Pengajuan::select(
            DB::raw('YEAR(created_at) as tahun'),
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();

        return view('admin.dashboard-dinas', compact(
            'totalPengajuan',
            'pengajuanPending',
            'pengajuanDiterima',
            'pengajuanDitolak',
            'pengajuanTerbaru',
            'userPerUniversitas',
            'statistikBulanan'
        ));
    }


    public function getUserDetails($pengajuanId)
    {
        $admin = auth()->guard('admin')->user();

        $query = Pengajuan::with(['user.universitas', 'databidang'])
            ->where('id', $pengajuanId);

        if ($admin->role === 'admin_bidang') {
            $bidang = Databidang::where('admin_id', $admin->id)->first();
            if ($bidang) {
                $query->where('databidang_id', $bidang->id);
            }
        }

        $pengajuan = $query->firstOrFail();

        return response()->json([
            'user' => $pengajuan->user,
            'pengajuan' => $pengajuan,
            'universitas' => $pengajuan->user->universitas,
            'bidang' => $pengajuan->databidang
        ]);
    }
}
