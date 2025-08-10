<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use App\Models\Databidang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use Carbon\Carbon;



class AdminLogbookController extends Controller
{

public function index(Request $request)
{
    $bidangs = Databidang::orderBy('nama')->get();

    $lastLogbooks = Logbook::select('user_id', DB::raw('MAX(tanggal) as tanggal_terakhir'))
        ->groupBy('user_id');

    $pengajuanSub = DB::table('pengajuan')
        ->select('user_id', 'databidang_id')
        ->whereIn('status', ['diterima', 'magang']);

    if ($request->filled('bidang')) {
        $pengajuanSub->where('databidang_id', $request->bidang);
    }

    $pengajuanSub = $pengajuanSub->groupBy('user_id', 'databidang_id');

    $logbooks = DB::table('logbooks')
        ->joinSub($lastLogbooks, 'last_logbook', function ($join) {
            $join->on('logbooks.user_id', '=', 'last_logbook.user_id')
                 ->on('logbooks.tanggal', '=', 'last_logbook.tanggal_terakhir');
        })
        ->joinSub($pengajuanSub, 'pengajuan_filtered', function ($join) {
            $join->on('logbooks.user_id', '=', 'pengajuan_filtered.user_id');
        })
        ->join('databidang', 'databidang.id', '=', 'pengajuan_filtered.databidang_id')
        ->join('users', 'users.id', '=', 'logbooks.user_id')  // join ke users
        ->select(
            'logbooks.user_id',
            'users.nama as user_name',         // ambil nama user
            'databidang.nama as nama_bidang',
            'logbooks.tanggal as tanggal_terakhir',
        )
        ->groupBy('logbooks.user_id', 'users.nama', 'databidang.nama', 'logbooks.tanggal')
        ->orderBy('logbooks.tanggal', 'desc')
        ->paginate(20)
        ->appends($request->only('bidang'));

    return view('admin.logbook.index', compact('logbooks', 'bidangs'));
}

    public function show($userId, Request $request)
    {
        $user = User::findOrFail($userId);

        $filter = $request->input('filter', 'all');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Logbook::where('user_id', $userId);

        if ($filter === 'weekly') {
            $query->whereBetween('tanggal', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($filter === 'monthly') {
            $query->whereMonth('tanggal', now()->month)
                ->whereYear('tanggal', now()->year);
        } elseif ($filter === 'custom' && $startDate && $endDate) {
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        }

        $logbooks = $query->orderBy('tanggal', 'desc')->get();

        return view('admin.logbook.show', compact('user', 'logbooks', 'filter', 'startDate', 'endDate'));
    }

    public function print($userId, Request $request)
    {
        $filter = $request->query('filter', 'all');
        $startDate = $request->query('start_date', null);
        $endDate = $request->query('end_date', null);

        $user = User::findOrFail($userId);
        $pengajuan = $user->pengajuan()
            ->whereIn('status', ['diterima', 'magang'])
            ->latest('tanggal_mulai')
            ->first();

        $query = Logbook::where('user_id', $userId);

        if ($filter === 'weekly') {
            $query->whereBetween('tanggal', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($filter === 'monthly') {
            $query->whereYear('tanggal', now()->year)
                ->whereMonth('tanggal', now()->month);
        } elseif ($filter === 'custom' && $startDate && $endDate) {
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        }

        $logbookData = $query->orderBy('tanggal')->get(['tanggal', 'kegiatan']);

        $exportData = collect();

        $exportData->push(['Nama User:', $user->nama ?? '-']);
        $exportData->push(['Bidang Magang:', $pengajuan->databidang->nama ?? '-']);
        $exportData->push(['Waktu Magang:', 
            ($pengajuan->tanggal_mulai ? Carbon::parse($pengajuan->tanggal_mulai)->format('Y-m-d') : '-') 
            . ' s/d ' . 
            ($pengajuan->tanggal_selesai ? Carbon::parse($pengajuan->tanggal_selesai)->format('Y-m-d') : '-')
        ]);

        $exportData->push(['Kode Pengajuan:', $pengajuan->kode_pengajuan ?? '-']);
        $exportData->push([]); 

        $exportData->push(['Tanggal', 'Kegiatan']);

        foreach ($logbookData as $item) {
            $tanggal = Carbon::parse($item->tanggal);
            $exportData->push([
                $tanggal->format('Y-m-d'),
                $item->kegiatan,
            ]);
        }

        return Excel::download(new class($exportData) implements FromCollection {
            private $data;
            public function __construct(Collection $data)
            {
                $this->data = $data;
            }
            public function collection()
            {
                return $this->data;
            }
        }, "logbook_user_{$userId}_" . now()->format('Ymd_His') . ".xlsx");
    }

}
