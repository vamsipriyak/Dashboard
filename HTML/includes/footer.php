  <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
	   <footer><p>Copyright © 2008 Time Inc. All rights reserved. </p></footer>
	   </div>
        <!-- /. PAGE WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
     <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
	<script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
	
	  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("visualization", "1", {packages:["corechart", "line"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Months', <?php print "'".$paramArray[$param-1]."'"; ?>],
			  <?php
			  for($i=0;$i<count($chartData['param']);$i++) {
				  if($i == count($chartData['param'])-1)
				  {
					  $delimiter = '';
				  }
				  else {
					  $delimiter = ',';
				  }
					print "["."'".$chartData['date'][$i]."'	,".$chartData['param'][$i]."]".$delimiter ;
			  }
			  ?>
			]);
		  var options = {
			hAxis: {
			  title: 'Month'
			},
			vAxis: {
			  title: '<?php print $paramUnitArray[$param]; ?>'
			}, 'width':'70%', 'height':'30%', 'min':0
		  };

			var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		  }
	</script>

    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
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
		$('#image img').click(loading);

	});			
    </script>
         <!-- Custom Js -->

    <script src="assets/js/custom-scripts.js"></script>

   
</body>
</html>