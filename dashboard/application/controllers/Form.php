<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
        $this->load->library('mongo_db');
		$this->load->library('session');	
		if($_SESSION['authentication']!= 1)
		{
		 header('Location: ../index.php/Admin/index');
		}
	}

	public function index()
	{
 	    $this->load->view('includes/header');
		#$this->load->view('includes/leftpanel');	
		$this->load->model('Formmodel');
 	    $websites['websites'] = $this->Formmodel->getWebsite();
		$websites['parentwebsites'] = $this->Formmodel->getparentWebsites();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$this->form_validation->set_rules('webPageUrl', 'Web Page Url', 'required|callback_valid_url_format');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form', $websites);
		}
		else
		{
			$inputValues = $this->input->post();
			$this->Formmodel->insertData($inputValues);
			$this->load->view('form', $websites);
		}
		$this->load->view('includes/footer');
	}
	function valid_url_format($str){
			//$pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
			$pattern = "/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/";
			
			if (!preg_match($pattern, $str)){
				$this->form_validation->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
				return FALSE;
			}
	 
			return TRUE;
	}   	
}
