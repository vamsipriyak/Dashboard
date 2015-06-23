<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Performancedetails extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
        $this->load->library('mongo_db');
		$this->load->library('session');	
		
	}

	public function index()
	{
		$param = $this->uri->segment(3);
		$pageid = $this->uri->segment(4);
		$this->load->model('performance_details_model');
 	    $values['getLeftPanelDetailsData'] = $this->performance_details_model->getLeftPanelDetails();
		$values['pageid'] = $pageid;
		$values['param'] = $param;
 	    $this->load->view('includes/header');
		$this->load->view('includes/leftpanel', $values);
 	    $values['parameterValues'] = $this->performance_details_model->getParameterCollectionValues($pageid);
 	    $values['parameterChartData'] = $this->performance_details_model->getParameterChartData($pageid);
 	    $values['pageUrl'] = $this->performance_details_model->getUrls($pageid);
		$values['cursor'] = $this->performance_details_model->getWebsiteDetails($param, $pageid);
		$values['feedExists'] = $this->performance_details_model->checkFeedExists($pageid);
		$this->load->view('performancedetails', $values);
		$this->load->view('includes/footer');
	}
}
