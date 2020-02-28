<?php
    require '../model/connect.php';
    require '../model/catalog.php';
    require '../model/product.php';
    
    $danhmuc = new Catalog();
    $dm = $danhmuc->getList();

    $danhsach = new product();
    $ds = $danhsach->getListPage();
    
    if(isset($_GET['act'])){
        $act =$_GET['act'];
        switch($act){
            case 'danhmuc':
                require '../view/admin/danhmuc.php';
            break;
            case 'add_cata':
                $ten = $_POST['ten'];
                $addnew = new Catalog('',$ten);
                $addnew->insert();
                //cập nhật danh sách mới
                $danhmuc = new Catalog();
                $dm = $danhmuc->getList();
                require '../view/admin/danhmuc.php';
            break;
            //Lấy về
            case 'form_update_cata':
                $ma_loai = $_GET['ma_loai'];
                $getone = new Catalog();
                $get1 = $getone->getCatalogID($ma_loai);
                include '../view/admin/danhmuc.php';
            break;
            //UPDATE
            case 'update_cata':
                $ma_loai = $_POST['ma_loai'];
                $ten = $_POST['ten'];
                $update = new Catalog();
                $update->Editproduct($ten,$ma_loai);
                //cập nhật danh sách mới
                $danhmuc = new Catalog();
                $dm = $danhmuc->getList();
                include '../view/admin/danhmuc.php';
            break;
            //DELETE CATA
            case 'delete_cata':
                $ma_loai = $_GET['ma_loai'];
                $del = new Catalog();
                $del->Deleteproduct($ma_loai);
                //cập nhật danh sách mới
                $danhmuc = new Catalog();
                $dm = $danhmuc->getList();
                include '../view/admin/danhmuc.php';
            break;
            //SẢN PHẨM
            case 'sanpham':
                require '../view/admin/sanpham.php';
            break;
            case 'add_product':
                $query= "select * from product order by ma_hh DESC";
                $new=$db->query($query);
                if(!empty($_POST['addnew'])){
                    $name=[$_POST['ten_hh']];
                    $hinh=$_POST['hinh'];
                    $price=$_POST['don_gia'];
                    $content=$_POST['mota'];
                    $query="insert into product(ma_loai,ten_hh,hinh,don_gia,mota)"
                                ."value('2','$name','$hinh','$price','$content')";
                    $addnew=$db->exec($query);
                }
                //cập nhật danh sách mới
                $danhsach = new product();
                $ds = $danhsach->getList();
                include '../view/admin/sanpham.php';
            break;
            default:
                require '../view/admin/danhmuc.php';
            break;
        }    
    }else{
        require '../view/admin/danhmuc.php';
    }
?>