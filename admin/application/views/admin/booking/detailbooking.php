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
          <?php foreach($booking as $b):?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Ruangan:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->NAMA_RUANGAN?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Tanggal:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->TANGGAL_MULAI?></p>
                </div>
              </div>
              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Durasi:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->DURASI?> Jam</p>
                </div>
              </div>
             
              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Jam:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->JAM_MULAI?> - <?= $b->JAM_SELESAI?></p>
                </div>
              </div>
              
              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Komunitas:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->NAMA_KOMUNITAS?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>NIK:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->NIK?></p>
                </div>
              </div>
              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Nama Penanggung Jawab:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->NAMA?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Jumlah Peserta:</p>
                </div>
                <div class="my-auto col-sm-1">
                  <p><?= $b->JUMLAH_ORANG ?></p>
            
                </div>
                <p>Orang</p>
               
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Tema Kegiatan:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->TUJUAN?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Deskripsi Kegiatan:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $b->DESKRIPSI_KEGIATAN?></p>
                </div>
              </div>

           
              <a href="<?php echo site_url('admin/booking') ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
              </a>

            </div>
          </div>
            <?php endforeach ; ?>
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
