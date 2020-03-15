    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div class="sidebar-brand d-flex align-items-center justify-content-center"
          href="<?php echo site_url('admin/dashboard') ?>">
          <img src="../../img/jatim.png" style="width:50px">
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Pengguna
      </div>

      <!-- Nav Item - Data Pengguna Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengguna" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Pengguna</span>
        </a>
        <div id="collapsePengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/administrator') ?>">Administrator</a>
            <a class="collapse-item" href="<?php echo site_url('admin/pengguna') ?>">Pengguna</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Data Komunitas -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/komunitas') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Komunitas</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Booking
      </div>

      <!-- Nav Item - Data Booking -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/booking') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Data Booking</span></a>
      </li> -->

      <!-- Nav Item - Jadwal Booking -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/jadwalbooking') ?>">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Jadwal Booking</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Event
      </div>

      <!-- Nav Item - Data Event -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/event') ?>">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Data Event</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tentang Kami
      </div>

      <!-- Nav Item - TentangKami -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/tentang') ?>">
          <i class="fas fa-fw fa-info"></i>
          <span>Tentang Kami</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->