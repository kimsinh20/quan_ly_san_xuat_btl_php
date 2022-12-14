<?php
include "config.php";
include "layout.php";
$count = 0;
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>thêm thực tế sản xuất</h2>
            </div>
        </div>
        <form method="POST">
            <div class="row m-2">
                <div class="col">
                    <label for="maLenhSanXuat">tổ sản xuất</label>
                    <br>
                    <select class="form-select custom-select form-control-border" name="maLenhSanXuat" aria-label="Default select example" style="width: 400px;height: 40px;">
                        <?php
                        $sqlSelectMaycsx = "SELECT `maLenhSanXuat` FROM `lenhsanxuat` WHERE 1;";
                        $resultMaycsx = mysqli_query($con, $sqlSelectMaycsx);
                        while ($r = mysqli_fetch_array($resultMaycsx)) {
                        ?>
                            <option style="height: 40px;" value="<?php echo $r['maLenhSanXuat']; ?>"><?php echo $r['maLenhSanXuat']; ?></option>
                        <?php
                        }
                        $sql_ngay = "call get_bay_ngay_trong_tuan('$count');";
                        $ngay = mysqli_fetch_array(mysqli_query($con, $sql_ngay));
                        $sql_tuan = "call get_tuan_nayy();";
                        $result_tuan = mysqli_query($conn, $sql_tuan) or die(mysqli_error($conn));
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="soluong">số lượng</label>
                    <br>
                    <input type="text" name="soLuong" placeholder="nhập số lượng">
                </div>
                <div class="col">
                    <button id="tuan">
                        tuần sau
                    </button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><?= $ngay['Mo'] ?></th>
                            <th scope="col"><?= $ngay['Tu'] ?></th>
                            <th scope="col"><?= $ngay['We'] ?></th>
                            <th scope="col"><?= $ngay['Th'] ?></th>
                            <th scope="col"><?= $ngay['Fr'] ?></th>
                            <th scope="col"><?= $ngay['Sa'] ?></th>
                            <th scope="col"><?= $ngay['Su'] ?></th>
                        </tr>
                        <tr>
                            <th scope="col">thứ 2</th>
                            <th scope="col">thứ 3</th>
                            <th scope="col">thứ 4</th>
                            <th scope="col">thứ 5</th>
                            <th scope="col">thứ 6</th>
                            <th scope="col">thứ 7</th>
                            <th scope="col">chủ nhật</th>
                        </tr>
                    </thead>
                    <tbody class="danhsach">
                        <tr>
                            <th scope="col"><input type="submit" value="thêm"></th>
                            <th scope="col"><input type="submit" value="thêm"></th>
                            <th scope="col"><input type="submit" value="thêm"></th>
                            <th scope="col"><input type="submit" value="thêm"></th>
                            <th scope="col"><input type="submit" value="thêm"></th>
                            <th scope="col"><input type="submit" value="thêm"></th>
                            <th scope="col"><input type="submit" value="thêm"></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>