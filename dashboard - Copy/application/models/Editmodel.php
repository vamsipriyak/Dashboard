<?php
class Editmodel extends CI_Model {

	public function getParameters()
	{	 
        $collection = $this->mongo_db->db->selectCollection('parameters');
       	//selecting records from the collection - surfinme_index
       	$websites = $collection->find();
		return $websites;
	}

	public function getThresholdValues()
	{	 
        $collection = $this->mongo_db->db->selectCollection('websites');
       	//selecting records from the collection - surfinme_index
       	$ParamDetails = $collection->findOne(array("_id" => 1));
		return $ParamDetails;
	}	
	
	public function updateParam($id,$minvalue,$maxvalue,$desc)
	{	
			$collection = $this->mongo_db->db->selectCollection('parameters');	
			$collection->update(array("_id"=>(int)$id), array('$set'=>array("minimum_value"=>(int)$minvalue,"maximum_value"=>(int)$maxvalue,"description"=>$desc)));
	}	
	public function updateThreshold($id,$minvalue,$maxvalue)
	{	
			$collection = $this->mongo_db->db->selectCollection('websites');
			$minParamName = "param".$id."_minvalue";
			$maxParamName = "param".$id."_maxvalue";
			$collection->update(array("_id"=>(int)1), array('$set'=>array($minParamName=>(int)$minvalue,$maxParamName=>(int)$maxvalue)));
	}		
}

?>