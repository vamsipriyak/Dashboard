<?php
class Helpmodel extends CI_Model {

	public function getParameters()
	{	 
        $collection = $this->mongo_db->db->selectCollection('parameters');
       	//selecting records from the collection - surfinme_index
       	$websites = $collection->find()->sort(array('_id' => 1));
		return $websites;
	}		
}

?>