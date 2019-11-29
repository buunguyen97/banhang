<?php
session_start();
require_once "class/dt.php";
$dt = new dt;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mua Bán Các Sản Phẩm Điện Thoại</title>

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
    <!-- owl carousel css -->

    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
</head>

<body>

<div id="all">

    <?php require "header.php" ?>

    <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Customer login</h4>
                </div>
                <div class="modal-body">
                    <form action="customer-orders.html" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email_modal" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password_modal" placeholder="password">
                        </div>

                        <p class="text-center">
                            <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    </form>

                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>!
                        It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- *** LOGIN MODAL END *** -->

    <section>
        <!-- *** HOMEPAGE CAROUSEL ***
_________________________________________________________ -->

        <?php require "slider.php" ?>

        <!-- *** HOMEPAGE CAROUSEL END *** -->
    </section>
    <section class="bar background-gray no-mb">
        <div class="container">
            <div class="heading text-center"> <h2>SẢN PHẨM MỚI</h2> </div>
            <?php
            $listSP = $dt-> SanPhamMoi(18);
            require "listsp.php";
            ?>
        </div>

    </section>
    <section class="bar background-white">
        <?php require "camket.php" ?>
    </section>

    <section class="bar background-pentagon no-mb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>Testimonials</h2>
                    </div>

                    <p class="lead">We have worked with many clients and we always like to hear they come out from the
                        cooperation happy and satisfied. Have a look what our clients said about us.</p>


                    <!-- *** TESTIMONIALS CAROUSEL ***
_________________________________________________________ -->

                    <ul class="owl-carousel testimonials same-height-row">
                        <li class="item">
                            <div class="testimonial same-height-always">
                                <div class="text">
                                    <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself
                                        transformed in his bed into a horrible vermin. He lay on his armour-like back,
                                        and if he lifted his head a little he could see his brown
                                        belly, slightly domed and divided by arches into stiff sections.</p>
                                </div>
                                <div class="bottom">
                                    <div class="icon"><i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="name-picture">
                                        <img class="" alt="" src="img/person-1.jpg">
                                        <h5>John McIntyre</h5>
                                        <p>CEO, TransTech</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="testimonial same-height-always">
                                <div class="text">
                                    <p>The bedding was hardly able to cover it and seemed ready to slide off any moment.
                                        His many legs, pitifully thin compared with the size of the rest of him, waved
                                        about helplessly as he looked. "What's happened to
                                        me? " he thought. It wasn't a dream.</p>
                                </div>
                                <div class="bottom">
                                    <div class="icon"><i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="name-picture">
                                        <img class="" alt="" src="img/person-2.jpg">
                                        <h5>John McIntyre</h5>
                                        <p>CEO, TransTech</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="testimonial same-height-always">
                                <div class="text">
                                    <p>His room, a proper human room although a little too small, lay peacefully between
                                        its four familiar walls.</p>

                                    <p>A collection of textile samples lay spread out on the table - Samsa was a
                                        travelling salesman - and above it there hung a picture that he had recently cut
                                        out of an illustrated magazine and housed in a nice, gilded
                                        frame.</p>
                                </div>
                                <div class="bottom">
                                    <div class="icon"><i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="name-picture">
                                        <img class="" alt="" src="img/person-3.png">
                                        <h5>John McIntyre</h5>
                                        <p>CEO, TransTech</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="testimonial same-height-always">
                                <div class="text">
                                    <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a
                                        heavy fur muff that covered the whole of her lower arm towards the viewer.
                                        Gregor then turned to look out the window at the dull
                                        weather. Drops of rain could be heard hitting the pane, which made him feel
                                        quite sad.</p>
                                </div>

                                <div class="bottom">
                                    <div class="icon"><i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="name-picture">
                                        <img class="" alt="" src="img/person-4.jpg">
                                        <h5>John McIntyre</h5>
                                        <p>CEO, TransTech</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="testimonial same-height-always">
                                <div class="text">
                                    <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a
                                        heavy fur muff that covered the whole of her lower arm towards the viewer.
                                        Gregor then turned to look out the window at the dull
                                        weather. Drops of rain could be heard hitting the pane, which made him feel
                                        quite sad. Gregor then turned to look out the window at the dull weather. Drops
                                        of rain could be heard hitting the pane, which made
                                        him feel quite sad.</p>
                                </div>

                                <div class="bottom">
                                    <div class="icon"><i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="name-picture">
                                        <img class="" alt="" src="img/person-4.jpg">
                                        <h5>John McIntyre</h5>
                                        <p>CEO, TransTech</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- /.owl-carousel -->

                    <!-- *** TESTIMONIALS CAROUSEL END *** -->
                </div>

            </div>
        </div>
    </section>
    <!-- /.bar -->

    <section class="bar background-image-fixed-2 no-mb color-white text-center">
        <div class="dark-mask"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="icon icon-lg"><i class="fa fa-file-code-o"></i>
                    </div>
                    <h3 class="text-uppercase">BẠN CÓ MUỐN TRẢI NGHIỆM DÙNG THỬ ĐIỆN THOẠI MỚI?</h3>
                    <p class="lead">Chúng tôi chờ đợi bạn, chào mừng đến với cửa hàng và thử nghiệm các sản phẩm mới
                        nhất hoàn toàn miễn phí trong 7 ngày.</p>
                    <p class="text-center">
                        <a href="<?= BASE_URL ?>lien-he/" class="btn btn-template-transparent-black btn-lg">Liên hệ với
                            chúng tôi </a>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="bar background-white no-mb">
        <?php require "blog.php" ?>
    </section>
    <!-- /.bar -->




    <!-- *** GET IT ***
_________________________________________________________ -->




    <!-- *** GET IT END *** -->


    <!-- *** FOOTER ***
_________________________________________________________ -->

<?php require "footer.php"?>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
</script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/front.js"></script>

<script type="text/javascript" src="http://www.tenmiencuaban.com/scripts/snow.js"></script>
<!-- owl carousel -->
<script src="js/owl.carousel.min.js"></script>


</body>

</html>