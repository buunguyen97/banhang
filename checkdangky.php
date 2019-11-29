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
    if ($capcode != $cap) {
        echo "mật khẩu không đúng";
        exit();
    } else {
        $t->DangKyThanhVien($email, $pass, $ht, $dc, $dt, $p);
        $data = ['result' => 'co'];

    }
    header('Content-Type: application/json');
    echo json_encode($data);


?>
