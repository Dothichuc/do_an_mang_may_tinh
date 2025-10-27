<?php
session_start();
include ('../Admin/connect.php');

// Xóa sp
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove'])) {
    $index = $_POST['remove'];
    if (isset($_SESSION['gio_hang'][$index])) {
        unset($_SESSION['gio_hang'][$index]);
        $_SESSION['gio_hang'] = array_values($_SESSION['gio_hang']);
    }
    header("Location: giohang.php");
    exit();
}

// thêm vào giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM san_pham WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
    if ($product) {
        $item = [
            'id' => $product['id'],
            'ten_sp' => $product['ten_sp'],
            'gia' => $product['gia_ban'],
            'avatar_path' => '../Admin/' . $product['avatar_path'],
            'so_luong' => 1
        ];

        if (!isset($_SESSION['gio_hang'])) {
            $_SESSION['gio_hang'] = [];
        }
        $found = false;
        foreach ($_SESSION['gio_hang'] as $i => $sp) {
            if ($sp['id'] === $item['id']) {
                $_SESSION['gio_hang'][$i]['so_luong'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['gio_hang'][] = $item;
        }
    }
    header("Location: giohang.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <link rel="stylesheet" href="giohang.css">
   <?php include 'home.php'; ?>
</head>
<body>
<h2 class="tit_giohang">Giỏ hàng</h2>

<form method="post" class="hc_giohang">
    <?php
        $total = 0;
        if (!empty($_SESSION['gio_hang'])):
            foreach ($_SESSION['gio_hang'] as $index => $item):                
                $item_total = intval($item['gia']) * intval($item['so_luong']);
                $total += $item_total;
    ?>
    <!-- hiển thị sản phẩm -->
    <div class="ghc">
        <div class="giohang_trai">
            <img src="<?= htmlspecialchars($item['avatar_path']) ?>" alt="Ảnh sản phẩm">
            
            <?php $item_total = intval($item['gia']) * intval($item['so_luong']); ?>
            <div class="thongtin_sp">                
                <p class="gia_sp"><?= number_format((float)$item['gia'], 0, '.', ',') ?>₫</p>
                <p class="soluong">Số lượng: <?= $item['so_luong'] ?></p>

            </div>
        </div>
        <div class="giohang_phai">
            <p class="gia_sp_phai"><?= number_format($item_total, 0, ',', '.') ?>₫</p>
            <button type="submit" name="remove" value="<?= $index ?>" class="xoa_sp">xóa</button>
        </div>
    </div>
    <?php endforeach; ?>
    
    <div class="tam_tinh">
        <p><strong>Tạm tính:</strong> <?= number_format($total, 0, ',', '.') ?>₫</p>
    </div>
    <div class="hoatdong_xoa">
        <button type="submit" name="remove" value="<?= $index ?>" class="xoa_sp">Xóa Giỏ Hàng</button>
        <a href="thanhtoan.php" class="thanh_toan">Thanh toán</a>
    </div>
    <?php else: ?>
    <p class="giohang_trong"> Giỏ hàng trống. </p>
    <?php endif; ?>
</form>

</body>
</html>
