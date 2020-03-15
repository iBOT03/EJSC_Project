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
          <h1 class="h3 mb-2 text-gray-800">Data Pengguna</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="<?php echo site_url('admin/pengguna/tambahpengguna/') ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"> Tambah Pengguna</span>
              </a>
            </div>
            <div class="card-body">
            <?php echo $this->session->userdata('Pesan');?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 5px">NIK</th>
                      <th>Email</th>
                      <th>Nama</th>
                      <th>Komunitas</th>
                      <th>No. Telepon</th>
                      <th>Level</th>
                      <th style="width: 96px">Aksi</th>
                    </tr>
                    <?php
                    foreach ($akun as $row) {
                    ?>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $row->NIK; ?></td>
                      <td><?php echo $row->EMAIL; ?></td>
                      <td><?php echo $row->NAMA_LENGKAP; ?></td>
                      <td><?php echo $row->KOMUNITAS; ?></td>
                      <td><?php echo $row->NO_TELEPON; ?></td>
                      <td><?php if ($row->LEVEL == 1) {
                            echo 'Super Admin';
                          } elseif ($row->LEVEL == 2) {
                            echo 'Admin';
                          } elseif ($row->LEVEL == 3) {
                            echo 'User';
                          } ?></td>
                      <td>
                      <a href="<?php echo site_url('admin/pengguna/ubahpengguna/'.$row->NIK)?>"
                           style="width:35px"
                           class="btn btn-sm btn-info shadow-sm">
                           <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Apakah Anda yakin untuk menghapus?')"
                           href="<?php echo "pengguna/hapuspengguna/" . $row->NIK; ?>"
                           style="width:35px"
                           class="btn btn-sm btn-danger shadow-sm">
                           <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

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