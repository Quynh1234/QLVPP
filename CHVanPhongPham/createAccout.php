<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel = "stylesheet" href = "admin/style.css"/>
   
 
</head>




<body>
    <div>
<div class = "container">
        <!-- <form METHOD = "post"> -->
            <h1>Đăng kí khách hàng</h1>

            <div class="form-control ">
                <input id ="ten"  name = "ten" type="text" placeholder ="Tên" >
                <span></span>
                <small></small>
            </div>


            <div class="form-control ">
                <input id ="email" name = "email" type="email" placeholder ="Email" >
                <span></span>
                <small></small>
            </div>

            <div class="form-control ">
                <input id ="sdt" name = "sdt" type="int" placeholder ="Số điện thoại" >
                <span></span>
                <small></small>
            </div>
            <div class="form-control ">
                <input id="password" name = "password" type="password" placeholder ="Password" >
                <span></span>
                <small></small>
            </div>
            
            <div class="form-control ">
                <input id="confirm-password" name = "confirm-password" type="password" placeholder ="Cofirm-Password" >
                <span></span>
                <small></small>
            </div>

            <div class="form-control ">
                <input id ="diachi" name = "diachi" type="text" placeholder ="Địa chỉ" >
                <span></span>
                <small></small>
            </div>
        
            
            <button class="btn-submit" name = "btnsubmit" onclick="dangky()">Create</button>
          
            <div class="signup-link">
                 <a href="login.php">Trở về</a>
            </div>
        <!-- </form> -->
    </div>
    <div>
    <?php 
    // $conn = mysqli_connect("localhost","root","","webbanhang");
    //     if(!$conn){
    //         die("Kết nối thất bại");
    //         exit();
    //     }
    //     else{
    //         if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btnsubmit'])){
               
    //             $ten = $_POST['ten'];
    //             $email = $_POST['email'];
    //             $pass = $_POST['password'];
    //             $sdt = $_POST['sdt'];
    //             $diachi = $_POST['diachi'];
    //             if(empty($ten) || empty($email) || empty($pass)|| empty($sdt)|| empty($diachi)){
    //                 echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
    //                 </script>";
    //                 return;
    //             }
    //             if($pass != $_POST['confirm-password']){
    //                 echo"<script type = 'text/javascript'>alert('Vui lòng Nhập Trùng với CONFIRM-PASSWORD');
    //                 </script>";
    //                 return;
    //             }
    //             $sql = "INSERT INTO tbltk (ten,email,pass,sdt,diachi) VALUES('".$ten."','".$email."','".$pass."','".$sdt."','".$diachi."')";
    //             $result = mysqli_query($conn,$sql);
    //             if(!$result){
    //                 echo "Khong them thanh cong";
    //             }
    //             else{
    //                 echo  "<script type = 'text/javascript'>alert('Tạo tài khoản thành công');
    //                 window.location.href = 'login.php';
    //                 </script>";
    //             }
                
    //         }
    //     }
    
?>
</div>
</div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type ="text/javascript">
    var ten = document.getElementById("ten"); 
    var email = document.getElementById("email");
    var pass = document.getElementById("password");
    var comfirmpass = document.getElementById("confirm-password");
    var sdt = document.getElementById("sdt");
    var diachi = document.getElementById("diachi");
    

    // function checkten(){
    //     if
    // }
    // 
function check(){
    if(ten.value == ""||email.value==""||sdt.value==""||diachi.value==""||pass.value==""||comfirmpass.value=="")
    { 
        alert("Mời bạn nhập đủ thông tin");
        return false;
    }
    else{
    if(pass.value != comfirmpass.value)
    {
        alert("Xác nhận lại mật khẩu");
        return false;
    }
    if(ten.value.length <2){
        alert("Tên phải tối thiểu 2 kí tự");
        return false;
    }
}
return true;

}
function dangky(){
    //console.log("abs");
    if(check()==true)
    {
        console.log("qwe1");
        $.ajax({
            url:'admin/ajax/dangky.php',
            type: 'POST',
            data: {'ten':ten.value,'email':email.value,'sdt': sdt.value,'diachi':diachi.value,'pass':pass.value},
            success: function(respone){
                alert(respone);
                // console.log(respone);
            }
        });
    }

}
</script>
</html>