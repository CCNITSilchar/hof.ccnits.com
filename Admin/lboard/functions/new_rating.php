<?php
function new_rating($seed,$rank,$contest_type,$final_rating,$size){
	return ($seed-$rank)*160*$contest_type/$size+$final_rating;
}
?>