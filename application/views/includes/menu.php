        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a onclick="localStorage.setItem('menu-aktif', 0)" class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PERPUSTAKAAN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item menu-aktif" data-id="0">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU
            </div>

            <li class="nav-item menu-aktif" data-id="1">
                <a class="nav-link" href="<?php echo base_url('kategori_buku'); ?>">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Kategori Buku</span></a>
            </li>

            <li class="nav-item menu-aktif" data-id="2">
                <a class="nav-link" href="<?php echo base_url('kategori_video'); ?>">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Kategori Video</span></a>
            </li>

            <li class="nav-item menu-aktif" data-id="3">
                <a class="nav-link" href="<?php echo base_url('buku'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Buku</span></a>
            </li>

            <li class="nav-item menu-aktif" data-id="4">
                <a class="nav-link" href="<?php echo base_url('video'); ?>">
                    <i class="fas fa-fw fa-play"></i>
                    <span>Video</span></a>
            </li>

            <li class="nav-item menu-aktif" data-id="5">
                <a class="nav-link" href="<?php echo base_url('users'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                LAINNYA
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('login/logout') ?>">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->