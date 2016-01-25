<?php include('config/css.php'); ?>

<?php
	session_start();
	include('config/connection.php');

	if($_POST){
		$q = "SELECT * FROM admin WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
		$r = mysqli_query($dbc,$q);
		if(mysqli_num_rows($r) == 1){
			$_SESSION['username'] = $_POST['username'];
			header('Location:pages/addEvent.php');
		}
	}
?>

<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-info" style="padding:10px;">
	<h3>Login</h3><hr>
<form method="POST" action="admin_login.php" role="form">
			 <div class="form-group">
    <label for="InputUsername1">Username</label>
    <input type="text" name="username" class="form-control" placeholder="Username"></input>
   <span class="field-validation-error" data-valmsg-for="Username" data-valmsg-replace="true">
   <span for="Username" generated="true" class="error_text"></span>
   </span>
  </div>
  <div class="form-group">
    <label for="InputPassword1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password"></input>
      <span class="field-validation-error" data-valmsg-for="Password" data-valmsg-replace="true"><span for="Password" generated="true" class="error_text"></span></span>
  </div>
			<button type="submit" name="login" class="btn btn-default">Login</button></form>			
          </div>
          </div>
          </div>
          
          
  
          
          
          