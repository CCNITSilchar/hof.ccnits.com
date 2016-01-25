<?php

function upcoming_contests($dbc){
	$r = "SELECT name,link FROM contests WHERE status = '1'";
	$q = mysqli_query($dbc,$r); ?>
     <table class="table table-bordered">
	<tr><td><b>Upcoming Contests</b></td></tr>
	<?php while($row = mysqli_fetch_assoc($q)){?>
			<tr><td><a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a></td></tr>
		<?php 
	 }
}

function archived_contests($dbc){
	$r = "SELECT name,link FROM contests WHERE status = '0'";
	$q = mysqli_query($dbc,$r); ?>
     <table class="table table-bordered">
	<tr><td><b>Archived Contests</b></td></tr>
	<?php while($row = mysqli_fetch_assoc($q)){?>
			<tr><td><a href="<?php echo $row['link']; ?>"><span class="colr"><?php echo $row['name']; ?></span></a></td></tr>
		<?php 
	 }
}

function data_page($dbc){
	$r = $q = "SELECT id,name,rating FROM user ORDER BY rating DESC";
	$q = mysqli_query($dbc,$r);
	$num = mysqli_num_rows($q); ?>
    <table class="table table-bordered">
	<tr><td><b>User</b></td><td><b>Rating</b></td></tr>
	<?php while($row = mysqli_fetch_assoc($q)){ ?>
    		<tr class="data"><td><a href="profile.php?id=<?php echo $row['id'];?>"><?php echo $row['name']?></a></td><td id="rating"><?php echo $row['rating']?></td></tr>
    		
        
		
	<?php } ?> </table>
<?php }

	function profile_data($dbc,$id){
		$r = "SELECT * FROM coders WHERE CId_HR = $id";
		$q = mysqli_query($dbc,$r);
		while($row = mysqli_fetch_assoc($q)){ ?>
			<ul class="user_info">
            <li><div class="title" style="color:<?php echo $row['Color']; ?>"><span><?php echo $row['Title']; ?></span></div></li>
			<li><div class="name" style="color:<?php echo $row['Color']; ?>"><span><?php echo $row['Name']; ?></span></div></li>
            <li><div class="rating"><span>Contest Rating:</span><span style="color:<?php echo $row['Color']; ?>"><?php echo $row['Rating']; ?></span></li>
            </ul>
	<?php }
	}
?>
