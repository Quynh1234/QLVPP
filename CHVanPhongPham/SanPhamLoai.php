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
    include './Config/connect.php';
    $id_loaisp = $_GET['id_loaisp'];
    $sql = "SELECT * FROM tbl_loai_sp WHERE id_loaisp = '" . $id_loaisp . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row2 = mysqli_fetch_assoc($result)) {
            $tenloaisp = $row2['tenloaisp'];
        }
    }
    $sql = "SELECT * FROM tblsanpham WHERE loaisp_id = '" . $id_loaisp . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "
            <div class='main-index'>
            <div class='table-sanpham'>
            <div class='header-product'>
                <div class='info'><p>Loại sản phẩm: ".$tenloaisp."</p></div>
                
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
                    <a href='./SanPhamDetail.php?id_sanpham=" . $row['id_sanpham'] . "'>
                    <img src='./image/" . $row['anhsp'] . "' alt='' width='150px;'> <br>
                    <p class = 'item-tensp'>" . $row['tensp'] . "</p><br>
                    <span class = 'item-giasp'>" . $row['giasp'] . " VNĐ</span> 
                    <button class='btn-addCart'>
                    <i class='fas fa-shopping-cart'></i>
                    Xem thông tin chi tiết
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
    else{
        
        echo "<p>Không có sản phẩm</p>";
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