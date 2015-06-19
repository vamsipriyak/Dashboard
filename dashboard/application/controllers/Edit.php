<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(1);
class Edit extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
        $this->load->library('mongo_db');
		$this->load->library('session');
		$redirecturl=$this->config->base_url()."index.php/Admin/index";
		if($_SESSION['authentication']!= 1)
		{
		 		 header('Location:'.$redirecturl);
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
	
	public function editthreshold()
	{
	
        $pageid = $this->uri->segment(3);
 	    $this->load->view('includes/header');
		$this->load->model('Editmodel');		
	    $parameters['parameters'] = $this->Editmodel->getParameters();
		$parameters['threshold'] = $this->Editmodel->getThresholdValues($pageid);	
		$parameters['parampageid']=$pageid;		
		$this->load->view('editthreshold', $parameters);
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
	public function updateThreshold()
	{	
		$this->load->model('Editmodel');		
		$id = $this->input->post('id');
		$minvalue = $this->input->post('minvalue');
		$maxvalue = $this->input->post('maxvalue');
		echo "hiii".$parampageid = $this->input->post('parampageid');
		$this->Editmodel->updateThreshold($id,$minvalue,$maxvalue,$parampageid);
	}
	
}
