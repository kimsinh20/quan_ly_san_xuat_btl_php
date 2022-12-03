<?php
include "layout.php";

?>
<style>
    .format {
        background-color: #EC5B5B;
    }
</style>
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
                                <li class="breadcrumb-item"><a href="yeucausanxuat.php" class="text-success">yêu cầu sản xuất</a></li>
                                <li class="breadcrumb-item"><a href="lenhsanxuat.php" class="text-success">lệnh sản xuất</a></li>
                            </ol>
                        </nav>

                    </h6>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="content-header">
                <button type="button" style="flex: 1;margin-left: 30px;" class="btn btn-success button-create" data-toggle="modal" data-target="#exampleModal"><a href="themlenhsanxuat.php" style="text-decoration: none;color: #fff;">thêm lệnh sản xuất</a></button>
                <form method="POST" style="float: right; display: flex;justify-content: space-around;margin-right: 30px;">
                    <input type="text" placeholder="tìm kiếm" class="timkiem" style="width: 400px;">
                    </a>
                </form>
            </div>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã LSX</th>
                        <!-- <th scope="col">tên LSX</th> -->
                        <th scope="col">Mã YCSX</th>
                        <th scope="col">Tên SP</th>
                        <!-- <th scope="col">Số lượng yêu cầu</th> -->
                        <th scope="col">Số lượng sx</th>
                        <th scope="col">tổ sx</th>
                        <th scope="col">công đoạn</th>
                        <th scope="col">Ngày hoàn thành</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="danhsachlsx">
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
                    $_SESSION['trangHienTai'] = $page;
                    // Chọn số kết quả trả về trong mỗi trang mặc định là 10 
                    $max_results = 4;

                    // Tính số thứ tự giá trị trả về của đầu trang hiện tại 
                    $from = (($page * $max_results) - $max_results);

                    // Chạy 1 MySQL query để hiện thị kết quả trên trang hiện tại  

                    // $sql = "SELECT * FROM LENHSANXUAT INNER JOIN YEUCAUSANXUAT ON LENHSANXUAT.maYeuCauSanXuat=YEUCAUSANXUAT.maYeuCauSanXuat INNER JOIN SANPHAM ON SANPHAM.maSanPham = YEUCAUSANXUAT.maSanPham INNER JOIN CONGDOAN ON CONGDOAN.maCongDoan = LENhSANXUAT.maCongDoan;";
                    $sql = "SELECT * FROM LENHSANXUAT INNER JOIN YEUCAUSANXUAT ON LENHSANXUAT.maYeuCauSanXuat=YEUCAUSANXUAT.maYeuCauSanXuat INNER JOIN SANPHAM ON SANPHAM.maSanPham = YEUCAUSANXUAT.maSanPham INNER JOIN CONGDOAN ON CONGDOAN.maCongDoan = LENhSANXUAT.maCongDoan order by ngayHoanThanh ASC LIMIT $from, $max_results";


                    //  $sql = "SELECT * FROM KEHOACHSANXUAT INNER JOIN YEUCAUSANXUAT ON KEHOACHSANXUAT.maYeuCauSanXuat=YEUCAUSANXUAT.maYeuCauSanXuat INNER JOIN SANPHAM ON SANPHAM.maSanPham = YEUCAUSANXUAT.maSanPham";
                    $resultPhanTrang = mysqli_query($con, $sql);
                    $i = 1;
                    foreach($resultPhanTrang as $r) {
                        $sp = $r['maSanPham'];
                        $sqlSoLuong = "SELECT sum(soLuongSP) from khothanhpham where maSanPham='$sp'; ";
                        $soLuong = mysqli_fetch_array(mysqli_query($con, $sqlSoLuong))[0];
                        $sl = 0;
                        if ($r['soLuong'] > $soLuong) {
                            $sl = $r['soLuong'] - $soLuong;
                        }
                        $_SESSION['soluong'] = $sl;
                        $maLsx = $r['maLenhSanXuat'];
                        $sqlcheckngay = "select lenhsanxuat.ngayHoanThanh - CURDATE() as 'songay' from lenhsanxuat where maLenhSanXuat='$maLsx'; ";
                        $resultcheckngay = mysqli_fetch_array(mysqli_query($con, $sqlcheckngay))['songay'];
                        if ($sqlcheckngay < 0) {
                            echo "
                         <script language='javascript'>
                                $('.data').addClass('format');
                                // console.log('ko dc')
                               
                        </script>
                            ";
                        }
                    ?>
                        <tr class="data" id="">
                            <th scope="col"><?php echo $i++; ?></th>
                            <th scope="col"><?php echo $r['maLenhSanXuat']; ?></th>
                            <!-- <th scope="col"><?php echo $r['tenLenhSanXuat']; ?></th> -->
                            <th scope="col"><?php echo $r['maYeuCauSanXuat']; ?></th>
                            <th scope="col"><?php echo $r['tenSanPham']; ?></th>
                            <th scope="col"><?php echo $r['soLuongSX']; ?></th>
                            <!-- <th scope="col"><?php echo $sl; ?></th> -->
                            <th scope="col"><?php echo $r['tenToSanXuat']; ?></th>
                            <th scope="col"><?php echo $r['tenCongDoan']; ?></th>
                            <th scope="col"><?php echo $r['ngayHoanThanh']; ?></th>
                            <th scope="col">
                                <a style="margin-right: 15px;" href="./xemlenhsanxuat.php?id=<?= $r['maLenhSanXuat'] ?>" class="btn btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a style="margin-right: 15px;" href="./sualenhsanxuat.php?id=<?= $r['maLenhSanXuat'] ?>" class="btn btn btn-danger">sửa</a>
                                <a href="./xoalenhsanxuat.php?id=<?= $r['maLenhSanXuat'] ?>&masp=<?= $r['maSanPham'] ?>" class="btn btn-info">xóa</a>
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
                    $total_results = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as Num FROM LENHsanxuat where 1"))[0];

                    // Tính tổng số trang. Làm tròn lên sử dụng ceil()  
                    $total_pages = ceil($total_results / $max_results);


                    $_SESSION['page'] = $page;

                    // Tạo liên kết đến trang trước trang đang xem 
                    if ($page > 1) {
                        $prev = ($page - 1);
                        echo "<a   href=\"" . $_SERVER['PHP_SELF'] . "?page=$prev\"><button class='trang btn btn-warning'><i class='fa fa-angle-double-left' aria-hidden='true'></i></button></a>&nbsp;";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if (($page) == $i) {
                            echo  "<button type='button' class='btn btn-primary' style='margin:0 5px;' disabled>$i&nbsp;</button>";
                        } else {
                            echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=$i\"><button class='so btn btn-warning' '>$i</button></a>&nbsp;";
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
            <br>
            <br>
            <br>
            <!-- <section>
                <h3>thực tế sản xuất</h3>
            </section> -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Button trigger modal -->

</div>
</body>
<script type="text/javascript">
    $('.timkiem').keyup(function() {
        var txt = $('.timkiem').val();
        $.post('searchlsx.php', {
            key: txt
        }, function(key) {
            $('.danhsachlsx').html(key);
        })
    })
    // $('#data').addClass('format');
</script>

</html>