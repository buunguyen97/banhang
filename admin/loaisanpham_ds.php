<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Danh sách loại sản phẩm
            </h4>
            <p class="text-muted font-14 m-b-30">

            </p>

            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>idLoai</th>
                    <th>Tên Loại</th>
                    <th>Ẩn/Hiện</th>
                    <th>Thứ Tự</th>
                    <th>Cập Nhật/Xóa</th>
                </tr>
                </thead>


                <tbody>
                <?php
                $kq = $qt->ListLoaiSP();
                while ($k=$kq->fetch_assoc()){ ?>
                <tr>
                    <td><?=$k['idLoai']?></td>
                    <td><?=$k['TenLoai']?></td>

                    <td><?=($k['AnHien']==1)?"Hiện":"Ẩn";?></td>
                    <td><?=$k['ThuTu']?></td>
                    <td>
                        <a href="?p=loaisanpham_ds&idL=<?=$k['idLoai']?>" class="btn bg-custom waves-effect text-white">Cập nhật</a> &nbsp;
                        <a href="loaisanpham_xoa.php?idL=<?=$k['idLoai']?>" class="btn bg-danger waves-effect text-white" onClick="return confirm('Xóa hả')">Xóa</a>

                    </td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

