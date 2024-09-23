<?php
include "header.php";
include "Left_side.php";
?>
<?php
    $idhd = $_GET['idhd'];
    $iddh ="";
    $thanhtien = "";
    $thoigian = "";
 $conn = mysqli_connect("localhost","root","","cuahangtienloi");
 if(!$conn)
 {
   die("ket noi khong thanh cong");
 }
 else {
   $sql = "SELECT * FROM tbl_hoadon WHERE id_hoadon ='".$idhd."' ";
   $result = mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result)){
   
    $iddh = $row['id_donhang'];
    $thanhtien = $row['tongtien'];
    $thoigian = $row['date'];
    }
}
else{
    echo "<script type ='text/javascript'> alert('không có dữ liệu')
    window.location.href('qlyhoadon.php');
    </script>";
}
 }


?>
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Sửa loại sản phẩm</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    
                                    <div class="from-group col-md-3">
                                        <label class="control-label" for="">ID đơn hàng<span style="color: red;">*</span></label> <br>
                                        <input class="form-control"  type="text" value="<?php echo $iddh ?>" name="txtiddh"> <br>
                                      </div>
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Thành tiền<span style="color: red;">*</span></label> <br>
                                      <input class="form-control"  type="text" value="<?php echo $thanhtien ?>" name="txttongtien"> <br>
                                    </div>
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Thời gian <span style="color: red;">*</span></label> <br>
                                      <input class="form-control"  type="date" value="<?php echo $thoigian ?>" name="txtthoigian"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="btn_luu" type="submit">Lưu</button>  
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn_luu']))
{
    $iddh = $_POST['txtiddh'];
    $thanhtien = $_POST['txttongtien'];
    $thoigian = $_POST['txtthoigian'];
 $conn = mysqli_connect("localhost","root","","cuahangtienloi");
 if(!$conn)
 {
     die("ket noi that bai");
     exit;
 }
 $sql = "UPDATE tbl_hoadon SET id_donhang = '".$iddh."',tongtien = '".$thanhtien."' , date = '".$thoigian."'  WHERE id_hoadon = '".$idhd."'";
 $result = mysqli_query($conn, $sql);
 if(!$result)
 {
     echo "<script type ='text/javascript'> alert('sửa thất bại');</script>";
 }
 else
 {
   
     echo "<script type ='text/javascript'> alert('sửa thành công');
     window.location.href='qlyhoadon.php';
     </script>";
 }

}
?>
</body>
</html>