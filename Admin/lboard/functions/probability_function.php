<?php
function probability($rating_j,$rating_i){
	return 1/(1+pow(10,($rating_i-$rating_j)/400));
}

function seed($seed_data,$participants,$coders_info){
	$newseed= array();
 foreach($seed_data as $Idi=>$ratingi)
 	$newseed[$Idi]=1;
 foreach($seed_data as $Idi=>$ratingi)
 {	
 	if($coders_info->is_new_coder($Idi))
 		$newseed[$Idi]=1+$participants/2;
 	else{
 			foreach($seed_data as $Idj=>$ratingj){
 				if($Idi==$Idj)
 					continue;
 				else
 				$newseed[$Idi]+=probability($ratingj,$ratingi);
 			}	
 	}
 }
 return $newseed;
}

?>