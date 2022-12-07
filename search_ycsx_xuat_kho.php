<?php
include "config.php";
$data = $_POST['key'];
// echo $data;
$sqlchecktinhtrang = "select maYeuCauSanXuat from yeucausanxuat where maYeuCauSanXuat like '$data%' and tinhTrang='thành phẩm' group by maYeuCauSanXuat";
$result = mysqli_query($con, $sqlchecktinhtrang) or die(mysqli_error($con));
$count = mysqli_num_rows($result);
if ($count <= 0) {
    echo "yêu cầu sản xuất này đã nhập kho hoặc không tồn tại";
    echo "
    <script language='javascript'>
        $('.btn-xuat').hide();
        </script>
        ";
} else {
    while ($r = mysqli_fetch_array($result)) {
?>
        <li class="list-group-item "  >
            <a class="pe-auto text-decoration-none" href="#" id="list_item">  <?= $r['maYeuCauSanXuat'] ?></a>
        </li>
<?php
    }
}
?>

<!-- <div class="text-center p-4" style="height: 50px;text-align: center;">
     2022 nhóm 4 lập trình web bằng php
  </div> -->