<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
        $this->load->library('mongo_db');
	}

	public function index()
	{
 	    $this->load->view('includes/header');
		#$this->load->view('includes/leftpanel');	
		$this->load->model('Formmodel');
 	    $websites['websites'] = $this->Formmodel->getWebsite();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('webPageUrl', 'Web Page Url', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form', $websites);
		}
		else
		{
			$this->load->view('form', $websites);
		}
		$this->load->view('includes/footer');
	}

}
