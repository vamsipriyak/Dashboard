<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
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
		$inputValues = $this->input->post();
 	    $this->load->view('includes/header');
		#$this->load->view('includes/leftpanel');	
		$this->load->model('Formmodel');
 	    $websites['websites'] = $this->Formmodel->getWebsite();
		$websites['parentwebsites'] = $this->Formmodel->getparentWebsites();
		$websites['params'] = $this->Formmodel->getParams();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$this->form_validation->set_rules('webPageUrl', 'Web Page Url', 'required|callback_valid_url_format|callback_check_url');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form', $websites);
		}
		else
		{
			$this->Formmodel->insertData($inputValues);
			$websites['success'] = 'success';
			$this->load->view('form', $websites);
		}
		$this->load->view('includes/footer');
	}
	function valid_url_format($str){
			if (!filter_var($str, FILTER_VALIDATE_URL) === false) {
				return TRUE;
			} else {
				$this->form_validation->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
				return FALSE;
			}
	 
			return TRUE;
	}   	
	function check_url($str){
		$this->load->model('Formmodel');	
		$website = $this->Formmodel->isWebsiteExists($str);
		
		if(count($website))
		{
			$this->form_validation->set_message('check_url', 'The URL you entered already exists.');
			return FALSE;
		}
		return TRUE;
	}   	
	
}
