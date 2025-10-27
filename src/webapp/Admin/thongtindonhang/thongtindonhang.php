<?php
include('../Admin/connect.php');

$sql = "SELECT 
            dh.id AS ma_don_hang,
            dh.ten_nguoi_nhan,
            dh.sdt,
            dh.dia_chi,
            dh.tong_tien,
            dh.ngay_dat,
            dh.trang_thai,
            sp.ten_sp,
            sp.avatar_path
        FROM don_hang AS dh
        JOIN chi_tiet_don_hang AS ct ON dh.id = ct.id_don_hang
        JOIN san_pham AS sp ON ct.id_san_pham = sp.id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách đơn hàng</title>
    <style>
        body {
            background-color: #f6f8fa;
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }


        h2 {
            margin-bottom: 20px;           
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Danh sách đơn hàng</h2>
    <table>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên người nhận</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Trạng thái</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['ma_don_hang']; ?></td>
            <td><?php echo htmlspecialchars($row['ten_nguoi_nhan']); ?></td>
            <td><?php echo htmlspecialchars($row['sdt']); ?></td>
            <td><?php echo htmlspecialchars($row['dia_chi']); ?></td>
            <td><?php echo number_format($row['tong_tien']); ?>đ</td>
            <td><?php echo $row['ngay_dat']; ?></td>
            <td><?php echo $row['ten_sp']; ?></td>
            <td><img src="<?php echo $row['avatar_path']; ?>" width="80" height="80" alt="Ảnh SP"></td>
            <td style="color: <?php echo $row['trang_thai'] == 1 ? 'green' : 'red'; ?>">
                <?php echo ($row['trang_thai'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'); ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
