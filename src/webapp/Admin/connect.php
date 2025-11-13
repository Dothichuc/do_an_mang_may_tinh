<?php
$servername = "mysql-service";  // tên service trong k8s
$username = "root";
$password = "rootpassword";     // mật khẩu đúng trong secret
$database = "webdienthoai";

// Nếu cần đổi port MySQL, ví dụ 3306 mặc định
// $port = 3306;

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, 
$database /*, $port*/ );

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

?>

