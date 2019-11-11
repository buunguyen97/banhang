<?php
if(isset($_POST['TenL'])){
    $TenCL = trim($_POST['TenL']);
    $urlhinh = $_POST['urlHinh'];
    $AnHien = $_POST['anhien'];
    $idCL = $_POST['idCL'];
    $ThuTu=$_POST['ThuTu'];
    $qt->themloaisp($idCL,$ThuTu,$AnHien,$TenCL,$urlhinh);
    echo "<script>document.location='index.php?p=loaisanpham_ds';</script>";
    exit();
}



?>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Thêm Loại Sản Phầm</h4>
            <p class="text-muted m-b-30 font-14">

            </p>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="post" >
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tên loại</label>
                                <div class="col-10">
                                    <input type="text" name="TenL" id="TenL" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Địa chỉ hình </label>
                                <div class="col-10">
                                    <input type="text" name="urlHinh" id="urlHinh" class="form-control" onclick="selectFileWithCKFinder('urlHinh')" placeholder="" >
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
                                    <input type="text" name="ThuTu" id="ThuTu" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="col-2 col-form-label">Chọn Chủng Loại:</label>
                                <div class="col-3">
                                    <select class="form-control btn btn-primary " name="idCL" id="idCL">
                                        <option value="0">Chọn Chủng Loại</option>
                                        <?php $ListCL = $qt->ListCL();
                                        while ($r = $ListCL->fetch_assoc()) { ?>
                                            <option value="<?= $r['idCL'] ?>"><?= $r['TenCL'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">THÊM Loại SP</button>
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
