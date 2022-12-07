<?php
include "config.php";
include "layout.php";
?>
<div class="content-wrapper" style="background: linear-gradient(-180deg, #BCE6FF 0%, #53A6D8 100%);">
    <div class="container ">
        <div class="row">
            <div class="col mt-5">
                <h2>kho nguyên thành phẩm</h2>
            </div>

        </div>
        <div class="row d-flex">
            <div class="col mt-2 form-group">
                <form method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="" style="margin:0 30px;">yêu cầu sản xuất</label>
                                <input type="text" name="text" id="maycsx" class="maycsx" style="position: relative;width: 200px;">
                                <ul style="position: absolute;left:200px;width: 200px;" class="message list-group">

                                </ul>
                            </div>
                            <div class="col d-flex flex-column mt-2">
                                <button class="btn btn-warning mb-3 btn-xuat" id="xuat" type="button" name="xuat" style="width: 300px;padding: 0;height: 50px;">nhập kho</button>
                                <button style="width: 300px;" type="button" class="btn btn-warning "><a href="home.php">đóng</a> </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="row mt-3">
            <p style="margin-left: 80px;">quy trình xuất kho</p>
            <img height="240px" class="mx-auto" src="./dist/assest/image/Screenshot 2022-11-30 112757.png" alt="quy trình" style="width: 800px;text-align: center;">
        </div> -->
    </div>
</div>
<script type="text/javascript">
    $('.maycsx').keyup(function() {
        var txt = $('.maycsx').val();
        $.post('search_ycsx_xuat_kho.php', {
            key: txt
        }, function(key) {
            $('.message').html(key);
        })
    })
    $(document).ready(function() {
        $('#xuat').click(function() {
            let maycsx = $('#maycsx').val();
            window.open('nhapkhothanhpham.php?data=' + maycsx, '_self', 1)
        });
    })
    //  $('#list_item').on('click',function () {
    //     let txt = $('#list_item').val();
    //     $('.maycsx').html(txt);
    //     console.log(txt);
    // })
</script>