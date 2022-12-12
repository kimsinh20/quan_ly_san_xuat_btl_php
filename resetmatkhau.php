<?php 
include "config.php";
$id = $_GET['id'];
$matKhau=md5('12345678', false);
$sql = "update taikhoan set matKhau = '$matKhau' where tenDangNhap = '$id';";
$result  =  mysqli_query($con,$sql);
if($result) {
    echo "
    <script language='javascript'>
    alert('reset thành công');
        window.open('taikhoan.php','_self', 1);
    </script>
";
} else {
    echo "
    <script language='javascript'>
    alert('chưa thành công');
        window.open('taikhoan.php','_self', 1);
    </script>
";
}
?>