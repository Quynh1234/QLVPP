<?php
include "header.php";
include "Left_side.php";
?>
<main class='app-content'>
        <div class='app-title'>
            <!-- <ul class='app-breadcrumb breadcrumb side'>
            <li class='breadcrumb-item active'><a href='MainSanpham.php'><b>DS sản phẩm</b></a></li>
                <li class='breadcrumb-item active'><a href='DanhmucMain.php'><b>DS danh mục</b></a></li>
                <li class='breadcrumb-item active'><a href='LoaisanphamMain.php'><b>DS loại sản phẩm</b></a></li>
                
            </ul> -->
        </div>
        <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                        <div class='col-sm-2'>
<form METHOD="POST">
    <table>
        <tr>
            <td class="from-group col-md-3"><button type='submit' name='btntimkiemten'>Tim Kiem</button><br><br>
            <select class="form-control" required="required" name="txtlc" id="">
                <option value="ten_danhmuc">Tên danh mục</option>
                <option value="id_danhmuc">id danh mục</option>
            </select>
            <input type='text' name = 'txttimkiem' id = 'txttimkiem'></td>
        </tr>
    </table>
  </form>
  <?php
  $conn = mysqli_connect("localhost","root","","cuahangtienloi");
  if(!$conn)
  {
    die("ket noi khong thanh cong");
  }
  else {
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
    {
        $tk = $_POST['txttimkiem'];
        $lc= $_POST['txtlc'];
        if($lc=="ten_danhmuc")
    {
        $sql = "SELECT * FROM tbl_danhmuc WHERE ten_danhmuc LIKE '%$tk%' ORDER BY ten_danhmuc";
    }
    else{
        $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc  LIKE '%$tk%' ORDER BY id_danhmuc";
    }
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
{
    echo"<br>";
    echo "<div class='row'>
    <div class='col-md-12'>
        <div class='tile'>
            <div class='tile-body'>
                <div class='row element-button'>
                    <div class='col-sm-2'>
                    <table id='customers'>;
                    </thead>
    <tr>
    <th>ID danh mục</th>
    <th>Tên danh mục</th>
    </tr>
    </thead>
    <tbody>
    ";
    while( $row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td> " .$row["id_danhmuc"]. "</td>";
            echo "<td> " .$row["ten_danhmuc"]. "</td>";
    echo "</tr>";
    }
    echo"
    </tbody>
    </table>";
    
}else {
    echo"Khong tim thay du lieu";
}
  }
}

  ?>
  <br>
  <a href="DanhmucMain.php">Quay ve trang tru</a>
</main>
  </body>
</html>