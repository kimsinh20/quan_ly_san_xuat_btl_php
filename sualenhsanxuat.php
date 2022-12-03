<?php 
require_once 'config.php';
include "layout.php";
$idEdit=$_GET['id'];
$sqlLSX="SELECT * FROM LENHSANXUAT WHERE maLenhSanXuat='$idEdit';";
$resultSQLLSX= mysqli_fetch_assoc(mysqli_query($con,$sqlLSX));


if (isset($_POST['update'])) {
    $maLenhSanXuat = $_POST['maLenhSanXuat'];
    $tenLenhSanXuat = $_POST['tenLenhSanXuat'];
    $maYeuCauSanXuat=$_POST['maYeuCauSanXuat'];
    $tenToSanXuat = $_POST['tenToSanXuat'];
    $congDoan=$_POST['congDoan'];
    $nguoiLap=$_SESSION['tenDangNhap'];
    $ngayLap=date('Y-m-d');
    $ngayHoanThanh = date('Y-m-d', strtotime($_POST['ngayHoanThanh']));

    $sql = "UPDATE `Lenhsanxuat` SET `maLenhSanXuat`='$maLenhSanXuat',`tenLenhSanXuat`='$tenLenhSanXuat',`maYeuCauSanXuat`='$maYeuCauSanXuat', `tenToSanXuat`='$tenToSanXuat',`maCongDoan`='$congDoan',`ngayHoanTHanh`='$ngayHoanThanh',`nguoiLap`='$nguoiLap',`ngayLap`='$ngayLap' where maLenhSanXuat='$maLenhSanXuat';";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "
        <script language='javascript'>
        alert('cập nhật thành công');
            window.open('lenhsanxuat.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('cập nhật không thành công');
             window.open('lenhsanxuat.php','_self', 1);
        </script>
    ";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="modal-header ">
        <h5 class="modal-title d-flex" id="exampleModalLabel"><strong style="justify-content: center;">sửa lệnh sản xuất</strong></h5>
    </div>
    <div class="modal-body">
        <form method="POST" id="basic-form">
            <div class="form-row m-2">
                <div class="form-group " style="margin: 10px 80px;">
                    <label for="maLenhSanXuat">Mã lệnh sản xuất</label>
                    <br>
                    <input type="text" value="<?= $resultSQLLSX['maLenhSanXuat'] ?>" minlength="1" name="maLenhSanXuat" placeholder="nhập mã lệnh sản xuất" style="width: 400px;height: 40px;" disabled>
                </div>
                <div class="form-group " style="margin: 10px 80px;">
                    <label for="tenLenhSanXuat">tên lệnh sản xuất</label>
                    <br>
                    <input type="text" value="<?=$resultSQLLSX['tenLenhSanXuat']?>" minlength="1" name="tenLenhSanXuat" placeholder="nhập tên lệnh sản xuất" style="width: 400px;height: 40px;" required>
                </div>
                <div class="form-group " style="margin: 10px 80px;">
                    <label for="maYeuCauSanXuat">Mã yêu cầu sản xuất</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="maYeuCauSanXuat" aria-label="Default select example" style="width: 400px;height: 40px;">
                        <!-- <option selected><?= $result['maYeuCauSanXuat'] ?></option> -->
                        <?php
                        require_once 'config.php';
                        $sqlSelectMaycsx = "SELECT `maYeuCauSanXuat` FROM `yeucausanxuat` WHERE 1;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['maYeuCauSanXuat']; ?>"><?php echo $r['maYeuCauSanXuat']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group " style="margin: 10px 80px;" >
                    <label for="tenToSanXuat">tổ sản xuất</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="tenToSanXuat" aria-label="Default select example" style="width: 400px;height: 40px;">
                        <!-- <option selected><?= $result['tenToSanXuat'] ?></option> -->
                        <?php
                        require_once 'config.php';
                        $sqlSelectMaycsx = "SELECT `tenToSanXuat` FROM `KHANANGSANXUAT` WHERE 1;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['tenToSanXuat']; ?>"><?php echo $r['tenToSanXuat']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group " style="margin: 10px 80px;">
                    <label for="maCongDoan">công đoạn</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="congDoan" aria-label="Default select example" style="width: 400px;height: 40px;">
                        <!-- <option selected><?= $result['maCongDoan'] ?></option> -->
                        <?php
                        require_once 'config.php';
                        $sqlSelectCongDoan = "SELECT * FROM `CONGDOAN` WHERE 1;";
                        $resultCongDoan = mysqli_query($con, $sqlSelectCongDoan);
                        while ($r = mysqli_fetch_array($resultCongDoan)) {
                        ?>
                            <option style="height: 40px;" value="<?= $r['maCongDoan'] ?>"><?= $r['tenCongDoan'];  ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- <div class="danhsach"></div> -->
                <div class="form-group " style="margin: 10px 80px;">
                    <label for="ngayHoanThanh">Ngày hoàn thành</label>
                    <input type="date" class="form-control" name="ngayHoanThanh" id="ngayHoanThanh" placeholder="" style="width: 400px;height: 40px;" required>
                </div>
                <div class="row" style="text-align: center;margin-top: 30px;margin-left: 170px;">
                    <button type="button" style="width:80px ;position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="lenhsanxuat.php" style="text-decoration: none;color: #fff;">đóng</a></button>
                    <input type="submit" class="btn btn-primary btn-lg" name="update" value="cập nhật" style="position: relative;right: -300px;width: 100px;" onclick="myFunction()">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#basic-form").validate();
    });
</script>