<div class="row">
<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
  <?php
  $tongdm=count($listthongke);
  $i=1;
foreach ($listthongke as $thongke) {
    extract($thongke);
    if($i==$tongdm) $dauphay=""; else $dauphay=",";
    echo "['".$thongke['tendm']."',".$thongke['countsp']."]".$dauphay;
    $i=$i+1;
}
  ?>
]);

// Set Options
var options = {'title':'Thống kê sản phẩm theo danh mục','width':1100, 'height':800};

// Draw
var chart = new google.visualization.PieChart(document.getElementById('piechart'));
chart.draw(data, options);

}
</script>
</div>