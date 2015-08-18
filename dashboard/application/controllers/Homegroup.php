<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 error_reporting(1);

class Homegroup extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
         $this->load->library('mongo_db');	
		$this->load->library('session');		 
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		 $this->load->model('Homegroupmodel');
		  
		 
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{	
		if($_POST['check']=='')
		{
		$value="All";
		}
		else
		{
			 $value = $_POST['check']; 
		}
 	    $this->load->view('includes/header');		
	   $parameterdata['parameterdata'] = $this->Homegroupmodel->getParameterdata($value);
	   $parameterdata['parameters'] = $this->Homegroupmodel->getParameters();
	   //$websites['websites'] = $this->Homegroupmodel->getWebsites();
		$parameterdata['crontime'] = $this->Homegroupmodel->getLastcrontime();
		$this->load->view('homegroup', $parameterdata);
		$this->load->view('includes/footer');
	}
	public function filterby()
	{	
		if($_POST['check']=='')
		{
		$value="All";
		}
		else
		{
			 $value = $_POST['check']; 
		}
		//$val="filterby";
		$parameterdata['parameters'] = $this->Homegroupmodel->getParameters();
		$parameterdata['parameterdata'] = $this->Homegroupmodel->getParameterdata1($value);
		$parameterdata['crontime'] = $this->Homegroupmodel->getLastcrontime();
		$this->load->view('filterby', $parameterdata);
	}
	
	public function sortby()
	{	
		if($_POST['check']=='')
		{
		$value="All";
		}
		else
		{
			 $value = $_POST['check']; 
		}
			   $parameterdata['parameters'] = $this->Homegroupmodel->getParameters();

	   $parameterdata['parameterdata'] = $this->Homegroupmodel->getParameterdata2($value);
	   $parameterdata['crontime'] = $this->Homegroupmodel->getLastcrontime();
		$this->load->view('filterby', $parameterdata);
	}
	public function showinnerpages()
	{
	   //$this->load->model('Homegroupmodel');
	   $value = (int)$_POST['check'];
	   $parameterdata['parameterdata'] = $this->Homegroupmodel->getParamdatabyparentpageid($value);
	   $parameterdata['parameters'] = $this->Homegroupmodel->getParametersajaxload();
	   $this->load->view('ajaxload', $parameterdata);
	}
	
	
	
}

?>
