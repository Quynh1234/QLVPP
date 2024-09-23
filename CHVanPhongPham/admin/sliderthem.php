<?php
include "header.php";
include "Left_side.php";
?>

<main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo mới Slider</h3>
                    <div class="tile-body">
                        
                          <div class="admin-content-right">
                            
                                <form method="POST" >
                                    <div class="product-add-content git">

                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Tên Slider<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="slider_name"> <br>
                                    </div>

                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh Slider<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" name="slider_image"> <br> </div>  
                                    
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Tình trạng<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="type" id="">
                                        <option value="">--Chọn--</option>
                                        <option value="1">off</option>
                                        <option value="0">On</option>
                                    </select>
                                  </div>
                                  <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="btn_luu" type="submit">Gửi</button>  
                                    <a href="slider.php" class="btn btn-cancel">Hủy bỏ</a>
                                  </div>
                                </div>
                                </form>
                                <?php
                                 $conn = mysqli_connect("localhost","root","","cuahangtienloi");
                                 if(!$conn)
                                 {
                                   die("ket noi khong thanh cong");
                                 }
                                 else {
                                 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn_luu']))
                                {
                                    $ten = $_POST['slider_name'];
                                    $anh= $_POST['slider_image'];
                                    $type= $_POST['type'];
                                $conn = mysqli_connect("localhost","root","","cuahangtienloi");
                                if(!$conn)
                                {
                                    die("ket noi that bai");
                                    exit;
                                }
                                $sql = "INSERT INTO slider (ten_slider, anh_slider, type)
                                VALUES ('".$ten."', '".$anh."', '".$type."');";
                                $result = mysqli_query($conn, $sql);
                                if(!$result)
                                {
                                    echo "<script type ='text/javascript'> alert('Thêm thất bại');</script>";
                                }
                                else
                                {
                                
                                    echo "<script type ='text/javascript'> alert('Thêm thành công');
                                    window.location.href='slider.php';
                                    </script>";
                                }
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
<!-- <script src="js/main.js"></script> -->
</html>
