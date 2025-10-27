<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100%;
            border: 1px solid black;
        }

        td, th{
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        th{
             background-color:  rgba(81, 100, 110, 1);
        }
        .td {
            max-height:70px ;
            
        }
        .tensp{
             max-width:100px ;
        }
        .anh{
           max-width:120px ;
        }
        .add{
            background-color: rgba(49, 47, 47, 0.4);
            padding: 10px 25px;
            margin:10px 20px;
            text-decoration: none;
            color:#000;
            border-radius:4px ;
        }
        .add:active{
             background-color:  rgb(92, 130, 152);
             color: rgba(94, 99, 102, 1);
        }
        .mota{
            max-width:265px;
        }
        .delete{
            text-decoration: none;
            background-color: red;
            padding: 5px;
            color:black;
            border-radius:4px;
        }
         .update{
            text-decoration: none;
            background-color: rgba(55, 149, 91, 1);
            padding: 5px;
            color:black;
            border-radius:4px;
        }img{
            width: 60%;
            height :20% ;
        }
    </style>
</head>

<body>
    <div>
        <table class="table">
            <caption>
                <h1>Danh mục sản phẩm</h1>
            </caption>
            <tr>
                <th>Id</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Thương hiệu</th>
                <th>Loại sản phẩm</th>
                <th>Nổi bật</th>
                <th>Chức năng</th>
            </tr>
            <?php
                $sql = "SELECT * FROM san_pham WHERE noi_bat = TRUE ;";
                $result = mysqli_query($conn, $sql);
        
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td class="anh">
                    <img  src="<?php echo $row['avatar_path'];?>">
                </td>
                <td class="tensp"><?php echo $row['ten_sp']; ?></td>
                <td class="gia"><?php echo $row['gia_ban']; ?></td>
                <td ><?php echo $row['so_luong']; ?></td>
                <td ><?php echo $row['thuong_hieu']; ?></td>
                <td class="mota"><?php echo $row['loai_san_pham']; ?></td>
                <td><?php echo ($row['noi_bat'] == True ? "Nổi bật " : "Không nổi bật"); ?></td>
                
                <td>
                    <!-- <a class='delete' href="trangadmin.php?page_layout=xoasp&id=<?php echo $row['id']; ?>">Xoá</a> -->
                    <a class='update' href="trangadmin.php?page_layout=capnhatnoibat&id=<?php echo $row['id']; ?>">Cập nhật</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

   
</body>

</html>