<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #6e98c5ff;
            color: white;
        }

    </style>
</head>
<body>
    <?php
        include '../Admin/connect.php';

        $tu_khoa = $_GET['tu_khoa'] ?? '';

        $sql = "SELECT * FROM san_pham WHERE ten_sp LIKE '%$tu_khoa%'";
        $result = mysqli_query($conn, $sql);
    ?>

<h2>Kết quả tìm kiếm</h2>

<table border="1">
    <tr>
        <th>Tên sản phẩm</th>
        <th>Giá bán</th>
        <th>Mô tả</th>
        <th>Ảnh</th>
        <th>Thương hiệu</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['ten_sp']; ?></td>
            <td><?php echo number_format($row['gia_ban']); ?> đ</td>
            <td><?php echo $row['mo_ta']; ?></td>
            <td><img src="<?php echo $row['avatar_path']; ?>" width="100"></td>
            <td><?php echo $row['thuong_hieu']; ?></td>
        </tr>
<?php } ?>

</table>

</body>
</html>

