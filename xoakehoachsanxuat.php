<?php
session_start();
include 'config.php';
$idDelete=$_GET['id'];
$sql="DELETE FROM KEHOACHSANXUAT WHERE maKeHoachSanXuat='$idDelete'";
$result=mysqli_query($con,$sql);
if($result) {
    header("Location: kehoachsanxuat.php?page=".$_SESSION['pageLive']);
} else {
   die('không thành công');
}

?>