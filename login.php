<?php
session_start(); 
require_once 'config.php';
if (isset($_POST['submit'])) {
  $tenDangNhap = $_POST['tenDangNhap'];
  $matKhau = MD5($_POST['matKhau']);
  $sql_check = mysqli_query($con, "select * from TAIKHOAN where tenDangNhap = '$tenDangNhap';");
  $dem = mysqli_num_rows($sql_check);
  if ($dem == 0) {
    $_SESSION['thongbaoloi'] = "Tài khoản không thồn tại";
    echo "
							<script language='javascript'>
								alert('Tài khoản không tồn tại');
								window.open('login.php','_self', 1);
							</script>
						";
  } else {
    $sql_check2 = mysqli_query($con, "select * from TAIKHOAN where tenDangNhap = '$tenDangNhap' and matKhau = '$matKhau';");
    $dem2 = mysqli_num_rows($sql_check2);
    if ($dem2 == 0)
      echo "
							<script language='javascript'>
								alert('Mật khẩu đăng nhập không đúng');
								window.open('login.php','_self', 1);
							</script>
						";
    else {
      $row = mysqli_fetch_array($sql_check2);
      // setcookie('checkDN', $tenDangNhap, time() + (86400 * 15), "/");
      $_SESSION['tenDangNhap'] = $tenDangNhap;
      $_SESSION['vaiTro'] = $row['vaiTro'];

      if ($_SESSION['vaiTro'] == 'adminsx') {
        echo "
							<script language='javascript'>
								alert('Đăng nhập với quyền admin sản xuất thành công');
								window.open('home.php','_self', 1);
							</script>
						";
      } else if($_SESSION['vaiTro'] == 'user'){

        echo "
							<script language='javascript'>
								alert('Đăng nhập với quyền nhân viên thành công');
								window.open('login.php','_self', 1);
							</script>
						";
      } else {
        echo "
        <script language='javascript'>
          alert('Đăng nhập với quyền admin hệ thống thành công');
          window.open('login.php','_self', 1);
        </script>
      ";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login V1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="dist/css/login.css">
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="./dist/assest/image/login.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="POST">
          <span class="login100-form-title">
            Công ty HP.JSC
          </span>

          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <label>tên đăng nhập</label>
            <input class="input100" type="text" name="tenDangNhap" class="form-control" id="user name" placeholder="user name">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <label>mật khẩu</label>
            <input class="input100" type="password" name="matKhau" class="form-control" id="password" placeholder="password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button type="submit" name="submit" class="btn btn-primary">đăng nhập</button>
            <!-- <button type="button" class="btn btn-danger"><a href="#">exit</a></button> -->
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>