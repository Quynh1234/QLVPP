<?php
header('Content-Type: tẽt/html; charset=utf-8');
include "class.database.php";
require_once dirname(__FILE__) ."/libs/PHPExcel/PHPExcel.php";
if(!$_SESSION['login']){
    header("Location:login.php");
}
if(!$_SESSION['login']){
    $user = $_SESSION['login'];
    if($user && $user['role'] !='admin'){
        header("Location:index.php");
    }
}

if(isset($_POST['btnExport'])){
    $result = $mysqli->query('SELECT * FORM tbl_sanpham' );
    $objExcel = new PHPExcel;
    $objExcel -> setActiveSheetIndex (0)
   // $sheet = $objExcel ->getActiveSheet()->setTitle('tbl_sanpham');

   // $rowCount = 1;
    ->setCellValue('A1',"id_sanpham")
    ->setCellValue('B1',"tensp")
    ->setCellValue('C1',"loaisp_id")
    ->setCellValue('D1',"danhmuc_id")
    ->setCellValue('E1',"giasp")
    ->setCellValue('F1',"khuyenmai")
    ->setCellValue('G1',"anhsp")
    ->setCellValue('H1',"soluong")
    ->setCellValue('I1',"chitiet")
    ->setCellValue('K1',"tinhtrang");

    $key =0;

    //$result = $mysqli->query('SELECT * FORM tbl_sanpham');
    while($row = mysqli_fetch_assoc($result)){
        $objExcel -> setActiveSheetIndex (0)
       
        ->setCellValue('A'.($key+2), $tbl_sanpham['id_sanpham'])
        ->setCellValue('B'.($key+2), $tbl_sanpham['tensp'])
    ->setCellValue('C'.($key+2), $tbl_sanpham['loaisp_id'])
    ->setCellValue('D'.($key+2), $tbl_sanpham['danhmuc_id'])
    ->setCellValue('E'.($key+2), $tbl_sanpham['giasp'])
    ->setCellValue('F'.($key+2), $tbl_sanpham['khuyenmai'])
    ->setCellValue('G'.($key+2), $tbl_sanpham['anhsp'])
    ->setCellValue('H'.($key+2), $tbl_sanpham['soluong'])
    ->setCellValue('I'.($key+2), $tbl_sanpham['chitiet'])
    ->setCellValue('K'.($key+2), $tbl_sanpham['tinhtrang']);
        $key++;
    }
    $objExcel ->getActiveSheet()->setTitle('tbl_sanpham');
    $objPHPExcel->setActiveSheetIndex(0);
    // $obbWriter = new PHPExcel_Writer_Excel2019($objExcel);
    // $filename = 'export.xlsx';
    // $obbWriter->save($filename);
    header('Content-Disposition: attachment; filename = "tbl_sanpham.xlsx"');
    header('Content-Type: application/vnd.openxmlformat-sofficedocument.spreadsheettml.sheet');
   // header('Content-Length:' .filesize($filename));
    header('Content-Transfer-Encoding: binary ');
    header('Cache-Control: max-age=0 ');
    header('Cache-Control: max-age=1');
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2019');
$objWriter->save('php://output');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Excel</title>
</head>
<body>
    <form METHOD = "POST">
        <button name = "btnExport" type ="submit">Xuat file</button>
    </form>
</body>
</html>