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
      <form action="" method="post">
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php foreach ($kat as $k) { ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Ubah Data Kategori Komunitas</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                    <p>Kategori Komunitas</p>
                    <div class="input-group">
                    <input name="namaalat"
                            id="namaalat"
                            type="text"
                            class="form-control border-dark small mb-3"
                            placeholder="Masukkan Kategori Komunitas"
                            aria-describedby="basic-addon2"
                            value="<?php echo $k->KATEGORI;?>"
                           >
                    </div>
                    <?php echo form_error('namaalat','<small class="text-danger">','</small>')?>
                </div>
              </div>

              <button href="<?php echo site_url('admin/komunitas/kategori') ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                 </span>
                <span class="text">Ubah Kategori</span>
              </button>
              <a href="<?php echo site_url('admin/komunitas/kategori') ?>" class="btn btn-danger btn-icon-split">
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
        <?php } ?>
      </div>
      <!-- End of Main Content -->
      </form>
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
