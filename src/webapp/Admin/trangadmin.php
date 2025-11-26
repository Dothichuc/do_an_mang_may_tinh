<?php
session_start(); // phải đứng đầu, trước mọi output

if(!isset($_SESSION["username"])){
    header('location:loginadmin.php');
    exit; // luôn dùng exit sau header
}

include('connect.php');

if (isset($_GET['page_layout'])){
    switch ($_GET['page_layout']){
        case 'quanlydanhmuc':
            include ('danhmucsp/quanlydanhmuc.php');
            break;
        case 'thongtinkhachhang':
            include ('thongtinkhachhang/thongtinkhachhang.php');
            break;
        case 'thongtindonhang':
            include ('thongtindonhang/thongtindonhang.php');
            break;
        case 'xulyxoa':
            include ('thongtinkhachhang/xulyxoa.php');
            break;
        case 'themsanpham':
            include ('danhmucsp/themsanpham.php');
            break;
        case 'xoasp':
            include ('danhmucsp/xoasp.php');
            break;
        case 'suasp':
            include ('danhmucsp/suasp.php');
            break;
        case 'sanphamnoibat':
            include ('sanphamnoibat/sanphamnoibat.php');
            break;
        case 'capnhatnoibat':
            include ('sanphamnoibat/capnhatnoibat.php');
            break;
        case 'dangxuat':
            session_destroy();
            session_unset();
            header('location:loginadmin.php');
            exit;
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css" />
    <title>Admin</title>
  </head>
  <body>
    <div class="Sidebar">
      <div class="Sidebar1">
          <a href="trangadmin.php?page_layout=quanlydanhmuc">Danh mục sản phẩm</a>
          <a href="trangadmin.php?page_layout=sanphamnoibat">Sản phảm nổi bật</a>
          <a href="trangadmin.php?page_layout=thongtinkhachhang">Thông tin khách hàng</a>
          <a href="trangadmin.php?page_layout=thongtindonhang">Thông tin đơn hàng</a>
      </div>
      <div class="Sidebar2">
          <a href="trangadmin.php?page_layout=dangxuat">Đăng xuất</a>
      </div>
    </div>
  </body>
</html>
