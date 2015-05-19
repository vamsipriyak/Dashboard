<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
function cl(id, imageId)
{
    $("#wait"+imageId).css("display", "block");

    $("img").click(function(){
        $("#txt"+imageId).load("index.php "+"#"+id);
    });
}
</script>

<?php 
include 'includes/header.php'; 


	$mapWebsites = new MongoCode("function () {

				var output= {pageid : this._id,Param1:null, Param2:null, Param3:null, Param4:null, Param5:null , URL:this.URL}
					emit(this._id, output);
				};");
	$mapParam = new MongoCode("function () {

			   var output= {pageid : this.page_id,Param1:this.Param1, Param2:this.Param2, Param3:this.Param3,Param4:this.Param4,Param5:this.Param5  }
						emit(this.page_id, output);
				};");

	$reduceF = new MongoCode("function(key, values) { var outs = {Param1:null, Param2:null, Param3:null, Param4:null, Param5:null };

	values.forEach(function(v){

				   if(outs.Param1 ==null){
						outs.Param1 = v.Param1
					}
					if(outs.Param2 ==null){
						outs.Param2 = v.Param2
					}
					 if(outs.Param3 ==null){
						outs.Param3 = v.Param3
					}
					 if(outs.Param4 ==null){
						outs.Param4 = v.Param4
					}
					 if(outs.Param5 ==null){
						outs.Param5 = v.Param5
					}
					if(outs.URL ==null){
						outs.URL = v.URL
					}
					

	 });
	return outs;
	};");


	$result = $db->command(array(

		'mapreduce' => 'websites', // collection name

		'map' => $mapWebsites,

		'reduce' => $reduceF,
		

		"out" => array('reduce'=>'parameters_Collection') // new collection name
	));

	$result = $db->command(array(

		'mapreduce' => 'parametersCollection', // collection name

		'map' => $mapParam,
		'reduce' => $reduceF,
       'sort' =>array('_id' => -1),
		"out" => array('reduce'=>'parameters_Collection') // new collection name
	));

?>


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
					<img src="assets/img/refresh.png" alt="Mountain View" style="width:60px;height:60px" id="refreshData">
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
											$result = $db->parameters->find()->sort(array('_id' => 1));
											$minarr=array();
											$maxarr=array();
											$i=0;
											 foreach($result as $row){
											   print '<th style="text-align: center;">'.$row['name'].' <br>
											   <span id="units">('.$row['units'].')</span>
											   </td>';
											   $minarr[$i] = $row['minimum_value'];
											   $maxarr[$i] = $row['maximum_value'];
											   $i++;										   
											 }
										    ?>
											<th></th>
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										    $result = $db->parameters_Collection->find()->sort(array('_id' => 1)); 
										   // iterate result array to display the values
										  
										  foreach($result as $i => $row){

											print '<tr id="txt'.$i.'">';												
											print '<td class="center" id="txt1'.$i.'" >';
											print '<div  id="wait'.$i.'" style="display:none;"><img src="assets/img/demo_wait.gif" width="64" height="64" /></div>';											
											print '<a href=performancedetails.php?param=1&pageid='.$row['_id'].'">'.$row['value']['URL'].'</td>';
											for($j=0; $j<5; $j++) {
											$paramValue = $row['value']["Param".($j+1)];
											if($j != 1 && $j != 2) {
											if($paramValue > $maxarr[$j]) {
												print '<td class="white" id="txt1'.$i.'">';
												?>												
												<svg width="100%" height="80">
												  <rect x="30" y="5" rx="20" ry="20" width="75" height="75"
												  style="fill:#b6ffbd;stroke:black;stroke-width:1;opacity:0.5" />
												   <text x="50" y="50" fill="black"><?php print $paramValue; ?></text>
												   <text x="85" y="65" fill="grey"><?php //print '%'; ?></text>
												</svg>
												<?php  print '</td>';
											} else if($paramValue < $maxarr[$j] && $paramValue > $minarr[$j]) {
												print '<td class="white" id="txt1'.$i.'">';
												?>												
												<svg width="100%" height="80">
												  <rect x="30" y="5" rx="20" ry="20" width="75" height="75"
												  style="fill:#FFFF66;stroke:black;stroke-width:1;opacity:0.5" />
												   <text x="50" y="50" fill="black"><?php print $paramValue; ?></text>
												   <text x="85" y="65" fill="grey"><?php //print 'Out of 100'; ?></text>												   
												</svg>
												<?php print '</td>';
											} else {
												print '<td class="white" id="txt1'.$i.'">';
												?>												
												<svg width="100%" height="80">
												  <rect x="30" y="5" rx="20" ry="20" width="75" height="75"
												  style="fill:#fb4215;stroke:black;stroke-width:1;opacity:0.5" />
												   <text x="50" y="50" fill="black"><?php print $paramValue; ?></text>
												   <text x="85" y="65" fill="grey"><?php  //print 'Out of 100';  ?></text>												   
												</svg>
												<?php print '</td>';
											}
											} else {
												if($paramValue < $minarr[$j]) {
												print '<td class="white" id="txt1'.$i.'">';
												?>												
												<svg width="100%" height="80">
												  <rect x="30" y="5" rx="20" ry="20" width="75" height="75"
												  style="fill:#b6ffbd;stroke:black;stroke-width:1;opacity:0.5" />
												   <text x="50" y="50" fill="black"><?php print $paramValue; ?></text>
												   <text x="85" y="65" fill="grey"><?php  //print 'Seconds';  ?></text>												   
												</svg>
												<?php print '</td>';
											} else if($paramValue > $minarr[$j] && $paramValue < $maxarr[$j]) {
												print '<td class="white" id="txt1'.$i.'">';
												?>												
												<svg width="100%" height="80">
												  <rect x="30" y="5" rx="20" ry="20" width="75" height="75"
												  style="fill:#FFFF66;stroke:black;stroke-width:1;opacity:0.5" />
												   <text x="50" y="50" fill="black"><?php print $paramValue; ?></text>
												   <text x="85" y="65" fill="grey"><?php  //print 'Seconds';  ?></text>												   												   
												</svg>
												<?php print '</td>';
											} else {
												print '<td class="white" id="txt1'.$i.'">';
												?>												
												<svg width="100%" height="80">
												  <rect x="30" y="5" rx="20" ry="20" width="75" height="75"
												  style="fill:b6ffbd;stroke:black;stroke-width:1;opacity:0.5" />
												   <text x="50" y="50" fill="black"><?php print $paramValue; ?></text>
												   <text x="85" y="65" fill="grey"><?php  //print '%';  ?></text>												   
												</svg>
												<?php print '</td>';
											}
											}
											
											}
											print '<td id="txt1'.$i.'" onclick="cl(this.id, '.$i.')"><img src="assets/img/refresh.png" alt="Mountain View" style="width:60px;height:60px" ></td>';
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
			
  <?php include 'updateDB.php'; ?>
  <?php include 'includes/footer.php'; ?>
   
