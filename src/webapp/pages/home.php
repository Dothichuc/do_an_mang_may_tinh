<?php
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
if (!isset($_SESSION["username"])) {
    header('Location: ../login/dangnhap.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
   * {
    margin: 0;
}
.tieu-de-thanh-tren {
    display: flex;
    justify-content: space-around;
    background-color: black;
    color: white;
    padding: 10px 0 10px 0;
}
.thanh-tren-khuyen-mai {
    font-size: 14px;
}
.thanh-tren-mxh a {
    text-decoration: none;
    color: white;
    margin: 15px;
}
.thanh-tren-mxh a:hover {
    color: red;
}
.dau-trang {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    color: black;
    background: lightblue;
}
.dau-trang-tieu-de {
    margin-left: 100px;
}
.dau-trang-tieu-de .logo {
    margin-left: 180px;
}
.dau-trang-tieu-de .logo img {
    margin-right: 100px;
    margin-top: 4px;
}
.dau-trang-tim-kiem {
    display: flex;
}
.form-tim-kiem {
    margin-left: 100px;
    padding-top: 40px;
    margin-right: 100px;
    display: flex;
}
.form-tim-kiem input {
    width: 380px;
    height: 30px;
    border-radius: 4px;
    padding: 5px;
    background-color: #f5f5f5;
    border: none;
}
.form-tim-kiem button {
    width: 40px;
    background-color: #f5f5f5;
    border-radius: 4px;
    padding: 5px;
}
.dau-trang-phai {
    padding-top: 40px;
}
.dau-trang-phai a {
    text-decoration: none;
    color: black;
}
.dau-trang-phai .dang-nhap {
    margin-right: 30px;
    font-weight: 700;
}
.dieu-huong {
    text-align: center;
    padding: 20px;
}
.dieu-huong a {
    text-decoration: none;
    margin: 30px;
    color: #777777;
    font-weight: 800;
}
.dieu-huong a:hover {
    color: black;
}
.san-pham-chinh1 {
    position: relative;
    margin-right: 30px;
}
.san-pham-chinh1 img {
    width: 100%;
    display: block;
    filter: brightness(80%);
}
.ten-san-pham {
    position: absolute;
    top: 40%;
    left: 33%;
    color: #fff;
    border-radius: 10px;
    text-align: center;
}
.tieu-de-ban-chay {
    text-align: center;
    font-weight: 800;
    font-size: 30px;
}
.san-pham-ban-chay-chinh .dong {
    margin-top: 50px;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-left: 100px;
}
.anh-san-pham-ban-chay {
    width: 250px;
    margin-left: 120px;
    position: relative;
}
.btn.btn-ban-chay {
    margin-left: 140px;
    position: absolute;
}
.thong-tin-ban-chay {
    margin-top: 20px;
    margin-left: 140px;
    text-align: center;
}
.ten-san-pham-ban-chay {
    font-size: 18px;
    font-weight: 500;
    margin-right: 16px;
}
.gia-ban-chay {
    display: flex;
    margin-bottom: 20px;
}
.gia-moi {
    margin-right: 20px;
    font-size: 20px;
}
.btn.them-gio-hang a {
    border-radius: 4px;
    text-decoration: none;
    color: #777777;
    background-color: black;
    padding: 10px 5px;
    margin-right: 10px;
}
.btn.them-gio-hang a:hover {
    color: white;
}

/* Chính sách giao hàng - CẬP NHẬT */
.gird.chinh-sach {
    margin-top: 20px;
    background-color: lightblue;
    padding: 40px 0;
}

.gird.chinh-sach.row {
    display: flex;
    justify-content: center;
}

.gird.chinh-sach .row {
    display: flex;
}

.gird.chinh-sach .col {
    flex: 1;
    padding: 24px 12px;
    text-align: center;
}

/* Đường ngăn cột */
.gird.chinh-sach.col:not(:first-child) {
    border-left: 1px solid #ddd;
}

/* Thay thế các class trùng tên */
.icon-cart-ship {
    text-align: center;
}
.icon-cart-ship i {
    color: #777;
    font-size: 40px;
    margin-bottom: 10px;
}
.tieude-chinhsach {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
    text-align: center;
}
.noidung-chinhsach {
    font-size: 14px;
    color: #333;
    text-align: center;
}
.cot.l-4 {
    margin: 50px;
    padding: 20px;
}

/* Chân trang */
.chan-trang-chinh {
    background: #232323;
    color: #fff;
    padding: 40px 0 20px 0;
    font-size: 16px;
}
.hop-chan-trang {
    max-width: 1200px;
    margin: auto;
    padding: 0 16px;
}
.dong-chan-trang {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 24px;
}
.cot-chan-trang {
    flex: 1;
    min-width: 220px;
    margin-bottom: 24px;
}
.cot-chan-trang h3 {
    font-size: 1.2em;
    margin-bottom: 12px;
    color: white;
}
.cot-chan-trang ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.cot-chan-trang ul li {
    margin-bottom: 8px;
}
.chan-trang-mxh i {
    color: #777777;
}
.chan-trang-mxh a {
    margin-right: 16px;
    font-size: 1.5em;
    text-decoration: none;
    transition: color 0.2s;
}
.chan-trang-mxh a:hover {
    color: #777777;
}
.ban-quyen {
    text-align: center;
    margin-top: 28px;
    color: #bbb;
    font-size: 0.95em;
    border-top: 1px solid #444;
    padding-top: 16px;
}
.icon-tim-kiem {
    width: 40px;
    height: 40px;
}
</style>
<div class="bao">
    <div class="tieu-de">
        <div class="bao-tieu-de">
            <div class="thanh-tren">
                <div class="tieu-de-thanh-tren">
                    <div class="thanh-tren-khuyen-mai" id="khuyenmai">
                        <span> NHẬP MÃ HCA ĐỂ ĐƯỢC GIẢM 0%</span>
                    </div>
                    <div class="thanh-tren-mxh">
                        <a href="#"><i class="fa-solid fa-phone" 0378214103></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
            <div class="dau-trang">
                <div class="dau-trang-tieu-de" style="display: flex;">
                    <!-- logo -->
                    <div class="logo">
                        <a href="#">
                            <img src="img/logo1.png" alt="logo" width="100px">
                        </a>
                    </div>
                    <!-- Tìm kiếm -->
                    <div class="dau-trang-tim-kiem">
                       <div class="hop-tim-kiem">
                            <form action="home.php" method="get" class="form-tim-kiem">
                                <input type="text" name="tu_khoa" placeholder="Tìm kiếm sản phẩm" class="o-nhap-tim-kiem">
                                <input type="hidden" name="page_layout" value="timkiem">
                                <button type="submit" class="icon-tim-kiem">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                    
                   
                    <!-- Phải đầu trang (giỏ hàng, đăng ký, đăng nhập) -->
                    <div class="dau-trang-phai">
                        <div class="hop-phai" style="display: flex; margin-left: 50px ; font-size= 15px " >
                            <!-- Giỏ hàng-->
                            <div class="gio-hang" style="display: flex; margin: 0 20px 0 20px;">
                                <span class="chu-gio-hang" style="margin-right: 10px "><a href="giohang.php">GIỎ HÀNG 
                                </a> </span>
                                
                                <div class="logo-gio-hang">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i>  
                                        <span style="margin-bottom: 20px ;">0</span>
                                    </a>                   
                                </div>
                            </div>
                            <!-- Đăng nhập  -->
                            <div class="dang-nhap">
                                <a href="../login/dangnhap.php"> 
                                     <span> ĐĂNG NHẬP</span>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
                <div class="wide-nav">
                    <div class="dieu-huong">
                        <a href="home.php?page_layout=trangchinh"> TRANG CHỦ</a>
                        <a href="home.php?page_layout=dienthoai"> ĐIỆN THOẠI</a>
                        <a href="home.php?page_layout=maytinhbang"> MÁY TÍNH BẢNG</a>
                        <a href="home.php?page_layout=phukien"> PHỤ KIỆN </a> 
                        <a href="home.php?page_layout=lienhe"> LIÊN HỆ </a>
                    </div>
                </div>
            </div>
        </div>
  </div>
 <?php 
  include('../Admin/connect.php');
 if (isset($_GET['page_layout'])) {
    switch ($_GET['page_layout']) {
        case 'trangchinh':
            include('trangchinh.php');
            break;
        case 'dienthoai':
            include('dienthoai.php');
            break;
        case 'maytinhbang':
            include('maytinhbang.php');
            break;
        case 'phukien':
            include('phukien.php');
            break;
        case 'lienhe':
            include('lienhe.php');
            break;
         case 'chitietsp':
            include('chitietsp.php');
            break;
        case 'giohang':
            include('giohang.php');
            break;
        case 'thanhtoan':
            include('thanhtoan.php');
            break;
        case 'timkiem':
            include('timkiem.php');
            break;
    }
 }
 ?>

</body>
</html>
