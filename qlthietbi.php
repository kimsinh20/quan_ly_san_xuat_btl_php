<?php include "layout.php"?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Device</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <!-- <li class="breadcrumb-item active">Home</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="page-header">
            <h1>Quản lí Thiết Bị</h1>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <input type="text" class="form-control" placeholder="Tìm tên sản phẩm..." id="search-name" />
            </div>
            <div class="col-lg-3">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Sắp xếp theo <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="sort-item">
                        <li><a role="button" data-value="name-asc">Tên A - Z</a></li>
                        <li><a role="button" data-value="name-desc">Tên Z - A</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a role="button" data-value="cate-asc">Chuyên mục A - Z</a></li>
                        <li><a role="button" data-value="cate-desc">Chuyên mục Z - A</a></li>
                    </ul>
                    <span class="label label-success label-medium" id="sort-item-value">Tên A - Z</span>
                </div>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-info btn-block marginB10" id="toggle-form-button">Thêm thiết bị</button>
            </div>
        </div>
        <!-- <div class="row marginB10">
            <div class="col-lg-offset-6 col-lg-6">
                <form class="form-inline" id="toggle-form-content">
                    <div class="form-group name">
                        <input type="text" class="form-control" placeholder="Tên bài viết" id="ipn-add-item" />
                    </div>
                    <div class="form-group category">
                        <select class="form-control" id="select-add-item">
                            <option value="0">Kinh doanh</option>
                            <option value="1">Công nghệ</option>
<option value="2">Thể thao</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default" id="btn-add-cancel">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btn-add-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div> -->
        <div class="panel panel-success">
            <div class="panel-heading" style="color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    padding: 10px 20px;
    border-radius: 5px;
">Danh sách thiết bị</div>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th style="width: 10%" class="text-center">Mã thiết bị</th>
                        <th>Tên thiết bị</th>
                        <th style="width: 15%">Đơn vị tính</th>
                        <th style="width: 15%"></th>
                    </tr>
                </thead>
                <tbody id="data-body">
                    <tr>
                        <td class="index text-center">1</td>
                        <td class="name">Áo đồng phục</td>
                        <td class="category">
                            <span class="label label-info">Quà tặng</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default btn-sm btn-edit">Sửa</button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="index text-center">2</td>
                        <td class="name">Cốc mèo</td>
                        <td class="category">
                            <span class="label label-success">Qùa tặng</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default btn-sm btn-edit">Sửa</button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="index text-center">3</td>
                        <td class="name">Ấm chén sứ xương</td>
                        <td class="category">
                            <span class="label label-default">Quàn tặng</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default btn-sm btn-edit">Sửa</button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="index text-center">4</td>
                        <td class="name"></td>
                        <td class="category">
                            <span class="label label-success">Kinh doanh</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default btn-sm btn-edit">Sửa</button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="index text-center">5</td>
                        <td class="name">VFF giải ngân 15 tỷ đồng, tiền thưởng tới tay U23 VN trước Tết</td>
                        <td class="category">
                            <span class="label label-info">Thể thao</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default btn-sm btn-edit">Sửa</button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="index text-center">6</td>
                        <td class="name">F1 muốn tổ chức giải đua xe tại Việt Nam vào năm 2020</td>
                        <td class="category">
                            <span class="label label-default">Công nghệ</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default btn-sm btn-edit">Sửa</button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="index text-center">7</td>
                        <td>
                            <input type="text" class="form-control" value="F1 muốn tổ chức giải đua xe tại Việt Nam vào năm 2020" placeholder="Nhập tên bài viết">
                        </td>
                        <td class="text-center">
                            <select class="form-control">
                                <option value="0">Kinh doanh</option>
                                <option value="1" selected>Công nghệ</option>
                                <option value="2">Thể thao</option>
                            </select>
                        </td>

                        <td>
                            <button type="button" class="btn btn-default btn-sm btn-edit-cancel">Cancel</button>
                            <button type="button" class="btn btn-success btn-sm btn-edit-update">Save</button>
                        </td>
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