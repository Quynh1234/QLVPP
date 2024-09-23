<?php
include './Config/connect.php';
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng tiện lợi</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./css/header2.css">
</head>

<body>
    <div id="header">
        <div class="header-list1">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-user"></i>
                        Tài khoản
                    </a>
                </li>
                <li>
                    <a href="cart.php">
                        <i class="fas fa-shopping-cart"></i>
                        Giỏ hàng
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-money-bill"></i>
                        Hóa đơn
                </li>
                </a>
                <li>
                    <a href="about.php">
                        <i class="fas fa-check"></i>
                        About
                    </a>
                </li>
                
                <?php 
                session_start();
                $logincheck = Session::get('registerlogin');
                if($logincheck){
                    $a = Session::get('registername');
                    echo "<li>
                    <a href=''>
                        <i></i>.$a.                       
                    </a>
                </li>";
                }else{
                        echo"<li>
                        <a href='login.php'>
                            <i class='fas fa-sign-out-alt'></i>

                            Đăng nhập
                        </a>
                        </li>";
                }
                
                ?>
            </ul>

        </div>
        <div class="header-list2">
            <div class="header-list2-icon">
                <a class="icon1" href="./index.php"><i class="fas fa-home"></i></a>
            </div>
            <div class="header-list2-search">

                <form class="header-list2-search" action="./SanPhamSearch.php" method="post">
                    <input class="search" name="txt-search" type="text" placeholder="Nhập tên sản phẩm để tìm kiếm...">
                    <button class="btn-search" name="btn-search">
                        <a href="./index.php"><i class="fas fa-search"></i></a>
                    </button>

                </form>
            </div>
            <div class="header-list2-cart">
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                <p class="info-cart">
                    <?php
                    $sql = "SELECT * FROM tbl_cart";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        // $count = 1; 
                        while ($row = mysqli_fetch_assoc($result)) {
                            $count++;
                        }
                    }
                    echo $count;

                    ?>

                </p>
                <p class="name">GIỎ HÀNG</p>

            </div>


        </div>

        <div class="header-list3">
            <ul class="nav">
                <li class="loai-danhmuc"><a href="./index.php">Home</a></li>
                <?php
                $sql = "SELECT * FROM tbl_danhmuc";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <li class="loai-danhmuc">
                            <a href=""><?php echo ($row["ten_danhmuc"]) ?></a>
                            <?php
                            $sql = "SELECT * FROM tbl_loai_sp WHERE id_danhmuc='" . $row['id_danhmuc'] . "'";
                            // echo($sql);
                            $result2 = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result2) > 0) {
                            ?>
                                <ul class="subnav-loaisp">
                                    <?php
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                    ?>
                                        <li class="li-loaisp"><a class="a-loaisp" href="./SanPhamLoai.php?id_loaisp=<?php echo ($row2['id_loaisp']) ?> "><?php echo $row2['tenloaisp'] ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            <?php
                            }
                            ?>



                        </li>

                <?php

                    }
                }
                ?>
            </ul>

        </div>

    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-search'])) {
        $txt = $_POST['txt-search'];
        // header('Location:Search.php');



        echo "
                    <script>
                    // alert('Cập nhập dữ liệu thành công');
                    window.location.href='SanPhamSearch.php?ID_Search=" . $txt . "';
                    </script>
                    ";
    }


    ?>


</body>

</html>