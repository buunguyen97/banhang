<?php
session_start();
require_once "class/quantri.php";
$qt = new quantri();
if ($_POST) {
    $u = trim($_POST['user']);
    $p = trim($_POST['password']);
    $kq = $qt->thongtinuser($u,$p);
    if (isset($kq)){
        $_SESSION['login_id'] = $kq['idUser'];
        $_SESSION['login_user'] = $kq['HoTen'];
        $_SESSION['login_level'] = $kq['idGroup'];
        $_SESSION['login_hoten'] = $kq['HoTen'];
        $_SESSION['login_email'] = $kq['Email'];
        $_SESSION['login'] = 1;

        if ( strlen($_SESSION['back']) > 0 ){
            $back= $_SESSION['back'];
            unset($_SESSION['back']);
            header("location:$back");
        } else header("location: index.php");
    }
    else{
        $_SESSION['error_login'] = "Tài khoản hoặc mật khẩu không đúng !";

    }	//Thất bại
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon.ico">

        <title>Đăng Nhập</title>

        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>

    </head>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo"><span>Admin<span>to</span></span></a>
                <h5 class="text-muted m-t-0 font-600">Mời ngài đăng nhập</h5>
                
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Đăng nhập đi nè!!! ahihi</h4>
                    <p style="color: red"><?php
                                echo $_SESSION['error_login'];
                                unset($_SESSION['error_login']);
                              ?>
                </p>
                </div>
                <div class="p-20">
                    <form class="form-horizontal m-t-20" action="" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="user" id="user" type="text" required="" placeholder="Tên đăng nhập của ngài">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" id="password" required="" placeholder="Mật khẩu">
                            </div>
                        </div>



                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Đăng nhập</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
            <!-- end card-box-->

            
        </div>
        <!-- end wrapper page -->



        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/detect.js"></script>
        <script src="js/fastclick.js"></script>
        <script src="js/jquery.blockUI.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="js/jquery.core.js"></script>
        <script src="js/jquery.app.js"></script>

	</body>
</html>