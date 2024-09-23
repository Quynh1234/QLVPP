<?php
include "header.php";
include "Left_side.php";
?>
 <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="qlyhoadon.php"><b>Quản lý Nhân Viên</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body" >
                    <div class="col-sm-2">
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
                
                echo "<p>QUẢN LÍ NHÂN VIÊN</p>";
                echo"<table id='customers'>";
                    echo "<thead>";
                        echo "<tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Quyền</th>
                            <th>Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>";
                    
                        while($row = mysqli_fetch_assoc($result)){
                            {
                                if($row["quyen"]!='0' && $row["quyen"]!=''){
                            echo "<tr>"; 
                                
                                echo "<td>" . $row["id_taikhoan"] . "</td>";
                                echo "<td>" . $row["ten"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["sdt"] . "</td>";
                                echo "<td>" . $row["diachi"] . "</td>";
                                echo "<td>" . $row["quyen"] . "</td>";
                                echo "<td> <a href='editNV.php?id_taikhoan=".$row["id_taikhoan"]."'class='btn btn-edit' type='button' title='Sửa'> 
                            <i class='fas fa-trash-alt'></i> </a>
                            <a href='deleteNV.php?id_taikhoan=".$row["id_taikhoan"]."'
                           onclick = \" javascript: return confirm('ban chac chan muon xoa') \" class='btn btn-delete' type='button' title='Xóa'>xóa</a> </td>
                           ";
                            echo"</tr>";
                                }
                        }
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
    <button>
        <a href = 'createAccoutNV.php'> Thêm Nhân Viên </a>                
    </button>
    </div>
    </div>
    </div>
    </div>
</body>
</html>