<?php
//for upcoming events
function upcoming_contests($dbc){
	$r = "SELECT he_id,date,link FROM contest";
	$q = mysqli_query($dbc,$r); ?>
     <table class="table table-bordered">
	<tr><td><b>Upcoming Contests</b></td></tr>
	<?php while($row = mysqli_fetch_assoc($q)){
			if(!date_algo($row['date'])){?>
			<tr><td><a href="<?php echo $row['link']; ?>"><?php echo $row['he_id']; ?></a></td></tr>
		<?php }
	 }
}

//archived events
function archived_contests($dbc){
	$r = "SELECT he_id,date,link FROM contest";
	$q = mysqli_query($dbc,$r); ?>
     <table class="table table-bordered">
	<tr><td><b>Archived Contests</b></td></tr>
	<?php while($row = mysqli_fetch_assoc($q)){
		if(date_algo($row['date'])){?>
			<tr><td><a href="<?php echo $row['link']; ?>"><?php echo $row['he_id']; ?></a></td></tr>
		<?php 
		}
	 }
}

//for index page leaderboard
function data_page($dbc){
	$r = "SELECT id,name,rating FROM user ORDER BY rating DESC";
	$q = mysqli_query($dbc,$r);
	$num = mysqli_num_rows($q); 
	$i = 1;?>
    <table class="table table-bordered">
	<tr><td><b>Rank</b></td><td><b>Coder</b></td><td><b>Rating</b></td></tr>
	<?php while($row = mysqli_fetch_assoc($q)){ 
			$arr = assign_color_title($dbc,$row['rating']);
			?>
    	
    		<tr class="data"><td><?php echo $i; ?></td><td><a title="<?php echo $arr[0]; ?>" href="profile.php?id=<?php echo $row['id'];?>" style="color:<?php echo $arr[1]; ?>"><?php echo $row['name']?></a></td><td id="rating"><?php echo $row['rating']?></td></tr>
    		
        
		
	<?php $i++;} ?> </table>
<?php }

//for profile data
	function profile_data($dbc,$id){
		$r = "SELECT * FROM user WHERE id = $id";
		$q = mysqli_query($dbc,$r);
		$row = mysqli_fetch_assoc($q); 
		$arr = assign_color_title($dbc,$row['rating']);?>
			<ul class="user_info">
            <li><div class="title" style="color:<?php echo $row['Color']; ?>"><span><?php echo $arr[0]; ?></span></div></li>
			<li><div class="name" style="color:<?php echo $row['Color']; ?>"><span><?php echo $row['name']; ?></span></div></li>
            <li><div class="rating"><span>Contest Rating:</span><span style="color:<?php echo $arr[1]; ?>"><?php echo $row['rating']; ?></span></li>
            </ul>
	<?php 
	}
	
	//for color table
	function color_table($dbc){
		$q = "SELECT * FROM other_user_info ORDER BY id DESC";
		$r = mysqli_query($dbc,$q);
		while($row = mysqli_fetch_assoc($r)){ ?>
        <tr><td><?php echo $row['range']; ?></td><td><span style="color:<?php echo $row['color']; ?>"><?php echo $row['title']; ?></span></td></tr>
	<?php }
	}
	
	//assigning color and title
	function assign_color_title($dbc,$rating){
		$q = "SELECT * FROM other_user_info";
		$r = mysqli_query($dbc,$q);
		while($row = mysqli_fetch_assoc($r)){ 
				$arr = explode('-',$row['range']);
				if($rating >= $arr[0] && $rating <= $arr[1]){
					return array($row['title'],$row['color']);
				}
		}
		
	} 
	
	//for finding which contest is upcoming and which is archived
	function date_algo($event_date){
		$curr_date = date("Y-m-d");
		$curr_date_arr = explode('-',$curr_date);
		$event_date_arr = explode('-',$event_date);
		if($event_date_arr[0] <= $curr_date_arr[0] && $event_date_arr[1] <= $curr_date_arr[1] && $event_date_arr[2] < $curr_date_arr[2]){
			return 1;
		}else{
			return 0;
		}
		
}
?>
