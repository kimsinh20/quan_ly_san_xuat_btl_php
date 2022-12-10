<?php
session_start();
include 'config.php';
$spDelete=$_GET['masp'];
$nvlDelete=$_GET['manvl'];
$sql="DELETE FROM dinhmucnvl WHERE maSanPham='$spDelete' and maNguyenVatLieu = '$nvlDelete';";
$result=mysqli_query($con,$sql);
if($result) {
    header("Location: dinhmucvattu.php?page=".$_SESSION['pageLive']);
} else {
   die('không thành công');
}

?>