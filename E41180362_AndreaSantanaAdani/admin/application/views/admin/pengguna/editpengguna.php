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
                    <form method="post" enctype="multipart/form-data">
                        <h1 class="h3 mb-2 text-gray-800">Ubah Data Pengguna</h1>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>NIK</p>
                                        <div class="input-group">
                                            <input name="nik" id="nik" type="text"
                                                class="form-control border-dark small mb-3" placeholder="Masukkan NIK"
                                                aria-describedby="basic-addon2" onkeypress="return hanyaAngka(event)"
                                                maxlength="16" value="<?php echo $akun[0]->NIK; ?>" readonly required>
                                        </div>
                                        <?= form_error('nik', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>

                                    <div class="col-sm-6">
                                        <p>Nama Lengkap</p>
                                        <div class="input-group">
                                            <input name="nama" id="nama" type="text"
                                                class="form-control border-dark small mb-3"
                                                placeholder="Masukkan Nama Lengkap" aria-describedby="basic-addon2"
                                                maxlength="150" value="<?php echo $akun[0]->NAMA_LENGKAP; ?>" required>
                                        </div>
                                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Email</p>
                                        <div class="input-group">
                                            <input name="email" id="email" type="email"
                                                class="form-control border-dark small mb-3" placeholder="Masukkan Email"
                                                aria-describedby="basic-addon2" maxlength="100"
                                                value="<?php echo $akun[0]->EMAIL; ?>" required>
                                        </div>
                                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Telepon/Whatsapp</p>
                                        <div class="input-group">
                                            <input name="no_telpon" id="no_telpon" type="text"
                                                class="form-control border-dark small mb-3"
                                                placeholder="Masukkan No Telepon/Whatsapp"
                                                aria-describedby="basic-addon2" onkeypress="return hanyaAngka(event)"
                                                maxlength="13" value="<?php echo $akun[0]->NO_TELEPON; ?>" required>
                                        </div>
                                        <?= form_error('no_telpon', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <p>Alamat</p>
                                <div class="input-group">
                                    <textarea name="alamat" id="alamat" type="text"
                                        class="form-control border-dark small mb-3" placeholder="Masukkan Alamat"
                                        aria-describedby="basic-addon2" value="<?php echo $akun[0]->ALAMAT; ?>"
                                        required></textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Komunitas</p>
                                        <div class="input-group">
                                            <input name="komunitas" id="komunitas" type="text"
                                                class="form-control border-dark small mb-3"
                                                placeholder="Masukkan Komunitas" aria-describedby="basic-addon2"
                                                maxlength="200" value="<?php echo $akun[0]->KOMUNITAS; ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Upload Foto KTP</p>
                                        <div class="input-group">
                                            <input name="foto" id="foto" type="file"
                                                class="form-control border-dark small mb-3" placeholder=""
                                                aria-describedby="basic-addon2"
                                                value="<?php echo $akun[0]->FOTO_KTP; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Password</p>
                                        <div class="input-group">
                                            <input name="password1" id="password1" type="password"
                                                class="form-control border-dark small mb-3"
                                                placeholder="Masukkan Password" aria-describedby="basic-addon2"
                                                maxlength="16" value="<?php echo $akun[0]->PASSWORD; ?>" required>
                                        </div>
                                        <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Konfirmasi Password</p>
                                        <div class="input-group">
                                            <input name="password2" id="password2" type="password"
                                                class="form-control border-dark small mb-3"
                                                placeholder="Konfirmasi Password" aria-describedby="basic-addon2"
                                                maxlength="16" required>
                                        </div>
                                        <?= form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                                    <span class="text">Ubah Data Pengguna</span>
                                </button>
                                <a href="<?php echo site_url('admin/pengguna') ?>"
                                    class="btn btn-danger btn-icon-split">
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