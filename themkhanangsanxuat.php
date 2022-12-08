<?php
require_once 'config.php';
include "layout.php";

if (isset($_POST['add'])) {


    $tenToSanXuat = $_POST['tenToSanXuat'];
    $soLuongNhanVien = $_POST['soLuongNhanVien'];
    $congSuatNgay= $_POST['congSuatNgay'];
    $luong = $_POST['luong'];
    $sql = "INSERT INTO `khanangsanxuat` (`tenToSanXuat`,`soLuongNhanVien`,`congSuatNgay`,`luong`) VALUES ('$tenToSanXuat','$soLuongNhanVien','$congSuatNgay','$luong');";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "
        <script language='javascript'>
        alert('thêm thành công');
            window.open('khanangsanxuat.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('thêm không thành công');
            window.open('themkhanangsanxuat.php','_self', 1);
        </script>
    ";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="modal-header" style="margin: 10px 80px;">
        <h5 class="modal-title" id="exampleModalLabel"><strong >Thêm khả năng sản xuất</strong></h5>
    </div>
    <div class="modal-body">
        <form method="POST">
            <div class="form-row m-2">
                
                </div>
                <!-- <div class="danhsach"></div> -->
                <div class="form-group col-md-12" style="margin: 10px 80px;">
                    <label for="ngayBatDau">tên tổ sản xuất</label>
                    <br>
                    <input type="text" class="form-control" name="tenToSanXuat" value="tổ " id="tenToSanXuat" placeholder="" style="width: 500px;height: 40px;">
                </div>
                <div class="form-group col-md-12" style="margin: 10px 80px;">
                    <label for="ngayBatDau">số lượng nhân viên</label>
                    <br>
                    <input type="text" class="form-control" name="soLuongNhanVien" id="soLuongNhanVien" placeholder="" style="width: 500px;height: 40px;">
                </div>
                <div class="form-group col-md-12" style="margin: 10px 80px;">
                    <label for="ngayBatDau">công suất sản phẩm / ngày</label>
                    <br>
                    <input type="text" class="form-control" name="congSuatNgay" id="congSuatNgay" placeholder="" style="width: 500px;height: 40px;">
                </div>
                <div class="form-group col-md-12" style="margin: 10px 80px;">
                    <label for="ngayBatDau">luong</label>
                    <br>
                    <input type="text" class="form-control" name="luong" id="luong" placeholder="" style="width: 500px;height: 40px;">
                </div>
                <div class="col">
                    <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="khanangsanxuat.php" style="text-decoration: none;color: #fff;" >đóng</a></button>
                    <input type="submit" class="btn btn-primary btn-lg" name="add" value="thêm" style="position: relative;right: -300px;">
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