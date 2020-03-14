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
                        <h1 class="h3 mb-2 text-gray-800">Tambah Data Administrator</h1>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Nama Lengkap</p>
                                        <div class="input-group">
                                            <input name="nama"
                                                   id="nama"
                                                   type="text"
                                                   class="form-control bg-gray-200 border-0 small mb-3"
                                                   placeholder="Masukkan Nama Lengkap"
                                                   aria-describedby="basic-addon2"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <p>Telepon/Whatsapp</p>
                                        <div class="input-group">
                                            <input name="no_telpon"
                                                   id="no_telpon"
                                                   type="text"
                                                   class="form-control bg-gray-200 border-0 small mb-3"
                                                   placeholder="Masukkan No Telepon/Whatsapp"
                                                   aria-describedby="basic-addon2"
                                                   onkeypress="return hanyaAngka(event)"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Email</p>
                                        <div class="input-group">
                                            <input name="email"
                                                   id="email"
                                                   type="email"
                                                   class="form-control bg-gray-200 border-0 small mb-3"
                                                   placeholder="Masukkan Email"
                                                   aria-describedby="basic-addon2"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <p>Password</p>
                                        <div class="input-group">
                                            <input name="password"
                                                   id="password"
                                                   type="password"
                                                   class="form-control bg-gray-200 border-0 small mb-3"
                                                   placeholder="Masukkan Password"
                                                   aria-describedby="basic-addon2"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <p>Alamat</p>
                                <div class="input-group">
                                    <input name="alamat"
                                           id="alamat"
                                           type="text"
                                           class="form-control bg-gray-200 border-0 small mb-3"
                                           placeholder="Masukkan Alamat"
                                           aria-describedby="basic-addon2"
                                           required>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Upload Foto</p>
                                        <div class="input-group">
                                            <input name="foto"
                                                   id="foto"
                                                   type="file"
                                                   class="form-control bg-gray-200 border-0 small mb-3"
                                                   placeholder=""
                                                   aria-describedby="basic-addon2"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" href="<?php echo site_url('admin/administrator') ?>" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Buat Akun</span>
                                </button>
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