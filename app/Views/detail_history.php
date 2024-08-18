<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail History</title>
    
    <!-- Include CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Include Custom CSS (Jika ada) -->
    <link href="path/to/your/custom.css" rel="stylesheet">
    
    <style>
        .nota {
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .nota h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .nota table {
            width: 100%;
            margin-bottom: 20px;
        }
        .nota .table th, .nota .table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="nota">
            <h1>Detail History for <?= esc($details[0]->kode_transaksi) ?></h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Kode Pembelian</th>
                        <th scope="col">Tanggal Pembelian</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Makanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($details as $detail): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($detail->username) ?></td>
                        <td><?= esc($detail->kode_transaksi) ?></td>
                        <td><?= esc($detail->tgl_transaksi) ?></td>
                        <td><?= esc($detail->jumlah) ?></td>
                        <td><?= esc($detail->total_harga) ?></td>
                        <td><?= esc($detail->nama) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
