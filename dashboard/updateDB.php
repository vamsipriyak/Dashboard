<?php

//echo file_get_contents("http://www.googleapis.com/pagespeedonline/v1/runPagespeed");
$testIDs = array();
$pageScores = array();
$testIDCount=0; ?>
<script  type="text/javascript">
$( "#refreshData" ).click(function() {
<?php
foreach ($websites as $site) { ?>

//alert("hello");
 $.ajax({
        url: "https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=<?php echo $site['URL']; ?>&key=AIzaSyCXhzHMvNj8HdLiOQ6DX9EwJ7O9yXtOjaA",
		type: "GET",
		dataType: "json",
        success: function(data){					
					var JSONObject= {
					"page_id":<?php echo $site['_id']; ?>,
					"data":data
					};
					var json_text = JSON.stringify(data, null, 2);
					//alert(json_text);
				$.ajax({
						url: "insertparameterdata.php",
						type: "post",
						data: JSONObject,
						dataType: 'JSON',
						success: function(){
						   // alert("success");
						   <?php
							//$webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=http://www.timeinc.com&runs=1&f=xml&k=A.5317917d889315ca5b7dbe5646ce14af";
							//$webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=".$site['URL']."&runs=1&f=xml&k= A.5317917d889315ca5b7dbe5646ce14af";
							//echo $webpagestartTestURL;
							//$xmlResponse = simplexml_load_file($webpagestartTestURL);
							/*if($xmlResponse) {
								echo "in IF";
								//$testIDs[$testIDCount] = (string)($xmlResponse->data->testId);
								//$testIDCount++;
							} else {
								echo "in ELSE";
							}*/
						   ?>
							//alert('Submitted successfully');
						},
						error:function(){
							//alert("Submitted successfully");
							//$("#result").html('There is error while submit');
						}
					});  
		},
						error:function(){
							//alert("failure in gogolepagespeed");
							//$("#result").html('There is error while submit');
						}
	});

<?php } 
 
/*
foreach ($websites as $site) {

  $webpagestartTestURL =  "http://www.webpagetest.org/runtest.php?url=".$site['URL']."&runs=1&f=xml&k=A.382f1af226ef5541529352f301e3f4d1";
  echo $webpagestartTestURL;
  $xmlResponse = simplexml_load_file($webpagestartTestURL);
  if($xmlResponse) {
	echo "in IF";
	$testIDs[$testIDCount] = $xmlResponse->data->testId;
	$testIDCount++;
  } else {
	echo "in ELSE";
  }

 } 
 echo "<pre>";
 print_r($testIDs);
 echo "</pre>";*/
$testIDsSample = array("150512_22_7GV", "150512_8P_7GW", "150512_AQ_7GX", "150512_D5_7GY", "150512_ZH_7GZ", "150512_XR_7H0");
$pageScores = array("68","73","73","68","52","44");
 ?>
			
			$.ajax({
						url: "insertWebpagetestData.php",
						type: "post",
						data: 'testIds='+<?php echo json_encode($testIDsSample); ?>+'&pageScores='+<?php echo json_encode($pageScores); ?>,
						success: function(){
						   // alert("success");
							//alert('Submitted successfully webpagetest');
						},
						error:function(){
							//alert("Submitted successfully");
							//$("#result").html('There is error while submit');
						}
					}); 
					//alert("updated successfully")
});				
			</script>

	