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
          <h1 class="h3 mb-2 text-gray-800">Tambah Data Komunitas</h1>
       
            <form action="" method="post" enctype="multipart/form-data">
     
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                        name="nama_komunitas"
                        id="nama_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Komunitas"
                           aria-describedby="basic-addon2"
                           value="">
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Email Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                    id="email_komunitas"
                    name="email_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Email Komunitas"
                           aria-describedby="basic-addon2"
                           value="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Ketua Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                           id="ketua_komunitas"
                           name="ketua_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Ketua Komunitas"
                           aria-describedby="basic-addon2"
                           value="">
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Kategori Komunitas</p>
                  <div class="input-group">
                    <select class="form-control border-dark small mb-3"
                            id="kategori_komunitas"
                            name="kategori_komunitas"
                            value="">
                         <option value=""></option>
                    </select>
                  </div>
                </div>
              </div>
            
              <p>Alamat Komunitas</p>
              <div class="input-group">
                <textarea type="text"
                       id="alamat_komunitas"
                       name="alamat_komunitas"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Alamat Komunitas"
                       value=""
                       aria-describedby="basic-addon2"></textarea>
              </div>
              <p>Deskripsi Komunitas</p>
              <div class="input-group">
                <textarea type="text"
                       id="deskripsi_komunitas"
                       name="deskripsi_komunitas"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Deskripsi Komunitas"
                       value=""
                       aria-describedby="basic-addon2"></textarea>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Telepon/Whatsapp</p>
                  <div class="input-group">
                    <input type="text"
                    id="no_komunitas"
                    name="no_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan No Telepon/Whatsapp Komunitas"
                           value=""
                           aria-describedby="basic-addon2">
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Twitter</p>
                  <div class="input-group">
                    <input type="text"
                    id="twitter_komunitas"
                    name="twitter_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Twitter Komunitas"
                           value=""
                           aria-describedby="basic-addon2">
                  </div>
                </div>
            </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Facebook</p>
                  <div class="input-group">
                    <input type="text"
                    id="facebook_komunitas"
                    name="facebook_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Facebook Komunitas"
                           value=""
                           aria-describedby="basic-addon2">
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Instagram</p>
                  <div class="input-group">
                    <input type="text"
                    id="ig_komunitas"
                    name="ig_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Instagram Komunitas"
                           value=""
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
                           class="form-control border-dark small mb-3"
                           placeholder=""
                           aria-describedby="basic-addon2">
                  </div>
                </div>
              </div>

              <button type="submit" href="<?php echo site_url('admin/komunitas/tambahdata') ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Komunitas</span>
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
        </form>
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
