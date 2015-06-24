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
		  
		if($_SESSION['authentication']==1)
		 {
		$user_collection = $this->mongo_db->db->websites;
		$websiteID = $this->getNextSequence("websiteid");
		if($inputValues['isParent'] == "Yes")
				$parentSiteID = $websiteID;
		else
				$parentSiteID = $inputValues['parentSiteId'];	
		$document = array( 
			"_id" => $websiteID,
			"parent_page_id" => $parentSiteID,
			"URL" =>$inputValues['webPageUrl'],
			"param1_minvalue" => $inputValues['param1_minvalue'],			
			"param1_maxvalue" => $inputValues['param1_maxvalue'],
			"param2_minvalue" => $inputValues['param2_minvalue'],			
			"param2_maxvalue" => $inputValues['param2_maxvalue'],
			"param3_minvalue" => $inputValues['param3_minvalue'],			
			"param3_maxvalue" => $inputValues['param3_maxvalue'],
			"param4_minvalue" => $inputValues['param4_minvalue'],			
			"param4_maxvalue" => $inputValues['param4_maxvalue'],
			"param5_minvalue" => $inputValues['param5_minvalue'],			
			"param5_maxvalue" => $inputValues['param5_maxvalue'],
			"param6_minvalue" => $inputValues['param6_minvalue'],			
			"param6_maxvalue" => $inputValues['param6_maxvalue'],
			"param7_minvalue" => $inputValues['param7_minvalue'],			
			"param7_maxvalue" => $inputValues['param7_maxvalue'],
			"param8_minvalue" => $inputValues['param8_minvalue'],			
			"param8_maxvalue" => $inputValues['param8_maxvalue'],
			"param9_minvalue" => $inputValues['param9_minvalue'],			
			"param9_maxvalue" => $inputValues['param1_maxvalue'],
			"param10_minvalue" => $inputValues['param10_minvalue'],			
			"param10_maxvalue" => $inputValues['param10_maxvalue'],
	     );
		 		return $user_collection->insert($document);

		 }
		 else
		 {
		  return -1;
		 }
		

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
	
	public function getParams()
	{	 
        $collection = $this->mongo_db->db->selectCollection('parameters');
       	//selecting records from the collection - surfinme_index
       	$params = $collection->find();
		return $params;
	}
	public function getNextSequence($name){
		global $collection;
		$collection = $this->mongo_db->db->selectCollection('website_counters');
		$retval = $collection->findAndModify(
		 array('_id' => $name),
		 array('$inc' => array("seq" => 1)),
		 null,
		 array(
			"new" => true,
		)
		);
		return $retval['seq'];
	}
	
}

?>