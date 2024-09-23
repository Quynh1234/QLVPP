<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí đơn hàng</title>
  <link rel="stylesheet" type="text/css" href="/css/main.css">
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/css.css">
  <link rel="stylesheet" type="text/css" href="/css/error_page.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/responsive.scss">
  <link rel="stylesheet" type="text/css" href="/css/util.css">
  <link rel="stylesheet" type="text/css" href="/themify-icons-font/themify-icons/themify-icons.css">

</head>
<body>
  
</body>
</html>
<?php
//include "header.php";
//include "leftside.php";
//include "class/product_class.php";
//include "helper/format.php";

//$product = new product();
//  ======== Thông tin tất cả các đơn hàng  ============
     function show_orderAll(){
        $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        $query = "SELECT * FROM tbl_payment ";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    // ========== Chi tiết đơn hàng  ==========
     function show_order_detail($order_ma){
        $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        $query = "SELECT * FROM tbl_carta WHERE session_idA = '$order_ma' ORDER BY carta_id DESC";
        $result = mysqli_query($conn,$query);
        return $result;
    }
$fm = new Format();
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="orderlistall.php"><b>DS đơn hàng</b></a></li>
                <li class="breadcrumb-item active"><a href="orderlistdone.php"><b>Đã hoàn thành</b></a></li>
                <li class="breadcrumb-item active"><a href="orderlist.php"><b>Chưa hoàn thành</b></a></li>
                
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h1>Tất cả các đơn hàng:</h1>
                        </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>Mã đơn hàng</th>
                              <th>Ngày đặt hàng</th>
                              <th>ID khách hàng</th>
                              <th>Thông tin khách hàng</th>
                              <th>Giao hàng</th>
                              <th>Thanh toán</th>
                              <th>Chi tiết đơn hàng</th>
                              <th>Tình trạng</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                            $show_orderAll = show_orderAll();
                             if($show_orderAll){$i=0;while($result = $show_orderAll->fetch_assoc()){$i++;
                            ?>
                          <tr>
                            <td> <?php echo $i ?></td>
                            <td><?php $ma = substr($result['session_idA'],0,8); echo $ma   ?></td>
                            <td><?php echo $result['order_date']?></td>
                            <td><?php echo $result['register_id']?></td>
                            <td class="td-list"><a href="register.php?registerid=<?php echo $result['register_id'] ?>"> Xem </a></td>
                            <td><?php echo $result['giaohang']  ?></td>
                            <td><?php echo $result['thanhtoan']  ?></td>
                            <td class="td-list"><a href="orderdetail.php?order_ma=<?php echo $result['session_idA'] ?>"> Xem </a></td>
                            <td> <?php if($result['status']=='0'){
                                            echo '<span class="badge bg-danger">Chưa xử lý</span>';
                                          }elseif($result['status']== 1){
                                            echo '<span class="badge bg-success">Đã xử lý</span>';
                                          }else {
                                            echo '<span class="badge bg-confirmid">Đã nhận hàng</span>';
                                        }
                                   ?>
                              </td>
                            <td><a href="orderdelete.php?session_idA=<?php echo $result['session_idA'] ?>" onclick="return confirm('Đơn hàng sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas ti-trash">Xóa</i></a>                     
                          </td>
                          </tr>
                          <?php
                            }echo "<h3>Tổng:  ".$i."</h3>";}
                          ?>
                          </table>
                          
                        </div>
                        
                    </div>
                    
                </div>
                <!-- Phần nút tìm kiếm -->
                <div align="center">
                        <form class="form-search" action="ordersearch.php" method="get">
                Search: <input type="text" name="search" />
                        <input type="submit" name="ok" value="search" />
            </form>
        </div>
                <a href="ExportExcel.php"><button name = "btnExport" type="submit" class="ExportExcel">Xuất file excel</button></a>
            </div>
        </div>
        <button class="btn-edit"> <a href="index.php">Quay về</a></b>
    </main>

</body>
</html>



<?php
/**
* Format Class
*/
class Format{
 public function formatDate($date){
    return date('F j, Y, g:i a', strtotime($date));
 }

 public function textShorten($text, $limit = 400){
    $text = $text. " ";
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text.".....";
    return $text;
 }

 public function validation($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 public function title(){
    $path = $_SERVER['SCRIPT_FILENAME'];
    $title = basename($path, '.php');
    //$title = str_replace('_', ' ', $title);
    if ($title == 'index') {
     $title = 'home';
    }elseif ($title == 'contact') {
     $title = 'contact';
    }
    return $title = ucfirst($title);
   }
}
?>

<!-- CSS -->
<style>
  input {
    font-size: 2.4rem;
}
  .form-search{
    font-size: 24px;
    float: right;
  }

  form input[name="ok"]{
    background-color: #58257b;  border: none;  color: white;  padding: 16px 32px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 16px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}.button1 {  background-color: white;   color: black;   border: 2px solid crimson;}.button1:hover {  background-color: crimson;  color: white;}.button8 {  background-color: midnightblue;  color: white;  border: 2px solid midnightblue;}.button8:hover {  background-color: white;  color: black;  border: 2px solid midnightblue;
  }
  .ExportExcel{
    display: inline-block;  padding: 15px 25px;  font-size: 24px;  cursor: pointer;  text-align: center;  text-decoration: none;  outline: none;  color: #fff;  background-color: purple;  border: none;  border-radius: 15px;  box-shadow: 0 9px #999;}.button:hover {background-color: #58257b}.button:active {  background-color: #58257b;  box-shadow: 0 5px #666;  transform: translateY(4px);
  }
  .badge {
    display: inline-block;
    padding: 7px;
    font-size: 12px;
    font-weight: 500;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
    color: black;
}
.bg-success {
    background-color: #bfefc4 !important;
    color: #02790c !important;
}
.bg-danger {
    background-color: rgb(255, 154, 143) !important;
    color: #f83d3d !important;
}
  #customers td {
    /* padding-left: 1% !important; */
    border: 1px solid #ddd;
    font-size: 14px;
    text-align: center;
}
  b:hover{
    color: #f83d3d;
    font-weight: bolder;
  }
  .active{
    background-color: #ffffff;
  }
   #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
  *,
*::before,
*::after {
  box-sizing: inherit;
}
* {
      margin: var(--margin_0); 
      padding: var(--padding_0); 
      box-sizing: border-box;
  }
  .symbol-input100 i,.fas{
    color: var(--main_color) !important;
    font-size: 20px;
  }
  .btn-edit {
    margin: 50px;
    width: 58px;
    border: none;
    outline: none;
    /* background: transparent; */
    background-color: rgb(242, 205, 135);
    color: orange;
   }
  .jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}
  /* ========== Các thông tin Sản phẩm =========== */
.app-content {
    min-height: calc(100vh - 50px);
    padding: 15px 20px;
    background-color: #f5f5f5;
    -webkit-transition: margin-left 0.3s ease;
    -o-transition: margin-left 0.3s ease;
    transition: margin-left 0.3s ease;
    margin-left: 230px;
    margin-top: 42px;
}

.app-title {
    /* display: block;
    display: -ms-flexbox; */
    display: flex;
    -webkit-box-align: center;
    /* -ms-flex-align: center; */
    align-items: center;
    -webkit-box-pack: justify;
    /* -ms-flex-pack: justify; */
    justify-content: space-between;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    /* -ms-flex-direction: row; */
    flex-direction: row;
    background-color: #FFF;
    border-radius: 0.375rem;
    padding: 10px 30px;
    /* -webkit-box-shadow: 0 1px 2px rgb(0 0 0 / 10%); */
    box-shadow: 0 1px 2px rgb(0 0 0 / 10%);
    border-left: 6px solid #FFD43B;
    margin-bottom: 20px;
}

.app-breadcrumb {
    margin-bottom: 0;
    font-weight: 500;
    font-size: 17px;
    text-transform: capitalize;
    text-align: left;
    padding: 0;
    background-color: transparent;
}

.breadcrumb {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    border-radius: 0.25rem;
}

.breadcrumb-item.active {
    color: #6c757d;
}

.b-item-active:hover {
    color: #f83d3d ;
}

.breadcrumb-item + .breadcrumb-item {
    padding-left: 0.5rem;
}

.breadcrumb-item + .breadcrumb-item::before {
    display: inline-block;
    padding-right: 0.5rem;
    color: #6c757d;
    content: "/";
}

.icon-add{
    padding-right: 7px;
}

.col-md-12 {
    -webkit-box-flex: 0;
    /* -ms-flex: 0 0 100%;
    flex: 0 0 100%; */
    max-width: 100%;
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.col-12 {
    -webkit-box-flex: 0;
    /* -ms-flex: 0 0 100%;
    flex: 0 0 100%; */
    max-width: 100%;
    position: relative;
    width: 94%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.tile {
    position: relative;
    background: #ffffff;
    border-radius: 0.375rem;
    padding: 15px 20px ;
    -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.title-h3 {
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 22px;
    text-align: center;
    border-bottom: 2px solid #FFD43B;
    padding-bottom: 10px;
    /* border-left: 3px solid black; */
    padding-left: 5px;
    color: black;
}

.element-button {
    position: relative;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.element-button h3 {
    font-size: 1.4rem;
    margin: 0;
    padding-left: 20px;
}

.col-sm-2 {
    max-width: 0%;
    display: table;
    padding-left: 10px;
}

.btn-add {
    background: #9df99d !important;
    color: #003c00 !important;
}

.btn-sm, .btn-group-sm > .btn {
    padding: 5px;
    font-size: 13px;
    line-height: 1.5;
    padding-left: 10px;
    border-radius: 0.357rem;
    padding-right: 10px;
    font-weight: 500;
}

.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}

.btn {
    display: inline-block;
    font-weight: 500;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 2px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    font-family: var(--main-text-font);
    line-height: 1.5;
    border-radius: 0.357rem;
    -webkit-transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, -webkit-box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), -webkit-transform 0.2s cubic-bezier(0.35, 0, 0.25, 1);
    transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, -webkit-box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), -webkit-transform 0.2s cubic-bezier(0.35, 0, 0.25, 1);
    -o-transition: box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), transform 0.2s cubic-bezier(0.35, 0, 0.25, 1), background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
    transition: box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), transform 0.2s cubic-bezier(0.35, 0, 0.25, 1), background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
    transition: box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), transform 0.2s cubic-bezier(0.35, 0, 0.25, 1), background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, -webkit-box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), -webkit-transform 0.2s cubic-bezier(0.35, 0, 0.25, 1);
}

.col-sm-12 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.tile {
    position: relative;
    background: #ffffff;
    border-radius: 0.375rem;
    padding: 15px 20px ;
    -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.tile-body {
        width: 100%;
    }
    .element-button {
    position: relative;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 10px;
}
article > header > .row {
    display: flex;
    flex-direction: row;
    align-items: baseline;
    margin-bottom: 10px;
}
#customers {
    font-family: var(--main-text-font);
    border-collapse: collapse;
    width: 100%;
  }
  .td-list {
    cursor: pointer;
  }
  article > header ul.tags > li > span.badge {
    display: inline-block;
    padding: .25em .4em;
    margin-right: 5px;
    border-radius: 4px;
    background-color: #6c757d3b;
    color: #524d4d;
    font-size: 12px;
    text-align: center;
    font-weight: 700;
    line-height: 1;
    white-space: nowrap;
    vertical-align: baseline;
    user-select: none;
}
</style>