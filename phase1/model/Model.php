<?php
 include 'view/includes/config.php';
?>
<?php
class Model extends Database{
	public $result;
	public $maxarr;
	public $minarr;
	private $vars = array();

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


		$result = $this->db->command(array(

			'mapreduce' => 'websites', // collection name

			'map' => $mapWebsites,

			'reduce' => $reduceF,
			

			"out" => array('reduce'=>'parameters_Collection') // new collection name
		));

		$result = $this->db->command(array(

			'mapreduce' => 'parametersCollection', // collection name

			'map' => $mapParam,
			'reduce' => $reduceF,
		   'sort' =>array('_id' => 1),
			"out" => array('reduce'=>'parameters_Collection') // new collection name
		));
	 
			 $results = $this->db->parameters_Collection->find()->sort(array('_id' => 1)); 
			 return $results;
	}
	public function getParameters()
	{	 
		$results = $this->db->parameters->find()->sort(array('_id' => 1));
		 return $results;
	}
	public function getWebsites()
	{	 
		$results = $this->db->websites->find()->sort(array('_id' => 1));
		 return $results;
	}
	public function addWebsiteurls($url,$isParentTrue,$parentSiteId)
	{	
		$collection = $this->db->website_counters; 
		$retval = $collection->findAndModify(
			 array('_id' => "websiteid"),
			 array('$inc' => array("seq" => 1)),
			 null,
			 array(
				"new" => true,
			)
		);
		$user_collection = $this->db->websites;
		if($isParentTrue != "Yes")
		{
		   $document = array( 
				"_id" => $retval['seq'],
			  "parent_page_id" => $parentSiteId,
			  "URL" =>$url     	  
		   );
		}
	   else
	   {
			$document = array( 
				"_id" => $retval['seq'],
			  "parent_page_id" => $retval['seq'],
			  "URL" =>$url     	  
		   );
	   }
   $user_collection->insert($document);
   return "Document inserted successfully";
	}	
		
	public function getPerformanceDetails($pageid)
	{	 

		$collection = $this->db->parameterdata;
		$cursor = $collection->find(array('datasource_id' => 1,'page_id' => $pageid))->sort(array('_id' => -1))->limit(1);
		return $cursor;
	}
	public function getLeftPanelDetails()
	{	 
	    $collection = $this->db->parameters;
	    $cursor = $collection->find()->sort(array('_id' => 1));					   
		return $cursor;
	}
	public function getParameterCollectionValues($pageid)
	{	 
        $values = $this->db->parametersCollection->find(array('page_id' => $pageid))->sort(array('_id' => -1))->limit(1);
		return $values;
	}
	public function getParameterChartData($pageid)
	{	 
		$mongotime = New Mongodate(time());
		$mongoendtime = New Mongodate(time()-30*24*3600);
  	    $parameterChartData = $this->db->parametersCollection->find(array('updated_time' => array('$lte'=>$mongotime, '$gte'=>$mongoendtime), 'page_id' => $pageid))->sort(array('updated_time' => 1));
		return $parameterChartData;
	}
	public function getUrls($pageid)
	{	 
		$collection = $this->db->websites;
		$document = $collection->findOne(array("_id" => $pageid));
		return $document;
	}
	public function getParameter($pageid)
	{	 
		$parameters = $this->db->parameters->find()->sort(array('_id' => 1));
		return $parameters;
	}	
	public function getWebsite()
	{	 
		$websites = $this->db->websites->find();
		return $websites;
	}	
	public function getparentWebsites()
	{	 
		$websites = $this->db->websites;
		 $js = "function() {
				return this._id == this.parent_page_id;
			}";
		$urls = $websites->find(array('$where' => $js));
		return $urls;
	}	
	
public function updateParam($id,$minvalue,$maxvalue,$desc)
	{	
		$user_collection = $this->db->parameters;
				
		$user_collection->update(array("_id"=>$id), array('$set'=>array("minimum_value"=>$minvalue,"maximum_value"=>$maxvalue,"description"=>$desc)));

		return "Document updated successfully";
}	
}

?>