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



        <form method="post" action="<?= site_url('admin/event/editevent')?>">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Ubah Data Event</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="#" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text"> Setujui</span>
              </a>
              <a href="#" class="btn btn-sm btn-danger btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-times"></i>
                </span>
                <span class="text"> Tolak</span>
              </a>
            </div>
            <div class="card-body">
              <p>Judul Event</p>
              <div class="input-group">
                <input name="judulevent"
                       value="<?php echo $event[0]->JUDUL;?>"
                       id="judulevent"
                       type="text"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Judul Event"
                       aria-describedby="basic-addon2"
                       required>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Penyelenggara/Komunitas</p>
                  <div class="input-group">
                    <input name="penyelenggara"
                           id="penyelenggara"
                           value="<?php echo $event[0]->PENYELENGGARA;?>"
                           type="text"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Penyelenggara"
                           aria-describedby="basic-addon2"
                           required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <p>Nama Penanggung Jawab</p>
                  <div class="input-group">
                    <input name="nama_pj"
                          id="nama_pj"
                          value="<?php echo $event[0]->NAMA_PJ;?>"
                          type="text"                                                   
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Nama Penanggung Jawab"
                          aria-describedby="basic-addon2"
                          required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <p>Tanggal Mulai</p>
                  <div class="input-group">
                    <input type="date"
                          id="tanggalmulai"
                          value="<?php echo $event[0]->TANGGAL_MULAI;?>"
                          name="tanggalmulai"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Tanggal Mulai"
                          aria-describedby="basic-addon2"
                          required>
                  </div>
                </div>
                <div class="col-sm-3">
                  <p>Tanggal Selesai</p>
                  <div class="input-group">
                    <input type="date"
                          id="tanggalselesai"
                          value="<?php echo $event[0]->TANGGAL_SELESAI;?>"
                          name="tanggalselesai"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Tanggal Selesai"
                          aria-describedby="basic-addon2"
                          required>
                  </div>
                </div>
                <div class="col-sm-3">
                  <p>Waktu</p>
                  <div class="input-group">
                    <input class="form-control border-dark small mb-3"
                           type="time"
                           id="waktu"
                           value="<?php echo $event[0]->WAKTU;?>"
                           name="waktu">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <p>Keterangan Event</p>
                  <div class="input-group">
                    <textarea id="keterangan"
                              name="keterangan"
                              value="<?php echo $event[0]->KETERANGAN;?>"
                              type="text"
                              class="form-control border-dark small mb-3"
                              placeholder="Masukkan Keterangan Event"
                              aria-describedby="basic-addon2"
                              required>
                    </textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <p>Pengisi Acara</p>
                  <div class="input-group">
                    <textarea id="pengisiacara"
                          name="pengisiacara"
                          value="<?php echo $event[0]->NAMA_PENGISI_ACARA;?>"
                          type="text"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Pengisi Acara"
                          aria-describedby="basic-addon2"
                          required>
                    </textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <p>Asal Peserta/Audiens</p>
                  <div class="input-group">
                    <textarea id="asalpeserta"
                              name="asalpeserta"
                              value="<?php echo $event[0]->ASAL_PESERTA;?>"
                              type="text"
                              class="form-control border-dark small mb-3"
                              placeholder="Masukkan Keterangan Event"
                              aria-describedby="basic-addon2"
                              required>
                    </textarea>
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
                          value="<?php echo $event[0]->JUMLAH_PESERTA;?>"
                          type="text"                                                   
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Jumlah Peserta"
                          aria-describedby="basic-addon2"
                          onkeypress="return hanyaAngka(event)"
                          required>
                  </div>
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
                          required>
                  </div>
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
                      <option value="-">Pilih Alat yang Akan Dipinjam</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <p>Jumlah Alat</p>
                  <div class="input-group">
                    <select class="form-control border-dark small mb-3"
                            id="jumlahalat"
                            name="jumlahalat">
                      <option value="-">Masukkan Jumlah Alat</option>
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
                  <i class="fas fa-pencil-alt"></i>
                </span>
                <span class="text">Ubah Data Event</span>
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
