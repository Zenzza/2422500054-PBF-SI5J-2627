<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Kursus</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #eaeaea;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 850px;
            margin: 40px auto;
            background: #fff;
            padding: 35px;
            box-shadow: 0 10px 25px rgba(0,0,0,.15);
            border-radius: 8px;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 3px solid #333;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .logo {
            width: 80px;
        }

        .logo img {
            width: 100%;
        }

        .title {
            flex: 1;
            text-align: center;
        }

        .title h2 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 1px;
        }

        .title p {
            margin: 5px 0 0;
            font-size: 13px;
        }

        .info {
            margin-bottom: 25px;
            font-size: 14px;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 4px 0;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            color: #fff;
        }

        .lunas { background: #28a745; }
        .belum { background: #dc3545; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {

            padding: 10px;
            font-size: 14px;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 16px;
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .footer div {
            width: 30%;
        }

        .footer p {
            margin-bottom: 60px;
        }
        
        #tanggal{
            margin-bottom: 1px;
        }

        #bagian_keuangan{
            margin-top: 50px;
        }

        .watermark {
            position: fixed;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 90px;
            color: rgba(0,0,0,0.05);
            font-weight: bold;
            z-index: 0;
        }

        @media print {
            body {
                background: none;
            }
            .page {
                box-shadow: none;
                margin: 0;
                border-radius: 0;
            }
        }
    </style>
</head>
<body onload="window.print()">
<div class="page">
    <div class="header">
        <div class="title" align="center">
            <h2 align="center">ISB ATMA LUHUR</h2>
            <p align="center">Jl. Jendral Sudirman| POS: 3312</p>
        </div>
    </div>
    <div class="title">
        <h2><U>LAPORAN KURSUS</U></h2>
        <h4 align="center">
            Periode : <?= date('d-m-Y', strtotime($tanggal_mulai)) ?>
            s/d <?= date('d-m-Y', strtotime($tanggal_selesai)) ?>
        </h4>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nomor Kwitansi</th>
                <th>Tanggal Kwitansi</th>
                <th>Nama Peserta</th>
                <th>Nama Program Kursus</th>
                <th>Keterangan</th>
                <th width="150">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['data'])): ?>
                <?php $no = 1; foreach ($data['data'] as $key => $r): ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td align="center"><?= $r['nokwitansi']; ?></td>
                    <td align="center"><?= $r['tglkwitansi']; ?></td>
                    <td align="center"><?= $r['nmpeserta']; ?></td>
                    <td align="center"><?= $r['nmprogramkursus']; ?></td>
                    <td align="center"><?= $r['keterangan']; ?></td>
                    <td align="center">Rp. <?= number_format($r['total_bayar'],0,',','.'); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" align="center">Tidak ada data untuk periode ini</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="total">
        Grand Total : Rp <?= number_format(!empty($data['total_seluruh_laporan']) ? $data['total_seluruh_laporan'] : 0, 0, ',', '.'); ?>
    </div>

    <!-- FOOTER -->
    <div class="footer" align="right">
        <div>
            <p></p>
            <strong></strong>
        </div>
        <div>

            <p id="bagian_keuangan">Bagian Keuangan</p>
            <strong>________________</strong>
        </div>

        <div>
            <p id="tanggal">Pangkalpinang, <?php echo tgl_indonesia(date('Y-m-d')); ?></p>
            <p>Pimpinan</p>
            <strong>________________</strong>
        </div>
    </div>

</div>

</body>
</html>
<?php
function tgl_indonesia($tanggal){
    $bulan = array (
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}?>