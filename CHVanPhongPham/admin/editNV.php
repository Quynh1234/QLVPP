<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông nhân viên</title>
    <link rel = "stylesheet" href = "style.css"/>
</head>
<body>
<?php
        $id_taikhoan = $_GET['id_taikhoan'];
        $ten = "";
        $email ="";
        $quyen="";
        $sdt= "";
        $diachi="";
        $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        if(!$conn){
            die("Kết nối thât bại");
        }
        else{
            $sql = "SELECT * FROM tbltk WHERE id_taikhoan = '" .$id_taikhoan. "'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $ten = $row["ten"];
                    $email =$row["email"]; 
                    $quyen=$row["quyen"];
                    $sdt= $row["sdt"];
                    $diachi=$row["diachi"];
                }
            }
            else{
                echo "Khong co ban ghi";
            }
        }
    ?>
    <div class = "container">
        <form METHOD = "post">
            <h1>Edit Accout NV</h1>

            <div class="form-control error">
                <input id ="ten"  name = "ten" type="text" value ="<?php echo($ten) ?> "placeholder ="Tên" >
                <span></span>
                <small></small>
            </div>


            <div class="form-control error">
                <input id ="email" name = "email" type="email" value ="<?php echo($email) ?>" placeholder ="Email" >
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <input id ="sdt" name = "sdt" type="int" value ="<?php echo($sdt) ?>" placeholder ="Số điện thoại">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <input id ="quyen" name = "quyen" type="text" value ="<?php echo($quyen) ?>"  placeholder ="Quyền">
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <input id ="diachi" name = "diachi" type="text" value ="<?php echo($diachi) ?>" placeholder ="Địa chỉ">
                <span></span>
                <small></small>
            </div>
        
            
            <button type = "submit" class="btn-submit" name = "btnsubmit">Edit</button>
          
            <div class="signup-link">
                 <a href="qlNV.php">Trở về</a>
            </div>
        </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST["btnsubmit"])){
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $quyen = $_POST['quyen'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $conn = mysqli_connect("localhost","root","","cuahangtienloi");
            if(!$conn){
                die("Kết nối không thành công");
                exit;
            }
            $sql = "UPDATE tbltk SET
             ten = '" .$ten."' ,
             email = '" .$email."',
             quyen = '" .$quyen."',
             sdt = '" .$sdt."',
             diachi = '" .$diachi."'
             WHERE id_taikhoan = '" .$id_taikhoan."'";
            $result = mysqli_query($conn,$sql);
            if(!$result){
                echo "Update error" . mysqli_error($conn);
            }
            else{
                echo " 
                <script> 
                alert('Cập nhật dữ liệu thành công');
                window.location.href = 'qlNV.php';
                </script>";
            }
        }
    ?>
</body>
</html>