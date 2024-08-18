<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="navbar-brand d-flex align-items-center justify-content-center" href="http://localhost:8080/home/beranda">
        <img src="<?= base_url('images/' . (isset($jes[0]->logo) ? $jes[0]->logo : 'default_logo.png')) ?>" alt="Logo" style="width: 110px; height: auto;" class="img-profile rounded-circle">
        <div style="font-size: 20px; color: #333; font-weight: bold;">
          <?= isset($jes[0]->nama_toko) ? $jes[0]->nama_toko : 'Default Name' ?>
        </div>

      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost:8080/home/beranda">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
        </li>

        
          <hr class="sidebar-divider">
          
          <!-- Heading -->
          <div class="sidebar-heading">
            Interface
          </div>

          <!-- bagian user dan manager(crud) -->
          
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:8080/home/Keranjang">
              <i class="fas fa-fw fa-book"></i>
              <span>Menu</span></a>
            </li>

            <?php
        if(session()->get('level')==2 || session()->get('level') == 1){
          ?>
            <li class="nav-item">
              <a class="nav-link " href="http://localhost:8080/home/history" >
                <i class="fas fa-fw fa-history"></i>
                <span>History</span>
              </a>
            </li>
          <?php } ?>






          <!-- bagian admin -->


          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->

          <?php
          if(session()->get('level')==2 ){
            ?>

            <li class="nav-item">
              <a class="nav-link " href="http://localhost:8080/home/setting" >
                <i class="fas fa-fw fa-cogs"></i>
                <span>Setting</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="http://localhost:8080/home/laporan" >
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Laporan</span>
              </a>
            </li>
          <?php } ?>
          
          <?php
          if(session()->get('level')==2 || session()->get('level') == 3){
            ?>
            <li class="nav-item">
              <a class="nav-link " href="http://localhost:8080/home/pesanan" >
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Pesanan</span>
              </a>
            </li>
          <?php } ?>
                    <?php
          if(session()->get('level')==2){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/home/user">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Users</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/home/activity_log">
                <i class="fas fa-fw fa-users"></i>
                <span>Activity log</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/home/history_edit">
                <i class="fas fa-fw fa-users"></i>
                <span>Edit history</span>
              </a>
            </li>
          <?php } ?>

          
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">




          </ul>
          <!-- End of Sidebar -->

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

              <!-- Topbar -->
              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                  <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small"
                      placeholder="Search for..." aria-label="Search"
                      aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">hi <?=session()->get('username')?>!</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
              aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?=base_url('home/profile/'.session()->get('id'))?>">

                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="<?=base_url('home/Logout')?>">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
</a>

            </div>
          </li>
            </ul>

          </nav>