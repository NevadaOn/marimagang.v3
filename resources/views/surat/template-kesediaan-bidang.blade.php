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
        <p class="text-center underline" style="font-size: 14pt;"><strong>FORM KESEDIAAN MAGANG/PKL</strong></p>
        <table>
            <tr><td>Nama (Perwakilan)</td><td>:</td><td>{{ $pengajuan->user->nama ?? '[NAMA MAHASISWA]' }}</td></tr>
            <tr><td>NIM</td><td>:</td><td>{{ $pengajuan->user->nim ?? '-' }}</td></tr>

            <tr><td>Program Studi</td><td>:</td><td>{{ $pengajuan->user->universitas->prodi ?? '-' }}</td></tr>
            <tr><td>Fakultas / Jurusan</td><td>:</td><td>{{ $pengajuan->user->universitas->fakultas ?? '-' }}</td></tr>
            <tr><td>Asal Universitas</td><td>:</td><td>{{ $pengajuan->user->universitas->nama_universitas ?? '-' }}</td></tr>
            <tr><td>Waktu Kegiatan</td><td>:</td><td>{{ isset($pengajuan->tanggal_mulai) ? \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->translatedFormat('d F Y') : '[TANGGAL MULAI]' }}
            sampai dengan {{ isset($pengajuan->tanggal_selesai) ? \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->translatedFormat('d F Y') : '[TANGGAL SELESAI]' }}</td></tr>
            <tr><td>Lokasi Kegiatan pada Bidang</td><td>:</td><td>{{ $pengajuan->databidang->nama ?? '-' }}</td></tr>
            <tr><td>Nama Project/Penelitian/Kegiatan:</td></tr>
        </table>


        <p style="margin-top: 20px; text-align: justify; text-indent: 2em;">
            <strong>{{ $namaKegiatan ?? '[NAMA KEGIATAN]' }}</strong>
        </p>
        <p><strong>Kelengkapan Pengajuan</strong></p>
        @php
            $kotakPath = public_path('img/kotak.png');
            $kotakBase64 = file_exists($kotakPath)
                ? 'data:image/' . pathinfo($kotakPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($kotakPath))
                : '';
        @endphp

        <table>
            <tr>
                <td>Proposal</td>
                <td>:</td>
                <td>
                    @if($kotakBase64)
                        <img src="{{ $kotakBase64 }}" alt="" width="23px" style="padding-top: 4px" />
                    @endif
                </td>
            </tr>
            <tr>
                <td>CV</td>
                <td>:</td>
                <td>
                    @if($kotakBase64)
                        <img src="{{ $kotakBase64 }}" alt="" width="23px" style="padding-top: 4px" />
                    @endif
                </td>
            </tr>
            <tr>
                <td>Surat Pengantar Kampus</td>
                <td>:</td>
                <td>
                    @if($kotakBase64)
                        <img src="{{ $kotakBase64 }}" alt="" width="23px" style="padding-top: 4px" />
                    @endif
                </td>
            </tr>
            <tr>
                <td>Surat Keterangan Diskominfo</td>
                <td>:</td>
                <td>
                    @if($kotakBase64)
                        <img src="{{ $kotakBase64 }}" alt="" width="23px" style="padding-top: 4px" />
                    @endif
                </td>
            </tr>
            <tr>
                <td>Surat Keterangan BANGKESPOL</td>
                <td>:</td>
                <td>
                    @if($kotakBase64)
                        <img src="{{ $kotakBase64 }}" alt="" width="23px" style="padding-top: 4px" />
                    @endif
                </td>
            </tr>
            <tr>
                <td>Laporan Kegiatan</td>
                <td>:</td>
                <td>
                    @if($kotakBase64)
                        <img src="{{ $kotakBase64 }}" alt="" width="23px" style="padding-top: 4px" />
                    @endif
                </td>
            </tr>
        </table>

        <p style="margin-top: 5px; text-indent: 2em;">Demikian surat ini dibuat untuk digunakan sebagaimana mestinya.</p>

        <div style="width: 100%; margin-top: 20px;">
            <div style="width: 40%; float: right; text-align: left;">
                <p style="margin-bottom: 10px; padding: 0; text-indent: 2em;">Malang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p style="margin: 0; padding: 0;">Mengetahui Pembimbing Lapangan</p>
                {{-- <p style="margin: 0; padding: 0; text-indent: 2em;">Sekretaris</p> --}}
                <div style="padding: 10px;" class="signature-space"></div>
                <p class="underline" style="margin: 0; padding: 0; text-align:center;">{{ $penanggung_jawab }}</p>
                {{-- <p style="margin: 0; padding: 0;">Pembina Tk. I</p>
                <p style="margin: 0; padding: 0;">NIP. {{ $penanggungJawab['nip'] ?? '[NIP]' }}</p> --}}
            </div>
        </div>

    </main>
</body>
</html>