<?php
    $id_taikhoan =$_GET['id_taikhoan'];
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    if(!$conn){
        die("Kết nối thất bại");
    }else{
        $sql = "DELETE FROM tbltk WHERE id_taikhoan ='" .$id_taikhoan."'";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "Delete error" .mysqli_error($conn);
        }
        else{
            echo "<script type = 'text/javascript'>alert('Xóa dữ liệu thành công');
            window.location.href = 'qlNV.php';
            </script>";
        }
    }
?>