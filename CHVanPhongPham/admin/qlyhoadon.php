<?php
include "header.php";
include "Left_side.php";
?>
      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="qlyhoadon.php"><b>Quản lý Hóa Đơn</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body" >
                    <div class="col-sm-2">
                              <a class="btn btn-add btn-sm"  title="Tìm kiếm" onclick="timkiem()"><i class="fas fa-plus"></i>
                                Tìm kiếm </a>
                            </div>
                            <br>
                        <div class="row element-button">
                            <div id= "timkiem_control"  class="admin-content-right">
                              <div class="from-group col-md-3">
                              <form method ="POST" onsubmit = "tim()">
                              <label class="control-label" for="">Lựa chọn<span id="text-date" style="color: red;">*</span></label> <br>
                              <select class="form-control select-thongke" name="select_timkiem" id="select_timkiem" onchange="luachontk()">
                                <option value="">-----Chọn------</option>
                                <option value="id_donhang">mã đơn hàng</option>
                                <option value="tongtien">Thành tiền</option>
                                <option value="date">Thời gian</option>
                              </select>
                              <br>
                                <div class="" style = "display: flex;">
                                  <input id="inptimkiem" name ="txtin" type ="text" >
                                  <div style="margin-left:10px;">  <input  name ="txtout" id="outtimkiem" type ="number" step="any">  </div>
                                </div>
                              </div>
                              <div class="from-group col-md-3"> 
                                        <button name="btntimkiem"  class="btn btn-thongke" type ="submit" style="width:100px;" >Tìm </button> 
                                  
                                  </div>    
                            </form>
                           
                            </div>
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
                              //$test = true;
                              $sql = " SELECT * FROM tbl_hoadon ";
                              if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiem']) )
                              {
                                echo "<div class='from-group col-md-3'> 
                                <button name='btnhuy'   class='btn btn-thongke'  onclick = 'huytk()'>Hủy</button>
                                </div> ";
                                $lc = $_POST["select_timkiem"];
                                $in =  $_POST["txtin"];
                                $out =  $_POST["txtout"];
                                if($lc == "id_donhang")
                                  $sql = "SELECT * FROM tbl_hoadon WHERE madonhang like '%".$in."%' ";
                                if($lc == "tongtien")
                                  $sql = "SELECT * FROM tbl_hoadon WHERE tongtien >='".$in."' AND tongtien <='".$out."' ";
                                if($lc == "date")
                                  $sql = "SELECT * FROM tbl_hoadon WHERE date >='".$in."' AND date <='".$out."' ";
                              }


                               $result = mysqli_query($conn,$sql);
                               //echo $result;
                               if(mysqli_num_rows($result)>0)
                           {
                            echo"<table id='customers'>
                            <tr>
                              <th>STT</th>
                              <th>ID hóa đơn</th>
                              <th>ID Đơn hàng</th>
                              <th>Thành tiền</th>
                              <th>Thời gian</th>
                              <th> chức năng</th>
                            </tr>";

                                $count = 0;
                                while( $row = mysqli_fetch_assoc($result))
                                {
                                    $count++;
                                    echo "<br> <tr>";
                                    echo "<td>".$count."</td>";
                                    echo "<td>".$row["id_hoadon"]."</td>";
                                    echo "<td>".$row["madonhang"]."</td>";
                                    echo"<td>".$row["tongtien"]."</td>";
                                    echo"<td>".$row["date_thongke"]."</td>";
                                    echo "<td> <a href='qlyhoadonsua.php?idhd=".$row["id_hoadon"]."'class='btn btn-edit' type='button' title='Sửa'> <i class='fas fa-edit'></i> 
                                     </a>
                                    <a href='qlyhoadonxoa.php?idhd=".$row["id_hoadon"]."'
                                   onclick = \" javascript: return confirm('ban chac chan muon xoa') \" class='btn btn-delete' type='button' title='xóa'> <i class='fas fa-trash-alt'></i> </a> </td>
                                   ";
                                }

                           }
                        }
                      
                            ?>
                            </table>
</div>
</div>
</div>
</div>
<script type ="text/javascript">
  var divtimkiem = document.getElementById('timkiem_control');
  var luachon = document.getElementById('select_timkiem');
  var inp = document.getElementById('inptimkiem');
  var out = document.getElementById('outtimkiem');
  window.onload = function() {
  divtimkiem.style.display = 'none';
  out.style.display = 'none';
}
function timkiem(){
  divtimkiem.style.display = 'block';
}
function luachontk(){
  console.log(luachon.value);
  if(luachon.value =="")
  {
    //inp.style.display == "none";
    out.style.display = 'none';
  }
else{
  if(luachon.value == "madonhang")
  {
    inp.type = "number";
    inp.step = '1';
    out.style.display = 'none';
   
  }
 if(luachon.value == "tongtien")
  {
    inp.type = "number";
    inp.step = "any";
    out.style.display = 'block';
  }
  if(luachon.value == "date")
  {
    inp.type = "date";
    out.type ="date";
    out.style.display = 'block';
  }
}
}
function tim(){
 console.log("âđa");
}
function huytk(){
  window.location.href = "qlyhoadon.php";
}

</script>
</body>
</html>