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
            $sql="SELECT TenDT,Gia,SoLuongTonKho,urlHinh,giaKM FROM dienthoai WHERE idDT=$idDT";
            $kq = $this->db->query($sql);
            if(!$kq) die( $this-> db->error);
            $row = $kq->fetch_assoc();

            $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
            $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
            $_SESSION['hinh'][$idDT] = $row['urlHinh'];
            $_SESSION['giamgia'][$idDT] = $row['giaKM'];
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
                $_SESSION['giamgia'][$idDT] = $row['giaKM'];
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

}//dt
?>
