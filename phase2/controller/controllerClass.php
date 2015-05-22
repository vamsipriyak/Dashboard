<?php
error_reporting(1);

class ControllerClass {

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
	
		echo "inside function";
	   if($url != '')
	   {	
	   echo "url==".$url;
	   //$this->model = new Model();
   $user_collection = $this->model->addWebsiteurls($url,$parentSiteId);	   
  
    }


	   $websites = $this->model->getWebsites();
	   include 'view/includes/header.php';
	   include 'view/form.php';
	   include 'view/includes/footer.php';
	}
	
}

?>