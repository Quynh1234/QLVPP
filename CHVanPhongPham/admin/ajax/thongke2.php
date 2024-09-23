
<?php 
$chart_data = [];
 $conn = mysqli_connect("localhost","root","","cuahangtienloi");
 if(!$conn)
 {
   die("ket noi khong thanh cong");
 }
 else {
    $luachon = $_POST['luachon'];
    $inp = $_POST['inp'];
    $out = $_POST['out'];
   // $chart_data = [];
    if($luachon=='ngay')
    {
        $query = " SELECT 
        DAtE(date_thongke) as date,
        SUM(tongtien) AS doanhthu
    FROM 
        tbl_hoadon
     WHERE  date_thongke BETWEEN '$inp' AND '$out'
    GROUP BY 
        DATE(date_thongke)
    ORDER BY 
        DATE DESC
        ";
     $result = mysqli_query($conn,$query);
     if (is_array($result) || is_object($result))
     foreach($result as $key => $row){
            $chart_data[] = array(
                'datetk' => $row['date'],
                'revenue' => $row['doanhthu']
            );
    }
}
if($luachon=='thang')
{
    $query = " SELECT 
    YEAR(date_thongke) AS nam,
    MONTH(date_thongke) AS thang,
    SUM(tongtien) AS doanhthu
FROM 
    tbl_hoadon
    WHERE  date_thongke BETWEEN '$inp' AND '$out'
GROUP BY 
    YEAR(date_thongke),
    MONTH(date_thongke)
ORDER BY 
    nam DESC,
    thang DESC
    ";
$result = mysqli_query($conn,$query);
    if (is_array($result) || is_object($result))
    foreach($result as $key => $row){
           $chart_data[] = array(
               'datetk' => $row['nam']."-".$row['thang'],
               'revenue' => $row['doanhthu']
           );
   }
}
if($luachon=='nam')
{
    $query = " SELECT 
    YEAR(date_thongke) AS nam,
    SUM(tongtien) AS doanhthu
FROM 
    tbl_hoađon
WHERE  date_thongke BETWEEN '$inp' AND '$out'
GROUP BY 
    YEAR(date_thongke)
ORDER BY 
    nam DESC
    ";
    //$result= $db -> select($query);
    $result = mysqli_query($conn,$query);
    if (is_array($result) || is_object($result))
    foreach($result as $key => $row){
           $chart_data[] = array(
               'datetk' => $row['nam'],
               'revenue' => $row['doanhthu']
           );
   }
}
// if($chart_data!= null)
 echo json_encode($chart_data);
// else echo("không có dữ liệu");
}
// SELECT DATEADD(month, 1, '2023-01-01') AS NewDate;
?>
