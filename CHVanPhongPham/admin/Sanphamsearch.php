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
            <td class="from-group col-md-3 ">
                <button type='submit' name='btntimkiemten' br>Tim Kiem</button><br> <br>
            <select class="form-control" required="required" name="txtlc" id="">
                <option value="tensp">Tên sản phẩm</option>
                <option value="id_sanpham">id sản phẩm</option>
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
        if($lc=="tensp")
    {
        $sql = "SELECT * FROM tblsanpham WHERE tensp LIKE '%$tk%' ORDER BY tensp";
    }
    else{
        $sql = "SELECT * FROM tblsanpham WHERE id_sanpham  LIKE '%$tk%' ORDER BY id_sanpham";
    }
    
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
{
    echo "<div class='row'>
    <div class='col-md-12'>
        <div class='tile'>
            <div class='tile-body'>
                <div class='row element-button'>
                    <div class='col-sm-2'>
                    <table id='customers'>;
                    </thead>
                  
    <thead>
    <tr>
    <th>ID sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Loại sản phẩm</th>
    <th>Giá tiền</th>
    <th>Giảm giá</th>
    <th>Ảnh sản phẩm</th>
    <th>Số lượng</th>
    <th>Chi tiết sản phẩm</th>
    <th>Tình trạng</th>
  </tr>
  </div>
  </div>
<div>
  
    ";
    while( $row = mysqli_fetch_assoc($result))
    {

        echo "<tr>";
         echo " <td> " .$row["id_sanpham"]. "</td>";
            echo "<td> " .$row["tensp"]. "</td>";
            echo "<td> " .$row["loaisp_id"]. "</td>";
            echo "<td> " .$row["giasp"]. "</td>";
            echo "<td> " .$row["khuyenmai"]. "</td>";
            echo "<td> " .$row["anhsp"]."</td>";
            echo "<td> " .$row["soluong"]. "</td>";
            echo "<td> " .$row["chitiet_sp"]."</td>";
            echo "<td> " .$row["tinhtrang"]. "</td> ";
           echo "</tr>";
        }
    echo "
    </tbody>
    </table>";

}else {
    echo"Khong tim thay du lieu";
}
  }
}
  ?>
  <br>
  <a href="Mainsanpham.php">Quay ve trang tru</a>
</main>
  </body>
</html>