<?php
include "header.php";
include "Left_side.php";
// include "class/product_class.php";
// include "helper/format.php";
include './Config/connect.php';
?>

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>DS khách hàng</b></a></li>
            <li class="breadcrumb-item active"><a href="binhluanlist.php"><b>Thêm khách hàng</b></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <h3>Tất cả các khách hàng:</h3>
                    </div>
                    <div>
                        <table id="customers">
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Chức năng</th>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM tblkhachhang";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $count++;
                            ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $row['ten'] ?></td>
                                        <td><?php echo $row['diachi'] ?></td>
                                        <td><?php echo $row['sdt'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td>
                                            <!-- <a href="registerKHdelete.php?id_khachhang=<?php echo $row['id_khachhang'] ?>" onclick="return confirm('Thông tin khách hàng sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash"></i></a> -->
                                            <a name="submit" href="registerKHUpdate.php?id_khachhang=<?php echo $row['id_khachhang'] ?>" class="btn btn-delete" type="button" title="Sửa">
                                                <i class="fas fa-edit"></i></a>
                                        </td>

                                    </tr>
                            <?php
                                }
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