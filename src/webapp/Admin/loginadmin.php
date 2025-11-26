<?php
session_start();
include('connect.php');

$error = "";

// Xử lý đăng nhập trước khi xuất HTML
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user_admin` WHERE tai_khoan='$username' AND mat_khau='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["username"] = $username;
        header('Location: trangadmin.php?page_layout=quanlydanhmuc');
        exit;
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="loginadmin.css"/>
    <title>Đăng Nhập</title>
  </head>
  <body>
    <div class="dangnhap">
      <div class="noidungdangnhap">
        <h1>Admin</h1>
        <form action="loginadmin.php" method="post">
          <div class="taikhoan">
            <p>Tài khoản*</p>
            <input
              type="mail"
              name="username"
              placeholder="Nhập mail của bạn "
              require
            />
            <p>Mật khẩu*</p>
            <input
              type="password"
              name="password"
              placeholder="Nhập mật khẩu của bạn  "
            />
          </div>
          <div class="nutdangnhap">
            <button type="submit">Đăng nhập</button>
          </div>
        </form>
        <?php 
          // Hiển thị lỗi
          if(!empty($error)) {
              echo '<p style="color:red;">'.$error.'</p>';
          }
        ?>
      </div>
    </div>
  </body>
</html>

