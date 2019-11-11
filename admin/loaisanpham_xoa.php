<?php
session_start();
require_once "class/quantri.php";
$qt = new quantri;
$qt-> checkLogin();
$idL = $_GET['idL'];
settype($idL,"int");
$kq = $qt->LoaiSP_Xoa($idL);
$_SESSION['success']="Xóa thành công !";
header("location:index.php?p=loaisanpham_ds");