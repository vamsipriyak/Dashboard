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
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										    $result = $db->parameters_Collection->find()->sort(array('_id' => 1)); 
										   // iterate result array to display the values
										  
										  foreach($result as $row){

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
			
  <?php include 'updateDB.php'; ?>
  <?php include 'includes/footer.php'; ?>
   
