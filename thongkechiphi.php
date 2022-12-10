<?php
require_once 'config.php';
include "layout.php";
?>
<style>
    .highcharts-figure,
.highcharts-data-table table {
  min-width: 360px;
  max-width: 800px;
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
   
</style>

<?php

$sqlthongke = "SELECT DATE_FORMAT(yeucausanxuat.ngayTao,'%e-%m') as 'ngayTao',(donGia-sum(chiPhiSx*soLuong)) as 'tongtien' from yeucausanxuat INNER JOIN chitietyeucau ON chitietyeucau.maYeuCauSanXuat = YEUCAUSANXUAT.maYeuCauSanXuat inner join sanpham on sanpham.maSanPham = chitietyeucau.maSanPham GROUP by DATE_FORMAT(yeucausanxuat.ngayTao,'%e-%m');";
$sqltongthu = "SELECT DATE_FORMAT(yeucausanxuat.ngayTao,'%d-%m'),sum(donGia) as 'tongthu' from yeucausanxuat INNER JOIN chitietyeucau ON chitietyeucau.maYeuCauSanXuat = YEUCAUSANXUAT.maYeuCauSanXuat inner join sanpham on sanpham.maSanPham = chitietyeucau.maSanPham GROUP by DATE_FORMAT(yeucausanxuat.ngayTao,'%d-%m');";
$sqlnhancong = "SELECT tenToSanXuat,sum(khanangsanxuat.soLuongNhanVien*khanangsanxuat.luong) as 'nhancong'from  khanangsanxuat GROUP by tenToSanXuat;";
$result = mysqli_query($con, $sqlthongke);
$resultnhancong = mysqli_query($con, $sqlnhancong);
$resulttongthu = mysqli_query($con, $sqltongthu);
$arr = [];
$maxdate = 15;
$tong_doanh_thu=0;
$tong_thu=0;
$tong_nhan_cong=0;
$today = date('d');
if ($today < $maxdate) {
    $get_date_last_month = $maxdate - $today;
    $last_month = date('m', strtotime(" -1 month"));
    $last_month_date = date('Y-m-d', strtotime(" -1 month"));
    $max_day_last_month = (new DateTime($last_month_date))->format('t');
    $start_day_last_month = $max_day_last_month - $get_date_last_month;

    for ($i = $start_day_last_month; $i <= $max_day_last_month; $i++) {
        $key = $i . '-' . $last_month;
        $arr[$key] = 0;
    }
    $start_date_this_month=1;
} else {
    $start_date_this_month=$today-$maxdate;
}


$this_month = date('m');


for ($i = $start_date_this_month; $i <= $today; $i++) {
    $key = $i . '-' . $this_month;
    $arr[$key] = 0;
}
foreach ($result as $r) {
    $arr[$r['ngayTao']] = (float)$r['tongtien'];
    $tong_doanh_thu+=(float)$r['tongtien'];
}
foreach ($resulttongthu as $r) {
    $tong_thu+=(float)$r['tongthu'];
}
foreach ($resultnhancong as $r) {
    $tong_nhan_cong+=(float)$r['nhancong'];
}
$tong_doanh_thu=$tong_doanh_thu-$tong_nhan_cong;
//  echo json_encode($arr);
//  exit();
$arrX = array_keys($arr);
$arrY = array_values($arr);
$lai=number_format(100*($tong_doanh_thu/$tong_thu),1);
($lai>0) ? $lai : "lỗ";
// echo json_encode($arrY);
?>
<figure class="highcharts-figure">
    <div id="container" style="margin-left: 80px;width: 900px;"></div>
    <p class="highcharts-description" style="margin-left: 300px;">
        tổng thu : <?=$tong_thu?> VND
    </p>
    <p class="highcharts-description" style="margin-left: 300px;">
        tổng thu thực tế khi trừ chi phí sản xuất : <?=$tong_doanh_thu?> VND
    </p>
    <p class="highcharts-description" style="margin-left: 300px;">
        tình trang lãi/lỗ : <?php echo $lai;?> %
    </p>
    <button type="button" style="margin-left: 450px;margin-top:30px ;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="home.php" style="text-decoration: none;color: #fff;">trang chủ</a></button>
</figure>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
    Highcharts.chart('container', {

        title: {
            text: 'thống kê doanh thu 15 ngày gần nhất'
        },


        yAxis: {
            title: {
                text: 'doanh thu'
            }
        },

        xAxis: {
            categories: <?php echo json_encode($arrX); ?>
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                }
            }
        },

        series: [{
            name: 'doanh thu',
            data: <?php echo json_encode($arrY); ?>
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

</script>