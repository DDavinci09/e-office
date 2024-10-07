<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">e-Office</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($this->session->userdata('level') == '1') { ?>
    <!-- Heading -->
    <div class="sidebar-heading">
    <b>Admin</b>
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><b>Dashboard</b></span></a>
    </li>
    <!-- Nav Item - Daftar User -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>admin/daftaruser">
            <i class="fas fa-fw fa-book"></i>
            <span><b>Daftar User</b></span></a>
    </li>

    <!-- Nav Item - Daftar User -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>unit/index">
            <i class="fas fa-fw fa-book"></i>
            <span><b>Daftar Unit</b></span></a>
    </li>
    <?php } ?>

    <!-- Nav Item - My profile -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>user"">
            <i class=" fas fa-fw fa-user"></i>
            <span><b>My Profile</b></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

    <!-- Heading -->
    <div class="sidebar-heading">
    <b>Menu</b>
    </div>

    <!-- Nav Item - Surat Masuk Level 1 -->
    <?php if ($this->session->userdata('level') == '1') { ?>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>suratmasuk"">
            <i class=" fas fa-fw fa-envelope-open"></i>
                <span><b>Surat Masuk</b></span></a>
        </li>
    <?php } ?>

    <!-- Nav Item - Surat Masuk Level 2 -->
    <?php if ($this->session->userdata('level') == '2') { ?>
        <!-- Nav Item - Dashboard -->
<li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><b>Dashboard</b></span></a>
    </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>disposisi/suratmasukpengguna">
                <i class=" fas fa-fw fa-envelope-open"></i>
                <span><b>Surat Masuk</b></span></a>
        </li>
    <?php } ?>

    <!-- Nav Item - Disposisi -->
    <?php if ($this->session->userdata('level') == '1') { ?>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>disposisi"">
            <i class=" fas fa-fw fa-book-open"></i>
                <span><b>Disposisi</b></span></a>
        </li>
    <?php } ?>

    <!-- Nav Item - Disposisi -->
    <?php if ($this->session->userdata('level') == '2') { ?>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>disposisi/disposisipengguna"">
            <i class=" fas fa-fw fa-book-open"></i>
                <span><b>Disposisi</b></span></a>
        </li>
    <?php } ?>

    <!-- Nav Item - Arsip -->
    <?php if ($this->session->userdata('level') == '1') { ?>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>arsip"">
            <i class=" fas fa-fw fa-book-open"></i>
                <span><b>Arsip</b></span></a>
        </li>
    <?php } ?>

    <!-- Nav Item - Arsip -->
    <?php if ($this->session->userdata('level') == '2') { ?>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>arsip/arsipPengguna"">
            <i class=" fas fa-fw fa-book-open"></i>
                <span><b>Arsip</b></span></a>
        </li>
    <?php } ?>

    <!-- Nav Item - Surat Masuk Level 2 -->
    <?php if ($this->session->userdata('level') == '1') { ?>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>suratmasuk/daftarsurat">
                <i class=" fas fa-fw fa-envelope-open"></i>
                <span><b>Laporan</b></span></a>
        </li>
    <?php } ?>


    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

    <!-- Heading -->
    <div class="sidebar-heading">
    <b>Logout</b>
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link pb-0" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->