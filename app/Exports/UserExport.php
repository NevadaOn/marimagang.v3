<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::all()->map(function ($user) {
            return [
                'ID' => $user->id,
                'Nama' => $user->nama,
                'Email' => $user->email,
                'NIM' => $user->nim,
                'Status' => $user->status,
                'Tanggal Daftar' => $user->created_at->format('Y-m-d'),
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Nama', 'Email', 'NIM', 'Status', 'Tanggal Daftar'];
    }
}
