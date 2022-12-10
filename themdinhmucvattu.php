<?php
require_once 'config.php';
include "layout.php";

if (isset($_POST['add'])) {

    $sanpham = $_POST['sanpham'];
    $nguyenvatlieu = $_POST['nguyenvatlieu'];
    $soLuongNVL = $_POST['soLuongNVL'];
    $sql = "INSERT INTO `dinhmucnvl` (`maSanPham`,`maNguyenVatLieu`,`soLuongNVL`) VALUES ('$sanpham','$nguyenvatlieu','$soLuongNVL');";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "
        <script language='javascript'>
        alert('thêm thành công');
            window.open('dinhmucvattu.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('thêm không thành công');
            window.open('themdinhmucvattu.php','_self', 1);
        </script>
    ";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="modal-header" style="margin: 10px 80px;">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Thêm định mức vật tư</strong></h5>
    </div>
    <div class="modal-body">
        <form method="POST">
            <div class="form-row m-2">
            <div class="form-group col-md-12">
                    <label for="tenToSanXuat">sản phẩm</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="sanpham" aria-label="Default select example" >
                        <?php
                        require_once 'config.php';
                        $sqlSelectMaycsx = "SELECT * FROM `sanpham` WHERE 1;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['maSanPham']; ?>"><?php echo $r['maSanPham'];?> - <?=$r['tenSanPham']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            <div class="form-group col-md-12">
                    <label for="nguyenvatlieu">nguyên vật liệu</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="nguyenvatlieu" aria-label="Default select example" >
                        <?php
                        require_once 'config.php';
                        $sqlSelectMaycsx = "SELECT * FROM `nguyenvatlieu` WHERE 1;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['maNguyenVatLieu']; ?>"><?php echo $r['maNguyenVatLieu'];?> - <?=$r['tenNguyenVatLieu']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-12" style="margin: 10px 0px;">
                    <label for="ngayBatDau">số lượng nguyên vật liệu</label>
                    <input type="text" class="form-control" name="soLuongNVL" id="soLuongNVL" placeholder="" >
                </div>
                <div class="col">
                    <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="dinhmucvattu.php" style="text-decoration: none;color: #fff;">đóng</a></button>
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