<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
        $this->load->library('mongo_db');
		$this->load->library('session');	
		if($_SESSION['authentication']!= 1)
		{
		 header('Location: ../Admin/index');
		}
	}

	public function index()
	{
 	    $this->load->view('includes/header');
		$this->load->model('Editmodel');		
	    $parameters['parameters'] = $this->Editmodel->getParameters();
		$this->load->view('editparameters', $parameters);
		$this->load->view('includes/footer');
	}
	public function updateParam()
	{	
		$this->load->model('Editmodel');		
		$id = $this->input->post('id');
		$minvalue = $this->input->post('minvalue');
		$maxvalue = $this->input->post('maxvalue');
		$desc = $this->input->post('desc');		
		$this->Editmodel->updateParam($id,$minvalue,$maxvalue,$desc);
	}
	
}
