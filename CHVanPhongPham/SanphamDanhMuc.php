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
    $id_danhmuc = $_GET['id_danhmuc'];
    $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc ='".$id_danhmuc."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='main-index'>
            <div class='table-sanpham'>
            <div class='header-product'>
                <div class='info'><p>" . $row['ten_danhmuc'] . "</p></div>
            </div>
            
            <table>
            
            <tbody>
            ";
            $count = 0;
            echo "<tr>";
            $sql2 = "SELECT * FROM tbl_loai_sp WHERE id_danhmuc='" . $row['id_danhmuc'] . "'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $sql3 = "SELECT * FROM tblsanpham WHERE loaisp_id='" . $row2['id_loaisp'] . "'";
                    $result3 = mysqli_query($conn, $sql3);
                    if (mysqli_num_rows($result3) > 0) {
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            echo "<td> 
                            <div class='item-product'>
                                <a href='./SanPhamDetail.php?id_sanpham=" . $row3['id_sanpham'] . "'>
                                <img src='./image/" . $row3['anhsp'] . "' alt='' width='150px;'> <br>
                                <p class = 'item-tensp'>" . $row3['tensp'] . "</p><br>
                                <span class = 'item-giasp'>" . $row3['giasp'] . " VNĐ</span> 
                                <button class='btn-addCart'>
                                <i class='fas fa-shopping-cart'></i>
                                Xem thông tin chi tiết
                                </button>
                                </a>
                            </div> 
                            </td>";
                        }
                    }
                }
            }
            echo "</tr>";
            echo "
                </tbody>
                </table>
                ";
            echo "</div>";
            echo "</div>";
        }
    }

    ?>
</body>
<div class="footer">
    <?php
    include 'footer.php';
    ?>
</div>

</html>