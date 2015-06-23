<?php
class Editmodel extends CI_Model {

	public function getParameters()
	{	 
        $collection = $this->mongo_db->db->selectCollection('parameters');
       	//selecting records from the collection - surfinme_index
       	$websites = $collection->find();
		return $websites;
	}

	public function getThresholdValues($pageid)
	{	 
        $collection = $this->mongo_db->db->selectCollection('websites');
       	//selecting records from the collection - surfinme_index
       	$ParamDetails = $collection->findOne(array("_id" => (int)$pageid));
		return $ParamDetails;
	}	
	
	public function updateParam($id,$minvalue,$maxvalue,$desc)
	{	
			$collection = $this->mongo_db->db->selectCollection('parameters');	
			if($_SESSION['authentication']==1)
			{
			$collection->update(array("_id"=>(int)$id), array('$set'=>array("minimum_value"=>(int)$minvalue,"maximum_value"=>(int)$maxvalue,"description"=>$desc)));
			 echo "Parameter values updated successfully";
			}
	}	
	public function updateThreshold($id,$minvalue,$maxvalue,$pageid)
	{
			$collection = $this->mongo_db->db->selectCollection('websites');
			$minParamName = "param".$id."_minvalue";
			$maxParamName = "param".$id."_maxvalue";
			if($_SESSION['authentication']==1)
			{
			$collection->update(array("_id"=>(int)$pageid), array('$set'=>array($minParamName=>(int)$minvalue,$maxParamName=>(int)$maxvalue)));
			 echo "Parameter values updated successfully";
			}
			
			
	}		
}

?>