 <!-- xóa sản phẩm  -->
        <?php
          $id = $_GET['id'];
          $sql="DELETE FROM `user_nguoi_dung` WHERE id = '$id'";
         mysqli_query($conn, $sql);
          header('location: trangadmin.php?page_layout=thongtinkhachhang');
        ?>
