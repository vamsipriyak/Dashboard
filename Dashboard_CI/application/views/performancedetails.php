
<?php 
/*if(empty($_REQUEST['param'])){
    $param = '';
} else {
    $param = $_REQUEST['param'];
}*/
	$paramValues = array();
	$i=0;
	foreach ($parameterValues as $value) {
		for($i=0; $i<10; $i++){
			$paramValues[$i] = $value["Param".($i+1)];
		}
	}
	foreach ($parameterChartData as $paramData) {
		$chartData['param'][] = $paramData['Param'.$param.''];
		$chartData['date'][] = date('Y-m-d',$paramData['updated_time']->sec);
	}
?>

<div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-8">
                        <h2 >
						<?php
							$paramArray = array();
							$i=0;
							foreach ($getLeftPanelDetailsData as $parameter) {
								$paramArray[$i] = $parameter['name'];
								$paramUnitArray[$i] = $parameter['units'];
								$paramDescriptionArray[$i] = $parameter['description'];
								$i++;
							}
                            print "Insights for ".$pageUrl['URL']."";

						?>

                        </h2>
                    </div>
                    <div class="col-md-1"></div>
					<a href="<?php echo $this->config->base_url(); ?>index.php/home"><img src="<?php echo $this->config->base_url(); ?>application/views/assets/img/back.jpg" alt="Mountain View" style="width:80px;height:80px"></a>
					<button id="refreshPage" onclick="pageRefresh()" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;"  ><img src="<?php echo $this->config->base_url(); ?>application/views/assets/img/refresh.png" alt="Mountain View" style="width:60px;height:60px" ></button>
            </div> 
            <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
					
                    <div class="panel panel-default" id="pagespeed">
                        <div class="panel-body">
							<div class="panel-body-detailed">						
								 <?php 
									$heading = $param; //$_GET['param'];
									echo  "<b style=\"font-size:25px;font-weight: lighter;text-decoration: none;color:black;\">".$paramArray[$param-1].": ".$paramValues[$param-1]." ".$paramUnitArray[$param-1]."</b>";
									echo '<br><br>';

									echo  "Description".": <b style=\"font-weight: lighter;text-decoration: none;color:black;\">".$paramDescriptionArray[$param-1]."</b>";
									echo '<br><br>';
									if($heading == 4 || $heading == 5 || $heading == 6 || $heading == 7 || $heading == 8 || $heading == 9 || $heading == 10 )
									{
										foreach($cursor as $document)
										{
											print $document;
											print '<br>';
										}
									}
									
								?>
							</div>
						</div>
						<?php if($heading == 1) { ?>
                        <div class="panel-body" id="test">
                            <div class="table-responsive">
								
                            </div>
                            
                        </div>
						<?php } ?>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
			<br><br>
            <div class="row" >
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                   <div class="panel panel-default">
                        <div class="panel-body">
							<div id="chart_div" class="panel-chart"></div>
						</div>
                    </div>
                    <!-- End  Hover Rows  -->
               </div>
            </div>
                <!-- /. ROW  -->
        </div>
    </div>
   <?php //include 'updateDB.php'; ?>
