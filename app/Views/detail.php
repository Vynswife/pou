<div class="content-body">
    <div class="container-fluid">
                <div class="row">

<div class="col-xl-12 col-lg-12 col-sm-12 col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Profile details <?= $php->username?></h4>
                                <div id="activity">
                                        
                                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <p class="small fst-italic"></p>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-19 col-md-19"><?= $php->username?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jenis kelamin</div>
                    <div class="col-lg-19 col-md-19"><?= $php->jk?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">password</div>
                    <div class="col-lg-19 col-md-19"><?= $php->pw?></div>
                  </div>
                                    <div>
                                    <?php if(session()->get('level')==1){?>
                    <a href="<?=base_url('home/e_user/'.$php->id_user)?>">
          <button class="btn btn-primary">configure acc <i class="fa fa-paper-plane font-18 align-middle mr-2"></i></i></button></a></td>
          <?php }?></div>
                            </div>
                        </div>
                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12 text-end">
                                            <a href="<?= base_url('home/e_user/'.$php->id_user) ?>" class="btn btn-secondary">Edit <i class="fa fa-pencil-alt font-18 align-middle"></i></a>
                                            
                                                <a href="<?= base_url('home/h_user/'.$php->id_user) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete <i class="fa fa-trash font-18 align-middle"></i></a>
                                           
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
s