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
        .add{
            background-color: grey;
            padding: 10px 20px;
    
        }
        .delete{
            background-color: red;
            padding: 5px
        }
         .update{
            background-color: blue;
            padding: 5px
        }img{
            width: 30%;
            /* height :30% ; */
        }
    </style>
</head>

<body>
    <div>
        <table class="table">
            <caption>
                <h1>Thông tin Khách hàng</h1>
            </caption>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Email/Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Chức năng</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `user_nguoi_dung`";
                $result = mysqli_query($conn, $sql);
        
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['nam_sinh']; ?></td>
                <td><?php echo ($row['gioi_tinh'] == true ? "Nam" : "Nữ"); ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['mat_khau']; ?></td>
                
                <td>
                    <a class='delete' href="trangadmin.php?page_layout=xulyxoa&id=<?php echo $row['id']; ?>">Xoá</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

   
</body>

</html>