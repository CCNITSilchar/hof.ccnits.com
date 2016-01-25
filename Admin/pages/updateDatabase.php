<?php 

include('../config/css.php');
include('../config/setup.php'); ?>

<?php 
session_start();
if(!isset($_SESSION['username'])){
	header('Location:pages/admin_login.php');
	}
?>

<div id="wrap">
<?php include('../template/navigation.php');?>

<div class="row">
        <div class="col-md-6 col-md-offset-3">
        	<div class="panel panel-default">
  			<div class="panel-body">
            <h4>Update database for 
			<?php
			$q = mysqli_query($dbc,"SELECT he_id FROM contest WHERE evaluated = 0 ORDER BY id DESC"); 
			$latest = mysqli_fetch_assoc($q);
			echo $latest['he_id'];
			?></h4>
            <form method="POST" action="../lboard/evaluate_contest.php">
            <button name="update" type="submit">Update database </button>
            </form>
        	</div>
        	</div>
        </div>
   </div>

