
<?php
use Carbon\Carbon;
use Carbon\CarbonInterval;

include 'db_connect.php';
require('../Carbon/autoload.php');

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

?>
<?php 
$sql = "SELECT b.bookdate, SUM(f.price) AS sales FROM booked_flight b INNER JOIN flight_list f WHERE b.flight_id = f.id AND b.bookdate BETWEEN '2021-12-21' AND '$now' GROUP BY b.bookdate";
$result = $conn->query($sql);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date:'".$row["bookdate"]."', sales:".$row["sales"]."},";
}

?>
<div>
    <p style="font-size: large;"">Statistic of Sales: All <span id="text-date" ></span></p>
</div>
<div id="chart" style="height: 30vh;"></div>
<script type="text/javascript">
   	$(document).ready(function(){
    // statistic();
    var char = new Morris.Bar({
    element : 'chart',
    data:[<?php echo $chart_data; ?>],
    xkey:'date',
    ykeys:[  'sales',],
    labels:[ 'Sales'],
    hideHover:'auto',
    stacked:true,
    gridTextSize: 'auto'
    });

    // function statistic(){
    //     var text = 'All';
    //     $('#text-date').text(text);
    //     $.ajax({
    //         url:'statistic.php',
    //         method: "POST",
    //         dataType:"JSON",
    //         success:function(data){
    //             char.setData(data);
    //             $('#text-date').text(text);
    //         }
    //     });
    // }
});
</script>

<?php 

$sql2 = "SELECT a.airlines, COUNT(b.flight_id) AS countid FROM booked_flight b INNER JOIN flight_list f INNER JOIN airlines_list a  WHERE b.flight_id = f.id AND a.id = f.airline_id AND b.bookdate BETWEEN '2021-12-21' AND '$now' GROUP BY f.airline_id";
$result2 = $conn->query($sql2);
$chart_data2 = '';
while($row2 = mysqli_fetch_array($result2))
{
 $chart_data2 .= "{ Airline:'".$row2["airlines"]."', Ticket:".$row2["countid"]."},";
}

?>
<div>
    <p style="font-size: large;"">Airline Sales: <span id="text-date" ></span></p>
    <div  id="chart2" style="height: 35vh;"></div>
</div>

<script type="text/javascript">
   	$(document).ready(function(){
    var char = new Morris.Bar({
    element : 'chart2',
    data:[<?php echo $chart_data2; ?>],
    xkey:'Airline',
    ykeys:[  'Ticket',],
    labels:[ 'Number of saled ticket'],
    hideHover:'auto',
    stacked:true,
    barColors: 'pink',
    gridTextSize: 'auto'
    });
});
</script>

 