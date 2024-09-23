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
            <!-- <select name='txtlc' id="txtlc"> -->
            <select class="form-control" required="required" name="txtlc" id="">
                <option value="tenloaisp">Tên loại sản phẩm</option>
                <option value="id_loaisp">id loại sản phẩm</option>
            </select>
            <input type='text' name = 'txttimkiem' id = 'txttimkiem'></td>
        </tr>
    </table>
  </form>
  <?php
  $conn = mysqli_connect("localhost","root","","chvanphongpham");
  if(!$conn)
  {
    die("ket noi khong thanh cong");
  }
  else {
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
    {
        $tk = $_POST['txttimkiem'];
        $lc= $_POST['txtlc'];
        if($lc=="tenloaisp")
    {
        $sql = "SELECT * FROM tbl_loai_sp WHERE tenloaisp LIKE '%$tk%' ORDER BY tenloaisp";
    }
    else{
        $sql = "SELECT * FROM tbl_loai_sp WHERE id_loaisp  LIKE '%$tk%' ORDER BY id_loaisp";
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
    <th>ID loại sản phẩm</th>
    <th>Tên loại sản phẩm</th>
    <th>ID danh mục</th>
    </tr>
    </thead>
    <tbody>
    ";
    while( $row = mysqli_fetch_assoc($result))
    {
        echo"<tr>";
        echo "<td> " .$row["id_loaisp"]. "</td>";
            echo "<td> " .$row["tenloaisp"]. "</td>";
            echo "<td> " .$row["id_danhmuc"]. "</td>";
        echo  "</tr>";
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
  </body>
</html>