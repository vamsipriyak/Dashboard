<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Performancedetails extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
        $this->load->library('mongo_db');
	}

	public function index()
	{
		$pageid = mysql_escape_string($this->input->get('pageid'));
		$param = mysql_escape_string($this->input->get('param'));
		$this->load->model('PerformanceDetailsModel');
 	    $values['getLeftPanelDetailsData'] = $this->PerformanceDetailsModel->getLeftPanelDetails();
 	    $this->load->view('includes/header');
		$this->load->view('includes/leftpanel', $values);
 	    $values['parameterValues'] = $this->PerformanceDetailsModel->getParameterCollectionValues($pageid);
 	    $values['parameterChartData'] = $this->PerformanceDetailsModel->getParameterCollectionValues($pageid);
 	    $values['pageUrl'] = $this->PerformanceDetailsModel->getUrls($pageid);
		$values['cursor'] = $this->PerformanceDetailsModel->getWebsiteDetails($param, $pageid);
		$this->load->view('performancedetails', $values);
		$this->load->view('includes/footer');
	}
}
