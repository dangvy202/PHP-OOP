<?php
    class connect{
        //khởi tạo một database
        var $db = null;
        //Kết nối database
        public function __construct(){
            $dsn='mysql:host=localhost;dbname=asm_shop';
            $user='root';
            $pass='';
            $this->db=new PDO($dsn,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
    
    //Lấy dữ liệu từ database
    function getList($select){
        $result = $this->db->query($select);
        return $result;
    }
    //Tạo phương thức lấy một kết quả từ bảng
    function getInstance($select){
        $result = $this->db->query($select);
        $result = $result->fetch();
        return $result;
    }
    function execute($query){
        $result = $this->db->exec($query);
        return $result;
    }
    //Đăng nhập
    function login($a,$b){
        $qr = mysql_query("select * from khach_hang where ho_ten = '$a' and mat_khau = '$b' ") or die('Lỗi kết nối');
        $result = mysql_num_row($qr);
        if($result == 1){
            return true;
        }else{
            return false;
        }
    }
}
?>