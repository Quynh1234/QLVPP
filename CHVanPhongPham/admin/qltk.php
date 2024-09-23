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
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                          <a class='btn btn-add btn-sm' href='createAccoutNV.php' title='Thêm'><i class='fas fa-plus'></i>
                            Thêm nhân viên</a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='timkiemTK.php' title='Tìm'><i class='fas fa-plus'></i>
                            Tìm kiếm </a>
                        </div>
                       
                      </div>
    <?php
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    if(!$conn){
        die("Kết nối không thành công");
    }
    else{
        $sql = "SELECT * FROM tbltk";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
                
                echo "<p>File QUẢN LÍ TÀI KHOẢN</p>";
                echo"<table id='customers'>";
                    echo "<thead>";
                        echo "<tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tùy chỉnh</th>
                            <th>Quyền</th>
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
                            
                            echo "<td> <a href='edit.php?id_taikhoan=".$row["id_taikhoan"]."'class='btn btn-edit' type='button' title='Sửa'> 
                            <i class='fas fa-trash-alt'></i> </a>
                            <a href='deleteTk.php?id_taikhoan=".$row["id_taikhoan"]."'
                           onclick = \" javascript: return confirm('ban chac chan muon xoa') \" class='btn btn-delete' type='button' title='Xóa'>xóa</a> </td>
                           ";
                           echo "<td>" . $row["quyen"] . "</td>";
                           echo"</tr>";
                        }
                    echo "</tbody>";
                    echo "</table>"; 
                    
                    
        }
        else{
            echo "Khong co ban ghi";
        }
    }
?> 
</div>
    
    </div>
</div>
</div>

</div>
</main>
</body>
</html>