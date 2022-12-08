<?php
session_start();
include 'config.php';
$idDelete=$_GET['id'];
$sql="DELETE FROM congdoan WHERE maCongDoan='$idDelete'";
$result=mysqli_query($con,$sql);
if($result) {
    header("Location: congdoan.php?page=".$_SESSION['pageLive']);
} else {
   die('không thành công');
}

?>