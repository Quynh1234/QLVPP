<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel = "stylesheet" href = "style.css"/>
   
 
</head>




<body>
    <div>
<div class = "container">
        <form METHOD = "post">
            <h1>Đăng kí nhân viên</h1>

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
                <input id ="diachi" name = "diachi" type="text" placeholder ="Địa chỉ" >
                <span></span>
                <small></small>
            </div>
        
            
            <button class="btn-submit" name = "btnsubmit" onclick="dangky()">Create</button>
          
            <div class="signup-link">
                 <a href="qltk.php">Trở về</a>
            </div>
        </form>
    </div>
    <div>
    <?php 
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        if(!$conn){
            die("Kết nối thất bại");
            exit();
        }
        else{
            if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btnsubmit'])){
               
                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                if(empty($ten) || empty($email) || empty($pass)|| empty($sdt)|| empty($diachi)){
                    echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
                    </script>";
                    return;
                }
                
                $sql2 = "SELECT * FROM tbltk WHERE email ='".$email."'";
                $result2 = mysqli_query($conn,$sql2);
                if(mysqli_num_rows($result2)<=0){
                $sql = "INSERT INTO tbltk (ten,email,pass,sdt, diachi, quyen) VALUES('".$ten."','".$email."','".$pass."','".$sdt."','".$diachi."','Nhânviên')";
                $result = mysqli_query($conn,$sql);
                if(!$result){
                    echo "Khong them thanh cong";
                }
                else{
                    $sql4 = "SELECT id_taikhoan FROM tbltk WHERE email = '".$email."' ";
                        $result4 = mysqli_query($conn,$sql4);
    
                      $row = mysqli_fetch_assoc($result4);
                    $sql3 = "INSERT INTO tblnhanvien (id_nhanvien,id_taikhoan,ten,email,pass,sdt,diachi)VALUES('','".$row['id_taikhoan']."','".$ten."','".$email."','".$pass."','".$sdt."','".$diachi."')";
                    $result3 = mysqli_query($conn,$sql3);
                    echo  "<script type = 'text/javascript'>alert('Tạo tài khoản thành công');
                    window.location.href = 'qltk.php';
                    </script>";
                }
                }else{
                    echo"Trùng email";
                }
                
            }
        }
    
?>
</div>
</div>
</body>
</html>