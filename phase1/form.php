<?php 
	include_once("controller/Controller.php");
    	$controller = new Controller();

  if($_REQUEST['action']=='')
  {
	$controller->addWebpageURL();
	}
	else if ($_REQUEST['action']=='addWebpageURL')
	{
	 $url = mysql_escape_string($_POST['webPageUrl']);
	 $isParentTrue = mysql_escape_string($_POST['isParent']);
     $parentSiteId = mysql_escape_string($_POST['parentSiteId']);
	 
	 
	  $urls=$controller->addWebpageURL($url,$isParentTrue,$parentSiteId);
	 
	}
else if ($_REQUEST['action']=='updateparameters')
	{
	 $minvalue = mysql_escape_string($_POST['minvalue']);
	 $maxvalue = mysql_escape_string($_POST['maxvalue']);
     $desc = mysql_escape_string($_POST['desc']);
	 $id = intval($_POST['id']);
	 
	  $controller->updateParam($id,$minvalue,$maxvalue,$desc);
	}
	else
	{
	}
?>