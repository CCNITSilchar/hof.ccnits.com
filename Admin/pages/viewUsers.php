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
        <?php 
		$q = "SELECT he_id,name,rating FROM user ORDER BY rating DESC";
		$r = mysqli_query($dbc,$q);
		?>
        	<table class="table table-bordered">
	<?php while($row = mysqli_fetch_assoc($r)){?>
			<tr><td><?php echo $row['he_id']; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row['rating']; ?></td></tr>
		<?php 
	 }?>
        </div>
   </div>

