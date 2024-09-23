<?php
include "header.php";
include "Left_side.php";
?>
<?php
    $id_danhmuc =$_GET['id_danhmuc'];
    $conn = mysqli_connect("localhost", "root","","cuahangtienloi");
    if(!$conn){
        die("Ket noi that bai".mysqli_connect_error());
    }else{
        $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc ='".$id_danhmuc."'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $ten_danhmuc = $row["ten_danhmuc"];
               
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
                   <h3 class="title-h3">Sửa danh mục</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng điền vào danh mục<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" type="text" name="danhmuc_ten" value="<?php echo $ten_danhmuc ?>"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Sửa</button>  
                                    <a href="cartegorylist.php" class="btn btn-cancel">Hủy bỏ</a> </div>
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
           if ($_SERVER['REQUEST_METHOD']== "POST" and isset ($_POST['submit'])){
             $ten_danhmuc = $_POST['danhmuc_ten'];
          $conn = mysqli_connect("localhost","root","","cuahangtienloi");
          if(!$conn){
             die("Ket noi that bai".mysqli_connect_error());
          }else{
             $sql="UPDATE tbl_danhmuc SET ten_danhmuc = '".$ten_danhmuc."'  WHERE id_danhmuc ='".$id_danhmuc."'";
             $result = mysqli_query($conn,$sql);
             if(!$result){
                 echo "<script type='text/javascript'>alert('Cap nhat that bai')</script>";
             } else{
                 echo "<script type='text/javascript'>alert('Cap nhat thanh cong')
                 window.location.href = 'DanhmucMain.php';
                 </script>";
         }
             }
         }  
        ?>
    </main>
