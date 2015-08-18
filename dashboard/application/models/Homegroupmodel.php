<?php
class Homegroupmodel extends CI_Model {
public function getParameterdata()
	{	
	
			$drop_parameters_Collection = $this->mongo_db->db->parameters_Collection->drop();
			$drop_resultgroupby = $this->mongo_db->db->resultgroupby->drop();
			 $mapWebsites = new MongoCode("function () {

					var output= {pageid : this._id,Param1:null, Param2:null, Param3:null, Param4:null, Param5:null ,Param6:null ,Param7:null ,Param8:null ,Param9:null ,Param10:null , URL:this.URL,parent_page_id : this.parent_page_id
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
						if(outs.parent_page_id ==null){
							outs.parent_page_id = v.parent_page_id
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
	       
			 
	/***** Start of group by parent site *****/ 
			 $ops = array( 
					'$group' => array(
					'_id' => '$value.parent_page_id',
					'Param1_avg' => array('$avg' => '$value.Param1'),
					'Param2_avg' => array('$avg' => '$value.Param2'),
					'Param3_avg' => array('$avg' => '$value.Param3'),
					'Param4_avg' => array('$avg' => '$value.Param4'),
					)
				);
			$parameterdatas = $this->mongo_db->db->selectCollection('parameters_Collection');			
			$resultgroup = $parameterdatas->aggregate($ops);
			$user_collection = $this->mongo_db->db->resultgroupby;
			for($i=0;$i<count($resultgroup['result']);$i++)
			{
				$parent_page_id = $resultgroup['result'][$i]['_id'];
				if($parent_page_id!='')
				{
							$groupvalueID = $this->getNextSequence("groupvalueid");

					$groups = $this->mongo_db->db->selectCollection('groups');
					$groups = $groups->findOne(array('parent_page_id' => $parent_page_id));
					
					
					if($resultgroup['result'][$i]['Param1_avg'] >=  $groups['param1_maxvalue']) {
					
					        $Param1_flag="Green";
						
							} else if($resultgroup['result'][$i]['Param1_avg'] < $groups['param1_maxvalue'] && $resultgroup['result'][$i]['Param1_avg'] >= $groups['param1_minvalue']) {
							$Param1_flag="Yellow";
								
							} else {
							$Param1_flag="Red";
							}
							if($resultgroup['result'][$i]['Param4_avg'] >=  $groups['param4_maxvalue']) {
					
					          $Param4_flag="Green";
						
							} else if($resultgroup['result'][$i]['Param4_avg'] < $groups['param4_maxvalue'] && $resultgroup['result'][$i]['Param4_avg'] >= $groups['param4_minvalue']) {
							$Param4_flag="Yellow";
								
							} else {
							$Param4_flag="Red";
							}
								if($resultgroup['result'][$i]['Param2_avg'] < $groups['param2_minvalue']) {
									$Param2_flag="Green";			
								} else if($resultgroup['result'][$i]['Param2_avg'] >= $groups['param2_minvalue'] && $resultgroup['result'][$i]['Param2_avg'] < $groups['param2_maxvalue']) {
									$Param2_flag="Yellow";
								} else {
									$Param2_flag="Red";
								}	
                          if($resultgroup['result'][$i]['Param3_avg'] < $groups['param3_minvalue']) {
									$Param3_flag="Green";			
								} else if($resultgroup['result'][$i]['Param3_avg'] >= $groups['param3_minvalue'] && $resultgroup['result'][$i]['Param3_avg'] < $groups['param3_maxvalue']) {
									$Param3_flag="Yellow";
								} else {
									$Param3_flag="Red";
								}									
											
											/*} 
											
											else {
											
											//reverse logic
												if($resultgroup['result'][$i]['Param1_avg'] < $groups['param1_minvalue']) {
												
											} else if($resultgroup['result'][$i]['Param1_avg'] >= $groups['param1_minvalue'] && $paramValue < $groups['param1_maxvalue']) {
												
											} else {
												
											}
											}*/
					
					
					$document = array( 
					"_id" => $groupvalueID,
					"parent_page_id" => $parent_page_id,
					"URL" =>$groups['URL'],
					"title" =>$groups['title'],
					"logo" =>$groups['logo'],
					"Param1" => $resultgroup['result'][$i]['Param1_avg'],
					"Param2" => $resultgroup['result'][$i]['Param2_avg'],
					"Param3" => $resultgroup['result'][$i]['Param3_avg'],
					"Param4" => $resultgroup['result'][$i]['Param4_avg'],
                    "param1_minvalue" => $groups['param1_minvalue'],			
					"param1_maxvalue" => $groups['param1_maxvalue'],
					"param2_minvalue" => $groups['param2_minvalue'],			
					"param2_maxvalue" => $groups['param2_maxvalue'],
					"param3_minvalue" => $groups['param3_minvalue'],			
					"param3_maxvalue" => $groups['param3_maxvalue'],
					"param4_minvalue" => $groups['param4_minvalue'],			
					"param4_maxvalue" => $groups['param4_maxvalue'],					
					"param1_flag" => $Param1_flag,	
					"param2_flag" => $Param2_flag,	
					"param3_flag" => $Param3_flag,	
					"param4_flag" => $Param4_flag,	
					);
					$user_collection->insert($document);
					
				}
			}
    /***** End of group by parent site *****/
	 $parameterdata = $this->mongo_db->db->selectCollection('resultgroupby');
	 $results = $parameterdata->find()->sort(array('parent_page_id' => 1));
	 

		 return $results;
	}
	
	public function getParameterdata1($value)
	{
	 $parameterdata = $this->mongo_db->db->selectCollection('resultgroupby');
		if($value!="")
			 { 
			 if($value=="All")
			 {
		 $results = $parameterdata->find()->sort(array('_id' => -1));
		 }
		 else if($value=="Recent")
			 {
			 
			 		 $results = $parameterdata->find()->sort(array('_id' => -1))->limit(20);

			 }
			 }
			 return $results;
			
	}
	
	public function getParameterdata2($value)
	{
	 $parameterdata = $this->mongo_db->db->selectCollection('resultgroupby');
		if($value!="")
			 { 
			
		  $results = $parameterdata->find()->sort(array($value => 1));
		 
			 }
			 return $results;
			
	}
	public function getParameters()
	{	 
		 $parameters = $this->mongo_db->db->selectCollection('parameters');
		 $results = $parameters->find()->sort(array('_id' => 1))->limit(4);
		 return $results;
	}
	public function getParameterscollection($pageid)
	{	 
		 $parameters = $this->mongo_db->db->selectCollection('parameters_Collection');
		 $results = $parameters->find(array('_id' => $pageid));
		 return $results;
	}
	public function getParametersajaxload()
	{	 
		 $parameters = $this->mongo_db->db->selectCollection('parameters');
		 $results = $parameters->find()->sort(array('_id' => 1));
		 return $results;
	}
	public function getParamdatabyparentpageid($pageid)
	{	 
		 $parameters = $this->mongo_db->db->selectCollection('parameters_Collection');
		 $results = $parameters->find(array("value.parent_page_id" => $pageid));
		 return $results;
	}
	
	public function getLastcrontime()
	{	 
		 $parameters = $this->mongo_db->db->selectCollection('cron');
		 $results = $parameters->find(array('inProgress' => 'N'))->sort(array('_id' => -1))->limit(1);		
		 return $results;
	}
	
	public function getNextSequence($name){
		global $collection;
		$collection = $this->mongo_db->db->selectCollection('groupvalues_counters');
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