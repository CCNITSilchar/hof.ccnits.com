<?php
session_start();
$dbc = mysqli_connect('localhost','root','priyapandu','nitscc');
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$r = mysqli_query($dbc,"SELECT * FROM users WHERE uname='$username'");
	$num = mysqli_num_rows($r);
	
	if($num == 0){
		$_SESSION['username'] = false;
		$output = array('msg'=>'user not found','loggedin'=>'false');
	}
	
	if($num > 0 ){
		while($row = mysqli_fetch_assoc($r)){
			//$id = $row['id'];
			$uname  = $row['uname'];
			$pword  = $row['upass'];
		}
		
		if($password != $pword){
			echo "false";
			$output = array('msg'=>'password incorrect','loggedin'=>'false');
		}
			
		$_SESSION['username'] = $uname;
		$_SESSION['password'] = $pword;
		$output = array('loggedin'=>'true');
	}
	echo json_encode($output);
}


?>