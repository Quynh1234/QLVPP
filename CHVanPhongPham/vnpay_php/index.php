<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="assets/jquery-1.11.3.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/DuyHoanPHP/css/main.css">
  <link rel="stylesheet" type="text/css" href="/DuyHoanPHP/css/base.css">
  <link rel="stylesheet" type="text/css" href="/DuyHoanPHP/css/css.css">
  <link rel="stylesheet" type="text/css" href="/DuyHoanPHP/css/error_page.css">
  <link rel="stylesheet" type="text/css" href="/DuyHoanPHP/css/style.css">
  <link rel="stylesheet" type="text/css" href="/DuyHoanPHP/css/responsive.scss">
  <link rel="stylesheet" type="text/css" href="/DuyHoanPHP/css/util.css">
  <link rel="stylesheet" type="text/css" href="/DuyHoanPHP/themify-icons-font/themify-icons/themify-icons.css">
    </head>

    <body>
    <div class="container">
           <div class="header clearfix">

                <h1 class="text-muted">VNPAY DEMO</h1>
            </div>
                <div class="form-group">
                    <button onclick="pay()" value="billpayment">Giao dịch thanh toán</button><br>
                </div>
                <div class="form-group">
                    <button onclick="querydr()">API truy vấn kết quả thanh toán</button><br>
                </div>
                <div class="form-group">
                    <button onclick="refund()">API hoàn tiền giao dịch</button><br>
                </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div> 
        <script>
             function pay() {
              window.location.href = "vnpay_pay.php";
            }
            function querydr() {
              window.location.href = "vnpay_querydr.php";
            }
             function refund() {
              window.location.href = "vnpay_refund.php";
            }
        </script>
    </body>
</html>

<style>
    .text-muted{
        margin: 20px;
    }
    .form-group{
        margin:16px;
    }
    .form-group button{
        font-size: 32px;
        margin:16px;
        background-color: #58257b;  border: none;  color: white;  padding: 16px 32px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 16px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}.button1 {  background-color: white;   color: black;   border: 2px solid crimson;}.button1:hover {  background-color: crimson;  color: white;}.button8 {  background-color: midnightblue;  color: white;  border: 2px solid midnightblue;}.button8:hover {  background-color: white;  color: black;  border: 2px solid midnightblue;

    }

</style>
