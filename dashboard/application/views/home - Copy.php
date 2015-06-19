
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
							<a href="" >
					<img src="<?php echo $this->config->base_url(); ?>application/views/assets/img/refresh.png" alt="Mountain View" style="width:60px;height:60px"></a>
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
											   print '<th class="header-width">'.$row['name'].' <br>
											   <span id="units">('.$row['units'].')</span>
											   </td>';
											   $minarr[$i] = $row['minimum_value'];
											   $maxarr[$i] = $row['maximum_value'];
											   $i++;										   
											 }
											 if($_SESSION['authentication']==1)
												{
										       ?>
											<th></td> 
											<?php
											}
											?>
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										   // iterate result array to display the values
										  $k=0;
										  foreach($parameterdata as $row){

										  	$url = $row['value']['URL'];
										  	if($url!='')
											{
											?>										 
											<tr id="<?php echo $row['_id'];?>">
											<?php							

											print '<td class="center"  style="width:40px;height:60px;">';
											print ' 
												<div  id="wait'.$row['_id'].'" style="display:none;"><img src="application/views/assets/img/demo_wait.gif" width="64" height="64" /></div>	
												
											<a href="'.$this->config->base_url().'index.php/performancedetails/index/1/'.$row['_id'].'">'.$row['value']['URL'].' </td>';
											for($j=0; $j<10; $j++) {
											$paramValue = $row['value']["Param".($j+1)];
											if(!is_null($paramValue))
											{
											if($j == 0 || $j == 3 || $j == 4) {
											//positive logic
											if($paramValue >= $maxarr[$j]) {
												print '<td class="green-new" >'.$paramValue.'</td>';
											} else if($paramValue < $maxarr[$j] && $paramValue >= $minarr[$j]) {
												print '<td class="yellow-new" >'.$paramValue.'</td>';
											} else {
												print '<td class="red-new" >'.$paramValue.'</td>';
											}
											} else {
											//reverse logic
												if($paramValue < $minarr[$j]) {
												print '<td class="green-new" >'.$paramValue.'</td>';
											} else if($paramValue >= $minarr[$j] && $paramValue < $maxarr[$j]) {
												print '<td class="yellow-new" >'.$paramValue.'</td>';
											} else {
												print '<td class="red-new" >'.$paramValue.'</td>';
											}
											}
											}
											else
											{
											print '<td class="grey-new" >NA</td>';
											}
											}
											if($_SESSION['authentication']==1)
											{
											print '<td align="center">   
												<a href="'.$this->config->base_url().'index.php/edit/editthreshold/'.$row['_id'].'"">Edit Threshold</a>
												</td>'; 
												}
											?>	
										
											</tr>
											<?php
											}
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
$(document).on('click', '.refresh', function() 
{
	var row_id = this.id;
	//alert(row_id);
	var merge=$('#'+row_id).attr('class');
	//var test=document.getElementById(merge).value;
	$("#wait"+row_id).css("display", "block");
	//alert($('#'+row_id).attr('class'));
	$.ajax({
  url: "index.php/Form/ajaxload",
  method: "POST",
  data: { id : this.id,cnt : merge},
  dataType: "html",
  success: function (res) {
  //alert(res);
  //$("#this.id").html(res);
  console.log(res);
       $('#'+row_id).replaceWith(res);
  }
});
});	 
 </script>