<?php
require_once "class/dt.php";
$dt = new dt;
$email =$_POST['mail'];
if ($email == NULL){

    $loi= 1;
    echo $loi;
}
elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) {

    $loi=2;
    echo $loi;
}elseif ($dt->CheckEmail($email)==false) {
    $thanhcong = false;
    $loi= 3;
    echo $loi;
}else{
    echo "ok";
}


?>