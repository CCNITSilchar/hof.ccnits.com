<?php
class data{
	
	public function hacker_id($result,$index){
		return $result['report']['completed_test'][$index]['candidate_id'];
	}

	public function name($result,$index){
		return $result['report']['completed_test'][$index]['candidate_name'];
	}

	public function email($result,$index){
		return $result['report']['completed_test'][$index]['email'];
	}

	public function institute($result){
		return strtolower($result['candidate_report']['institute']);
	}
	
	public function coders_participated($result){
		return sizeof($result['report']['completed_test']);
	}
}
?>