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
          <h1 class="h3 mb-2 text-gray-800">Detail Event</h1>
          <div class="card shadow mb-4">
            <div class="card-body">

              <img src="<?= base_url('img/modalin.png') ?>" alt="Poster Event" class="logo-komunitas mx-auto d-block mb-5">

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Judul Event:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?php echo $event[0]->JUDUL?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Penyelenggara:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?php echo $event[0]->PENYELENGGARA?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Nama Penanggung Jawab:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?php echo $event[0]->NAMA_PJ?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Ruangan:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>lapangan bal balan</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Tanggal Mulai:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>Setelah ashar</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Tanggal Selesai:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>gak maghrib gak leren akwokwokwok</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Waktu:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>15.00-17.30</p>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-2">
                  <p>Nama Pengisi Acara:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>Andre</p>
                  <p>Yudha</p>
                  <p>Ryan</p>
                  <p>Andre</p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Asal peserta:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>SMA/SMK se lapangan :v</p>
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
                  <p>Keterangan Event:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p>kalah belikan minum</p>
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
                    <?php $no=1; foreach ($alat as $alat  ){?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?= $alat->NAMA_ALAT?></td>
                      <td><?= $alat->JUMLAH_ALAT?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>

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
