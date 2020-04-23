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
                        <!-- <form action="" method="get"> -->
                        <h1 class="h3 mb-2 text-gray-800">Ubah Data Pengguna</h1>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>NIK</p>
                                        <div class="input-group">
                                            <input name="nik" id="nik" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan NIK" aria-describedby="basic-addon2" onkeypress="return hanyaAngka(event)" maxlength="16" value="<?php echo $akunn[0]->NIK; ?>" readonly>
                                        </div>
                                        <?= form_error('nik', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>

                                    <div class="col-sm-6">
                                        <p>Nama Lengkap</p>
                                        <div class="input-group">
                                            <input name="nama" id="nama" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Lengkap" aria-describedby="basic-addon2" maxlength="150" value="<?php echo $akunn[0]->NAMA_LENGKAP; ?>" >
                                        </div>
                                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Email</p>
                                        <div class="input-group">
                                            <input name="email" id="email" type="email" class="form-control border-dark small mb-3" placeholder="Masukkan Email" aria-describedby="basic-addon2" maxlength="100" value="<?= $akunn[0]->EMAIL; ?>" >
                                        </div>
                                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Telepon/Whatsapp</p>
                                        <div class="input-group">
                                            <input name="no_telpon" id="no_telpon" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan No Telepon/Whatsapp" aria-describedby="basic-addon2" onkeypress="return hanyaAngka(event)" maxlength="13" value="<?= $akunn[0]->NO_TELEPON; ?>" >
                                        </div>
                                        <?= form_error('no_telpon', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <p>Alamat</p>
                                <div class="input-group">
                                    <textarea name="alamat" id="alamat" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Alamat" aria-describedby="basic-addon2" ><?= $akunn[0]->ALAMAT; ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Komunitas</p>
                                        <div class="input-group">
                                        <select class="form-control border-dark small mb-3" id="komunitas"
                                                name="komunitas" value="<?= set_value('komunitas')?>">
                                                <option value="">---Pilih---</option>

                                                <?php foreach ($komunitas as $row) { ?>
                                                <option value="<?php echo $row['ID_KOMUNITAS']; ?>"
                                                <?=($akun[0]->ID_KOMUNITAS == $row['ID_KOMUNITAS'] ? 'selected' : '' ) ?>>
                                                    <?php echo $row['NAMA_KOMUNITAS']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <input name="komunitas" id="komunitas" type="text"
                                                class="form-control border-dark small mb-3"
                                                placeholder="Masukkan Komunitas" aria-describedby="basic-addon2"
                                                maxlength="200" value="<?php //echo $akun[0]->ID_KOMUNITAS; 
                                                                        ?>" required
                                                > -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Upload Foto KTP</p>
                                        <div class="input-group">
                                            <input name="foto" id="foto" accept="image/*" onchange="tampilkanPreview(this,'preview')" 
                                            type="file" class="form-control border-dark small mb-3" placeholder="" 
                                            aria-describedby="basic-addon2" >
                                            <!-- <input type="file" name="foto" id="foto" accept="image/*" onchange="tampilkanPreview(this,'preview')"> -->
                                        </div>
                                        <?= form_error('foto', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <img id="preview" src="" alt="" width="320px" /> <br>
                                            <?php foreach ($akun as $row) { ?>
                                                <a href="<?= base_url('uploads/KTP/') . $row->FOTO_KTP ?>">Lihat Foto</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Password</p>
                                        <div class="input-group">
                                            <input name="password1" id="password1" type="password" class="form-control border-dark small mb-3" placeholder="Masukkan Password" aria-describedby="basic-addon2">
                                        </div>
                                        <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Konfirmasi Password</p>
                                        <div class="input-group">
                                            <input name="password2" id="password2" type="password" class="form-control border-dark small mb-3" placeholder="Konfirmasi Password" aria-describedby="basic-addon2">
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
                                <a href="<?php echo site_url('admin/pengguna') ?>" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-reply"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>
                        </div>
                        <!-- </form> -->
                    </form>
                </div>
            </div>
            <script>
                function tampilkanPreview(gambar, idpreview) {
                    //                membuat objek gambar
                    var gb = gambar.files;
                    //                loop untuk merender gambFar
                    for (var i = 0; i < gb.length; i++) {
                        //                    bikin variabel
                        var gbPreview = gb[i];
                        var imageType = /image.*/;
                        var preview = document.getElementById(idpreview);
                        var reader = new FileReader();
                        if (gbPreview.type.match(imageType)) {
                            //                        jika tipe data sesuai
                            preview.file = gbPreview;
                            reader.onload = (function(element) {
                                return function(e) {
                                    element.src = e.target.result;
                                };
                            })(preview);
                            //                    membaca data URL gambar
                            reader.readAsDataURL(gbPreview);
                        } else {
                            //                        jika tipe data tidak sesuai
                            alert("Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
                        }
                    }
                }
            </script>

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