<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
  <link rel="stylesheet" type="text/css" href="./css/base.css">
  <link rel="stylesheet" type="text/css" href="./css/css.css">
  <link rel="stylesheet" type="text/css" href="./css/error_page.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/responsive.scss">
  <link rel="stylesheet" type="text/css" href="./css/util.css">
  <link rel="stylesheet" type="text/css" href="./themify-icons-font/themify-icons/themify-icons.css">
</head>
<body>
    
</body>
</html>

<?php 
  //include "header.php";
  
  include "session.php";
  
    session_start();
    //$index = new index();

    function show_register($id){
        $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        $query = "SELECT * FROM tblkhachhang WHERE id_khachhang = '$id'"; // nếu lấy được id qua session
       // $query = "SELECT * FROM tblkhachhang ";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    function show_payment($session_id) {
        $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        $query = "SELECT * FROM tbl_payment WHERE session_idA = '$session_id' ORDER BY payment_id DESC LIMIT 1";
       // $query = "SELECT * FROM tbl_payment";
        $result = mysqli_query($conn,$query);
        return $result;
    }

     function show_Cart_detaill($session_id){
        $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        $query = "SELECT * FROM tbl_donhang WHERE session_idA = '$session_id' ORDER BY carta_id DESC";
       // $query = "SELECT * FROM tbl_donhang";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    // ========  update lại đơn hàng ==================
     function update_order($status,$session_idA){
        $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        $query = "UPDATE tbl_payment SET status = '$status' WHERE session_idA = '$session_idA'";
        $result =mysqli_query($conn,$query);
        // header('Location:orderlist.php');
        return $result;
    }


  if (isset($_GET['status'])){
    $status = $_GET['status'];
    $session_idA = $_GET['session_idA'];
    // cap nhat don hang
    $update_order = update_order($status,$session_idA);

    }
?>

    <section class="detail">
        <div class="rowB">
            <div class="detail-top">
                <h3>CHI TIẾT ĐƠN HÀNG</h3>
            </div>
            <h1>Mã đơn hàng:<span style="font-size: 20px; color: #378000;"> <?php $session_id = session_id();
    $ma = substr($session_id,0,8); echo $ma   ?></span></h1>
            <div class="detail-text">
                <div class="detail-text-left-content">
                    <p><span style="font-weight: bold; color:red">Thông tin giao hàng</span></p>
                    <br>
                    <?php 
                           $id = Session::get('register_id');
                           //$session_id = session_id();
                           $get_register = show_register($id);
                          if($get_register){while($result = $get_register->fetch_assoc()){
                        ?>
                    <p><span style="font-weight: bold;">Họ và tên</span>: <?php echo $result['ten'] ?></p>
                    <p><span style="font-weight: bold;">Số ĐT</span>: <?php echo $result['sdt'] ?></p>
                    <p><span style="font-weight: bold;">Địa chỉ</span>: <?php echo $result['diachi'] ?></p>
                    <?php
                      }}
                    ?>
                    <?php
                      $show_payment = show_payment($session_id);
                      if($show_payment){while($result = $show_payment->fetch_assoc()){
                    ?>
                    <p><span style="font-weight: bold;">Phương thức giao hàng</span>: <?php echo $result['giaohang']  ?></p>
                    <p><span style="font-weight: bold;">Phương thức thanh toán</span>: <?php echo $result['thanhtoan']  ?></p>
                    <p><span style="font-weight: bold;">Tình trạng đơn hàng của bạn</span>: 
                    <?php if($result['status']== '0'){
                                echo 'Đang xử lý';
                            }elseif($result['status']== 1){
                    ?>
                        <a href="?status=2&session_idA=<?php echo $result['session_idA'] ?>">Đang giao hàng</a> 
                    <?php 
                            }else {
                                $thanhtien = Session::get('TT');
                                $thanhtien= str_replace(',', '', $thanhtien); // Loại bỏ các dấu phẩy
                                $float = floatval($thanhtien);
                                echo($thanhtien);
                                $float = floatval($thanhtien);
                                echo($float);
                                echo 'Đã nhận hàng';
                            $ID = $result['payment_id'];
                            $conn = mysqli_connect("localhost","root","","cuahangtienloi");
                            $sql1 = "SELECT * FROM tbl_payment WHERE payment_id = '".$ID."'";
                            $result1 = mysqli_query($conn,$sql1);
                            if(mysqli_num_rows($result1)>0)
                        {
                            while( $row = mysqli_fetch_assoc($result1))
                            {
                                $sql3tk ="INSERT INTO tbl_hoadon VALUES('','".$row["code_oder"]."','".$float."','".$row["order_date"]."')";
                                $result2tk = mysqli_query($conn,$sql3tk);
                                echo($sql3tk);
                            }
                        }
                        }
                    ?></p>
                    <?php
                      }}
                    ?>
                </div>  
                <div class="detail-text-right-content">
                    <p><span style="font-weight: bold;color:red">Thông tin đơn hàng hàng</span></p>
                    <br>
                    <div class="detail-text-right">
                        <table>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                
                                
                                <th>SL</th>
                                <th>Giá</th>
                            </tr>
                            <?php
                          
                               $SL = 0;
                               $TT = 0;
                               $show_carta = show_Cart_detaill($session_id);
                               if($show_carta){while($result = $show_carta->fetch_assoc()){
                            ?>   
                            <tr>
                               <td><img src="<?php echo $result['sanpham_anh'] ?>" alt=""></td>
                               <td><p><?php echo $result['sanpham_tieude'] ?></p></td>
                               
                               
                               <td><span><?php echo $result['quantitys'] ?></span></td>
                               <td><p><?php $resultC = number_format($result['sanpham_gia']); echo $resultC ?><sup>đ</sup></p></td>
                               <?php $a = (int)$result['sanpham_gia']; $b = (int)$result['quantitys']; $TTA = $a*$b;   ?>
                           </tr>
                          <?php
                           $SL = $SL + $result['quantitys'];
                           $TT =  $TT  + $TTA ;
                           
                               }}
                          ?>

                        </table>
                    </div>
                    <div class="detail-content-right-bottom">
                        <table>
                            <tr>
                                <th colspan="2">
                                    <p>TỔNG TIỀN GIỎ HÀNG</p>
                                </th>
                            </tr>
                            <tr>
                                <td>TỔNG SẢN PHẨM</td>
                                <td><?php $resultC = number_format($SL); echo $resultC ?></td>
                            </tr>
                            <tr>
                                <td>TỔNG TIỀN HÀNG</td>
                                <td>
                                    <p><?php $resultC = number_format($TT); echo $resultC ?><sup>đ</sup></p>
                                </td>
                            </tr>
                            <tr>
                                <td>THÀNH TIỀN</td>
                                <td>
                                    <p><?php $resultD = number_format($TT); echo $resultD; ?><sup>đ</sup></p>
                                </td>
                            </tr>
                            <tr>
                                <td>TẠM TÍNH</td>
                                <td>
                                    <p style="font-weight: bold; color: black;"><?php $resultC = number_format($TT); echo $resultC ?><sup>đ</sup></p>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>
            <div class="success-button">
                <a href="index.php"><button>TIẾP TỤC MUA SẮM</button></a>
            </div>
            <br>
            <p class="detail-footer">Mọi thắc mắc quý khách vui lòng liên hệ hotline <span style="font-size: 20px; color: red;">0973 999 949 </span> hoặc chat với kênh hỗ trợ trên website để được hỗ trợ nhanh nhất.</p>
        </div>
    </section>

    <?php 
    //include "footer.php";
    ?>