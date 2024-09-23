<?php
include "header.php";
include "Left_side.php";
include './Config/connect.php';
?>

<head>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
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
                <th>Bình luận Mã sản phẩm</th>
                <th>Tình trạng</th>
                <th>Chức năng</th>
              </tr>
              <?php
              $sql = "SELECT * FROM tblbinhluan";
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
                    <td> <?php if ($row['blog_id'] == 1) {
                            echo '<span class="badge bg-success">Đã xử lý</span>';
                          } else {
                            echo '<span class="badge bg-danger">Chưa xử lý</span>';
                          }
                          ?>
                    </td>
                    <td><a href="binhluandelete.php?id_binhluan=<?php echo $row['id_binhluan']; ?>" onclick="return confirm('Bình luận sản phẩm sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash"></i></a></td>

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