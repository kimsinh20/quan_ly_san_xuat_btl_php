<?php
include "layout.php";
$idView = $_GET['id'];
$sqlLSX = "SELECT * FROM LENHSANXUAT INNER JOIN YEUCAUSANXUAT ON LENHSANXUAT.maYeuCauSanXuat=YEUCAUSANXUAT.maYeuCauSanXuat INNER JOIN SANPHAM ON SANPHAM.maSanPham = YEUCAUSANXUAT.maSanPham INNER JOIN CONGDOAN ON CONGDOAN.maCongDoan = LENhSANXUAT.maCongDoan WHERE maLenhSanXuat='$idView';";
$resultSQLLSX = mysqli_fetch_assoc(mysqli_query($con, $sqlLSX));
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
    <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><strong>thông tin chi tiết lệnh sản xuất</strong></h5>
    </div>
    <div class="wrapper row">
        <div class="preview col-md-6 m">
            <div class="preview-pic tab-content" style="margin-left: 50px;">
                <div class="tab-pane active" id="pic-1"><img style="width: 350px;height:400px ;" src="<?= $resultSQLLSX['anhMinhHoa'] ?>" /></div>
            </div>
        </div>
        <div class="details col-md-6 m">
            <p class="modal-title" id="exampleModalLabel"><?= $resultSQLLSX['tenLenhSanXuat'] ?></p>
            <p>mã lệnh sản xuất <?= $resultSQLLSX['maLenhSanXuat'] ?></p>
            <p>mã yêu sản xuất <?= $resultSQLLSX['maYeuCauSanXuat'] ?></p>
            <p>tên sản phẩm <?= $resultSQLLSX['tenSanPham'] ?></p>
            <p>số lượng <?= $resultSQLLSX['soLuongSX'] ?></p>
            <p>công đoạn <?= $resultSQLLSX['tenCongDoan'] ?></p>
            <p>tên tổ sản xuất <?= $resultSQLLSX['tenToSanXuat'] ?></p>
            <p>người lập <?= $resultSQLLSX['nguoiLap'] ?></p>
            <p>ngày lập <?= $resultSQLLSX['ngaylap'] ?></p>
            <p>thực tế sản xuất</p>
            <div class="progress" style="width: 200px;">
                <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <button type="button" style="width:80px ;margin-top: 20px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="lenhsanxuat.php" style="text-decoration: none;color: #fff;">đóng</a></button>
        </div>
    </div>
</div>
</div>
</div>
</div>