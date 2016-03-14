<?php
//including configuration
require_once 'core/config.php';

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
$api_table=new api_table();

?>