<?php
include 'header.php';

// include 'slider.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tran Ngoc</title>
    <link rel="stylesheet" href="./css/Search2.css">
</head>

<body>
    <?php
    $ID_Search = $_GET['ID_Search'];
    echo 'txtSearch: ';
    echo $ID_Search;
    include './Config/connect.php';
    $sql = "SELECT * FROM tblsanpham WHERE tensp LIKE '%" . $ID_Search . "%' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "
            <div class='main-index'>
            <div class='table-sanpham'>
            <div class='header-product'>
                <div class='info'><p>Tìm kiếm theo từ khóa</p></div>
                
                <div class='btnXemThem'></div>
            </div>
            
            <table>
            
            <tbody>
            ";
        // for ($i = 0; $i < mysqli_num_rows($result) / 5; $i += 5) {
        $count = 0;
        echo "<div class='item-td'>";
        echo "<tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            // for ($i = 0; $i < mysqli_num_rows($result) / 5; $i ++){
            $count++;
            $number = $count;
            if ($count == $number) {

                echo "
                
                 
                <div class='item-product'>
                    <a href='./SanPhamDetail.php?id_sanpham=".$row['id_sanpham']."'>
                    <img src='./image/" . $row['anhsp'] . "' alt='' width='150px;'> <br>
                    <p class = 'item-tensp'>" . $row['tensp'] . "</p><br>
                    <span class = 'item-giasp'>" . $row['giasp'] . " VNĐ</span> 
                    <button class='btn-addCart'>
                    <i class='fas fa-shopping-cart'></i>
                    Thêm vào giỏ hàng
                    </button>
                    </a>
                </div> 
                
                
                ";
            }
        }

        echo "</tr>";
        echo "</div>";
        echo "
            </tbody>
            </table>
            ";
        echo "</div>";
        echo "</div>";
    }

    // }


    ?>

</body>
<div class="footer">
    <?php
    include 'footer.php';
    ?>
</div>

</html>