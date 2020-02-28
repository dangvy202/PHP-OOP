
<?php
  /*  session_start();
    include_once('../model/config.php');
 
    //kiem tra cookie xem da tôn tai chua
 
    //neu chua thi minh ha dang nhap;
    if(empty($_SESSION['username'])){
        if(isset($cookie_name)){
            if(isset($_COOKIE[$cookie_name])){
                parse_str($_COOKIE[$cookie_name]);
                $sql2="select * from user where username='$usr' and password='$hash'";
                $result2=mysql_query($sql2,$con);
                if($result2){
                  header('Location: ./controller/admin.php');
                    exit;
                }
            }
        }
    }
    else{
        header('location:.php');//chuyển qua trang đăng nhập thành công
        exit;
    }   
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $a_check=((isset($_POST['remember'])!=0)?1:"");
        if($username=="" || $password==""){
            echo "Vui lòng điền đầy đủ thông tin";
            exit;
        }
        else{
            $sql="select * from user where username='$username' and password='$password'";
            echo $sql;
            $result=mysql_query($sql,$con);
            if(!$result){
                echo "loi cau truy van".mysql_error();
                exit;
            }
            $row=mysql_fetch_array($result);
            $f_user=$row['username'];
            $f_pass=$row['password'];
            if($f_user==$username && $f_pass==$password){
                $_SESSION['username']=$f_user;
                $_SESSION['password']=$f_pass;
                if($a_check==1){
                    setcookie ($cookie_name, 'usr='.$f_user.'&hash='.$f_pass, time() + $cookie_time);
                }
                header('Location: ./controller/admin.php');//chuyền qua trang đăng nhập thành công
                exit;
            }
        }
       }*/
      
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['submit'])) 
{
    //Kết nối tới database
    include('../model/config.php');
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
        exit;
    }
     
    // mã hóa pasword
    $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysql_query("SELECT username, password FROM user WHERE username='$username'");
    if (mysql_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysql_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào " . $username ;
    die();
}

?>
<?php
    include 'header.php';
?>
 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="" mothod="POST" class="aa-login-form">
                  <label for="">Username or Email address<span>*</span></label>
                   <input type="text" require name="username" placeholder="Username or email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" require name="password" placeholder="Password">
                    <button type="submit" name="submit" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<?php
    include 'footer.php';
?>