<?php 

?>
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<?php 
/*$id = 1;

$conn = mysqli_connect("localhost","root","leaderboard","nitscc");
$r = "SELECT * FROM user_ratings WHERE id = '$id'";
$q = mysqli_query($conn,$r);
$arr = mysqli_fetch_row($q);
$rating = array_slice($arr,2);
$res = json_encode($rating);
mysqli_close($conn);*/
?>
<script type="text/javascript">
window.onload = initialize;

function give_title_color(rating){
	var title;
	
	if(rating >= 2900){
		title = ["Lengendary Grandmaster","rgb(255,0,0)"];
	}
	else if(rating >=2600 && rating < 2900) {
		title = ["International Grandmaster","rgb(255,0,0)"];
	}
	else if(rating >=2400 && rating < 2600) {
		title = ["Grandmaster","rgb(255,0,0)"];
	}
	else if(rating >=2300 && rating < 2400) {
		title = ["International master","#FF8C00"];
	}
	else if(rating >=2200 && rating < 2300) {
		title = ["Master","rgb(255, 140, 0)"];
	}
	else if(rating >=1900 && rating < 2200) {
		title = ["Candidate Master","#a0a"];
	}
	else if(rating >=1600 && rating < 1900) {
		title = ["Expert","rgb(0,0,255)"];
	}
	else if(rating >= 1400 && rating < 1600){
		title = ["Specialist","rgb(3, 168, 158)"];
	}
	else if(rating >=1200 && rating < 1400) {
		title = ["Pupil","rgb(0,128,0)"];
	}
	else if(rating < 1200){
		title = ["Newbie","rgb(128, 128, 128)"];
	}
	return title;
}

function initialize(){
var rating = document.getElementsByClassName("data");
for(var i = 0; i < rating.length;i++){
	var display = rating[i].getElementsByTagName("td")[2].innerHTML;
	var values = give_title_color(display);
		var colr =rating[i].getElementsByTagName("a")[0];
		colr.style.color = values[1];
		colr.setAttribute("title",values[0]);
		}
}

</script>