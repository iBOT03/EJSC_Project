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
          <h1 class="h3 mb-2 text-gray-800">Ubah Data Komunitas</h1>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control bg-gray-200 border-0 small mb-3"
                           placeholder="Masukkan Nama Komunitas"
                           aria-describedby="basic-addon2"
                           required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Email Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control bg-gray-200 border-0 small mb-3"
                           placeholder="Masukkan Email Komunitas"
                           aria-describedby="basic-addon2"
                           required>
                  </div>  
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Ketua Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control bg-gray-200 border-0 small mb-3"
                           placeholder="Masukkan Nama Ketua Komunitas"
                           aria-describedby="basic-addon2"
                           required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Kategori Komunitas</p>
                  <div class="input-group">
                    <select class="form-control bg-gray-200 border-0 small mb-3"
                            id="kategori_komunitas"
                            name="kategori_komunitas">
                      <option value="-"></option>
                    </select>
                  </div>
                </div>
              </div>
            
              <p>Alamat Komunitas</p>
              <div class="input-group">
                <input type="text"
                       class="form-control bg-gray-200 border-0 small mb-3"
                       placeholder="Masukkan Alamat Komunitas"
                       aria-describedby="basic-addon2"
                       required>
              </div>

              <p>Deskripsi Komunitas</p>
              <div class="input-group">
                <input type="text"
                       class="form-control bg-gray-200 border-0 small mb-3"
                       placeholder="Masukkan Deskripsi Komunitas"
                       aria-describedby="basic-addon2"
                       required>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Telepon/Whatsapp</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control bg-gray-200 border-0 small mb-3"
                           placeholder="Masukkan No Telepon/Whatsapp Komunitas"
                           aria-describedby="basic-addon2"
                           required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Twitter</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control bg-gray-200 border-0 small mb-3"
                           placeholder="Masukkan Twitter Komunitas"
                           aria-describedby="basic-addon2">
                  </div>
                </div>
            </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Facebook</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control bg-gray-200 border-0 small mb-3"
                           placeholder="Masukkan Facebook Komunitas"
                           aria-describedby="basic-addon2">
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Instagram</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control bg-gray-200 border-0 small mb-3"
                           placeholder="Masukkan Instagram Komunitas"
                           aria-describedby="basic-addon2">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Upload Logo Komunitas</p>
                  <div class="input-group">
                    <input name="foto" id="foto"
                           type="file"
                           class="form-control bg-gray-200 border-0 small mb-3"
                           placeholder=""
                           aria-describedby="basic-addon2"
                           required>
                  </div>
                </div>
              </div>

              <button type="submit" href="<?php echo site_url('admin/komunitas') ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Ubah Data Komunitas</span>
              </button>
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
