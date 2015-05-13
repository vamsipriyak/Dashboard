<?php
error_reporting(1);
include 'includes/config.php';
$collection = $db->parameterdata;
$cursor = $collection->find()->sort(array('_id' => -1))->limit(1);
// iterate cursor to display title of documents
foreach ($cursor as $document) {
/*print '<td class="center">'.$document["_id"].'</td>';
echo "<pre>";
print '<td class="center">'.$document["data"].'</td>';
echo "</pre>";*/

$xmlResponse =  simplexml_load_string($document["data"]);
//print_r("Load Time".$document["data"]);
//echo "test ID: ".$xmlResponse->data->testId;
if($xmlResponse) {
	$pageLoadTime = ($xmlResponse->data->average->firstView->loadTime)/1000;
	echo "Page Load Time: ".$pageLoadTime." Seconds";
} else {
	echo "inside ELSE";
}
}

?>