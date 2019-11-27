<?php
$idDT = $_GET['idDT'];
$ct = $dt-> chiTietSP($idDT);
$rowCT = $ct->fetch_assoc();
?>
<style>
    h1.lead {color: #38a7bb; font-weight:900; text-transform:uppercase; font-size:26px}
    p.goToDescription { margin-top:30px; text-align:left;}
    #mainImage {margin-top:50px}
    #mainImage img {height:250px; }
    #productMain #thumbs img {height:80px}
    #productMain #thumbs div {text-align:center}
    #productMain #thumbs a {border:none;}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<div class="container">

    <div class="row">


        <div class="col-md-9">

            <p class="lead font-weight-bold"><?=$rowCT['TenDT']?>
            </p>
            <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Cuộn để xem chi tiết sản phẩm</a>
            </p>

            <div class="row" id="productMain">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <img src="upload/hinhchinh/<?=$rowCT['urlHinh']?>" alt="" class="img-responsive">
                    </div>



                </div>
                <div class="col-sm-6">
                    <div class="box">

                        <form>


                            <p class="price"><?=number_format($rowCT['Gia'],0, ",",".");?> VND</p>
                            <p class=" price2">Giá khuyễn mãi:   <span ><?=number_format($rowCT['GiaKM'],0, ",",".");?></span> VND</p>

                            <p class="text-center">
                                <a href="capnhatGH.php?action=add&idDT=<?=$rowCT['idDT']?>" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                </button>
                            </p>

                        </form>
                    </div>

                    <div class="row" id="thumbs">
                        <?php $lispHinh = $dt->layHinhSP($idDT,4);?>
                        <?php if ($lispHinh->num_rows>0) {?>
                            <?php while($rowH = $lispHinh ->fetch_assoc()) {?>
                                <div class="col-xs-3">
                                    <a href="upload/hinhphu/<?=$rowH['urlHinh']?>" class="thumb">
                                        <img src="upload/hinhphu/<?=$rowH['urlHinh']?>" class="img-responsive">
                                    </a>
                                </div>
                            <?php } }?>
                    </div>

                </div>

            </div>



            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link  active" href="#profile" role="tab" data-toggle="tab" aria-selected="true"><h4>Giới thiệu</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"> <h4>Mô tả</h4></a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="profile">
                    <div class="box" id="details">

                        <div id="gioithieu"><?=$rowCT['baiviet']?></div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="buzz">
                    <div id="gioithieu">
                        <?php
                            $arr = explode(',',  $rowCT['MoTa']);
                            foreach ($arr as $key => $value){
                                ?>
                                <h4>- <?=$value?></h4>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="box social" id="product-social">
                <h4>Gửi tới bạn bè cùng xem</h4>
                <p>
                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                </p>
            </div>

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


        <!-- *** LEFT COLUMN END *** -->

        <!-- *** RIGHT COLUMN ***
_________________________________________________________ -->

        <div class="col-sm-3">

            <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
            <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách hãng điện thoại</h3>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked category-menu">
                        <li>
                            <ul>
                                <?php $lisyLoaiSP = $dt->ListLoaiSP() ; ?>
                                <?php while ($rowLoai = $lisyLoaiSP->fetch_assoc() ) { ?>
                                <li>
                                    <a href="dien-thoai/<?=trim($rowLoai['TenLoai'])?>/"><?=$rowLoai['TenLoai']?></a>
                                </li>
                                <?php }?>

                            </ul>
                        </li>


                    </ul>

                </div>
            </div>

            <!-- *** MENUS AND FILTERS END *** -->


            <!-- /.banner -->
        </div>
        <!-- /.col-md-3 -->

        <!-- *** RIGHT COLUMN END *** -->

    </div>
    <!-- /.row -->

</div>