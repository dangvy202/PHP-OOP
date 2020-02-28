<?php
    class Catalog{
        var $ma_loai = null;
        var $ten = null;
        function __construct(){
            if(func_num_args() == 2){
                $this->ma_loai = func_get_arg(0);
                $this->ten = func_get_arg(1);
            }
        }
        //Lấy danh sách catalog từ database
        function getList(){
            $db = new connect();
            $select = "select * from catalog order by ma_loai DESC";
            $result = $db->getList($select);
            return $result;
        }
        //Thêm danh mục mơi
        function insert(){
            $db = new connect();
            $query = "insert into catalog(ten) value('$this->ten')";
            $db->execute($query);
        }
        //Lấy thông tin chi tiết sản phẩm theo id
        function getCatalogID($ma_loai){
            $db = new connect();
            $select = "select * from catalog where ma_loai=$ma_loai";
            $result = $db->getInstance($select);
            return $result;
        }
        //Update sản phẩm
        function Editproduct($ten,$ma_loai){
            $db = new connect();
            $query = "UPDATE catalog set ten='".$ten."' where  ma_loai=$ma_loai ";
            $db->execute($query); 
        }
        //Xóa sản phẩm
        function Deleteproduct($ma_loai){
            $db = new connect();
            $query = "delete from catalog where ma_loai = ".$ma_loai;
            $db->execute($query);
        }
    }
?>