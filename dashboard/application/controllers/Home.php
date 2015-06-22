<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 error_reporting(1);

class Home extends CI_Controller {
	function __construct(){

         parent::__construct();
         //loading  the mongodb library
         $this->load->library('mongo_db');	
		$this->load->library('session');		 
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		 $this->load->model('Homemodel');
		  
		 
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

 	    $this->load->view('includes/header');		
	   $parameterdata['parameterdata'] = $this->Homemodel->getParameterdata();
	   $parameterdata['parameters'] = $this->Homemodel->getParameters();
	   //$websites['websites'] = $this->Homemodel->getWebsites();
		$parameterdata['crontime'] = $this->Homemodel->getLastcrontime();
		$this->load->view('home', $parameterdata);
		$this->load->view('includes/footer');
	}
	
	public function ajaxload()
	{
	  $this->load->model('Homemodel');
	  $inputValues = $this->input->post();
	  $pageid=intval($_POST['id']);
	  $cnt=$_POST['cnt'];

	 $parameters = $this->Homemodel->getParameters();
	 $results = $this->Homemodel->getParameterscollection($pageid);

			$minarr=array();
			$maxarr=array();
			$i=0;
			 foreach($parameters as $row){
			   $minarr[$i] = $row['minimum_value'];
			   $maxarr[$i] = $row['maximum_value'];
			   $i++;										   
			 }	
			foreach($results as $row){
			 ?>		 
			<tr id="<?php echo $row['_id'] ; ?>" class="<?php echo $cnt; ?>">';		
			<?php										
			print '<td class="center">';
				print ' 
					<div  id="wait'.$row['_id'].'" style="display:none;"><img src="application/views/assets/img/demo_wait.gif" width="64" height="64" /></div>	
					
				<a href="performancedetails.php?param=1&pageid='.$row['_id'].'">'.$row['value']['URL'].'</td>';
				for($j=0; $j<10; $j++) {
				$paramValue = $row['value']["Param".($j+1)];
				if(!is_null($paramValue))
				{
				if($j == 0 || $j == 3 || $j == 4) {
				if($paramValue >= $maxarr[$j]) {
					print '<td class="green-new" >'.$paramValue.'</td>';
				} else if($paramValue < $maxarr[$j] && $paramValue >= $minarr[$j]) {
					print '<td class="yellow-new" >'.$paramValue.'</td>';
				} else {
					print '<td class="red-new" >'.$paramValue.'</td>';
				}
				} else {
					if($paramValue < $minarr[$j]) {
					print '<td class="green-new" >'.$paramValue.'</td>';
				} else if($paramValue > $minarr[$j] && $paramValue < $maxarr[$j]) {
					print '<td class="yellow-new" >'.$paramValue.'</td>';
				} else {
					print '<td class="red-new" >'.$paramValue.'</td>';
				}
				}
				}
				else
				{
				print '<td class="grey-new" >NA</td>';
				}
				}
					/*print '<td align="center" >   
					<img src="application/views/assets/img/refresh.png" alt="Mountain View" style="width:40px;height:40px;cursor:pointer;" class="refresh" id="'.$row['_id'].'">						
					
					</td>
					';*/
	            ?>
				</tr>
			<?php				
		 }
	}
	
	
	
}
