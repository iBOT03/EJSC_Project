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
          <?php foreach ($event as $e) { ?>
            <form method="post" enctype="multipart/form-data">
 
              <!-- Page Heading -->
              <h1 class="h3 mb-2 text-gray-800">Ubah Data Event</h1>
 
              <div class="card-body">
                <p>Judul Event</p>
                <div class="input-group">
                  <input name="judulevent" id="judulevent" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Judul Event" aria-describedby="basic-addon2" value="<?= $e['JUDUL'] ?>">
                  <input name="id_event" id="id_event" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan Judul Event" aria-describedby="basic-addon2" value="<?= $e['ID_EVENT'] ?>">
                </div>
 
                <div class="row">
                  <div class="col-sm-6">
                    <p>Penyelenggara/Komunitas</p>
                    <div class="input-group">
                      <input name="penyelenggara" id="penyelenggara" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Penyelenggara" aria-describedby="basic-addon2" value="<?= $e['PENYELENGGARA'] ?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <p>Nama Penanggung Jawab</p>
                    <div class="input-group">
                      <input name="nama_pj" id="nama_pj" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Penanggung Jawab" aria-describedby="basic-addon2" value="<?= $e['NAMA_PJ'] ?>">
                    </div>
                  </div>
                </div>
 
                <div class="row">
                  <div class="col-sm-3">
                    <p>Tanggal Mulai</p>
                    <div class="input-group">
                      <input type="date" id="tanggalmulai" name="tanggalmulai" class="form-control border-dark small mb-3" placeholder="Masukkan Tanggal Mulai" aria-describedby="basic-addon2" value="<?= $e['TANGGAL_MULAI'] ?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <p>Tanggal Selesai</p>
                    <div class="input-group">
                      <input type="date" id="tanggalselesai" name="tanggalselesai" class="form-control border-dark small mb-3" placeholder="Masukkan Tanggal Selesai" aria-describedby="basic-addon2" value="<?= $e['TANGGAL_SELESAI'] ?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <p>Waktu</p>
                    <div class="input-group">
                      <input class="form-control border-dark small mb-3" type="time" id="waktu" name="waktu" value="<?= $e['WAKTU'] ?>">
                    </div>
                  </div>
                </div>
 
                <div class="row">
                  <div class="col-sm-12">
                    <p>Keterangan Event</p>
                    <div class="input-group">
                      <textarea id="keterangan" name="keterangan" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Keterangan Event" aria-describedby="basic-addon2"><?= $e['KETERANGAN'] ?></textarea>
                    </div>
                  </div>
                </div>
 
                <div class="row">
                  <div class="col-sm-6">
                    <p>Pengisi Acara</p>
                    <div class="input-group">
                      <textarea id="pengisiacara" name="pengisiacara" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Pengisi Acara" aria-describedby="basic-addon2"><?= $e['NAMA_PENGISI_ACARA'] ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <p>Asal Peserta/Audiens</p>
                    <div class="input-group">
                      <textarea id="asalpeserta" name="asalpeserta" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Keterangan Event" aria-describedby="basic-addon2"><?= $e['ASAL_PESERTA'] ?></textarea>
                    </div>
                  </div>
                </div>
 
                <div class="row">
                  <div class="col-sm-6">
                    <p>Ruangan</p>
                    <div class="input-group">
                      <select class="form-control border-dark small mb-3" id="ruangan" name="ruangan">
                        <option value=""><?= $e['NAMA_RUANGAN'] ?></option>
                        <?php foreach ($get as $r) : ?>
                          <option value="<?= $r->ID_RUANGAN ?>" <?= ($e['ID_RUANGAN'] == $r->ID_RUANGAN ? 'selected' : '') ?>><?php echo $r->NAMA_RUANGAN ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <p>Jumlah Peserta</p>
                    <div class="input-group">
                      <input name="jumlahpeserta" id="jumlahpeserta" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Jumlah Peserta" aria-describedby="basic-addon2" value="<?= $e['JUMLAH_PESERTA'] ?>" onkeypress="return hanyaAngka(event)">
                    </div>
                  </div>
                </div>
 
                <div class="row">
                  <div class="col-sm-6">
                    <p>Upload Poster Event</p>
                    <div class="input-group">
                      <input name="foto" id="foto" type="file" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <p>Upload Surat Perijinan Komunitas</p>
                    <div class="input-group">
                      <input name="suratperijinan" id="suratperijinan" type="file" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input name="blank" id="blank" type="hidden" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                    </div>
                    <?php foreach ($detail as $row) { ?>
                      <a href="<?= base_url('uploads/event/') . $row->FOTO ?>">Lihat Foto</a>
                    <?php } ?>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input name="blank" id="blank" type="hidden" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                      <?php foreach ($detail as $row) { ?>
                        <a href="<?= base_url('uploads/event/') . $row->SURAT_PENGAJUAN ?>">Lihat Surat Pengajuan</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-3">
                    <p>Peminjaman Alat</p>
                    <div class="input-group">
                      <select class="form-control border-dark small mb-3" id="peminjamanalat" name="peminjamanalat">
                        <?php foreach ($alat as $r) { ?>
                          <option value="<?php echo $r->ID_ALAT ?>"><?php echo $r->NAMA_ALAT ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <p>Jumlah Alat</p>
                    <div class="input-group">
                      <input name="jumlahalat" id="jumlahalat" type="number" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2" value="<?php echo set_value('jumlahalat') ?>">
                    </div>
                  </div>
                  <div class="col-sm-3 my-5">
                    <button type="button" onclick="kirimdata()" id="btn-tambah" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-plus"></i></button>
                  </div>
 
                </div>
 
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataAlat" width="100%" cellspacing="0">
                    <thead>
                      <tr>
 
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="target">
 
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
                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakinuntuk menghapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal" untuk kembali ke Panel Admin.</div>
                      <div class="modal-footer">
                        <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                        <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- /.card -->
 
        </form>
      <?php } ?>
      </div>
      <!-- /.container-fluid -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
    </div>
    <!-- End of Main Content -->
 
    <!-- Footer -->
 
 
  </div>
  <!-- End of Content Wrapper -->
 
  </div>
  <!-- End of Page Wrapper -->
 
  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>
 
  <!-- Logout Modal-->
  <?php //$this->load->view("admin/_partials/modal.php") 
  ?>
 
  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>
  <script type="text/javascript">
    ambildata();
 
    function ambildata() {
      var kode = $("[name='id_event']").val();
      console.log(kode);
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . "index.php/admin/event/ambil/" ?>' + kode,
        dataType: 'json',
        success: function(data) {
          var baris = '';
          for (var i = 0; i < data.length; i++) {
            baris += '<tr>' +
 
              '<td>' + data[i].NAMA_ALAT + '</td>' +
              '<td>' + data[i].JUMLAH + '</td>' +
              '<td hidden>' + data[i].ID_DETAIL_EVENT + '</td>' +
              '<td><a onclick="hapusdata(' + data[i].ID_DETAIL_EVENT + ')" href="" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'
            '</tr>'
          }
          $('#target').html(baris);
          console.log(baris);
        }
      });
 
    }
 
    function hapusdata(id) {
      var tanya = confirm('apakah anda ingin hapus data ? ');
 
      if (tanya) {
        $.ajax({
          type: 'POST',
          data: 'ID_DETAIL_EVENT=' + id,
          url: '<?php echo base_url() . "index.php/admin/event/hapusdata" ?>',
          success: function(data) {
            console.log(data);
          }
        });
      }
    }
 
    function kirimdata() {
      var id_event = $("[name='id_event']").val();
      var id_alat = $("[name='peminjamanalat']").val();
      var jumlah = $("[name='jumlahalat']").val();
 
      $.ajax({
        type: 'POST',
        data: 'id_event=' + id_event + '&peminjamanalat=' + id_alat + '&jumlahalat=' + jumlah,
        url: '<?php echo base_url() . "index.php/admin/event/tambahdata" ?>',
        dataType: 'json',
        success: function(data) {
          if (data.pesan == '') {
 
            console.log(data);
            ambildata();
            $("[name='jumlahalat']").val('');
          }
        }
 
 
      });
    }
  </script>
</body>
 
</html>