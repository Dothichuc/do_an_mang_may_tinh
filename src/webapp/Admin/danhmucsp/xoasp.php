 <!-- xóa sản phẩm  -->
        <?php
          $id = $_GET['id'];
          $sql="DELETE FROM `san_pham` WHERE id='$id'";
         mysqli_query($conn, $sql);
          header('location:trangadmin.php?page_layout=quanlydanhmuc');
        ?>
