<?php
session_start();
require_once "class/dt.php";
$t = new dt();
$passcu =md5($_POST['passcu']);
$passmoi =md5($_POST['passmoi']);
$pass = $t->Laypass($_SESSION['login_id']);
$id = $_SESSION['login_id'];
if ($passcu == $pass['Password']){
    $t->Doipass($passmoi,$id);
    echo "ok";

}else{
    echo "ko";
    return false;
}
?>