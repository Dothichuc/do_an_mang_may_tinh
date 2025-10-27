<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chitietsp.css">
    <title>Document</title>
</head>
 <?php
        include ('../Admin/connect.php');
        $id = $_GET['id'];
        $sql="SELECT * FROM `san_pham` WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
     ?>
<body>
    <div class="trangchinh">
        <div class="main1">
            <div class="anh"><img src="../Admin/<?php echo $row['avatar_path'];?>"></div>
            <table class="noidungmota">
                <tr><th class="thanhtt">Thông tin sản phẩm</th></tr>
                <tr><td><?php echo $row['mo_ta']; ?></td></tr>
            </table>
        </div>
        <div class="main2">
            <div class="tenvagia">
                <div class="ten"><?php echo $row['ten_sp']; ?></div>
               <div class="giasp">
                 <span>Giá bán :</span>
                 <div class="gia">
                     <?php echo $row['gia_ban']; ?> đ
                 </div>
               </div>
                 <div class="nutmuahang"><a href="giohang.php?page_layout=giohang&action=add&id=<?php echo $row['id']; ?>">THÊM VÀO GIỎ HÀNG</a></div>
            </div>
            <div class="quangcao">
                <div class="anhquangcao"></div>
                <div class="videoquangcao"><?php echo $row['quang_cao'];?></div>
            </div>
        </div>

    </div>
</body>
</html>