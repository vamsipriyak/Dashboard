<?php

function getWebsiteDetails($parameter, $cursor, $paramName) {
	

	// iterate cursor to display title of documents
	foreach ($cursor as $document) {
		$headercount=sizeof($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks']);

		if($parameter == "EnableGzipCompression") 
		{
			
			foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'] as $i => $header)
			{				
				/*print '<pre>';
				print_r($header);*/
				if(!count($header['header']['args']))
				{
					echo $header['header']['format'];				
					echo "<br>";
				}
				else
				{
					$headerFormat = $header['header']['format'];
					for($j=0;$j<count($header['header']['args']);$j++)
					{
						$k=$j+1;
						$headerFormat = str_replace("$".$k."", $header['header']['args'][$j]['value'], $headerFormat);
						if($j == count($header['header']['args'])-1)
						{
							echo '<a href = '.$header['header']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;" target="_blank">'.$headerFormat.'</a>';
							echo "<br>";
						}
					}
				}
				foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'][$i]['urls'] as $j => $urlsList)
				{
					$copyToFormatFieldOne = str_replace("$1", '<a href = '.$urlsList['result']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;" target="_blank">'.$urlsList['result']['args'][0]['value'].'</a>', '<b style="font-weight: lighter;text-decoration: none;color:black;"> '.$urlsList['result']['format'] .' </b>');
					$copyToFormatFieldTwo = str_replace("$2", $urlsList['result']['args'][1]['value'], $copyToFormatFieldOne);
					echo $copyToFormatFieldThree = str_replace("$3", $urlsList['result']['args'][1]['value'], $copyToFormatFieldTwo);
					echo "<br>";
				}				
			}			
		}

		if($parameter == "LeverageBrowserCaching" || $parameter == "AvoidLandingPageRedirects" || $parameter == "OptimizeImages" || $parameter == "MinifyJavaScript" || $parameter == "MinifyCss" || $parameter == "MinifyHTML") 
		{
			foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'] as $i => $header)
			{
				if(!count($header['header']['args']))
				{
					echo $header['header']['format'];
				}
				else
				{
					$headerFormat = $header['header']['format'];
					for($j=0;$j<count($header['header']['args']);$j++)
					{
						$k=$j+1;
						$headerFormat = str_replace("$".$k."", $header['header']['args'][$j]['value'], $headerFormat);
						if($j == count($header['header']['args'])-1)
						{
							echo '<a href = '.$header['header']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;" target="_blank">'.$headerFormat.'</a>';
							echo '<br>';
						}
					}
				}
				echo "<br>";
				foreach ($document["data"]['formattedResults']['ruleResults'][$parameter]['urlBlocks'][$i]['urls'] as $j => $urlsList)
				{
					$copyToFormatFieldOne = str_replace("$1", '<a href = '.$urlsList['result']['args'][0]['value'].' style="font-weight: lighter;text-decoration: none;color:black;">'.$urlsList['result']['args'][0]['value'].'</a>', '<b style="font-weight: lighter;text-decoration: none;color:black;"> '.$urlsList['result']['format'] .' </b>');
					$copyToFormatFieldTwo = str_replace("$2", $urlsList['result']['args'][1]['value'], $copyToFormatFieldOne);
					echo $copyToFormatFieldThree = str_replace("$3", $urlsList['result']['args'][1]['value'], $copyToFormatFieldTwo);
					echo "<br>";
				}				
			}
		}
	}
}

?>
