
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
                           Help
						 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Parameter Name</th>
											  <th width="30%">Description</th>
                                            <th>Min Value</th>
											<th>Max Value</th>
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										   // iterate result array to display the values
										  
										   foreach($parameters as $row){
											print '<tr class="odd gradeX">';												
											print '<td class="center">'.$row["name"].'</td>';
											print '<td class="center">'.$row["description"].'</td>';
											print '<td class="center">'.$row["minimum_value"].' '.$row["units"].'</td>';
											print '<td class="center">'.$row["maximum_value"].' '.$row["units"].'</td>';
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