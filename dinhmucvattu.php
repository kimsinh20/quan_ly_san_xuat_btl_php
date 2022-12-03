<?php include "layout.php"?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);margin-left: 20px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">định mức vật tư</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">định mức vật tư</a></li>
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
      <button class="m-3 ">thêm định mức</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">stt</th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">tên nguyên vật liệu</th>
            <th scope="col">số lượng nguyên vật liệu</th>
            <th scope="col">đơn vị tính</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>SX001</td>
            <td>áo sơ mi</td>
            <td>vải</td>
            <td>120</td>
            <td>
            <select name="donvitinh" id="donvitinh">
                <option value="hoanthien">met</option>
                <option value="may">cái</option>
                
              </select>
            </td> 
            <td><button class="btn btn-dark">sửa</button></td>
            <td><button class="btn btn-danger">xóa</button></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>SX001</td>
            <td>áo sơ mi</td>
            <td>chỉ</td>
            <td>20</td>
            <td>
            <select name="donvitinh" id="donvitinh">
              <option value="may">cuộn</option>
                <option value="hoanthien">met</option>
                <option value="may">cái</option>
              </select>
            </td> 
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
