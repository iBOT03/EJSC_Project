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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <!-- <a href="#" class="btn btn-sm btn-info btn-icon-split shadow-sm">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text"> Tambah Data</span>
            </a> -->
            
              <div class="row">
                <!-- Tahun -->
                <div class="col-sm-1">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Tahun
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">2020</a>
                      <a class="dropdown-item" href="#">2019</a>
                      <a class="dropdown-item" href="#">2018</a>
                    </div>
                  </div>
                </div>
                <!-- Bulan -->
                <div class="col-sm-1">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Bulan
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Januari</a>
                      <a class="dropdown-item" href="#">Februari</a>
                      <a class="dropdown-item" href="#">Maret</a>
                      <a class="dropdown-item" href="#">April</a>
                      <a class="dropdown-item" href="#">Mei</a>
                      <a class="dropdown-item" href="#">Juni</a>
                      <a class="dropdown-item" href="#">Juli</a>
                      <a class="dropdown-item" href="#">Agustus</a>
                      <a class="dropdown-item" href="#">September</a>
                      <a class="dropdown-item" href="#">Oktober</a>
                      <a class="dropdown-item" href="#">November</a>
                      <a class="dropdown-item" href="#">Desember</a>
                    </div>
                  </div>              
                </div>
                <!-- Tanggal -->
                <div class="col-sm-1">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Tanggal
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">1</a>
                      <a class="dropdown-item" href="#">2</a>
                      <a class="dropdown-item" href="#">3</a>
                      <a class="dropdown-item" href="#">4</a>
                      <a class="dropdown-item" href="#">5</a>
                      <a class="dropdown-item" href="#">6</a>
                      <a class="dropdown-item" href="#">7</a>
                      <a class="dropdown-item" href="#">8</a>
                      <a class="dropdown-item" href="#">9</a>
                      <a class="dropdown-item" href="#">10</a>
                      <a class="dropdown-item" href="#">11</a>
                      <a class="dropdown-item" href="#">12</a>
                    </div>
                  </div>              
                </div>
              </div> <!-- End Row -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 10px">Tanggal</th>
                      <th>Ruangan</th>
                      <th>Komunitas</th>
                      <th>Durasi</th>
                      <th style="width: 110px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <a href="#" style="width:35px" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-edit"></i></a>
                        <a href="#" style="width:35px" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
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

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
