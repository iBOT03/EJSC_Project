<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Head -->
    <?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body class="bg-gradient-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Ubah Kata Sandi Anda</h1>
                                        <h5><?= $this->session->userdata('reset_email'); ?></h5>
                                    </div>
                                    <?= $this->session->flashdata('message') ?>
                                    <form class="user" method="POST" action="<?= base_url('admin/auth/changePassword') ?>">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" aria-describedby="emailHelp" placeholder="Masukkan Kata Sandi Baru..." value="<?= set_value('password1') ?>">
                                            <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" aria-describedby="emailHelp" placeholder="Konfirmasi Kata Sandi Baru..." value="<?= set_value('password2') ?>">
                                            <?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-user btn-block">
                                            Ubah Kata Sandi
                                        </button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Footer -->
        <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- JavaScript-->
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>