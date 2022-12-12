<?php
include "config.php";
include "layout.php";
require_once "PHPExcel.php";
if(isset($_POST['import'])) {
    $excel=isset($_FILES['file']['name']) ? $_FILES['file']['name'] :"";
    $target_dir = '';
    $target_file = $target_dir . basename($excel);
   $upload =  move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);
//    print_r($target_file);
    if(!empty($upload)) {
        $reader = new PHPExcel_Reader_Excel2007($target_file);
        $reader->setLoadSheetsOnly('danh sách lệnh sản xuất');
        // $reader->enableMemoryOptimization(); //Call to undefined method
        $objPHPExcel = $reader->load($target_file);
        $sheet = $objPHPExcel ->setActiveSheetIndex(0);
        $totalRow = $sheet->getHighestRow();
        $lastColum = $sheet->getHighestColumn();
        $ToTalCol = PHPExcel_Cell::columnIndexFromString($lastColum);
        $data = [];
        for($i=2;$i<=$totalRow;$i++) {
          for($j=0;$j<$ToTalCol;$j++) {
            $data[$i-2][$j] = $sheet->getCellByColumnAndRow($j,$i)->getValue();
          }
        }
        // print_r($data);
        foreach($data as $r) {
            $maLenhSanXuat = $r[0];
            $tenLenhSanXuat = $r[1];
            $maYeuCauSanXuat=$r[2];
            $soLuong=$r[3];
            $tenToSanXuat = $r[4];
            $congDoan=$r[5];
            $nguoiLap=$_SESSION['tenDangNhap'];
            $ngayLap=date('Y-m-d');
            $ngayHoanThanh = $r[6];
            $sql_sl = "select soLuong from chitietyeucau where mayeucausanxuat = '$maYeuCauSanXuat';";
            $so_luong_yeu_cau = mysqli_fetch_array(mysqli_query($con,$sql_sl))['soLuong'];
            if($so_luong_yeu_cau<($soLuong+5)) {
                echo "
                <script language='javascript'>
                alert('số lượng sản xuất vượt mức cho phép');
                    window.open('themlenhsanxuat.php','_self', 1);
                </script>
            ";
             die('errr');
            }
            $sql = "INSERT INTO `Lenhsanxuat` (`maLenhSanXuat`,`tenLenhSanXuat`,`maYeuCauSanXuat`, `tenToSanXuat`,`maCongDoan`,`ngayHoanTHanh`,`nguoiLap`,`ngayLap`,`soLuongSX`) VALUES ('$maLenhSanXuat','$tenLenhSanXuat','$maYeuCauSanXuat','$tenToSanXuat','$congDoan','$ngayHoanThanh','$nguoiLap','$ngayLap','$soLuong');";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "
                <script language='javascript'>
                alert('thêm thành công');
                    window.open('lenhsanxuat.php','_self', 1);
                </script>
            ";
            } else {
                echo "
                <script language='javascript'>
                    alert('thêm không thành công');
                    window.open('themlenhsanxuat.php','_self', 1);
                </script>
            ";
            }
        }
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <form  method="post" enctype='multipart/form-data'>
                <input type="file" name="file">
                <button type="submit" name="import" class="btn btn-danger">import</button>
            </form>
        </div>
    </div>
</div>
</div>