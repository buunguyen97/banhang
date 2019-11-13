<?php
session_start();
require_once "../class/quantri.php";
$qt = new quantri;
$qt-> checkLogin();
$idCL = $_GET['idCL'];
settype($idCL,"int");
$kq = $qt->CL_Xoa($idCL);
$_SESSION['success']="Xóa thành công !";
header("location:index.php?p=chungloai_ds");