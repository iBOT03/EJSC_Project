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
        <?php foreach($komunitas as $a){?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Ubah Data Komunitas</h1>
     
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Komunitas"
                           aria-describedby="basic-addon2"
                           value="<?php echo $a->NAMA;?>"
                           required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Email Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Email Komunitas"
                           aria-describedby="basic-addon2"
                           value="<?php echo $a->EMAIL;?>"
                           required>
                  </div>  
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Ketua Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Ketua Komunitas"
                           aria-describedby="basic-addon2"
                           value="<?php echo $a->NAMA_KETUA;?>"
                           required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Kategori Komunitas</p>
                  <div class="input-group">
                    <select class="form-control border-dark small mb-3"
                            id="kategori_komunitas"
                            name="kategori_komunitas">
                      <option value="<?php echo $a->KATEGORI?>"></option>
                    </select>
                  </div>
                </div>
              </div>
            
              <p>Alamat Komunitas</p>
              <div class="input-group">
                <input type="text"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Alamat Komunitas"
                       aria-describedby="basic-addon2"
                       value="<?php echo $a->ALAMAT;?>"
                       required>
              </div>

              <p>Deskripsi Komunitas</p>
              <div class="input-group">
                <input type="text"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Deskripsi Komunitas"
                       aria-describedby="basic-addon2"
                       value="<?php echo $a->DESKRIPSI_KOMUNITAS;?>"
                       required>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Telepon/Whatsapp</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan No Telepon/Whatsapp Komunitas"
                           aria-describedby="basic-addon2"
                           value="<?php echo $a->NO_TELEPON;?>"
                           required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Twitter</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Twitter Komunitas"
                           value="<?php echo $a->TWITTER;?>"
                           aria-describedby="basic-addon2">
                  </div>
                </div>
            </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Facebook</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Facebook Komunitas"
                           value="<?php echo $a->FACEBOOK;?>"
                           aria-describedby="basic-addon2">
                  </div>
                </div>

                <div class="col-sm-6">
                  <p>Instagram</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Instagram Komunitas"
                           value="<?php echo $a->INSTAGRAM;?>"
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
      <?php } ?>
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
