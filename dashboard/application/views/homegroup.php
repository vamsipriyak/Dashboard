
        <div id="page-wrapper-home" >
            <div id="page-inner">
			 <div class="row">
                  						
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
				<input type="hidden" name="baseurl" id="baseurl" value="<?php echo $this->config->base_url() ?>">
				<a href="#" onClick="changeResults('All');" >All </a> | <a href="#" onClick="changeResults('Recent');" >Recent </a> | <a href="#" onClick="changeResults('Most');" >Most Used </a> | <a href="#" onClick="changeResults('Mysites');" >My Sites </a>
				<select name="sortby" id="sortby" onchange="sortResults(this.value);" style="float:right;">
				<option value="">- Select -</option>
				<option value="URL">Webpage</option>
				<option value="Param1">Pagescore</option>
				<option value="Param2">Firstbyte</option>	
				<option value="Param3">Page Load Time</option>	
				<option value="Param4">Gzip Compression</option>	
				<option value="param1_flag">Critical</option>
				<option value="Param2">High Traffics</option>
				<option value="_id">Last Updated</option>					
				</select>
				
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                         <div class="panel-heading">
						 
                            Website Performance
														
						    <div class="col-md-1" id="image" >
							<a href="" >
					<img src="<?php echo $this->config->base_url(); ?>application/views/assets/img/refresh.png" alt="Mountain View" style="width:60px;height:60px"></a>
                    </div>
					<div class="last-updated" id="image" >
					Data is
							<?php
						 foreach($crontime as $rows){
						 	$crondate=date('Y-m-d H:i:s ', $rows['time']->sec);
							$today = date("Y-m-d H:i:s");
							$date1 = new DateTime($crondate);
							$date2 = new DateTime($today);

							$diff = $date1->diff($date2);

							//$hours = $diff->h;
							//$hours = $hours + ($diff->days*24);

							//echo $hours . "hrs";
							echo $hours = $diff->h + ($diff->d*24).' hrs ';

							//echo $diff->d.' days - ';
							//echo $diff->h.' hours - ';
							echo $diff->i.' mins old';
				
						 }
						?>
							</div>
                        </div>
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
                            <div id="showinnerpages" style="display:none">
							<div class="panel-body" id="ajaxload11">
							</div>
							<?php 
							include $this->config->base_url()."ajaxload.php";
							
							?>
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


function changeResults(val){
    // Now get the values of checkbox
		var baseurl = document.getElementById("baseurl").value;
    var chk1 = val; // checkbox1 is id of checkbox
		//alert(chk1);

    $.ajax({
    type : 'POST',
    url: baseurl+"index.php/Homegroup/filterby",
     data : 'check='+chk1,
     success : function(data){
	 //alert(data);
	 $('#ajaxload').replaceWith(data);
         // $('#page-wrapper-home').html(data); // replace the contents coming from php file
     }  
    });
}


function sortResults(val){
    // Now get the values of checkbox
		var baseurl = document.getElementById("baseurl").value;
    var chk1 = val; // checkbox1 is id of checkbox
		//alert(chk1);
   $('#sortby :selected').text();
    $.ajax({
    type : 'POST',
    url: baseurl+"index.php/Homegroup/sortby",
     data : 'check='+chk1,
     success : function(data){
	 
	// alert(data);
	 $('#ajaxload').replaceWith(data);
	  $('#sortby :selected').text();
         // $('#page-wrapper-home').html(data); // replace the contents coming from php file
     }  
    });
}

function showinnerpages(val){
    // Now get the values of checkbox
		var baseurl = document.getElementById("baseurl").value;
    var chk1 = val; // checkbox1 is id of checkbox
		alert(chk1);
   $('#sortby :selected').text();
    $.ajax({
    type : 'POST',
    url: baseurl+"index.php/Homegroup/showinnerpages",
     data : 'check='+chk1,
     success : function(data){
	 $('#showinnerpages').show();
	 
	 alert(data);
	 $('#ajaxload11').replaceWith(data);
	 // $('#sortby :selected').text();
         // $('#page-wrapper-home').html(data); // replace the contents coming from php file
     }  
    });
}

 </script>