<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(1);
class Admin extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
         $this->load->library('mongo_db');
		 $this->load->library('session');
		 $this->load->helper(array('form', 'url'));
		 $this->load->library('form_validation');
		 $this->load->model('Adminmodel');
		 
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

		if($_SESSION['authentication']!= 1)
		{
 	    $this->load->view('includes/header');		
	    $this->load->view('adminlogin');
		$this->load->view('includes/footer');
		}
		else
		{
		header('Location: ../../index.php/home/index');
		
		}
	}
	public function login()
	{	
		$adminlogin=$this->Adminmodel->adminlogin($this->input->post('username'), $this->input->post('password'));
		if($_SESSION['authentication']==1)
		{
		 header('Location: ../form/index');
		}
		else
		{
		$this->load->view('includes/header');
	    $this->load->view('adminlogin');
		$this->load->view('includes/footer');
		}
	}
	public function logout()
	{
	 session_destroy();
	  unset($_SESSION["authentication"]);
	   unset($_SESSION["adminid"]);	 
	  header('Location: index');
	}
	
}
