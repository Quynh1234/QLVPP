<?php
include "header.php";
include "Left_side.php";
?>
<?php
    $id_slider = $_GET['idslider'];
    $tensl ="";
    $anhsl = "";
 $conn = mysqli_connect("localhost","root","","cuahangtienloi");
 if(!$conn)
 {
   die("ket noi khong thanh cong");
 }
 else {
   $sql = "SELECT * FROM slider WHERE id_slider ='".$id_slider."' ";
   $result = mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result)){
        $tensl =$row['ten_slider'];
        $anhsl = $row['anh_slider'];
    }
}
else{
    echo "<script type ='text/javascript'> alert('không có dữ liệu')
    window.location.href('slider.php');
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
                                <form method="POST" >
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Tên Slider<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" value ="<?php echo($tensl); ?>" name="slider_name"> <br>
                                    </div>
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh Slider<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="button" name="slider_anh" id="inp" onclick="upanh()" value="Up image"> <br>
                                    <img style="width: 250px; height: 100px" src="uploads/<?php echo($anhsl); ?>"> <br>
                                    </div>  
                                    
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="btn_luu" type="submit">Lưu</button>  
                                    </div>    
                                </form>  
                        </div>
                    </div>s
                </div>
            </div>
        </div>
    </main>
    <?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn_luu']))
{
    $tensl = $_POST['slider_name'];
    $anhsl = $_POST['slider_anh'];
    echo($anhsl);
    if($anhsl!="")
    {
 $sql = "UPDATE slider SET ten_slider = '".$tensl."' , anh_slider = '".$anhsl."' WHERE id_slider ='".$id_slider."' ";

    }
 else{
 $sql = "UPDATE slider SET ten_slider = '".$tensl."'  WHERE id_slider ='".$id_slider."' ";
 }
 $result = mysqli_query($conn, $sql);
 if(!$result)
 {
     echo "<script type ='text/javascript'> alert('sửa thất bại');</script>";
 }
 else
 {
     echo "<script type ='text/javascript'> alert('sửa thành công');
     window.location.href='slider.php';
     </script>";
 }

}
?>
</body>
<script type="text/javascript">
var inp = document.getElementById("inp");
function upanh(){
    inp.type = "file";
}
</script>
</html>