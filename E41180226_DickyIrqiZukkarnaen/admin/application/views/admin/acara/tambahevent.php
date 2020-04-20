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

        <form method="post" action="<?= site_url('admin/event/tambah')?>"
        enctype="multipart/form-data">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tambah Data Event</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <p>Judul Event</p>
              <div class="input-group">
                <input name="judulevent"
                       id="judulevent"
                       type="text"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Judul Event"
                       aria-describedby="basic-addon2"
                       value="<?= set_value('judulevent'); ?>"
                       required>
              </div>
              <?= form_error('judulevent', '<small class="text-danger pl-2">', '</small>'); ?>

              <div class="row">
                <div class="col-sm-6">
                  <p>Penyelenggara/Komunitas</p>
                  <div class="input-group">
                    <input name="penyelenggara"
                           id="penyelenggara"
                           type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Penyelenggara"
                           aria-describedby="basic-addon2"
                           value="<?= set_value('penyelenggara'); ?>"
                           required>
                  </div>
                  <?= form_error('penyelenggara', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <p>Nama Penanggung Jawab</p>
                  <div class="input-group">
                    <input name="nama_pj"
                          id="nama_pj"
                          type="text"                                                   
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Nama Penanggung Jawab"
                          aria-describedby="basic-addon2"
                          value="<?= set_value('nama_pj'); ?>"
                          required>
                  </div>
                  <?= form_error('nama_pj', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <p>Tanggal Mulai</p>
                  <div class="input-group">
                    <input type="date"
                          id="tanggalmulai"
                          name="tanggalmulai"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Tanggal Mulai"
                          aria-describedby="basic-addon2"
                          value="<?= set_value('tanggalmulai'); ?>"
                          required>
                  </div>
                  <?= form_error('tanggalmulai', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col-sm-3">
                  <p>Tanggal Selesai</p>
                  <div class="input-group">
                    <input type="date"
                          id="tanggalselesai"
                          name="tanggalselesai"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Tanggal Selesai"
                          aria-describedby="basic-addon2"
                          value="<?= set_value('tanggalselesai'); ?>"
                          required>
                  </div>
                  <?= form_error('tanggalselesai', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col-sm-3">
                  <p>Waktu</p>
                  <div class="input-group">
                    <input class="form-control border-dark small mb-3"
                           type="time"
                           id="waktu"
                           name="waktu"
                           value="<?= set_value('waktu'); ?>">
                  </div>
                  <?= form_error('waktu', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <p>Keterangan Event</p>
                  <div class="input-group">
                    <textarea id="keterangan"
                              name="keterangan"
                              type="text"
                              class="form-control border-dark small mb-3"
                              placeholder="Masukkan Keterangan Event"
                              aria-describedby="basic-addon2"
                              value="<?= set_value('keterangan'); ?>"
                              required>
                    </textarea>
                  </div>
                  <?= form_error('keterangan', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Pengisi Acara</p>
                  <div class="input-group">
                    <textarea id="pengisiacara"
                          name="pengisiacara"
                          type="text"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Pengisi Acara"
                          aria-describedby="basic-addon2"
                          value="<?= set_value('pengisiacara'); ?>"
                          required>
                    </textarea>
                  </div>
                  <?= form_error('pengisiacara', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <p>Asal Peserta/Audiens</p>
                  <div class="input-group">
                    <textarea id="asalpeserta"
                              name="asalpeserta"
                              type="text"
                              class="form-control border-dark small mb-3"
                              placeholder="Masukkan Keterangan Event"
                              aria-describedby="basic-addon2"
                              value="<?= set_value('asalpeserta'); ?>"
                              required>
                    </textarea>
                  </div>
                  <?= form_error('asalpeserta', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Ruangan</p>
                  <div class="input-group">
                  <select name="NAMA_RUANGAN" id="ID_RUANGAN" class="form-control" data-live-search="true">
                   <option style="margin: 50px;" class="selectpicker form-control">--Pilih Ruangan--</option>
                    <?php foreach($ruangan as $k):?>
                      <option  value="<?php echo $k->ID_RUANGAN;?>"><?php echo $k->NAMA_RUANGAN;?></option>
                   <?php endforeach;?> 
              </select>
                    </select>
                  </div>
                  <?= form_error('ruangan', '<small class="text-danger pl-2">', '</small>'); ?>
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
                          value="<?= set_value('jumlahpeserta'); ?>"
                          required>
                  </div>
                  <?= form_error('jumlahpeserta', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Upload Poster Event</p>
                  <div class="input-group">
                    <input name="posterevent"
                          id="posterevent"
                          type="file"                                                   
                          class="form-control border-dark small mb-3"
                          placeholder=""
                          aria-describedby="basic-addon2"
                          value="<?= set_value('posterevent'); ?>"
                          required>
                  </div>
                  <?= form_error('posterevent', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <p>Upload Surat Perijinan Komunitas</p>
                  <div class="input-group">
                    <input name="suratperijinan"
                           id="suratperijinan"
                           type="file"                                                   
                           class="form-control border-dark small mb-3"
                           placeholder=""
                           aria-describedby="basic-addon2"
                           value="<?= set_value('suratpeijinan'); ?>"
                           required>
                  </div>
                  <?= form_error('suratperijinan', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <p>Peminjaman Alat</p>
                  <div class="input-group">
                  <select name="NAMA_ALAT" id="ID_ALAT" class="form-control" data-live-search="true">
                   <option style="margin: 50px;" class="selectpicker form-control">--Pilih Alat--</option>
                    <?php foreach($alat as $k):?>
                      <option  value="<?php echo $k->ID_ALAT;?>"><?php echo $k->NAMA_ALAT;?></option>
                   <?php endforeach;?> 
              </select>
                  <!-- <select class="form-control border-dark small mb-3"
                            id="peminjamanalat"
                            name="peminjamanalat"
                            value="<?= set_value('peminjamanalat'); ?>">
                      <option value="-">Pilih Alat yang Akan Dipinjam</option>
                    </select> -->
                  </div>
                  <?= form_error('peminjamanalat', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col-sm-3">
                  <p>Jumlah Alat</p>
                  <div class="input-group">
                  <select name="JUMLAH_ALAT" id="ID_ALAT" class="form-control" data-live-search="true">
                   <option style="margin: 50px;" class="selectpicker form-control">Masukan Jumlah</option>
                    <?php foreach($alat as $k):?>
                      <option  value="<?php echo $k->ID_ALAT;?>"><?php echo $k->JUMLAH_ALAT;?></option>
                   <?php endforeach;?> 
              </select>
                    <!-- <select class="form-control border-dark small mb-3"
                            id="jumlahalat"
                            name="jumlahalat"
                            value="<?= set_value('jumlahalat'); ?>">
                      <option value="-">Masukkan Jumlah Alat</option>
                    </select> -->
                  </div>
                  <?= form_error('jumlahalat', '<small class="text-danger pl-2">', '</small>'); ?>
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
                        <a href="#"
                           class="btn btn-sm btn-danger btn-circle">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <button type="submit" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Event</span>
              </button>
              <a href="<?php echo site_url('admin/event') ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
              </a>

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

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php //$this->load->view("admin/_partials/modal.php") ?>

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
