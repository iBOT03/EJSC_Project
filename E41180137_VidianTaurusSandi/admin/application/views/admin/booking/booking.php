<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Head -->
  <?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <!-- Topbar -->
      <?php $this->load->view("admin/_partials/topbar.php") ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Jadwal Booking</h1>

          <!-- Sub Topbar -->
          <div class="card shadow mb-4">
            <nav class="navbar navbar-expand card-header py-3">

              <div class="col-sm-2">
                <a href="<?php echo site_url('admin/booking/tambah')?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text"> Booking</span>
                </a>
              </div>

              <ul class="navbar-nav ml-auto">
                <!-- Ruangan -->
                <li class="col-lg-5">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-info dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                      Ruangan
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">-</a>
                    </div>
                  </div>              
                </li>
                <!-- Tanggal -->
                <li class="col-lg-5">
                  <input class="btn btn-sm btn-info dropdown-toggle"
                         type="date" id="filtertanggal" name="filtertanggal"                            
                         data-date-format="yyyy-mm-dd">
                  </input>
                </li>
              </ul> <!-- End Row -->
            </nav>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 30px">Jam</th>
                      <th>Komunitas</th>
                      <th>Kegiatan</th>
                      <th>Peminjaman Alat</th>
                      <th style="width: 60px">Status</th>
                      <th style="width: 100px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>jam get dari datepicker, jaraknya 1 jam</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <a href="<?php echo site_url('admin/booking/detail') ?>"
                           class="btn btn-sm btn-primary btn-circle">
                          <i class="fas fa-plus"></i>
                        </a>
                        <a href="<?php echo site_url('admin/booking/edit') ?>"
                           class="btn btn-sm btn-info btn-circle">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#"
                           class="btn btn-sm btn-danger btn-circle"
                           data-toggle="modal" data-target="#hapusModal">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> <!-- End Card Body -->
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

    <script type="text/javascript">
        function confirm_modal(delete_url) {
            $('#hapusModal').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
