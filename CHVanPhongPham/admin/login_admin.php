<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel ="stylesheet" href ="style.css" />
</head>
<body>
    <div class = "container">
        <form method ="POST">
            <h1>Login Admin</h1>
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
            
        </form>
    <?php
        $conn = mysqli_connect("localhost","root","","chvanphongpham");
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
                $sql = "SELECT * FROM tbltk WHERE email='".$email."' AND pass ='".$pass."' AND quyen != '0' AND quyen !='' ";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)<=0){
                    echo  "<script type = 'text/javascript'>alert('Đăng nhập THẤT BẠI');
                    </script>";
                }
                else{
                    echo  "<script type = 'text/javascript'>alert('Đăng nhập Thành công');
                    window.location.href = 'index.php';
                    </script>";
                }
                
            }
        }
    
?>
    </div>
</body>
<script src="app.js"></script>
</html>