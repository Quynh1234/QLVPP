<?php
include "header.php";
include "Left_side.php";
?>
    <?php
    $id_sanpham = $_GET['id_sanpham'];
    $tensp =" ";
    $conn = mysqli_connect("localhost", "root","","chvanphongpham");
    if(!$conn){
        die("Ket noi that bai".mysqli_connect_error());
    }else{
        $sql = "SELECT * FROM tblsanpham WHERE id_sanpham ='".$id_sanpham."'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $tensp = $row["tensp"] ;
                $loaisp_id =  $row["loaisp_id"] ;
                $giasp=  $row["giasp"];
                $giamgia =  $row["khuyenmai"];
                $soluong =  $row["soluong"];
                $sanpham_anh= $row["anhsp"];
                $tinhtrang =  $row["tinhtrang"];
                $chitiet_sp = $row["chitiet_sp"];
            }

        }else{
            echo"Khong co du lieu";
        }
        $sql1 = "SELECT * FROM tbl_loai_sp WHERE id_loaisp ='".$loaisp_id."'";
        $result1 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0){
            while($row=mysqli_fetch_assoc($result1)){
                $ten_loaisp= $row["tenloaisp"];
            }

        }else{
            echo"Khong co du lieu";
        }

    }
    ?>
     <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Sửa sản phẩm</h3>
                    <div class="tile-body">
                        
                          <div class="admin-content-right">
                                <form  method="POST">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" value="<?php echo $tensp ?>" required type="text" name="sanpham_tieude"> <br>
                                    </div>
                              
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                                  <select class="form-control"  required="required" name="loaisp_id" id="loaisp_id">
                                    <?php
                                         $conn = mysqli_connect("localhost", "root", "", "cuahangtienloi");
                                           if(!$conn){
                                            die("Ket noi that bai" .mysqli_connect_error());
                                            exit;
                                        }
                                        $sql2 = "SELECT * FROM tbl_loai_sp WHERE id_loaisp = '".$loaisp_id."'";
                                        $result2 = mysqli_query($conn, $sql2 );
                                        if(mysqli_num_rows($result2)>0){
                                          while( $row = mysqli_fetch_assoc($result2))
                                          {
                                            echo" <option value='".$row["id_loaisp"]."' "; ($loaisp_id == '".$row["id_loaisp"]".') ? "selected" : ''; echo">".$row["tenloaisp"]."</option>";
                                            
                                    }} 
                                            ?>
                                  </select>
                                </div> 
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Số lượng<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $soluong ?>" required type="text" name="soluong"> <br>
                                  </div>
                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Giảm giá<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $giamgia ?>" required type="text" name="giamgia"> <br> </div>

                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $giasp ?>" required type="text" name="sanpham_gia"> <br> </div>

                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Tình trạng<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="tinhtrang" id="">
                                    <option value="">--Chọn--</option>
                                        <?php
                                          if($tinhtrang==1){
                                        ?>
                                        <option value="1" selected>Còn Hàng</option>
                                        <option value="0">Hết Hàng</option>
                                        <?php 
                                          }else {
                                        ?>
                                        <option value="1">Còn Hàng</option>
                                        <option value="0" selected>Hết Hàng</option>
                                        <?php 
                                          }
                                          ?>                                                                               
                                    </select>
                                  </div>                                                                               
                                    </select>
                                  </div>
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" name="sanpham_anh"> <br>
                                    <img style="width: 100px; height: 100px" src="uploads/<?php echo($sanpham_anh); ?>"> <br>  </div>  
                                 </div> 
                                    <div class="from-group col-12"> 
                                        <label class="control-label" for="">Chi tiết<span style="color: red;">*</span></label> <br>
                                        <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"><?php echo $chitiet_sp ?></textarea><br>
                                        <!-- <input class="form-control" required type="text" name="sanpham_chitiet">  -->
                                      </div> 
                                </div>
                                <tr>
                                <div>
                                       <button type ="submit"  name ="btnGhi" id ="btnGhi">Sua du lieu</button>
                                </div>
                                </form>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
      if ($_SERVER['REQUEST_METHOD']== "POST" and isset ($_POST['btnGhi'])){
        $tensp = $_POST['sanpham_tieude'];
        $loaisp_id = $_POST['loaisp_id'];
        $soluong = $_POST['soluong'];
        $giamgia = $_POST['giamgia'];
        $giasp = $_POST['sanpham_gia'];
        $tinhtrang = $_POST['tinhtrang'];
        $anhsp = $_POST['sanpham_anh'];
        $chitiet = $_POST['sanpham_chitiet'];
     $conn = mysqli_connect("localhost","root","","cuahangtienloi");
     if(!$conn){
        die("Ket noi that bai".mysqli_connect_error());
     }else{
        $sql="UPDATE tblsanpham SET tensp = '".$tensp."',loaisp_id='".$loaisp_id."',soluong= '".$soluong."',khuyenmai='".$giamgia."',giasp='".$giasp."',tinhtrang='".$tinhtrang."',anhsp='".$anhsp."',chitiet_sp='".$chitiet."' WHERE id_sanpham ='".$id_sanpham."'";
        $result = mysqli_query($conn,$sql);
        echo($sql);
        echo($result);
        if(!$result){
            echo "<script type='text/javascript'>alert('Cap nhat that bai')</script>";
        } else{
            echo "<script type='text/javascript'>alert('Cap nhat thanh cong')
            window.location.href = 'Mainsanpham.php';
            </script>";
    }
        }
    } 
    ?>
</body>
</html>