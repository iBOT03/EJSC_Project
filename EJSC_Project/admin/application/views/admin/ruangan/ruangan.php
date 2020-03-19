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
          <h1 class="h3 mb-2 text-gray-800">Data Ruangan</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="<?php echo site_url('admin/ruangan/tambah') ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text"> Tambah Ruangan</span>
            </a>
            <div class="col mt-3">
            <?php echo $this->session->flashdata('pesan')?>
            </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                      <th>Ruangan</th>
                      <th>Foto Ruangan</th>
                      <th>Kapasitas</th>
                      <th style="width: 96px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                      $no = 1;
                        foreach($ruangan as $p):
                    ?>
                    <tr>
                      <td><?php echo $no++?></td>
                      <td><?php echo $p->NAMA_RUANGAN?></td>
                      <td><img src="<?= base_url('uploads/') . $p->FOTO_RUANGAN; ?>" alt="" style="width:140px"></td>
                      <td><?php echo $p->KAPASITAS?></td>
                      <td>
                      <a href="<?php echo site_url('admin/ruangan/edit')?>"
                           style="width:35px"
                           class="btn btn-sm btn-info shadow-sm">
                           <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Apakah Anda yakin untuk menghapus?')"
                           href="<?php echo "ruangan/hapus/".$p->ID_RUANGAN;?>"
                           style="width:35px"
                           class="btn btn-sm btn-danger shadow-sm">
                           <i class="fas fa-trash"></i>
                        </a>
                      </td>
                        <?php endforeach;?>
                    </tr>

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