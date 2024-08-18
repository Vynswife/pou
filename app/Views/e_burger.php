<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-6">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Your Menu</h1>
                            </div>
                            <form action="<?= base_url('home/aksi_e_burger') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama Makanan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama makanan" value="<?= $php->nama ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" value="<?= $php->harga ?>" required>
                                </div>

                                <div class="form-group">
                                            <label for="yourUsername" class="form-label">Foto burger</label>
                                            <div class="pt-2">
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                        </div>

                                <input type="hidden" name="id" value="<?= $php->id_makanan ?>">

                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
