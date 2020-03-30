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
                    <form method="post" action="<?= site_url('admin/booking/editbooking')?>">
                        <h1 class="h3 mb-2 text-gray-800">Ubah Data Booking</h1>

                        <div class="card shadow mb-4">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>Tanggal</p>
                                        <div class="input-group">
                                            <input class="form-control border-dark small mb-3"
                                                   type="date"
                                                   id="singleDatePicker">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Jam Mulai</p>
                                        <div class="input-group">
                                            <input class="form-control border-dark small mb-3"
                                                   type="time"
                                                   id="singleDatePicker">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Durasi</p>
                                        <div class="input-group">
                                            <input name="durasi"
                                                   id="durasi"
                                                   type="text"
                                                   class="form-control border-dark small mb-3"
                                                   placeholder="Durasi"
                                                   aria-describedby="basic-addon2"
                                                   maxlength="4"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Jam Selesai</p>
                                        <div class="input-group">
                                        <input name="jamselesai"
                                                   id="jamselesai"
                                                   type="text"
                                                   class="form-control border-dark small mb-3"
                                                   placeholder="Jam Selesai"
                                                   aria-describedby="basic-addon2"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Komunitas</p>
                                        <div class="input-group">
                                            <select class="form-control border-dark small mb-3" id="komunitas"
                                                name="komunitas" value="<?php echo set_value('komunitas') ?>">
                                                <?php foreach ($komunitas as $row) { ?>
                                                <option value="<?php echo $row['NAMA']; ?>">
                                                    <?php echo $row['NAMA']; ?>Pilih Komunitas</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <p>Nama Penanggung Jawab</p>
                                        <div class="input-group">
                                            <input name="nama"
                                                   id="nama"
                                                   type="text"
                                                   class="form-control border-dark small mb-3"
                                                   placeholder="Masukkan Nama Lengkap"
                                                   aria-describedby="basic-addon2"
                                                   maxlength="150"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Ruangan</p>
                                        <div class="input-group">
                                            <select class="form-control border-dark small mb-3"
                                                    id="ruangan"
                                                    name="ruangan">
                                                    <option value="">Pilih Ruangan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Jumlah Peserta</p>
                                        <div class="input-group">
                                            <input name="jumlahpeserta"
                                                   id="jumlahpeserta"
                                                   type="text"
                                                   class="form-control border-dark small mb-3"
                                                   placeholder="Masukkan Jumlah Peserta"
                                                   aria-describedby="basic-addon2"
                                                   onkeypress="return hanyaAngka(event)"
                                                   maxlength="3"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Nomor Telepon</p>
                                        <div class="input-group">
                                            <input name="jumlahpeserta"
                                                   id="jumlahpeserta"
                                                   type="text"
                                                   class="form-control border-dark small mb-3"
                                                   placeholder="Masukkan Nomor Telepon"
                                                   aria-describedby="basic-addon2"
                                                   onkeypress="return hanyaAngka(event)"
                                                   maxlength="13"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Tujuan Kegiatan</p>
                                        <div class="input-group">
                                            <input name="tujuan"
                                                   id="tujuan"
                                                   type="text"
                                                   class="form-control border-dark small mb-3"
                                                   placeholder="Masukkan Tujuan Kegiatan"
                                                   aria-describedby="basic-addon2"
                                                   maxlength="100"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <p>Deskripsi Kegiatan</p>
                                <div class="input-group">
                                    <textarea name="deskripsi"
                                           id="deskripsi"
                                           type="text"
                                           class="form-control border-dark small mb-3"
                                           placeholder="Masukkan Deskripsi Kegiatan"
                                           aria-describedby="basic-addon2"
                                           maxlength="200"
                                           required>
                                    </textarea>
                                </div>

                                <button type="submit" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                                    <span class="text">Ubah Data Booking</span>
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