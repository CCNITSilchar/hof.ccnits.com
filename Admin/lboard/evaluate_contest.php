<?php
//including configuration
require_once '../../config/connection.php';

//including classes 
include 'classes/coders_basic.php';
include 'classes/coders_rating.php';
include 'classes/contests.php';
include 'classes/hackerearth_api_connect.php';
include 'classes/hackerearth_data.php';
include 'classes/admin.php';
include 'classes/api_table.php';

//including functions
include 'functions/new_rating.php';
include 'functions/probability_function.php';

//declaring contest variables 
$contest=new contest();
$contest_id=$contest->get_not_evaluated_contest();
$cid=$contest->get_contest_no($contest_id);
$contest_type=$contest->get_contest_type($contest_id);

//calling the function
update_details($contest,$contest_id,$contest_type,$cid);

function update_details($contest,$contest_id,$contest_type,$cid){
	//adding contest details
	//creating object of api
	$provider="hackerearth";
	$api_table=new api_table();
	$api= new api($api_table->get_api_url($provider),$api_table->get_client_id($provider),$api_table->get_client_secret($provider));
	$json_data=$api->connect_api($contest_id);
	
	//creating object of data for getting valuable information from json data
	$data= new data();
	$coders_size=$data->coders_participated($json_data);
	if($coders_size==0)
	{
		die("Problem in connection with hackererth api : Reload to try again ");
	}

	//creating object of coders main table 
	$coders = new coders();
	//creating object of coders rating table
	$rating = new rating();
	//check for tables if not present then create them
 	
	//looping to add new coders details 
	for($i=0;$i<$coders_size;$i++){
		$hacker_id=$data->hacker_id($json_data,$i);
		$name=$data->name($json_data,$i); 
		if(!$coders->is_coder_present($hacker_id)){
			$coders->add_new_coder($hacker_id,$name);
			//$rating->add_new_coder($hacker_id);
			//echo "new coder added ".$name."<br>";
		}
	}



	//calculation of seeding
	//array for storing old ratings
	$rating_val=array();
	for($i=0;$i<$coders_size;$i++){
		$hacker_id=$data->hacker_id($json_data,$i);
		$rate=$coders->get_final_rating($hacker_id);
		$rating_val[$hacker_id]=$rate;
	}
	//echo "<pre>";
	//print_r($rating_val);

	//array storing new calculated seed values
	$seed=seed($rating_val,$coders_size,$coders);
	//echo "<pre>";
	//print_r($seed);

	//array for storing new rating values
	$new_rating=array();
	for($i=0;$i<$coders_size;$i++){
		$hacker_id=$data->hacker_id($json_data,$i);
		$new_rating[$hacker_id]=new_rating($seed[$hacker_id],$i+1,$contest_type,$rating_val[$hacker_id],$coders_size);
		
	}
	//echo "<pre>";
	//print_r($new_rating);

	//adding a new column in coders rating table
	
	//updating new rating for each participated contest
	foreach ($new_rating as $key => $value) {
		$uid=$coders->get_uid($key);
		$coders->update_rating($key,$value);
		$rating->insert_new_rating($cid,$uid,$value);
		//echo "rating updated";
	}

	//updating new coders to old 
	$coders->new_to_old();
	//updating that contest is evaluated 
	$contest->rate_contest($contest_id);
	
	header('Location:../pages/viewUsers.php');

}
	//update_details($contest,11902,1,2);
//update_details($contest,11641,1,1);

?>
