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
          <h1 class="h3 mb-2 text-gray-800">Detail Booking</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Ruangan:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>Meeting Room (get DB)</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Tanggal:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>18/03/2020 (get DB)</p>
                </div>
              </div>
              
              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Durasi:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>08.00-09.00 (get DB)</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Komunitas:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>NEKAD Dev (get DB)</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Nama Penanggung Jawab:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>Ryan Hartadi (get DB)</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Jumlah Peserta:</p>
                </div>
                <div class="my-auto col-sm-1">
                  <p>4</p>
                </div>
                <p>orang</p>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Tema Kegiatan:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>Meeting (get DB)</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Deskripsi Kegiatan:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>Meeting pembuatan aplikasi EJSC Bakorwil V Jember (get DB)</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Peminjaman Alat:</p>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataAlat" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width:10px">No</th>
                      <th>Nama Alat</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <a href="<?php echo site_url('admin/booking') ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
              </a>

            </div>
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

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
