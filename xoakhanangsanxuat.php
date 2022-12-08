<?php
session_start();
include 'config.php';
$idDelete=$_GET['id'];
$sql="DELETE FROM khanangsanxuat WHERE tenToSanXuat='$idDelete'";
$result=mysqli_query($con,$sql);
if($result) {
    header("Location: khanangsanxuat.php?page=".$_SESSION['pageLive']);
} else {
   die('không thành công');
}

?>