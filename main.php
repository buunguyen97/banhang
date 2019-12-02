<?php session_start();
require_once "class/dt.php";
$dt = new dt;
$p = $_GET['p'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Điện thoại di động</title>
    <base href="<?= BASE_URL ?>"/>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png"/>
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png"/>
</head>

<body>

<div id="all">

    <?php require "header.php"?>

    <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

    <?php
    require_once "dangnhap.php";
    ?>

    <!-- *** LOGIN MODAL END *** -->

    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Trang thanh toán</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a>
                        </li>
                        <li>Thanh toán</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">
            <?php
            if ($p=="giohang") require "giohang.php";
            elseif ($p=="chitiet") require "chitiet.php";
            elseif ($p=="dangky") require "dangky.php";
            elseif ($p=="lienhe") require "lienhe.php";
            elseif ($p=="thanhtoan1") require "thanhtoan1.php";
            elseif ($p=="sptrongloai") require "sptrongloai.php";
            elseif ($p=="thanhtoan2") require "thanhtoan2.php";
            elseif ($p=="thanhtoan3") require "thanhtoan3.php";
            elseif ($p=="thanhtoan4") require "thanhtoan4.php";
            elseif ($p=="dathang") require "dathang.php";
            elseif ($p=="lienhe") require "contact.php";
            else { ?>
            <div class="heading"><h2>SẢN PHẨM MỚI</h2></div>
            <?php $listSP = $dt->SanPhamMoi(18); include "listsp.php"; ?>

            <div class="heading"><h2>SẢN PHẨM BÁN CHẠY</h2></div>
            <?php $listSP = $dt->SanPhamBanChay(18); include "listsp.php"?>

            <div class="heading"><h2>SẢN PHẨM HOT</h2></div>
            <?php $listSP = $dt->SanPhamHot(18); include "listsp.php"?>
            <?php } //if?>
        </div>
    </div>


    <!-- /#content -->


    <!-- *** GET IT ***
_________________________________________________________ -->
    <!---->
    <!--        <div id="get-it">-->
    <!--            <div class="container">-->
    <!--                <div class="col-md-8 col-sm-12">-->
    <!--                    <h3>Do you want cool website like this one?</h3>-->
    <!--                </div>-->
    <!--                <div class="col-md-4 col-sm-12">-->
    <!--                    <a href="#" class="btn btn-template-transparent-primary">Buy this template now</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->


    <!-- *** GET IT END *** -->


    <!-- *** FOOTER ***
_________________________________________________________ -->

    <?php require "footer.php";?>
    <!-- /#footer -->

    <!-- *** FOOTER END *** -->

    <!-- *** COPYRIGHT ***
_________________________________________________________ -->

    <div id="copyright">
        <div class="container">
            <div class="col-md-12">
                <p class="pull-left">&copy; 2015. Your company / name goes here</p>
                <p class="pull-right">Template by <a href="https://bootstrapious.com">Bootstrapious</a> & <a
                            href="https://fity.cz">Fity.cz</a>
                    <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                </p>

            </div>
        </div>
    </div>
    <!-- /#copyright -->

    <!-- *** COPYRIGHT END *** -->


</div>
<!-- /#all -->


<!-- #### JAVASCRIPT FILES ### -->

<script src="js/jquery-3.4.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/front.js"></script>
<script src="js/test.js"></script>
<script src="js/checkdangki.js"></script>
<script src="js/checkmail.js"></script>
<script src="js/kichhoat.js"></script>


</body>

</html>