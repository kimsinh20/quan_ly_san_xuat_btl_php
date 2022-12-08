<?php
require_once 'config.php';
include "layout.php";

if (isset($_POST['add'])) {


    $tenNguyenVatLieu = $_POST['tenNguyenVatLieu'];
    $donViTinh = $_POST['donViTinh'];
    $danhmucnvl = $_POST['maDanhMuc'];
    $sql = "INSERT INTO `nguyenvatlieu` (`tenNguyenVatLieu`,`donViTinh`,`maDanhMuc`) VALUES ('$tenNguyenVatLieu','$donViTinh','$danhmucnvl');";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "
        <script language='javascript'>
        alert('thêm thành công');
            window.open('quanlynguyenvatlieu.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('thêm không thành công');
            window.open('themnguyenvatlieu.php','_self', 1);s
        </script>
    ";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="modal-header" style="margin: 10px 80px;">
        <h5 class="modal-title" id="exampleModalLabel"><strong >Thêm nguyên vật liêu</strong></h5>
    </div>
    <div class="modal-body">
        <form method="POST">
            <div class="form-row m-2">
                
                </div>
                <!-- <div class="danhsach"></div> -->
                <div class="form-group col-md-12" style="margin: 10px 80px;">
                    <label for="ngayBatDau">tên nguyên vật liêu</label>
                    <input type="text" class="form-control" name="tenNguyenVatLieu" id="tenNguyenVatLieu" placeholder="" style="width: 500px;height: 40px;">
                </div>
                <div class="form-group col-md-12" style="margin: 10px 80px;">
                    <label for="ngayBatDau">đơn vị tính</label>
                    <input type="text" class="form-control" name="donViTinh" id="donViTinh" placeholder="" style="width: 500px;height: 40px;">
                </div>
                <div class="form-group col-md-12" style="margin: 10px 80px;">
                    <label for="ngayBatDau">tên danh mục</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="maDanhMuc" aria-label="Default select example" style="width: 400px;height: 40px;">
                        <?php
                        require_once 'config.php';
                        $sqlSelectMaycsx = "SELECT maDanhMuc,tenDanhMuc FROM `danhmucnvl` WHERE 1 group by maDanhMuc,tenDanhMuc;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['maDanhMuc']; ?>"><?php echo $r['tenDanhMuc']; ?></option>
                        <?php
                        }
                        ?>SELECT tenDanhMuc,tenDanhMuc FROM `danhmucnvl` WHERE 1 group by tenDanhMuc,tenDanhMuc;
                    </select>
                </div>
                <div class="col">
                    <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="congdoan.php" style="text-decoration: none;color: #fff;" >đóng</a></button>
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