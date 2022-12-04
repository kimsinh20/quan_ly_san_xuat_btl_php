<?php
if (!isset($_SESSION)) {
  session_start();
}
//   // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
if (!isset($_SESSION['tenDangNhap'])) {
  header("Location: http://localhost/btl_php-main/login.php");
} else {
  include "config.php";
  include "layout.php";
  $sosp = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) from sanpham;"))[0];
  $solsx = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) from lenhsanxuat;"))[0];
  $soycsx = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) from yeucausanxuat;"))[0];
  $sokhsx = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) from kehoachsanxuat;"))[0];
?>
  <style>
    .highcharts-figure,
    .highcharts-data-table table {
      min-width: 320px;
      max-width: 660px;
      margin: 1em auto;
    }

    .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #ebebeb;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
    }

    .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
    }

    .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
      padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
      background: #f1f7ff;
    }
    footer .social {
  text-align: center;
  padding-bottom: 25px;
  color: white;
}

footer .social a {
  color: inherit;
  font-size: 24px;
  border: 1px solid steelblue;
  width: 40px;
  height: 40px;
  display: inline-block;
  text-align: center;
  border-radius: 50%;
  margin: 0 8px;
  transition: 0.5s;
  background-color: white;
  color: #2c3e50;
  opacity: 0.8;
}

footer .social a:hover {
  opacity: 1;
}


  </style>
  <div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $sosp ?></h3>

                <p>sản phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="qlsanpham.php" class="small-box-footer">xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $solsx ?><sup style="font-size: 20px"></sup></h3>

                <p>lệnh sản xuất</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="lenhsanxuat.php" class="small-box-footer">xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $soycsx ?></h3>

                <p>yêu cầu sản xuất</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="yeucausanxuat.php" class="small-box-footer">xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $sokhsx ?></h3>

                <p>kế hoạch sản xuất</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="kehoachsanxuat.php" class="small-box-footer">xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        </div>
        <!-- /.content-wrapper -->
        <footer class="footer">
          <h2>Top 5 sản phẩm sản xuất nhiều nhất</h2>
          <figure class="highcharts-figure">
            <div id="container">
             
            </div>
              <div class="social mt-1" >
                  <a href="https://congnghehp.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="https://congnghehp.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href="https://congnghehp.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
                <!-- <p class="highcharts-description">code by phan kim sinh </p> -->
          </figure>
        </footer>
      </div>
    <?php
  }
    ?>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          const sl = 5;
          $.ajax({
              url: 'ajaxthongsanpham.php',
              dataType: 'json',
              data: {
                sl
              },
            })
            .done(function(response) {
              const arr = Object.values(response);
              // console.log(response);
              Highcharts.chart('container', {
                chart: {
                  type: 'pie'
                },
                title: {
                  text: 'thống kê các sản phẩm'
                },
                accessibility: {
                  announceNewData: {
                    enabled: true
                  },
                  point: {
                    valueSuffix: '%'
                  }
                },

                plotOptions: {
                  series: {
                    dataLabels: {
                      enabled: true,
                      format: '{point.name}: {point.y:.1f}%'
                    }
                  }
                },

                tooltip: {
                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                  pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                  name: "Browsers",
                  colorByPoint: true,
                  data: arr
                }],
                drilldown: {
                  series: [{
                    name: "Chrome",
                    id: "Chrome",
                    data: [

                    ]
                  }]
                }
              });


            })
        }

      )
      // Create the chart
    </script>