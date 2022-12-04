<?php
include "config.php";
$data = $_POST['data'];
// echo $data;
$sql = "SELECT * FROM KEHOACHSANXUAT INNER JOIN YEUCAUSANXUAT ON KEHOACHSANXUAT.maYeuCauSanXuat=YEUCAUSANXUAT.maYeuCauSanXuat INNER JOIN SANPHAM ON SANPHAM.maSanPham = YEUCAUSANXUAT.maSanPham order by $data ASC;";
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
        $sp = $r['maSanPham'];
        $sqlSoLuong = "SELECT sum(soLuongSP) from khothanhpham where maSanPham='$sp'; ";
        $soLuong = mysqli_fetch_array(mysqli_query($con, $sqlSoLuong))[0];
        $sl = 0;
        if ($r['soLuong'] > $soLuong) {
            $sl = $r['soLuong'] - $soLuong;
        }
?>
        <tr>
        <tr>
        <tr>
                            <th scope="col"><?php echo $i++; ?></th>
                            <th scope="col"><?php echo $r['maYeuCauSanXuat']; ?></th>
                            <th scope="col"><?php echo $r['tenSanPham']; ?></th>
                            <th scope="col"><img src="<?= $r['anhMinhHoa'] ?>" alt="error" style="width: 50px;border-radius: 10px;"></th>
                            <th scope="col"><?php echo $r['soLuong']; ?></th>
                            <th scope="col"><?php echo $sl; ?></th>
                            <th scope="col"><?php echo $r['tenToSanXuat']; ?></th>
                            <th scope="col"><?php echo $r['ngayBatDau']; ?></th>
                            <th scope="col"><?php echo $r['ngayKetThuc']; ?></th>
                            <th scope="col">
                                <a style="margin-right: 15px;" href="./suakehoachsanxuat.php?id=<?= $r['maKeHoachSanXuat'] ?>" class="btn btn btn-danger">sửa</a>
                                <a href="./xoakehoachsanxuat.php?id=<?= $r['maKeHoachSanXuat'] ?>" class="btn btn-info">xóa</a>
                            </th>
                        </tr>
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