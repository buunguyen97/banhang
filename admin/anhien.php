<?php
require_once "../class/quantri.php";
$qt =new quantri();
$giatri =$_POST['ketqua'];
$idDT= $_POST['idDT'];
if($giatri == 'true'){
    $AnHien=1;
    $ketqua = $qt->AnHien($idDT,$AnHien);
    if($ketqua==true){
        echo "đang hiện";
    }else{
        echo "lỗi";
    }
}else if($giatri == 'false'){
    $AnHien=0;
    $ketqua = $qt->AnHien($idDT,$AnHien);
    if($ketqua==true){
        echo "đang ẩn";
    }else{
        echo "lỗi";
    }
}else{
    echo "error";
}
?>