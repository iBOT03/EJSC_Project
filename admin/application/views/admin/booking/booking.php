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
          <h1 class="h3 mb-2 text-gray-800">Jadwal Booking</h1>

          <!-- Sub Topbar -->
          <div class="card shadow mb-4">
            <nav class="navbar navbar-expand card-header py-3">

              <div class="col-sm-2">
                <a href="<?php echo site_url('admin/booking/tambah')?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Booking</span>
                </a>
              </div>

              <ul class="navbar-nav ml-auto">
                <!-- Ruangan -->
                <li class="col-sm-6">
                  <div class="dropdown mr-5">
                    <select class="btn btn-sm btn-light border-dark dropdown-toggle shadow-sm"
                            type="button"
                            data-toggle="dropdown"
                            id="dataruang"
                            aria-expanded="false">
                            <option value="99">Pilih Ruangan</option>
                            <?php foreach($ruangan as $r){ ?>
                        <option class="dropdown-item" value="<?= $r['ID_RUANGAN']; ?>"><?= $r['NAMA_RUANGAN'];?></option>
                        <?php } ?>
                    </select>
                  </div>              
                </li>
                <!-- Tanggal -->
                <li class="col-sm-6">
                  <input class="btn btn-sm btn-light border-dark dropdown-toggle shadow-sm"
                         type="date" id="filtertanggal" name="filtertanggal"                        
                         data-date-format="yyyy-mm-dd">
                  </input>
                </li>
              </ul> <!-- End Row -->
              
            </nav>
            <div class="col mt-3">
                  <?php echo $this->session->flashdata('pesan')?>
                </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 30px">Jam</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Komunitas</th>
                      <th>Kegiatan</th>
                      <th>Tanggal Booking</th>
                      <th>Durasi</th>
                      <th style="width: 60px">Status</th>
                      <th style="width: 100px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="target">
                          <!-- <?php foreach($booking as $b):?>
                          <tr>
                            <td><?=$b->JAM_MULAI ?></td>
                            <td><?=$b->NIK ?></td>
                            <td><?=$b->NAMA ?></td>
                            <td><?=$b->NAMA_KOMUNITAS ?></td>
                            <td><?=$b->TUJUAN ?></td>
                            <td><?=$b->DURASI ?> Jam</td>
                            <td><?php if ($b->STATUS == 1) {
                                echo '<div class="badge badge-primary badge-pill">Aktif</div>';
                              } elseif ($b->STATUS == 2) {
                                echo '<div class="badge badge-warning badge-pill">Pending</div>';
                              } elseif ($b->STATUS == 3) {
                                echo '<div class="badge badge-success badge-pill">Selesai</div>';
                              }elseif ($b->STATUS == 4) {
                                echo '<div class="badge badge-danger badge-pill">Batal</div>';
                              } ?></td>
                          </tr>
                          <?php endforeach;?> -->
                  </tbody>
                </table>
                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                       aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakinuntuk menghapus?</h5>
                          <button class="close" type="button" data-dismiss="modal"
                                  aria-label="Close">
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
            </div> <!-- End Card Body -->
          </div>

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
  <?php $this->load->view("admin/_partials/modal.php") ?>

    <script type="text/javascript">
        function confirm_modal(delete_url) {
          console.log(delete_url);
            document.getElementById('delete_link').setAttribute('href', delete_url);
          
            $('#hapusModal').modal('show', {
                backdrop: 'static'
            });
        }

       
    </script>

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>
      <script>
          load_booking();
              $(document).ready(function(){
                    $("#dataruang").change(function(){
                    let dataruang = $(this).val();
                    if (dataruang == "99") {
                      load_booking();
                    }else{
                      data_hasil(dataruang);
                    }
                   
                });
              });
              function data_hasil(dataruang) {
                $.ajax({
                  url : "<?php echo base_url()."index.php/admin/booking/load"?>",
                  data : "dataruang=" + dataruang,
                  dataType:"json",
                  success : function (data) {
                    var baris='';
                    var status = ['','<div class="badge badge-primary badge-pill">Aktif</div>','<div class="badge badge-warning badge-pill">Pending</div>','<div class="badge badge-success badge-pill">Selesai</div>','<div class="badge badge-danger badge-pill">Batal</div>'];
                    for(var i=0;i<data.length;i++){
                       baris+= '<tr>'+
                                '<td>'+ data[i].JAM_MULAI+'</td>'+
                                '<td>'+ data[i].NIK+'</td>'+
                                '<td>'+ data[i].NAMA+'</td>'+
                                '<td>'+ data[i].NAMA_KOMUNITAS+'</td>'+
                                '<td>'+ data[i].TUJUAN +'</td>'+
                                '<td>'+ data[i].TANGGAL_MULAI +'</td>'+
                                '<td>'+ data[i].DURASI +" "+"Jam"+'</td>'+
                               
                                '<td>'+ status[data[i].STATUS]+'</td>'+
                                '<td><a href="booking/detail/'+data[i].ID_BOOKING+'" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-plus"></i></a><a href="booking/edit/'+data[i].ID_BOOKING+'"  class="btn btn-sm btn-info btn-circle"><i class="fa fa-pencil-alt"></i></a><a onclick="confirm_modal('+"'booking/hapusdata/"+data[i].ID_BOOKING+"'"+')" href=""  data-toggle="modal" data-target="#hapusModal"class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'
                    
                              '</tr>'
                      }
                      $('#target').html(baris);
                  }
                });
              }
              function load_booking() {
                $.ajax({
                  url : "<?php echo base_url()."index.php/admin/booking/data_awal"?>",
                  dataType:"json",
                  success : function (data) {
                    var baris='';
                    var status = ['','<div class="badge badge-primary badge-pill">Aktif</div>','<div class="badge badge-warning badge-pill">Pending</div>','<div class="badge badge-success badge-pill">Selesai</div>','<div class="badge badge-danger badge-pill">Batal</div>'];
                    for(var i=0;i<data.length;i++){
                       baris+= '<tr>'+
                                '<td>'+ data[i].JAM_MULAI+'</td>'+
                                '<td>'+ data[i].NIK+'</td>'+
                                '<td>'+ data[i].NAMA+'</td>'+
                                '<td>'+ data[i].NAMA_KOMUNITAS+'</td>'+
                                '<td>'+ data[i].TUJUAN +'</td>'+
                                '<td>'+ data[i].TANGGAL_MULAI +'</td>'+
                                '<td>'+ data[i].DURASI +" "+"Jam"+'</td>'+
                               
                                '<td>'+ status[data[i].STATUS] +'</td>'+
                                '<td><a href="booking/detail/'+data[i].ID_BOOKING+'" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-plus"></i></a><a href="booking/edit/'+data[i].ID_BOOKING+'"  class="btn btn-sm btn-info btn-circle"><i class="fa fa-pencil-alt"></i></a><a onclick="confirm_modal('+"'booking/hapusdata/"+data[i].ID_BOOKING+"'"+')" href=""  data-toggle="modal" data-target="#hapusModal"class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'
                    
                              '</tr>'
                      }
                      $('#target').html(baris);
                  }
                });
              }
             
              function hapusdata(id) {
              var tanya = confirm('apakah anda ingin hapus data ?');

              if (tanya) {
                $.ajax({
                  type:'POST',
                  data:'ID_BOOKING='+id,
                  url:'<?php echo base_url()."index.php/admin/booking/hapusdata"?>',
                  success: function (data) {
                    // ambil();
                  }
                });
              }
            }
              $(document).ready(function(){
                            $("#filtertanggal").change(function(){
                            let filtertanggal = $(this).val();
                            console.log(filtertanggal);
                            if(filtertanggal != null && filtertanggal !=''){
                              gettanggal(filtertanggal);
                            }else {
                              load_booking();
                            }
                        });
              });
              function gettanggal(filtertanggal){

                $.ajax({
                  url : "<?php echo base_url()."index.php/admin/booking/gettgl"?>",
                  data : "filtertanggal=" + filtertanggal,
                  dataType:"json",
                  success : function (data) {
                    var baris='';
                    
                    var status = ['','<div class="badge badge-primary badge-pill">Aktif</div>','<div class="badge badge-warning badge-pill">Pending</div>','<div class="badge badge-success badge-pill">Selesai</div>','<div class="badge badge-danger badge-pill">Batal</div>'];
                    for(var i=0;i<data.length;i++){
                       baris+= '<tr>'+
                                '<td>'+ data[i].JAM_MULAI+'</td>'+
                                '<td>'+ data[i].NIK+'</td>'+
                                '<td>'+ data[i].NAMA+'</td>'+
                                '<td>'+ data[i].NAMA_KOMUNITAS+'</td>'+
                                '<td>'+ data[i].TUJUAN +'</td>'+
                                '<td>'+ data[i].TANGGAL_MULAI +'</td>'+
                                '<td>'+ data[i].DURASI +" "+"Jam"+'</td>'+
                               
                                '<td>'+ status[data[i].STATUS]+'</td>'+
                                '<td><a href="booking/detail/'+data[i].ID_BOOKING+'" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-plus"></i></a><a href="booking/edit/'+data[i].ID_BOOKING+'"  class="btn btn-sm btn-info btn-circle"><i class="fa fa-pencil-alt"></i></a><a onclick="confirm_modal('+"'booking/hapusdata/"+data[i].ID_BOOKING+"'"+')" href="" data-toggle="modal" data-target="#hapusModal" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'
                    
                              '</tr>'
                      }
                      $('#target').html(baris);
                  }
                });
              }
              
    
        </script>
</html>
