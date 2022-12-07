<?php
//
require_once 'config.php';
$sqlthongke = "SELECT DATE_FORMAT(thuctesanxuat.ngaySanXuat,'%e-%m') as 'ngaySanXuat',thuctesanxuat.soLuongDaSanXuat as 'sl' from lenhsanxuat INNER join thuctesanxuat on thuctesanxuat.maLenhSanXuat=lenhsanxuat.maLenhSanXuat odder  GROUP by DATE_FORMAT(thuctesanxuat.ngaySanXuat,'%e-%m');');";

$result = mysqli_query($con, $sqlthongke);
$arrr = [];
//lấy ngày
$maxdate = 10;
// $maxdate = $_GET['days'];
$today = date('d');
$get_date_last_month = $maxdate - $today;
$last_month = date('m', strtotime(" -1 month"));
$last_month_date = date('Y-m-d', strtotime(" -1 month"));
$max_day_last_month = (new DateTime($last_month_date))->format('t');
$start_day_last_month = $max_day_last_month - $get_date_last_month;

  $sql = "SELECT * FROM lenhsanxuat inner join thuctesanxuat on thuctesanxuat.maLenhSanXuat=lenhsanxuat.maLenhSanXuat order by ngayLap DESC LIMIT 0, 5;";
  $rusult_kq=mysqli_query($con,$sql);
  $arr=[];
  foreach ($rusult_kq as $r) {
    $malsx=$r['maLenhSanXuat'];
    $tenlsx=$r['tenLenhSanXuat'];
    $tiendo=number_format(100*($r['soLuongDaSanXuat']/$r['soLuongSX']),1);
    if(is_nan($tiendo)) {
        $tiendo=0;
    } 
    if(empty($arr[$malsx])) {
    $arr[$malsx]=[
       'name' => $malsx,
        'y' => (float)$tiendo,
        'drilldown' => strval($malsx)
    ];
    } else {
    $arr[$malsx]['y'] += $tiendo  ; 
    }

}
$arr2=[];
foreach ($arr as $ma_lenh_sx => $each) {
    $arr2[$ma_lenh_sx]= [
        'name' => $each['name'],
         'id' =>  strval($ma_lenh_sx),
    ];
         $arr2[$ma_lenh_sx]['data'] = [];
         if ($today < $maxdate) {
            for ($i = $start_day_last_month; $i <= $max_day_last_month; $i++) {
                $key = $i . '-' . $last_month;
                $arr2[$ma_lenh_sx]['data'][$key] = [
                    $key,
                    0
                ];
            }
            $start_date_this_month=1;
        }
}
foreach ($rusult_kq as $r) {
    $malsx=$r['maLenhSanXuat'];
    $key= $r['ngaySanXuat'] ;
    $arr2[$malsx]['data'][$key] = [
          $key,
          (int)$r['soLuongDaSanXuat']
    ];
}

$object= json_encode([$arr,$arr2]);
echo $object;
// echo json_encode($arr);
// echo json_encode($arr2);
// exit();

?>