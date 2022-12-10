<?php
include "layout.php";
$idView = $_GET['id'];
$sqlLSX = "SELECT * FROM LENHSANXUAT INNER JOIN YEUCAUSANXUAT ON LENHSANXUAT.maYeuCauSanXuat=YEUCAUSANXUAT.maYeuCauSanXuat INNER JOIN chitietyeucau ON chitietyeucau.maYeuCauSanXuat = YEUCAUSANXUAT.maYeuCauSanXuat inner join sanpham on sanpham.maSanPham = chitietyeucau.maSanPham INNER JOIN CONGDOAN ON CONGDOAN.maCongDoan = LENhSANXUAT.maCongDoan WHERE maLenhSanXuat='$idView';";
$resultSQLLSX = mysqli_fetch_assoc(mysqli_query($con, $sqlLSX));
$sql_da_sx = "SELECT lenhsanxuat.maLenhSanXuat,sum(thuctesanxuat.soLuongDaSanXuat) as 'sl' FROM lenhsanxuat inner join thuctesanxuat on thuctesanxuat.maLenhSanXuat=lenhsanxuat.maLenhSanXuat where lenhsanxuat.malenhsanxuat='$idView' GROUP by lenhsanxuat.maLenhSanXuat;";
$sl_da_sx = isset(mysqli_fetch_array(mysqli_query($con,$sql_da_sx))['sl']) ? mysqli_fetch_array(mysqli_query($con,$sql_da_sx))['sl'] : 0;
$sl_sx=$resultSQLLSX['soLuongSX'];

$tiendo=number_format(100*($sl_da_sx/$sl_sx),1);
if(is_nan($tiendo)) {
    $tiendo=0;
} 
?>
<style>
    .m {
        margin: 30px 0;
    }

    .modal-title {
        font-size: 30px;
        font-weight: 500;
        color: rgb(37, 48, 48);
    }
</style>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
<div class="container">
    <div class="row text-center">
        <div class="modal-header col ">
            <h5 class="modal-title text-center" id="exampleModalLabel"><strong>thông tin chi tiết lệnh sản xuất</strong></h5>
        </div>
    </div>
    <div class="wrapper row">
        <div class="preview col-md-6 m">
            <div class="preview-pic tab-content" style="margin-left: 50px;">
                <div class="tab-pane active" id="pic-1"><img style="width: 450px;height:500px ;" src="./dist/assest/image/<?=$resultSQLLSX['anhMinhHoa'] ?>" /></div>
            </div>
        </div>
        <div class="details col-md-6 m">
            <p class="modal-title" id="exampleModalLabel"><?= $resultSQLLSX['tenLenhSanXuat'] ?></p>
            <p>mã lệnh sản xuất :<?= $resultSQLLSX['maLenhSanXuat'] ?></p>
            <p>mã yêu sản xuất :<?= $resultSQLLSX['maYeuCauSanXuat'] ?></p>
            <p>tên sản phẩm :<?= $resultSQLLSX['tenSanPham'] ?></p>
            <p>số lượng :<?= $resultSQLLSX['soLuongSX'] ?></p>
            <p>công đoạn :<?= $resultSQLLSX['tenCongDoan'] ?></p>
            <p>tên tổ sản xuất :<?= $resultSQLLSX['tenToSanXuat'] ?></p>
            <p>người lập :<?= $resultSQLLSX['nguoiLap'] ?></p>
            <p>ngày lập :<?= $resultSQLLSX['ngaylap'] ?></p>
            <p>thực tế sản xuất :</p>
            <div class="progress" style="width: 200px;">
                <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: <?=$tiendo?>%" aria-valuenow="<?=$tiendo?>" aria-valuemin="0" aria-valuemax="100"><?=$tiendo?>%</div>
            </div>
            <br>
            <br>
            <button type="button" style="width:80px ;margin-top: 20px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="lenhsanxuat.php" style="text-decoration: none;color: #fff;">đóng</a></button>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
