<?php
class Editmodel extends CI_Model {

	public function getParameters()
	{	 
        $collection = $this->mongo_db->db->selectCollection('parameters');
       	//selecting records from the collection - surfinme_index
       	$websites = $collection->find();
		return $websites;
	}		
	
	public function updateParam($id,$minvalue,$maxvalue,$desc)
	{	
			$collection = $this->mongo_db->db->selectCollection('parameters');	
			$collection->update(array("_id"=>(int)$id), array('$set'=>array("minimum_value"=>(int)$minvalue,"maximum_value"=>(int)$maxvalue,"description"=>$desc)));
	}		
}

?>