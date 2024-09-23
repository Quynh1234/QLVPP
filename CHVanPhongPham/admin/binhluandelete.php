<?php
// include "header.php";
// include "leftside.php";
include './Config/connect.php';
?>
<?php
if (isset($_GET['id_binhluan'])|| $_GET['id_binhluan']!=NULL){
    $id_binhluan = $_GET['id_binhluan'];
    }
    // $sql = "DELETE FROM tblbinhluan WHERE id_binhluan = '".$id_binhluan."'";
    $sql = "ALTER TABLE tblbinhluan DROP COLUMN binhluan";
    $result = mysqli_query($conn, $sql);
    
    header('Location:binhluanAll.php');
?>
