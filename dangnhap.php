<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Đăng nhập</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formdangnhap">
                    <div class="form-group">
                        <input type="text" class="form-control" id="maildn" name="maildn" placeholder="Email" value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>">
                        <p id="notimail"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="passdn" name="passdn" placeholder="Password" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"><?php if (isset($loi['pass'])) echo $loi['pass']?>
                        <p id="notipass"></p>
                    </div>

                    <p class="text-center">
                        <button class="btn btn-template-main" type="button" id="dangnhapchinh"><i class="fa fa-sign-in"></i> Đăng nhập</button>
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