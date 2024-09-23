<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Loại Sản Phẩm</title>
</head>
<body>
    <?php
    $id_loaisp = $_GET['id_loaisp'];
    $conn= mysqli_connect("localhost","root","","chvanphongpham");
    if(!$conn){
        die("Ket noi that bai".mysqli_connect_error()); 
    }else{
        $sql="DELETE FROM tbl_loai_sp WHERE id_loaisp ='".$id_loaisp."'"; 
        
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "Delete error" .mysqli_error($conn);
        }else{
        $sql1="DELETE FROM tblsanpham WHERE loaisp_id ='".$id_loaisp."'"; 
        $result1 = mysqli_query($conn,$sql1);
            echo"<script type='text/javascript'>alert('Xoa du lieu thanh cong');
        window.location.href ='LoaisanphamMain.php';
        </script>";
        }
    }
    ?>
</body>
</html>