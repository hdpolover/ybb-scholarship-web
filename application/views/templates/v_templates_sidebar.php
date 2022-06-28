<body>

  <div id="app">

    <div class="main-wrapper">

      <div class="navbar-bg"></div>

      <nav class="navbar navbar-expand-lg main-navbar">

        <form class="form-inline mr-auto">

          <ul class="navbar-nav mr-3">

            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>

          </ul>

        </form>

        <ul class="navbar-nav navbar-right">

          <!-- menu drop down sebelah kanan untuk lougout -->

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">



              <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama_lengkap') ?></div>
            </a>



    </div>

    </li>

    </ul>

    </nav>

    <!-- custom menu dalam dashboard -->

    <div class="main-sidebar">

      <aside id="sidebar-wrapper">

        <div class="sidebar-brand">

          <a href="" class="">Sistem Enkripsi AES</a>

        </div>

        <div class="sidebar-brand sidebar-brand-sm">

          <a href="<?= base_url('dashboard') ?>">AES</a>

        </div>

        <ul class="sidebar-menu mt-3">

          <li><a class="nav-link" href="<?= base_url('admin/home') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

          <?php if ($this->session->userdata('hak_akses') == 'admin') { ?>

            <li><a class="nav-link" href="<?= base_url('admin/data_admin') ?>"><i class="fas fa-users"></i> <span>Data Admin</span></a></li>

            <li><a class="nav-link" href="<?= base_url('admin/data_pengguna') ?>"><i class="fas fa-users"></i> <span>Data Pengguna</span></a></li>

          <?php } ?>

          <?php if ($this->session->userdata('hak_akses') == 'pengguna') { ?>

            <li><a class="nav-link" href="<?= base_url('admin/decrypt') ?>"><i class="fas fa-lock-open"></i> <span>Proses Enkripsi</span></a></li>

            <li><a class="nav-link" href="<?= base_url('admin/file') ?>"><i class="fas fa-file-alt"></i> <span>Daftar Berkas</span></a></li>

            <li><a class="nav-link" href="<?= base_url('admin/home/profil') ?>"><i class="fas fa-user"></i> <span>Profil</span></a></li>

          <?php } ?>

          <li><a class="nav-link" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>

        </ul>

      </aside>

    </div>