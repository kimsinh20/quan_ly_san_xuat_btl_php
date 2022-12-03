<?php
include_once "layout.php";
?>
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