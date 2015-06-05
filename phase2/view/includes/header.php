
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
	<!-- Bootstrap Styles-->
    <link href="view/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="view/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="view/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="view/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <!-- 2. You can add print and export feature by adding this line -->
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
	<script src="view/assets/js/custom-dashboard.js"></script>
    <link href="view/assets/css/dashboard-styles.css" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> 
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Dashboard</a>
            </div>
			<?php
			$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			?>
              <div style="float:right" >
			  <?php if (strpos($url,'form.php') == false) { ?>
			  <a href="form.php" class="navbar-help">Websites </a> | <?php   } ?> <?php if (strpos($url,'parameters.php') == false) { ?><a href="parameters.php" class="navbar-help">Parameters </a> <?php if (strpos($url,'help.php') == false) { ?> | <?php } } ?> <?php if (strpos($url,'help.php') == false) { ?> <a href="help.php" class="navbar-help">Help </a> <?php } ?></div>
			
        </nav>
       