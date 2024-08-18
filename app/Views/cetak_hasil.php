<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Result</title>
    <style>
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
    <h1>Print Result</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Kode Transaksi</th>
                <th>Nama user</th>
                <th>Makanan</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($jel)): ?>
                <?php foreach ($jel as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $row->id_transaksi ?></td>
                        <td><?= $row->tgl_transaksi ?></td>
                        <td><?= $row->kode_transaksi ?></td>
                        <td><?= $row->username?></td>
                        <td><?= $row->nama?></td>
                        <td><?= $row->jumlah ?></td>
                        <td><?= $row->total_harga ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No data available for the selected date range.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
