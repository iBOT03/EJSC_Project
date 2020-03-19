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
                    <form method="post" action="<?= site_url('admin/booking/tambahbooking')?>">
                        <h1 class="h3 mb-2 text-gray-800">Tambah Booking</h1>

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
                                                   maxlength="4">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Komunitas</p>
                                        <div class="input-group">
                                            <select class="form-control border-dark small mb-3"
                                                    id="komunitas"
                                                    name="komunitas">
                                                    <option value="">Pilih Komunitas</option>
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
                                                    <option value="-"></option>
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
                                    <div class="col-sm-6">
                                        <p>Deskripsi Kegiatan</p>
                                        <div class="input-group">
                                            <input name="deskripsi"
                                                   id="deskripsi"
                                                   type="text"
                                                   class="form-control border-dark small mb-3"
                                                   placeholder="Masukkan Deskripsi Kegiatan"
                                                   aria-describedby="basic-addon2"
                                                   maxlength="200"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <p>Upload Surat Pengajuan Komunitas</p>
                                        <div class="input-group">
                                            <input name="suratpengajuan"
                                                   id="suratpengajuan"
                                                   type="file"                                                   
                                                   class="form-control border-dark small mb-3"
                                                   placeholder=""
                                                   aria-describedby="basic-addon2"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                     
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>Peminjaman Alat</p>
                                        <div class="input-group">
                                            <select class="form-control border-dark small mb-3"
                                                    id="peminjamanalat"
                                                    name="peminjamanalat">
                                                    <option value="-"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Jumlah Alat</p>
                                        <div class="input-group">
                                            <select class="form-control border-dark small mb-3"
                                                    id="jumlahalat"
                                                    name="jumlahalat">
                                                    <option value="-"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 my-5">
                                        <a href="#" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-plus"></i></a>           
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataAlat" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th style="width:10px">No</th>
                                            <th>Nama Alat</th>
                                            <th>Jumlah</th>
                                            <th style="width: 50px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="#" style="width:35px" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
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