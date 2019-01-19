 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>


 <div class="col-md-12">
       <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>            
</div>

 <script type="text/javascript">
   var report_list = <?php echo json_encode($reports) ?>; 
// Create the chart
   var arr_date =[];
   var arr_value =[];

   for(var i =0; i< report_list.length; i++) {
       arr_date.push(report_list[i].date) ;
       arr_value.push(Number(report_list[i].total));       

   }
    
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Hoá đơn hàng tháng'
    },
    subtitle: {
        text: 'Source: gemmaspa.vn'
    },
    xAxis: {
        categories:  arr_date,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'hóa đơn'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    
    series: [{
        name: 'Tháng <?php echo $month; ?>',
        data: arr_value

    }]
});
</script>