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