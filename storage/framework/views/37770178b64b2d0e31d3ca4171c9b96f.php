<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Hasil Rekomendasi</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            color: #000;
            /* Margin 30px atas/bawah, 50px kiri/kanan */
            margin: 30px 50px; 
        }

        /* ===== KOP SURAT ===== */
        .kop-container {
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
            /* Garis pemisah kop */
            border-bottom: 3px solid #000; 
            padding-bottom: 10px;
            position: relative;
        }

        /* Styling untuk logo jika digunakan */
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
            padding: 0;
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

        /* ===== JUDUL LAPORAN ===== */
        h1 {
            text-align: center;
            margin-top: 25px;
            font-size: 22px;
            text-transform: uppercase;
            text-decoration: underline;
        }

        /* ===== TABEL DATA ===== */
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
            /* Warna header tabel */
            background-color: #e7f5e8; 
            font-weight: bold;
            text-align: center;
        }

        /* Warna latar baris genap */
        tr:nth-child(even) {
            background-color: #f6fff6;
        }
        
        /* ===== TANDA TANGAN ===== */
        .ttd {
            /* Jarak dari tabel di atas */
            margin-top: 60px; 
            /* Lebar blok tanda tangan */
            width: 250px; 
            /* Pindahkan ke kanan */
            float: right; 
            text-align: center;
            font-size: 14px;
        }
        
        /* Clearfix untuk mengatasi float agar elemen di bawah ttd tidak naik */
        .clear {
            clear: both;
        }

        /* ===== FOOTER (Paling Bawah) ===== */
        .footer {
            /* Jarak dari elemen di atasnya */
            margin-top: 50px; 
            width: 100%;
            /* Teks rata kanan */
            text-align: right; 
            font-size: 14px;
        }
    </style>
</head>

<body>

    
    <div class="kop-container">

        
        
        
        <div class="kop-text">
            <h2>DINAS PERTANIAN SUMATERA UTARA</h2>
            <h3>UPTD BENIH INDUK PALAWIJA TANJUNG SELAMAT</h3>
            <p>Jl. Binjai Km. 10, Medan – Sumatera Utara</p>
            <p>Telp: (061) xxxx • Email: uptd.palawija@sumutprov.go.id</p>
        </div>

    </div>

    
    <h1>LAPORAN HASIL REKOMENDASI BENIH PALAWIJA</h1>
    <p style="text-align: center; font-size: 15px; margin-top: -10px;">
        Menggunakan Metode MOORA dan ORESTE
    </p>

    
    <table>
        <thead>
            <tr>
                <th style="width: 60px;">Peringkat</th>
                <th>Alternatif</th>
                <th>Nilai MOORA</th>
                <th>Nilai ORESTE</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="text-align:center;"><?php echo e($index + 1); ?></td>
                <td><?php echo e($item->nama_alternatif ?? '-'); ?></td>
                <td style="text-align:center;"><?php echo e($item->skor_moora ?? '-'); ?></td>
                <td style="text-align:center;"><?php echo e(number_format($item->nilai_oreste, 4)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    

    <div class="clear"></div> 


    <div class="ttd">
        <p>Tanjung Selamat, <?php echo e(now()->format('d F Y')); ?></p>
        <p><b>Kepala UPTD Benih Induk Palawija</b></p>
        <br><br><br>
        <p style="text-decoration: underline;"><b>(Nama Pejabat)</b></p>
        <p>NIP. 19xxxxxxxxxxxx</p>
    </div>


</body>
</html><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/laporan/cetak.blade.php ENDPATH**/ ?>