<?php
session_start();
include 'config.php';
$idDelete=$_GET['id'];
$sql="DELETE FROM sanpham WHERE maSanPham='$idDelete'";
$result=mysqli_query($con,$sql);
if($result) {
    header("Location: qlsanpham.php?page=".$_SESSION['pageLive']);
} else {
   die('không thành công');
}

?>