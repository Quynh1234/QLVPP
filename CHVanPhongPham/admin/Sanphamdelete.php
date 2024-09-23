<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Sản Phẩm</title>
</head>
<body>
    <?php
    $id_sanpham = $_GET['id_sanpham'];
    $conn= mysqli_connect("localhost","root","","chvanphongpham");
    if(!$conn){
        die("Ket noi that bai".mysqli_connect_error());
    }else{
        $sql="DELETE FROM tblsanpham WHERE id_sanpham ='".$id_sanpham."'";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "Delete error" .mysqli_error($conn);
        }else{
            echo"<script type='text/javascript'>alert('Xoa du lieu thanh cong');
        window.location.href ='Mainsanpham.php';
        </script>";
        }
    }
    ?>
</body>
</html>