<?php
include "header.php";
include "Left_side.php";
?>

<main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="Sanphamlist.php"><b>Danh sách Slider</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="Sliderthem.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới Slider</a>
                            </div>
                          </div>
                        <div>
                          
                            <?php
                             $conn = mysqli_connect("localhost","root","","cuahangtienloi");
                             if(!$conn)
                             {
                               die("ket noi khong thanh cong");
                             }
                             else {
                              $sql = " SELECT * FROM slider ";
                               $result = mysqli_query($conn,$sql);
                               if(mysqli_num_rows($result)>0)
                           {
                            echo"<table id='customers'>
                            <tr>
                              <th>STT</th>
                              <th>ID Slider</th>
                              <th>Tên Slider</th>
                              <th>Ảnh Slider</th>
                              <th>Tình trạng</th>
                              <th>Chức năng</th>
                            </tr>";

                                $count = 0;
                                while( $row = mysqli_fetch_assoc($result))
                                {
                                    $count++;
                                    echo "<br> <tr>";
                                    echo "<td>".$count."</td>";
                                    echo "<td>".$row["id_slider"]."</td>";
                                    echo "<td>".$row["ten_slider"]."</td>";
                                    echo"<td><img src='uploads/".$row["anh_slider"]."' alt='' width='100px;'></td>";
                                    echo"<td> ";
                                    
                                    $type = $row["type"];
                                    if($type == 1){
                                        echo"<a href='?type_slider=".$row["id_slider"]." &type= 0'><span class='badge bg-danger'>Off</span></a>";
                                        }else{
                                        echo" <a href='?type_slider=".$row["id_slider"]." &type= 1'><span class='badge bg-success'>On</span></a>"; 
                                        } 
                                     echo"</td>";
                                    echo "<td> <a href='slidersua.php?idslider=".$row["id_slider"]."'class='btn btn-edit' type='button' title='Sửa'> 
                                    <i class='fas fa-edit'></i> </a>
                                    <a href='sliderxoa.php?idslider=".$row["id_slider"]."'
                                   onclick = \" javascript: return confirm('ban chac chan muon xoa') \" class='btn btn-delete' type='button' title='xóa'> <i class='fas fa-trash-alt'></i> </a> </td>
                                   ";
                                }

                           }
                        }
                      
                            ?>
                            </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>