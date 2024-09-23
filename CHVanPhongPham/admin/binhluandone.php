<?php
include "header.php";
include "Left_side.php";
include './Config/connect.php';


// include "class/product_class.php";
// include "helper/format.php";
// $product = new product();
// $fm = new Format();
// if (isset($_GET['blog_id'])){
//     $blog_id = $_GET['blog_id'];
//     $update_binhluan = $product -> update_binhluan($blog_id);

//     }
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="binhluanAll.php"><b>DS khách hàng bình luận</b></a></li>
            <li class="breadcrumb-item active"><a href="binhluanlist.php"><b>Đã kiểm tra</b></a></li>
            <li class="breadcrumb-item active"><a href="binhluandone.php"><b>Chưa kiểm tra</b></a></li>

        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <h3>Tất cả các Bình Luận:</h3>
                    </div>
                    <div>
                        <table id="customers">
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng bình luận</th>
                                <th>Ngày bình luận</th>
                                <th>Thông tin bình luận</th>
                                <th>Bình luận mã sản phẩm</th>
                                <th>Tình trạng</th>

                            </tr>
                            <?php
                            $sql = "SELECT * FROM tblbinhluan WHERE blog_id='0'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $count++;
                            ?>
                                    <tr>
                                        <td> <?php echo $count ?></td>
                                        <td><?php echo $row['binhluan_ten'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo $row['binhluan'] ?></td>
                                        <td><?php echo $row['id_sanpham'] ?></td>

                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id_binhluan" value="<?php echo  $row['id_binhluan'] ?>">
                                                <button name="status_cmt">
                                                    <a id="tinhtrang" href="?blog_id=0"><span class="badge bg-danger">Chưa xử lý</span></a>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['status_cmt'])) {
                                $id_binhluan = $_POST['id_binhluan'];
                                $sql = "UPDATE tblbinhluan SET blog_id='1'WHERE id_binhluan ='" . $id_binhluan . "'";
                                $result = mysqli_query($conn, $sql);
                                echo "
                                <script>
                                window.location.href='binhluandone.php';
                                </script>
                                ";
                            }
                            ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

</body>

</html>