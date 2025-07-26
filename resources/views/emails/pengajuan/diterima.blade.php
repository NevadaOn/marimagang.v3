<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Diterima</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #1a73e8;">Pengajuan Magang Diterima 🎉</h2>

        <p>Halo <strong>{{ $user->nama }}</strong>,</p>

        <p>Selamat! Pengajuan magang dengan kode <strong>{{ $pengajuan->kode_pengajuan }}</strong> telah <strong>DITERIMA</strong>.</p>

        @if($catatan)
            <div style="background: #f1f1f1; padding: 10px; border-left: 5px solid #1a73e8; margin-bottom: 20px;">
                <strong>Catatan dari Admin:</strong><br>
                {{ $catatan }}
            </div>
        @endif

        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr>
                <td><strong>Tanggal Mulai:</strong></td>
                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Selesai:</strong></td>
                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td><strong>Bidang:</strong></td>
                <td>{{ $pengajuan->databidang->nama_bidang ?? '-' }}</td>
            </tr>
        </table>

        <p>Untuk melihat detail lengkap pengajuan kamu, klik tombol di bawah ini:</p>

        <p style="text-align: center;">
            <a href="{{ route('pengajuan.show', $pengajuan->kode_pengajuan) }}"
               style="background: #1a73e8; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
                Lihat Pengajuan
            </a>
        </p>

        <p>Dokumen terlampir:</p>
        <ul>
            <li>📄 Surat Pengajuan Magang</li>
            @if($pengajuan->form_kesediaan_magang)
                <li>📄 Form Kesediaan Magang</li>
            @endif
        </ul>

        <p>Terima kasih telah menggunakan platform <strong>Mari Magang</strong>.</p>

        <p>Salam,<br><strong>Tim Mari Magang</strong></p>
    </div>
</body>
</html>
