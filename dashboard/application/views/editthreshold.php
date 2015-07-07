<?php
$websiteParams = array();
$i=0;
foreach($parameters as $row){
	$websiteParams[$i]["param_name"] = $row["name"];
	
	$websiteParams[$i]["units"] = $row["units"];
	$minval = "param".($i+1)."_minvalue";
	$maxval = "param".($i+1)."_maxvalue";
	$websiteParams[$i]["_id"] = ($i+1);
	$websiteParams[$i]["minimum_value"] = $threshold[$minval];
	$websiteParams[$i]["maximum_value"] = $threshold[$maxval];
	$i++;

}


?>
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
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                         <div class="panel-heading">
                           Threshold values for <?php echo $threshold["URL"]; ?>
						 
                        </div>
                        <div class="panel-body">
						<div id="errmsg"></div>
                            <div class="table-responsive">
							    <form role="form" action="" method="POST" id="webPageForm">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Parameter Name</th>
											  <th>Min Value</th>
											<th>Max Value</th>
											<th></th>
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										   // iterate result array to display the values
										  
										   foreach($websiteParams as $row){
											?>
											<tr width="100%" id="<?php echo $row['_id'];?>" class="test-<?php echo $row['_id'];?>">
											
											<?php												
											print '<td class="center" width="10%">'.$row["param_name"].'</td>';
											print '<td class="center">'.$row["minimum_value"].' '.$row["units"].'</td>';
											print '<td class="center">'.$row["maximum_value"].' '.$row["units"].'</td>';
												print '<td align="center">   
												<input type="button" value="Edit" id="'.$row['_id'].'" class="refresh" > 
												
												</td>';
											print '</tr>';
											?>											
											<tr width="100%" id="<?php echo $row['_id'];?>" class="wait-<?php echo $row['_id'];?>" style="display:none">
											<?php												
											print '<td class="center" width="10%">'.$row["param_name"].'</td>';
											
											print '<td class="center"> <input type="text" name="minvalue" id="minvalue'.$row['_id'].'" value="'.$row["minimum_value"].'"></td>';
												print '<td class="center"> <input type="text" name="maxvalue" id="maxvalue'.$row['_id'].'" value="'.$row["maximum_value"].'"></td>';
												print '<td align="center">  
												<input type="hidden" name="parampageid" id="parampageid" value="'.$parampageid.'">
												<input type="hidden" name="baseurl" id="baseurl" value="'.$this->config->base_url().'">
												<input type="button" value="Update" id="'.$row['_id'].'"  onclick="editThresholdParams('.$row['_id'].')">
											<input type="button" value="Cancel" id="'.$row['_id'].'" class="cancel" onClick="history.go(0)"> 
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
/*	$(document).on('click', '.cancel', function() 
{
var row_id = this.id;
//$(".test").css("display", "none");
var minvalue=document.getElementById("minvalue"+row_id).value;

document.getElementById("minvalue"+row_id).value=minvalue;
$(".test-"+row_id).show();
$(".wait-"+row_id).hide();
});*/
	</script>