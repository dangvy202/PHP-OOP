<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
                <table>
                    <tr>
                    <td>Tên sản phẩm</td>
                    <td><input type="text" value="<?php echo $sp['ten_hh']?>" name="tensp"/></td>
                    </tr>
                    <tr>
                    <td>Mô tả</td>
                    <td><textarea name="mota"><?php echo $sp['hinh']?></textarea></td>
                    </tr>
                <tr>
                <td></td><td><input type="submit" name="hanhdong" value="sua"></td>
                </tr>
                </table>
        </form>
    </body>
</html>