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

    
    <div class="kop-container">
        
        <div class="kop-text">
            <h2>DINAS PERTANIAN SUMATERA UTARA</h2>
            <h3>UPTD BENIH INDUK PALAWIJA TANJUNG SELAMAT</h3>
            <p>Jl. Binjai Km. 10, Medan – Sumatera Utara</p>
            <p>Telp: (061) xxxx • Email: uptd.palawija@sumutprov.go.id</p>
        </div>
    </div>

    
    <h1>LAPORAN REKOMENDASI BENIH PALAWIJA</h1>

    <p style="text-align: center; font-size: 15px; margin-top: -10px;">
        Menggunakan Metode MOORA dan ORESTE
    </p>

    
    <div class="info">
        <strong>Periode:</strong> <?php echo e(now()->format('F Y')); ?> <br>
        <strong>Jumlah Alternatif:</strong> <?php echo e(count($laporan)); ?> <br>
        <strong>Rekomendasi Benih Terbaik:</strong> <?php echo e($laporan[0]->alternatif ?? '-'); ?>

    </div>

    
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
            <?php $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="text-align:center;"><b><?php echo e($index + 1); ?></b></td>
                <td><?php echo e($item->alternatif); ?></td>
                <td style="text-align:center;"><?php echo e(number_format($item->skor_moora, 4)); ?></td>
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
</html>
<?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/kepala/laporan/cetak.blade.php ENDPATH**/ ?>