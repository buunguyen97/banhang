<?php
if(isset($_SESSION['success'])){
    echo "<div><p class='bg-success' id='login' style='width: 350px;text-align: center;font-size: 17px;margin: 30px auto;'>Chúc mừng ngài đã xóa thành công !</p></div>";
     unset($_SESSION['success']);
}
if(isset($_SESSION['successlogin'])){
    echo "<div><p class='bg-success' id='login' style='width: 350px;text-align: center;font-size: 17px;margin: 30px auto;'>Chúc mừng ngài đã thêm thành công !</p></div>";
    unset($_SESSION['successlogin']);
}
if(isset($_SESSION['successupdate'])){
    echo "<div><p class='bg-success' id='login' style='width: 350px;text-align: center;font-size: 17px;margin: 30px auto;'>Chúc mừng ngài đã cập nhật thành công !</p></div>";
    unset($_SESSION['successupdate']);
}
?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Danh sách loại điện thoại
            </h4>
            <p class="text-muted font-14 m-b-30">

            </p>

            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>idDT</th>
                    <th>Tên ĐT</th>
                    <th class="sorting_2">Mô tả</th>
                    <th>Giá /Giá KM</th>
                    <th>Sô Lượng Trong Kho</th>
                    <th>Số Lượng Mua</th>
                    <th>Ẩn hiiện</th>
                    <th>Cập Nhật/Xóa</th>
                </tr>
                </thead>


                <tbody>
                <?php
                $kq = $qt->ListDT();
                while ($k=$kq->fetch_assoc()){ ?>
                    <tr>
                        <td  class="idDT" ><?=$k['idDT']?></td>
                        <td><?=$k['TenDT']?></td>

                        <td><?=$k['MoTa']?></td>

                        <td>
                            <p>Giá: <?=$k['Gia']?></p>
                            <p>Giá KM:  <?=$k['GiaKM']?></p>
                        </td>
                        <td><?=$k['SoLuongTonKho']?></td>
                        <td><?=$k['SoLanMua']?></td>
                        <td>
                            <input type="checkbox" <?=($k['AnHien']==1)?"checked":"";?> data-toggle="toggle" data-on="Hiện" data-off="Ẩn" data-onstyle="success" data-offstyle="danger" class="AH3"  value="<?=($k['AnHien']==1)?"1":"0";?>"></td>
                        <td>
                            <a href="?p=dienthoai_sua&idDT=<?=$k['idDT']?>" class="btn bg-custom waves-effect text-white">Cập nhật</a> &nbsp;
                            <a href="dienthoai_xoa.php?idDT=<?=$k['idDT']?>" class="btn bg-danger waves-effect text-white" onClick="return confirm('Xóa hả')">Xóa</a>

                        </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

