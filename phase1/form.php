<?php 
	include_once("controller/Controller.php");
    	$controller = new Controller();

  if($_REQUEST['action']=='')
  {
	$controller->addWebpageURL();
	}
	else if ($_REQUEST['action']=='addWebpageURL')
	{
	 $url = $_POST['webPageUrl'];
	 $isParentTrue = $_POST['isParentTrue'];
     $parentSiteId = $_POST['parentSiteId'];
	 
	 
	  $urls=$controller->addWebpageURL($url,$isParentTrue,$parentSiteId);
	 
	}
else if ($_REQUEST['action']=='updateparameters')
	{
	 $minvalue = $_POST['minvalue'];
	 $maxvalue = $_POST['maxvalue'];
     $desc = $_POST['desc'];
	 $id = intval($_POST['id']);
	 
	  $controller->updateParam($id,$minvalue,$maxvalue,$desc);
	}
	else
	{
	}
?>