<?php
include "config.php";
$data = $_POST['data'];
// echo $data;
$sql = "SELECT * FROM LENHSANXUAT  INNER JOIN CONGDOAN ON CONGDOAN.maCongDoan = LENhSANXUAT.maCongDoan 
INNER JOIN YEUCAUSANXUAT ON LENHSANXUAT.maYeuCauSanXuat=YEUCAUSANXUAT.maYeuCauSanXuat
INNER JOIN chitietyeucau ON chitietyeucau.maYeuCauSanXuat = YEUCAUSANXUAT.maYeuCauSanXuat inner join sanpham on sanpham.maSanPham = chitietyeucau.maSanPham
 INNER JOIN KHANANGSANXUAT ON KHANANGSANXUAT.tenToSanXuat = LENhSANXUAT.tenToSanXuat ORDER by $data ASC;";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$i = 1;
$count = mysqli_num_rows($result);
if ($count <= 0) {
    echo "không tìm thấy kết quả phù hợp";
    echo "
    <script type='text/javascript'>
    $('.footer').hide();
   </script>
    ";
} else {
    while ($r = mysqli_fetch_array($result)) {
?>
        <tr>
        <tr>
            <th scope="col"><?php echo $i++; ?></th>
            <th scope="col"><?php echo $r['maLenhSanXuat']; ?></th>
            <th scope="col"><?php echo $r['maYeuCauSanXuat']; ?></th>
            <th scope="col"><?php echo $r['tenSanPham']; ?></th>
            <th scope="col"><?php echo $r['soLuongSX']; ?></th>
            <th scope="col"><?php echo $r['tenToSanXuat']; ?></th>
            <th scope="col"><?php echo $r['tenCongDoan']; ?></th>
            <th scope="col"><?php echo $r['ngayHoanThanh']; ?></th>
            <th scope="col">
            <a style="margin-right: 15px;" href="./xemlenhsanxuat.php?id=<?= $r['maLenhSanXuat'] ?>" class="btn btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a style="margin-right: 15px;" href="./sualenhsanxuat.php?id=<?= $r['maLenhSanXuat'] ?>" class="btn btn btn-danger">sửa</a>
                <a href="./xoalenhsanxuat.php?id=<?= $r['maLenhSanXuat'] ?>" class="btn btn-info">xóa</a>
            </th>
        </tr>
        </tr>
        </footer>
        <script type='text/javascript'>
            $('.footer').hide();
        </script>
<?php
    }
}
?>
<!-- <div class="text-center p-4" style="height: 50px;text-align: center;">
     2022 nhóm 4 lập trình web bằng php
  </div> -->