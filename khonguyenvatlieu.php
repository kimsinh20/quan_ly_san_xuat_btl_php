<?php
include "config.php";
include "layout.php";
// $maYeuCauSanXuat = $_POST['maYeuCauSanXuat'];
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="container ">
        <div class="row">
            <div class="col mt-5">
                <h2>kho nguyên vật liệu</h2>
            </div>

        </div>
        <div class="row d-flex">
            <div class="col mt-2 form-group">
                <form method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="" style="margin:0 30px;">yêu cầu sản xuất</label>
                                <!-- <select class="form-select custom-select form-control-border" name="maycsx" aria-label="Default select example" style="width: 300px;height: 40px;">
                                    <?php
                                    require_once 'config.php';
                                    $sqlSelectYCSX = "SELECT * FROM `yeucausanxuat` inner join sanpham on sanpham.maSanPham=yeucausanxuat.maSanPham WHERE 1;";
                                    $resultYCSX = mysqli_query($con, $sqlSelectYCSX);
                                    while ($r = mysqli_fetch_array($resultYCSX)) {
                                    ?>
                                        <option style="height: 40px;" value="<?= $r['maYeuCauSanXuat']; ?>"><?php echo $r['maYeuCauSanXuat'];
                                                                                                            echo "-" . $r['tenSanPham']; ?></option>
                                    <?php
                                    }
                                    
                                    ?>
                                </select> -->
                                <input type="text" name="maycsx" class="maycsx">
                                <ul>
                                    <div class="message"></div>
                                </ul>
                            </div>
                            <div class="col d-flex flex-column mt-2">
                                <button class="btn btn-warning mb-3 btn-xuat" type="submit" name="xuat" style="width: 300px;padding: 0;height: 50px;">
                                    <a href="xuatkhonvl.php?maid=ycsx001">xuất kho để sản xuất</a>
                                    <!-- <a href="xuatkhonvl.php?maid=<?php if (isset($_POST['xuat'])) {
                                                                        $maYeuCauSanXuat = $_POST['maycsx'];
                                                                        echo $maYeuCauSanXuat;
                                                                    } ?>">xuất kho để sản xuất</a> -->
                                </button>
                                <!-- <a  class="btn btn-warning mb-3" style="width: 300px;padding: 0;height: 50px;" class=" mb-3 "  href="xuatkhonvl.php?maid=<?php ?>"></a>  -->
                                <!-- <a style="width: 300px;" class="btn btn-warning mb-3 " href="xuatkhonvl.php?maid=<?= $_POST['maycsx'] ?>"><button type="submit" name="xuat"> xuất kho nguyên vật liệu để sản xuất</button></a> -->

                                <button style="width: 300px;" type="button" class="btn btn-warning mb-3"><a href="#">nhập nguyên vật liệu</a> </button>
                                <button style="width: 300px;" type="button" class="btn btn-warning "><a href="home.php">đóng</a> </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <p style="margin-left: 80px;">quy trình xuất kho</p>
            <img height="240px" class="mx-auto" src="./dist/assest/image/Screenshot 2022-11-30 112757.png" alt="quy trình" style="width: 800px;text-align: center;">
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.maycsx').keyup(function() {
        var txt = $('.maycsx').val();
        $.post('searchycsx.php', {
            key: txt
        }, function(key) {
            $('.message').html(key);
        })
    })
</script>