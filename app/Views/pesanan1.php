<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .nota {
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
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
        .table thead th {
            background-color: #4e73df;
            color: #fff;
        }
        .btn-status, .btn-status-pembayaran {
            display: block;
            margin: auto;
        }
        .filter-form {
            margin-bottom: 20px;
        }
        .filter-form {
            max-width: 300px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            font-size: 14px;
            padding: 6px 12px;
        }
        .btn-primary {
            font-size: 14px;
            padding: 6px 12px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h1 class="nota">Pesanan</h1>
        <div class="container">
            <div class="filter-form">
                <form id="filterForm">
                    <div class="form-group">
                        <label for="statusFilter">Filter by Status</label>
                        <select class="form-control" id="statusFilter" name="status">
                            <option value="">All</option>
                            <option value="READY">READY</option>
                            <option value="WAITLIST">WAITLIST</option>
                            <option value="UNPREPARED">UNPREPARED</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                </form>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All of the orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Makanan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody id="orderTableBody">
    <?php 
    $groupedTransactions = [];
    foreach ($jel as $transaction) {
        $groupedTransactions[$transaction->kode_transaksi][] = $transaction;
    }

    $no = 1;
    foreach ($groupedTransactions as $kodeTransaksi => $transactions): 
        $firstTransaction = $transactions[0]; // Use the first transaction for general details
    ?>
    <tr class="order-row" data-status="<?= $firstTransaction->status ?>" data-status-pembayaran="<?= $firstTransaction->status_pembayaran ?>">
        <td><?= $no++ ?></td>
        <td><?= $firstTransaction->username ?></td>
        <td><?= $kodeTransaksi ?></td>
        <td><?= $firstTransaction->tgl_transaksi ?></td>
        <td>
            <?php
            // Display unique quantities for each transaction
            $quantities = array_map(function($transaction) {
                return explode(', ', $transaction->jumlah);
            }, $transactions);
            foreach (array_unique(array_merge(...$quantities)) as $quantity) {
                echo $quantity . '<br>';
            }
            ?>
        </td>
        <td>
            <?php
            // Calculate and display total price for the group
            $totalHarga = array_sum(array_map(function($transaction) {
                return $transaction->total_harga;
            }, $transactions));
            echo number_format($totalHarga, 2, ',', '.');
            ?>
        </td>
        <td>
            <?php
            // Display unique food names for each transaction
            $foods = array_map(function($transaction) {
                return explode(', ', $transaction->nama);
            }, $transactions);
            foreach (array_unique(array_merge(...$foods)) as $food) {
                echo $food . '<br>';
            }
            ?>
        </td>
        <td class="status"><?= $firstTransaction->status ?></td>
        <td>
            <button class="btn btn-outline-danger btn-sm btn-status" data-kode-transaksi="<?= $kodeTransaksi ?>" title="Update Status">
    <i class="fas fa-cogs"></i>
</button>

<button class="btn btn-outline-success btn-sm btn-status-pembayaran" data-kode-transaksi="<?= $kodeTransaksi ?>" title="Update Status Pembayaran">
    <i class="fas fa-credit-card"></i>
</button>

        </td>
    </tr>
    <?php endforeach; ?>
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Status Update -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="statusForm" >
                        <div class="form-group">
                            <label for="statusSelect">Status</label>
                            <select class="form-control" id="statusSelect" name="status">
                                <option value="READY">READY</option>
                                <option value="WAITLIST">WAITLIST</option>
                                <option value="UNPREPARED">UNPREPARED</option>
                                <option value="CONFIRMED">CONFIRMED</option>
                            </select>
                        </div>
                        <input type="hidden" id="kodeTransaksi" name="kode_transaksi">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Payment Status Update -->
    <div class="modal fade" id="paymentStatusModal" tabindex="-1" role="dialog" aria-labelledby="paymentStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentStatusModalLabel">Update Status Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="paymentStatusForm">
                        <div class="form-group">
                            <label for="paymentStatusSelect">Status Pembayaran</label>
                            <select class="form-control" id="paymentStatusSelect" name="status_pembayaran">
                                <option value="PAID">PAID</option>
                                <option value="PENDING">PENDING</option>
                                <option value="CANCELLED">CANCELLED</option>
                            </select>
                        </div>
                        <input type="hidden" id="paymentKodeTransaksi" name="kode_transaksi">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#imageModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var src = button.data('src');
            var modal = $(this);
            modal.find('#imagePreview').attr('src', src);
        });

        $('.btn-status').click(function() {
            var kodeTransaksi = $(this).data('kode-transaksi');
            $('#kodeTransaksi').val(kodeTransaksi);
            $('#statusModal').modal('show');
        });

        $('.btn-status-pembayaran').click(function() {
            var kodeTransaksi = $(this).data('kode-transaksi');
            $('#paymentKodeTransaksi').val(kodeTransaksi);
            $('#paymentStatusModal').modal('show');
        });

        $('#statusForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url('home/aksi_e_pesanan') ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('#paymentStatusForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url('home/aksi_e_pembayaran') ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('#filterForm').submit(function(event) {
            event.preventDefault();
            var statusFilter = $('#statusFilter').val().toLowerCase();
            if (statusFilter == '') {
                $('.order-row').show();
            } else {
                $('.order-row').each(function() {
                    var status = $(this).data('status').toLowerCase();
                    if (status === statusFilter) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    });
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
