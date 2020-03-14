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
          <h1 class="h3 mb-2 text-gray-800">Tambah Data Event</h1>

          <div class="card shadow mb-4">
            <div class="card-body">          
              <p>Judul Event</p>
              <form class="">
                <div class="input-group">
                  <input type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2">
                </div>
              </form>

              <div class="row">
                <div class="col-sm-6">
                  <p>Penyelenggara</p>
                  <form class="">
                    <div class="input-group">
                      <input type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2">
                    </div>
                  </form>
                </div>

                <div class="col-sm-6">
                  <p>Poster</p>
                  <form class="">
                    <div class="input-group">
                      <input type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2">
                    </div>
                  </form>  
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Tanggal</p>
                  <form class="">
                    <div class="input-group">
                      <input type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2">
                    </div>
                  </form>
                </div>

                <div class="col-sm-6">
                  <p>Status</p>
                  <form class="">
                    <div class="input-group">
                      <input type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2">
                    </div>
                  </form>
                </div>
              </div>
              
              <p>Keterangan Event</p>
                <form class="">
                  <div class="input-group">
                    <input type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2">
                  </div>
                </form>

              <a href="<?php echo site_url('admin/event') ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Event</span>
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
