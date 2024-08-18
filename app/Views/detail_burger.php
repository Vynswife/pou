<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-xxl-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Detail makanan <?= $php->nama ?></h4>

                        <div id="activity">
                            <!-- Profile Overview Tab -->
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <p class="small text-muted mb-4">Detailed information about the selected food item.</p>

                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 fw-bold">Nama Makanan:</div>
                                    <div class="col-lg-9 col-md-8"><?= htmlspecialchars($php->nama) ?></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 fw-bold">Gambar:</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php if (!empty($php->gambar)): ?>
                                            <img src="<?= base_url('img/' . htmlspecialchars($php->gambar)) ?>" alt="<?= htmlspecialchars($php->nama) ?>" class="img-fluid rounded">
                                        <?php else: ?>
                                            <p class="text-muted">No image available</p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 fw-bold">Harga:</div>
                                    <div class="col-lg-9 col-md-8"><?= htmlspecialchars($php->harga) ?></div>
                                </div>

                                <?php if(session()->get('level') == 1): ?>
                                    <a href="<?= base_url('home/e_user/' . $php->id_user) ?>" class="btn btn-primary">
                                        Configure Account <i class="fa fa-paper-plane ms-2"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include CSS for enhanced styling -->
<style>
    .card {
        border-radius: 10px;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.5rem;
        color: #333;
    }

    .label {
        font-weight: bold;
    }

    .fw-bold {
        font-weight: 600;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .rounded {
        border-radius: 0.375rem;
    }

    .btn-primary {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }

    .btn-primary i {
        font-size: 1.2rem;
    }

    .text-muted {
        color: #6c757d;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .ms-2 {
        margin-left: 0.5rem;
    }
</style>
