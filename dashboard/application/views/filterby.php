<div class="panel-body" id="ajaxload">
						
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
										<th>Site Health</th>
										   <th>Group Name</th>
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
											 }
											 if($_SESSION['authentication']==1)
												{
										       ?>
											<!--<th></td> -->
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
										  
										  	$url = $row['URL'];
										  	if($url!='')
											{

											?>
										
											<tr id="<?php echo $row['_id'];?>">
											<?php	
											
									  /// start of over all site health ////											
									  $sitehealth_min = $row["param1_minvalue"];
									  $sitehealth_max = $row["param1_maxvalue"];	
									  $sitehealthparamValue = $row["Param1"];  
										if($sitehealthparamValue >= $sitehealth_max) {
												print '<td class="center green-new" >
												</td>';
											} else if($sitehealthparamValue < $sitehealth_max && $sitehealthparamValue >= $sitehealth_min) {
												print '<td class="center yellow-new" >
												</td>';
											} else {
												print '<td class="center red-new" >
												</td>';
											}
											  /// end of over all site health ////		
											
											print '<td class="center"  style="width:40px;height:60px;">';
											print ' 
												<div  id="wait'.$row['_id'].'" style="display:none;"><img src="application/views/assets/img/demo_wait.gif" width="64" height="64" /></div>	
												
											<a href="'.$this->config->base_url().'index.php/performancedetails/index/1/'.$row['parent_page_id'].'">'.$row['title'].' </td>';
											print '<td class="center"  style="width:40px;height:60px;">
												
											<a href="'.$this->config->base_url().'index.php/performancedetails/index/1/'.$row['parent_page_id'].'">'.$row['URL'].' </td>';
											for($j=0; $j<4; $j++) {
											
											 $url="index.php/performancedetails/index/".($j+1)."/".$row['parent_page_id'];
											
											
											$paramValue = $row["Param".($j+1)];
											if(!is_null($paramValue))
											{
											  $min = $row["param".($j+1)."_minvalue"];
											   $max = $row["param".($j+1)."_maxvalue"];
												
											if($j == 0 || $j == 3 ) {
											
											 
											//positive logic
											if($paramValue >= $max) {
												print '<td class="center green-new" >
												<a href="'.$this->config->base_url().$url.'" >
												'.$paramValue.' </a></td>';
											} else if($paramValue < $max && $paramValue >= $min) {
												print '<td class="center yellow-new" >
												<a href="'.$this->config->base_url().$url.'" >
												'.$paramValue.'</a></td>';
											} else {
												print '<td class="center red-new" >
												<a href="'.$this->config->base_url().$url.'" >
												'.$paramValue.'</a></td>';
											}
											} else {
											
											//reverse logic
												if($paramValue < $min) {
												print '<td class="center green-new" >
												<a href="'.$this->config->base_url().$url.'" >
												'.$paramValue.'</a></td>';
											} else if($paramValue >= $min && $paramValue < $max) {
												print '<td class="center yellow-new" >
												<a href="'.$this->config->base_url().$url.'" >
												'.$paramValue.'</a></td>';
											} else {
												print '<td class="center red-new" >
												<a href="'.$this->config->base_url().$url.'" >
												'.$paramValue.'</a></td>';
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
											/*print '<td class="center" align="center">   
												<a href="'.$this->config->base_url().'index.php/edit/editthreshold/'.$row['_id'].'"">Edit Threshold</a>
												</td>'; */
												}
												
												
											?>	
											</tr>
											
											<?php
											}
										   }
										   // End of for loop//
								?>		
                                       
                                      </div>
                                    </tbody>
                                </table>
                            </div>