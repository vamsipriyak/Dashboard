<?php
 error_reporting(1);
$m = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
 $db = $m->dashboard;

 $pageid=intval($_POST['id']);
 $cnt=$_POST['cnt'];
 
$result = $db->parameters->find()->sort(array('_id' => 1));
$minarr=array();
$maxarr=array();
$i=0;
 foreach($result as $row){
  
   $minarr[$i] = $row['minimum_value'];
   $maxarr[$i] = $row['maximum_value'];
   $i++;										   
 }
 $result = $db->parameters_Collection->find(array('_id' => $pageid));
		 $k=1;
		 foreach($result as $row){
		 ?>
		 
		<tr id="<?php echo $row['_id'] ; ?>" class="<?php echo $cnt; ?>">';		
		<?php										
print '<td class="center">';
											print ' 
												<div  id="wait'.$row['_id'].'" style="display:none;"><img src="view/assets/img/demo_wait.gif" width="64" height="64" /></div>	
												
											<a href="performancedetails.php?param=1&pageid='.$row['_id'].'">'.$row['value']['URL'].'</td>';
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
												print '<td align="center">   
												<img src="view/assets/img/refresh.png" alt="Mountain View" style="width:40px;height:40px;cursor:pointer;" id="'.$row['_id'].'">';
print '<div  id="wait'.$row['_id'].'" style="display:none;"><img src="assets/img/demo_wait.gif" width="64" height="64" /></div>												
												
												</td>
												';
?>	
											<input type="hidden" name="cnt" id="cnt-<?php echo $cnt;?>" value="<?php  echo $cnt; ?>">

											</tr>
											<?php
											$k++;
										   }

?>