<?php 
error_reporting(0);
include('rev/vs.php');?>

<doctype html>
<html>
	
<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reportes-Tramos</title>
	<link href="../cmodelo/css/bootstrap.min.css" rel="stylesheet">
	<link href="../cmodelo/css/font-awesome.min.css" rel="stylesheet">
	<link href="../cmodelo/css/datepicker3.css" rel="stylesheet">
	<link href="../cmodelo/css/styles.css" rel="stylesheet">
	<link rel='shortcut icon' type='image/x-icon' href='../cmodelo/images/favicon.ico'/>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
</head>
	
<body>
<?php session_start();?>
<?php include('top.bar.php')?> 

<?php include('slidebar.php')?> 
	

		
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
			<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">DashBoard Tramos</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard de Tramos</h1>
			</div>
		</div><!--/.row-->
		
		
		<?php include('index.php')?> 
	</div>	<!--/.main-->

	
<?php include('footer.php')?> 	
	
	
	<script src="../cmodelo/js/jquery-3.4.1.min.js"></script>
	<script src="../cmodelo/js/bootstrap.min.js"></script>
	<script src="../cmodelo/js/chart.min.js"></script>
	<script src="../cmodelo/js/chart-data.js"></script>
	<script src="../cmodelo/js/easypiechart.js"></script>
	<script src="../cmodelo/js/easypiechart-data.js"></script>
	<script src="../cmodelo/js/bootstrap-datepicker.js"></script>
	<script src="../cmodelo/js/custom.js"></script>

	
	

		
</body>
	
	
</html>