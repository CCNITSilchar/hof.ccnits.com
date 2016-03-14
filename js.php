<?php 
$id = 1;

$conn = mysqli_connect("localhost","root","priyapandu","nitscc");
$r = "SELECT * FROM contests WHERE userid = '$id'";
$q = mysqli_query($conn,$r);
$arr = mysqli_fetch_row($q);
$rating = array_slice($arr,2);
$res = json_encode($rating);
mysqli_close($conn);
?>
<script src='js/Chart.min.js'></script>
<script>
	var buyerData = {
	labels : ["Jul2010","Jan2011","Jul2011","Jan2012","Jul2012","Jan2013","Jul2013","Jan2014","Jul2014","Jan2015","Jul2015","Jan2016"],
	datasets: [
		{
			fillColor : "rgba(172,194,132,0.4)",
			strokeColor : "#ACC26D",
			pointColor : "#fff",
			pointStrokeColor : "#9DB86D",
			data : <?php echo $res ?>
		}
	]
};

 var buyers = document.getElementById('buyers').getContext('2d');
	var myLineChart = new Chart(buyers).Line(buyerData);
</script>