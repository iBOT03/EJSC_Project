    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div class="sidebar-brand d-flex align-items-center justify-content-center"
          href="<?php echo site_url('admin/dashboard') ?>">
          <img src="<?php echo base_url('img/jatim.png') ?>" style="width:50px">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKomunitas" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Komunitas</span>
        </a>
        <div id="collapseKomunitas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/komunitas') ?>">Data Komunitas</a>
            <a class="collapse-item" href="<?php echo site_url('admin/komunitas/kategori') ?>">Kategori Komunitas</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Booking
      </div>

      <!-- Nav Item - Jadwal Booking -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/booking') ?>">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Jadwal Booking</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Event
      </div>

      <!-- Nav Item - Event Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Event</span>
        </a>
        <div id="collapseEvent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/event') ?>">Event</a>
            <a class="collapse-item" href="<?php echo site_url('admin/seminar') ?>">Seminar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master Data
      </div>

      <!-- Nav Item - Tentang Kami Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTentang" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-info"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseTentang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/ruangan') ?>">Ruangan</a>
            <a class="collapse-item" href="<?php echo site_url('admin/alat') ?>">Alat</a>
            <a class="collapse-item" href="<?php echo site_url('admin/tentang') ?>">Tentang Kami</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->