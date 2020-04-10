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
            <h1 class="h3 mb-2 text-gray-800">Data Anggota Komunitas</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="width: 5px">No</th>
                        <th style="width: 100px">NIK</th>
                        <th>Nama</th>
                        <th style="width: 100px">No. Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                      </tr>
                      <?php
                        $no = 1;
                        foreach($anggota as $a) {
                      ?>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $a->NIK; ?></td>
                        <td><?php echo $a->NAMA_LENGKAP; ?></td>
                        <td><?php echo $a->NO_TELEPON; ?></td>
                        <td><?php echo $a->EMAIL; ?></td>
                        <td><?php echo $a->ALAMAT; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <a href="<?php echo site_url('admin/komunitas') ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-reply"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
                </div>
              </div>

            <!-- </div>
       </div> -->
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

    <script type="text/javascript">
        function confirm_modal(delete_url) {
            $('#hapusModal').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>