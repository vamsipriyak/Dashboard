
<?php 
/*if(empty($_REQUEST['param'])){
    $param = '';
} else {
    $param = $_REQUEST['param'];
}*/
	$paramValues = array();
	$i=0;
	foreach ($parameterValues as $value) {
		for($i=0; $i<10; $i++){
			$paramValues[$i] = $value["Param".($i+1)];
		}
	}
	foreach ($parameterChartData as $paramData) {
		$chartData['param'][] = $paramData['Param'.$param.''];
		$chartData['date'][] = date('Y-m-d',$paramData['updated_time']->sec);
	}
?>

<div id="page-wrapper" >
            <div id="page-inner-custom">
			 <div class="row">
                    <div class="col-md-8">
                        <h2 >
						<?php
							$paramArray = array();
							$i=0;
							foreach ($getLeftPanelDetailsData as $parameter) {
								$paramArray[$i] = $parameter['name'];
								$paramUnitArray[$i] = $parameter['units'];
								$paramDescriptionArray[$i] = $parameter['description'];
								$i++;
							}
                            print "Insights for ".$pageUrl['URL']."";
							 $min = $pageUrl["param".($this->uri->segment(3))."_minvalue"];
							 $max = $pageUrl["param".($this->uri->segment(3))."_maxvalue"];
							

						?>

                        </h2>
                    </div>
                    <div class="col-md-1"></div>
					<a href="<?php echo $this->config->base_url(); ?>"><img src="<?php echo $this->config->base_url(); ?>application/views/assets/img/back.jpg" alt="Mountain View" style="width:80px;height:80px"></a>
					<button id="refreshPage" onclick="pageRefresh()" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;"  ><img src="<?php echo $this->config->base_url(); ?>application/views/assets/img/refresh.png" alt="Mountain View" style="width:60px;height:60px" ></button>
            </div> 
            <!-- /. ROW  -->
                 <div class="row" >
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                   <div class="panel panel-default">
                        <div class="panel-body">
							<div id="chart_div" class="panel-chart"></div>
						</div>
                    </div>
                    <!-- End  Hover Rows  -->
               </div>
            </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
					
                    <div class="panel panel-default" id="pagespeed">
                        <div class="panel-body">
							<div class="panel-body-detailed">						
								 <?php 
									if($feedExists > 0) 
									{										
									$heading = $param; //$_GET['param'];
									
									if($this->uri->segment(3) == 1 || $this->uri->segment(3) == 4 || $this->uri->segment(3) == 5 ) {
								//positive logic
								if($paramValues[$param-1] >= $max) {
								
										echo  "<b style=\"font-size:25px;font-weight: lighter;text-decoration: none;\"><div style=\"float:left\">".$paramArray[$param-1].": </div> <div style=\"float:left\" class=\"green-new\">".$paramValues[$param-1]." </div>".$paramUnitArray[$param-1]."</b>";
									
								} else if($paramValues[$param-1] < $max && $paramValue >= $min) {
									echo  "<b style=\"font-size:25px;font-weight: lighter;text-decoration: none;\"><div style=\"float:left\">".$paramArray[$param-1].": </div> <div style=\"float:left\" class=\"red-new\">".$paramValues[$param-1]." </div>".$paramUnitArray[$param-1]."</b>";
								} else {
								echo  "<b style=\"font-size:25px;font-weight: lighter;text-decoration: none;\"><div style=\"float:left\">".$paramArray[$param-1].":</div> <div style=\"float:left\" class=\"red-new\">".$paramValues[$param-1]." </div>".$paramUnitArray[$param-1]."</b>";
								}
								} else {
								//reverse logic
									if($paramValues[$param-1] < $min) {
									echo  "<b style=\"font-size:25px;font-weight: lighter;text-decoration: none;\"><div style=\"float:left\">".$paramArray[$param-1].": </div> <div style=\"float:left\" class=\"green-new\">".$paramValues[$param-1]." </div>".$paramUnitArray[$param-1]."</b>";
								
								} else if($paramValues[$param-1] >= $min && $paramValues[$param-1] < $max) {
									echo  "<b style=\"font-size:25px;font-weight: lighter;text-decoration: none;\"><div style=\"float:left\">".$paramArray[$param-1].": </div> <div style=\"float:left\" class=\"yellow-new\">".$paramValues[$param-1]." </div>".$paramUnitArray[$param-1]."</b>";
								} else {
									echo  "<b style=\"font-size:25px;font-weight: lighter;text-decoration: none;\"><div style=\"float:left\">".$paramArray[$param-1].": </div> <div style=\"float:left\" class=\"red-new\">".$paramValues[$param-1]." </div>".$paramUnitArray[$param-1]."</b>";
								}
								}
									echo '<br><br>';

									echo  "Description".": <b style=\"font-weight: lighter;text-decoration: none;color:black;\">".$paramDescriptionArray[$param-1]."</b>";
									echo '<br><br>';
									if($heading == 4 || $heading == 5 || $heading == 6 || $heading == 7 || $heading == 8 || $heading == 9 || $heading == 10 )
									{
										foreach($cursor as $document)
										{
											print $document;
											print '<br>';
										}
									}
									
								?>
							</div>
						</div>
						<?php if($heading == 1) { ?>
                        <div class="panel-body" id="test">
                            <div class="table-responsive">
								
                            </div>
                            
                        </div>
						<?php } ?>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
			<br><br>
          
        </div>
    </div>
	<?php
	}
	else
	{
			print 'No data available';
	}

	?>
   <?php //include 'updateDB.php'; ?>
   <script>
// Specify your actual API key here:
var API_KEY = 'AIzaSyCXhzHMvNj8HdLiOQ6DX9EwJ7O9yXtOjaA';
// Specify the URL you want PageSpeed results for here:
var URL_TO_GET_RESULTS_FOR = '<?php echo $pageUrl["URL"]; ?>';

</script>

<script>

var API_URL = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?';
var CHART_API_URL = 'http://chart.apis.google.com/chart?';

// Object that will hold the callbacks that process results from the
// PageSpeed Insights API.
var callbacks = {}
// Invokes the PageSpeed Insights API. The response will contain
// JavaScript that invokes our callback with the PageSpeed results.

function runPagespeed() {
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  var query = [
    'url=' + URL_TO_GET_RESULTS_FOR,
    'callback=runPagespeedCallbacks',
    'key=' + API_KEY,
  ].join('&');
  s.src = API_URL + query;
  document.head.insertBefore(s, null);
}

// Invoke the callback that fetches results. Async here so we're sure
// to discover any callbacks registered below, but this can be
// synchronous in your code.

// Our JSONP callback. Checks for errors, then invokes our callback handlers.
function runPagespeedCallbacks(result) {
  if (result.error) {
    var errors = result.error.errors;
    for (var i = 0, len = errors.length; i < len; ++i) {
      if (errors[i].reason == 'badRequest' && API_KEY == 'AIzaSyCXhzHMvNj8HdLiOQ6DX9EwJ7O9yXtOjaA') {
        alert('Please specify your Google API key in the API_KEY variable.');
      } else {
        // NOTE: your real production app should use a better
        // mechanism than alert() to communicate the error to the user.
        alert(errors[i].message);
      }
    }
    return;
  }

  // Dispatch to each function on the callbacks object.
  for (var fn in callbacks) {
    var f = callbacks[fn];
    if (typeof f == 'function') {
      callbacks[fn](result);
    }
  }
}

// Invoke the callback that fetches results. Async here so we're sure
// to discover any callbacks registered below, but this can be
// synchronous in your code.

setTimeout(runPagespeed, 0);

</script>
<script>
callbacks.displayPageSpeedScore = function(result) {
  var score = result.score;
   var pagescore = 'pagescore='+ score; //build a post data structure
$.ajax({
        url: "https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=http://www.timeinc.com/&key=AIzaSyCXhzHMvNj8HdLiOQ6DX9EwJ7O9yXtOjaA",
		type: "GET",
		dataType: "json",
        success: function(data){
            //alert(data.score);
			var json_text = JSON.stringify(data, null, 2);
						
			//Split to get the	parameter name.		
			path = window.location.href; 
			param = path.split('=');
			$insertToDatabase = param[1];

			//Insert data to DB if param is 'pagespeed'.
			if($insertToDatabase == 'pagespeed')
			{
				var pagescore = 'pagescore='+ score + '&json=' + json_text; //build a post data structure
				$.ajax({
					url: "insertparameterdata.php",
					type: "post",
					data: pagescore,
					success: function(){
					   // alert("success");
						$("#result").html('Submitted successfully');
					},
					error:function(){
						alert("failure");
						$("#result").html('There is error while submit');
					}
				});
			}
		}
       
    });   
  var query = [
    'chtt=Page+Speed+score:+' + score,
    'chs=180x100',
    'cht=gom',
    'chd=t:' + score,
    'chxt=x,y',
    'chxl=0:|' + score,
  ].join('&');
  var i = document.createElement('img');
  i.src = CHART_API_URL + query;
  //document.body.insertBefore(i, null);
  document.getElementById('test').insertBefore(i, null);
};

</script>


<script>
var RESOURCE_TYPE_INFO = [
  {label: 'JavaScript', field: 'javascriptResponseBytes', color: 'e2192c'},
  {label: 'Images', field: 'imageResponseBytes', color: 'f3ed4a'},
  {label: 'CSS', field: 'cssResponseBytes', color: 'ff7008'},
  {label: 'HTML', field: 'htmlResponseBytes', color: '43c121'},
  {label: 'Flash', field: 'flashResponseBytes', color: 'f8ce44'},
  {label: 'Text', field: 'textResponseBytes', color: 'ad6bc5'},
  {label: 'Other', field: 'otherResponseBytes', color: '1051e8'},
];

callbacks.displayResourceSizeBreakdown = function(result) {
  var stats = result.pageStats;
  var labels = [];
  var data = [];
  var colors = [];
  var totalBytes = 0;
  var largestSingleCategory = 0;
  for (var i = 0, len = RESOURCE_TYPE_INFO.length; i < len; ++i) {
    var label = RESOURCE_TYPE_INFO[i].label;
    var field = RESOURCE_TYPE_INFO[i].field;
    var color = RESOURCE_TYPE_INFO[i].color;
    if (field in stats) {
	
      var val = Number(stats[field]);	
      totalBytes += val;
      if (val > largestSingleCategory) largestSingleCategory = val;
      labels.push(label);
      data.push(val);
      colors.push(color);
    }
  }
  // Construct the query to send to the Google Chart Tools.
  var query = [
    'chs=300x140',
    'cht=p3',
    'chts=' + ['000000', 16].join(','),
    'chco=' + colors.join('|'),
    'chd=t:' + data.join(','),
    'chdl=' + labels.join('|'),
    'chdls=000000,14',
    'chp=1.6',
    'chds=0,' + largestSingleCategory,
  ].join('&');
  var i = document.createElement('img');
  i.src = 'http://chart.apis.google.com/chart?' + query;
  document.getElementById('test').insertBefore(i, null);
};
</script> 


<script>
callbacks.displayTopPageSpeedSuggestions = function(result) {
  var results = [];
  var ruleResults = result.formattedResults.ruleResults;
  for (var i in ruleResults) {
    var ruleResult = ruleResults[i];
    // Don't display lower-impact suggestions.
    if (ruleResult.ruleImpact < 3.0) continue;
    results.push({name: ruleResult.localizedRuleName,
                  impact: ruleResult.ruleImpact});
  }
  results.sort(sortByImpact);
  var ul = document.createElement('ul');
  for (var i = 0, len = results.length; i < len; ++i) {
    var r = document.createElement('li');
    r.innerHTML = results[i].name;
    document.getElementById('test').insertBefore(r, null);
  }
  if (ul.hasChildNodes()) {
    document.body.insertBefore(ul, null);
  } else {
    var div = document.createElement('div');
    div.innerHTML = 'No high impact suggestions. Good job!';
    document.getElementById('test').ul.insertBefore(div, null);
  }
};

// Helper function that sorts results in order of impact.
function sortByImpact(a, b) { return b.impact - a.impact; }
</script>
 