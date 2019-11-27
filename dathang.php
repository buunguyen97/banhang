<?php
session_start();
require_once "class/dt.php";
$dt =new dt();
if (isset($_SESSION['DonHang'])==false){
    header("location:/banhang/"); exit();
}
$error = [];
$hoten=  $_SESSION['DonHang']['hoten']  ;
$dienthoai =$_SESSION['DonHang']['dienthoai'];
$diachi =$_SESSION['DonHang']['diachi'] ;
$email = $_SESSION['DonHang']['email']  ;
$pttt =  $_SESSION['DonHang']['payment']  ;
$ptgh =  $_SESSION['DonHang']['delivery']  ;

if (count($_SESSION['daySoLuong'])==0){
    $error = "Bạn chưa chọn sản phẩm nào";
}
if ($hoten == ""){
    $error = "Bạn chưa nhập họ tên";
}
if ($diachi == ""){
    $error = "Bạn chưa nhập địa chỉ";
}
if ($email == ""){
    $error = "Bạn chưa nhập email";
}
if ($dienthoai== ""){
    $error = "Bạn ơi! Điện thoại người nhận chưa có";
}
if ($pttt==""){
    $error = "Bạn chưa chọn phương thức thanh toán";
}

if ($ptgh==""){
    $error = "Bạn chưa chọn phương thức giao hàng";
}

if (count($error)==0){
    $dt->LuuDonHang($hoten,$diachi,$dienthoai,$pttt,$ptgh); //lưu thông tin đơn hàng
    $dt->LuuChiTietDonHang(); //lưu các sản phẩm user đã mua
    unset($_SESSION['dayTenDT']);//hủy th.tin đã lưu  trong session
    unset($_SESSION['dayDonGia']);
    unset($_SESSION['daySoLuong']);
    unset($_SESSION['DonHang']);
    unset($_SESSION['TSL']);
}
?>
<div class="container"> <div class="row">
        <div class="col-md-12 clearfix">
            <?php if (count($error)>0){ ?>
                <div class="heading"> <h2>Có lỗi xảy ra</h2> </div>
                <p class="lead" >
                    Có lỗi xảy ra trong quá trình lưu đơn hàng của bạn.<br/><br/>
                    <?php foreach($error as $e) echo $e,"<br>"; ?>
                    <br/><br/> <a href="gio-hang/">Về trang giỏ hàng</a>
                </p>
            <?php } else {?>
                <div class="heading text-center"> <h2>Cảm ơn quý khách</h2> </div>
                <p class="lead" style="width: 730px; margin: 50px auto;">
                    Đơn hàng đã được ghi nhận! Chúng tôi sẽ giao hàng trong thời
                    gian sớm nhất. <br/> Mọi thắc mắc trong quá trình sử dụng,
                    mời liên hệ ngay với chúng tôi trong. <br/>
                    Kính chúc quý khách mạnh khỏe, an lành.<br/><br/>
                    <a href="<?=BASE_URL?>">Về trang chủ</a>
                </p>
            <?php }?>
            <p>&nbsp;</p> <p>&nbsp;</p>
        </div> </div> </div>
