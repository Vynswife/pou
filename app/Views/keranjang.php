<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Burger List & Keranjang Belanja</title>
    
    <!-- Include CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fc;
        }
        .card-header {
            background-color: #4e73df;
            color: #fff;
            font-weight: bold;
        }
        .btn-success, .btn-info, .btn-outline-success, .btn-outline-danger {
            margin-right: 5px;
        }
        .table thead th {
            background-color: #4e73df;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .modal-content {
            border-radius: 8px;
        }
        .modal-header {
            border-bottom: 1px solid #e3e6f0;
        }
        .modal-footer {
            border-top: 1px solid #e3e6f0;
        }
        .modal-title {
            font-weight: bold;
        }
        .warning-text {
            color: red;
            font-size: 0.875em;
            margin-top: 10px;
        }
        .modal-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- Tabel Menu Burger List -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-white">Menu Burger List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php if(session()->get('level') == 3 || session()->get('level') == 2): ?>
                            <a href="<?= base_url('home/t_burger') ?>">
                                <button class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</button>
                            <?php endif; ?>
                            </a>
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Makanan</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Harga</th>
                                        <?php if(session()->get('level') == 3 || session()->get('level') == 2 || session()->get('level') == 1): ?>
                                        <th scope="col">Aksi</th>
                                    <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($mel as $kin): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kin->nama ?></td>
                                        <td><img src="<?= base_url('img/'.$kin->gambar) ?>" width="80px" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-src="<?= base_url('img/'.$kin->gambar) ?>"></td>
                                        <td><?= number_format($kin->harga, 0, ',', '.') ?></td>
                                        <td>
                                            <?php if(session()->get('level') == 3 || session()->get('level') == 2): ?>
                                            <a href="<?= base_url('home/h_burger/'.$kin->id_makanan) ?>" class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="<?= base_url('home/e_burger/'.$kin->id_makanan) ?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        <?php endif; ?>
                                        <button class="btn btn-outline-success btn-sm add-to-cart" data-id="<?= $kin->id_makanan ?>" data-name="<?= $kin->nama ?>" data-price="<?= $kin->harga ?>" data-toggle="modal" data-target="#addToCartModal">
                                            <i class="fa fa-shopping-cart"></i>
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
    <div class="col-md-6">
        <!-- Tabel Keranjang Belanja -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-white">Keranjang Belanja</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Makanan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga</th>
                                <?php if(session()->get('level') == 1 || session()->get('level') == 2): ?>
                                <th scope="col">Aksi</th>
                            <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($jel as $kin): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $kin->nama ?></td>
                                <td><img src="<?= base_url('img/'.$kin->gambar) ?>" width="80px" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-src="<?= base_url('img/'.$kin->gambar) ?>"></td>
                                <td><?= number_format($kin->harga, 0, ',', '.') ?></td>
                                <td><?= $kin->jumlah ?></td>
                                <td><?= number_format($kin->harga * $kin->jumlah, 0, ',', '.') ?></td>
                                <?php if(session()->get('level') == 1 || session()->get('level') == 2): ?>
                                <td>
                                    <a href="<?= base_url('home/h_keranjang/'.$kin->id_keranjang) ?>" class="btn btn-outline-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <button class="btn btn-outline-info btn-sm edit-cart" data-id="<?= $kin->id_keranjang ?>" data-name="<?= $kin->nama ?>" data-quantity="<?= $kin->jumlah ?>" data-price="<?= $kin->harga ?>" data-toggle="modal" data-target="#editCartModal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                </td>
                            <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Pesan -->
            <button class="btn btn-success mt-3" id="btn-bayar" data-toggle="modal" data-target="#modalBayar">
                <i class="fas fa-shopping-cart"></i> Pesan
            </button>
        </div>
    </div>
</div>


<!-- Modal Add to Cart -->
<div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel">Tambah ke Keranjang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_t_keranjang') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                    </div>
                    <input type="hidden" name="id_makanan" id="id_makanan">
                    <input type="hidden" name="nama_makanan" id="nama_makanan">
                    <input type="hidden" name="id_user" id="id_user" value="<?=session()->get('id')?>">
                    <input type="hidden" name="total_harga" id="total_harga">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <div class="modal fade" id="editCartModal" tabindex="-1" role="dialog" aria-labelledby="editCartModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCartModalLabel">Edit Jumlah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('home/aksi_e_keranjang') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_nama_makanan">Nama Makanan</label>
                                <input type="text" name="edit_nama_makanan" id="edit_nama_makanan" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="edit_jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="edit_jumlah" class="form-control" required>
                                <input type="hidden" name="id_keranjang" id="edit_id_keranjang">
                            </div>
                            <div id="edit_warning" class="warning-text"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- Modal Image -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modal_image" src="" alt="Gambar Makanan" class="modal-image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bayar -->
<!-- Modal Bayar -->
<div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="modalBayarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBayarLabel">Detail Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_bayar') ?>" method="post" id="paymentForm">
                <div class="modal-body">
                    <!-- Daftar Item Keranjang -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Makanan</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1; 
                                $totalHarga = 0; 
                                foreach ($jel as $kin): 
                                    $totalHarga += $kin->total_harga; 
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kin->nama ?></td>
                                        <td><?= number_format($kin->harga, 0, ',', '.') ?></td>
                                        <td><?= $kin->jumlah ?></td>
                                        <td><?= number_format($kin->total_harga, 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                    <td><strong><?= number_format($totalHarga, 0, ',', '.') ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pilih Metode Pembayaran -->
                    <div class="form-group">
                        <label for="paymentMethod">Metode Pembayaran:</label>
                        <select id="paymentMethod" name="payment_method" class="form-control">
                            <option value="dana">Dana</option>
                            <option value="bca">BCA</option>
                        </select>
                    </div>

                    <!-- Alamat Pengiriman -->
                    <div class="form-group">
                        <label for="address">Alamat Pengiriman:</label>
                        <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                    </div>

                    <!-- Kirim Data Keranjang -->
                    <?php foreach ($jel as $kin): ?>
                        <input type="hidden" name="keranjang[<?= $kin->id_keranjang ?>][id]" value="<?= $kin->id_keranjang ?>">
                        <input type="hidden" name="keranjang[<?= $kin->id_keranjang ?>][id_makanan]" value="<?= $kin->id_makanan ?>">
                        <input type="hidden" name="keranjang[<?= $kin->id_keranjang ?>][jumlah]" value="<?= $kin->jumlah ?>">
                        <input type="hidden" name="keranjang[<?= $kin->id_keranjang ?>][total_harga]" value="<?= $kin->total_harga ?>">
                    <?php endforeach; ?>

                    <div class="form-group">
                        <label for="catatan">Catatan:</label>
                        <textarea id="catatan" name="catatan" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Warning Message -->
                    <div class="warning-text" id="warningMessage" style="display: none;">
                        Harap pilih item dari menu dan isi alamat pengiriman sebelum melakukan pembayaran.
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                    
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Include JS libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script>
$(document).ready(function() {
    // Handle Add to Cart button click
    $('.add-to-cart').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var price = $(this).data('price');
        
        $('#id_makanan').val(id);
        $('#nama_makanan').val(name);
        $('#total_harga').val(price); // Add this line

        // Update the total price when the quantity changes
        $('#jumlah').on('input', function() {
            var quantity = $(this).val();
            var totalPrice = price * quantity;
            $('#total_harga').val(totalPrice.toFixed(2));
        });
    });

    // Handle Edit Cart button click
    $('.edit-cart').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var quantity = $(this).data('quantity');
        var price = $(this).data('price');
        
        $('#edit_id_keranjang').val(id);
        $('#edit_nama_makanan').val(name);
        $('#edit_jumlah').val(quantity);
        
        // Calculate new total price
        var totalPrice = price * quantity;
        $('#edit_warning').text('Total Harga: ' + totalPrice.toFixed(2));
    });

    // Handle image modal
    $('#imageModal').on('show.bs.modal', function(e) {
        var imgSrc = $(e.relatedTarget).data('src');
        $('#modal_image').attr('src', imgSrc);
    });
    $('#edit_jumlah').on('input', function() {
    var quantity = $(this).val();
    var price = $('#editCartModal').data('price');
    var totalPrice = price * quantity;
    $('#edit_warning').text('Total Harga: ' + totalPrice.toFixed(2));
});

    $('.edit-cart').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var quantity = $(this).data('quantity');
            var price = $(this).data('price');
            
            $('#edit_id_keranjang').val(id);
            $('#edit_nama_makanan').val(name);
            $('#edit_jumlah').val(quantity);
            
            // Calculate new total price
            var totalPrice = price * quantity;
            $('#edit_warning').text('Total Harga: ' + totalPrice.toFixed(2));
        });

        // Handle Add to Cart button click
        $('.add-to-cart').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var price = $(this).data('price');
            
            // Set the modal values
            $('#add_id_makanan').val(id);
            $('#add_nama_makanan').val(name);
            $('#add_harga').val(price);
        });

        // Show selected image in modal
        $('#imageModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var src = button.data('src');
            var modal = $(this);
            modal.find('#modalImage').attr('src', src);
        });

        $(document).ready(function() {
    // Handle Add to Cart button click
    $('.add-to-cart').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var price = $(this).data('price');
        
        $('#id_makanan').val(id);
        $('#nama_makanan').val(name);
        $('#total_harga').val(price); // Add this line

        // Update the total price when the quantity changes
        $('#jumlah').on('input', function() {
            var quantity = $(this).val();
            if (quantity < 1) {
                quantity = 1;
                $(this).val(quantity);
            }
            var totalPrice = price * quantity;
            $('#total_harga').val(totalPrice.toFixed(2));
        });
    });

    // Handle Edit Cart button click
    $('.edit-cart').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var quantity = $(this).data('quantity');
        var price = $(this).data('price');
        
        $('#edit_id_keranjang').val(id);
        $('#edit_nama_makanan').val(name);
        $('#edit_jumlah').val(quantity);
        
        // Calculate new total price
        var totalPrice = price * quantity;
        $('#edit_warning').text('Total Harga: ' + totalPrice.toFixed(2));

        // Update the total price when the quantity changes
        $('#edit_jumlah').on('input', function() {
            var quantity = $(this).val();
            if (quantity < 1) {
                quantity = 1;
                $(this).val(quantity);
            }
            var totalPrice = price * quantity;
            $('#edit_warning').text('Total Harga: ' + totalPrice.toFixed(2));
        });
    });

    // Handle image modal
    $('#imageModal').on('show.bs.modal', function(e) {
        var imgSrc = $(e.relatedTarget).data('src');
        $('#modal_image').attr('src', imgSrc);
    });
});


});

</script>
</body>
</html>