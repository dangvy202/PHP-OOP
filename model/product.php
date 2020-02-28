<?php
    class product{
        var $ma_hh = null;
        var $ten_hh = null;
        var $don_gia = null;
        var $hinh = null;
        var $ma_loai = null;
        var $ngaynhap = null;
        var $mota = null;
        var $luotxem = null;
  

        function __contructs(){
            if(func_num_args()==8){
                $this->ma_hh = func_get_arg(0);
                $this->ten_hh = func_get_arg(1);
                $this->don_gia = func_get_arg(2);
                $this->hinh = func_get_arg(3);
                $this->ma_loai = func_get_arg(4);
                $this->ngaynhap = date("Y-m-d");
                $this->mota = func_get_arg(5);
                $this->luotxem = func_get_arg(6);

            }
        }
        //Thêm danh mục mơi
        function insert(){
            $db = new connect();
            $query="insert into product(ma_hh,ten_hh,hinh,don_gia,mota)"
                            ."value('$ma_hh','$ten_hh','$hinh','$don_gia','$mota')";
            $db->execute($query);
        }
        //Lấy dữ liệu từ form đến to
        function getListPage(){
            $db = new connect();
            $select = "select * from product order by ma_hh DESC";
            $result = $db->getList($select);
            return $result;
        }
        function getListPageEdit($from,$to){
            $db = new connect();
            $select = "select * from product order by ma_hh DESC limit $form,$to";
            $result = $db->getList($select);
            return $result;
        }
        function getProductMaloai($ma_hh){
            $db = new connect();
            $select = "select * from product where ma_hh=$ma_hh";
            $result = $db->getInstance($select);
            return $result;
        }
        function getCount(){
            $db = new connect();
            $select = "select COUNT(ma_hh) as tongso from product";
            $result = $db->getInstance($select);
            return $result;
        }
        //Lấy thông tin chi tiết sản phẩm theo id
        function getProductID($ma_hh){
            $db = new connect();
            $select = "select * from product where ma_hh=$ma_hh";
            $result = $db->getInstance($select);
            return $result;
        }
        //Update sản phẩm
        function Editproduct($ten_hh,$ma_hh,$don_gia,$hinh,$mota){
            $db = new connect();
            $query = "UPDATE product set ten_hh='".$ten_hh."',don_gia='".$don_gia."',hinh='".$hinh."'
            ,mota='".$mota."' where  ma_hh=$ma_hh ";
            $db->execute($query); 
        }
        //Xóa sản phẩm
        function Deleteproduct($ma_hh){
            $db = new connect();
            $query = "delete from product where ma_hh = ".$ma_hh;
            $db->execute($query);
        }

    }
?>