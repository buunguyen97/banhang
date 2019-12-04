<?php
if (isset($_POST['TenDT'])) {
    $TenDT = trim($_POST['TenDT']);
    $urlhinh = $_POST['urlHinh'];
    $AnHien = $_POST['anhien'];
    $Hot = $_POST['hot'];
    $Mota = $_POST['Mota'];
    $datepicker = $_POST['datepicker'];
    $idL = $_POST['idL'];
    $idCL = $_POST['idCL'];
    $gia = $_POST['gia'];
    $giaKM = $_POST['giaKM'];
    $tonkho = $_POST['tonkho'];
    $LanBan = $_POST['lanban'];
    $LanXem = $_POST['lanxem'];
    $NoiDung = $_POST['noidung'];
    $qt->themDT($TenDT,$urlhinh,$AnHien,$Hot,$Mota,$datepicker,$idL,$idCL,$gia,$giaKM,$tonkho,$LanBan,$NoiDung,$LanXem);
    $_SESSION['successlogin'] = 1;
    echo "<script>document.location='index.php?p=dienthoai_ds';</script>";
    exit();
}


?>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Thêm Điện Thoại</h4>
            <p class="text-muted m-b-30 font-14">

            </p>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="post">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tên Điện Thoại</label>
                                <div class="col-10">
                                    <input type="text" name="TenDT" id="TenDT" class="form-control" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Địa chỉ hình </label>
                                <div class="col-10">
                                    <input type="text" name="urlHinh" id="urlHinh" class="form-control"
                                           onclick="selectFileWithCKFinder('urlHinh')" placeholder="">
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
                                <label class="col-2 col-form-label">Sản Phẩm Hot: </label>
                                <div class="col-10">
                                    <input type="radio" id="AH1" name="hot" checked value="1">
                                    <label for="AH1">Có</label>
                                    <input type="radio" id="AH0" name="hot" value="0">
                                    <label for="AH0">Không</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Mô tả</label>
                                <div class="col-10">
                                    <textarea type="text" name="Mota" id="Mota" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Ngày Đăng</label>
                                <div class="col-1">
                                    <input type="text" id="datepicker" data-date-format="yyyy/mm/dd"name="datepicker" class="form-control" value="" required>
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
                            <div class="form-group row ">
                                <label class="col-2 col-form-label">Chọn Loại:</label>
                                <div class="col-3">
                                    <select class="form-control btn btn-primary " name="idL" id="idL">
                                        <option value="0">Chọn Loại</option>
                                        <?php $ListL = $qt->ListLoaiSP();
                                        while ($row = $ListL->fetch_assoc()) { ?>
                                            <option value="<?= $row['idLoai'] ?>"><?= $row['TenLoai'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-2 col-form-label">Giá</label>
                                <div class="col-2">
                                    <input type="number" name="gia" id="gia" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Giá KM</label>
                                <div class="col-2">
                                    <input type="number" name="giakm" id="giakm" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Số Lượng Trong Kho</label>
                                <div class="col-1">
                                    <input type="number" name="tonkho" id="tonkho" class="form-control" value=""
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Số Lượng Bán</label>
                                <div class="col-1">
                                    <input type="number" name="lanban" id="lanban" class="form-control" value=""
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Số Lần Xem</label>
                                <div class="col-1">
                                    <input type="number" name="lanxem" id="lanxem" class="form-control" value=""
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nội dung :</label>
                                <div class="col-10">
                                    <textarea id="elm1" name="noidung"></textarea>

                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">THÊM ĐIỆN THOẠI
                                    </button>
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

