<?php

function getWebsiteDetails($parameter, $cursor, $paramName) {
	

	// iterate cursor to display title of documents
	foreach ($cursor as $document) {
		$headercount=sizeof($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks']);

		if($parameter == "EnableGzipCompression") 
		{
			foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'] as $i => $urls)
			{
				echo  '<b style="font-weight: lighter;text-decoration: none;color:black;"> '.$urls['header']['format'].'</b>';
				echo "<br>";
			}
		}

		if($parameter == "LeverageBrowserCaching") 
		{
			
			foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'] as $i => $header)
			{
				if(!count($header['header']['args']))
				{
					echo $header['header']['format'];
				}
				else
				{
					$count = sizeof($header['header']['args']);
					for($k=0; $k<$count; $k++)
					{
						echo  '<a href = '.$header['header']['args'][$k]['value'].' style="font-weight: lighter;text-decoration: none;color:black;" target="_blank" >'.$header['header']['format'].'</a>';
					}
				}
				echo "<br>";
				foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'][$i]['urls'] as $j => $urlsList)
				{
					$copyToFormatField = str_replace("$1", '<a href = '.$urlsList['result']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;" target="_blank">'.$urlsList['result']['args'][0]['value'].'</a>', '<b style="font-weight: lighter;text-decoration: none;color:black;"> '.$urlsList['result']['format'] .' </b>');
					echo $finalResult = str_replace("$2", $urlsList['result']['args'][1]['value'], $copyToFormatField);
					echo "<br>";
				}				
			}
		}
	}
}

?>