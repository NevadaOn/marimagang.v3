<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Pengajuan;

class PengajuanDiterimaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $pengajuan;
    public $catatan;

    public function __construct($user, Pengajuan $pengajuan, $catatan = null)
    {
        $this->user = $user; // bisa User atau Anggota
        $this->pengajuan = $pengajuan;
        $this->catatan = $catatan;
    }

    public function build()
    {
        $email = $this->subject('Pengajuan Magang Anda Diterima')
                      ->markdown('emails.pengajuan.diterima');

        if ($this->pengajuan->surat_pdf && Storage::disk('public')->exists($this->pengajuan->surat_pdf)) {
            $email->attachFromStorageDisk('public', $this->pengajuan->surat_pdf);
        }

        if ($this->pengajuan->form_kesediaan_magang && Storage::disk('public')->exists($this->pengajuan->form_kesediaan_magang)) {
            $email->attachFromStorageDisk('public', $this->pengajuan->form_kesediaan_magang);
        }

        return $email;
    }
}
