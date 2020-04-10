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
                    <h1 class="h3 mb-2 text-gray-800">Data Administrator</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?php echo site_url('admin/administrator/tambah/') ?>"
                                class="btn btn-sm btn-info btn-icon-split shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text"> Tambah Admin</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php echo $this->session->userdata('Pesan'); ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Level</th>
                                            <th style="width: 96px">Aksi</th>
                                        </tr>
                                        <?php
                                            foreach ($akun as $row) {
                                            ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row->NAMA_LENGKAP; ?></td>
                                            <td><?php echo $row->EMAIL; ?></td>
                                            <td><?php echo $row->ALAMAT; ?></td>
                                            <td>
                                                <?php if ($row->LEVEL == 1) {
                                                  echo 'Admin';
                                                } elseif ($row->LEVEL == 2) {
                                                echo 'User';
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($_SESSION['NAMA_LENGKAP'] == $row->NAMA_LENGKAP) {
                                                ?>
                                                <a href="<?php echo site_url('admin/administrator/edit/' . $row->NIK) ?>"
                                                    class="btn btn-sm btn-info btn-circle">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo site_url('admin/administrator/hapus/' . $row->NIK) ?>"
                                                    onclick="confirm_modal('<?php echo 'administrator/hapus/' . $row->NIK; ?>')"
                                                    class="btn btn-sm btn-danger btn-circle" data-toggle="modal">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin
                                                    untuk menghapus?</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal"
                                                untuk kembali ke Panel Admin.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-info" type="button"
                                                    data-dismiss="modal">Batal</button>
                                                <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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