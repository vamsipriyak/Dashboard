
        <div id="page-wrapper-home" >
            <div id="page-inner">
			<?php
			if($_REQUEST['update'] == 'success')
			{
			 print '<span style="color:green">Parameter values updated successfully </span>';
			}
			else if($_REQUEST['update'] == 'failed')
			{
			 print '<span style="color:green">Updation failed </span>';
			}
			?>
			 <div class="row">
                  						
                    </div>
                </div> 
                 <!-- /. ROW  -->
               <span></span>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                         <div class="panel-heading">
                          Edit Parameters
						 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
							    <form role="form" action="" method="POST" id="webPageForm">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Parameter Name</th>
											  <th width="30%">Description</th>
                                            <th>Min Value</th>
											<th>Max Value</th>
											<th></th>
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										   // iterate result array to display the values
										  
										   foreach($parameters as $row){
											?>
											<tr width="100%" id="<?php echo $row['_id'];?>" class="test-<?php echo $row['_id'];?>">
											
											<?php												
											print '<td class="center" width="10%">'.$row["name"].'</td>';
											print '<td class="center" width="30%">'.$row["description"].'</td>';
											print '<td class="center">'.$row["minimum_value"].' '.$row["units"].'</td>';
											print '<td class="center">'.$row["maximum_value"].' '.$row["units"].'</td>';
												print '<td align="center">   
												<input type="button" value="Edit" id="'.$row['_id'].'" class="refresh" > 
												
												</td>';
											print '</tr>';
											?>											
											<tr width="100%" id="<?php echo $row['_id'];?>" class="wait-<?php echo $row['_id'];?>" style="display:none">
											<?php												
											print '<td class="center" width="10%">'.$row["name"].'</td>';
											print '<td class="center" width="30%"><textarea name="desc" id="desc'.$row['_id'].'" rows="10" cols="30">'.$row["description"].'</textarea></td>';
											print '<td class="center"> <input type="text" name="minvalue" id="minvalue'.$row['_id'].'" value="'.$row["minimum_value"].'"></td>';
											
												print '<td class="center"> <input type="text" name="maxvalue" id="maxvalue'.$row['_id'].'" value="'.$row["maximum_value"].'"></td>';
												print '<td align="center">
												<input type="hidden" name="baseurl" id="baseurl" value="'.$this->config->base_url().'">												
												<input type="button" value="Update" id="'.$row['_id'].'"  onclick="editWebsiteParams('.$row['_id'].')">
										<input type="button" value="Cancel" id="'.$row['_id'].'" class="cancel" > 
												</td>';
											print '</tr>';
											?>
											<?php
											
										   }
										   
										   // End of for loop//
								?>		
                                       
                                      
                                    </tbody>
                                </table>
								</form
>                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
           
              
            </div>
        </div>
             
    </div>
	
	<script>
	$(document).on('click', '.refresh', function() 
{
var row_id = this.id;
//$(".test").css("display", "none");
$(".test-"+row_id).hide();
$(".wait-"+row_id).show();
});
	$(document).on('click', '.cancel', function() 
{
var row_id = this.id;
//$(".test").css("display", "none");
$(".test-"+row_id).show();
$(".wait-"+row_id).hide();
});
	</script>