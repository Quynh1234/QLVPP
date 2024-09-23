<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel ="stylesheet" href ="admin/style.css" />
</head>
<body>
    <div class = "container">
        <form method ="POST">
            <h1>Quên mật khẩu</h1>
            <div class="form-control ">
                <input name="email" id ="email" type="email" placeholder ="Email" >
                <span></span>
                <small></small>
            </div>
        
            <div class="form-control ">
                <input id="sdt" name ="sdt" type="text" placeholder ="Số điện thoại" >
                <span></span>
                <small></small>
            </div>
            <button type = "submit" name ="btn-submit" class = "btn-submit">Lấy mật khẩu</button>
            <div class="signup-link">
                <a href="login.php">Trở về</a>
            </div>
        </form>
<?php
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    if(!$conn){
        die("Kết nối thất bại");
         exit();
    }
    else{
        if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btn-submit'])){
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $sql = "SELECT pass FROM tbltk WHERE email ='".$email."' AND sdt = '".$sdt."' ";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            //while($row = mysqli)
            $row =mysqli_fetch_assoc($result);
            echo"mật khẩu của bạn là: ".$row['pass']."";
        }
        else{
            echo"Không trùng thông tin";
        }
    }}
?>