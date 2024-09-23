
<?php
include "header.php";
include "Left_side.php";
?>
<main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="qlyhoadon.php"><b>Quản lý Tài Khoản</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body" >
                    <div class="col-sm-2">
                    </div>
<form METHOD="POST">
    <table>
        <tr>
            <td><button type='submit' name='btntimkiemten'>Tim Kiem</button>
            <select name='txtlc' id="txtlc">
                <option value="ten">Tên người dùng</option>
                <option value="quyen">Quyền</option>
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
        if($lc=="ten")
    {
        $sql = "SELECT * FROM tbltk WHERE ten LIKE '%$tk%' ORDER BY ten";
    }
    else{
        $sql = "SELECT * FROM tbltk WHERE quyen  LIKE '%$tk%' ORDER BY quyen";
    }
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
{
    echo"<table id='customers'>";
    echo "<thead>";
        echo "<tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Password</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Quyền</th>
            <th>Tùy chỉnh</th>
        </tr>
    </thead>
    <tbody>";
        while($row = mysqli_fetch_assoc($result)){
          
            echo "<tr>"; 
                
                echo "<td>" . $row["id_taikhoan"] . "</td>";
                echo "<td>" . $row["ten"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["pass"] . "</td>";
                echo "<td>" . $row["sdt"] . "</td>";
                echo "<td>" . $row["diachi"] . "</td>";
                echo "<td>" . $row["quyen"] . "</td>";
                echo "<td><a href = 'edit.php?id_taikhoan=".$row["id_taikhoan"]."'>Sửa</a>
                                
                                <a onClick=\"javascript: return confirm('bạn có muốn xóa không');
                                \" href = 'deleteTk.php?id_taikhoan=".$row["id_taikhoan"]."'>Xóa </a>
                                </td>";
                echo"</tr>";
            }
    echo "</tbody>";
    echo "</table>"; 

}else {
    echo"Khong tim thay du lieu";
}
  }
}
  ?>
  <br>
  <button>
      <a href="qltk.php">Quay ve trang chủ</a>
  </button>
  </div>
  </div>
  </div>
  </div>
  </body>
</html>