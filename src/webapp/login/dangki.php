<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Đăng kí</title>
</head>
<body>
    <div class="dangki">
        <div class ="noidungdangki">
            <h1>Đăng kí tài khoản</h1>
          <form action="dangki.php" method="POST">
             <div class="taotaikhoan">
                  <p>Họ và tên* </p><input type="text" name="name" placeholder ="Nhập họ tên của bạn "required> 
             </div>
             <div class="taotaikhoan"><p>Ngày sinh* </p>
                <input type="date" name="ngaysinh" placeholder ="Ngày sinh " required> 
             </div>
             <div class="gioitinh">
              <p>Gioi Tính *</p>
              <div class="chongioitinh">
               <p><input type="radio" name="gioitinh" value="0" /> Nữ</p>
               <p><input type="radio" name="gioitinh" value="1" /> Nam</p>
              </div>
             </div>
             <div class="taotaikhoan"><p>Email đăng kí*</p> 
                <input type="mail" name="email" placeholder ="Nhập mail đăng kí" required> 
             </div>
             <div class="taotaikhoan"><p>Mật khẩu*</p> 
                <input type="password"name="matkhau" placeholder ="Nhập mật khẩu " required> 
             </div>
              <div class="taotaikhoan"><p> Nhập lại mật khẩu*</p> 
                <input type="password"name="nhaplaimatkhau" placeholder ="Nhập lại mật khẩu " required> 
             </div>
             <div class="nutdangki">
                <button type="submit">Đăng kí</button>
             </div>
          </form>
          <?php
            include('../Admin/connect.php');
          if(isset($_POST['name']) //  kiểm tra xem biến có rỗng hay không 
           && isset($_POST['ngaysinh'])
          && isset($_POST['email'])
          && isset($_POST['matkhau'])
          && isset($_POST['nhaplaimatkhau'])){
          $hovaten = $_POST['name'];
          $ngaysinh= $_POST['ngaysinh'];
          $gioitinh=$_POST['gioitinh'];
          $mail= $_POST['email'];
          $matkhau= $_POST['matkhau'];
           $nhaplaimatkhau= $_POST['nhaplaimatkhau'];
          if($matkhau != $nhaplaimatkhau){
              echo "Vui lòng nhập lại mật khẩu";
          }
          else{
            $sql = "INSERT INTO `user_nguoi_dung`( `name`, `nam_sinh`, `email`, `mat_khau`, `gioi_tinh`) VALUES ('$hovaten','$ngaysinh','$mail','$matkhau','$gioitinh')";
            // echo $sql;
            mysqli_query($conn, $sql);
            header('location:dangnhap.php');
          }
          }
         ?> 
    </div>
   </div>
</body>
</html>