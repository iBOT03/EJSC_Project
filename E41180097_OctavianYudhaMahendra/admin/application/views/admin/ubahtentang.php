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
          <h1 class="h3 mb-2 text-gray-800">Ubah Data Kontak Kami</h1>
          <form method="post">
          <div class="row">
            <div class="col-sm-6">
              <p>Email</p>
              <div class="input-group">
                <input type="text" class="form-control border-dark small mb-3"
                       placeholder=""
                       name="email"
                       id="email"
                       value=""
                       aria-describedby="basic-addon2">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <p>Nomor Telepon</p>
              <div class="input-group">
                <input type="text" class="form-control border-dark small mb-3"
                       placeholder=""
                       name="no"
                       id="no"
                       value=""
                       aria-describedby="basic-addon2">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <p>Whatsapp</p>
              <div class="input-group">
                <input type="text" class="form-control border-dark small mb-3"
                       placeholder=""
                       name="wa"
                       id="wa"
                       value=""
                       aria-describedby="basic-addon2">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <p>Facebook</p>
              <div class="input-group">
                <input type="text" class="form-control border-dark small mb-3"
                       placeholder=""
                       name="fb"
                       id="fb"
                       value=""
                       aria-describedby="basic-addon2">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <p>Instagram</p>
              <div class="input-group">
                <input type="text" class="form-control border-dark small mb-3"
                       placeholder=""
                       name="ig"
                       id="ig"
                       value=""
                       aria-describedby="basic-addon2">
              </div>
            </div>
          </div>
       
          
          <p>Alamat</p>
          <div class="input-group">
            <textarea type="text" class="form-control border-dark small mb-3" 
                      name="alamat"
                      id="alamat"
                      value=""
                      placeholder=""
                      aria-describedby="basic-addon2">
            </textarea>
          </div>

          <button type="submit" class="btn btn-info btn-icon-split">
          <span class="icon text-white-50">
              <i class="fas fa-pencil-alt"></i>
            </span>
             <span class="text">Simpan Data</span>
        </div>
       
      </div>
      <!-- /.card -->
    </form>

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

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
