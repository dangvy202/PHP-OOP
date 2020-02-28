<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
</head>
<body>
    <?php
        $dsn="mysql:host=localhost;dbname=asm_shop";
        $username="root";
        $password="";
        $db=new PDO($dsn,$username,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //get data
        $query= "select * from product order by ma_hh DESC";
        $new=$db->query($query);
        //show 
        echo "<table cellspacing='0' cellspacing='10' border=1 style='border-collapse'>";
        $stt=0;
        foreach($new as $new){     
            $stt+=1;
            $name=$new['ten_hh'];
            $img=$new['hinh'];
            if(is_file($img)){
                $img = "<img src= '".$img."' width='100px'>";   
            }
            else{
                $price=$new['don_gia'];
                $content=$new['mota'];
                echo "<tr><td>$name</td>"
                        ."<td>$img</td>"
                        ."<td>$price</td>"
                        ."<td>$content</td>"
                        ."<td></td>"
                    ."</tr>";
            }
        }
    ?>
</body>
</html>