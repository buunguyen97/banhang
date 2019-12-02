<?php
session_start();
require_once "class/dt.php";
$t = new dt();
$ma =$_POST['makh'];
$email =$_SESSION['mailkh'];
$makh = $t->LayMaKH($email);
$rd =$makh['randomkey'];
$data = ['result' => 'khong'];
if(isset($ma)){
    if($ma== ""){
        $loi="error";
        echo $loi;
    }else if($rd == $ma){
        $t-> DanhDauKichHoatUser($rd,$email);
        unset($_SESSION['mailkh']);
        $data = ['result' => 'co'];

    }else{
        $loi = "loi";
        echo $loi;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
}


?>