<?php
session_start();
$loi=array();
if (isset($_POST['mail'])){
    require_once('class/dt.php');
    $dt= new dt;
    $thanhcong = $dt->login($_POST['mail'], $_POST['pass'], $loi);

    if ($thanhcong==true) {
        if (isset($_SESSION['back'])){
            $back= $_SESSION['back'];
            unset($_SESSION['back']);
        }else header("location: index.php");
        exit();
    }
}
?>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Đăng nhập</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="mail" name="mail" placeholder="Email" value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"><?php if (isset($loi['pass'])) echo $loi['pass']?>
                    </div>

                    <p class="text-center">
                        <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                    </p>

                </form>

                <p class="text-center text-muted">Chưa đăng ký?</p>
                <p class="text-center text-muted"><a href="<?=BASE_URL?>dang-ky/"><strong>Tạo tài khoản  </strong></a>  !
                    Đăng kí tài khoản để nhận được nhiều ưu đãi hơn nào !
                </p>

            </div>
        </div>
    </div>
</div>