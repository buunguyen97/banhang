<?php
session_start();
require_once "class/dt.php";
$t = new dt();
$data = ['result' => 'khong'];

if (isset($_POST['firstname']) ==true){
    $firstname=htmlentities(trim(strip_tags($_POST['firstname'])),ENT_QUOTES,'utf-8');
    $lastname=htmlentities(trim(strip_tags($_POST['lastname'])),ENT_QUOTES,'utf-8');
    $m=htmlentities(trim(strip_tags($_POST['email'])),ENT_QUOTES,'utf-8');
    $td=htmlentities(trim(strip_tags($_POST['subject'])),ENT_QUOTES,'utf-8');
    $nd=htmlentities(trim(strip_tags($_POST['message'])),ENT_QUOTES,'utf-8');
    $cap=$_POST['cap'];
    $nd= nl2br($nd);
    $loi="";

    if (strlen($nd)<=10 ) {
        $loi="notind";
        echo $loi;
        return false;
    }
    else if ($_SESSION['captcha_code'] != $cap ){
        $loi="noticap";
        echo $loi;
        return false;
    }
    else{
        $to = "buulenguyen@gmail.com";
        $from = "lebuu555@gmail.com";
        $pass = "levkeduzupwfbjjl";
        $topText = "Họ tên: {$firstname} {$lastname}<br>Email: {$m}<br>Tiêu đề: {$td}";
        $nd = $topText . "<br>Nội dung:<hr>" . $nd;
        $error = "";
        $t->GuiMail($to, $from, $fromName = "BQT Bán Hàng", $td, $nd, $from, $pass,$error);
        $data = ['result' => 'co'];

    }

    header('Content-Type: application/json');
    echo json_encode($data);
}
?>

