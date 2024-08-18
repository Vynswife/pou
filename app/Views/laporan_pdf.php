


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PDF</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Laporan PDF</h2>
    <table>
        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Kode Pembelian</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Makanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($grouped_jel as $kode_transaksi => $transactions): ?>
                        <?php 
                        $total_harga = 0;
                        foreach($transactions as $transaction) {
                            $total_harga += $transaction->total_harga;
                        }
                        ?>
                        <?php foreach($transactions as $index => $kin): ?>
                            <tr>
                                <?php if ($index === 0): ?>
                                    <!-- Displaying information only on the first row of each kode_transaksi group -->
                                    <td rowspan="<?= count($transactions) ?>"><?= $no++ ?></td>
                                    <td rowspan="<?= count($transactions) ?>"><?= $kin->username ?></td>
                                    <td rowspan="<?= count($transactions) ?>"><?= $kin->kode_transaksi ?></td>
                                    <td rowspan="<?= count($transactions) ?>"><?= $kin->tgl_transaksi ?></td>
                                    <td rowspan="<?= count($transactions) ?>"><?= number_format($total_harga, 2, ',', '.') ?></td>
                                <?php endif; ?>
                                <td><?= $kin->nama ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
    </table>
</body>
</html>
