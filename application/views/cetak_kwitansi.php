<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Kwitansi</title>
    
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

        /* Styling tambahan untuk menjembatani bagian CSS tabel yang terpotong */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            text-align: left;
            padding: 10px;
            border-bottom: 2px solid #333;
        }

        /* Lanjutan CSS dari baris 91 */
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

    <div class="watermark">KWITANSI</div>
    
    <div class="page">
        <div class="header">
            <div class="logo">
                <!-- GANTI JIKA ADA LOGO -->
                <img src="<?= base_url('assets/logo.png'); ?>" onerror="this.style.display='none'">
            </div>
            <div class="title">
                <h2>ISB ATMA LUHUR</h2>
                <p>Jl. Jendral Sudirman | POS: 3312</p>
            </div>
        </div>
        <div class="title">
            <h2><U>KWITANSI</U></h2>
        </div>
        
        <!-- INFO -->
        <div class="info">
            <table>
                <tr>
                    <td width="150">No Kwitansi</td>
                    <td>: <strong><?= $kwitansi['nokwitansi']; ?></strong></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: <?= date('d-m-Y', strtotime($kwitansi['tglkwitansi'])); ?></td>
                </tr>
                <tr>
                    <td>Nama Peserta</td>
                    <td>: <?= $kwitansi['nmpeserta']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>: 
                        <?php if ($kwitansi['keterangan'] == 'Lunas'): ?>
                            <span class="badge lunas">LUNAS</span>
                        <?php else: ?>
                            <span class="badge belum">BELUM LUNAS</span>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>

        <!-- TABEL RINCIAN -->
        <table>
            <thead>
                <tr>
                    <th width="50" style="text-align: center;">No</th>
                    <th style="text-align: center;">Rincian Biaya</th>
                    <th width="150" style="text-align: center;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($get_ada)): ?>
                    <?php $no = 1; foreach ($get_ada as $r): ?>
                        <tr>
                            <td align="center"><?= $no++; ?></td>
                            <td align="center"><?= $r['nmrincian']; ?></td>
                            <td align="right">Rp <?= number_format($r['jml_biaya'],0,',','.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" align="center">
                            <em>Tidak ada rincian biaya</em>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- TOTAL -->
        <div class="total">
            Total Bayar : Rp <?= number_format($kwitansi['totalbayar'],0,',','.'); ?>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <div>
                <p>Peserta</p>
                <strong><?= $kwitansi['nmpeserta']; ?></strong>
            </div>
            <div>
                <p>Admin</p>
                <strong>________________</strong>
            </div>
            <div>
                <p>Pimpinan</p>
                <strong>________________</strong>
            </div>
        </div>
    </div>

</body>
</html>