<?php
include "config.php";
include "layout.php";
// $maYeuCauSanXuat = $_POST['maYeuCauSanXuat'];
$getIdYcsx = $_GET['data'];

// select * from sanpham inner join yeucausanxuat on sanpham.maSanPham=yeucausanxuat.masanpham inner join dinhmucnvl on dinhmucnvl.maSanPham=sanpham.maSanPham;

?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <!-- <h2 class="text-center">phiếu xuất kho</h2> -->
    <div class="container">
        <div class="row">
            <h2>
                thông tin nhập kho nguyên vật liệu
            </h2>
        </div>
        <div class="row">
            <table class="table danhsach">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên thành phẩm</th>
                        <th scope="col">ảnh</th>
                        <th scope="col">Số lượng</th>
                        <!-- <th scope="col">đơn vị tính</th> -->
                    </tr>
                </thead>
                <form method="post" action="phieunhap.php?maid=<?=$getIdYcsx?>">
                    <tbody class="">
                        <?php
                        $sqlSHOW = "select * from yeucausanxuat INNER JOIN chitietyeucau ON chitietyeucau.maYeuCauSanXuat = YEUCAUSANXUAT.maYeuCauSanXuat inner join sanpham on sanpham.maSanPham = chitietyeucau.maSanPham where chitietyeucau.mayeucausanxuat = '$getIdYcsx' ;";
                        $resultSQLLSX = mysqli_query($con, $sqlSHOW);
                        $i = 1;
                        $arr=[];
                       foreach($resultSQLLSX as $r) { 
                        ?>
                            <tr>
                                <th scope="col"><?php echo $i++; ?></th>
                                <th scope="col"><?php echo $r['tenSanPham']; ?></th>
                                <th scope="col"><img src="<?= $r['anhMinhHoa'] ?>" alt="error" style="width: 50px;border-radius: 10px;"></th>
                                <th scope="col"><input type="text" value="<?php echo $r['soLuong']; ?>" name="sl"></th>
                                <!-- <th scope="col"><?php echo $r['soLuongNVL']; ?></th> -->
                                <!-- <th scope="col"><?php echo $r['donViTinh']; ?></th> -->
                                
                            </tr>
                        <?php
                                $soLuong = $r['soLuong'];
                                $tp = $r['maSanPham'];
                                $ngayLap = date('Y-m-d H:i:s');
                                $sqlqr = "INSERT INTO `phieunhap` (`maYeuCauSanXuat`,`maSanPham`, `soLuongNhap`, `ngayThucHien`) VALUES ('$getIdYcsx','$tp', '$soLuong', '$ngayLap');";   
                                $resultqr  = mysqli_query($con, $sqlqr) or die('nhập kho lỗi !!! '.mysqli_errno($con));
                            }
                        // }
                        ?>
                    </tbody>
                    <button style="width: 200px;margin-right: 20px;" type="submit" name="xuat" class="btn btn-warning mb-3 ">nhập kho</button>
                    <!-- <button style="width: 200px;margin-right: 20px;" type="submit" name="xuat" class="btn btn-warning mb-3 "><a href="phieu.php?maid=<?=$getIdYcsx?>">xuất kho</a> </button> -->
                    <a style="width: 200px;" class="btn btn-warning mb-3 " href="khonguyenvatlieu.php">quay lại</a> 
                    <!-- <button style="width: 300px;" type="submit" name="xuat" class="btn btn-warning mb-3 "><a href="phieu.php?maid=<?=$getIdYcsx?>">xuất kho</a> </button> -->
                </form>
            </table>
        </div>
    </div>
</div>