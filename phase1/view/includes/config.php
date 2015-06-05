<?php
class Database {
   function __construct() {
        // connect to mongodb
   $m = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
   $this->db = $m->dashboard;
   //echo "Database mydb selected";
   
      /******************Function to auto increment seq******************/
  
  

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
}


?>