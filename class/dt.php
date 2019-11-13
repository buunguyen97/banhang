<?php
require_once "goc.php";

class dt extends goc{
    function Blog($sotin){
        $sql="SELECT idTin, TieuDe, TomTat,urlHinh FROM tin  WHERE AnHien = 1 
   ORDER BY RAND() LIMIT 0,$sotin";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function SanPhamMoi($sosp = 10){
        $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai  WHERE AnHien = 1 
   ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function ListLoaiSP(){
        $sql="SELECT idLoai, TenLoai, hinh FROM loaisp  WHERE AnHien = 1
   ORDER BY ThuTu DESC LIMIT 0,12";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function SanPhamBanChay($sosp = 10){
        $sql="SELECT idDT, TenDT, urlHinh FROM dienthoai WHERE AnHien=1 
   ORDER BY SoLanMua DESC LIMIT 0,$sosp";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function SanPhamHot($sosp = 10){
        $sql="SELECT idDT,TenDT,urlHinh FROM dienthoai 
   WHERE AnHien=1 AND Hot=1 ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function CapNhatGioHang($action, $idDT){
        if ( !isset($_SESSION['daySoLuong']) ) $_SESSION['daySoLuong']=array();
        if ( !isset($_SESSION['dayDonGia']) )  $_SESSION['dayDonGia']=array();
        if ( !isset($_SESSION['dayTenDT']) )   $_SESSION['dayTenDT']=array();

        if ($action=="add") {
            settype($idDT,"int"); if ($idDT<=0) return;
            $sql="SELECT TenDT,Gia,SoLuongTonKho FROM dienthoai WHERE idDT=$idDT";
            $kq = $this->db->query($sql);
            if(!$kq) die( $this-> db->error);
            $row = $kq->fetch_assoc();

            $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
            $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
            $_SESSION['daySoLuong'][$idDT]+=1;

            if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];
        }//add

        if ($action=="remove") {
            settype($idDT,"int"); if ($idDT<=0) return;
            unset($_SESSION['dayTenDT'][$idDT]);
            unset($_SESSION['dayDonGia'][$idDT]);
            unset($_SESSION['daySoLuong'][$idDT]);
        } //remove
        if ($action=="update"){
            $iddt_arr = $_POST['iddt_arr'];
            $soluong_arr = $_POST['soluong_arr'];
            for($i=0; $i<count($iddt_arr);$i++){
                $idDT = $iddt_arr[$i]; settype($idDT,"int"); if ($idDT<=0) continue;
                $soluong=$soluong_arr[$i];settype($soluong,"int");
                if ($soluong<=0) continue;
                $kq = $this->chiTietSP($idDT);
                $row = $kq->fetch_assoc();
                $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
                $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
                $_SESSION['daySoLuong'][$idDT] = $soluong;
                if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];

            } //for
        } //update

    }// function capnhatgiohang
    function chiTietSP($idDT){
        $sql="SELECT * FROM dienthoai WHERE AnHien = 1 AND idDT=$idDT";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }

}//dt
?>
