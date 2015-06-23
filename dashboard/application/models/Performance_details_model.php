<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Performance_details_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();	
	}

	public function getLeftPanelDetails()
	{	 
		$collection = $this->mongo_db->db->selectCollection('parameters');
       	//selecting records from the collection - surfinme_index
       	$cursor = $collection->find()->sort(array('_id' => 1));					   
		return $cursor;
	}		
	public function getParameterCollectionValues($pageid)
	{	 
		$collection = $this->mongo_db->db->selectCollection('parametersCollection');
		$cursor = $collection->find(array('page_id' => (int)$pageid))->sort(array('_id' => -1))->limit(1);
		return $cursor;
	}	
	public function checkFeedExists($pageid)
	{	 
		$collection = $this->mongo_db->db->selectCollection('parametersCollection');
		$cursor = $collection->find(array('page_id' => (int)$pageid))->sort(array('_id' => -1))->limit(1);
		return $cursor->count();
	}
	public function getParameterChartData($pageid)
	{	 
		$mongotime = New Mongodate(time());
		$mongoendtime = New Mongodate(time()-30*24*3600);
		$collection = $this->mongo_db->db->selectCollection('parametersCollection');
       	$cursor = $collection->find(array('updated_time' => array('$lte'=>$mongotime, '$gte'=>$mongoendtime), 'page_id' => (int) $pageid))->sort(array('updated_time' => 1));
		return $cursor;
	}	
	public function getUrls($pageid)
	{	 
		$collection = $this->mongo_db->db->selectCollection('websites');
		$cursor = $collection->findOne(array("_id" => (int)$pageid));
		return $cursor;
	}	
	
	public function getWebsiteDetails($heading, $pageid)
	{
		if($heading == 1 || $heading == 2 || $heading == 3) {
			return;
		}
		$collection = $this->mongo_db->db->selectCollection('parameterdata');
		$cursor = $collection->find(array('datasource_id' => 1,'page_id' => (int)$pageid))->sort(array('_id' => -1))->limit(1);
		if($heading == 4)
		{
			$parameter = 'EnableGzipCompression';
		}
		if($heading == 5)
		{
			$parameter = 'LeverageBrowserCaching';
		}
		if($heading == 6)
		{
			$parameter = 'AvoidLandingPageRedirects';
		}
		if($heading == 7)
		{
			$parameter = 'OptimizeImages';
		}
		if($heading == 8)
		{
			$parameter = 'MinifyJavaScript';
		}				
		if($heading == 9)
		{
			$parameter = 'MinifyCss';
		}				
		if($heading == 10)
		{
			$parameter = 'MinifyHTML';
		}				

		if($heading == 4 || $heading == 5 || $heading == 6 || $heading == 7 || $heading == 8 || $heading == 9 || $heading == 10)
		{
			$headerFormatArray = array();
			foreach ($cursor as $l =>  $document) {
				//print '<pre>';
				//print_r($document);
				$headercount=sizeof($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks']);
				foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'] as $j => $header)
				{	
					$headerFormat = $header['header']['format'];
					if(array_key_exists('args', $header['header']))
					{
						$count = count($header['header']['args']);
						for($i=0;$i<$count;$i++)
						{
							$k = $i+1;
							$headerFormat = str_replace("$".$k."", $header['header']['args'][$i]['value'], $headerFormat);								
							if($i == count($header['header']['args'])-1)
							{
								#echo $headerFormat;
								$headerFormat = '<a href = '.$header['header']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;" target="_blank">'.$headerFormat.'</a>';
								$headerFormatArray[] = $headerFormat;		
							}
						}
					}
					else
					{
						$headerFormatArray[] = $headerFormat;		
					}
				}					
				if(array_key_exists(1, $document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks']))
				{
					foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'][1]['urls'] as $j => $urlsList)
					{	
						$headerFormat = $urlsList['result']['format'];
						if(array_key_exists('args', $urlsList['result']))
						{
							$count = count($urlsList['result']['args']);
							for($i=0;$i<$count;$i++)
							{
								$k = $i+1;
								$headerFormat = str_replace("$".$k."", $urlsList['result']['args'][$i]['value'], $headerFormat);								
								if($i == count($urlsList['result']['args'])-1)
								{
									$headerFormat = '<a href = '.$urlsList['result']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;" target="_blank">'.$headerFormat.'</a>';
									$headerFormatArray[] = $headerFormat;		
								}
							}
						}
					}					
				}	
			}
		}		
		return $headerFormatArray;
	}
}

?>
