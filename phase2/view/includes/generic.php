<?php

function getWebsiteDetails($parameter, $cursor, $paramName) {
	

	// iterate cursor to display title of documents
	foreach ($cursor as $document) {
		/*echo '<pre>';
		print_R($document);*/
		$headercount=sizeof($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks']);

		if($parameter == "EnableGzipCompression") 
		{
			foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'] as $i => $urls)
			{
				echo  '<b style="font-weight: lighter;text-decoration: none;color:black;"> '.$urls['header']['format'].'</b>';
				echo "<br>";
			}
		}

		if($parameter == "LeverageBrowserCaching" || $parameter == "AvoidLandingPageRedirects" || $parameter == "OptimizeImages"
		|| $parameter == "MinifyJavaScript"  || $parameter == "MinifyCss" || $parameter == "MinifyHTML") 
		{
			
			foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'] as $i => $header)
			{
				if(!count($header['header']['args']))
				{
					echo '<b>'.$header['header']['format'].'</b>';
					echo '<br>';
				}
				else
				{
					$count = sizeof($header['header']['args']);
					$copyToFormatField = '<a href = '.$header['header']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;" target="_blank" >'.$header['header']['format'].'</a>';
					$copyToParameter2Field = str_replace("$2", $header['header']['args'][1]['value'], $copyToFormatField);
					echo $finalResult = str_replace("$3", $header['header']['args'][2]['value'], $copyToParameter2Field);
				}
				echo "<br>";
				foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'][$i]['urls'] as $j => $urlsList)
				{
					$copyToFormatField = str_replace("$1", '<a href = '.$urlsList['result']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;">'.$urlsList['result']['args'][0]['value'].'</a>', '<b style="font-weight: lighter;text-decoration: none;color:black;"> '.$urlsList['result']['format'] .' </b>');
					$copyToParameter2Field = str_replace("$2", $urlsList['result']['args'][1]['value'], $copyToFormatField);
					echo $finalResult = str_replace("$3", $urlsList['result']['args'][2]['value'], $copyToParameter2Field);
					echo "<br>";
				}				
			}
		}
	}
}

?>
