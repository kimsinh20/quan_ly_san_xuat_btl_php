<?php

use JetBrains\PhpStorm\Internal\TentativeType;

if (!isset($_SESSION)) {
    session_start();
}
include "config.php";
include "layout.php";

if (isset($_POST['luu']) && isset($_POST['hoVaTen']) && isset($_POST['email']) && isset($_POST['soDienThoai'])) {
    $tenDangNhap = $_POST['tenDangNhap'];
    $hoVaTen = $_POST['hoVaTen'];
    $matKhau = md5($_POST['matKhau'], false);
    $email = $_POST['email'];
    $soDienThoai = $_POST['soDienThoai'];
    $anh = isset($_FILES['hinhanh']['name']) ? $_FILES['hinhanh']['name'] : $result['anh'];
    $vaiTro = $_POST['vaiTro'];
    $target_dir = './dist/assest/image/';
    $target_file = $target_dir . basename($anh);
    move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);

    $sqlupdate = "INSERT INTO `taikhoan` (`tenDangNhap`, `hoVaTen`, `matKhau`, `email`, `soDienThoai`, `anh`, `vaiTro`) VALUES ('$tenDangNhap', '$hoVaTen', '$matKhau', '$email', '$soDienThoai', '$anh', '$vaiTro');";
    $result_update = mysqli_query($con, $sqlupdate);
    if ($result_update) {
        echo "
    <script language='javascript'>
    alert('thêm thành công');
        window.open('taikhoan.php','_self', 1);
    </script>
";
    } else {
        echo "
    <script language='javascript'>
    alert('chưa thành công');
        window.open('themtaikhoan.php','_self', 1);
    </script>
";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="container">
        <div class="row text-center">
            <h2>thêm tài khoản</h2>
        </div>
        <div class="row">
            <div class="col ml-5">
                <form enctype='multipart/form-data' method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">tên đăng nhập</label>
                        <input type="text" class="form-control" name="tenDangNhap" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">họ và tên</label>
                        <input type="text" class="form-control" name="hoVaTen" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">mật khẩu</label>
                        <input type="password" class="form-control" name="matKhau" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">số điện thoại</label>
                        <input type="text" class="form-control" name="soDienThoai" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ảnh</label>
                        <input type="file" class="form-control mb-3" name="hinhanh" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <!-- <img src="./dist/assest/image/<?= $result['anh']; ?>" alt="error" style="width: 250px" alt="err"> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">vai trò</label>
                        <select name="vaiTro">
                            <option value="adminsx">adminsx</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                        <!-- <img src="./dist/assest/image/<?= $result['anh']; ?>" alt="error" style="width: 250px" alt="err"> -->
                    </div>

                    <button type="submit" class="btn btn-primary mr-3" name="luu">thêm</button>
                    <button type="submit" class="btn btn-primary"><a href="home.php" style="color: #fff;text-decoration: none;">thoát</a></button>
                </form>
            </div>
        </div>
    </div>
</div>