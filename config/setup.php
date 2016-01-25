<!--coding club-->
<?php

#Database Connection:
include "connection.php";

#Constants
DEFINE('D_TEMPLATE','templates');

#Functions:
include('functions/data.php');

if(isset($_GET['id'])){
	$pageid = $_GET['id'];;
}else{
	$pageid = 1;
}

#Page Setup:
#data_page($dbc,$pageid);

?>