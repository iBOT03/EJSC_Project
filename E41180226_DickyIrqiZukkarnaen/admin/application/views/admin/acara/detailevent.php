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
      <form action="" method="post">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Detail Event</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <button class="btn btn-sm btn-info btn-icon-split shadow-sm" type="submit" name="setuju" id="setuju">
              <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Setujui</span></button>
              
              <button class="btn btn-sm btn-danger btn-icon-split shadow-sm" type="submit" name="tolak" id="tolak">
              <span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">Tolak</span></button>
       
            </div>
            <?php foreach($event as $e):?>
          <div class="card shadow mb-4">
          
            <div class="card-body">

              <img src="<?= base_url('uploads/event/').$e['FOTO'] ?>" alt="Poster Event" class="logo-komunitas mx-auto d-block mb-5">

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Judul Event:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['JUDUL']?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Penyelenggara:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['PENYELENGGARA']?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Nama Penanggung Jawab:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['NAMA_PJ']?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Ruangan:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['NAMA_RUANGAN']?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Tanggal Mulai:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['TANGGAL_MULAI']?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Tanggal Selesai:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['TANGGAL_SELESAI']?></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Waktu:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['WAKTU']?></p>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-2">
                  <p>Nama Pengisi Acara:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['NAMA_PENGISI_ACARA']?></p>
                  
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Asal peserta:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['ASAL_PESERTA']?></p>
                </div>
              </div>
              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Surat:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><a href="<?= base_url('uploads/event/').$e['SURAT_PENGAJUAN'] ?>">Lihat file</a></p>
                </div>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Jumlah Peserta:</p>
                </div>
                <div class="my-auto col-sm-1">
                  <p><?= $e['JUMLAH_PESERTA']?></p>
                </div>
                <p>orang</p>
              </div>

              <div class="row">
                <div class="my-auto col-sm-2">
                  <p>Keterangan Event:</p>
                </div>
                <div class="my-auto col-sm-9">
                  <p><?= $e['KETERANGAN']?></p>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataAlat" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width:10px">No</th>
                      <th>Nama Alat</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody id="target">
                  <?php 
                    $no = 1;
                  foreach($data as $d):?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$d->NAMA_ALAT?></td>
                        <td><?=$d->JUMLAH?></td>
                        
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>

              <a href="<?php echo site_url('admin/event') ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
              </a>

            </div>
          </div>
          <!-- /.card -->
            <?php endforeach;?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
    <!-- End of Content Wrapper -->
    </form>

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>
<script type="text/javascript">
// ambil();
  function ambil(){
        $.ajax({
          type:'POST',
          url:'<?php echo base_url()."index.php/admin/event/ambildata"?>',
          dataType:'json',
          success: function(data){
             var baris='';
             for(var i=0;i<data.length;i++){
               baris+= '<tr>'+
                            '<td>'+ data[i].ID_EVENT +'</td>'+
                            '<td>'+ data[i].NAMA_ALAT +'</td>'+
                            '<td>'+ data[i].JUMLAH +'</td>'+
                            '<td hidden>'+ data[i].ID_DETAIL_EVENT +'</td>'+
                                    '</tr>'
             }
             $('#target').html(baris);
             console.log(baris);
          }
        });
      }
      </script>
</body>

</html>