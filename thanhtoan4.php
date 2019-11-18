<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1>Checkout - Order review</h1>
        </div>
        <div class="col-md-5">
            <ul class="breadcrumb">

                <li><a href="index.html">Home</a>
                </li>
                <li>Checkout - Order review</li>
            </ul>

        </div>
    </div>
</div>
</div>

<div id="content">
    <div class="container">

        <div class="row">

            <div class="col-md-12 clearfix" id="checkout">

                <div class="box">
                    <form method="post" action="dathang.php">
                        <ul class="nav nav-pills nav-justified">
                            <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i> <br>Địa chỉ</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-truck"></i> <br>Phương thức giao hàng</a></li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Phương thức thanh toán</a></li>
                            <li class="active"><a href="#"><i class="fa fa-eye"></i> <br>Thông tin đơn hàng</a></li>
                        </ul>


                        <div class="content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr> <th colspan="2">Tên SP</th>  <th>Số lượng</th>
                                            <th>Giá</th>  <th>Giảm</th>  <th>Tiền</th>
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
                                                <a href="#">
                                                    <img src="upload/hinhchinh/<?=$hinh?>" alt="<?=$tendt?>">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#"><?=$tendt?></a>
                                            </td>
                                            <td><?=$soluong?></td>
                                            <td><?=number_format($dongia,0, ",",".");?> VND</td>
                                            <td><?=number_format($giam,0, ",",".");?> VND</td>
                                            <td><?=number_format($tien,0, ",",".");?> VND</td>
<!--                                            <td>-->
<!--                                                <a href="capnhatGH.php?action=remove&idDT=--><?//=$idDT?><!--"><i class="fa fa-trash-o"></i></a>-->
<!--                                            </td>-->
                                        </tr>
                                        <?php
                                        next( $_SESSION['daySoLuong'] );
                                        next( $_SESSION['dayDonGia'] );
                                        next( $_SESSION['dayTenDT'] );
                                        next( $_SESSION['hinh'] );
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

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.content -->

                        <div class="box-footer">

                            <div class="pull-right">
                                <button type="submit" href="<?=BASE_URL?>dat-hang/" class="btn btn-template-main">Đặt hàng<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->


            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->