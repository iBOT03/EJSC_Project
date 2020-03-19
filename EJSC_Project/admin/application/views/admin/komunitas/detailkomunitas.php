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
          <h1 class="h3 mb-2 text-gray-800">Detail Komunitas</h1>
          <?php foreach($komunitas as $a) {?>
          <div class="card shadow mb-4">
            <div class="card-body">

              <img src="<?= base_url('uploads/') . $a->LOGO; ?>" alt="Logo Komunitas" class="logo-komunitas mx-auto d-block mb-5">

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Nama Komunitas:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> NAMA;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Nama Ketua Komunitas:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> NAMA_KETUA;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Kategori Komunitas:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> KATEGORI;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Alamat:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> ALAMAT;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Nomor Telepon:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> NO_TELEPON;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Email:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> EMAIL;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Facebook:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> FACEBOOK;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Twitter:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> TWITTER;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Instagram:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> INSTAGRAM;?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Deskripsi Komunitas:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $a -> DESKRIPSI_KOMUNITAS;?></p>
                </div>
              </div>
          <?php } ?>
              <a href="<?php echo site_url('admin/komunitas') ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
              </a>

            </div>
          </div>
          <!-- /.card -->

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
