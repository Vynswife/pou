<!DOCTYPE html>
<html>
<head>
    <title>Nota Pembelian</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            padding: 10px;
            background-color: #4a4a4a;
            color: #fff;
        }
        .header {
            margin-bottom: 20px;
        }
        .header h2 {
            font-size: 20px;
            margin: 0;
        }
        .header p {
            font-size: 14px;
            margin: 5px 0 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
        }
        .footer p {
            margin: 0;
        }
        .transaction-info {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .transaction-info span {
            display: block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #e0e0e0;
            padding: 5px; /* Reduce padding to make the rows smaller */
            font-size: 14px;
        }
        th {
            background-color: #4a4a4a;
            color: #fff;
            text-align: center;
        }
        td {
            text-align: center;
        }
        .total {
            font-weight: bold;
            border-top: 2px solid #4a4a4a;
        }
        .nama-toko {
            font-weight: bold;
            font-size: 18px;
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }
        @media print {
            body {
                margin: 0;
            }
            .container {
                width: auto;
                max-width: none;
                border: none;
                box-shadow: none;
                margin: 0 auto;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            tr {
                page-break-inside: avoid;
            }
            .total {
                font-weight: bold;
                border-top: 2px solid #4a4a4a;
            }
            @page {
                size: auto;
                margin: 5mm;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="Logo Toko" style="width: 80px; margin-bottom: 10px;"> <!-- Ganti src dengan URL logo Anda -->
            <h2>Nota Pembelian</h2>
            <p>Terima kasih atas pembelian Anda!</p>
        </div>

        <div class="nama-toko">Burger Shop</div>

        <div class="transaction-info">
            <?php if (!empty($elly)) : ?>
                <span>Tanggal: <?= $elly[0]->tgl_transaksi; ?></span>
                <span>Kode Transaksi: <?= $elly[0]->kode_transaksi; ?></span>
            <?php endif; ?>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Makanan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalHarga = 0;
                foreach($elly as $index => $item) : 
                    $totalHarga += $item->total_harga;
                ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $item->username; ?></td>
                    <td><?= $item->tgl_transaksi; ?></td>
                    <td><?= number_format($item->total_harga, 2, ',', '.'); ?></td>
                    <td><?= $item->nama; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="total">
                    <td colspan="4">Total</td>
                    <td colspan="2"><?= number_format($totalHarga, 2, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            <p>&copy; <?= date("Y"); ?> Burger Shop. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
