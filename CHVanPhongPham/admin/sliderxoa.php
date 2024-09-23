<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoa Nhan Vien</title>
</head>
<body>
    <?php
    $id_slider = $_GET['idslider'];
    $conn= mysqli_connect("localhost","root","","cuahangtienloi");
    if(!$conn){
        die("Ket noi that bai".mysqli_connect_error());
    }else{
        $sql="DELETE FROM slider WHERE  id_slider ='".$id_slider."'";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "Delete error" .mysqli_error($conn);
        }else{
            echo"<script type='text/javascript'>alert('Xoa du lieu thanh cong');
        window.location.href ='slider.php';
        </script>";
        }
    }
    ?>
</body>
</html>