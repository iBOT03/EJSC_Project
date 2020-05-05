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
        <form method="POST" enctype="multipart/form-data">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Event</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="<?php echo site_url('admin/event/tambah') ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"> Tambah Event</span>
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
                      <th style="width: 10px">No</th>
                      <th>Tanggal Mulai</th>
                      <th>Judul</th>
                      <th>Nama Penanggung Jawab</th>
                      <th>Surat Pengesahan</th>
                      <th style="width: 150px">Poster</th>
                      <th style="width: 60px">Status</th>
                      <th style="width: 96px">Aksi</th>
                    </tr>
                  <?php
                  $no = 1;
                  foreach ($event as $row){
                    ?>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row->TANGGAL_MULAI; ?></td>
                      <td><?= $row->JUDUL; ?></td>
                      <td><?= $row->NAMA_PJ; ?></td>
                      <td><a href="<?= base_url('uploads/event/').$row->SURAT_PENGAJUAN ?>">Download file</a></td>
                      <td><img src="<?= base_url('uploads/event/'). $row->FOTO?>" alt="" width="100" srcset=""></td>
                      <td>
                        <?php if ($row->STATUS == 1) {
                          echo '<div class="badge badge-primary badge-pill">Aktif</div>';
                        } elseif ($row->STATUS == 2) {
                          echo '<div class="badge badge-warning badge-pill">Pending</div>';
                        } elseif ($row->STATUS == 3) {
                          echo '<div class="badge badge-success badge-pill">Selesai</div>';
                        }elseif ($row->STATUS == 4) {
                          echo '<div class="badge badge-danger badge-pill">Batal</div>';
                        } ?>
                      </td>
                      <td>
                        <a href="<?php echo site_url("admin/event/detail/" .$row->ID_EVENT);?>"
                           class="btn btn-sm btn-primary btn-circle">
                          <i class="fas fa-plus"></i>
                        </a>
                        <a href="<?php echo site_url('admin/event/edit/' .$row->ID_EVENT) ?>"
                           class="btn btn-sm btn-info btn-circle">
                           <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a href="#"
                           onclick="confirm_modal('<?php echo 'event/hapus/' . $row->ID_EVENT; ?>')"
                           class="btn btn-sm btn-danger btn-circle"
                           data-toggle="modal" data-target="#hapusModal">
                           <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                  }
                  ?>
                </table>
                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                       aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakinuntuk menghapus?</h5>
                          <button class="close" type="button" data-dismiss="modal"
                                  aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal" untuk kembali ke Panel Admin.</div>
                        <div class="modal-footer">
                          <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                          <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
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
