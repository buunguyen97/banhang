<?php
$loi = array();
$loi_str="";
if (isset($_POST['mail'])){
    $thanhcong = $dt->DangKyThanhVien($loi);
    if ($thanhcong==true) {
        echo "<script>document.location='main.php?p=dangkytc';</script>";
        exit();
    }
    else foreach($loi as $s) $loi_str = $loi_str . $s . "<br/>";
}

?>
