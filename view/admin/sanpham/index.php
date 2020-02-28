<?php
include 'D:\Xampp\htdocs\PHP2\ASM\model/config.php';
include 'D:\Xampp\htdocs\PHP2\ASM\model/product.php';

if(isset($_GET['hanhdong'])){
    $hanhdong=$_GET['hanhdong'];
switch ($hanhdong){
    case 'them':
        if(isset($_POST['hanhdong'])){
            $tensp = $_POST['ten_hh'];
            $mota = $_POST['hinh'];
            them($tensp, $mota);
            redirect('index.php?hanhdong=danhsach');
        }
        include 'themsp.php';
        break;
        
        
    case 'sua':
        $id = $_GET['ma_hh'];
        if(isset($_POST['hanhdong'])){
            $tensp = $_POST['ten_hh'];
            $mota = $_POST['hinh'];
            sua($id, $tensp, $mota);
            redirect('index.php?hanhdong=danhsach');
        }else{
            $sp = lay_sp_bang_id($id);
            include '.../view/admin/sanpham/suasp.php';
        }
        break;
        
    case 'danhsach':
        $sps = lay_tat_ca_sp();
        include 'danhsach.php';
        break;
    case 'xoa':
        $id = $_GET['ma_hh'];
        xoa($id);
        redirect('index.php?hanhdong=danhsach');
        break;
    default :
        redirect('index.php?hanhdong=danhsach');
        break;
}
}else{
    $hanhdong=$_POST['hanhdong'];
}
?>