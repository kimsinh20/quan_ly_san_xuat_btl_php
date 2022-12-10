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
                thông tin xuất kho nguyên vật liệu
            </h2>
        </div>
        <div class="row">
            <table class="table danhsach">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên nguyên vật liêu</th>
                        <!-- <th scope="col">danh mục</th> -->
                        <th scope="col">Số lượng</th>
                        <th scope="col">danh mục</th>
                        <th scope="col">đơn vị tính</th>
                    </tr>
                </thead>
                <form method="post" action="phieuxuat.php?maid=<?=$getIdYcsx?>">
                    <tbody class="">
                        <?php
                        $sqlSHOW = "select nguyenvatlieu.tenNguyenVatLieu,nguyenvatlieu.maNguyenVatLieu,nguyenvatlieu.donViTinh,danhmucnvl.tenDanhMuc,sum(dinhmucnvl.soLuongNVL) as 'soLuongNVL' from yeucausanxuat inner join chitietyeucau ON chitietyeucau.maYeuCauSanXuat = yeucausanxuat.maYeuCauSanXuat inner join sanpham on sanpham.maSanPham = chitietyeucau.maSanPham inner join dinhmucnvl on dinhmucnvl.maSanPham=sanpham.maSanPham inner join nguyenvatlieu on nguyenvatlieu.manguyenvatlieu=dinhmucnvl.manguyenvatlieu inner join danhmucnvl on danhmucnvl.madanhmuc=nguyenvatlieu.madanhmuc where yeucausanxuat.maYeuCauSanXuat='$getIdYcsx' GROUP by nguyenvatlieu.tenNguyenVatLieu,nguyenvatlieu.donViTinh,danhmucnvl.tenDanhMuc;";
                        $resultSQLLSX = mysqli_query($con, $sqlSHOW);
                        $i = 1;
                       foreach($resultSQLLSX as $r) {
                        ?>
                            <tr>
                                <th scope="col"><?php echo $i++; ?></th>
                                <th scope="col"><?php echo $r['tenNguyenVatLieu']; ?></th>
                                <!-- <th scope="col"><img src="<?= $r['anhMinhHoa'] ?>" alt="error" style="width: 50px;border-radius: 10px;"></th> -->
                                <th scope="col"><input type="text" value="<?php echo $r['soLuongNVL']; ?>" name="sl"></th>
                                <!-- <th scope="col"><?php echo $r['soLuongNVL']; ?></th> -->
                                <th scope="col"><?php echo $r['tenDanhMuc']; ?></th>
                                <th scope="col"><?php echo $r['donViTinh']; ?></th>
                            </tr>
                        <?php
                                $soLuong = $r['soLuongNVL'];
                                $nvl = $r['maNguyenVatLieu'];
                                $ngayLap = date('Y-m-d H:i:s');
                                $sqlchecksl="SELECT * FROM `khonvl` WHERE maNguyenVatLieu='$nvl';";
                                $checksl=mysqli_num_rows(mysqli_query($con,$sqlchecksl));
                                if($checksl<=0) {
                                    echo " <script language='javascript'>
                                    alert('trong kho không có nguyên vật liệu này vui lòng liên hệ chủ kho');
                                    window.open('khonguyenvatlieu.php','_self', 1);
                                      </script>
                                          ";  
                                }
                                $sqlqr = "INSERT INTO `phieuxuat` (`maYeuCauSanXuat`, `maKho`,`maNguyenVatLieu`, `soLuongXuat`, `ngayThucHien`) VALUES ('$getIdYcsx', '1','$nvl', '$soLuong', '$ngayLap');";
                                
                                $resultqr  = mysqli_query($con, $sqlqr) or die('xuất kho lỗi !!! '.mysqli_errno($con));
                                $check=0;
                            }
                        // }
                        ?>
                    </tbody>
                    <button style="width: 200px;margin-right: 20px;" type="submit" name="xuat" class="btn btn-warning mb-3 ">xuất kho</button>
                    <!-- <button style="width: 200px;margin-right: 20px;" type="submit" name="xuat" class="btn btn-warning mb-3 "><a href="phieu.php?maid=<?=$getIdYcsx?>">xuất kho</a> </button> -->
                    <a style="width: 200px;" class="btn btn-warning mb-3 " href="khonguyenvatlieu.php">quay lại</a> 
                    <!-- <button style="width: 300px;" type="submit" name="xuat" class="btn btn-warning mb-3 "><a href="phieu.php?maid=<?=$getIdYcsx?>">xuất kho</a> </button> -->
                </form>
            </table>
        </div>
    </div>
</div>