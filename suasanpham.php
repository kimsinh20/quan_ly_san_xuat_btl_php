<?php
require_once 'config.php';
include "layout.php";

$idsp = $_GET['id'];
$sql_sp = "select * from sanpham where maSanPham = '$idsp'";
$result_sp = mysqli_fetch_array(mysqli_query($con, $sql_sp));
if (isset($_POST['add'])) {
    $tenSanPham = $_POST['tenSanPham'];
    $donViTinh = $_POST['donViTinh'];
    $chiPhiSx = $_POST['chiPhiSx'];
    $anh = !empty($_FILES['anhsp']['name']) ? $_FILES['anhsp']['name'] : $result_sp['anhMinhHoa'];
    $target_dir = './dist/assest/image/';
    $target_file = $target_dir . basename($anh);
    $filetype = $_FILES['hinhanh']['type'];
    if ($filetype == 'image/jpeg' or $filetype == 'image/png' or $filetype == 'image/gif') {
        move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file);
    }
    $sql = "UPDATE `sanpham` set `tenSanPham`='$tenSanPham',`anhMinhHoa`='$anh',`donViTinh`='$donViTinh',`chiPhiSx`='$chiPhiSx' where maSanPham = '$idsp';";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "
        <script language='javascript'>
        alert('cập nhật thành công');
            window.open('qlsanpham.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('cập nhật không thành công');
            window.open('qlsanpham.php','_self', 1);s
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
                <input type="text" value="<?= $result_sp['tenSanPham'] ?>" class="form-control" name="tenSanPham" id="tenSanPham" placeholder="" style="width: 500px;height: 40px;">
            </div>
            <div class="form-group col-md-12" style="margin: 10px 80px;">
                <label for="exampleInputEmail1" class="form-label">ảnh</label>
                <input type="file" class="form-control " name="anhsp" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 500px;height: 40px;">
            </div>
            <div class="form-group col-md-12" style="margin: 10px 80px;">
                <label for="ngayBatDau">đơn vị tính</label>
                <input type="text" class="form-control" value="<?= $result_sp['donViTinh'] ?>" name="donViTinh" id="donViTinh" placeholder="" style="width: 500px;height: 40px;">
            </div>
            <div class="form-group col-md-12" style="margin: 10px 80px;">
                <label for="ngayBatDau">chi phí sản xuất</label>
                <input type="text" class="form-control" value="<?= $result_sp['chiPhiSx'] ?>" name="chiPhiSx" id="chiPhiSx" placeholder="" style="width: 500px;height: 40px;">
            </div>

            <div class="col">
                <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="qlsanpham.php" style="text-decoration: none;color: #fff;">đóng</a></button>
                <input type="submit" class="btn btn-primary btn-lg" name="add" value="cập nhật" style="position: relative;right: -300px;">
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