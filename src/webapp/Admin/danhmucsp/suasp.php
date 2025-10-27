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
       h1{
        font-size:40px;
        text-align: center;
        margin:10px 0;
      }
       .input input{
        width: 98%;
        height: 40px;
        margin: 0 5px;
        border-radius: 5px;
        border:none;
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
        && isset($_POST['gia'])
        && isset($_POST['soluong'])
        && isset($_POST['thuonghieu'])
        && isset($_POST['loaisanpham'])
        // && isset($_POST['mota'])
        // && isset($_POST['quangcao'])
         && isset($_GET['id'])
        
    ){
        $tennsp = $_POST['tensp'];
        $giasanpham = $_POST['gia'];
        $soluong = $_POST['soluong'];
        $thuonghieu = $_POST['thuonghieu'];
        $loaisanpham = $_POST['loaisanpham'];
        // $mota = $_POST['mota'];
        // $quangcao = $_POST['quangcao'];
        $noibat = $_POST['noibat'];
        $id=$_GET['id'];
        if($thuonghieu === "" 
        ||$giasanpham === "" 
        ||$soluong === ""
        // ||$quangcao==="" 
        ){
            echo "Vui lòng nhập lại mật khẩu";
        }
            else{
               $sql ="UPDATE `san_pham` SET `gia_ban`='$giasanpham',`so_luong`='$soluong',`thuong_hieu`='$thuonghieu',`noi_bat`='$noibat',`loai_san_pham`='$loaisanpham' WHERE id ='$id'";
             // echo $sql;
             mysqli_query($conn, $sql);
             header('location:trangadmin.php?page_layout=quanlydanhmuc');
            }
        }
?>
    <h1>Cập nhật danh mục sản phẩm</h1>
    <form action="trangadmin.php?page_layout=suasp&id=<?php echo $student['id']?>" enctype="multipart/form-data" method="post">
      <div class="input">
        <p>Tên sản phẩm</p>
        <input type="text"value="<?php echo $student['ten_sp']?>" name="tensp" readonly/>
      </div>
      <div class="input">
       <p>Giá sản phẩm</p>
        <input type="text" value="<?php echo $student['gia_ban']?>" name="gia"  />
      </div>
      <div class="input">
        <p>Số lượng</p>
        <input type="text"value="<?php echo $student['so_luong']?>" name="soluong"  />
      </div>
      <div class="input">
        <p >Thương hiệu</p>
        <input type="text"value="<?php echo $student['thuong_hieu']?>" name="thuonghieu" readonly />
      </div>
       <div>
        <p>Loại sản phẩm</p>
        <select name="loaisanpham" >
          <option >Điện thoại</option>
          <option >Phụ kiện </option>
          <option >Máy tính bảng</option>
        </select>
      </div>
      <!-- <div >
        <p>Mô tả</p>
        <textarea name="mota"></textarea>
      </div> -->
      <!-- <div class="input">
        <p>Quảng Cáo</p>
        <input type="text"value="<?php echo $student['quang_cao']?>" name="quangcao" required />
      </div> -->
      <div>
        <p>Tình trạng</p>
        <input type="radio" name="noibat" value="0"<?php echo $student['noi_bat'] ==0?'checked':''?> /> Không nổi bật
        <input type="radio" name="noibat" value="1"<?php echo $student['noi_bat'] ==0?'':'checked'?> /> Nổi bật
      </div>
      <button type ="submit" >Cập nhật</button>
    </form>
    
  </body>
</html>
