
        <div id="page-wrapper-home" >
            <div id="page-inner">
			 <div class="row">
                  						
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                         <div class="panel-heading">
                            Website Performance
						    <div class="col-md-1" id="image" >
					<img src="view/assets/img/refresh.png" alt="Mountain View" style="width:60px;height:60px">
                    </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Web Page</th>
											<?php
											// Display the Parameters
											$minarr=array();
											$maxarr=array();
											$i=0;
											 foreach($parameters as $row){
											   print '<th style="text-align: center;">'.$row['name'].' <br>
											   <span id="units">('.$row['units'].')</span>
											   </td>';
											   $minarr[$i] = $row['minimum_value'];
											   $maxarr[$i] = $row['maximum_value'];
											   $i++;										   
											 }
										    ?>
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										   // iterate result array to display the values
										  
										  foreach($parameterdata as $row){

											print '<tr >';												
											print '<td class="center"><a href="performancedetails.php?param=1&pageid='.$row['_id'].'">'.$row['value']['URL'].'</td>';
											for($j=0; $j<5; $j++) {
											$paramValue = $row['value']["Param".($j+1)];
											if($j != 1 && $j != 2) {
											if($paramValue > $maxarr[$j]) {
												print '<td class="Green">'.$paramValue.'</td>';
											} else if($paramValue < $maxarr[$j] && $paramValue > $minarr[$j]) {
												print '<td class="Yellow">'.$paramValue.'</td>';
											} else {
												print '<td class="Red">'.$paramValue.'</td>';
											}
											} else {
												if($paramValue < $minarr[$j]) {
												print '<td class="Green">'.$paramValue.'</td>';
											} else if($paramValue > $minarr[$j] && $paramValue < $maxarr[$j]) {
												print '<td class="Yellow">'.$paramValue.'</td>';
											} else {
												print '<td class="Red">'.$paramValue.'</td>';
											}
											}
											
											}

											print '</tr>';
										   }
										   // End of for loop//
								?>		
                                       
                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
           
              
            </div>
        </div>
             
    </div>