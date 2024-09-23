<?php 
  //include "header.php";
  include "session.php";
  session_start();
  require_once("config_vnpay.php");
  
   function insert_payment($register_id,$code_oder,$session_idA,$deliver_method,$method_payment,$today,$status) {
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    $query = "SELECT * FROM tbl_payment WHERE session_idA = '$session_idA' ORDER BY payment_id DESC";
    $result = mysqli_query($conn,$query);
    if($result!=null) {
        $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_idA' ORDER BY cart_id DESC";
        $resultA = mysqli_query($conn,$query);
        if($resultA){while($resultB=$resultA->fetch_assoc()){
        $cart_id = $resultB['cart_id'];
        $sanpham_anh = $resultB['sanpham_anh'];
        $sanpham_id = $resultB['sanpham_id'];
        $sanpham_tieude = $resultB['sanpham_tieude'];
        $sanpham_gia = $resultB['sanpham_gia'];
        //$color_anh = $resultB['color_anh'];
        $quantitys = $resultB['quantitys'];
      //  $sanpham_size = $resultB['sanpham_size'];
        $query = "INSERT INTO tbl_donhang (sanpham_anh,session_idA,sanpham_id,sanpham_tieude,sanpham_gia,quantitys) VALUES 
         ('$sanpham_anh','$session_idA','$sanpham_id','$sanpham_tieude','$sanpham_gia','$quantitys')";
         $resultC= mysqli_query($conn,$query);
         if($resultC){
            $query = "DELETE  FROM tbl_cart WHERE cart_id = '$cart_id'";
            $resultD = mysqli_query($conn,$query);
            Session::set('SL',null);
        //    return $resultB;  
         }
        

         }} 
   
        $query = "INSERT INTO tbl_payment (register_id,session_idA,giaohang,thanhtoan,order_date,code_oder,status) VALUES 
        ('$register_id','$session_idA','$deliver_method','$method_payment','$today','$code_oder','$status')";
        $result = mysqli_query($conn,$query);
        if($result){

            $title = "Cửa hàng bán quần áo tại Website 36FULLZ Bạn đã đặt hàng thành công!";
            $content = "<p style=font-size: 18px;>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : <span style=font-size: 20px; color: #378000;>".$code_oder."</span></p>";
            $content.="<h4>Cửa hàng bán quần áo tại Website 36FULLZ sẽ lên đơn hàng cho bạn và giao hàng sớm nhất.Thank you for visiting our store.</h4p>";
            // $addressMail =  Session::get('register_email');
            // $mail = new Mailer();
            // $mail->sendMail($title, $content, $addressMail);
        
            return $result; 
        }
        header('Location:success.php');
    }else {
        $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_idA' ORDER BY cart_id DESC";
        $resultA = mysqli_query($conn,$query);
        if($resultA){while($resultB=$resultA->fetch_assoc()){
        $cart_id = $resultB['cart_id'];
        $sanpham_anh = $resultB['sanpham_anh'];
        $sanpham_id = $resultB['sanpham_id'];
        $sanpham_tieude = $resultB['sanpham_tieude'];
        $sanpham_gia = $resultB['sanpham_gia'];
       // $color_anh = $resultB['color_anh'];
        $quantitys = $resultB['quantitys'];
       // $sanpham_size = $resultB['sanpham_size'];
        $query = "INSERT INTO tbl_donhang (sanpham_anh,session_idA,sanpham_id,sanpham_tieude,sanpham_gia,quantitys) VALUES 
         ('$sanpham_anh','$session_idA','$sanpham_id','$sanpham_tieude','$sanpham_gia','$quantitys')";
         $resultC= mysqli_query($conn,$query);
         if($resultC){
            $query = "DELETE  FROM tbl_cart WHERE cart_id = '$cart_id'";
            $resultD = mysqli_query($conn,$query);
            Session::set('SL',null);
        //    return $resultB;  
         }

         }} 
        header('Location:success.php');
    }
}
?>
<?php 
$session_id = session_id();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $register_id = Session::get('register_id');
    $session_idA = session_id();
    $today = date("Y-m-d");
    $deliver_method = $_POST['deliver-method'];
    $method_payment = $_POST['paymentS'];
    $code_oder = substr($session_id,0,8);
    if($method_payment == 'tienmat'){
        $status = 1;
       	$insert_payment = insert_payment($register_id,$code_oder,$session_idA,$deliver_method,$method_payment,$today,$status);
    }elseif($method_payment == 'VNPAY'){
        $vnp_TxnRef =  $code_oder; 
        $vnp_OrderInfo = 'Thanh toán đơn đặt hàng tại Website';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount =$_POST['total_congthanhtoan'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_ExpireDate = $expire;
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                $_SESSION['code_cart'] = $code_oder;
                $status = 1;
                $insert_payment = insert_payment($register_id,$code_oder,$session_idA,$deliver_method,$method_payment,$today,$status );
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }elseif($method_payment == 'Momo'){
        echo "<script> alert('thanh toan Momo') </script>";;
    }

    header('Location:success.php');
}
?>