<?php
session_start();  // bắt buộc phải ở đầu file, trước HTML

include('webapp/Admin/connect.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql= "SELECT * FROM `user_nguoi_dung` where email ='$username' and mat_khau ='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $_SESSION["username"] = $username;
        header('location:../pages/home.php?page_layout=trangchinh');
        exit(); // đảm bảo script dừng sau redirect
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không chính xác";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Đăng Nhập</title>
</head>
<body>
    <div class="dangnhap">
        <div class="noidungdangnhap">
            <h1> Đăng nhập</h1>
            <form action="dangnhap.php" method="post">
               <div class="taikhoan">
                 <p>Tài khoản*</p>
                 <input type="mail" name="username" placeholder="Nhập mail của bạn " required>
                 <p>Mật khẩu* </p>
                 <input type="password" name="password" placeholder="Nhập mật khẩu của bạn">
               </div>
               <div class="nutdangnhap">
                 <button type="submit">Đăng nhập</button>
               </div>
            </form>
            <p class="taotaikhoan">Bạn chưa có tài khoản ? <a href="dangki.php">Đăng kí </a></p>
        </div>
    </div>
</body>
</html>

