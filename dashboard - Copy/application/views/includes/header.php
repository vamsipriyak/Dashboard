<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
	<!-- Bootstrap Styles-->
    <link href="<?php echo $this->config->base_url(); ?>application/views/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo $this->config->base_url(); ?>application/views/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="<?php echo $this->config->base_url(); ?>application/views/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="views/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <!-- 2. You can add print and export feature by adding this line -->
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
	<script src="<?php echo $this->config->base_url(); ?>application/views/assets/js/custom-dashboard.js"></script>
    <link href="<?php echo $this->config->base_url(); ?>application/views/assets/css/dashboard-styles.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="<?php echo $this->config->base_url(); ?>index.php/home">Dashboard</a>
            </div>
			<?php		
			error_reporting(1);
			$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			if($_SESSION['authentication']==1)
		     {
			?>
              <div style="float:right" >
			  <?php if (strpos($url,'/help') == false) { ?>
			  <?php if (strpos($url,'/form') == false) { ?>
			  <a href="<?php echo $this->config->base_url(); ?>index.php/form" class="navbar-help">Add a webpage </a> | <?php   } ?> 
			  <?php if (strpos($url,'/edit') == false) { ?>
			  <a href="<?php echo $this->config->base_url(); ?>index.php/edit" class="navbar-help">Edit Parameters </a> 
			  <?php if (strpos($url,'/help') == false) { ?> | <?php } } } ?> 
			 
			  <a href="<?php echo $this->config->base_url(); ?>index.php/admin/logout" class="navbar-help">Logout </a> 
			  </div>
			  <?php
			  }
			  else
			  {
			  ?>
              <div style="float:right" >
			  <?php if (strpos($url,'/help') == false) { ?>
			  <a href="<?php echo $this->config->base_url(); ?>index.php/help" class="navbar-help">Help </a> |
			  <?php } ?>
		      <a href="<?php echo $this->config->base_url(); ?>index.php/admin/index" class="navbar-help" target="_blank">Admin </a>
</div>			  
			 <?php
			  }
			  ?>
			
        </nav>
       