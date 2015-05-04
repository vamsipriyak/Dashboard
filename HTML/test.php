<?php
error_reporting(1);
include 'includes/config.php';
$collection = $db->parameterdata;
$cursor = $collection->find();
// iterate cursor to display title of documents
foreach ($cursor as $document) {
//print '<td class="center">'.$document["_id"].'</td>';
//print '<td class="center">'.$document["data"]['formattedResults'].'</td>';

echo '<pre>';

echo "Heading <br>";
$headercount=sizeof($document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['urlBlocks']);



echo $document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['localizedRuleName'];


echo "<br>";
for($i=0;$i<$headercount;$i++)
{

$subheadercount=sizeof($document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['urlBlocks'][$i]);

for($j=0;$j<$subheadercount;$j++)
{
  $subheadercount1=sizeof($document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['urlBlocks'][$i]['header']);
   $subheadercount2=sizeof($document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['urlBlocks'][$i]['urls']);
if($subheadercount2>0)
{
echo "urlcount=". $subheadercount2;
   for($l=0;$l<$subheadercount2;$l++)
{
//$array=$document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['urlBlocks'][$i]['header']['format']['urls'];
echo "url===".$array[$l]['result']['format'];
echo "<br>";


//echo "ggg". $subheadercount1=sizeof($document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['urlBlocks'][$i]['header'][$k]);
break;
}
}
   
 for($k=0;$k<$subheadercount1;$k++)
{
echo "header===". $document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['urlBlocks'][$i]['header']['format'];
echo "<br>";


//echo "ggg". $subheadercount1=sizeof($document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']['urlBlocks'][$i]['header'][$k]);
break;

}
break;

}



}
echo "<br>";
print_r($document["data"]['formattedResults']['ruleResults']['LeverageBrowserCaching']);
echo '</pre>';
}


?>
