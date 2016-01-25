<?php

function admin_panel($dbc,$id){
	$q = "SELECT * FROM admin_panel WHERE id = $id";
	$r = mysqli_query($dbc,$q);
	
	$data = mysqli_fetch_assoc($r); 
	
	$data['body_nohtml'] = strip_tags($data['body']);
	
	if($data['body'] == $data['body_nohtml']){
		
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';
		
	}else{
		
		$data['body_formatted'] = $data['body'];
		
	}
	
	return $data;
}

function plot_graph(){
		$id = 1;
		$conn = mysqli_connect("localhost","root","priyapandu","nitscc");
		$r = "SELECT * FROM contests WHERE userid = '$id'";
		$q = mysqli_query($conn,$r);
		$arr = mysqli_fetch_row($q);
		$rating = array_slice($arr,2);
		$res = json_encode($rating);
		mysqli_close($conn);
		return $res;
}

function give_title($rating){
	if($rating >= 2900){
		$title = array("Lengendary Grandmaster","rgb(255,0,0)");
	}
	else if($rating >=2600 && $rating < 2900) {
		$title = array("International Grandmaster","rgb(255,0,0)");
	}
	else if($rating >=2400 && $rating < 2600) {
		$title = array("Grandmaster","rgb(255,0,0)");
	}
	else if($rating >=2300 && $rating < 2400) {
		$title = array("International master","#FF8C00");
	}
	else if($rating >=2200 && $rating < 2300) {
		$title = array("Master","rgb(255, 140, 0)");
	}
	else if($rating >=1900 && $rating < 2200) {
		$title = array("Candidate Master","#a0a");
	}
	else if($rating >=1600 && $rating < 1900) {
		$title = array("Expert","rgb(0,0,255)");
	}
	else if($rating >= 1400 && $rating < 1600){
		$title = array("Specialist","rgb(3, 168, 158)");
	}
	else if($rating >=1200 && $rating < 1400) {
		$title = array("Pupil","rgb(0,128,0)");
	}
	else if($rating < 1200){
		$title = array("Newbie","rgb(128, 128, 128)");
	}
	return $title;
}

function insert_data(){
$i=0;
$size=sizeof($curl_result['report']['completed_test']);
$seed=1+$size/2;
for($i;$i<$size;$i++) {
	$name=$curl_result['report']['completed_test'][$i]['candidate_name'];
	$CId_HR=$curl_result['report']['completed_test'][$i]['candidate_id'];
	//echo $i+1 ." " . $CId_HR ." ". $name. " " .$seed;
	$query="INSERT INTO coders (Id,CId_HR,Name,Seed) values ($i+1,$CId_HR,'$name',$seed)";
	$response=mysqli_query($conn,$query);
	check_query($response);
}

}

?>