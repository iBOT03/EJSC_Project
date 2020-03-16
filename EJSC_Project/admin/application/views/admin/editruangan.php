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
                    <form method="post">
                        <h1 class="h3 mb-2 text-gray-800">Ubah Data Ruangan</h1>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Nama Ruangan</p>
                                        <div class="input-group">
                                            <input name="namaruangan"
                                                   id="namaruangan"
                                                   type="text"
                                                   class="form-control bg-gray-200 border-0 small mb-3"
                                                   placeholder="Masukkan Nama Ruangan"
                                                   aria-describedby="basic-addon2"
                                                   maxlength="100"
                                                   readonly
                                                   required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <p>Kapasitas Ruangan</p>
                                        <div class="input-group">
                                            <input name="kapasitasruangan"
                                                   id="kapasitasruangan"
                                                   type="text"
                                                   class="form-control bg-gray-200 border-0 small mb-3"
                                                   placeholder="Masukkan Kapasitas Ruangan"
                                                   aria-describedby="basic-addon2"
                                                   maxlength="3"
                                                   onkeypress="return hanyaAngka(event)"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Upload Foto Ruangan</p>
                                        <div class="input-group">
                                            <input name="fotoruangan"
                                                   id="fotoruangan"
                                                   type="file"                                                   
                                                   class="form-control bg-gray-200 border-0 small mb-3"
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
                                    <span class="text">Ubah Data Ruangan</span>
                                </button>
                                <a href="<?php echo site_url('admin/ruangan') ?>" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-reply"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


    <!-- Footer -->
    <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Function-->
    <?php $this->load->view("admin/_partials/function.php") ?>

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>

    <!-- Logout Modal-->
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <!-- JavaScript-->
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>