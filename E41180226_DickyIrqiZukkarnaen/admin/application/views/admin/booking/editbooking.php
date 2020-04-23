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
                    <?php foreach($booking as $booking):?>
                    <!-- Page Heading -->
                    <form method="post">
                        <h1 class="h3 mb-2 text-gray-800">Ubah Data Booking</h1>

                        <div class="card shadow mb-4">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>Tanggal</p>
                                        <div class="input-group">
                                            <input class="form-control border-dark small mb-3"
                                                   type="date"
                                                   id="singleDatePicker"
                                                   name="singleDatePicker"
                                                   value="<?= $booking->TANGGAL_MULAI?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Jam Mulai</p>
                                        <div class="input-group">
                                            <input class="form-control border-dark small mb-3"
                                                   type="time"
                                                   id="start"
                                                   name="start"
                                                   value="<?= $booking->JAM_MULAI?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Durasi</p>
                                        <div class="input-group">
                                            <input name="durasi" id="durasi" onkeyup="gettime()" type=number class="form-control border-dark small mb-3" placeholder="Durasi" aria-describedby="basic-addon2" maxlength="5" value="<?= $booking->DURASI?>">
                                        </div>
                                        <?= form_error('durasi', '<small class="text-danger">', '</small>')?> 
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
                                            <select class="form-control border-dark small mb-3" id="komunitas"
                                                name="komunitas" value="<?php echo set_value('komunitas') ?>">
                                                <option value=""><?= $booking->NAMA_KOMUNITAS?></option>
                                                <?php foreach ($komunitas as $row) { ?>
                                                <option value="<?php echo $row['ID_KOMUNITAS']; ?>"
                                                <?=($booking->ID_KOMUNITAS == $row['ID_KOMUNITAS']? 'selected' : '' ) ?>>
                                                    <?php echo $row['NAMA_KOMUNITAS']; ?></option>
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
                                                   value="<?= $booking->NAMA?>"
                                                   >
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
                                                    <option value=""><?= $booking->NAMA_RUANGAN?></option>
                                                    <?php foreach($ruang as $r):?>
                                                    <option value="<?= $r['ID_RUANGAN']?>"<?=($booking->ID_RUANGAN == $r['ID_RUANGAN']? 'selected' : '' ) ?>><?= $r['NAMA_RUANGAN']?></option>
                                                    <?php endforeach; ?>
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
                                                   value="<?= $booking->JUMLAH_ORANG?>"
                                                   >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Nomor Telepon</p>
                                        <div class="input-group">
                                            <input name="no_telp"
                                                   id="no_telp"
                                                   type="text"
                                                   class="form-control border-dark small mb-3"
                                                   placeholder="Masukkan Nomor Telepon"
                                                   aria-describedby="basic-addon2"
                                                   onkeypress="return hanyaAngka(event)"
                                                   maxlength="13"
                                                   value="<?= $booking->NOMOR_TELEPON?>"
                                                   >
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
                                                   value="<?= $booking->TUJUAN?>"
                                                   >
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
                                           maxlength="200"><?= $booking->DESKRIPSI_KEGIATAN?></textarea>
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
                                                <?php endforeach;?>
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
<script>
    function gettime() {
        console.log('kkk');
        var x, y, jam, menit, detik, detik2, tes;
        
        var tanggalmulai = document.getElementById('singleDatePicker').value + ' ' + document.getElementById('start').value;
  
        var durasi = document.getElementById('durasi').value;

        if(durasi != null && durasi != ''){
        var jamselesai = new Date(tanggalmulai)

        console.log('jam '+ jamselesai);

        jamselesai.setHours(jamselesai.getHours() + parseInt(durasi))
        
        console.log('jam '+ jamselesai.getHours()+':'+ jamselesai.getMinutes());

        var setid = jamselesai.getHours()+':'+ jamselesai.getMinutes();

        document.getElementById("jamselesai").innerHTML = '<p>'+setid+'</p>';
        }
      
        
        // result.innerHTML = hasilku;
    }
</script>
</html>