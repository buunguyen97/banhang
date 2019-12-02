<?php
    session_start();
    require_once "class/dt.php";
    $t = new dt();
    $capcode = $_SESSION['captcha_code'];
    $email =trim(strip_tags($_POST['mail']));
    $pass = trim(strip_tags($_POST['pass']));
    $repass =trim(strip_tags($_POST['repass']));
    $ht = trim(strip_tags($_POST['hoten']));
    $dc = trim(strip_tags($_POST['dc']));
    $dt = trim(strip_tags($_POST['dt']));
    $cap =trim(strip_tags($_POST['capcha']));
    $p = $_POST['phai'];
    settype($phai, "int");
    $loi = array();
    $loi_str = "";
    $data = ['result' => 'khong'];
    if(isset($email)){
        if ($capcode != $cap) {
            $loi="loi";
            echo $loi;
            return false;
        
        } else {
            $t->DangKyThanhVien($email, $pass, $ht, $dc, $dt, $p);
            $ma = $t->LayMaKH($email);
            $rd =$ma['randomkey'];
            $td="Mã kích hoạt";
          // gửi mã kích hoạt
            $to = $email;
            $from = "lebuu555@gmail.com";
            $pass = "levkeduzupwfbjjl";
            $topText = "Họ tên: {$ht} <br>Email: {$email}<br>Tiêu đề: {$td}";
            $nd = $topText . "<br>Nội dung:<hr>" . $rd;
            $error = "";
            $t->GuiMail($to, $from, $fromName = "Mã kích hoạt", $td, $nd, $from, $pass,$error);
            $_SESSION['mailkh']=$email;
             $data = ['result' => 'co'];
    
        }
       
        header('Content-Type: application/json');
        echo json_encode($data);

    }
    
?>
