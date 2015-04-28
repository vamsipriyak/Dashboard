<?php include 'includes/header.php'; ?>
<?php //include 'includes/leftpanel.php'; ?>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Matrix</a>
            </div>

        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="performancedetails.php"> Param 1</a>
                    </li>
                    <li>
                        <a href="performancedetails.php"> Param 2</a>
                    </li>
					<li>
                        <a href="performancedetails.php"> Param 3</a>
                    </li>
                    <li>
                        <a href="performancedetails.php"> Param 4</a>
                    </li>
                    
                    <li>
                        <a href="performancedetails.php" class="active-menu"> Param 5</a>
                    </li>
                    <li>
                        <a href="performancedetails.php"> Param 6 </a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-8">
                        <h1 >
                            Insights for website 1 
                        </h1>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-1">
					<img src="assets/img/back.jpg" alt="Mountain View" style="width:80px;height:80px">
                    </div>
                    <div class="col-md-1" id="image">
					<img src="assets/img/refresh.png" alt="Mountain View" style="width:80px;height:80px">
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Performance details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
							The Error constructor creates an error object. Instances of Error objects are thrown when runtime errors occur. The Error object can also be used as a base objects for user-defined exceptions. See below for standard built-in error types.	Syntax
new Error([message[, fileName[, lineNumber]]]). 
The Error constructor creates an error object. Instances of Error objects are thrown when runtime errors occur. The Error object can also be used as a base objects for user-defined exceptions. See below for standard built-in error types. Syntax new Error([message[, fileName[, lineNumber]]])
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                     <!--    Hover Rows  -->
                   <div class="panel panel-default">
                        <div class="panel-body">
							<div id="container" ></div>
						</div>
                    </div>
                    <!-- End  Hover Rows  -->
               </div>
                <div class="col-md-6">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Color code</th>
                                            <th>Param #</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="success">
                                            <td>Mark</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr class="info">
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                        </tr>
                                        <tr class="warning">
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>John</td>
                                            <td>Smith</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
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
