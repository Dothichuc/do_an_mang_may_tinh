<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      body{
       background-color: rgba(49, 47, 47, 0.234);

      }
      .input input{
        width: 98%;
        height: 40px;
        margin: 0 5px;
      }
      textarea{
         width: 98%;
        height: 40px;
        margin: 0 5px;
      }
      div{
        padding: 5px 0;
      }
      button{
        height: 40px;
        width: 120px;
        background-color: rgba(49, 47, 47, 0.4);
        border-radius:4px ;
        border:none ;
      }
      button:active {
        background-color: rgb(92, 130, 152);
      }
    </style>
  </head>
  <body>
    <?php
    include ('connect.php'); // Kết nối CSDL
    $id = $_GET['id']; // Lấy id từ URL (vd: ?id=5)
    $sql = "SELECT * FROM `san_pham` WHERE id = '$id'"; // Tạo câu lệnh SQL
    $result = mysqli_query($conn, $sql); // Thực thi câu lệnh SQL
    $student = mysqli_fetch_assoc($result); // Lấy dữ liệu dưới dạng mảng kết hợp?>
    <?php
    include('connect.php');
    if(isset($_POST['tensp'])
        && isset($_POST['thuonghieu'])
         && isset($_GET['id'])
        
    ){
        $tennsp = $_POST['tensp'];
        $thuonghieu = $_POST['thuonghieu'];
        $noibat = $_POST['noibat'];
        $id=$_GET['id'];
        if($noibat === ""  
        ){
            echo "Vui lòng nhập lại mật khẩu";
        }
            else{
               $sql ="UPDATE `san_pham` SET `thuong_hieu`='$thuonghieu',`noi_bat`='$noibat' WHERE id ='$id'";
             // echo $sql;
             mysqli_query($conn, $sql);
             header('location:trangadmin.php?page_layout=sanphamnoibat');
            }
        }
?>
    <h1>Cập nhật danh mục sản phẩm</h1>
    <form action="trangadmin.php?page_layout=capnhatnoibat&id=<?php echo $student['id']?>" enctype="multipart/form-data" method="post">
      <div class="input">
        <p>Tên sản phẩm</p>
        <input type="text"value="<?php echo $student['ten_sp']?>" name="tensp" readonly/>
      </div>
      <div class="input">
        <p >Thương hiệu</p>
        <input type="text"value="<?php echo $student['thuong_hieu']?>" name="thuonghieu" readonly />
      </div>
      <div>
        <p>Tình trạng</p>
        <input type="radio" name="noibat" value="0"<?php echo $student['noi_bat'] ==0?'checked':''?> /> Không nổi bật
        <input type="radio" name="noibat" value="1"<?php echo $student['noi_bat'] ==0?'':'checked'?> /> Nổi bật
      </div>
      <button type ="submit" >Cập nhật</button>
    </form>
    
  </body>
</html>
