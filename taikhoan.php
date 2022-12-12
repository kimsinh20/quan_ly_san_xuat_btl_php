<?php
include "layout.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6 class="m-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb text-decoration-none">
                                <li class="breadcrumb-item"><a href="kehoachsanxuat.php" class="text-success">quản lý tài khoản</a></li>
                            </ol>
                        </nav>
                    </h6>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">quản lý tài khoản</a></li>
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
            <div class="content-header">
                <button type="button" style="flex: 1;margin-left: 30px;" class="btn btn-success button-create" data-toggle="modal" data-target="#exampleModal"><a href="themtaikhoan.php" style="text-decoration: none;color: #fff;">thêm tài khoản</a></button>
                <form method="POST" style="float: right; display: flex;justify-content: space-around;margin-right: 30px;">
                    <input type="text" placeholder="tìm kiếm" class="timkiem" style="width: 400px;">
                    </a>
                </form>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Sắp xếp theo <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="sort-item">
                        <li><a role="button" id="menu-item1" data-value="sản phẩm">tên đăng nhập</a></li>
                        <!-- <li><a role="button" data-value="lenhsanxuat">lệnh sản xuất</a></li>
                    <li><a role="button" data-value="yeucausanxuat">yêu cầu sản xuất</a></li> -->
                    </ul>
                    <span class="label label-success label-medium" id="sort-item-value">tên đăng nhập</span>
                </div>
            </div>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">tên đăng nhập</th>
                        <th scope="col">họ và tên</th>
                        <th scope="col">ảnh</th>
                        <th scope="col">mật khẩu</th>
                        <th scope="col">email</th>
                        <th scope="col">số điện thoại</th>
                        <th scope="col">vai trò</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="danhsach">
                    <?php
                    require_once 'config.php';

                    /*------------Phan trang------------- */
                    // Nếu đã có sẵn số thứ tự của trang thì giữ nguyên (ở đây tôi dùng biến $page) 
                    // nếu chưa có, đặt mặc định là 1!
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    // Chọn số kết quả trả về trong mỗi trang mặc định là 10 
                    $max_results = 4;
                    $_SESSION['pageLive'] = $page;
                    // Tính số thứ tự giá trị trả về của đầu trang hiện tại 
                    $from = (($page * $max_results) - $max_results);

                    // Chạy 1 MySQL query để hiện thị kết quả trên trang hiện tại  

                    $sql = "SELECT * FROM taikhoan  order by tenDangNhap ASC LIMIT $from, $max_results";


                    //  $sql = "SELECT KEHOACHSANXUAT.maYeuCauSanXuat,maKeHoachSanXuat,`tenSanPham`,`soLuong`,`tenToSanXuat`,`ngayBatDau`,`ngayKetThuc` FROM KEHOACHSANXUAT INNER JOIN YEUCAUSANXUAT ON KEHOACHSANXUAT.maYeuCauSanXuat=YEUCAUSANXUAT.maYeuCauSanXuat INNER JOIN SANPHAM ON SANPHAM.maSanPham = YEUCAUSANXUAT.maSanPham";
                    $resultPhanTrang = mysqli_query($con, $sql);
                    $i = 1;
                    while ($r = mysqli_fetch_array($resultPhanTrang)) {
                    ?>
                        <tr>
                            <th scope="col"><?php echo $i++; ?></th>
                            <th scope="col"><?php echo $r['tenDangNhap']; ?></th>
                            <th scope="col"><?php echo $r['hoVaTen']; ?></th>
                            <th scope="col"><img src="./dist/assest/image/<?=$r['anh']?>" alt="err" width="60px" height="55px"></th>
                            <th scope="col">**********</th>
                            <th scope="col"><?php echo $r['email']; ?></th>
                            <th scope="col"><?php echo $r['soDienThoai']; ?></th>
                            <th scope="col"><?php echo $r['vaiTro']; ?></th>
                            <th scope="col">
                                <a style="margin-right: 15px;" href="./resetmatkhau.php?id=<?= $r['tenDangNhap'] ?>" class="btn btn btn-warning">reset</a>
                                <a style="margin-right: 15px;" href="./suataikhoan.php?id=<?= $r['tenDangNhap'] ?>" class="btn btn btn-danger">sửa</a>
                                <a href="./xoataikhoan.php?id=<?= $r['tenDangNhap'] ?>" class="btn btn-info">xóa</a>
                            </th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <footer class="footer" style="position: fixed;">
                <div class="phantrang" style="display: flex;justify-content: center;position: absolute;left: 500px">
                    <?php

                    // Tính tổng kết quả trong toàn DB:  
                    $total_results = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as Num FROM taikhoan where 1"))[0];

                    // Tính tổng số trang. Làm tròn lên sử dụng ceil()  
                    $total_pages = ceil($total_results / $max_results);


                    // Tạo liên kết đến trang trước trang đang xem 
                    if ($page > 1) {
                        $prev = ($page - 1);
                        echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=$prev\"><button class='trang btn btn-warning'><i class='fa fa-angle-double-left' aria-hidden='true'></i></button></a>&nbsp;";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if (($page) == $i) {
                            echo  "<button type='button' class='btn btn-primary' style='margin:0 5px;' disabled>$i&nbsp;</button>";
                        } else {
                            echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=$i\"><button class='so btn btn-warning'>$i</button></a>&nbsp;";
                        }
                    }

                    // Tạo liên kết đến trang tiếp theo  
                    if ($page < $total_pages) {
                        $next = ($page + 1);
                        echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=$next\"><button class='trang btn btn-warning'><i class='fa fa-angle-double-right' aria-hidden='true'></i></button></a>";
                    }
                    echo "</center>";
                    ?>
                </div>
            </footer>
        </div>
        <!-- /.content-wrapper -->
        <!-- Button trigger modal -->

</div>
</body>
<script type="text/javascript">
    // $('.timkiem').keyup(function() {
    //     var txt = $('.timkiem').val();
    //     $.post('searchkhsx.php', {
    //         data: txt
    //     }, function(data) {
    //         $('.danhsach').html(data);
    //     })
    // })

</script>

</html>
<!-- <?php
        // }
        ?> -->