<style>
    .high {
        height: 90px;
    }
</style>
<div class="container" id="contact">

    <section>
        <div class="row">
            <div class="col-md-8">

                <div class="heading">
                    <h2>Chúng tôi ở đây để phục vụ bạn</h2>
                </div>

                <p class="lead" >Vui lòng điền thông tin trong mẫu dưới để liên hệ với chúng tôi (24/24)</p>


                <div class="heading">
                    <h3>Liên hệ với chúng tôi</h3>
                </div>
                <p id="thongbao" style="font-size: 20px"></p>
                <form id="lienhebh" method="post">
                    <div class="row">
                        <div class="col-sm-6 high">
                            <div class="form-group">
                                <label for="firstname">Tên</label>
                                <input type="text" class="form-control" id="firstname" name="firstname">
                                <span id="noti"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 high">
                            <div class="form-group">
                                <label for="lastname">Họ</label>
                                <input type="text" class="form-control" id="lastname" name="lastname">
                                <p id="notiname"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 high">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                                <p id="notiemail"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 high">
                            <div class="form-group">
                                <label for="subject">Tiêu đề</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                                <p id="notisub"></p></div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message">Nội dung</label>
                                <textarea rows="7" id="message" name="message" class="form-control"></textarea>
                                <p id="notinoidung"></p>
                            </div>
                        </div>
                        &nbsp;
                        <div class="col-sm-12 high">
                            <div class="form-group">
                                <img src="captcha.php" align="left" height="46"> &nbsp;
                                <input class="cap" style="height: 48px" id="cap" maxlength="4" name="cap" l
                                       placeholder="Nhập chữ trong hình">
                                <p id="noticap"></p>

                            </div>
                            <div class="loading">
                                <img id="loadinghinh"  style="width: 40px; position: absolute;top: 0;  right: 50%;" src="img/giphy.gif">
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <input type="button" id="checklienhe" class="btn btn-template-main" value="Gửi đi"><i></i>
                            </input>

                        </div>
                    </div>
                    <!-- /.row -->
                </form>

            </div>

            <div class="col-md-4">


                <h3 class="text-uppercase">Địa chỉ</h3>

                <p>1204 Quốc Lộ 13
                    <br>P.26
                    <br>Bình Thạnh
                    <br>Tp.HCM
                    <br>
                    <strong></strong>
                </p>

                <h3 class="text-uppercase">Điện thoại</h3>

                <p class="text-muted">Liên lạc với chung tôi mọi lúc mọi nơi</p>
                <p><strong>+33 555 444 333</strong>
                </p>


                <h3 class="text-uppercase">Địa chỉ Email</h3>

                <p class="text-muted">Email liên lạc với chúng tôi.</p>
                <ul>
                    <li><strong><a href="mailto:">info@fakeemail.com</a></strong>
                    </li>
                    <li><strong><a href="#">abc@gmail.com</a></li>
                </ul>


            </div>

        </div>


    </section>

</div>