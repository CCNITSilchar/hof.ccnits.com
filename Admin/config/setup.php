<!--coding club-->
<?php

#Database Connection:
$dbc = mysqli_connect('localhost','root','priyapandu','leaderboard') or die('Error: '.mysqli_connect_error());

#Constants
DEFINE('D_TEMPLATE','templates');

#Functions:
/*include('functions/data.php');
include('template/template.php');
include('functions/functions.php'); */

$site_title = 'NITS Coding Club';

if(isset($_GET['page'])){
	$pageid = $_GET['page'];
}else{
	$pageid = 1;
}


#Page Setup:
#$page = admin_panel($dbc,$pageid);

?>