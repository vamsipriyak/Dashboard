<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
        $this->load->library('mongo_db');
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
		$id = mysql_escape_string($this->input->post('id'));
		$minvalue = mysql_escape_string($this->input->post('minvalue'));
		$maxvalue = mysql_escape_string($this->input->post('maxvalue'));
		$desc = mysql_escape_string($this->input->post('desc'));		
		$this->Editmodel->updateParam($id,$minvalue,$maxvalue,$desc);
	}
	
}
