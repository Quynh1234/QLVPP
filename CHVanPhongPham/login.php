<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel ="stylesheet" href ="admin/style.css" />
</head>
<body>
    <?php
    include "session.php";
    ?>
    <div class = "container">
        <form method ="POST">
            <h1>Login Form</h1>
            <div class="form-control ">
                <input name="email" id ="email" type="email" placeholder ="Email" >
                <span></span>
                <small></small>
            </div>
        
            <div class="form-control ">
                <input id="password" name ="password" type="password" placeholder ="Password" >
                <span></span>
                <small></small>
            </div>
            <button type = "submit" name ="btn-submit" class = "btn-submit">Login</button>
            <div class="signup-link">
                Not a member? <a href="createAccout.php">Create Accout</a>
            </div>
        </form>
        <div class="signup-link">
             <a href="quenMK.php">Quên mật khẩu</a>
        </div>
    <?php
        $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        if(!$conn){
            die("Kết nối thất bại");
            exit();
        }
        else{
            if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btn-submit'])){
                $email = $_POST['email'];
                $pass = $_POST['password'];
                if(empty($email) || empty($pass)){
                    echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
                    </script>";
                    return;
                }
                $sql = "SELECT * FROM tbltk WHERE email='".$email."' AND pass ='".$pass."' ";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)<=0){
                    echo  "<script type = 'text/javascript'>alert('Đăng nhập THẤT BẠI');
                    </script>";
                }
                else{
                    $row = mysqli_fetch_assoc($result);
                    session_start();
                    Session::set('registerlogin',true);
                    Session::set('registername',$row['ten']);
                    // if(Session::get('registerlogin')==true)
                    // $a = Session::get('registername') 
                    

                    echo  "<script type = 'text/javascript'>alert('Đăng nhập Thành công');
                    window.location.href = 'index.php';
                    </script>";
                }
                
            }
        }
    
?>
    </div>
</body>
<script src="admin/app.js"></script>
</html>