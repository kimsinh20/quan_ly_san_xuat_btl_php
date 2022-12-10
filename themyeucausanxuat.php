<?php
require_once 'config.php';
include "layout.php";

if (isset($_POST['add'])) {
    $maYeuCauSanXuat = $_POST['maYeuCauSanXuat'];
    $sanpham = $_POST['sanpham'];
    $donGia = $_POST['donGia'];
    $soLuong = $_POST['soLuong'];
    $tinhTrang = $_POST['tinhTrang'];
    $ngayLap = date('Y-m-d');
    $ngayGiaoHang = date('Y-m-d', strtotime($_POST['ngayGiaoHang']));
    $sql = "insert into yeucausanxuat (`maYeuCauSanXuat`,`ngayGiaoHang`,`donGia`,`tinhTrang`,`ngayTao`) 
    values('$maYeuCauSanXuat','$ngayGiaoHang','$donGia','$tinhTrang','$ngayLap');";
    $sql2 = "insert into chitietyeucau (`maYeuCauSanXuat`,`maSanPham`,`soLuong`) values ('$maYeuCauSanXuat','$sanpham','$soLuong');";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
    if ($result && $result2) {
        echo "
        <script language='javascript'>
        alert('thêm thành công');
            window.open('yeucausanxuat.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('thêm không thành công');
            window.open('themyeucausanxuat.php','_self', 1);
        </script>
    ";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="modal-header" style="margin: 0px 80px;">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Thêm yêu cầu sản xuất</strong></h5>
    </div>
    <div class="modal-body">
        <form method="POST">
            <div class="form-row m-4">
                <div class="form-group col-md-12" style="margin: 10px 0px;">
                    <label for="maYeuCauSanXuat">mã yêu cầu sản xuất</label>
                    <input type="text" class="form-control" value="" name="maYeuCauSanXuat" id="maYeuCauSanXuat" placeholder="" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="tenToSanXuat">sản phẩm</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="sanpham" aria-label="Default select example" required>
                        <?php
                        require_once 'config.php';
                        $sqlSelectMaycsx = "SELECT * FROM `sanpham` WHERE 1;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['maSanPham']; ?>"><?php echo $r['maSanPham']; ?> - <?= $r['tenSanPham'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-12" style="margin: 10px 0px;">
                    <label for="soLuong">số lượng </label>
                    <input type="text" class="form-control" name="soLuong" id="soLuong" placeholder="" required>
                </div>
                <div class="form-group col-md-12" style="margin: 10px 0px;">
                    <label for="donGia">đơn giá </label>
                    <input type="text" class="form-control" name="donGia" id="donGia" placeholder="" required>
                </div>
                <div class="form-group " style="margin: 20px 0px;">
                    <label for="ngayGiaoHang">Ngày giao hàng</label>
                    <input type="date" class="form-control" name="ngayGiaoHang" id="ngayGiaoHang" placeholder="" style="width: 500px;" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="nguyenvatlieu">tình trạng</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="tinhTrang" aria-label="Default select example">
                        <option style="height: 40px;" value="chưa xử lý">chưa xử lý</option>
                        <option style="height: 40px;" value="đã xuất kho">đã xuất kho</option>
                        <option style="height: 40px;" value="thành phẩm">thành phẩm</option>
                    </select>
                </div>
                <div class="col">
                    <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="yeucausanxuat.php" style="text-decoration: none;color: #fff;">đóng</a></button>
                    <input type="submit" class="btn btn-primary btn-lg" name="add" value="thêm" style="position: relative;right: -300px;">
                </div>
            </div>
    </div>
    </form>
</div>
</div>
<!-- <script type="text/javascript">
    $('.timkiem').keyup(function() {
        var txt = $('.timkiem').val();
        $.post('ajax.php', {
            data: txt
        }, function(data) {
            $('.danhsach').html(data);
        })
    })
</script> -->