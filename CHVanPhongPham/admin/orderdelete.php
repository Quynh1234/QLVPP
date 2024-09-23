<?php
//include "header.php";
//include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
//$product = new product();
$fm = new Format();
function delete_payment($session_idA){
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    $query = "DELETE  FROM tbl_payment WHERE session_idA = '$session_idA'";
    $result = mysqli_query($conn,$query);
    return $result;
}

function delete_order($register_id){
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    $query = "DELETE  FROM tbl_payment WHERE register_id = '$register_id'";
    $result = mysqli_query($conn,$query);
    return $result;
}

function delete_cart($session_idA){
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
    $query = "DELETE  FROM tbl_donhang WHERE session_idA = '$session_idA'";
    $result = mysqli_query($conn,$query);
    return $result;
}
?>
<?php
//$product = new product();
if (!isset($_GET['session_idA'])|| $_GET['session_idA']==NULL){
    echo "<script>window.location = 'orderlistall.php'</script>";
	 }
else {$session_idA = $_GET['session_idA'];
    }
    $delete_payment = delete_payment($session_idA);
    $delete_order =  delete_order($register_id);
    $delete_cart =  delete_cart($session_idA);

    header('Location:orderlistall.php');
?>

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