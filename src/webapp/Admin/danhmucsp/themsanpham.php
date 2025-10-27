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
      .gop{
        display: flex;
        margin: 0 25px;
      }
      .gop div {
        margin-right:10px;
      }
      .tinhtrang{
        margin: 5px 25px
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
        border-radius: 4px;
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
    <h1>Thêm sản phẩm</h1>
    <form action="trangadmin.php?page_layout=themsanpham" enctype="multipart/form-data" method="post">
      <div class="input">
        <p>Tên sản phẩm</p>
        <input type="text" name="tensp" required/>
      </div>
      <div class="input">
       <p>Giá sản phẩm</p>
        <input type="text" name="gia" required />
      </div>
      <div class="input">
        <p>Số lượng</p>
        <input type="text" name="soluong" required />
      </div>
      <div class="input">
        <p >Thương hiệu</p>
        <input type="text" name="thuonghieu" required />
      </div>
      <div class="input">
        <p>Quảng Cáo</p>
        <input type="text" name="quangcao" required />
      </div>
      <div >
        <p>Mô tả</p>
        <textarea name="mota"></textarea>
      </div>
      <div class="gop">
        <div>
            <p> Hình ảnh sản phẩm</p>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div>
         <p>Loại sản phẩm</p>
           <select name="loaisanpham" >
              <option >Điện thoại</option>
               <option >Phụ kiện </option>
               <option >Máy tính bảng</option>
           </select>
        </div>
      </div>
      
      <div class="tinhtrang">
        <p>Tình trạng</p>
        <input type="radio" name="noibat" value="0" /> Không nổi bật
        <input type="radio" name="noibat" value="1" /> Nổi bật
      </div>
     
      <button type ="submit" >Thêm sản phảm</button>
    </form>
    <?php
    include('connect.php');
    if(isset($_POST['tensp'])
        && isset($_POST['gia'])
        && isset($_POST['soluong'])
        && isset($_POST['thuonghieu'])
        && isset($_POST['loaisanpham'])
        && isset($_POST['mota'])
        && isset($_POST['quangcao'])
    ){
        $tennsp = $_POST['tensp'];
        $giasanpham = $_POST['gia'];
        $soluong = $_POST['soluong'];
        $thuonghieu = $_POST['thuonghieu'];
        $loaisanpham = $_POST['loaisanpham'];
        $mota = $_POST['mota'];
        $noibat = $_POST['noibat'];
        $quangcao = $_POST['quangcao'];
        if($tennsp === "" 
        ||$giasanpham === "" 
        ||$soluong === "" 
        ||$mota === ""||$quangcao===""){
            echo "Vui lòng nhập lại mật khẩu";
        }
        else{
            //Xử lý ảnh
             #Bắt đầu xử lý thêm ảnh
            // Xử lý ảnh
            $target_dir = "avatar/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            // Kiểm tra xem file ảnh có hợp lệ không
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File không phải là ảnh.";
                    $uploadOk = 0;
                }
            }
            // Kiểm tra nếu file đã tồn tại
            if (file_exists($target_file)) {
                echo "File này đã tồn tại trên hệ thông";
                $uploadOk = 2;
            }
    
            // Cho phép các định dạng file ảnh nhất định
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Chỉ những file JPG, JPEG, PNG & GIF mới được chấp nhận.";
                $uploadOk = 0;
            }

            #Kết thúc xử lý ảnh
            if($uploadOk == 0){
                echo "File của bạn chưa được tải lên";
            }
            else{
               $sql ="INSERT INTO `san_pham`( `ten_sp`, `gia_ban`, `mo_ta`, `so_luong`, `avatar_path`,`thuong_hieu`,`noi_bat`,`quang_cao`,`loai_san_pham`) VALUES ('$tennsp','$giasanpham','$mota','$soluong','$target_file','$thuonghieu','$noibat','$quangcao','$loaisanpham')";
             // echo $sql;
             move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
             mysqli_query($conn, $sql);
             header('location:trangadmin.php?page_layout=quanlydanhmuc');
            }
        }
    }
?>
  </body>
</html>
