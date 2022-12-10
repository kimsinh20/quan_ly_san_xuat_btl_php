<?php

use JetBrains\PhpStorm\Internal\TentativeType;

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include "config.php";
include "layout.php";

$tenDN=$_SESSION['tenDangNhap'];
$sql="select * from taikhoan where tenDangNhap = '$tenDN'";
$result=mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($_POST['luu']) && isset($_POST['hoVaTen']) && isset($_POST['email']) && isset($_POST['soDienThoai'])) {
$hoVaTen=$_POST['hoVaTen'];
$matKhau=md5($_POST['matKhau'], false);
$email=$_POST['email'];
$soDienThoai=$_POST['soDienThoai'];
$anh=isset($_FILES['hinhanh']['name']) ? $_FILES['hinhanh']['name'] :$result['anh'];
$target_dir = './dist/assest/image/';
$target_file = $target_dir . basename($anh);
move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$target_file);
    
$sqlupdate = "update taikhoan set hoVaTen='$hoVaTen',email='$email',soDienThoai='$soDienThoai',matKhau='$matKhau',anh='$anh' where tenDangNhap = '$tenDN'";
$result_update =mysqli_query($con,$sqlupdate);
if($result_update) {
    echo "
    <script language='javascript'>
    alert('cập nhật thành công');
        window.open('home.php','_self', 1);
    </script>
";
} else {
    echo "
    <script language='javascript'>
    alert('chưa thành công');
        window.open('updatetaikhoan.php','_self', 1);
    </script>
";
}
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="container">
        <div class="row text-center">
        <h2>cập nhật thông tin cá nhân</h2>
        </div>
        <div class="row">
            <div class="col ml-5">
                <form enctype='multipart/form-data' method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">họ và tên</label>
                        <input type="text" class="form-control" value="<?=$result['hoVaTen']?>" name="hoVaTen" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">mật khẩu</label>
                        <input type="password" class="form-control" value="12345678" name="matKhau" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">email</label>
                        <input type="text" class="form-control"value="<?=$result['email']?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">số điện thoại</label>
                        <input type="text" class="form-control" value="<?=$result['soDienThoai']?>" name="soDienThoai" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ảnh</label>
                        <input type="file" class="form-control mb-3"  name="hinhanh" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <!-- <img src="./dist/assest/image/<?=$result['anh'];?>" alt="error" style="width: 250px" alt="err"> -->
                    </div>
                    <button type="submit" class="btn btn-primary mr-3" name="luu">lưu</button>
                    <button type="submit" class="btn btn-primary"><a href="home.php" style="color: #fff;text-decoration: none;">thoát</a></button>
                </form>
            </div>
        </div>
    </div>
</div>