
<?php
  include '/includes/cronConfig.php';
 // $score=$_POST['pagescore'];
	$decodedJSON = json_decode($_POST['jsonData'], true);
   $pageid=(int)($decodedJSON[0]['page_id']);
   $json=$decodedJSON[0]['data'];
   //echo $pageid;
   //$pageid=$_POST['page_id'];
	//print_r($json);
  // echo $json;
  //$json=json_decode($_POST['json'],true);
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
   //echo "Document inserted successfully <br>";
   $siteURL =  getWebsiteURL($pageid, $db);
   //$webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=http://www.timeinc.com&runs=1&f=xml&k=A.5317917d889315ca5b7dbe5646ce14af";
							$webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=".$siteURL."&runs=1&f=xml&k=A.5317917d889315ca5b7dbe5646ce14af";
							//echo $webpagestartTestURL;
							$xmlResponse = simplexml_load_file($webpagestartTestURL);
							if($xmlResponse) {
								//echo "in IF";
								$testID = (string)($xmlResponse->data->testId);
								$pageScore = array(60);
								echo $testID;
							} else {
								//echo "in ELSE";
							}
						
   function getWebsiteURL($pageID, $db) {
	$websiteCollection = $db->websites;
	$document = $websiteCollection->findOne(array("_id" => $pageID));
	return $document['URL'];
   }
 
?>

