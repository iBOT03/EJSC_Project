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

            <div class="col-xl-10 col-lg-12 col-md-9" style="margin:10%">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">East Java Super Corridor</h1>
                                        <?php echo $this->session->flashdata('pesan'); ?>
                                    </div>

                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="email"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Masukkan Alamat Email">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="password" placeholder="Masukkan Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="checkbox"
                                                    id="checkbox">
                                                <label class="custom-control-label" for="checkbox">Ingat Saya</label>
                                            </div>
                                        </div>

                                        <button type=" submit" class="btn btn-info btn-user btn-block">
                                            Login
                                        </button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <?php $this->load->view("admin/_partials/footer.php") ?>

            </div>

        </div>

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