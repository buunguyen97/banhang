<?php
require_once "goc.php";
class quantri extends goc{

    // lấy thông tin user
    function thongtinuser($u, $p){
        $u = $this->db->escape_string($u);
        $p = $this->db->escape_string($p);
        $p = md5($p);
        $sql="SELECT * FROM users WHERE HoTen='$u' AND password ='$p'";
        $kq = $this->db->query($sql);
        if ($kq->num_rows==0) return FALSE;
        else return $kq->fetch_assoc();
    }
    // kiểm tra phần login
    function checkLogin(){
        if (isset($_SESSION['login_id'])== false){
            $_SESSION['error'] = 'Bạn chưa đăng nhập';
            $_SESSION['back'] = $_SERVER['REQUEST_URI'];
            header('location:login.php');
            exit();
        }elseif ($_SESSION['login_level']!=1){
            $_SESSION['error'] = 'Bạn không có quyền xem trang này';
            $_SESSION['back'] = $_SERVER['REQUEST_URI'];
            header('location:login.php');
            exit();
        }
    }//function
    function ListLoaiSP(){
        $sql="SELECT * FROM loaisp";
        $kq = $this->db->query($sql);
        return $kq;
    }
    function ListCL(){
        $sql="SELECT * FROM chungloai";
        $kq = $this->db->query($sql);
        return $kq;
    }
    function changeTitle($str){
        $str = $this->stripUnicode($str);
        $str = $this->stripSpecial($str);
        $str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
        return $str;
    }
    function stripSpecial($str){
        $arr = array(",","$","!","?","&","'",'"',"+");
        $str = str_replace($arr,"",$str);
        $str = trim($str);
        while (strpos($str,"  ")>0) $str = str_replace("  "," ",$str);
        $str = str_replace(" ","-",$str);
        return $str;
    }
    function stripUnicode($str){
        if(!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ','D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị', 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ', 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach($unicode as $khongdau=>$codau) {
            $arr = explode("|",$codau);
            $str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }
    function themloaisp($idCL,$ThuTu,$AnHien,$TenCL,$urlhinh){
        settype($idCL,"int");
        settype($ThuTu,"int");
        settype($AnHien,"int");
        $TenCL = $this->db->escape_string(trim(strip_tags($TenCL)));
        $urlhinh = $this->db->escape_string(trim(strip_tags($urlhinh)));
        $sql = "INSERT INTO loaisp SET idCL='$idCL',ThuTu=$ThuTu, AnHien='$AnHien', TenLoai='$TenCL',hinh='$urlhinh'";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
    }
    function chitietloai_sp($idL){
        settype($idL,"int");
        $sql="SELECT * FROM loaisp where idLoai =$idL ";
        $kq= $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
        $k =  $kq->fetch_assoc();
        return $k;
    }
    function LoaiSP_Xoa($idL){
        settype($idL,"int");
        $sql="DELETE FROM loaisp WHERE idLoai=$idL";
        $kq= $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
    }
    function ThemCL($ThuTu,$AnHien,$TenCL){
        settype($ThuTu,"int");
        settype($AnHien,"int");
        $TenCL = $this->db->escape_string(trim(strip_tags($TenCL)));
        $sql = "INSERT INTO chungloai SET ThuTu=$ThuTu, AnHien='$AnHien', TenCL='$TenCL'";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
    }
    function ChitietCL($idCL){
        settype($idCL,'int');
        $sql="SELECT * FROM chungloai WHERE idCL=$idCL";
        $kq = $this->db->query($sql);
        $k = $kq->fetch_assoc();
        return $k;
    }
    function SuaCL($ThuTu,$AnHien,$TenCL,$idCL){
        settype($idCL,'int');
        settype($ThuTu,"int");
        settype($AnHien,"int");
        $TenCL = $this->db->escape_string(trim(strip_tags($TenCL)));
        $sql = "UPDATE chungloai SET ThuTu=$ThuTu, AnHien='$AnHien', TenCL='$TenCL' WHERE idCL=$idCL";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
    }
    function CL_Xoa($idCL){
        settype($idCL,'int');
        $sql="DELETE FROM chungloai WHERE idCL=$idCL";
        $kq= $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
    }
    function ListDT(){
        $sql="SELECT * FROM dienthoai";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function themDT($TenDT,$urlhinh,$AnHien,$Hot,$Mota,$datepicker,$idL,$idCL,$gia,$giaKM,$tonkho,$LanBan,$NoiDung,$LanXem){
        settype($AnHien,'int');
        settype($ThuTu,"int");
        settype($idL,"int");
        settype($idCL,"int");
        settype($gia,"int");
        settype($giaKM,"int");
        settype($tonkho,"int");
        settype($LanBan,"int");
        settype($LanXem,"int");
        $TenDT = $this->db->escape_string(trim(strip_tags($TenDT)));
        $NoiDung = $this->db->escape_string(trim(strip_tags($NoiDung)));
        $Mota = $this->db->escape_string(trim(strip_tags($Mota)));
        $sql = "INSERT INTO dienthoai SET idCL=$idCL , idLoai =$idL ,TenDT ='$TenDT',MoTa ='$Mota',NgayCapNhat='$datepicker',Gia = '$gia',GiaKM = '$giaKM',urlHinh = '$urlhinh',baiviet = '$NoiDung',SoLanXem = '$LanXem',SoLuongTonKho='$tonkho',SoLanMua='$LanBan', AnHien=$AnHien,Hot=$Hot";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);

    }
    function ChitietDT($idDT){
        settype($idDT,'int');
        $sql="SELECT * FROM dienthoai WHERE idDT=$idDT";
        $kq = $this->db->query($sql);
        $k = $kq->fetch_assoc();
        return $k;
    }
    function capnhatDT($TenDT,$urlhinh,$AnHien,$Hot,$Mota,$datepicker,$idL,$idCL,$gia,$giaKM,$tonkho,$LanBan,$NoiDung,$LanXem,$idDT){
        settype($AnHien,'int');
        settype($ThuTu,"int");
        settype($idL,"int");
        settype($idCL,"int");
        settype($gia,"int");
        settype($giaKM,"int");
        settype($tonkho,"int");
        settype($LanBan,"int");
        settype($LanXem,"int");
        $TenDT = $this->db->escape_string(trim(strip_tags($TenDT)));
        $NoiDung = $this->db->escape_string(trim(strip_tags($NoiDung)));
        $Mota = $this->db->escape_string(trim(strip_tags($Mota)));
        $sql = "UPDATE dienthoai SET idCL=$idCL , idLoai =$idL ,TenDT ='$TenDT',MoTa ='$Mota',NgayCapNhat='$datepicker',Gia = '$gia',GiaKM = '$giaKM',urlHinh = '$urlhinh',baiviet = '$NoiDung',SoLanXem = '$LanXem',SoLuongTonKho='$tonkho',SoLanMua='$LanBan', AnHien=$AnHien,Hot=$Hot
        WHERE idDT= $idDT";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);

    }
    function XoaDT($idDT){
        settype($idDT,'int');
        $sql="DELETE FROM dienthoai WHERE idDT=$idDT";
        $kq= $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
    }
    function AnHien($idDT,$AnHien){
        settype($idDT,'int');
        settype($AnHien,'int');
        $sql = "UPDATE dienthoai SET  AnHien=$AnHien
        WHERE idDT= $idDT";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
}