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
 
        <form method="post" enctype="multipart/form-data">
 
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
                       value="<?= set_value('judulevent'); ?>">
              <?= form_error('judulevent', '<small class="text-danger">', '</small>')?>                        
              </div>
              <?= form_error('no_komunitas', '<small class="text-danger">', '</small>')?> 
              <input name="id_event"
                       id="id_event"
                       type="hidden" 
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Judul Event"
                       aria-describedby="basic-addon2"
                       value="<?php echo $kode;?>">
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
                           value="<?= set_value('penyelenggara');?>">
                  </div>                  
                  <?= form_error('penyelenggara', '<small class="text-danger">', '</small>')?> 
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
                                value="<?= set_value('nama_pj'); ?>">
                  </div>                  
                  <?= form_error('nama_pj', '<small class="text-danger">', '</small>')?> 
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
                                value="<?=set_value('tanggalmulai'); ?>">
                  </div>                  
                  <?= form_error('tanggalmulai', '<small class="text-danger">', '</small>')?> 
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
                          value="<?= set_value('tanggalselesai'); ?>">
                  </div>                  
                  <?= form_error('tanggalselesai', '<small class="text-danger">', '</small>')?> 
                </div>
                <div class="col-sm-3">
                  <p>Waktu</p>
                  <div class="input-group">
                    <input class="form-control border-dark small mb-3"
                           type="time"
                           id="waktu"
                           value="<?= set_value('waktu'); ?>"
                           name="waktu">
                  </div>                  
                  <?= form_error('waktu', '<small class="text-danger">', '</small>')?> 
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
                              aria-describedby="basic-addon2"><?= set_value('keterangan'); ?></textarea>
                  </div>                  
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
                          ><?= set_value('pengisiacara'); ?></textarea>
                  </div>                  
                  <?= form_error('pengisiacara', '<small class="text-danger">', '</small>')?> 
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
                              ><?= set_value('asalpeserta'); ?></textarea>
                  </div>                  
                  <?= form_error('asalpeserta', '<small class="text-danger">', '</small>')?> 
                </div>
              </div>
 
              <div class="row">
                <div class="col-sm-6">
                  <p>Ruangan</p>
                  <div class="input-group">
                    <select class="form-control border-dark small mb-3"
                            id="ruangan"
                            name="ruangan"
                            value="<?= set_value('ruangan'); ?>">
                            <?php foreach ($ruangan as $r) {?>
                               <option value="<?php echo $r->ID_RUANGAN?>"><?php echo $r->NAMA_RUANGAN?></option>
                            <?php }?>
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
                          value="<?= set_value('jumlahpeserta'); ?>"
                          onkeypress="return hanyaAngka(event)"
                          >
                  </div>                  
                  <?= form_error('jumlahpeserta', '<small class="text-danger">', '</small>')?> 
                </div>
              </div>
 
              <div class="row">
                <div class="col-sm-6">
                  <p>Upload Poster Event</p>
                  <div class="input-group">
                    <input name="foto"
                          id="foto"
                          type="file"                                                   
                          class="form-control border-dark small mb-3"
                          placeholder=""
                          aria-describedby="basic-addon2"
                          >
                  </div>
                  
                  <?= form_error('posterevent', '<small class="text-danger">', '</small>')?> 
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
                           >
                  </div>
                  
                  <?= form_error('suratperijinan', '<small class="text-danger">', '</small>')?> 
                </div>
              </div>
 
              <div class="row">
                <div class="col-sm-3">
                  <p>Peminjaman Alat</p>
                  <div class="input-group">
                    <select class="form-control border-dark small mb-3"
                            id="peminjamanalat"
                            name="peminjamanalat">
                            <?php foreach ($alat as $r) {?>
                               <option value="<?php echo $r->ID_ALAT?>"><?php echo $r->NAMA_ALAT?></option>
                            <?php }?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <p>Jumlah Alat</p>
                  <div class="input-group">
                  <input name="jumlahalat"
                           id="jumlahalat"
                           type="number"                                                   
                           class="form-control border-dark small mb-3"
                           placeholder=""
                           aria-describedby="basic-addon2"
                                 value="<?php echo set_value('jumlahalat')?>"
                           >
                  </div>
                  
                  <?= form_error('jumlahalat', '<small class="text-danger">', '</small>')?> 
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
                      <th style="width: 50px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="target">
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
      <script type="text/javascript">
      
       ambil();
 
      function ambil(){
        $.ajax({
          type:'POST',
          url:'<?php echo base_url()."index.php/admin/event/ambildata/".$kode?>',
          dataType:'json',
          success: function(data){
             var baris='';
             for(var i=0;i<data.length;i++){
               baris+= '<tr>'+
                          
                            '<td>'+ data[i].NAMA_ALAT +'</td>'+
                            '<td>'+ data[i].JUMLAH +'</td>'+
                            '<td hidden>'+ data[i].ID_DETAIL_EVENT +'</td>'+
                            '<td><a onclick="hapusdata('+data[i].ID_DETAIL_EVENT+')" href="" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'
                        '</tr>'
             }
             $('#target').html(baris);
             console.log(baris);
          }
        });
      }
 
      function kirimdata() {
          var id_event = $("[name='id_event']").val();
          var id_alat = $("[name='peminjamanalat']").val();
          var jumlah = $("[name='jumlahalat']").val();
      
            $.ajax({
                type:'POST',
                data:'id_event='+id_event+'&peminjamanalat='+id_alat+'&jumlahalat='+jumlah,
                url:'<?php echo base_url()."index.php/admin/event/tambahdata"?>',
                dataType:'json',
                success: function (data) {
                  if (data.pesan=='') {
                    
                  console.log(data);
                  ambil();
                  $("[name='jumlahalat']").val('');
                  }
                }
 
 
            });
      }
      
      function hapusdata(id) {
        var tanya = confirm('apakah anda ingin hapus data ? ');
 
        if (tanya) {
          $.ajax({
            type:'POST',
            data:'ID_DETAIL_EVENT='+id,
            url:'<?php echo base_url()."index.php/admin/event/hapusdata"?>',
            success: function (data) {
              ambil();
            }
          });
        }
      }
      
      
      </script>
</body>
 
</html>