<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
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
		$this->load->model('Groupmodel');
 	    $groups['groups'] = $this->Groupmodel->getgroups();
		$groups['parentwebsites'] = $this->Groupmodel->getparentWebsites();
		$groups['params'] = $this->Groupmodel->getParams();
	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$this->form_validation->set_rules('webPageUrl', 'Web Page Url', 'required|callback_valid_url_format|callback_check_url');
		$this->form_validation->set_rules('title', 'Group Name', 'required|callback_check_title');
		$this->form_validation->set_rules('parentSiteId', 'Group', 'required');
		//$this->form_validation->set_rules('logo', 'Favicon', 'required');
			$logo = $_FILES['userfile']['name'];  
			$this->load->helper(array('form', 'url'));
			
			
			 ///////// upload start /////////



		  ///////// upload end /////////

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('group', $groups);

		}
		else
		{
		
		if($logo!='')
	   	{
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$file = fopen("sample.txt", 'w');
			fwrite($file, $this->upload->display_errors());
			fclose($file);
			$groups['error'] = $this->upload->display_errors();

			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
            $this->Groupmodel->insertData($inputValues);
			$groups['success'] = 'success';
			//$this->load->view('upload_success', $data);
		} 
		}
		else
		{
		  $this->Groupmodel->insertData($inputValues);
			$groups['success'] = 'success';
		}
			
			$this->load->view('group', $groups);
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
		$this->load->model('Groupmodel');	
		$website = $this->Groupmodel->isWebsiteExists($str);
		
		if(count($website))
		{
			$this->form_validation->set_message('check_url', 'The URL you entered already exists.');
			return FALSE;
		}
		return TRUE;
	} 
	
	function check_title($str){
		$this->load->model('Groupmodel');	
		$website = $this->Groupmodel->isTitleExists($str);
		
		if(count($website))
		{
			$this->form_validation->set_message('check_title', 'The Group name you entered already exists.');
			return FALSE;
		}
		return TRUE;
	} 

  	
	
}
