<?php 

function TinMoiNhat_MotTin() {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            ORDER BY idTin DESC
            LIMIT 0,1
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);
    //echo gettype($result),"\n";
    //echo $result ? 'true' : 'false';

    return $result;
}

function TinMoiNhat_BonTin() {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            ORDER BY idTin DESC
            LIMIT 1,6
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function TinXemNhieuNhat() {
    $conn = myConnect();
    $qr = "
            SELECT *FROM tin
            ORDER BY SoLanXem DESC
            LIMIT 0,6
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);
    
    return $result;    
}

function TinMoiNhat_TheoLoaiTin_MotTin($idLT) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE idLT = $idLT
            ORDER BY idTin DESC
            LIMIT 0,1
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);
    //echo gettype($result),"\n";
    //echo $result ? 'true' : 'false';

    return $result;
}

function TinMoiNhat_TheoLoaiTin_BonTin($idLT) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE idLT = $idLT
            ORDER BY idTin DESC
            LIMIT 1,6
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function TenLoaiTin($idLT) {
    $conn = myConnect();
    $qr = "
            SELECT Ten  
            FROM loaitin
            WHERE idLT = '$idLT'
    ";
    mysqli_set_charset($conn, 'utf8');
    $loaitin = mysqli_query($conn, $qr);
    $row =  mysqli_fetch_array($loaitin);
    
    return $row['Ten'];
}

function QuangCao($vitri) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM quangcao
            WHERE vitri = '$vitri' 
    ";
    $result = mysqli_query($conn, $qr);

    return $result;
}

function DanhSachTheLoai() {
    $conn = myConnect();
    $qr = "
            SELECT * FROM theloai
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function DanhSachLoaiTin_Theo_TheLoai($idTL) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM loaitin
            WHERE idTL = '$idTL'
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function TinMoi_BenTrai($idTL) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE idTL = '$idTL'
            ORDER BY idTin DESC
            LIMIT 0,1
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function TinMoi_BenPhai($idTL) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE idTL = '$idTL'
            ORDER BY idTin DESC
            LIMIT 1,2
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function TinTheoLoaiTin($idLT) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE idLT = '$idLT'
            ORDER BY idTin DESC
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function TinTheoLoaiTin_PhanTrang($idLT, $FROM, $sotin1trang) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE idLT = '$idLT'
            ORDER BY idTin DESC
            LIMIT $FROM, $sotin1trang
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function breadCrumb($idLT) {
    $conn = myConnect();
    $qr = "
            SELECT TenTL, Ten
            FROM theloai, loaitin
            WHERE theloai.idTL = loaitin.idTL
            AND idLT = '$idLT'
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function ChiTietTin($idTin) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE idTin = '$idTin'
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function TinCungLoai($idTin, $idLT) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE idTin <> '$idTin'
            AND idLT = '$idLT'
            ORDER BY RAND()
            LIMIT 0,3
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

function CapNhatSoLanXemTin($idTin) {
    $conn = myConnect();
    $qr = "
            UPDATE tin
            SET SoLanXem = SoLanXem + 1
            WHERE idTin = '$idTin'         
    ";
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $qr);
}    

function TimKiem($tukhoa) {
    $conn = myConnect();
    $qr = "
            SELECT * FROM tin
            WHERE TieuDe REGEXP '$tukhoa'
            ORDER BY idTin DESC
    ";
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $qr);

    return $result;
}

?>