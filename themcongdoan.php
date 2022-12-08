<?php
require_once 'config.php';
include "layout.php";

if (isset($_POST['add'])) {


    $tenCongDoan = $_POST['tenCongDoan'];
    $sql = "INSERT INTO `congdoan` (`tencongdoan`) VALUES ('$tenCongDoan');";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "
        <script language='javascript'>
        alert('thêm thành công');
            window.open('congdoan.php','_self', 1);
        </script>
    ";
    } else {
        echo "
        <script language='javascript'>
            alert('thêm không thành công');
            window.open('themcongdoan.php','_self', 1);
        </script>
    ";
    }
}
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="modal-header" style="margin: 10px 80px;">
        <h5 class="modal-title" id="exampleModalLabel"><strong >Thêm công đoạn</strong></h5>
    </div>
    <div class="modal-body">
        <form method="POST">
            <div class="form-row m-2">
                
                </div>
                <!-- <div class="danhsach"></div> -->
                <div class="form-group col-md-12" style="margin: 10px 80px;">
                    <label for="ngayBatDau">tên công đoạn</label>
                    <!-- <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div> -->
                    <input type="text" class="form-control" name="tenCongDoan" id="tenCongDoan" placeholder="" style="width: 500px;height: 40px;">
                </div>
                <div class="col">
                    <button type="button" style="position: relative;right: -250px;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="congdoan.php" style="text-decoration: none;color: #fff;" >đóng</a></button>
                    <input type="submit" class="btn btn-primary btn-lg" name="add" value="thêm" style="position: relative;right: -300px;">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <script type="text/javascript">
    $('.timkiem').keyup(function() {
        var txt = $('.timkiem').val();
        $.post('ajax.php', {
            data: txt
        }, function(data) {
            $('.danhsach').html(data);
        })
    })
</script> -->