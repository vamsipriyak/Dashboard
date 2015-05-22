<?php
 include 'includes/config.php';
  $url = mysql_escape_string($_POST['webPageUrl']);
  $parentSiteId = mysql_escape_string($_POST['parentSiteId']);
  $collection = $db->website_counters; 
  $user_collection = $db->websites;
  $document = array( 
        "_id" => getNextSequence("websiteid"),
        "parent_page_id" => $parentSiteId,
	    "URL" =>$url      	  
   );
   $user_collection->insert($document);
      echo "Document inserted successfully <br>";
	  $js = "function() {
    return this._id == this.parent_page_id;
}";
 $site = $user_collection->find(array('$where' => $js));
 foreach ($site as $website) {
      echo $website["URL"] . "\n";
   }
?>