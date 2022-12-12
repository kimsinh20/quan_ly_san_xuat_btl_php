<?php
session_start();
include 'config.php';
$idDelete=$_GET['id'];
$sql="DELETE FROM taikhoan WHERE tenDangNhap='$idDelete'";
$result=mysqli_query($con,$sql);
if($result) {
    header("Location: taikhoan.php?page=".$_SESSION['pageLive']);
} else {
   die('không thành công');
}

?>