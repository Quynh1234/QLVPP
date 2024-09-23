<?php
include "header.php";
include "Left_side.php";
?>
<main class='app-content'>
        <div class='app-title'>
            <ul class='app-breadcrumb breadcrumb side'>
            <li class='breadcrumb-item active'><a href='MainSanpham.php'><b>DS sản phẩm</b></a></li>
                <li class='breadcrumb-item active'><a href='DanhmucMain.php'><b>DS danh mục</b></a></li>
                <li class='breadcrumb-item active'><a href='LoaisanphamMain.php'><b>DS loại sản phẩm</b></a></li>
                
            </ul>
        </div>
        <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                          <a class='btn btn-add btn-sm' href='Sanphamadd.php' title='Thêm'><i class='fas fa-plus'></i>
                            Tạo mới sản phẩm</a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='Sanphamsearch.php' title='Thêm'><i class='fas fa-plus'></i>
                            Tìm kiếm sản phẩm</a>
                        </div>
                      </div>
                    <div>
                      <table id='customers'>
                        <tr>
                          <th>ID sản phẩm</th>
                          <th>Tên sản phẩm</th>
                          <th>ID Loại sản phẩm</th>
                          <th>Giá tiền</th>
                          <th>Giảm giá</th>
                          <th>Ảnh sản phẩm</th>
                          <th>Số lượng</th>
                          
                          <th>Tình trạng</th>
                          <th>Chức năng</th>
                        </tr>
                   
    <?php
$conn = mysqli_connect('localhost', 'root', '', 'chvanphongpham');
if(!$conn){
    die("Ket noi that bai" . mysqli_connect_error());
}else{
    $sql = "SELECT * FROM tblsanpham";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td> " .$row["id_sanpham"]. "</td>";
            echo "<td> " .$row["tensp"]. "</td>";
            echo "<td> " .$row['loaisp_id']. "</td>";
            echo "<td> " .$row["giasp"]. "</td>";
            echo "<td> " .$row["khuyenmai"]. "</td>";
            echo "<td>  <img src='uploads/".$row["anhsp"]."' alt='' width='100px;'></td>";
            echo "<td> " .$row["soluong"]. "</td>";
            
            echo "<td><a href='Sanphamdelete.php?id_sanpham=".$row['id_sanpham']."' class='btn btn-edit' type='button' title='Xóa'>
            <i class='fas fa-trash-alt'></i> 
              </a>
              <a href='SanphamUpdate.php?id_sanpham=".$row['id_sanpham']."' class='btn btn-delete' type='button' title='Sửa'>
                <i class='fas fa-edit'></i></a>        
            </td>";
        }
        echo "</tbody>";
    }else{
        echo" Khong co du lieu";
    }
}

?>
    </div>
</div>
</div>

</div>
  </main>   
</body>
</html>




