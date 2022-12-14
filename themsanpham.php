<?php
require_once 'config.php';
include "layout.php";

if (isset($_POST['add'])) {


    $tenSanPham = $_POST['tenSanPham'];
    $donViTinh = $_POST['donViTinh'];
    $chiPhiSx = $_POST['chiPhiSx'];
    $anh = isset($_FILES['anhsp']['name']) ? $_FILES['anhsp']['name'] : "";
    $target_dir = './dist/assest/image/';
    $target_file = $target_dir . basename($anh);
    if ($filetype == 'image/jpeg' or $filetype == 'image/png' or $filetype == 'image/gif') {
    move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file);
    }
    $sql = "INSERT INTO `sanpham` (`tenSanPham`,`anhMinhHoa`,`donViTinh`,`trangThai`,`chiPhiSx`) VALUES ('$tenSanPham','$anh','$donViTinh','chưa xử lý','$chiPhiSx');";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "
        <script language='javascript'>
        alert('thêm thành công');
            window.open('qlsanpham.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('thêm không thành công');
            window.open('themsanpham.php','_self', 1);s
        </script>
    ";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="modal-header" style="margin: 10px 80px;">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Thêm sản phẩm</strong></h5>
    </div>
    <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row m-2">

            </div>
            <!-- <div class="danhsach"></div> -->
            <div class="form-group col-md-12" style="margin: 10px 80px;">
                <label for="ngayBatDau">tên sản phẩm</label>
                <input type="text" class="form-control" name="tenSanPham" id="tenSanPham" placeholder="" style="width: 500px;height: 40px;">
            </div>
            <div class="form-group col-md-12" style="margin: 10px 80px;">
                <label for="exampleInputEmail1" class="form-label">ảnh</label>
                <input type="file" class="form-control " name="anhsp" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 500px;height: 40px;">
            </div>
            <div class="form-group col-md-12" style="margin: 10px 80px;">
                <label for="ngayBatDau">đơn vị tính</label>
                <input type="text" class="form-control" name="donViTinh" id="donViTinh" placeholder="" style="width: 500px;height: 40px;">
            </div>
            <div class="form-group col-md-12" style="margin: 10px 80px;">
                <label for="ngayBatDau">chi phí sản xuất</label>
                <input type="text" class="form-control" name="chiPhiSx" id="chiPhiSx" placeholder="" style="width: 500px;height: 40px;">
            </div>

            <div class="col">
                <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="qlsanpham.php" style="text-decoration: none;color: #fff;">đóng</a></button>
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