<style>
  /* .nav-item {
    display: flex;
    justify-content: center;
  } */
 
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#333;width: 258px;">
  <!-- Brand Logo -->
  <a href="home.php" class="brand-link text-center m-1" style="text-align: center;display: flex;flex-direction: column; justify-content: center;">
    <img src="http://congnghehp.com/wp-content/uploads/2021/06/logo-HP-01.png" class="brand-image  elevation-3" style="background-color: #666;">
    <span class="t brand-text font-weight-light text-center fs-5" style="margin-top: 20px;">QUẢN LÝ SẢN XUẤT</span>
  </a>
  <div>
    <!-- Sidebar Menu -->
    <nav class="mt-2" style="margin-left: 10px;">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="home.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="qlsanpham.php" class="nav-link">
            <i class="fa-solid fa-shop"></i>
            <p>
              Sản phẩm
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="lenhsanxuat.php" class="nav-link">
            <i class="fa-solid fa-gears"></i>
            <p>
              Lệnh sản xuất
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lenhsanxuat.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lệnh sản xuất</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="thuctesanxuat.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thực tế sản xuất</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="yeucausx.php" class="nav-link">
            <i class="fa-solid fa-code-pull-request"></i>
            <p>
              Yêu cầu sản xuất
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="yeucausanxuat.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Yêu cầu sản xuất</p>
              </a>
            <li class="nav-item">
              <a href="lenhsanxuat.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lệnh sản xuất</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kehoachsanxuat.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kế hoạch sản xuất</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="dinhmucvattu.php" class="nav-link">
            <i class="fa-solid fa-parachute-box"></i>
            <p>
              Vật tư
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="quanlynguyenvatlieu.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nguyên vật liệu</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="qlthietbi.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thiết bị</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="dinhmucvattu.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Định mức vật tư</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="congdoan.php" class="nav-link">
            <i class="fa-solid fa-shop"></i>
            <p>
              công đoạn
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="khanangsanxuat.php" class="nav-link">
            <i class="fa-solid fa-shop"></i>
            <p>
              khả năng sản xuất
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-container-storage"></i>
            <p>
              Kho
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="khonguyenvatlieu.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kho nguyên vật liệu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="khothanhpham.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kho thành phẩm</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-container-storage"></i>
            <p>
              thống kê
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="thongkechiphi.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>thống kê doanh thu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="thongketiendo.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>thống kê tiến độ sản xuất</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<aside class="control-sidebar control-sidebar-dark" style="margin-top: 5px;">
  <!-- Control sidebar content goes here -->
  <button class="btn btn-danger w-100 m-1"><a href="updateTaiKhoan.php">cập nhật thông tin tài khoản</a></button>
  <!-- <button class="btn btn-danger w-100 m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><a href="quenmatkhau.php">đổi mật khẩu</a></button> -->
  <button class="btn btn-danger w-100 m-1"><a href="logout.php">đăng xuất</a></button>
  
</aside>
