<?php
class Homemodel extends CI_Model {
public function getParameterdata()
	{	
			 
			 $mapWebsites = new MongoCode("function () {

					var output= {pageid : this._id,Param1:null, Param2:null, Param3:null, Param4:null, Param5:null ,Param6:null ,Param7:null ,Param8:null ,Param9:null ,Param10:null , URL:this.URL}
						emit(this._id, output);
					};");
		$mapParam = new MongoCode("function () {

				   var output= {pageid : this.page_id,Param1:this.Param1, Param2:this.Param2, Param3:this.Param3,Param4:this.Param4,Param5:this.Param5,Param6:this.Param6, Param7:this.Param7, Param8:this.Param8,Param9:this.Param9,Param10:this.Param10  }
							emit(this.page_id, output);
					};");

		$reduceF = new MongoCode("function(key, values) { var outs = {Param1:null, Param2:null, Param3:null, Param4:null, Param5:null,Param6:null ,Param7:null ,Param8:null ,Param9:null ,Param10:null };

		values.forEach(function(v){

					   if(outs.Param1 ==null){
							outs.Param1 = v.Param1
						}
						if(outs.Param2 ==null){
							outs.Param2 = v.Param2
						}
						 if(outs.Param3 ==null){
							outs.Param3 = v.Param3
						}
						 if(outs.Param4 ==null){
							outs.Param4 = v.Param4
						}
						 if(outs.Param5 ==null){
							outs.Param5 = v.Param5
						}
						if(outs.Param6 ==null){
							outs.Param6 = v.Param6
						}
						if(outs.Param7 ==null){
							outs.Param7 = v.Param7
						}
						 if(outs.Param8 ==null){
							outs.Param8 = v.Param8
						}
						 if(outs.Param9 ==null){
							outs.Param9 = v.Param9
						}
						 if(outs.Param10 ==null){
							outs.Param10 = v.Param10
						}
						if(outs.URL ==null){
							outs.URL = v.URL
						}
						

		 });
		return outs;
		};");


		$result = $this->mongo_db->db->command(array(

			'mapreduce' => 'websites', // collection name

			'map' => $mapWebsites,

			'reduce' => $reduceF,
			

			"out" => array('reduce'=>'parameters_Collection') // new collection name
		));

		$result = $this->mongo_db->db->command(array(

			'mapreduce' => 'parametersCollection', // collection name

			'map' => $mapParam,
			'reduce' => $reduceF,
		   'sort' =>array('_id' => -1),
			"out" => array('reduce'=>'parameters_Collection') // new collection name
		));
	 
			 $parameterdata = $this->mongo_db->db->selectCollection('parameters_Collection');
		 $results = $parameterdata->find()->sort(array('_id' => 1));
			 return $results;
	}
	public function getParameters()
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
		
}

?>