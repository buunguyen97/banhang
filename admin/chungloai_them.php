<?php
if(isset($_POST['TenCL'])){
    $TenCL = trim($_POST['TenCL']);
    $AnHien = $_POST['anhien'];
    $ThuTu=$_POST['ThuTu'];
    $qt->ThemCL($ThuTu,$AnHien,$TenCL);
    $_SESSION['successlogin'] = 1;
    echo "<script>document.location='index.php?p=chungloai_ds';</script>";
    exit();
}



?>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Thêm Chủng Loại</h4>
            <p class="text-muted m-b-30 font-14">

            </p>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="post" >
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tên chung loại</label>
                                <div class="col-10">
                                    <input type="text" name="TenCL" id="TenCL" class="form-control" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">ẨN Hiện: </label>
                                <div class="col-10">
                                    <input type="radio" id="AH1" name="anhien" checked value="1">
                                    <label for="AH1">Hiện&nbsp;&nbsp;&nbsp;</label>
                                    <input type="radio" id="AH0" name="anhien" value="0">
                                    <label for="AH0">Ẩn</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Thứ Tự</label>
                                <div class="col-10">
                                    <input type="text" name="ThuTu" id="ThuTu" class="form-control" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">THÊM CHỦNG LOẠI</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
