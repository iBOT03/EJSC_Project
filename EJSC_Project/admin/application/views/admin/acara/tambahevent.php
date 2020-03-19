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

        <form method="post" action="<?= site_url('admin/event/tambahevent')?>">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tambah Data Event</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <p>Judul Event</p>
              <div class="input-group">
                <input name="judulevent"
                       id="judulevent"
                       type="text"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Judul Event"
                       aria-describedby="basic-addon2"
                       required>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Penyelenggara</p>
                  <div class="input-group">
                    <input name="penyelenggara"
                           id="penyelenggara"
                           type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Penyelenggara"
                           aria-describedby="basic-addon2"
                           required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <p>Upload Poster Event</p>
                  <div class="input-group">
                    <input name="posterevent"
                          id="posterevent"
                          type="file"                                                   
                          class="form-control border-dark small mb-3"
                          placeholder=""
                          aria-describedby="basic-addon2"
                          required>
                  </div>
                </div>
              </div>

                <div class="input-group">
                  <p>Tanggal</p>
                  <div class="input-group">
                    <input type="date"
                          id="tanggal"
                          name="tanggal"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Tanggal"
                          aria-describedby="basic-addon2"
                          required>
                  </div>
                </div>
              
              <p>Keterangan Event</p>
              <div class="input-group">
                <input id="keterangan"
                       name="keterangan"
                       type="text"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Keterangan Event"
                       aria-describedby="basic-addon2"
                       required>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Upload Surat Perijinan Komunitas</p>
                  <div class="input-group">
                    <input name="suratperijinan"
                           id="suratperijinan"
                           type="file"                                                   
                           class="form-control border-dark small mb-3"
                           placeholder=""
                           aria-describedby="basic-addon2"
                           required>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Event</span>
              </button>
              <a href="<?php echo site_url('admin/event') ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
              </a>

            </div>
          </div>
          <!-- /.card -->

        </form>

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