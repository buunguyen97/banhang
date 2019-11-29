<div class="col-md-8" id="contentdk">
    <form action="" method="post" id="dangky">
        <div class="form-group row">
            <div class="col-md-3"> <label for="mail">Email</label> </div>
            <div class="col-md-9">
                <input type="email" class="form-control" name="mail" id="mail"  >
                <p id="notim"></p>
            </div>

        </div>
        <div class="form-group row">
            <div class="col-md-3"> <label for="pass">Mật khẩu</label> </div>
            <div class="col-md-9">
                <input type="password" class="form-control" name="pass" id="pass" pattern=".{6,30}"  >
                <p id="notip"></p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"><label for="repass">Gõ lại MK</label> </div>
            <div class="col-md-9">
                <input type="password" class="form-control" name="repass" id="repass" pattern=".{6,30}"  >
                <p id="notirp"></p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"> <label for="ht">Họ tên</label> </div>
            <div class="col-md-9">
                <input class="form-control" name="hoten" id="hoten" required >
                <p id="notih"></p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"> <label for="dc">Địa chỉ</label> </div>
            <div class="col-md-9">
                <input class="form-control" name="dc" id="dc" required>
                <p id="notidc"></p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"> <label for="dt">Điện thoại</label> </div>
            <div class="col-md-9">
                <input type="tel" class="form-control" name="dt" id="dt" pattern="\d{10,10}" maxlength="10" >
                <p id="notidt"></p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"> <label>Phái</label> </div>
            <div class="col-md-9">
                <input type="radio" name="phai" value="1"> Nam &nbsp;
                <input type="radio" name="phai" value="0"> Nữ
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"> <img src="captcha.php" align="left" height="46"> &nbsp; </div>

            <div class="col-md-9">
                <input class="cap" style="height: 48px" id="capcha" maxlength="4" name="capcha"  placeholder="Nhập chữ trong hình">
                <p id="noticap"></p>
            </div>
        </div>
        <div class="form-group row text-center">
            <button type="button" id="dangki" class="btn btn-template-main">
                <i class="fa fa-sign-in"></i> ĐĂNG KÝ
            </button>
        </div>
    </form>
</div>
<div class="text-center an" id="contenttc" style="    padding: 70px;
    font-size: 18px;">
    <div class="heading"> <h2>Đăng ký thành công</h2> </div>
    <div class="alert alert-success">
        <p>Chào mừng thành viên mới. </p>
        <p>Thông tin của bạn đã được ghi nhận. </p>
        <p>Mời bạn check mail để kích hoạt tài khoản.</p>
    </div>
</div>

