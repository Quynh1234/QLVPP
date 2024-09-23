

    <?php
    $id_danhmuc = $_GET['id_danhmuc'];
    $conn= mysqli_connect("localhost","root","","cuahangtienloi"); 

    if(!$conn){
        die("Ket noi that bai".mysqli_connect_error());
    }else{
        $sql="DELETE FROM tbl_danhmuc WHERE id_danhmuc ='".$id_danhmuc."'";

        
       
        
        $result = mysqli_query($conn,$sql);
       
        if(!$result){
            echo "Delete error" .mysqli_error($conn);
        }else{
        $sql1="SELECT id_loaisp FROM tbl_loai_sp WHERE id_danhmuc ='".$id_danhmuc."'";
        $result1 = mysqli_query($conn,$sql1);

        
       
        while($row=mysqli_fetch_assoc($result1)){
            $sql3="DELETE FROM tbl_loai_sp WHERE id_loaisp ='".$row['id_loaisp']."'";
            $result3 = mysqli_query($conn,$sql3);

            // $sql2 = "SELECT loaisp_id FROM tblsanpham WHERE loaisp_id = '".$row['id_loaisp']."'";
            // $result2 = mysqli_query($conn,$sql2);

            $sql4="DELETE FROM tblsanpham WHERE loaisp_id ='".$row['id_loaisp']."'";
            $result4 =mysqli_query($conn,$sql4);
        }

        // $sql2 = "SELECT loaisp_id FROM tblsanpham WHERE loaisp_id = '".$id_danhmuc."'";
        // $result2 = mysqli_query($conn,$sql2);

        // while($row1=mysqli_fetch_assoc($result2)){
        //     $sql4="DELETE FROM tblsanpham WHERE loaisp_id ='".$row1['loaisp_id']."'";
        //     $result4 =mysqli_query($conn,$sql4);
        // }
        
            echo"<script type='text/javascript'>alert('Xoa du lieu thanh cong');
        window.location.href ='DanhmucMain.php';
        </script>";
        }
        
    }

    ?>
