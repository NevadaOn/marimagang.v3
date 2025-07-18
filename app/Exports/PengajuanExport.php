<?php

namespace App\Exports;

use App\Models\Pengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengajuanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pengajuan::with('user', 'databidang')->get()->map(function ($item) {
            return [
                'ID' => $item->id,
                'Nama User' => $item->user->nama,
                'Bidang' => $item->databidang->nama ?? '-',
                'Status' => $item->status,
                'Tanggal Pengajuan' => $item->created_at->format('Y-m-d'),
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Nama User', 'Bidang', 'Status', 'Tanggal Pengajuan'];
    }
}
