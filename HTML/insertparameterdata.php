<?php
  include 'includes/config.php';
 // $score=$_POST['pagescore'];
   $pageid=json_decode($_POST['page_id']);
   $json=$_POST['data'];
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
   echo "Document inserted successfully <br>"; 
   
 
?>

