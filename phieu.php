<?php
include "config.php";
include "layout.php";
// $maYeuCauSanXuat = $_POST['maYeuCauSanXuat'];

?>
<div class="content-wrappe " style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="container contentphieu">
        <div class="row">
            <div class="col">
                <p>Đơn vị: công ty hp </p>
                <p>bộ phận: kho</p>
            </div>
            <div class="col">
                <p>Mẫu số 02 - VT </p>
                <p>(Ban hành theo Thông tư số 133/2016/TT-BTC Ngày 26/8/2016 của Bộ Tài chính)</p>
            </div>
        </div>

        <div class="row">
            <h2>PHIẾU XUẤT KHO </h2>
        </div>
        <div class="row">
            <div class="col">
                <p>mã phiếu : 1 </p>
            </div>
            <div class="col">
                <p>ngày xuất : </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>tên kho : kho nguyên vật liệu</p>
            </div>
            <div class="col">
                <p>địa chỉ kho : hà nội</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>địa chỉ nhận : bộ phận sản xuất</p>
            </div>
            <div class="col">
                <p>lý do xuất kho : xuất kho để sản xuất</p>
            </div>
        </div>
        <div class="row">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã nguyên vật liệu</th>
                        <th scope="col">tên nguyên vật liệu</th>
                        <th scope="col">Số lượng xuất</th>
                    </tr>
                </thead>
                <tbody class="danhsachlsx">
                    <?php
                    require_once 'config.php';
                    $sqlSelect = "select nguyenvatlieu.maNguyenVatLieu,tenNguyenVatLieu,soLuongNVL from phieuxuat inner join khonvl on khonvl.maNguyenVatLieu=phieuxuat.maNguyenVatLieu inner join nguyenvatlieu on nguyenvatlieu.manguyenvatlieu=khonvl.manguyenvatlieu where maYeuCauSanXuat='ycsx001'";
                    $resultPhanTrang = mysqli_query($con, $sqlSelect);
                    if (mysqli_num_rows($resultPhanTrang) <= 0) {
                        echo "
                <script type='text/javascript'>
                 $('.contentphieu').hide();
                 alert('lỗi');
                 </script>
                 
                 ";
                    }
                    $i = 1;
                    while ($r = mysqli_fetch_array($resultPhanTrang)) {
                    ?>
                        <tr>
                            <th scope="col"><?php echo $i++; ?></th>
                            <th scope="col"><?php echo $r['maNguyenVatLieu']; ?></th>
                            <th scope="col"><?php echo $r['tenNguyenVatLieu']; ?></th>
                            <th scope="col"><?php echo $r['soLuongNVL']; ?></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <button type="button" style="width:80px ;" class="btn btn-danger btn-lg x"><a href="home.php" style="text-decoration: none;color: #fff;">đóng</a></button>
        </div>
    </div>
</div>