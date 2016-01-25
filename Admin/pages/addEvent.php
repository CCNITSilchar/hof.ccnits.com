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
<div class="add_event">
<form method="POST" action="../lboard/add_contest.php">
  <div class="form-group">
    <label for="InputUsername1">Date</label>
    <input type="date" name="contest_date" class="form-control" id="username" placeholder="Date of the Contest"></input>
   <span class="field-validation-error" data-valmsg-for="Username" data-valmsg-replace="true">
   <span for="Username" generated="true" class="error_text"></span>
   </span>
  </div>
  <div class="form-group">
    <label for="InputUsername1">Contest's Link</label>
    <input type="text" name="contest_link" class="form-control" id="username" placeholder="Contest's link of the event"></input>
   <span class="field-validation-error" data-valmsg-for="Username" data-valmsg-replace="true">
   <span for="Username" generated="true" class="error_text"></span>
   </span>
  </div>
  <div class="form-group">
    <label for="InputUsername1">Contest ID</label>
    <input type="text" name="contest_id" class="form-control" id="username" placeholder="Contest ID of the event"></input>
   <span class="field-validation-error" data-valmsg-for="Username" data-valmsg-replace="true">
   <span for="Username" generated="true" class="error_text"></span>
   </span>
  </div>
   <div class="form-group">
    <label for="status">Contest Type</label>
     	 <select class="form-control" name="contest_type">
		<option value="1" >1</option>
        <option value="1.5" >1.5</option>
		</select>
  </div>
  
 <button type="submit" name="event" class="btn btn-default">Add Event</button></form>
 </div>
 </div>
 </div>
 <?php
if(isset($_POST['event'])){
	$he_id = $_POST['he_id'];
	$date = $_POST['date'];
	$name = $_POST['name'];
	$link = $_POST['link'];
	$status = $_POST['status'];
	$q = "INSERT INTO contests(id,HE_contest_id,date,name,link,status) values ('',$he_id,'$date','$name','$link',$status)";
	$feedback = mysqli_query($dbc,$q);
?>
<br>
 <div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
  		<div class="panel-body">
        <?php
			if($feedback){
				echo "The event has been entered";
			}else{
				echo "TRY AGAIN";
			}
}
		?>
        </div>
        </div>
</div>
</div>



