<?php
error_reporting(0);
function __autoload($class_name) 
{
    require_once  "model/Model.php";
}
	$functName = $_REQUEST['foo'];
	$url = mysql_escape_string($_POST['webPageUrl']);
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
	   include 'view/includes/header.php';

    } 
	

	public function getParameterdata()
	{
	
	    $parameterdata = $this->model->getParameterdata();
	   $parameters = $this->model->getParameters();
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
	   include 'view/form.php';
	   include 'view/includes/footer.php';
	}
	public function getPerformanceDetails($pageid)
	{
	   $cursor = $this->model->getPerformanceDetails($pageid);
	   $getLeftPanelDetailsData = $this->model->getLeftPanelDetails();
	   $values = $this->model->getParameterCollectionValues($pageid);
	   $parameterChartData = $this->model->getParameterChartData($pageid);
	   $pageUrl = $this->model->getUrls($pageid);
	   $parameters = $this->model->getParameter($pageid);
	   $websites = $this->model->getWebsite();
	   include 'view/includes/leftpanel.php'; 
	   include 'view/includes/generic.php'; 
	   include 'view/performancedetails.php';	   
	   include 'view/includes/footer.php';
	}	
	public function getHelp()
	{	
	    $parameters = $this->model->getParameter();
	   include 'view/parameters.php';
	   include 'view/includes/footer.php';
	}
	
}

?>