<?php
class Groupmodel extends CI_Model {

	public function getgroups()
	{	 
        $collection = $this->mongo_db->db->selectCollection('groups');
       	//selecting records from the collection - surfinme_index
       	$groups = $collection->find();
		return $groups;
	}		
	public function insertData($inputValues)
	{	
	 //$this->load->helper('url'); 
	  
		if($_SESSION['authentication']==1)
		 {
		 $logo = $_FILES['userfile']['name'];
		$user_collection = $this->mongo_db->db->groups;
		$groupID = $this->getNextSequence("groupid");
		$parentSiteID = (int)$inputValues['parentSiteId'];	
		$document = array( 
			"_id" => $groupID,
			"parent_page_id" => $parentSiteID,
			"URL" =>$inputValues['webPageUrl'],
			"title" =>$inputValues['title'],
			"logo" =>$logo,
			"param1_minvalue" => $inputValues['param1_minvalue'],			
			"param1_maxvalue" => $inputValues['param1_maxvalue'],
			"param2_minvalue" => $inputValues['param2_minvalue'],			
			"param2_maxvalue" => $inputValues['param2_maxvalue'],
			"param3_minvalue" => $inputValues['param3_minvalue'],			
			"param3_maxvalue" => $inputValues['param3_maxvalue'],
			"param4_minvalue" => $inputValues['param4_minvalue'],			
			"param4_maxvalue" => $inputValues['param4_maxvalue'],
		
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
		$collection = $this->mongo_db->db->selectCollection('groups');
		$website = $collection->find(array('URL' => $link));
		foreach($website as $url) {
		}				
		return $url;
	}
	
	public function isTitleExists($link)
	{
		$collection = $this->mongo_db->db->selectCollection('groups');
		$website = $collection->find(array('title' => $link));
		foreach($website as $url) {
		}				
		return $url;
	}
	
	public function getParams()
	{	 
        $collection = $this->mongo_db->db->selectCollection('parameters');
       	$params = $collection->find()->sort(array('_id' => 1))->limit(4);;
		return $params;
	}
	public function getNextSequence($name){
		global $collection;
		$collection = $this->mongo_db->db->selectCollection('group_counters');
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