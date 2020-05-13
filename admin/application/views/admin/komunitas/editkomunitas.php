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
        <?php foreach($komunitas as $a){?>
          <!-- Page Heading -->
   
          <h1 class="h3 mb-2 text-gray-800">Ubah Data Komunitas</h1>
          
          <form method="post" enctype="multipart/form-data">
     
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                           name="nama_komunitas"
                           id="nama_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Komunitas"
                           aria-describedby="basic-addon2"
                           value="<?php echo $a->NAMA_KOMUNITAS;?>"
                           >
                  </div>
                </div>
 
                <div class="col-sm-6">
                  <p>Email Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                          name="email_komunitas"
                          id="email_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Email Komunitas"
                           aria-describedby="basic-addon2"
                           value="<?php echo $a->EMAIL;?>"
                           >
                  </div>  
                </div>
              </div>
 
              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Ketua Komunitas</p>
                  <div class="input-group">
                    <input type="text"
                          name="ketua_komunitas"
                          id="ketua_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Ketua Komunitas"
                           aria-describedby="basic-addon2"
                           value="<?php echo $a->NAMA_KETUA;?>"
                           >
                  </div>
                </div>
 
                <div class="col-sm-6">
                  <p>Kategori Komunitas</p>
                  <div class="input-group">
                    <select class="form-control border-dark small mb-3"
                            id="kategori_komunitas"
                            value="<?php echo $a->KATEGORI?>"
                            name="kategori_komunitas">
                            <option value=""><?php echo $a->KATEGORI ?>
                         
                      <?php foreach($jeniskomunitas as $d){ ?>
                         <option value="<?php echo $d['ID_KATEGORI'] ?>" <?= ($a->ID_KATEGORI == $d['ID_KATEGORI'] ? 'selected' :'' )  ?>><?php echo $d['KATEGORI'] ?>
                         </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            
              <p>Alamat Komunitas</p>
              <div class="input-group">
                <input type="text"
                        name="alamat_komunitas"
                        id="alamat_komunitas"
                       class="form-control border-dark small mb-3"
                       placeholder="Masukkan Alamat Komunitas"
                       aria-describedby="basic-addon2"
                       value="<?php echo $a->ALAMAT;?>"
                       >
              </div>
 
              <p>Deskripsi Komunitas</p>
              <div class="input-group">
                <input type="text"
                       class="form-control border-dark small mb-3"
                       name="deskripsi_komunitas"
                       id="deskripsi_komunitas"
                       placeholder="Masukkan Deskripsi Komunitas"
                       aria-describedby="basic-addon2"
                       value="<?php echo $a->DESKRIPSI_KOMUNITAS;?>"
                       >
              </div>
 
              <div class="row">
                <div class="col-sm-6">
                  <p>Telepon/Whatsapp</p>
                  <div class="input-group">
                    <input type="text"
                           class="form-control border-dark small mb-3"
                           name="no_komunitas"
                           id="no_komunitas"
                           placeholder="Masukkan No Telepon/Whatsapp Komunitas"
                           aria-describedby="basic-addon2"
                           value="<?php echo $a->NO_TELEPON;?>"
                           >
                  </div>
                </div>
 
                <div class="col-sm-6">
                  <p>Twitter</p>
                  <div class="input-group">
                    <input type="text"
                          name="twitter_komunitas"
                          id="twitter_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Twitter Komunitas"
                           value="<?php echo $a->TWITTER;?>"
                           aria-describedby="basic-addon2">
                  </div>
                </div>
            </div>
 
              <div class="row">
                <div class="col-sm-6">
                  <p>Facebook</p>
                  <div class="input-group">
                    <input type="text"
                          name="facebook_komunitas"
                          id="facebook_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Facebook Komunitas"
                           value="<?php echo $a->FACEBOOK;?>"
                           aria-describedby="basic-addon2">
                  </div>
                </div>
 
                <div class="col-sm-6">
                  <p>Instagram</p>
                  <div class="input-group">
                    <input type="text"
                          name="ig_komunitas"
                          id="ig_komunitas"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Instagram Komunitas"
                           value="<?php echo $a->INSTAGRAM;?>"
                           aria-describedby="basic-addon2">
                  </div>
                </div>
              </div>
 
              <div class="row">
                <div class="col-sm-6">
                  <p>Upload Logo Komunitas</p>
                  <div class="input-group">
                    <input name="foto" id="foto"
                           type="file"
                           class="form-control border-dark small mb-3"
                           placeholder=""
                           aria-describedby="basic-addon2"
                           accept="image/*" onchange="tampilkanPreview(this,'preview')"
                           >
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                      <div class="input-group">
                          <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2">            
                          <?php foreach ($data as $row) { ?>
                            <br>    <a href="<?= base_url('uploads/') . $row->LOGO ?>">Lihat Foto</a>
                          <?php } ?> 
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="input-group">
                        <img id="preview" src="" alt="" width="320px" /> <br>                                            
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="input-group">
                        <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2" maxlength="100" required> <br>
                      </div>
                    </div>
                  </div>
              <button type="submit" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Ubah Data Komunitas</span>
              </button>
              
              <a href="<?php echo site_url('admin/komunitas') ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
              </a>
 
            </div>
          </div>
          <!-- /.card -->
         
          <?php } ?>  
        </div>
        <!-- /.container-fluid -->
       
        </form>
      </div>
      <!-- End of Main Content -->

   
      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
 
    </div>
    <!-- End of Content Wrapper -->
    <script>
                function tampilkanPreview(gambar, idpreview) {
                    //                membuat objek gambar
                    var gb = gambar.files;
                    //                loop untuk merender gambFar
                    for (var i = 0; i < gb.length; i++) {
                        //                    bikin variabel
                        var gbPreview = gb[i];
                        var imageType = /image.*/;
                        var preview = document.getElementById(idpreview);
                        var reader = new FileReader();
                        if (gbPreview.type.match(imageType)) {
                            //                        jika tipe data sesuai
                            preview.file = gbPreview;
                            reader.onload = (function(element) {
                                return function(e) {
                                    element.src = e.target.result;
                                };
                            })(preview);
                            //                    membaca data URL gambar
                            reader.readAsDataURL(gbPreview);
                        } else {
                            //                        jika tipe data tidak sesuai
                            alert("Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
                        }
                    }
                }
            </script>
 
  </div>
  <!-- End of Page Wrapper -->
 
  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>
 
  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>
 
  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>
 
</body>
 
</html>