<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Sản Phẩm </title>
    <style type ="text/css">
        table,tr,tbody,td,th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h1>Nhập vào họ tên sinh viên để tìm kiếm: </h1>
<form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
<style>
        table, th, td{
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>
</form>
<?php

$conn=mysqli_connect('localhost','root','','cuahangtienloithi');
if(!$conn){
die('Không thể kết nối Database:' .mysql_error());
}
    if(ISSET($_POST['submit'])){
        $keyword = $_POST['search'];
?>
<div>
    <h2>Kết quả</h2>
    <?php
        $query = mysqli_query($conn, "SELECT * FROM tbl_sanpham WHERE tensp LIKE '%$keyword%' ORDER BY tensp") or die(mysqli_error());
        while($fetch = mysqli_fetch_array($query)){
    ?>
    <table>
        <thead>
        <th>ID sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Danh mục</th>
    <th>Loại sản phẩm</th>
    <th>Giá tiền</th>
    <th>Giảm giá</th>
    <th>Ảnh sản phẩm</th>
    <th>Số lượng</th>
    <th>Chi tiết sản phẩm</th>
    <th>Tình trạng</th>
        </thead>
        <tr>
         <?php   echo "<td> " .$row["id_sanpham"]. "</td>";
            echo "<td> " .$row["tensp"]. "</td>";
            echo "<td> " .$row["danhmuc_id"]. "</td>";
            echo "<td> " .$row["loaisp_id"]. "</td>";
            echo "<td> " .$row["giasp"]. "</td>";
            echo "<td> " .$row["khuyenmai"]. "</td>";
            echo "<td> " .$row["anhsp"]."</td>";
            echo "<td> " .$row["soluong"]. "</td>";
            echo "<td> " .$row["chitiet_sp"]."</td>";
            echo "<td> " .$row["tinhtrang"]. "</td>";   ?>
    </tr>
    </table>
   
        
    <?php
        }
    ?>
</div>
<?php
    }
?>
   
  
  <br>
  <a href="Mainsanpham.php">Quay ve trang tru</a>
  </body>
</html>