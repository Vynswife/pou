<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    
    <!-- Include CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Include Custom CSS -->
    <link href="path/to/your/custom.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .nota {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #fff;
        }
        .nota h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .nota .table-container {
            overflow-x: auto; /* Enable horizontal scrolling */
            -webkit-overflow-scrolling: touch; /* Smooth scrolling for touch devices */
        }
        .nota table {
            width: 100%; /* Ensure the table takes the full width of its container */
            min-width: 1000px; /* Adjust this to fit your table's content width */
            margin-bottom: 20px;
        }
        .nota .table th, .nota .table td {
            text-align: center;
            vertical-align: middle;
        }
        .nota .total {
            font-weight: bold;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-header {
            border-bottom: 1px solid #ddd;
            background-color: #f8f9fa;
        }
        .modal-body {
            padding: 20px;
        }
        .modal-footer {
            border-top: 1px solid #ddd;
            background-color: #f8f9fa;
        }
        .modal-title {
            font-size: 18px;
            font-weight: bold;
        }
        .table thead th {
            background-color: #f1f1f1;
        }
        .table td, .table th {
            padding: 10px;
        }
        .btn-details, .btn-finish, .btn-rate {
            font-size: 14px;
            padding: 5px 10px;
            margin: 0;
        }
        .btn-rate {
            padding: 4px 8px;
        }
        .btn-details i, .btn-finish i, .btn-rate i {
            margin-right: 3px;
        }
        .form-group {
            margin-bottom: 0;
        }

        /* Rating Stars CSS */
        .rating {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .rating input {
            display: none;
        }
        .rating label {
            color: #ddd;
            font-size: 30px;
            cursor: pointer;
            margin: 0;
        }
        .rating input:checked ~ label {
            color: #f39c12;
        }
        .rating input:checked ~ label ~ label {
            color: #ddd;
        }
        .rating input:checked ~ label {
            color: #f39c12;
        }

        /* Adjust the width of the Upload Bukti column */
        .table .upload-bukti {
            width: 200px; /* Adjust width as needed */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Nota Heading -->
        <div class="nota">
            <h1>History</h1>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Kode Pembelian</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Makanan</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Status</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col" class="upload-bukti">Upload Bukti</th>
                            <th scope="col">Aksi</th>
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
                                <td><img src="<?= base_url('img/'.$kin->bukti_file) ?>" width="80px" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-src="<?= base_url('img/'.$kin->bukti_file) ?>"></td>
                                
                                <td><?= $kin->rating ?></td>
                                <td><?= $kin->status ?></td>
                                <td><?= $kin->status_pembayaran?></td>
                                
                                <!-- Display the Upload Bukti and Aksi columns only on the first row -->
                                <?php if ($index === 0): ?>
                                    <td rowspan="<?= count($transactions) ?>" class="upload-bukti">
                                        <!-- File Upload Form -->
                                        <form action="<?= base_url('home/upload_bukti') ?>" method="post" enctype="multipart/form-data" style="display: inline-block;">
                                            <input type="hidden" name="kode_transaksi" value="<?= $kin->kode_transaksi ?>">
                                            <div class="form-group">
                                                <input type="file" name="bukti_file" class="form-control-file" required>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-upload"><i class="fas fa-upload"></i></button>
                                        </form>
                                    </td>
                                    <td rowspan="<?= count($transactions) ?>">
                                        <button class="btn btn-warning btn-circle btn-rating" data-toggle="modal" data-target="#modalRating<?= $kode_transaksi ?>">
                                            <i class="fas fa-star"></i>
                                        </button>
                                        <button class="btn btn-danger btn-circle btn-details" data-toggle="modal" data-target="#modalDetail<?= $kode_transaksi ?>">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <?php foreach($grouped_jel as $kode_transaksi => $transactions): ?>
    <div class="modal fade" id="modalDetail<?= $kode_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailTitle<?= $kode_transaksi ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailTitle<?= $kode_transaksi ?>">Detail Transaksi <?= $kode_transaksi ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Kode Pembelian</th>
                                    <th scope="col">Tanggal Pembelian</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Makanan</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($transactions as $kin): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kin->username ?></td>
                                    <td><?= $kin->kode_transaksi ?></td>
                                    <td><?= $kin->tgl_transaksi ?></td>
                                    <td><?= number_format($kin->total_harga, 2, ',', '.') ?></td>
                                    <td><?= $kin->nama ?></td>
                                    <td><?= $kin->rating ?></td>
                                    <td><?= $kin->status ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('home/printnota1/'.$kode_transaksi) ?>" class="btn btn-primary" target="_blank">Print PDF</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Modal Rating -->
    <?php foreach($grouped_jel as $kode_transaksi => $transactions): ?>
    <div class="modal fade" id="modalRating<?= $kode_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="modalRatingTitle<?= $kode_transaksi ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRatingTitle<?= $kode_transaksi ?>">Rating for <?= $kode_transaksi ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('home/aksi_e_rating') ?>" method="post">
                        <input type="hidden" name="kode_transaksi" value="<?= $kode_transaksi ?>">
                        <div class="form-group text-center">
                            <label for="rating">Rate this transaction:</label>
                            <div class="rating">
                                <input type="radio" name="rating" value="1" id="5<?= $kode_transaksi ?>">
                                <label for="5<?= $kode_transaksi ?>">★</label>
                                <input type="radio" name="rating" value="2" id="4<?= $kode_transaksi ?>">
                                <label for="4<?= $kode_transaksi ?>">★</label>
                                <input type="radio" name="rating" value="3" id="3<?= $kode_transaksi ?>">
                                <label for="3<?= $kode_transaksi ?>">★</label>
                                <input type="radio" name="rating" value="4" id="2<?= $kode_transaksi ?>">
                                <label for="2<?= $kode_transaksi ?>">★</label>
                                <input type="radio" name="rating" value="5" id="1<?= $kode_transaksi ?>">
                                <label for="1<?= $kode_transaksi ?>">★</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit Rating</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Include JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
