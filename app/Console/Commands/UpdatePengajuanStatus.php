<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pengajuan;
use Carbon\Carbon;

class UpdatePengajuanStatus extends Command
{
    protected $signature = 'pengajuan:update-status';
    protected $description = 'Update status pengajuan berdasarkan tanggal mulai dan selesai';

    public function handle()
    {
        $today = Carbon::today();

        Pengajuan::where('status', 'diterima')
            ->whereDate('tanggal_mulai', '<=', $today)
            ->update(['status' => 'magang']);

        Pengajuan::where('status', 'magang')
            ->whereDate('tanggal_selesai', '<', $today)
            ->update(['status' => 'selesai']);

        $this->info('Status pengajuan berhasil diperbarui.');
    }
}
