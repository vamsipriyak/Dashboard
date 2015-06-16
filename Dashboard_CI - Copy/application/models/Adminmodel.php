<?php
class Adminmodel extends CI_Model {

	public function login()
	{	 
		 $parameters = $this->mongo_db->db->selectCollection('parameters');
		 $results = $parameters->find()->sort(array('_id' => 1));
		 return $results;
	}
	public function getParameterscollection($pageid)
	{	 
		 $parameters = $this->mongo_db->db->selectCollection('parameters_Collection');
		 $results = $parameters->find(array('_id' => $pageid));
		 return $results;
	}
	public function set_error($error)
	{
		$this->errors[] = $error;
		return $error;
	}
	public function adminlogin($postedUsername, $postedPassword)
	{
		 $hashpostedPassword = sha1($postedPassword);
		$adminss = $this->mongo_db->db->selectCollection('admin');
		$userDatabaseFind = $adminss->find(array('username' => $postedUsername));
		
			foreach($userDatabaseFind as $userFind) {
			
			   $storedUsername = $userFind['username'];
				$storedPassword = $userFind['password'];
				if($postedUsername == $storedUsername && $hashpostedPassword == $storedPassword){ 
				$_SESSION['authentication'] = 1;
				$_SESSION['adminid'] = $userFind['_id'];
			    }	
				
			}				
		 
	}	
}

?>