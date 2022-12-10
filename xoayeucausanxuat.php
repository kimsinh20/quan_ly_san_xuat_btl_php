<?php
session_start();
include 'config.php';
$idDelete=$_GET['id'];
$spDelete=$_GET['masp'];
$sql="DELETE FROM yeucausanxuat WHERE mayeucausanxuat='$idDelete'";
$sql2="DELETE FROM chitietyeucau WHERE mayeucausanxuat='$idDelete' and maSanPham = '$spDelete';";
$result=mysqli_query($con,$sql);
$result2=mysqli_query($con,$sql2);
if($result && $result2) {
    header("Location: yeucausanxuat.php?page=1");
} else {
   die('không thành công');
}

?>