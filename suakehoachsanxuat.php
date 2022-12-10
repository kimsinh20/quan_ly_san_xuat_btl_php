<?php
require_once 'config.php';
include "layout.php";
$idEdit=$_GET['id'];
$sqlKHSX="SELECT * FROM KEHOACHSANXUAT WHERE maKeHoachSanXuat='$idEdit'";
$result= mysqli_fetch_assoc(mysqli_query($con,$sqlKHSX));

if (isset($_POST['edit'])) {
    $maYeuCauSanXuat = $_POST['maYeuCauSanXuat'];
    $tenToSanXuat = $_POST['tenToSanXuat'];
    $ngayBatDau = date('Y-m-d', strtotime($_POST['ngayBatDau']));
    //soluongsx ,ngya giao hang
    $sqlSoLuong = "select soLuong,`ngayGiaoHang` from YEUCAUSANXUAT where maYeuCauSanXuat = '$maYeuCauSanXuat' ";
    $soLuong = mysqli_fetch_array(mysqli_query($con, $sqlSoLuong))[0];
    $ngayGiaoHang= mysqli_fetch_array(mysqli_query($con, $sqlSoLuong))[1];
   //cong suat ngay
   $sqlCongSuat = "SELECT `congSuatNgay` FROM `khanangsanxuat` WHERE tenToSanXuat='$tenToSanXuat'";
  $congSuat=  mysqli_fetch_array(mysqli_query($con, $sqlCongSuat))[0];
  
     $songay = ceil($soLuong/$congSuat);
    

  $ngay=$ngayBatDau. ' + ';
  $ngay .= $songay;
  $ngay .= ' days';
  $ngayKetThuc =  date('Y-m-d', strtotime($ngay));

  if(strtotime($ngayKetThuc)>strtotime($ngayGiaoHang)) {
    $ngayKetThuc=$ngayGiaoHang;
  }
  if(strtotime($ngayBatDau)>strtotime($ngayGiaoHang)) {
    echo "
    <script language='javascript'>
        alert('ngày bắt đầu lớn hơn ngày giao hàng');
        window.open('themkehoachsanxuat.php','_self', 1);
    </script>
";
  }

    $sql = "UPDATE `KEHOACHSANXUAT` SET `maYeuCauSanXuat`='$maYeuCauSanXuat',`tenToSanXuat`='$tenToSanXuat',`ngayBatDau`='$ngayBatDau',`ngayKetThuc`='$ngayKetThuc' WHERE maKeHoachSanXuat='$idEdit';";
    $resultsql = mysqli_query($con, $sql);

    if ($resultsql) {
        echo "
        <script language='javascript'>
        alert('cập nhật thành công');
            window.open('kehoachsanxuat.php','_self', 1);
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
        <h5 class="modal-title" id="exampleModalLabel"><strong >sửa kế hoạch sản xuất</strong></h5>
    </div>
    <div class="modal-body">
        <form method="POST">
            <div class="form-row m-2">
                <div class="form-group col-md-12">
                    <label for="maYeuCauSanXuat">Mã yêu cầu sản xuất</label>
                    <br>
                    <select class="form-select" name="maYeuCauSanXuat" aria-label="Default select example" style="width: 500px;height: 40px;">
                       <?php
                        require_once 'config.php';
                        $sqlSelectMaycsx = "SELECT `maYeuCauSanXuat` FROM `yeucausanxuat` WHERE 1;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['maYeuCauSanXuat']; ?>" <?=($result['maYeuCauSanXuat']==$r['maYeuCauSanXuat']) ? 'selected':'';?>><?php echo $r['maYeuCauSanXuat']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="tenToSanXuat">tổ sản xuất</label>
                    <br>
                    <select class="form-select" name="tenToSanXuat" aria-label="Default select example" style="width: 500px;height: 40px;">
                        <option selected><?=$result['tenToSanXuat']?></option>
                        <?php
                        require_once 'config.php';
                        $sqlSelectMaycsx = "SELECT `tenToSanXuat` FROM `KHANANGSANXUAT` WHERE 1;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['tenToSanXuat']; ?>" <?=($result['tenToSanXuat']==$r['tenToSanXuat']) ? 'selected':'';?> ><?php echo $r['tenToSanXuat']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- <div class="danhsach"></div> -->
                <div class="form-group col-md-12">
                    <label for="ngayBatDau">Ngày bắt đầu</label>
                    <input type="date" class="form-control" value="<?= $result['ngayBatDau'] ?>" name="ngayBatDau" id="ngayBatDau" placeholder="" style="width: 500px;height: 40px;">
                </div>
                <div class="col">
                    <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="kehoachsanxuat.php" style="text-decoration: none;color: #fff;" >đóng</a></button>
                    <input type="submit" class="btn btn-primary btn-lg" name="edit" value="cập nhật" style="position: relative;right: -300px;">
                </div>
            </div>
        </form>
    </div>
</div>
