<?php
// include "header.php";
// include "leftside.php";
include './Config/connect.php';
?>
<?php
if (isset($_GET['id_khachhang'])|| $_GET['id_khachhang']!=NULL){
    $id_khachhang = $_GET['id_khachhang'];
    }
    $sql = "DELETE FROM tblkhachhang WHERE id_khachhang = '".$id_khachhang."'";
    $result = mysqli_query($conn, $sql);
    
    header('Location:registerKH.php');
?>
