<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Magang</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin-top: 1.8cm;
            margin-left: 3cm;
            margin-right: 2cm;
            margin-bottom: 2.5cm;
            font-family: "timesnewroman", Times, serif;
            font-size: 12pt;
            line-height: 1.5;
        }
        header {
            position: fixed;
            top: 0.3cm;
            left: 2cm;
            right: 2cm;
            height: 2.5cm;
            text-align: center;
            padding: 10px 0;
        }
        .logo {
            width: 90px;
            height: auto;
        }
        .header-text {
            font-size: 11pt;
            line-height: 1.2;
            text-align: center;
        }
        main {
            margin-top: 2cm;
        }
        .nomor{
            margin-top: -0.6cm;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            vertical-align: top;
            padding: 2px 0;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .fw-bold { font-weight: bold; }
        .underline { text-decoration: underline; }
        .signature-space { height: 70px; }
    </style>
</head>
<body>
    <header>
        <table width="100%">
            <tr>
                <td width="15%" style="text-align: center;">
                    @php
                        $path = public_path('img/kab_malang.jpg');
                        $base64 = file_exists($path) ? 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path)) : '';
                    @endphp
                    @if($base64)
                        <img src="{{ $base64 }}" class="logo">
                    @endif
                </td>
                <td class="header-text">
                    <div style="font-size: 14pt;">PEMERINTAH KABUPATEN MALANG</div>
                    <div><strong style="font-size: 16pt;">DINAS KOMUNIKASI DAN INFORMATIKA</strong></div>
                    <div>Jl. K.H. Agus Salim No. 7 Gedung J Klojen Kota Malang Jawa Timur</div>
                    <div>Telepon (0341) 408788 Laman: malangkab.go.id Pos-el : kominfo@malangkab.go.id</div>
                    <div>Kode Pos 65119</div>
                </td>
            </tr>
        </table>
        <hr style="margin-top: 5px; border: 1.5px solid black;">
    </header>

    <main>
        <p class="text-center underline" style="font-size: 14pt;">SURAT KETERANGAN</p>
        <p class="text-center nomor">Nomor: {{ $nomorSurat ?? '[NOMOR SURAT]' }}</p>

        <p style="margin-top: 20px;">Yang bertanda tangan di bawah ini:</p>
        <table>
            <tr><td style="width: 150px;">Nama</td><td style="width: 10px;">:</td><td>{{ $penanggungJawab['nama'] ?? '[NAMA]' }}</td></tr>
            <tr><td>NIP</td><td>:</td><td>{{ $penanggungJawab['nip'] ?? '[NIP]' }}</td></tr>
             <tr><td>Jabatan</td><td>:</td><td>{{ $penanggungJawab['jabatan'] ?? '[JABATAN]' }}</td></tr>
        </table>


        <p style="margin-top: 10px;">Dengan ini menerangkan bahwa:</p>
        <table>
            <tr><td style="width: 150px;">Nama</td><td style="width: 10px;">:</td><td>{{ $pengajuan->user->nama ?? '[NAMA MAHASISWA]' }}</td></tr>
            <tr><td>NIM</td><td>:</td><td>{{ $pengajuan->user->nim ?? '-' }}</td></tr>

            @if($pengajuan->anggota->count())
                @foreach($pengajuan->anggota as $index => $anggota)
                    @if(optional($anggota->user)->id !== $pengajuan->user->id)
                        <tr>
                            <td>Nama</td><td>:</td><td>{{ optional($anggota->user)->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>NIM</td><td>:</td><td>{{ optional($anggota->user)->nim ?? '-' }}</td>
                        </tr>
                    @endif
                @endforeach
            @endif

            <tr><td>Program Studi</td><td>:</td><td>{{ $pengajuan->user->universitas->prodi ?? '-' }}</td></tr>
            <tr><td>Fakultas / Jurusan</td><td>:</td><td>{{ $pengajuan->user->universitas->fakultas ?? '-' }}</td></tr>
            <tr><td>Asal Universitas</td><td>:</td><td>{{ $pengajuan->user->universitas->nama_universitas ?? '-' }}</td></tr>
        </table>


        <p style="margin-top: 20px; text-align: justify; text-indent: 2em;">
            Dapat Melaksanakan Kegiatan Praktek Kerja Lapangan nama kegiatan <strong>"{{ $namaKegiatan ?? '[NAMA KEGIATAN]' }}"</strong> pada tanggal {{ isset($pengajuan->tanggal_mulai) ? \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->translatedFormat('d F Y') : '[TANGGAL MULAI]' }}
            sampai dengan {{ isset($pengajuan->tanggal_selesai) ? \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->translatedFormat('d F Y') : '[TANGGAL SELESAI]' }}.di {{ $pengajuan->databidang->nama ?? '-' }} Dinas Komunikasi dan Informatika Kabupaten Malang.
        </p>
        <p style="margin-top: 5px; text-indent: 2em;">Demikian surat ini dibuat untuk digunakan sebagaimana mestinya.</p>

        <div style="width: 100%; margin-top: 20px;">
            <div style="width: 40%; float: right; text-align: left;">
                <p style="margin-bottom: 10px; padding: 0; text-indent: 2em;">Malang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p style="margin: 0; padding: 0;">Sekretaris Dinas Komunikasi dan Informatika</p>
                {{-- <p style="margin: 0; padding: 0; text-indent: 2em;">Sekretaris</p> --}}
                <div style="padding: 10px;" class="signature-space"></div>
                <p class="underline" style="margin: 0; padding: 0;">{{ $penanggungJawab['nama'] ?? '[NAMA SEKRETARIS]' }}</p>
                <p style="margin: 0; padding: 0;">Pembina Tk. I</p>
                <p style="margin: 0; padding: 0;">NIP. {{ $penanggungJawab['nip'] ?? '[NIP]' }}</p>
            </div>
        </div>

    </main>
</body>
</html>