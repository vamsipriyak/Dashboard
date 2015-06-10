<?php
error_reporting(0);
function __autoload($class_name) 
{
    require_once  "model/Model.php";
}


class Controller {

	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();
	   

    } 
	

	public function getParameterdata()
	{
	
	    $parameterdata = $this->model->getParameterdata();
	   $parameters = $this->model->getParameters();
	    $websites = $this->model->getWebsites();
		include 'view/includes/header.php';
	   include 'view/home.php';
	   include 'view/includes/footer.php';
	   include 'view/updateDB.php';
	}
	public function addWebpageURL($url,$isParentTrue,$parentSiteId)
	{

	   if($url != '')
	   {
       $user_collection = $this->model->addWebsiteurls($url,$isParentTrue,$parentSiteId);	 
	   
       }	   
	   else
	   {
	   
	   $websites = $this->model->getWebsites();
	    $parentwebsites = $this->model->getparentWebsites();
		include 'view/includes/header.php';
	   include 'view/form.php';
	   include 'view/includes/footer.php';
	   }
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
	   include 'view/includes/header.php';
	   include 'view/includes/leftpanel.php'; 
	   include 'view/includes/generic.php'; 
	   include 'view/performancedetails.php';	   
	   include 'view/includes/footer.php';
	}	
	public function getHelp()
	{	
	    $parameters = $this->model->getParameter();
		include 'view/includes/header.php';
	   include 'view/parameters.php';
	   include 'view/includes/footer.php';
	}
	public function getParameters()
	{	
	    $parameters = $this->model->getParameter();
		include 'view/includes/header.php';
	   include 'view/editparameters.php';
	   include 'view/includes/footer.php';
	}
	public function updateParam($id,$minvalue,$maxvalue,$desc)
	{	
	    $parameters11 = $this->model->updateParam($id,$minvalue,$maxvalue,$desc);
		$parameters = $this->model->getParameter();
		include 'view/includes/header.php';
	   include 'view/editparameters.php';
	   include 'view/includes/footer.php';
	}
	
}

?>