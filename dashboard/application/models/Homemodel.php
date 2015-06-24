<?php
class Homemodel extends CI_Model {
public function getParameterdata()
	{	
			
			 $mapWebsites = new MongoCode("function () {

					var output= {pageid : this._id,Param1:null, Param2:null, Param3:null, Param4:null, Param5:null ,Param6:null ,Param7:null ,Param8:null ,Param9:null ,Param10:null , URL:this.URL
					,param1_minvalue:this.param1_minvalue,param1_maxvalue:this.param1_maxvalue
					,param2_minvalue:this.param2_minvalue,param2_maxvalue:this.param2_maxvalue
					,param3_minvalue:this.param3_minvalue,param3_maxvalue:this.param3_maxvalue
					,param4_minvalue:this.param4_minvalue,param4_maxvalue:this.param4_maxvalue
					,param5_minvalue:this.param5_minvalue,param5_maxvalue:this.param5_maxvalue
					,param6_minvalue:this.param6_minvalue,param6_maxvalue:this.param6_maxvalue
					,param7_minvalue:this.param7_minvalue,param7_maxvalue:this.param7_maxvalue
					,param8_minvalue:this.param8_minvalue,param8_maxvalue:this.param8_maxvalue
					,param9_minvalue:this.param9_minvalue,param9_maxvalue:this.param9_maxvalue
					,param10_minvalue:this.param10_minvalue,param10_maxvalue:this.param10_maxvalue}
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
						
						if(outs.param1_minvalue ==null){
							outs.param1_minvalue = v.param1_minvalue
						}
						if(outs.param1_maxvalue ==null){
							outs.param1_maxvalue = v.param1_maxvalue
						}
						 if(outs.param2_minvalue ==null){
							outs.param2_minvalue = v.param2_minvalue
						}
						if(outs.param2_maxvalue ==null){
							outs.param2_maxvalue = v.param2_maxvalue
						}
						if(outs.param3_minvalue ==null){
							outs.param3_minvalue = v.param3_minvalue
						}
						if(outs.param3_maxvalue ==null){
							outs.param3_maxvalue = v.param3_maxvalue
						}
						if(outs.param4_minvalue ==null){
							outs.param4_minvalue = v.param4_minvalue
						}
						if(outs.param4_maxvalue ==null){
							outs.param4_maxvalue = v.param4_maxvalue
						}
						 if(outs.param5_minvalue ==null){
							outs.param5_minvalue = v.param5_minvalue
						}
						if(outs.param5_maxvalue ==null){
							outs.param5_maxvalue = v.param5_maxvalue
						}
						if(outs.param6_minvalue ==null){
							outs.param6_minvalue = v.param6_minvalue
						}
						if(outs.param6_maxvalue ==null){
							outs.param6_maxvalue = v.param6_maxvalue
						}
						if(outs.param7_minvalue ==null){
							outs.param7_minvalue = v.param7_minvalue
						}
						if(outs.param7_maxvalue ==null){
							outs.param7_maxvalue = v.param7_maxvalue
						}
						 if(outs.param8_minvalue ==null){
							outs.param8_minvalue = v.param8_minvalue
						}
						if(outs.param8_maxvalue ==null){
							outs.param8_maxvalue = v.param8_maxvalue
						}
						if(outs.param9_minvalue ==null){
							outs.param9_minvalue = v.param9_minvalue
						}
						if(outs.param9_maxvalue ==null){
							outs.param9_maxvalue = v.param9_maxvalue
						}
						
						if(outs.param10_minvalue ==null){
							outs.param10_minvalue = v.param10_minvalue
						}
						if(outs.param10_maxvalue ==null){
							outs.param10_maxvalue = v.param10_maxvalue
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
	public function getLastcrontime()
	{	 
		 $parameters = $this->mongo_db->db->selectCollection('cron');
		 $results = $parameters->find(array('inProgress' => 'N'))->sort(array('_id' => -1))->limit(1);		
		 return $results;
	}
		
}

?>