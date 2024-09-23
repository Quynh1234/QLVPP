<?php
include "header.php";
include "Left_side.php";
?>
<main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo loại sản phẩm mới</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                        <label class="control-label" for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                                        <select class="form-control" required="required" name="danhmuc_id" id="">
                                        <option value="">--Chọn--</option>
                                        <?php
                                         $conn = mysqli_connect("localhost", "root", "", "chvanphongpham");
                                           if(!$conn){
                                            die("Ket noi that bai" .mysqli_connect_error());
                                            exit;
                                        }
                                        $sql2 = "SELECT * FROM tbl_danhmuc";
                                        $result2 = mysqli_query($conn, $sql2 );
                                        if(mysqli_num_rows($result2)>0){
                                          while( $row = mysqli_fetch_assoc($result2))
                                          {
                                            echo"<option value='".$row["id_danhmuc"]."'>".$row["ten_danhmuc"]."</option>";
                                    }} 
                                            ?>
                                        </select> 
                                      </div>
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng chọn loại sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="loaisanpham_name" placeholder="Vui lòng chọn loại sản phẩm"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
                                    <a href="LoaisanphamMain.php" class="btn btn-cancel">Hủy bỏ</a> </div>
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
         if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])){
            $id_danhmuc = $_POST["danhmuc_id"];
            $tenloaisp = $_POST['loaisanpham_name'];
            echo $id_danhmuc;
        $conn = mysqli_connect('localhost','root','','cuahangtienloi');
        if(!$conn){
            die("Ket noi that bai" .mysqli_connect_error());
            exit;
        } else{
            $sql = "INSERT INTO tbl_loai_sp VALUES ('','".$tenloaisp."','".$id_danhmuc."')";
            $result = mysqli_query($conn,$sql);
            if(!$result){
                echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
            } else{
                echo "<script type='text/javascript'>alert('Thêm thành công')
                window.location.href = 'LoaisanphamMain.php';
                </script>";
        }
    } 
}   
    ?>
</body>
</html>