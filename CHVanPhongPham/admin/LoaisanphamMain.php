<?php
include "header.php";
include "Left_side.php";
?>
    <?php
$conn = mysqli_connect('localhost', 'root', '', 'chvanphongpham');
if(!$conn){
    die("Ket noi that bai" . mysqli_connect_error());
}else{
    $sql = "SELECT * FROM tbl_loai_sp";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
       echo"  
       <main class='app-content'>
       <div class='app-title'>
       <ul class='app-breadcrumb breadcrumb side'>
       <li class='breadcrumb-item active'><a href='MainSanpham.php'><b>DS sản phẩm</b></a></li>
           <li class='breadcrumb-item active'><a href='DanhmucMain.php'><b>DS danh mục</b></a></li>
       </ul>
       </div>
       <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                          <a class='btn btn-add btn-sm' href='Loaisanphamadd.php' title='Thêm'><i class='fas fa-plus'></i>
                            Tạo mới loại sản phẩm</a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='Loaisanphamsearch.php' title='Thêm'><i class='fas fa-plus'></i>
                            Tìm Kiếm loại sản phẩm</a>
                        </div>
                      </div>
                    <div>
                      <table id='customers'>
                        <tr>
                          <th>STT</th>
                          <th>ID loai san pham</th>
                          <th>ID danh mục</th>
                          <th>Ten loại sản phẩm</th>
                          <th>Chức năng</th>
                        </tr>";
                        $coun=0;
        while($row = mysqli_fetch_assoc($result)){
            $coun++;
            echo "<tr>";
            echo "<td> " .$coun. "</td>";
            echo "<td> " .$row["id_loaisp"]. "</td>";
            echo "<td> " .$row['id_danhmuc']. "</td>";
            echo "<td> " .$row['tenloaisp']. "</td>";
            echo "<td><a href='Loaisanphamdelete.php?id_loaisp=".$row['id_loaisp']."' class='btn btn-edit' type='button' title='Xóa'>
            <i class='fas fa-trash-alt'></i> 
              </a>
              <a href='Loaisanphamupdate.php?id_loaisp=".$row['id_loaisp']."' class='btn btn-delete' type='button' title='Sửa'>
                <i class='fas fa-edit'></i></a>        
            </td>";
        }
        echo "</tbody>";
    }else{
        echo" Khong co du lieu";
    }
}

?>
</body>
</html>




