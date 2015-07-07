        <div id="page-wrapper-home" >		
            <div id="page-inner">
			 <div class="panel panel-default">
			<div class="panel-heading">
                          Add a Webpage
						 
                        </div></div>
			 <div class="row">
                    <div class="col-md-12">
                                    <form role="form" action="" method="POST" id="webPageForm">
                                        <div class="form-group">
                                            <label>Web page URL</label>
											<?php  echo form_error('webPageUrl'); ?>
											<?php
												if(!empty($success))
												{
													print '<br><span style="color:green;">Web page added successfully</span>';
												}
											?>
                                            											
                                            <input class="form-control" name = "webPageUrl" id = "webPageUrl" value = "" >
                                        </div>
                                        <div class="form-group">
                                            <label>Is it a parent site</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="isParent" id="isParentTrue" value="Yes" checked>Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="isParent" id="isParentTrue" value="No">No
                                            </label>
                                        </div>
                                        <div class="form-group" id="parentSite" style="display:none;">
                                            <label>Choose a parent site</label>
											
                                            <select class="form-control" name="parentSiteId">
											<option value="">- Select -</option>
                                              <?php
											 
										   // iterate cursor to display title of documents
										   foreach ($parentwebsites as $document) {
										   if($document["_id"]!='')
										   {
											?>
                                                <option value="<?php echo $document["_id"]; ?>"><?php echo $document["URL"]; ?></option>
                                            <?php 
											}
												}											
											?>
                                            </select>
                                        </div>
										
										<div class="panel panel-default">
                         
                        <div class="panel-body">
                            <div class="table-responsive">
							    
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                    <thead>
                                        <tr>
                                            <th>Parameter Name</th>
											<th width="20%">Min Value</th>
											<th width="20%">Max Value</th>
											<th width="20%">Units</th>
                                        </tr>
                                    </thead>
                                   <tbody>
					
								   
								   <?php										
										   // iterate result array to display the values
										  
										   foreach($params as $row){
											?>
											<tr width="100%" id="<?php echo $row['_id'];?>" class="test-<?php echo $row['_id'];?>">
											
											<?php												
											print '<td class="center" width="10%">'.$row["name"].'</td>';
											print '<td class="center"><input type="text" width="20%" id="param'.$row['_id'].'_minvalue" name="param'.$row['_id'].'_minvalue" value= "'.$row["minimum_value"].'"> </td>';
											print '<td class="center"><input type="text" width="20%" id="param'.$row['_id'].'_maxvalue" name="param'.$row['_id'].'_maxvalue" value= "'.$row["maximum_value"].'"> </td>';
											print '<td class="center">'.$row["units"].'</td>';
											print '</tr>';
											
										   }
										   
										   // End of for loop//
								?>		
                                       
                                      
                                    </tbody>
                                </table>							
                 </div>
                            
                        </div>
                    </div>
										<input id="submitForm" name="submitForm" class="btn btn-default" type="submit" value="Submit">
                                        <input id="reset" name="reset" class="btn btn-default" onclick="resetValues()" type="button" value="Reset">
                                    </form>
                    </div>
             </div> 
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            
                        </h1>
                    </div>
             </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Web Pages
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Page ID</th>
                                            <th>Parent page ID</th>
											<th>URL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php										
										
										   // iterate cursor to display title of documents
										   foreach ($websites as $document) {
											print '<tr class="odd gradeX">';												
											print '<td class="center">'.$document["_id"].'</td>';
											print '<td class="center">'.$document["parent_page_id"].'</td>';
											print '<td class="center">'.$document["URL"].'</td>';
											print '</tr>';
										   }
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
   
