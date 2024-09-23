<?php 
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $conn = mysqli_connect("localhost","root","","cuahangtienloi");
        if(!$conn){
            die("Kết nối thất bại");
            exit();
        }
        else{
                $sql = "SELECT * FROM tbltk WHERE email ='".$email."'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)<=0){

                    $sql1 = "INSERT INTO tbltk (ten,email,pass,sdt,diachi) VALUES('".$ten."','".$email."','".$pass."','".$sdt."','".$diachi."')";
                    $result1 = mysqli_query($conn,$sql1);
                    if(!$result1){
                        echo"Không thành công";
                    }
                    else{
                        $sql3 = "SELECT id_taikhoan FROM tbltk WHERE email = '".$email."' ";
                        $result3 = mysqli_query($conn,$sql3);
    
                      $row = mysqli_fetch_assoc($result3);
    
                       
                       $sql2 = "INSERT INTO tblkhachhang VALUES('','".$row['id_taikhoan']."','".$ten."','".$diachi."','".$sdt."','".$email."')";
                        
                        $result2 = mysqli_query($conn,$sql2);
                        
                        echo"Thành công";
                    }
                }
                else{
                    echo"Trùng email";
                }
                
                
                
            }
        //}
    
?>