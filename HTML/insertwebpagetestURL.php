<?php
  $webpagetestURL = "http://www.webpagetest.org/xmlResult/150505_BZ_75H/";
  $xmlResponse = simplexml_load_file($webpagetestURL);
  if($xmlResponse) {
	echo "in IF";
	echo "Load Time: ".$xmlResponse->data->average->firstView->loadTime;
  } else {
	echo "in ELSE";
  }
  
?>