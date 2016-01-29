<!--coding club-->
<?php include('config/setup.php'); ?>
<!doctype html>
<html>
<head>
<title>CCNITS | Profile</title>
	<meta name="viewport" content="width=deice-width,initial-scale=1.0">

<?php include('config/profile_css.php'); ?>
</head>

<body>
        <div id="wrap">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
  		<div class="panel-body">
        <?php 
		$id = $_GET['id'];
		profile_data($dbc,$id);
		?>
		</div>
        </div>
		</div>
        </div>
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
        <div class="panel-body">
       	<div id="container" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
			<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <?php include('config/profile_js.php');?>
        </div>
        </div>
        </div>
        </div>
        </div>
        <?php #include('config/js.php'); ?> 
        
</body>
</html>
