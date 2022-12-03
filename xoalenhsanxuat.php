<?php
session_start();
include 'config.php';
$idDelete=$_GET['id'];
$idDeleteMaSP=$_GET['masp'];
$sql="DELETE FROM LENHSANXUAT WHERE maLenhSanXuat='$idDelete'";
$result=mysqli_query($con,$sql);

if($result) {
    header("Location: lenhsanxuat.php?page=".$_SESSION['trangHienTai']);
} else {
   die('không thành công');
}

?>