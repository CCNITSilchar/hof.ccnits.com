<!--coding club-->
<?php include('config/setup.php'); ?>

<!doctype html>
<html>
<head>
<title>CCNITS | Leaderboard</title>
	<meta name="viewport" content="width=deice-width,initial-scale=1.0">

<?php include('config/css.php'); ?>
</head>

<body>
        <div id="wrap">
        <aside class="main-sidebar">
        <section class="sidebar">
        <div class="logo"><i class="fa fa-code fa-4x"></i></div>
        <?php include('template/navigation.php'); ?>
        </section>
        </aside>
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
  		<div class="panel-body">
        <span style="float:left;margin-top:10px;">Competitive Coding<br/>Leaderboard<br/></span>
    	<img src="images/NIT_Silchar_logo.png" width="100" height="100" style="float:right"/>
  		</div>
		</div>
        </div>
		</div>
        <div class="row">
        <div class="col-md-5 col-md-offset-2">
        <div class="table-responsive">
        <div id="cover">
       	<?php data_page($dbc); ?>
        </div>
        </div>
        </div>
        <div class="col-md-3">
    
       <table style="margin-left:0px;" class="table table-bordered">
       <tr><td>Rating</td><td>Title</td></tr>
       <tr><td>> 2900</td><td><span style="color:rgba(255, 0, 0,1)">Legendary Grandmaster</span></td></tr>
       <tr><td>2600 - 2900</td><td><span style="color:rgba(255, 0, 0, 0.6">International Grandmaster</span></td></tr>
       <tr><td>2400 - 2600</td><td><span style="color:rgb(255,0,0)">Grandmaster</span></td></tr>
       <tr><td>2300 - 2400</td><td><span style="color:rgba(255, 140, 0, 0.9)">International Master</span></td></tr>
       <tr><td>2200 - 2300</td><td><span style="color:rgba(170,0,170,0.9)">Master</span></td></tr>
       <tr><td>1900 - 2200</td><td><span style="color:rgba(0, 0, 255, 0.9)">Candidate Master</span></td></tr>
       <tr><td>1600 - 1900</td><td><span style="color:rgba(0, 0, 255, 0.9)">Expert</span></td></tr>
       <tr><td>1400 - 1600</td><td><span style="color:rgba(3,168,158,0.9)">Specialist</span></td></tr>
       <tr><td>1200 - 1400</td><td><span style="color:rgb(0,128,0)">Pupil</span></td></tr>
        <tr><td>< 1200</td><td><span style="color:rgba(128,128,128, 0.9)">Newbie</span></td></tr>
       </table>
      
        </div>
        </div>
        </div>
        <?php include('config/js.php'); ?> 
</body>
</html>