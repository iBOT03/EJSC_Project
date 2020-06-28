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
                        <h1 class="h3 mb-2 text-gray-800">Tambah Booking</h1>

                        <div class="card shadow mb-4">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>Tanggal</p>
                                        <div class="input-group">
                                            <input class="form-control border-dark small mb-3" type="date" id="singleDatePicker" name="singleDatePicker">
                                        </div>
                                        <?= form_error('singleDatePicker', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Jam Mulai</p>
                                        <div class="input-group">
                                            <input class="form-control border-dark small mb-3" type="time" name="start" id="start">
                                        </div>
                                        <?= form_error('start', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Durasi</p>
                                        <div class="input-group">
                                            <input name="durasi" id="durasi" onkeyup="gettime()" type=number class="form-control border-dark small mb-3" placeholder="Durasi" aria-describedby="basic-addon2" maxlength="5">
                                        </div>
                                        <?= form_error('durasi', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Jam Selesai</p>
                                        <p id="jamselesai"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Komunitas</p>
                                        <div class="input-group">
                                            <select class="form-control border-dark small mb-3" id="komunitas" name="komunitas" value="<?php echo set_value('komunitas') ?>">
                                                <?php foreach ($komunitas as $l) { ?>
                                                    <option value="<?php echo $l['ID_KOMUNITAS']; ?>"><?php echo $l['NAMA_KOMUNITAS']; ?> </option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="col-sm-6">
                                        <p>Nama Penanggung Jawab</p>
                                        <div class="input-group">
                                            <input name="nama" id="nama" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Lengkap" aria-describedby="basic-addon2" maxlength="150">
                                        </div>
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div> -->
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>NIK</p>
                                        <div class="input-group">
                                            <input name="nik" id="nik" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan NIK anda" aria-describedby="basic-addon2">
                                        </div>
                                        <?= form_error('nik', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-sm-6">
                                        <p>Nama Penanggung Jawab</p>
                                        <div class="input-group">
                                            <input name="nama" id="nama" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Lengkap" aria-describedby="basic-addon2" maxlength="150">
                                        </div>
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Ruangan</p>
                                        <div class="input-group">
                                            <select class="form-control border-dark small mb-3" id="ruangan" name="ruangan">

                                                <?php foreach ($ruangan as $l) { ?>
                                                    <option value="<?php echo $l['ID_RUANGAN']; ?>"><?php echo $l['NAMA_RUANGAN']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Jumlah Peserta</p>
                                        <div class="input-group">
                                            <input name="jumlahpeserta" id="jumlahpeserta" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Jumlah Peserta" aria-describedby="basic-addon2" onkeypress="return hanyaAngka(event)" maxlength="3">
                                        </div>
                                        <?= form_error('jumlahpeserta', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Nomor Telepon</p>
                                        <div class="input-group">
                                            <input name="no_telp" id="no_telp" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nomor Telepon" aria-describedby="basic-addon2" onkeypress="return hanyaAngka(event)" maxlength="13">
                                        </div>
                                        <?= form_error('no_telp', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Tujuan Kegiatan</p>
                                        <div class="input-group">
                                            <input name="tujuan" id="tujuan" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Tujuan Kegiatan" aria-describedby="basic-addon2" maxlength="100">
                                        </div>
                                        <?= form_error('tujuan', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <p>Deskripsi Kegiatan</p>
                                <div class="input-group">
                                    <textarea name="deskripsi" id="deskripsi" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Deskripsi Kegiatan" aria-describedby="basic-addon2" maxlength="200"></textarea>
                                </div>

                                <button type="submit" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Booking</span>
                                </button>
                                <a href="<?php echo site_url('admin/booking') ?>" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-reply"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>
                            <!-- Card Body -->
                        </div>
                        <!-- Card -->

                </div>
                </form>
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
<script>
    function gettime() {
        console.log('kkk');
        var x, y, jam, menit, detik, detik2, tes;

        var tanggalmulai = document.getElementById('singleDatePicker').value + ' ' + document.getElementById('start').value;

        var durasi = document.getElementById('durasi').value;

        if (durasi != null && durasi != '') {
            var jamselesai = new Date(tanggalmulai)

            console.log('jam ' + jamselesai);

            jamselesai.setHours(jamselesai.getHours() + parseInt(durasi))

            console.log('jam ' + jamselesai.getHours() + ':' + jamselesai.getMinutes());

            var setid = jamselesai.getHours() + ':' + jamselesai.getMinutes();

            document.getElementById("jamselesai").innerHTML = '<p>' + setid + '</p>';
        }


        // result.innerHTML = hasilku;
    }
</script>

</html>