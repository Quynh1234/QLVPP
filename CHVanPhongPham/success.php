<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công</title>
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
session_start();
  //include "header.php";
  include "session.php";
  $session_id = session_id();
  //$index = new index();
  function show_register($id){
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    $query = "SELECT * FROM tblkhachhang WHERE id_khachhang = '$id'"; // nếu lấy được id qua session
   // $query = "SELECT * FROM tblkhachhang ";
    $result = mysqli_query($conn,$query);
    return $result;
}

 function show_carta($session_id){
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    $query = "SELECT * FROM tbl_donhang WHERE session_idA = '$session_id' ORDER BY carta_id DESC LIMIT 1";
   //$query = "SELECT * FROM tbl_donhang";
    $result = mysqli_query($conn,$query);
    return $result;
}
?>
    <section class="payment">
        <div class="row">
            <div class="payment-top-wrap">
                 <div class="payment-top">
                     <div class="delivery-top-delivery payment-top-item">
                         <i class="fas fa-shopping-cart ti-shopping-cart"></i>
                     </div>
                     <div class=" payment-top-item">
                         <i class="fas fa-map-marker-alt ti-map-alt"></i>
                     </div>
                     <div class="delivery-top-payment payment-top-item">
                     <i class="fa-solid fa-check ti-money"></i>
                     </div>
                 </div>
            </div>
        </div>
        <section class="success">
            <div class="success-top">
                <p>ĐẶT HÀNG THÀNH CÔNG </p>
            </div>
            <?php 
                $id = Session::get('register_id');
                $get_register = show_register($id);
                if($get_register){while($results = $get_register->fetch_assoc()){
            ?>
            <div class="success-text">
            <?php
               $show_cartC = show_carta($session_id);
               if($show_cartC){while($result = $show_cartC->fetch_assoc()){
            ?> 

                <p>Chào <span style="font-size: 20px; color: #378000;"><?php echo $results['ten'] ?></span>, đơn hàng của bạn với mã <span style="font-size: 20px; color: #378000;"><?php $id = Session::set('session_idA',$result['session_idA']); $ma = substr($session_id,0,8); echo $ma   ?></span> đã được đặt thành công. <br> Đơn hàng của bạn đã được xác nhận tự động.
                    <br>
                    <span style="font-weight: bold;">Hiện tại do đang trong Chương trình Sale lớn, đơn hàng của quý khách sẽ giao nhanh trong 2 ngày tới. Rất mong quý khách để ý điện thoại nhân viên giao hàng sẽ giao trong 2 ngày tới !</span><br>
                    <span style="color: red;">(Lưu ý: 36FULLZ đơn hàng đươc xử lý tự động và sẽ giao cho bạn trong thời sớm nhất)</span><br> Cảm ơn <span style="font-size: 20px; color: #378000;"><?php echo $results['ten'] ?></span> đã tin dùng
                    sản phẩm của 36FULLZ.</p>
            <?php
               }}
            ?>

            </div>
            <?php
               }}
            ?>
            <div class="success-button">
                <a href="detaill.php"><button class="btn-a_success">XEM CHI TIẾT ĐƠN HÀNG</button></a>
                <a href="index.php"><button>TIẾP TỤC MUA SẮM</button></a>
            </div>
            <p class="detail-footer">Mọi thắc mắc quý khách vui lòng liên hệ hotline <span style="font-size: 20px; color: red;">0973 999 949 </span> hoặc chat với kênh hỗ trợ trên website để được hỗ trợ nhanh nhất.</p>
        </section>
    </section>

    
    <?php 
   // include "footer.php";
    ?>