<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Kesediaan Magang</title>
    <style>
        body { font-family: 'Times New Roman', serif; font-size: 14px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Form Kesediaan Magang</h2>
    <p>Nomor: {{ $nomor_surat }}</p>
    <p>Yang bertanda tangan di bawah ini menyatakan bersedia menerima peserta magang dengan rincian sebagai berikut:</p>

    <ul>
        <li>Nama Ketua: {{ $pengajuan->user->name }} ({{ $pengajuan->user->nim }})</li>
        @foreach ($anggota as $anggota)
            <li>Anggota: {{ $anggota->user->name }} ({{ $anggota->user->nim }})</li>
        @endforeach
        <li>Bidang: {{ $pengajuan->databidang->nama }}</li>
        <li>Tanggal Magang: {{ $pengajuan->tanggal_mulai->format('d M Y') }} - {{ $pengajuan->tanggal_selesai->format('d M Y') }}</li>
    </ul>

    <p>Penanggung Jawab: {{ $penanggung_jawab }}</p>
    <p>Tanggal Surat: {{ $tanggal }}</p>

    <br><br>
    <p style="text-align:right;">Hormat kami,</p>
    <p style="text-align:right;"><strong>{{ $admin->name }}</strong></p>
</body>
</html>
