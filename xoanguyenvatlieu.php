<?php
session_start();
include 'config.php';
$idDelete=$_GET['id'];
$sql="DELETE FROM nguyenvatlieu WHERE manguyenvatlieu='$idDelete'";
$result=mysqli_query($con,$sql);
if($result) {
    header("Location: quanlynguyenvatlieu.php?page=".$_SESSION['pageLive']);
} else {
   die('không thành công');
}

?>