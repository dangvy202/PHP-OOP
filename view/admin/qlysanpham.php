<?php 
    require 'header.php';
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <input type="text" name="ma_loai"><br>
    <input type="text" name="ten_hh"><br>
    <input type="text" name="hinh"><br>
    <input type="text" name="don_gia"><br>
    <textarea name="mota" style="width:100px" row="5"></textarea><br>
    <input type="submit" name="addnew" value="Thêm">
</form>
    <?php
        $dsn='mysql:host=localhost;dbname=asm_shop';
        $user='root';
        $pass='';
        $db=new PDO($dsn,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //add pd
        if(!empty($_POST['addnew'])){
            $ma_loai = $_POST['ma_loai'];
            $ten_hh = $_POST['ten_hh'];
            $hinh = $_POST['hinh'];
            $don_gia = $_POST['don_gia'];
            $mota = $_POST['mota'];
            $query="insert into product(ten_hh,hinh,don_gia,mota,ma_loai)"
                            ."value('$ten_hh','$don_gia','$hinh','$mota','$ma_loai')";
            $addnew=$db->exec($query);
        }
        $query="select * from product order by ma_hh DESC";
        $news=$db->query($query);

        
        echo "<table cellspacing='0' width='100%' cellspacing='10' border=1 style='border-collapse'> ";
    
                echo "<tr>"         
                
                ."<td>Mã loại</td>"
                ."<td>Tên danh mục</td>"
                ."<td>Hình</td>"
                ."<td>Đon giá</td>"
                ."<td>Mô tả</td>"
                ."</tr>";

        $stt = 0;
        foreach($news as $news){
            $stt +=1;
            $ma_loai = $news['ma_loai'];
            $ten_hh = $news['ten_hh'];
            $hinh = $news['hinh'];
            if(is_file($hinh)){
                $hinh="<img src='".$hinh."' width='100px'>";
            }
            $don_gia = $news['don_gia'];
            $mota = $news['mota'];
            echo "<tr>"
                ."<td>$ma_loai</td>"
                ."<td>$ten_hh</td>"
                ."<td>$hinh</td>"
                ."<td>$don_gia</td>"
                ."<td>$mota</td>"
            ."</tr>";
            
        }
        echo "</table>";
    ?>
</table>