        <div id="page-wrapper-home" >		
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                                    <form role="form" action="" method="POST" id="webPageForm">
                                        <div class="form-group">
                                            <label>Web page URL</label>
                                            <input class="form-control" name = "webPageUrl" id = "webPageUrl" value = "">
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
											
                                            <select class="form-control" id="parentSiteId">
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
										<input id="submitForm" name="submitForm" class="btn btn-default" onclick="postWebsiteParams()"  type="submit" value="Submit">
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
   
