<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('home'); ?>" target="_blank" class="nav-link">Website</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Selamat Datang <?= $this->session->userdata('nama_user'); ?></span>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('profile'); ?>" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Profile
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
            <!-- <span class="float-right text-muted text-sm">2 days</span> -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Login : <?= $this->session->userdata('level') == 1 ? 'Admin' : 'User'; ?></a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
      <!-- <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Toko Online CI3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama_user'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link<?= $this->uri->segment(2) == 'dashboard' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> -->
          <?php if($this->session->userdata('level') == 1) : ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/user'); ?>" class="nav-link<?= $this->uri->segment(2) == 'user' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>User</p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/kategori'); ?>" class="nav-link<?= $this->uri->segment(2) == 'kategori' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-tag"></i>
              <p>Kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/barang'); ?>" class="nav-link<?= $this->uri->segment(2) == 'barang' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-truck"></i>
              <p>Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/gambarBarang'); ?>" class="nav-link<?= $this->uri->segment(2) == 'gambarBarang' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-image"></i>
              <p>Gambar Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/pesanan'); ?>" class="nav-link<?= $this->uri->segment(2) == 'pesanan' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Pesanan Masuk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/laporan'); ?>" class="nav-link<?= $this->uri->segment(2) == 'laporan' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan</p>
            </a>
          </li>
          <?php if($this->session->userdata('level') == 1) : ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/pengaturan'); ?>" class="nav-link<?= $this->uri->segment(2) == 'pengaturan' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Pengaturan</p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
          
          
          
          
          <!-- <li class="nav-header">EXAMPLES</li> -->
          
          
          
          <!-- <li class="nav-header">MULTI LEVEL EXAMPLE</li> -->
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">