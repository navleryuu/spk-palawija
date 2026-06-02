<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Rekomendasi Benih – Kepala Dinas</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            color: #000;
            margin: 30px 50px;
        }

        /* ===== KOP SURAT ===== */
        .kop-container {
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            position: relative;
        }

        .kop-container img.logo-left {
            position: absolute;
            left: 0;
            top: 5px;
            width: 90px;
        }

        .kop-container img.logo-right {
            position: absolute;
            right: 0;
            top: 5px;
            width: 90px;
        }

        .kop-text h2, .kop-text h3, .kop-text p {
            margin: 0;
            line-height: 1.2;
        }

        .kop-text h2 {
            font-size: 20px;
            font-weight: bold;
        }

        .kop-text h3 {
            font-size: 17px;
            font-weight: bold;
        }

        .kop-text p {
            font-size: 12px;
        }

        /* ===== JUDUL ===== */
        h1 {
            text-align: center;
            margin-top: 25px;
            font-size: 22px;
            text-transform: uppercase;
            text-decoration: underline;
        }

        /* ===== INFO ===== */
        .info {
            font-size: 15px;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .info strong {
            font-size: 15px;
        }

        /* ===== TABEL ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 14px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px 10px;
        }

        th {
            background-color: #e7f5e8;
            text-align: center;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f6fff6;
        }

        /* ===== TANDA TANGAN ===== */
        .ttd {
            margin-top: 60px;
            width: 260px;
            float: right;
            text-align: center;
            font-size: 14px;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>

    {{-- ===== KOP SURAT ===== --}}
    <div class="kop-container">
        {{-- <img src="{{ public_path('images/logo-dinas.png') }}" class="logo-left"> --}}
        <div class="kop-text">
            <h2>DINAS PERTANIAN SUMATERA UTARA</h2>
            <h3>UPTD BENIH INDUK PALAWIJA TANJUNG SELAMAT</h3>
            <p>Jl. Binjai Km. 10, Medan – Sumatera Utara</p>
            <p>Telp: (061) xxxx • Email: uptd.palawija@sumutprov.go.id</p>
        </div>
    </div>

    {{-- ===== JUDUL LAPORAN ===== --}}
    <h1>LAPORAN REKOMENDASI BENIH PALAWIJA</h1>

    <p style="text-align: center; font-size: 15px; margin-top: -10px;">
        Menggunakan Metode MOORA dan ORESTE
    </p>

    {{-- ===== INFO PERIODE ===== --}}
    <div class="info">
        <strong>Periode:</strong> {{ now()->format('F Y') }} <br>
        <strong>Jumlah Alternatif:</strong> {{ count($laporan) }} <br>
        <strong>Rekomendasi Benih Terbaik:</strong> {{ $laporan[0]->alternatif ?? '-' }}
    </div>

    {{-- ===== TABEL ===== --}}
    <table>
        <thead>
            <tr>
                <th style="width: 60px;">Peringkat</th>
                <th>Alternatif</th>
                <th>Nilai MOORA</th>
                <th>Nilai Akhir ORESTE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $index => $item)
            <tr>
                <td style="text-align:center;"><b>{{ $index + 1 }}</b></td>
                <td>{{ $item->alternatif }}</td>
                <td style="text-align:center;">{{ number_format($item->skor_moora, 4) }}</td>
                <td style="text-align:center;">{{ number_format($item->nilai_oreste, 4) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="clear"></div>

    {{-- ===== TANDA TANGAN ===== --}}
    <div class="ttd">
        <p>Tanjung Selamat, {{ now()->format('d F Y') }}</p>
        <p><b>Kepala UPTD Benih Induk Palawija</b></p>
        <br><br><br>
        <p style="text-decoration: underline;"><b>(Nama Pejabat)</b></p>
        <p>NIP. 19xxxxxxxxxxxx</p>
    </div>

</body>
</html>
