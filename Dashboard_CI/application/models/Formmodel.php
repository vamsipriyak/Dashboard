<?php
class Formmodel extends CI_Model {
   function __construct() {

		
   }
	public function getWebsite()
	{	
        $collection = $this->mongo_db->db->selectCollection('websites');
       	//selecting records from the collection - surfinme_index
       	$websites = $collection->find();
		return $websites;
	}		
	
	public function getparentWebsites()
	{	 
		$websites = $this->mongo_db->db->selectCollection('websites');
		 $js = "function() {
				return this._id == this.parent_page_id;
			}";
		$urls = $websites->find(array('$where' => $js));
		return $urls;
	}		
	
	public function insertData($inputValues)
	{	
		$sequence = array();
		foreach($this->getWebsite() as $sequence)
		{
			//needed
		}
		if(!count($sequence))
		{
			$id = 1;
		}
		else
		{
			$id = $sequence['_id']+1;
		}

		  //$this->load->helper('url');
		  $document = array( 
			"_id" => $id,
			"parent_page_id" => 1,
			"URL" =>$inputValues['webPageUrl']      	  
	   );

		$user_collection = $this->mongo_db->db->websites;
		return $user_collection->insert($document);
	}		
	
}

?>