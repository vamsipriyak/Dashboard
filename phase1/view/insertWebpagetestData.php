<?php
 include '/includes/cronConfig.php';
 // $score=$_POST['pagescore'];
   $testIds= explode(',', trim($_POST['testIds']));
   $pageScores= explode(',', $_POST['pageScores']);
   //print_r($testIds);
   //print_r($pageScores);
   foreach ($testIds as $key=>$value) {
	$checkStatusURL = "http://www.webpagetest.org/testStatus.php?f=xml&test=".$value;
	//echo $checkStatusURL;
	$xmlStatusResponse = simplexml_load_file($checkStatusURL);
  if($xmlStatusResponse) {
	
	do {
		$xmlStatusResponse = simplexml_load_file($checkStatusURL);
		$completed = checkTestComplete($xmlStatusResponse);
		
		if(!$completed) {
			sleep(20);
		}
	} while (!$completed);
	
	
	//echo $xmlStatusResponse->data->statusText; 
	
	if($completed) {
		$resultsURL = "http://www.webpagetest.org/xmlResult/".$value."/";
		//echo "<br/>".$resultsURL;
		$xmlResultsResponse = simplexml_load_file($resultsURL);
		if($xmlStatusResponse) {
			$pageID = getPageID($xmlResultsResponse->data->testUrl);
			$collection = $db->parameterdata_counters; 
			$user_collection = $db->parameterdata;

			$document = array( 
				"_id" => getNextSequence("parameterdataid"),
				"datasource_id" => 2,
				"parameter_id" => 1,
				"page_id" => $pageID,
				"value" => "",
				"data" => $xmlResultsResponse->data,
				"updated_time" => new MongoDate()
			);
		$pageScore = (int)($pageScores[$key]);
		//echo "PageScore".$pageScore;
		
		$loadTime = (int)($xmlResultsResponse->data->average->firstView->loadTime)/1000;
		$ttfb = (int)($xmlResultsResponse->data->average->firstView->TTFB)/1000;
		$gzipCompression = (int)($xmlResultsResponse->data->average->firstView->score_gzip);
		$browserCache = (int)($xmlResultsResponse->data->average->firstView->score_cache);
		echo $pageID.','.$pageScore.','.$loadTime.','.$ttfb.','.$gzipCompression.','.$browserCache;
		$collection = $db->parametersCollection_counters;
		$parameterCol  = $db->parametersCollection;
		$parameterCollection = array( 
				"_id" => getNextSequence("parameterCollectiondataid"),
				"page_id" => $pageID,
				"Param1" => $pageScore,
				"Param2" => $loadTime,
				"Param3" => $ttfb,
				"Param4" => $gzipCompression,
				"Param5" => $browserCache,
				"updated_time" => new MongoDate()
			);
		$parameterCol->insert($parameterCollection);
		//echo "Document inserted successfully <br>";
		}
	
	}
	
	
  } else {
	//echo "in ELSE";
  }
 }
 
 function checkTestComplete($xml){
	if($xml->data->statusText == "Test Complete") {
		return true;
	} else {
		return false;
	}
	return false;
 }
 
 function getPageID($url){
	$m = new MongoClient();
	$db = $m->selectDB('dashboard');
	$websitecollection = new MongoCollection($db, 'websites');
	$whereQuery = array("URL" => "$url");
	$sitedetails = $websitecollection->find($whereQuery);
	foreach ($sitedetails as $site) {
		return $site["_id"];   
	}
	return 0;
 }
   /*$pageid=$_POST['page_id'];
  $json=json_decode($_POST['json'],true);
  echo "<pre>";
  print_r($json);
  echo "</pre>";
   $collection = $db->parameterdata_counters; 
   $user_collection = $db->parameterdata;

   $document = array( 
      "_id" => getNextSequence("parameterdataid"),
      "datasource_id" => 1,
	  "parameter_id" => 1,
	  "page_id" => $pageid,
	  "value" => "",
	  "data" => $json,
	  "updated_time" => new MongoDate()
   );
   $user_collection->insert($document);
   echo "Document inserted successfully <br>";*/
   
  
?>

