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
        <div class="col-md-9 col-md-offset-2">
        <div class="panel panel-default">
  		<div class="panel-body">
        <span style="float:left;margin-top:10px;">Competitive Coding<br/>Upcoming and Archived Contests<br/></span>
    	<img src="images/NIT_Silchar_logo.png" width="100" height="100" style="float:right"/>
  		</div>
		</div>
        </div>
		</div>
        <div class="row">
        <div class="col-md-5 col-md-offset-2">
        <div class="table-responsive">
        <div id="cover">
       	<?php upcoming_contests($dbc); ?>
        </div>
        </div>
        </div>
        <div class="col-md-3">
    
       <table style="margin-left:0px;" class="table table-bordered">
  
       <?php archived_contests($dbc); ?>
       </table>
      
        </div>
        </div>
   		
        </div>
        <?php include('config/js.php'); ?> 
</body>
</html>