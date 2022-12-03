


<?php
//
require_once 'config.php';
$sl=$_GET['sl'];
$sqlthongke = "SELECT sanpham.tenSanPham,sum(khothanhpham.soLuongSP) as slt FROM sanpham INNER JOIN khothanhpham ON khothanhpham.maSanPham=sanpham.maSanPham  GROUP by sanpham.tenSanPham LIMIT 0,$sl; ";
$result = mysqli_query($con, $sqlthongke);
$sql_tongsp="SELECT sum(khothanhpham.soLuongSP) FROM khothanhpham;";
$tong_sp=mysqli_fetch_array(mysqli_query($con,$sql_tongsp))[0];
$so_sp_con_lai=$tong_sp;
$arr = [];
  foreach ($result as $r) {
    $tensp=$r['tenSanPham'];
    $soluong=$r['slt'];
    $phantram=number_format(100*($soluong/$tong_sp),1);
    $so_sp_con_lai-=$soluong;
    if(empty($arr[$tensp])) {
    $arr[$tensp]=[
       'name' => $tensp,
        'y' => (float)$phantram,
        'drilldown' => strval($tensp)
    ];
    } else {
    $arr[$tensp]['y'] += $soluong  ; 
    }
}
$phan_tram_so_sp_cl=number_format(100*($so_sp_con_lai/$tong_sp),1);
$arr['số sản phẩm còn lại']=[
    'name' => 'số sản phẩm còn lại',
    'y' => (float)$phan_tram_so_sp_cl,
    'drilldown' => 'số sản phẩm còn lại'
];
// $object= json_encode([$arr,$arr2]);
// echo $object;
echo json_encode($arr);
// echo json_encode($arr2);
exit();

?>
