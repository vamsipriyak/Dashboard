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

					var output= {pageid : this._id,Param1:null, Param2:null, Param3:null, Param4:null, Param5:null , URL:this.URL}
						emit(this._id, output);
					};");
		$mapParam = new MongoCode("function () {

				   var output= {pageid : this.page_id,Param1:this.Param1, Param2:this.Param2, Param3:this.Param3,Param4:this.Param4,Param5:this.Param5  }
							emit(this.page_id, output);
					};");

		$reduceF = new MongoCode("function(key, values) { var outs = {Param1:null, Param2:null, Param3:null, Param4:null, Param5:null };

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
	public function addWebsiteurls($url,$parentSiteId)
	{	
	  echo "basics";
		$collection = $this->db->website_counters; 
		}
	
}

?>