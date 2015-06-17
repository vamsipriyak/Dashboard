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
	 
		$websites = $this->getWebsite();
		foreach($websites as $count)
		{
			//needed
		}
		if(!count($count))
		{
			$id = 1;
		}
		else
		{
			$id = $count['_id']+1;
		}
		  $document = array( 
			"_id" => $id,
			"parent_page_id" => $inputValues['parentSiteId'],
			"URL" =>$inputValues['webPageUrl']      	  
	     );

		$user_collection = $this->mongo_db->db->websites;
		return $user_collection->insert($document);
		#redirect();	
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
	public function isWebsiteExists($link)
	{
		$collection = $this->mongo_db->db->selectCollection('websites');
		$website = $collection->find(array('URL' => $link));
		foreach($website as $url) {
		}				
		return $url;
	}	
	
}

?>