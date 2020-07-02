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
                    <?php foreach($alat as $row ){ ?>

                    <!-- Page Heading -->
                    <form method="post">
                        <h1 class="h3 mb-2 text-gray-800">Ubah Data Alat</h1>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Nama Alat</p>
                                        <div class="input-group">
                                            <input name="nama" id="nama" type="text"
                                                class="form-control border-dark small mb-3"
                                                placeholder="Masukkan Nama Alat" aria-describedby="basic-addon2"
                                                value="<?php echo $row->NAMA_ALAT; ?>">
                                        </div>
                                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Jumlah Alat</p>
                                        <div class="input-group">
                                            <input name="jumlah" id="jumlah" type="text"
                                                class="form-control border-dark small mb-3"
                                                placeholder="Masukkan Jumlah Alat" aria-describedby="basic-addon2"
                                                onkeypress="return hanyaAngka(event)"
                                                value="<?php echo $row->JUMLAH_ALAT; ?>">
                                        </div>
                                        <?= form_error('jumlah', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <button type="submit" href="<?php echo site_url('admin/alat') ?>"
                                    class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                                    <span class="text">Ubah Data Alat</span>
                                </button>
                                <a href="<?php echo site_url('admin/alat') ?>" class="btn btn-danger btn-icon-split">
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
                <?php } ?>

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