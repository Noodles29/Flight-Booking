
<?php
use Carbon\Carbon;
use Carbon\CarbonInterval;

include 'db_connect.php';
require('../Carbon/autoload.php');

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

?>
<?php 
// $sql = "SELECT * FROM statistic_list";
$sql = "SELECT b.bookdate, SUM(f.price) AS sales FROM booked_flight b INNER JOIN flight_list f WHERE b.flight_id = f.id AND b.bookdate BETWEEN '2021-12-21' AND '$now' GROUP BY b.bookdate";
$result = $conn->query($sql);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date:'".$row["bookdate"]."', sales:".$row["sales"]."},";
}

?>
<div>
    <p style="font-size: large;"">Statistic of Sales: <span id="text-date" ></span></p>
</div>
<div id="chart" style="height: 250px;"></div>
<script type="text/javascript">
   	$(document).ready(function(){
    statistic();
    var char = new Morris.Bar({
    element : 'chart',
    data:[<?php echo $chart_data; ?>],
    xkey:'date',
    ykeys:[  'sales',],
    labels:[ 'Sales'],
    hideHover:'auto',
    stacked:true
    });

    function statistic(){
        var text = 'All';
        $('#text-date').text(text);
        $.ajax({
            url:'statistic.php',
            method: "POST",
            dataType:"JSON",
            success:function(data){
                char.setData(data);
                $('#text-date').text(text);
            }
        });
    }
});
</script>




 