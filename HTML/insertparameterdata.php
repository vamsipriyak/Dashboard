<?php
  include 'includes/config.php';
  $score=$_POST['pagescore'];
   $json=$_POST['json'];
  $json=json_decode($_POST['json'],true);
   $collection = $db->parameterdata_counters; 
   $user_collection = $db->parameterdata;

   $document = array( 
      "_id" => getNextSequence("parameterdataid"),
      "datasource_id" => 1,
	  "parameter_id" => 1,
	  "page_id" => 1,
	  "value" => $score,
	  "data" => $json
   );
   $user_collection->insert($document);
   echo $score."Document inserted successfully <br>";
   
  
?>

