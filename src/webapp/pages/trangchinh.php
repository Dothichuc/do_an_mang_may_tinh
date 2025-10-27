<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="trangchinh.css">
    <title>Document</title>
</head>
<body>
        <div class="noi-dung-chinh">
            <!--QUẢNG CÁO  -->
            <div class="quang-cao">
                <img src="img/banner.png" alt="" width="100% " >
            </div>
            <!-- sản phẩm chính -->
            <div class="grid wide">
                <div class="san-pham-chinh" style="display: flex; justify-content: center; margin: 20px ; ">
                    <div class="san-pham-chinh1" style="w" >
                        <a href="home.php?page_layout=dienthoai">
                        <img src="img/dienthoai.webp" alt="" style="height: 200px;  width: 500px ;" >
                        <div class="ten-san-pham">
                            <h3> ĐIỆN THOẠI </h3>
                        </div>
                        </a>
                    </div>
                   <div class="san-pham-chinh1">
                        <a href="home.php?page_layout=maytinhbang">
                        <img src="img/tabled.webp" alt=""  style="height: 200px;  width: 500px ;">
                        <div class="ten-san-pham " >
                            <h3> MÁY TÍNH BẢNG</h3>
                        </div>
                        </a>
                    </div>
                    <div class="san-pham-chinh1">
                        <a href="home.php?page_layout=phukien">
                        <img src="img/tainghe.jpg"  style="height: 200px;  width: 500px ;">
                        <div class="ten-san-pham">
                            <h3> PHỤ KIỆN  </h3>
                        </div>
                        </a>
                    </div>
                </div>
            </div>   
                  
        </div>
        <!-- sản phẩm nổi bật -->
            <div class="mainnoibat" width="1920px ">
                <div class="tieudesanpham" style="text-align: center;">
                    <hr>
                    <span> <h1 >SẢN PHẨM NỔI BẬT </h1></span>
                    <hr>
                </div>
                <div class="noidungnoibat" >
                    <?php
                $sql = "SELECT * FROM san_pham WHERE noi_bat = TRUE LIMIT 5;";
                $result = mysqli_query($conn, $sql);
        
                while($row = mysqli_fetch_array($result)){
            ?>
            <table class="sanpham"  style="text-align: center;">
                <tr><th><a href="home.php?page_layout=chitietsp&id=<?php echo $row['id']; ?>"><img src="../Admin/<?php echo $row['avatar_path'];?>"></a></th></tr>
                <div class="tenvagia"  style="margin-top: 20px;">
                    <tr><td><a href="home.php?page_layout=chitietsp&id=<?php echo $row['id']; ?>"><?php echo $row['ten_sp']; ?></td></tr></a>
                    <tr><td><?php echo $row['gia_ban']; ?></td></tr>
                 </div>
                    <tr><td class="themsp"><a href="giohang.php?page_layout=giohang&action=add&id=<?php echo $row['id']; ?>">
                                        <button class="them-gio-hang"> THÊM VÀO GIỎ HÀNG </button>
                    </a></td></tr>
                     </table>
            <?php
                }
            ?>
     </div>
           
    </div>
     <!-- Danh mục sản phẩm-->
            <div class="gird chinh-sach">
                <div class="row">
                    <div class="col l-4 ">
                        <div class="icon-cart-ship">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <div class="tieude-chinhsach">
                            <span> Giao hàng toàn quốc </span>
                        </div>
                        <div class="noidung-chinhsach">
                           <span>Ship CODE toàn quốc . Nhận hàng trong <br> vòng 2-3 ngày </span> 
                        </div>
                    </div>
                    <div class="col l-4 ">
                        <div class="icon-cart-ship">
                            <i class="fa-solid fa-arrow-rotate-left" ></i>
                        </div>
                        <div class="tieude-chinhsach">
                            <span> Hoàn trả miễn phí</span>
                        </div>
                        <div class="noidung-chinhsach">
                           <span>Xem hàng trước khi nhận. Hoàn trả<br> miễn phí nếu không hài lòng</span>
                        </div>
                    </div>
                    <div class="col l-4 ">
                        <div class="icon-cart-ship">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <div class="tieude-chinhsach">
                            <span> Bảo hành 1 năm</span>
                        </div>
                        <div class="noidung-chinhsach">
                            <span> Bảo hành 1 năm. Lỗi 1 đổi 1 tất cả các<br> sản phẩm của Apple</span>
                        </div>
                    </div>
                </div>
            </div>
              <!-- Chân trang -->
<div class="chan-trang-chinh">
    <div class="hop-chan-trang">
        <div class="dong-chan-trang">
            <!-- Cột 1: Về chúng tôi -->
            <div class="cot-chan-trang">
                <h3>Về chúng tôi</h3>
                <p>Cửa hàng Apple - Uy tín, chất lượng, giá tốt.</p>
            </div>

            <!-- Cột 2: Thông tin liên hệ -->
            <div class="cot-chan-trang">
                <h3>Thông tin liên hệ</h3>
                <ul>
                    <li>Địa chỉ: 56/2/3 Lê Văn Hiến - BTL - Hà Nội</li>
                    <li>Điện thoại: 0123 456 789</li>
                    <li>Email: haconganh1424@gmail.com</li>
                </ul>
            </div>

            <!-- Cột 3: Kết nối với chúng tôi -->
            <div class="cot-chan-trang">
                <h3>Kết nối với chúng tôi</h3>
                <div class="chan-trang-mxh">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
         </div>

         <!-- Bản quyền -->
         <div class="ban-quyen">
            &copy; Nhóm 01
         </div>
    </div>
</div>
           
</body>
</html>