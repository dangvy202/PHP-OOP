<?php
    require '../model/connect.php';
    require '../model/catalog.php';
    require '../model/product.php'; 
    $danhmuc = new Catalog();
    $dsdm = $danhmuc->getList();
    

    
    if(isset($_GET['act'])){
        $act =$_GET['act'];
        switch($act){
            case 'home':
                require '../view/home.php';
            break;
            case 'cart':
                require '../view/cart.php';
            break;
            case 'check':
                require '../view/check.php';
            break;
            case 'wishlist':
                require '../view/wishlist.php';
            break;
            case 'account':
            if(isset($_GET['maloaicatalog'])){
                $maloaicatalog = $_GET['maloaicatalog'];
                $product = new product();
                $dssp = $product->getListPage(0,8);
              
            }
                //if(isset($_POST['s']) && $_POST['s'] == 1){
                //    include '../model/config.php';
                //    $user = $_POST['username'];
                //    $password = md5($_POST['password']);
                //    include '../model/connect.php';
                //    $login = login($user,$password);
                //    if($login == 1){
                //        echo "Đăng nhập thành công";
                //        include '../controller/index.php';
                //    }else{
                //        echo "Thất bại";
                //    }

                //}
                require '../view/account.php';
            break;
            case 'about':
                require '../view/about.php';
            break;
            case 'contact':
                require '../view/contact.php';
            break;
            case 'product':
            
                if(isset($_GET['maloaicatalog'])){
                    $maloaicatalog = $_GET['maloaicatalog'];
                    $product = new product();
                    $dssp = $product->getListPage(0,8);
                  
                }
                require '../view/product.php';
            break;
            
          

            default:
                require '../view/home.php';
            break;
        }    
    }else{
        require '../view/home.php';
    }
?>