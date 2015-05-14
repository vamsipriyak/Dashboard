<?php
error_reporting(1);
function __autoload($class_name) 
{
    require_once  "model/Model.php";
}
	echo "hiii".$functName = $_REQUEST['foo'];
	 echo "hii==".$url = mysql_escape_string($_POST['webPageUrl']);
  $parentSiteId = mysql_escape_string($_POST['parentSiteId']);
if($functName !='')
{

$controller = new Controller();
	$controller->addWebpageURL($url,$parentSiteId);
}

class Controller {

	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();
		echo "test";

    } 
	

	public function getParameterdata()
	{
	
	    $parameterdata = $this->model->getParameterdata();
	   $parameters = $this->model->getParameters();
	   include 'view/includes/header.php';
	   include 'view/home.php';
	   include 'view/includes/footer.php';
	}
	public function addWebpageURL($url,$parentSiteId)
	{
	

	   if($url != '')
	   {	
	   echo "url==".$url;
   $user_collection = $this->model->addWebsiteurls($url,$parentSiteId);	   
  
    }


	   $websites = $this->model->getWebsites();
	   include 'view/includes/header.php';
	   include 'view/form.php';
	   include 'view/includes/footer.php';
	}
	
}

?>