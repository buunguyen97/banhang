<?php
session_start();
require_once "../class/quantri.php";
$qt = new quantri;
$qt-> checkLogin();
$idDT = $_GET['idDT'];
settype($idDT,"int");
$kq = $qt->XoaDT($idDT);
$_SESSION['success']="Xóa thành công !";
echo $idDT;
header("location:index.php?p=dienthoai_ds");