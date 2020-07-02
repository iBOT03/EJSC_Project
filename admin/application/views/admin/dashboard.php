<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Head -->
    <?php $this->load->view("admin/_partials/head.php") ?>
    <!-- Latest CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="<?= site_url('admin/dashboard/export_excel/') ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                            <span class="text"> Download Laporan</span>
                        </a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Kunjungan Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                                Kunjungan (Booking)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $total_boking; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Event Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total
                                                Event Terselenggara</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $total_event; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total pengguna Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total
                                                Pengguna</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">

                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo $total_pengguna; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Feedback Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Komunitas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $total_komunitas; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-2 text-gray-800">Report Booking</h4>
                    <form class="mb-5" method="POST" action="<?= site_url('admin/dashboard/export_excel/') ?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <p>Tanggal Mulai</p>
                                <div class="input-group">
                                    <input class="form-control border-dark small mb-6" type="date" id="tanggalMulai" name="tanggalMulai">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p>Sampai dengan</p>
                                <div class="input-group">
                                    <input class="form-control border-dark small mb-6" type="date" id="sampaiDengan" name="sampaiDengan">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p> </p>
                                <button type="submit" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text"> Download Laporan</span>
                                </button>
                            </div>
                        </div>
                    </form>

                    <h4 class="h4 mb-2 text-gray-800">Report Event</h4>
                    <form class="mb-5" method="POST" action="<?= base_url('admin/event/export_excel') ?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <p>Tanggal Mulai</p>
                                <div class="input-group">
                                    <input class="form-control border-dark small mb-6" type="date" id="tanggalMulai" name="tanggalMulai">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p>Sampai dengan</p>
                                <div class="input-group">
                                    <input class="form-control border-dark small mb-6" type="date" id="sampaiDengan" name="sampaiDengan">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p> </p>
                                <button type="submit" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text"> Download Laporan</span>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-info">Grafik Kunjungan</h6>
                                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#"
                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Filter Berdasarkan:</div>
                                            <a class="dropdown-item" href="#">Tahun</a>
                                            <a class="dropdown-item" href="#">Bulan</a>
                                            <a class="dropdown-item" href="#">Minggu</a>
                                            <a class="dropdown-item" href="#">Hari</a>
                                        </div>
                                    </div> -->
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="bar-chart"></canvas>
                                        <!--Load chart js-->

                                    </div>
                                </div> <!-- End Chart -->
                            </div>
                        </div>
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

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = $("#bar-chart");
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: cData.label,
            datasets: [{
                //      label: cData.label,
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: cData.data,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return '' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + '' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>

</html>