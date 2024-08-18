
    <style>
        .invoice {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .invoice-header, .invoice-body, .invoice-footer {
            margin-bottom: 20px;
        }
        .invoice-header h5 {
            margin: 0;
            font-weight: bold;
        }
        .invoice-body p {
            margin: 0;
            padding: 5px 0;
            border-bottom: 1px dashed #ddd;
        }
        .product-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        .product-info .info {
            display: flex;
            flex-direction: column;
        }
        .product-info .price {
            text-align: right;
            font-weight: bold;
        }
        .invoice-footer {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Keranjang</h3>
                </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="javascript:void(0);" id="btn-bayar">
                        <button class="btn btn-success round">Pesan</button>
                    </a>
                </div>
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>No</th>      
                                <th>Nama Produk</th>
                                <th>Foto</th>
                                <th>Jumlah</th>
                                <th>Total harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach($jes as $kin){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?=$kin->nama_produk?></td> 
                                <td>
                                    <img src="<?php echo base_url('images/'.$kin->foto)?>" style="width: 120px; height: auto;">
                                </td>
                                <td><?=$kin->jumlah?></td>
                                <td><?=$kin->total_harga?></td>
                                <td>
                                    <a href="<?= base_url('home/hapuskeranjang/'.$kin->id_keranjang)?>">
                                        <button class="btn btn-danger btn-sm round">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Bayar -->
    <div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="modalBayarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBayarLabel">Detail Pembayaran</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="invoice">
                        <div class="invoice-header">
                            <h5>Pesanan</h5>
                        </div>
                        <div class="invoice-body" id="order-details">
                            <!-- Detail produk akan ditambahkan di sini -->
                        </div>
                        <div class="invoice-footer">
                            Total Pesanan: <span id="total-harga"></span>
                        </div>
                    </div>
                </div>
               <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <a href="<?= base_url('home/aksibayar') ?>">
    <button type="button" class="btn btn-primary" id="btn-bayar-confirm">Bayar</button>
    </a>
</div>

<!-- Script untuk modal -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
document.getElementById('btn-bayar').addEventListener('click', function() {
    var tbody = document.querySelector('#table1 tbody');
    var rows = tbody.querySelectorAll('tr');
    var orderDetails = '';
    var totalHarga = 0;
    
    rows.forEach(function(row) {
        var namaProduk = row.querySelector('td:nth-child(2)').textContent;
        var jumlah = row.querySelector('td:nth-child(4)').textContent;
        var totalHargaProduk = parseFloat(row.querySelector('td:nth-child(5)').textContent);
        
        orderDetails += '<div class="product-info">' +
                            '<div class="info">' +
                                '<div>' + namaProduk + '</div>' +
                                '<div>Jumlah: ' + jumlah + '</div>' +
                            '</div>' +
                            '<div class="price">Total Harga: ' + totalHargaProduk.toFixed(2) + '</div>' +
                        '</div>';
        totalHarga += totalHargaProduk;
    });
    
    document.getElementById('order-details').innerHTML = orderDetails;
    document.getElementById('total-harga').textContent = totalHarga.toFixed(2);
    
    $('#modalBayar').modal('show');
});

document.querySelector('.modal-footer .btn-secondary').addEventListener('click', function() {
    $('#modalBayar').modal('hide');
});
</script>

</body>
</html>