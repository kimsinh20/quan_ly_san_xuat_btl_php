<?php include "layout.php"?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">yêu cầu sản xuất</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">yêu cầu sản xuất</a></li>
            <!-- <li class="breadcrumb-item active">Home</li> -->
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <button class="m-3 ">thêm lệnh sản xuất</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">stt</th>
            <th scope="col">Mã yêu cầu sản xuất</th>
            <th scope="col">tên sản phẩm</th>
            <th scope="col">số lượng</th>
            <th scope="col">ngày hoàn thành</th>
            <th scope="col">đơn giá</th>
            <th scope="col">định mức vật tư</th>
            <th scope="col">tạo lệnh sản xuất</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>YC0023</td>
            <td>áo sơ mi</td>
            <td>230</td>
            <td>03/02/2022</td>
            <td>500000</td>
            <td style="cursor: pointer;"><i class="fa-solid fa-plus"></i></td>
            <td style="cursor: pointer;"><i class="fa-solid fa-plus"></i></td>
            <td><button class="btn btn-dark">sửa</button></td>
            <td><button class="btn btn-danger">xóa</button></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>YC0023</td>
            <td>áo sơ mi</td>
            <td>230</td>
            <td>03/02/2022</td>
            <td>500000</td>
            <td style="cursor: pointer;"><i class="fa-solid fa-plus"></i></td>
            <td style="cursor: pointer;"><i class="fa-solid fa-plus"></i></td>
            <td><button class="btn btn-dark">sửa</button></td>
            <td><button class="btn btn-danger">xóa</button></td>
          </tr>
          

        </tbody>
      </table>
    </div>
    <!-- /.content-wrapper -->
    <footer class="footer">

    </footer>
</div>
</body>

</html>