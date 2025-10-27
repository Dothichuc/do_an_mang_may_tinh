
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        body {
            background-color: white;
            padding: 40px;
        }

        form {
            width: 600px;
            padding: 30px;
            margin: 0 auto;
            border-radius: 10px;
            
        }

        form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }


        .thanhtoan button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
           
        }

        .thanhtoan button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form action="" method = "post">
        
        <div class="ten">
            <label> Họ tên:</label><br>
            <input type="text" name="ten" required><br>
        </div>

        <div class="sdt">
            <label>Số điện thoại:</label><br>
            <input type="text" name="sdt" required><br>
        </div>
        
        <div class="diachi">
            <label>Địa chỉ giao hàng:</label><br>
            <input type="text" name="dia_chi" required><br>
        </div>
        
        <div class="ghichu">
            <label>Ghi chú:</label><br>
            <textarea name="ghi_chu"></textarea><br>
        </div>

        <div class="thanhtoan">
            <button type="submit" name="thanh_toan">Thanh toán</button>
        </div>

    
    </form>
    <?php
        include '../Admin/connect.php';
        session_start();

        if (isset($_POST['thanh_toan'])) {
            // Lấy thông tin từ form
            $ten_nguoi_nhan = $_POST['ten'];
            $sdt = $_POST['sdt'];
            $dia_chi = $_POST['dia_chi'];
            $ghi_chu = $_POST['ghi_chu'];

            // Tính tổng tiền từ giỏ hàng
            $tong_tien = 0;
            if (!isset($_SESSION['gio_hang']) || count($_SESSION['gio_hang']) == 0) {
                echo "Giỏ hàng trống.";
                exit;
            }

            foreach ($_SESSION['gio_hang'] as $sp) {
                $tong_tien += $sp['gia'] * $sp['so_luong'];;
                

            }
            

            $trang_thai = 1;

            // Thêm đơn hàng
            $sql_donhang = "INSERT INTO don_hang (ten_nguoi_nhan, sdt, dia_chi, ghi_chu, tong_tien, trang_thai)
                            VALUES ('$ten_nguoi_nhan', '$sdt', '$dia_chi', '$ghi_chu', '$tong_tien', '$trang_thai')";
            
            if (mysqli_query($conn, $sql_donhang)) {
                $id_don_hang = mysqli_insert_id($conn);

                // Thêm chi tiết đơn hàng
                $error = false;
                foreach ($_SESSION['gio_hang'] as $sp) {
                    $id_san_pham = $sp['id'];
                    $so_luong = $sp['so_luong'];
                    $don_gia = $sp['gia'];

                    $sql_ct = "INSERT INTO chi_tiet_don_hang (id_don_hang, id_san_pham, so_luong, don_gia)
                            VALUES ('$id_don_hang', '$id_san_pham', '$so_luong', '$don_gia')";

                    if (!mysqli_query($conn, $sql_ct)) {
                        $error = true;
                        break;
                    }
                }

                if ($error) {
                    // Cập nhật trạng thái thất bại
                    $sql_update = "UPDATE don_hang SET trang_thai = 0 WHERE id = $id_don_hang";
                    mysqli_query($conn, $sql_update);
                    echo "<p>Có lỗi khi thêm chi tiết đơn hàng. Đơn hàng bị đánh dấu là thất bại.</p>";
                } else {
                    unset($_SESSION['gio_hang']);
                    echo "<p>Đặt hàng thành công! Tổng tiền: " . number_format($tong_tien) . "đ</p>";
                    
                }
            } else {
                echo "<p>LLỗi khi tạo đơn hàng. Thanh toán không thành công.</p>";
            }


        }
        

    ?>
    <a href="home.php?page_layout=trangchinh">quay lại trang chủ</a>


</body>
</html>

