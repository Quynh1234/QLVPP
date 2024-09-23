<?php
include "header.php";
include "Left_side.php";
?>
<main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo danh mục mới</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng điền vào danh mục<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="cartegory_name" placeholder="Vui lòng điền vào danh mục"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
                                    <a href="DanhmucMain.php" class="btn btn-cancel">Hủy bỏ</a> </div>
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
        $ten_danhmuc = $_POST['cartegory_name'];
    $conn = mysqli_connect('localhost','root','','cuahangtienloi');
    if(!$conn){
        die("Ket noi that bai" .mysqli_connect_error());
        exit;
    } else{
        $sql = "INSERT INTO tbl_danhmuc VALUES ('','".$ten_danhmuc."')";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
        } else{
            echo "<script type='text/javascript'>alert('Thêm thành công')
            window.location.href = 'Danhmucmain.php';
            </script>";
    }
        
    }
}    
    ?>


