        <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
	   <footer><p>Copyright © 2015 Mindtree Ltd. All rights reserved. </p></footer>
	   </div>
        <!-- /. PAGE WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
     <script src="<?php echo $this->config->base_url(); ?>application/views/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="<?php echo $this->config->base_url(); ?>application/views/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
	<script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo $this->config->base_url(); ?>application/views/assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="<?php echo $this->config->base_url(); ?>application/views/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo $this->config->base_url(); ?>application/views/assets/js/dataTables/dataTables.fixedHeader.js"></script>
        <script>
            $(document).ready(function () {
                var dataTable = $('#dataTables-example').dataTable({
				 "bInfo" : false,
				 "bFilter": false,
				 "bPaginate": false,
				 "bSort" : false
				});
				 var table = $('#dataTables-example').dataTable();
				new $.fn.dataTable.FixedHeader( table );
				//$('#dataTables-example').children('table:eq(1)').addClass('stuff');
            });
    </script>
	
 	  <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>application/views/assets/js/local-google-chart.js"></script>

		<script type="text/javascript">
		  google.load("visualization", "1", {packages:["corechart", "line"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
<?php
$paramArray = array();
			foreach ($getLeftPanelDetailsData as $i => $parameter) {
				$paramArray[$i] = $parameter['name'];
				$paramUnitArray[$i] = $parameter['units'];
				$paramDescriptionArray[$i] = $parameter['description'];
				$i++;
			}
	foreach ($parameterChartData as $paramData) {
		$chartData['param'][] = $paramData['Param'.$param.''];
		$chartData['date'][] = date('Y-m-d',$paramData['updated_time']->sec);
	}
	
?>			var data = google.visualization.arrayToDataTable([
			  ['Dates', <?php print "'".$paramArray[$param]."'"; ?>],
			  <?php
			  $existingDates = array();
			  for($i=0;$i<count($chartData['param']);$i++) 
			  {
				if($i == count($chartData['param'])-1)
				{
				  $delimiter = '';
				}
				else {
				  $delimiter = ',';
				}
				
				if(!in_array($chartData['date'][$i], $existingDates))
				{
					$existingDates[] = $chartData['date'][$i];
					$limiter = '-';
				}
				else
				{
					$existingDates[] = '';
					$limiter = '';
				}

				if((!is_null($existingDates[$i])) && (!is_null($chartData['param'][$i])) )

				{	
					$formattedDate = date_parse($existingDates[$i]);
					print "["."'".$formattedDate['month'].$limiter.$formattedDate['day']."'	,".$chartData['param'][$i]."]".$delimiter ;						
				}	
			  }
			  
			  ?>
			]);
		  var options = {
			series: {
				0: { color: '#39C6F0' }
			},
			chartArea: {
				left: "10%",
				top: "4%",
				height: "60%",
				width: "70%"
			},
			hAxis: {
			  title: 'Date', textStyle:{color: 'black', fontName: 'Arial Black'}
			},
			vAxis: {
			  title: '<?php print $paramUnitArray[$param-1]; ?>'
			}, 'min':0
		  };

			var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		  }
	</script>
       <script>
          
	$(function() {

		var loading = function() {
			// add the overlay with loading image to the page
			var over = '<div id="overlay">' +
				'<img id="loading" src="assets/img/ajax-loader.png">' +
				'</div>';
			$(over).appendTo('body');

			// click on the overlay to remove it
			$('#overlay').click(function() {
				$(this).remove();
			});

			// hit escape to close the overlay
			$(document).keyup(function(e) {
				if (e.which === 27) {
					$('#overlay').remove();
				}
			});
		};

		// you won't need this button click
		// just call the loading function directly
		//$('#image img').click(loading);

	});			
    </script>
         <!-- Custom Js -->

    <script src="<?php echo $this->config->base_url(); ?>application/views/assets/js/custom-scripts.js"></script>

   
</body>
</html>