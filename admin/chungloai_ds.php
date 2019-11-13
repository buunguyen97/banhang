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
            <h4 class="m-t-0 header-title">Danh sách chủng loại
            </h4>
            <p class="text-muted font-14 m-b-30">

            </p>

            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>idCLoai</th>
                    <th>Tên Chủng Loại</th>
                    <th>Ẩn/Hiện</th>
                    <th>Thứ Tự</th>
                    <th>Cập Nhật/Xóa</th>
                </tr>
                </thead>


                <tbody>
                <?php
                $kq = $qt->ListCL();
                while ($k=$kq->fetch_assoc()){ ?>
                <tr>
                    <td><?=$k['idCL']?></td>
                    <td><?=$k['TenCL']?></td>

                    <td><?=($k['AnHien']==1)?"Hiện":"Ẩn";?></td>
                    <td><?=$k['ThuTu']?></td>
                    <td>
                        <a href="?p=chungloai_sua&idCL=<?=$k['idCL']?>" class="btn bg-custom waves-effect text-white">Cập nhật</a> &nbsp;
                        <a href="chungloai_xoa.php?idCL=<?=$k['idCL']?>" class="btn bg-danger waves-effect text-white" onClick="return confirm('Xóa hả')">Xóa</a>

                    </td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

