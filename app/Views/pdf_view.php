<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detail Transaksi <?= $transactions[0]->kode_transaksi ?></h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Makanan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($transactions as $index => $kin): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $kin->username ?></td>
                        <td><?= $kin->kode_transaksi ?></td>
                        <td><?= $kin->tgl_transaksi ?></td>
                        <td><?= $kin->jumlah ?></td>
                        <td><?= $kin->total_harga ?></td>
                        <td><?= $kin->nama ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
