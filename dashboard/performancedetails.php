<?php 

	//Capture pageid passed from home page
	$pageid=(int)$_REQUEST['pageid'];
	include_once("controller/Controller.php");

	$controller = new Controller();
	$controller->getPerformanceDetails($pageid);

?>