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
        $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai WHERE AnHien=1 
   ORDER BY SoLanMua DESC LIMIT 0,$sosp";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function SanPhamHot($sosp = 10){
        $sql="SELECT idDT,TenDT,urlHinh,Gia FROM dienthoai 
   WHERE AnHien=1 AND Hot=1 ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function CapNhatGioHang($action, $idDT){
        if ( !isset($_SESSION['daySoLuong']) ) $_SESSION['daySoLuong']=array();
        if ( !isset($_SESSION['dayDonGia']) )  $_SESSION['dayDonGia']=array();
        if ( !isset($_SESSION['dayTenDT']) )   $_SESSION['dayTenDT']=array();
        if ( !isset($_SESSION['hinh']) )   $_SESSION['hinh']=array();
        if ( !isset($_SESSION['giamgia']) )   $_SESSION['giamgia']=array();
        if ($action=="add") {
            settype($idDT,"int"); if ($idDT<=0) return;
            $sql="SELECT TenDT,Gia,SoLuongTonKho,urlHinh,GiaKM FROM dienthoai WHERE idDT=$idDT";
            $kq = $this->db->query($sql);
            if(!$kq) die( $this-> db->error);
            $row = $kq->fetch_assoc();

            $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
            $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
            $_SESSION['hinh'][$idDT] = $row['urlHinh'];
            $_SESSION['giamgia'][$idDT] = $row['GiaKM'];
            $_SESSION['daySoLuong'][$idDT]+=1;

            if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];
        }//add

        if ($action=="remove") {
            settype($idDT,"int"); if ($idDT<=0) return;
            unset($_SESSION['dayTenDT'][$idDT]);
            unset($_SESSION['dayDonGia'][$idDT]);
            unset($_SESSION['daySoLuong'][$idDT]);
            unset($_SESSION['hinh'][$idDT]);
            unset($_SESSION['giamgia'][$idDT]);
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
                $_SESSION['giamgia'][$idDT] = $row['GiaKM'];
                $_SESSION['hinh'][$idDT] = $row['urlHinh'];
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
    function LuuDonHang($hoten,$diachi,$dienthoai,$pttt,$ptgh){

        //lưu dữ liệu vào db
        if (isset($_SESSION['DonHang']['idDH'])==false) {
            $sql="INSERT INTO donhang SET tennguoinhan = '$hoten',diachi =
     '$diachi', dtnguoinhan = '$dienthoai',	idpttt = '$pttt',idptgh=
     '$ptgh',TongTien=123,Tax=1,Shipping=1, thoidiemdathang = now() ";
            $kq = $this->db->query($sql);
            if(!$kq) die( $this-> db->error);
            $_SESSION['DonHang']['idDH'] = $this->db->insert_id;

        }else{
            $idDH = $_SESSION['DonHang']['idDH'];
            $sql="UPDATE donhang SET tennguoinhan = '$hoten',diachi= 
     '$diachi', dtnguoinhan = '$dienthoai', idpttt='$pttt',idptgh=
     '$ptgh',TongTien=123,Tax=1,Shipping=1, thoidiemdathang = now() 
	WHERE idDH = $idDH";
            $kq = $this->db->query($sql) ;
            if(!$kq) die( $this-> db->error);
        }

    } //function LuuDonHang
    function LuuChiTietDonHang(){
        $sosp = count($_SESSION['daySoLuong']);
        if ($sosp<=0) {echo "Không có sản phẩm"; return;}
        if (isset($_SESSION['DonHang']['idDH'])==false){echo "Kô có idDH"; return;}
        $idDH = $_SESSION['DonHang']['idDH'];
        $sql = "DELETE FROM donhangchitiet WHERE idDH = $idDH";
        $this->db->query($sql);
        reset( $_SESSION['daySoLuong'] );
        reset( $_SESSION['dayDonGia'] );
        reset( $_SESSION['dayTenDT'] );
        for ($i = 0; $i<$sosp ; $i++) {
            $idDT = key( $_SESSION['daySoLuong'] );
            $tendt = current( $_SESSION['dayTenDT'] );
            $soluong = current( $_SESSION['daySoLuong'] );
            $gia = current( $_SESSION['dayDonGia'] );
            $sql ="INSERT INTO donhangchitiet (idDH,idDT,TenDT,SoLuong,Gia)
              VALUES ($idDH, $idDT, '$tendt',$soluong, $gia)";
            $this->db->query($sql);
            next( $_SESSION['daySoLuong'] );
            next( $_SESSION['dayDonGia'] );
            next( $_SESSION['dayTenDT'] );
        }//for
    }//function LuuChiTietDonHang

    function SanPhamTrongLoai($TenLoai,$pageNum, $pageSize,&$totalRows ){
        $TenLoai = $this->db->escape_string($TenLoai);
        $startRow = ($pageNum-1)*$pageSize;
        $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai  WHERE AnHien = 1
   AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai') 
   ORDER BY NgayCapNhat DESC LIMIT $startRow , $pageSize ";
        $kq = $this->db-> query($sql);
        if(!$kq) die( $this-> db->error);

        $sql="SELECT count(*) FROM dienthoai WHERE AnHien = 1 
   AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai')";
        $rs = $this->db->query($sql) ;
        $row_rs = $rs->fetch_row();
        $totalRows = $row_rs[0];
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function pagesList1($baseURL,$totalRows,$pageNum,$pageSize,$offset){
        if ($totalRows<=0) return "";
        $totalPages = ceil($totalRows/$pageSize);
        if ($totalPages<=1) return "";
        $from = $pageNum - $offset;
        $to = $pageNum + $offset;
        if ($from <=0) { $from = 1;   $to = $offset*2; }
        if ($to > $totalPages) { $to = $totalPages; }
        $links = "<ul class='pagination'>";
        for($j = $from; $j <= $to; $j++) {
            if ($j==$pageNum)
                $links=$links."<li><a href='$baseURL/$j/' class=active>$j</a></li>";
            else
                $links= $links."<li><a href = '$baseURL/$j/'>$j</a></li>";
        } //for
        $links= $links."</ul>";
        return $links;
    } // function pagesList1
    function layHinhSP($idDT, $sohinh){
        $sql="SELECT urlHinh FROM hinh  WHERE AnHien = 1 AND
         idDT=$idDT LIMIT 0, $sohinh";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function LayDTngaunhien($idLoai){
        $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai WHERE AnHien = 1 AND idLoai =$idLoai LIMIT 0,3  ";
        $kq = $this->db-> query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function GuiMail($to, $from, $from_name, $subject, $body, $username, $password, &$error){
        $error="";
        require_once "class/class.phpmailer.php";
        require_once "class/class.smtp.php";
        try {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;  //  1=errors and messages, 2=messages only
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->SetFrom($from, $from_name);
            $mail->Subject = $subject;
            $mail->MsgHTML($body);// noi dung chinh cua mail
            $mail->AddAddress($to);
            $mail->CharSet="utf-8";
            $mail->IsHTML(true);
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ));
            if(!$mail->Send()) {$error='Loi:'.$mail->ErrorInfo; return false;}
            else { $error = ''; return true; }
        }
        catch (phpmailerException $e) { echo "<pre>".$e->errorMessage(); }
    }//function
    function DangKyThanhVien($email,$pass,$ht,$dc,$dt,$p){

            $mahoa = md5($pass);
             $rd = md5(rand(1,99999));
             $random = strtoupper(substr($rd,0,6));
            $sql = "INSERT INTO  users  
             SET email='$email', password= '$mahoa', hoten='$ht', diachi='$dc', 
                 dienthoai='$dt',gioitinh=$p,active=0,randomkey='$random',  ngaydangky=NOW()";
            $kq = $this->db->query($sql) ;
            if(!$kq) die( $this-> db->error);
            return $kq;

    }//DangKyThanhVien
    function CheckEmail($email){
        $sql="select idUser from users where email ='{$email}'";
        $kq = $this->db->query($sql);
        if ($kq->num_rows>0) return false;
        else return true;
    }
    function LayMaKH($email){
        $sql="select randomkey from users where email ='{$email}'";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        $row = $kq->fetch_assoc();
        return $row;
    }
    function  DanhDauKichHoatUser($rd,$email){
        $sql="UPDATE users SET active=1 WHERE Email ='$email' AND randomkey='$rd' AND active=0";
        $kq = $this->db->query($sql);
        if(!$kq) die( $this-> db->error);
        return $kq;
    }
    function login($email, $p, &$loi){
        $loi=array();
        $email = $this->db->escape_string(trim(strip_tags($email)));
        $p = $this->db->escape_string(trim(strip_tags($p)));
        $p_mahoa = md5($p);

        $sql="SELECT * FROM users WHERE email='$email'";
        $kq = $this->db->query($sql);
        if ($kq->num_rows==0) {
            $loi['mail']="<span class='label label-warning'>Email kô có</span>";
            return FALSE;
        }

        $sql="SELECT * FROM users WHERE email='$email' AND password ='$p_mahoa'";
        $kq = $this->db->query($sql);
        if ($kq->num_rows==0) {
            $loi['pass']="<span class='label label-info'>Mật khẩu kô đúng</span>";
            return FALSE;
        }
        $row = $kq->fetch_assoc();
        $_SESSION['login_id']   = $row['idUser'];
        $_SESSION['login_hoten'] = $row['HoTen'];
        $_SESSION['login_email'] = $row['Email'];
        return TRUE;
    }


}//dt
?>
