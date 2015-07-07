<?php 
date_default_timezone_set ("America/New_York");
$datetime1 = new DateTime();
	$m = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
   $db = $m->dashboard;
   $collection = $db->cron_counter;
		$cron_collection = $db->cron;
		$cronid = getNextSequence("cronid");
		$cron_document = array( 
			"_id" => (int) ($cronid),
			"time" => new MongoDate(),
			"inProgress" => "Y"
		);
	$cron_collection->insert($cron_document);
   $websites = $db->websites->find();
   $testResults = array();
   $i=0;
	foreach ($websites as $site) {
		echo "Getting google pagespeed insights for :: ".$site['URL'].'<br/>';
		$data = file_get_contents("https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=".$site['URL']."&key=AIzaSyCXhzHMvNj8HdLiOQ6DX9EwJ7O9yXtOjaA");
		$decodedData = json_decode($data);
		echo "Analyzing google pagespeed data for :: ".$site['URL'].'<br/>';
		$collection = $db->parameterdata_counters; 
		$user_collection = $db->parameterdata;
		$document = array( 
			"_id" => getNextSequence("parameterdataid"),
			"datasource_id" => 1,
			"parameter_id" => 1,
			"page_id" => $site['_id'],
			"value" => "",
			"data" => $decodedData,
			"updated_time" => new MongoDate()
		);
		$user_collection->insert($document);
		
		
		
		$result = array();
		$result = objectToArray($decodedData);

		//echo "<pre>";print_r($result['formattedResults']['ruleResults'] );exit;
		foreach($result['formattedResults']['ruleResults'] as $ruleresults) {
		
		$testResults[$i]['page_id'] = $site['_id'];
		$testResults[$i]['page_score'] = $result['score'];
		if(count($ruleresults['urlBlocks']) > 1) {
			if (array_key_exists('urls', $ruleresults['urlBlocks'][1])) {
				$hitCount = count($ruleresults['urlBlocks'][1]['urls']);
				if($ruleresults['localizedRuleName'] == "Optimize images" && $hitCount > 0) {
					$testResults[$i]['opt_images'] = $hitCount;
				} 
				if($ruleresults['localizedRuleName'] == "Minify JavaScript" && $hitCount > 0) {
					$testResults[$i]['min_js'] = $hitCount;
				} 
				if($ruleresults['localizedRuleName'] == "Minify HTML" && $hitCount > 0) {
					$testResults[$i]['min_html'] = $hitCount;
				} 
				if($ruleresults['localizedRuleName'] == "Minify CSS" && $hitCount > 0) {
					$testResults[$i]['min_css'] = $hitCount;
				}
				if($ruleresults['localizedRuleName'] == "Avoid landing page redirects" && $hitCount > 0) {
					$testResults[$i]['land_redirect'] = $hitCount;
				}
				//echo  $ruleresults['localizedRuleName']."count>>>".(count($ruleresults['urlBlocks'][1]['urls']))."<br>";
			} 
			
			if (!array_key_exists('land_redirect', $testResults[$i])) {
				$testResults[$i]['land_redirect'] = 0;		
			}
			if (!array_key_exists('min_css', $testResults[$i])) {
				$testResults[$i]['min_css'] = 0;		
			}
			if (!array_key_exists('min_html', $testResults[$i])) {
				$testResults[$i]['min_html'] = 0;		
			}
			if (!array_key_exists('min_js', $testResults[$i])) {
				$testResults[$i]['min_js'] = 0;		
			}
			if (!array_key_exists('opt_images', $testResults[$i])) {
				$testResults[$i]['opt_images'] = 0;		
			}
		}
		}
		echo "Starting webpagetest for :: ".$site['URL'].'<br/>';
		$webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=".$site['URL']."&runs=1&f=xml&k=A.5317917d889315ca5b7dbe5646ce14af";
		//$webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=".$site['URL']."&runs=1&f=xml&k=A.8c8010b7177633fc5f8dce4390f9b7d6";
		//$webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=".$site['URL']."&runs=1&f=xml&k=A.18919b7ffb9f57d3e7605dbb2292cc57";
		//$webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=".$site['URL']."&runs=1&f=xml&k=A.dcd979fa3db6f36e131243b31a4314b1";
		//echo $webpagestartTestURL;
		$xmlResponse = simplexml_load_file($webpagestartTestURL);
		if($xmlResponse) {
			//echo "in IF";
			$testID = (string)($xmlResponse->data->testId);
		} else {
			//echo "in ELSE";
		}
		echo "webpagetest ID for :: ".$site['URL']." is ".$testID.'<br/>';
		
		$testResults[$i]['test_id'] = $testID;
		//$testResults[$i]['test_id'] = "150605_CJ_6BC";
		$i++;		
	}
	//echo "<pre>";
		//print_r($testResults);exit;
		
	 foreach ($testResults as $key=>$value) {
	$checkStatusURL = "http://www.webpagetest.org/testStatus.php?f=xml&test=".$value['test_id'];	
	$xmlStatusResponse = simplexml_load_file($checkStatusURL);
  if($xmlStatusResponse) {
	
	do {
		$xmlStatusResponse = simplexml_load_file($checkStatusURL);
		$completed = checkTestComplete($xmlStatusResponse);
		
		if(!$completed) {
			sleep(20);
		}
	} while (!$completed);
	
	
	//echo "status text >>>>".$xmlStatusResponse->data->statusText; exit;
	
	if($completed) {
		$resultsURL = "http://www.webpagetest.org/xmlResult/".$value['test_id']."/";
		//echo "<br/>".$resultsURL;
		$xmlResultsResponse = simplexml_load_file($resultsURL);
		if($xmlStatusResponse) {
			//echo $xmlResultsResponse;exit;
			$pageID = getPageID($xmlResultsResponse->data->testUrl);
			$collection = $db->parameterdata_counters; 
			$user_collection = $db->parameterdata;

			/*$document = array( 
				"_id" => getNextSequence("parameterdataid"),
				"datasource_id" => 2,
				"parameter_id" => 1,
				"page_id" => $pageID,
				"value" => "",
				"data" => $xmlResultsResponse->data,
				"updated_time" => new MongoDate()
			);*/
		$pageScore = (int)(78);
		//echo "PageScore".$pageScore;
		
		$loadTime = (int)($xmlResultsResponse->data->average->firstView->loadTime)/1000;
		$ttfb = (int)($xmlResultsResponse->data->average->firstView->TTFB)/1000;
		$gzipCompression = (int)($xmlResultsResponse->data->average->firstView->score_gzip);
		$browserCache = (int)($xmlResultsResponse->data->average->firstView->score_cache);		
		//echo $pageID.','.$value['page_score'].','.$loadTime.','.$ttfb.','.$gzipCompression.','.$browserCache.','.$value['opt_images'];
		$collection = $db->parametersCollection_counters;
		$parameterCol  = $db->parametersCollection;
		$parameterCollection = array( 
				"_id" => getNextSequence("parameterCollectiondataid"),
				"page_id" => $pageID,
				"Param1" => $value['page_score'],
				"Param2" => $loadTime,
				"Param3" => $ttfb,
				"Param4" => $gzipCompression,
				"Param5" => $browserCache,
				"Param6" => $value['land_redirect'],
				"Param7" => $value['opt_images'],
				"Param8" => $value['min_js'],
				"Param9" => $value['min_css'],
				"Param10" => $value['min_html'],
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
function getNextSequence($name){
global $collection;
 
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
	
	
	
	function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        }
        else {
            // Return array
            return $d;
        }
    }
	$db->cron->update(
    array("_id" => $cronid),
    array('$set' => array('inProgress' => "N"))
	);
	$datetime2 = new DateTime();
	$interval = $datetime1->diff($datetime2);	
	echo "Time taken for the cron >>>>> ";
echo $interval->format('%I minutes, and %S seconds');
?>
