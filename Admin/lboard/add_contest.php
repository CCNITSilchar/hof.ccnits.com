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
$contest=new contest();
$contest_id = $_POST['contest_id'];
$contest_type = $_POST['contest_type'];
$contest_link = $_POST['contest_link'];
$contest_date = $_POST['contest_date'];
//add $_POST VALUES HERE AND CONTEST WILL BE UPDATED
$contest->add_contest($contest_id,$contest_type,$contest_date,$contest_link);

//calling the function
header('Location:../pages/updateDatabase.php');

?>