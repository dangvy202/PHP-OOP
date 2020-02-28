<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .menu{
            text-align:center;
            width: 100%;
            height: 150px;
            color: yellow;
            background-color:black;
        }
        .menu h1{
            padding: 60px 30px;
        }
        .childmenu{
            height:50px;
            margin-top:-16px;
            background-color:lightgray;
        }
        .childmenu ul li {
            margin-top:15px;
            word-spacing: 2px;
            margin-left:50px;
            display:inline-block;
        }
    </style>
</head>
<body>
    <div class="menu">
        <h1>QUẢN TRỊ TRANG WEB</h1>
    </div>
    <div class="childmenu">
        <ul>
            <li><a href="#">TRANG CHỦ</a></li>
            <li><a href="admin.php?act=danhmuc">QUAN LÍ DANH MỤC</a> </li>
            <li><a href="admin.php?act=sanpham">QUẢN LÍ SẢN PHẨM</a></li>
            <li><a href="#">QUẢN LÍ KHÁCH HÀNG</a></li></li>
            <li><a href="#">QUẢN LÍ BÌNH LUẬN</a></li></li>
            <li><a href="#">QUẢN LÍ THỐNG KÊ</a></li></li>
        </ul>
    </div>
</body>
</html>