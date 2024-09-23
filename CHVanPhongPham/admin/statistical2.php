<?php
include "header.php";
include "Left_side.php";
// include "class/product_class.php";
// include "helper/format.php";
// $product = new product();
// $fm = new Format();
// require ('Carbon/autoload.php');
//    use Carbon\Carbon;
//    use carbon\CarbonInterval;
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Báo cáo thống kê doanh thu</b></a></li>               
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h3>Báo cáo thống kê doanh thu: <?php //echo Carbon::now('Asia/Ho_Chi_Minh'); ?></h3>
                        </div>
                        <div class="admin-content-right">
                            <div class="product-add-content git">
                                      <div class="from-group col-md-3">
                                        <label class="control-label" for="">Lọc theo<span id="text-date" style="color: red;">*</span></label> <br>
                                        <select class="form-control select-thongke"  id ="luachon" onchange ="hienthi(luachon)">
                                        <option value="khong">--Chọn--</option>
                                        <option value="ngay">-- Ngày ---</option>
                                        <option value="thang">-- Tháng ---</option>
                                        <option value="nam">-- Năm ---</option>
                                        </select>
                                      </div>
                            </div>
                            <div id ="exten" >
                                <div class="from-group col-md-3">
                                      <label class="control-label" for="">Từ ngày <span style="color: red;">*</span></label> <br>
                                      <input class="form-control select-thongke" id="inputin" onchange ="checkkick()" > <br>
                                    </div>
                                    <div class="from-group col-md-3"> 
                                        <label class="control-label" for="">Tới ngày <span style="color: red;">*</span></label> <br>
                                        <input class="form-control select-thongke" id="inputout" onchange ="checkkick()" > <br>
                                        <button  class="btn btn-thongke" id="btnbangtk"  onclick = "showtk()">Doanh thu</button> 
                                        <button   class="btn btn-thongke"  onclick = "chart2()">biểu đồ </button> 
                                        <button   class="btn btn-thongke"  onclick = "xuatexcel()">Xuất Excel</button> 
                                      </div>      
                            </div>
                           
                            
                        </div>
                        <div>
                        </div>
                        <div class="" style="height: 1000px;">
                        <table id="customers">
                          <canvas id="myChart" style=""></canvas>
                         
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </main>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- chart 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript">

  var luachon = document.getElementById("luachon");
  var inp = document.getElementById("inputin");
  var out = document.getElementById("inputout");
  var table = document.getElementById('customers');
  var count =0;
function showtk(){
if(check()==true){
if(count==0){
var headers = ["STT", "DATE","Doanh Thu"];

var headerRow = table.insertRow(-1);
for (var i = 0; i < headers.length; i++) {
  var cell = headerRow.insertCell(i);
  cell.innerHTML = headers[i];
  cell.style.fontWeight = 'bold';
  cell.style.background ="#00FF33"
}
  
  $.ajax({
    url: 'ajax/thongke2.php',
    type: 'POST',
    data: { 'luachon': luachon.value,'inp':inp.value,'out':out.value },
    success: function(response) {
        // Xử lý phản hồi từ máy chủ ở đây
        var tkjson = response; 
        console.log(tkjson);

        var tkdt = JSON.parse(tkjson);
        console.log(tkdt);
        if(tkdt.length== 0)
        {alert("không có dữ liệu");}
        else{
        for (var i = 0; i < tkdt.length; i++) {
  // Tạo một hàng mới
        var row = table.insertRow(-1);

  // Tạo hai ô mới và gán giá trị
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = i+1;
        cell2.innerHTML = tkdt[i].datetk;
        cell3.innerHTML = tkdt[i].revenue;
        }
       }
    }
    
});
  }
count=1;
}
}
function checkkick(){
  table.innerHTML = "";
  $('myChart').remove();
  count = 0 ;
}
function hienthi(obj){
  checkkick();
  if(luachon.value=="khong")
  {
    inp.type = "number";
    out.type = "number";
    inp.style.display = 'none';
    out.style.display = 'none';
  }
  else{
    inp.style.display = 'block';
    out.style.display = 'block';
    if(luachon.value=="ngay")
  {
    inp.type = "date";
    out.type = "date";
  }
  if(luachon.value=="thang")
  {
    inp.type = "month";
    out.type = "month";
  }
  if(luachon.value=="nam")
  {
    inp.type = "number";
    out.type = "number";
    inp.step="1";
    out.step="1";
    inp.min="1900"; inp.max="2099";
    out.min="1900"; inp.max="2099";
  }
}
}
function check (){
  if(luachon.value=="khong")
  {
    alert("moi ban nhap lua chon");
    return false;
  }
  else{
  if(inp.value==""||out =="")
  {
  alert("Mời bạn nhập đủ thông tin");
  return false;
  }
else{
  var date1 = new Date(inp.value);
  var date2 = new Date(out.value);
  console.log(date1);
  if (date1.getTime() >= date2.getTime()) {
    alert("Bạn đã nhập sai dữ liệu thời gian");
    return false;
}
}}
return true;
}
function chart2(){
 if(check()==true)
 {
  $.ajax({
    url: 'ajax/thongke2.php',
    type: 'POST',
    data: { 'luachon': luachon.value,'inp':inp.value,'out':out.value },
    success: function(response) {
        // Xử lý phản hồi từ máy chủ ở đây
        var tkjson = response; 
        var tkdt = JSON.parse(tkjson);
        var data1 =[];
        var label1=[];
        for(var i=0;i<tkdt.length;i++)
   {
    label1[i] = tkdt[i].datetk;
     data1[i]= tkdt[i].revenue;

   }
   let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    // Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 16;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'bar',
      data:{
        labels:label1,
        datasets:[{
          label:'VNĐ',
          data: data1,
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Biểu Đồ Thống Kê Doanh Thu',
          fontSize:20
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:0,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });

    }
    
});
}}
  
  function xuatexcel(){
    var name = prompt("Nhập tên file của bạn", "Tên");
     exportData(name,'.xlsx');

  }
//   function exportData(name,type){
//     const fileName = name + type;
//     const table = document.getElementById("customers");
//     const wb = XLSX.utils.table_to_book(table);
//     XLSX.writeFile(wb, fileName);
// }
</script>
<script src="js/sheet.js"></script>
</body>
</html>