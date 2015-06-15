<?php
class Formmodel extends CI_Model {

	public function getWebsite()
	{	 
        $collection = $this->mongo_db->db->selectCollection('websites');
       	//selecting records from the collection - surfinme_index
       	$websites = $collection->find();
		return $websites;
	}		
	public function insertData($inputValues)
	{	
	 //$this->load->helper('url');

		  $document = array( 
			"_id" => 53,
			"parent_page_id" => 1,
			"URL" =>$inputValues['webPageUrl']      	  
	   );

		$user_collection = $this->mongo_db->db->websites;
		return $user_collection->insert($document);
		#redirect();	
	}		
}

?>