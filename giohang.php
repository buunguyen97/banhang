<div class="container">

    <div class="row">
        <div class="col-md-12">
            <p class="text-muted lead">Giỏ hàng hiện có &nbsp;<span class="them"></span>&nbsp; sản phẩm.</p>
        </div>


        <div class="col-md-9 clearfix" id="basket">

            <div class="box">

                <form method="post" action="capnhatGH.php?action=update">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Tên SP</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Giảm</th>
                                <th colspan="2">Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    reset( $_SESSION['daySoLuong'] );
                                    reset( $_SESSION['dayDonGia'] );
                                    reset( $_SESSION['dayTenDT'] );
                                    reset( $_SESSION['giamgia'] );
                                    reset( $_SESSION['hinh'] );
                                    $tongtien = $tongsoluong = 0;

                                ?>
                                <?php for ($i = 0; $i< count( $_SESSION['daySoLuong']) ; $i++) { ?>
                                    <?php
                                    $idDT = key( $_SESSION['daySoLuong'] );
                                    $tendt = current( $_SESSION['dayTenDT'] );
                                    $hinh = current( $_SESSION['hinh'] );
                                    $giamgia = current( $_SESSION['giamgia'] );
                                    $soluong = current( $_SESSION['daySoLuong'] );
                                    $dongia = current( $_SESSION['dayDonGia'] );
                                    $giam =$dongia - $giamgia;
                                    $tien = ($dongia-$giam)*$soluong;
                                    $tongtien+= $tien;
                                    $tongsoluong+= $soluong;

                                    ?>

                                    <tr>
                                        <td>
                                            <a>
                                                <img src="upload/hinhchinh/<?=$hinh?>" alt="<?=$tendt?>">
                                            </a>
                                        </td>
                                        <td>
                                            <a><?=$tendt?></a>
                                        </td>
                                        <td>
                                            <input type="number" style="width: 60px;" value="<?=$soluong?>" class="form-control thaydoi" name="soluong_arr[]"  >
                                            <input type="hidden" value="<?=$idDT?>" name="iddt_arr[]">

                                        </td>
                                        <td><?=number_format($dongia,0, ",",".");?> VND</td>
                                        <td><?=number_format($giam,0, ",",".");?> VND</td>
                                        <td><?=number_format($tien,0, ",",".");?> VND</td>
                                        <td>
                                            <a href="capnhatGH.php?action=remove&idDT=<?=$idDT?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                        <?php
                                        next( $_SESSION['daySoLuong'] );
                                        next( $_SESSION['dayDonGia'] );
                                        next( $_SESSION['dayTenDT'] );
                                        next( $_SESSION['hinh'] );
                                        next( $_SESSION['giamgia'] );
                                        ?>
                                <?php } //for ?>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="5">Tổng tiền:</th>
                                <th colspan="2"><?=number_format($tongtien,0, ",",".");?> VND</th>
                            </tr>
                            </tfoot>
                        </table>
                        <p style="display: none" id="tongsoluong"><?=number_format($tongsoluong,0, ",",".");
                       ?></p>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="<?=BASE_URL?>dien-thoai/" class="btn btn-default"><i class="fa fa-chevron-left"></i> Tiếp tục mua hàng</a>
                        </div>
                        <div class="pull-right">
                            <button id="capnhat" class="btn btn-default capnhat"><i class="fa fa-refresh"></i> Cập nhật giỏ hàng</button>
                            <a class="btn btn-template-main" href="<?=BASE_URL?>thanh-toan-1/">Thanh toán <i class="fa fa-chevron-right"></i></a>
                            </button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.box -->

            <div class="row">
                <div class="col-md-3">
                    <div class="box text-uppercase">
                        <h3>Có thể bạn muốn xem</h3>
                    </div>
                </div>
                <?php $list = $dt->LayDTngaunhien(rand(37,49));
                while ($row = $list->fetch_assoc() ) {?>
                <div class="col-md-3">
                    <div class="product">
                        <div class="image">
                            <a href="<?=BASE_URL."dien-thoai/". $row['idDT']?>.html">
                                <img src="upload/hinhchinh/<?=$row['urlHinh']?>" alt="" class="img-responsive image1">
                            </a>
                        </div>
                        <div class="text">
                            <h3><a href="<?=BASE_URL."dien-thoai/". $row['idDT']?>.html"><?=$row['TenDT']?></a></h3>
                            <p class="price"><?=number_format($row['Gia'],0, ",",".");?> VND</p>

                        </div>
                    </div>
                    <!-- /.product -->
                </div>

                <?php } ?>
            </div>

        </div>
        <!-- /.col-md-9 -->

        <div class="col-md-3">
            <div class="box" id="order-summary">
                <div class="box-header">
                    <h3>Tiền mua hàng</h3>
                </div>
                <p class="text-muted">Thông tin đơn hàng</p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Đơn hàng</td>
                            <th><?=number_format($tongtien,0, ",",".");?> VND</th>
                        </tr>
                        <tr>
                            <td>Phí vận chuyển</td>
                            <th>0</th>
                        </tr>
                        <tr>
                            <td>Thuế</td>
                            <th>0</th>
                        </tr>
                        <tr class="total">
                            <td>Tổng tiền</td>
                            <th><?=number_format($tongtien,0, ",",".");?> VND</th>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="box">
                <div class="box-header">
                    <h4>Mã giảm giá</h4>
                </div>
                <p class="text-muted">Nếu bạn có mã giảm giá, vui lòng nhập nó vào ô bên dưới.</p>
                <form>
                    <div class="input-group">

                        <input type="text" class="form-control">

                        <span class="input-group-btn">

					    <button class="btn btn-template-main" type="button"><i class="fa fa-gift"></i></button>

					</span>
                    </div>
                    <!-- /input-group -->
                </form>
            </div>

        </div>
        <!-- /.col-md-3 -->

    </div>

</div>