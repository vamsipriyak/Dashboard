<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Help extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
        $this->load->library('mongo_db');
		$this->load->library('session');	
		
	}

	public function index()
	{
 	    $this->load->view('includes/header');
		$this->load->model('Helpmodel');		
	    $parameters['parameters'] = $this->Helpmodel->getParameters();
		$this->load->view('parameters', $parameters);
		$this->load->view('includes/footer');
	}
	
}
