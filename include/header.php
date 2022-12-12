<?php
include_once "config.php";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $image='https://www.shutterstock.com/image-vector/caution-exclamation-mark-white-red-260nw-1055269061.jpg';
if(isset($_SESSION['tenDangNhap'])) {
  $tenDN=$_SESSION['tenDangNhap'];
  $sql="select anh from taikhoan where `tenDangNhap`='$tenDN';";
  $sqlCheck= mysqli_query($con,$sql);
  $image=mysqli_fetch_array($sqlCheck)['anh'];
} else {

  $tenDN='chưa đăng nhập';
}
?>
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="http://congnghehp.com/wp-content/uploads/2021/06/logo-HP-01.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #BCE6EE; box-shadow: 5px 5px 5px #ccc;">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <!-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> -->
        <li class="nav-item d-none d-sm-inline-block">
          <a href="home.php" class="nav-link" style="margin-left: 15px;"><i class="fa-sharp fa-solid fa-house"></i> Trang chủ</a>
          
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item" style="position: relative;top: -7px;">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <img src="./dist/assest/image/<?=$image;?>" style="width: 25px;border-radius: 50%;" alt="err">
            <?= $tenDN ?>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  