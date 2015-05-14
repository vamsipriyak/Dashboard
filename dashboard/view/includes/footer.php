        <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
	   <footer><p>Copyright © 2015 Time Inc. All rights reserved. </p></footer>
	   </div>
        <!-- /. PAGE WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
     <script src="view/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="view/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
	<script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="view/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="view/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
				 "bInfo" : false,
				 "bFilter": false,
				 "bPaginate": false,
				 "bSort" : false
				});
            });
    </script>
	
 <script type="text/javascript">
        jQuery(document).ready(function() { 
            var options = {
                chart: {
                    renderTo: 'container',
                    type: 'line'
                },
                title: {
                    text: 'Tiny Tool Monthly Sales'                 
                },
                subtitle: {
                    text: '2014 Q1-Q2'
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Sales'
                    }
                },
                series: []
            };
            // JQuery function to process the csv data
            $.get('column-data.csv', function(data) {
                // Split the lines
                var lines = data.split('\n');
                $.each(lines, function(lineNo, line) {
                    var items = line.split(',');
                     
                    // header line contains names of categories
                    if (lineNo == 0) {
                        $.each(items, function(itemNo, item) {
                            //skip first item of first line
                            if (itemNo > 0) options.xAxis.categories.push(item);
                        });
                    }
                     
                    // the rest of the lines contain data with their name in the first position
                    else {
                        var series = { 
                            data: []
                        };
                        $.each(items, function(itemNo, item) {
                            if (itemNo == 0) {
                                series.name = item;
                            } else {
                                series.data.push(parseFloat(item));
                            }
                        });
                         
                        options.series.push(series);
                    }
                     
                });
                //putting all together and create the chart
                var chart = new Highcharts.Chart(options);
 
           });         
             
        });
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

    <script src="view/assets/js/custom-scripts.js"></script>

   
</body>
</html>