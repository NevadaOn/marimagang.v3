<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Pengantar</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; line-height: 1.5; }
        .center { text-align: center; }
    </style>
</head>
<body>
    <h2 class="center">SURAT PENGANTAR MAGANG</h2>
    <p>Nomor: {{ $nomorSurat }}</p>

    <p>Yang bertanda tangan di bawah ini:</p>
    <ul>
        <li>Nama: {{ $penanggungJawab['nama'] }}</li>
        <li>Jabatan: {{ $penanggungJawab['jabatan'] }}</li>
    </ul>

    <p>Dengan ini memperkenalkan mahasiswa berikut untuk melaksanakan magang:</p>
    <ul>
        <li>Nama: {{ $pengajuan->user->name }}</li>
        <li>NIM: {{ $pengajuan->user->nim }}</li>
        <li>Program Studi: {{ $pengajuan->user->prodi }}</li>
        <li>Waktu: <li>Waktu: {{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->translatedFormat('d F Y') }} s/d {{ \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->translatedFormat('d F Y') }}</li>
    </ul>

    <p>Demikian surat ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>

    <br><br>
    <p>Hormat kami,</p>
    <p>{{ $penanggungJawab['nama'] }}</p>
    <p>{{ $penanggungJawab['jabatan'] }}</p>
</body>
</html>
