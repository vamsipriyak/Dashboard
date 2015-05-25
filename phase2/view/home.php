
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
											<th></td>
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										   // iterate result array to display the values
										  foreach($parameterdata as $i => $row){
																					 
											print '<tr id="row'.$i.'">';												
											print '<td class="center" id="row1'.$i.'" >';
											print '<div  id="wait'.$i.'" style="display:none;"><img src="view/assets/img/demo_wait.gif" width="64" height="64" /></div>';											
											print '<a href=performancedetails.php?param=1&pageid='.$row['_id'].'>'.$row['value']['URL'].'</td>';
											for($j=0; $j<5; $j++) {
											$paramValue = $row['value']["Param".($j+1)];
											if($j != 1 && $j != 2) {
											if($paramValue > $maxarr[$j]) {
												print '<td class="Green" id="row1'.$i.'">'.$paramValue.'</td>';
											} else if($paramValue < $maxarr[$j] && $paramValue > $minarr[$j]) {
												print '<td class="Yellow" id="row1'.$i.'">'.$paramValue.'</td>';
											} else {
												print '<td class="Red" id="row1'.$i.'">'.$paramValue.'</td>';
											}
											} else {
												if($paramValue < $minarr[$j]) {
												print '<td class="Green" id="row1'.$i.'">'.$paramValue.'</td>';
											} else if($paramValue > $minarr[$j] && $paramValue < $maxarr[$j]) {
												print '<td class="Yellow" id="row1'.$i.'">'.$paramValue.'</td>';
											} else {
												print '<td class="Red" id="row1'.$i.'">'.$paramValue.'</td>';
											}
											}
											
											}
											print '<td id="row1'.$i.'" ><button id="submit'.$i.'" onclick="loadData.call(this, '.$i.')" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;"  ><img src="view/assets/img/refresh.png" alt="Mountain View" style="width:60px;height:60px" ></button></td>';
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
	
<script type="text/javascript">

function loadData(id)
{
    document.getElementById('submit'+id).disabled = 'disabled';
    var t = this.parentNode;
    tagName = "td";

	ajaxImageLoadId = "#wait"+id;
	tableRowId = "#row"+id;
	submitButtonId = t.id;
    $("#wait"+id).css("display", "block");
	setTimeout('hide(ajaxImageLoadId, submitButtonId, '+id+')',2000);

}
function hide(ajaxImageLoadId, imageId, id) {
   $(ajaxImageLoadId).css("display", "none");
   $("#row"+id).load("index.php "+"#"+imageId);
}

</script>	  
