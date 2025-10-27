<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
.sanpham img {
  max-width: 230px;
}
.noidungnoibat {
 height:230px;
}
.sanpham {
  float: left;
  margin: 10px 15px;
  width: 18%;
  background-color: rgba(0, 0, 0, 0.1);
  border-radius: 5px;
}
.sanpham td {
  list-style-type: none;
  margin: auto;
  display: flex;
  justify-content: center;
}
.sanpham a {
  text-decoration: none;
  color: black;
  font-weight: bold;
}
.anh {
  text-align: center;
  height: 260px;
}
.ten{
  width:16%;
  height: 40px
}
.gia{
  height: 40px
}
.themsp {
  height: 60px;
  text-align: center;

}
button{
  background-color: rgb(255, 0, 0);
  padding: 8px;
  border: none;
  border-radius: 4px;
}
    </style>
    <title>Dienthoai</title>
</head>
<body>
    <div class="mainnoibat" width="1920px ">
                <div class="tieudesanpham" style="text-align: center;">
                    <hr>
                    <span><h1> PHỤ KIỆN </h1></span>
                    <hr>
                </div>
           <div class="noidungnoibat" >
                    <?php
                $sql = "SELECT * FROM `san_pham` WHERE loai_san_pham = 'Phụ kiện'";
                $result = mysqli_query($conn, $sql);
        
                while($row = mysqli_fetch_array($result)){
            ?>
            <table class="sanpham" style="text-align: center;">
                <tr class="anh"><th><a href="home.php?page_layout=chitietsp&id=<?php echo $row['id']; ?>"><img src="../Admin/<?php echo $row['avatar_path'];?>"></a></th></tr>
                <tr class="ten"><td><a href="home.php?page_layout=chitietsp&id=<?php echo $row['id']; ?>"><?php echo $row['ten_sp']; ?></a></td></tr>
                <tr class="gia"><td><p><?php echo $row['gia_ban']; ?> đ</p></td></tr>
                <tr class="themsp"><td >
                  <a href="giohang.php?page_layout=giohang&action=add&id=<?php echo $row['id']; ?>"><button>THÊM VÀO GIỎ HÀNG </button></a>  </td>
                </tr></table>
            <?php
                }
            ?>
</body>
</html>