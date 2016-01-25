<?php
require 'classes/hackerearth_api_connect.php';

//test code is required as argument

function display_api_results($test_code){

		$api=new api();
		$curl_result=$api->connect_api($test_code);
		$i=0;
		echo "<pre>";
		$size=sizeof($curl_result['report']['completed_test']);
		for($i;$i<$size;$i++)
			echo $i+1 .". " . $curl_result['report']['completed_test'][$i]['candidate_name']." & Score : ".$curl_result['report']['completed_test'][$i]['candidate_total_score'] ."<br>";

}
?>