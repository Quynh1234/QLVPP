<?php
include "header.php";
include "Left_side.php";
?>
 <main class='app-content'>
        <div class='app-title'>
            <ul class='app-breadcrumb breadcrumb side'>
            <li class='breadcrumb-item active'><a href='MainSanpham.php'><b>DS sản phẩm</b></a></li>
            
                <li class='breadcrumb-item active'><a href='LoaisanphamMain.php'><b>DS loại sản phẩm</b></a></li>
                
            </ul>
        </div>
        <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                          <a class='btn btn-add btn-sm' href='Danhmucadd.php' title='Thêm'><i class='fas fa-plus'></i>
                            Tạo mới danh mục sản phẩm</a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='Danhmucsearch.php' title='Thêm'><i class='fas fa-plus'></i>
                            Tìm kiếm danh mục sản phẩm</a>
                        </div>
                      </div>
                    <div>
                        <?php
$conn = mysqli_connect('localhost', 'root', '', 'cuahangtienloi');
if(!$conn){
    die("Ket noi that bai" . mysqli_connect_error());
}else{
    $sql = "SELECT * FROM tbl_danhmuc";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
       echo"
                      <table id='customers'>
                        <tr>
                          <th>STT</th>
                          <th>ID danh mục</th>
                          <th>Ten danh mục</th>
                          <th>Chức năng</th>
                        </tr>";
                        $coun=0;
        while($row = mysqli_fetch_assoc($result)){
            $coun++;
            echo "<tr>";
            echo "<td> " .$coun. "</td>";
            echo "<td> " .$row["id_danhmuc"]. "</td>";
            echo "<td> " .$row['ten_danhmuc']. "</td>";

            echo "<td><a href='Danhmucdelete.php?id_danhmuc=".$row['id_danhmuc']."' class='btn btn-edit' type='button' title='Xóa'>
            <i class='fas fa-trash-alt'></i> 
              </a>
              <a href='DanhmucUpdate.php?id_danhmuc=".$row['id_danhmuc']."' class='btn btn-delete' type='button' title='Sửa'>
                <i class='fas fa-edit'></i></a>        
            </td>";
        }
        echo "</tbody>";
    }else{
        echo" Khong co du lieu";
    }
}

?>
</table>
</body>
</html>




