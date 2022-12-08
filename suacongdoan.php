<?php
require_once 'config.php';
include "layout.php";
$idEdit = $_GET['id'];
$sql_CD = "SELECT * FROM congdoan WHERE maCongDoan='$idEdit'";
$result = mysqli_fetch_assoc(mysqli_query($con, $sql_CD));

if (isset($_POST['edit'])) {
    $tenCongDoan = $_POST['tenCongDoan'];
    $sql = "UPDATE `congdoan` SET `tenCongDoan`='$tenCongDoan' WHERE maCongDoan='$idEdit';";
    $resultsql = mysqli_query($con, $sql);

    if ($resultsql) {
        echo "
        <script language='javascript'>
        alert('cập nhật thành công');
            window.open('congdoan.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('cập nhật không thành công');
        </script>
    ";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>sửa công đoạn</strong></h5>
    </div>
    <!-- <div class="danhsach"></div> -->
    <form method="POST">
        <div class="">
            <div class="form-group col-md-12">
                <label for="ngayBatDau">tên công đoạn</label>
                <input type="text" class="form-control" value="<?= $result['tenCongDoan'] ?>" name="tenCongDoan" id="tenCongDoan" placeholder="" style="width: 500px;height: 40px;">
            </div>
            <div class="col">
                <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="congdoan.php" style="text-decoration: none;color: #fff;">đóng</a></button>
                <input type="submit" class="btn btn-primary btn-lg" name="edit" value="cập nhật" style="position: relative;right: -300px;">
            </div>
        </div>
    </form>
</div>
</div>