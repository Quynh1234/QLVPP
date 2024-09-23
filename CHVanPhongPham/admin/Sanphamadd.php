<?php
include "header.php";
include "Left_side.php";
?>


<main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo mới sản phẩm</h3>
                    <div class="tile-body">
                        
                          <div class="admin-content-right">
                                <form method="POST">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="sanpham_tieude"> <br>
                                    </div>
                                      <div class="from-group col-md-3">
                                    <label class="control-label" for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required"  name="loaisanpham_id" id="loaisanpham_id">
                                        <option value="">--Chọn--</option>
                                        <?php
                                         $conn = mysqli_connect("localhost", "root", "", "cuahangtienloi");
                                           if(!$conn){
                                            die("Ket noi that bai" .mysqli_connect_error());
                                            exit;
                                        }
                                        $sql2 = "SELECT * FROM tbl_loai_sp";
                                        $result2 = mysqli_query($conn, $sql2 );
                                        if(mysqli_num_rows($result2)>0){
                                          while( $row = mysqli_fetch_assoc($result2))
                                          {
                                            echo"<option value='".$row["id_loaisp"]."'>".$row["tenloaisp"]."</option>";
                                    }} 
                                            ?>
                                      </select>       
                                    </div>
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Số lượng<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="text" name="soluong"> <br>
                                  </div>
                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Giảm giá<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="text" name="giamgia"> <br> </div>

                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="text" name="sanpham_gia"> <br> </div>

                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Tình trạng<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="tinhtrang" id="">
                                        <option value="">--Chọn--</option>
                                        <option value="1">Còn Hàng</option>
                                        <option value="0">Hết Hàng</option>
                                    </select>
                                  </div>
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" name="sanpham_anh"> <br> </div>  
                                  <div class="from-group col-12"> 
                                        <label class="control-label" for="">Chi tiết<span style="color: red;">*</span></label> <br>
                                       <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"></textarea><br>  
                                      </div> 
                                  <div>
                                      <button type="submit" id="btnGhi" name = "btnGhi">ghi du lieu</button>    
                                  </div>      
                              </form>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnGhi'])){
    $tensp = $_POST['sanpham_tieude'];
    $id_loaisp = $_POST['loaisanpham_id'];
    $soluong = $_POST['soluong'];
    $giamgia = $_POST['giamgia'];
    $giasp = $_POST['sanpham_gia'];
    $tinhtrang = $_POST['tinhtrang'];
    $anhsp = $_POST['sanpham_anh'];
    $id_danhmuc = "";
    $chitiet = $_POST['sanpham_chitiet'];
    $conn = mysqli_connect("localhost", "root", "", "chvanphongpham");
    if(!$conn){
        die("Ket noi that bai" .mysqli_connect_error());
        exit;
    }
    
    $sql = "INSERT INTO tblsanpham VALUES ('','".$tensp."','".$id_loaisp."','".$giasp."','".$giamgia."','".$anhsp."','".$soluong."','".$chitiet."','".$tinhtrang."')";
    echo($sql);
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
    } else{
        echo "<script type='text/javascript'>alert('Thêm thành công')
        window.location.href ='Mainsanpham.php';
        </script>";
}
    
}

?>


</body>
</html>