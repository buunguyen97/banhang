<?php
session_start();
$loi=array();
$data = ['result' => 'khong'];
$_SESSION['back'] = $_SERVER['REQUEST_URI'];
if (isset($_POST['maildn'])){
    require_once('class/dt.php');
    $dt= new dt;
    $thanhcong = $dt->login($_POST['maildn'], $_POST['passdn'], $loi);
    if ($thanhcong==true) {
        $data = ['result' => 'co'];
    }else{
        $data = ['result' => 'khong'];
    }
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>