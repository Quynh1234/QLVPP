<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./css/SanPham_Detail.css">
</head>

<body>
    <?php
    $id_sanpham = $_GET['id_sanpham'];
    include './Config/connect.php';
    $sql = "SELECT * FROM tblsanpham WHERE id_sanpham = '" . $id_sanpham . "' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='mainDetail'>
            <h2 class='heading'>Thông tin sản phẩm</h2>
            <div class='main-detail'>

            <div class='sp-img'>
                <img src='./image/" . $row['anhsp'] . "' alt='' width='300px;'> <br>
            </div> 
            <div class='sp-info'>
            <h2 class = 'info-name'> " . $row['tensp'] . "</h2>";
            echo "<p class = 'sp-chitiet'>Chi tiết sản phẩm:  " . $row['chitiet_sp'] . "</p>";


            if ($row['tinhtrang'] == '0') {
                echo "<p>Tình trạng: Hết hàng</p>";
            } else if ($row['tinhtrang'] == 0) {
                echo "<p>Tình trạng: Còn hàng</p>";
            }

            echo "<p class = 'sp-Kho'>Kho:  " . $row['soluong'] . "</p>";

            echo "<p class='info-gia'>" . $row['giasp'] . " VNĐ</p>";
            echo"<form action='' method='post'>";
            echo "<p class = 'sp-soluong'>Số lượng: 
            <input class='txt-soluong' name= 'soluong' type='number' min='1' max='100' value = '1' > </p>";
            echo "
            <div class='btn-thaotac'>
            
            
            <button type='submit' class='btn-addCart' name='btn-addCart'>
            <a href='SanPhamDetail.php?id_sanpham='".$id_sanpham."''><i class='fas fa-shopping-cart'></i></a>
            Thêm giỏ hàng
            </button>
            
            <button class='btn-muahang'>
            <i class='fas fa-shopping-cart'></i>
            Mua hàng
            </button>
            </form>
            </div>";

            // <td> " . $row[''] . "</td>
            // <td> " . $row[''] . "</td>
            // <td> " . $row[''] . "</td>
            // <td> " . $row[''] . "</td>


            echo "
        </div> 
        </div> 
            
            </div> 
        ";
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-addCart'])) {
            $sanpham_anh = $row['anhsp'];
            $session_idA = session_id();
            
            $sanpham_id =  $row['id_sanpham'];
            $sanpham_tieude =  $row['tensp'];
            $sanpham_gia =  $row['giasp'];
            $quantitys =  $_POST['soluong'];
            $sql = "INSERT INTO tbl_cart VALUES('','" . $sanpham_anh . "','" . $session_idA . "','" . $sanpham_id . "','" . $sanpham_tieude . "','" . $sanpham_gia . "','" . $quantitys . "')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Thêm giỏ hàng không thành công";
                
            }
            else{
                echo"
                <script>
                alert('Thêm giỏ hàng thành công');
                    window.location.href='index.php';
                </script>
            ";
            }
        }
        }
    } else {
        echo "Không có dữ liệu";
    }
    ?>
    <div class="form-comment">
        <h2 class="text-heading">
            Ý kiến bình luận sản phẩm
        </h2>
        <!-- <button type="submit"></button> -->
        <form action="" method="post">
            <p class="txt-pidsp">
                <input type="hidden" name="txt-idsanpham" value="<?php echo $id_sanpham;

                                                                    ?>">
            </p>

            <p class="txt-pten">
                <input type="text" name="txt-name" placeholder="Điền tên">
            </p>

            <p class="txt-pbinhluan"><textarea class="txt-cmt" name="txt-comment" id="" cols="125" rows="10" placeholder="Mời bạn bình luận hoặc đặt câu hỏi"></textarea></p>

            <p class="btn-psubmit"><button type="submit" name="btn-guicmt">Gửi bình luận</button></p>





        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-guicmt'])) {
            $id_sanpham = $_POST['txt-idsanpham'];
            $binhluan_ten =  $_POST['txt-name'];
            $binhluan =  $_POST['txt-comment'];
            $date =  date('Y-m-d');
            $sql = "INSERT INTO tblbinhluan VALUES('','" . $binhluan_ten . "','" . $binhluan . "','" . $id_sanpham . "','0','" . $date . "')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Bình luận không thành công";
            }
        }

        ?>
        <div class="clear"></div>
        <!-- In bình luận -->
        <div class="list-cmt">
            <?php
            $sql = "SELECT * FROM tblbinhluan";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h3> " . $row['binhluan_ten'] . "</h3>";
                    echo "<p> " . $row['binhluan'] . "</p>";
                    echo "<button class='btn-like'><i class='far fa-thumbs-up'></i> Thích 
                    </span> ".$row['date']."<span>
                    </button>";
                }
            }
        



            ?>

        </div>


    </div>
</body>
<div class="footer">
    <?php
    include 'footer.php';
    ?>
</div>

</html>