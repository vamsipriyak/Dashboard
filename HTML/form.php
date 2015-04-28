<?php include 'includes/header.php'; ?>
<?php //include 'includes/leftpanel.php'; ?>
<script>
 $(document).ready(function() {
            
            $('#isparentfalse').click(function(){
                
                $("#parentsite").show(); 
            });
            $('#isparenttrue').click(function(){
                
                $("#parentsite").hide(); 
            });
        });
</script>
<body ng-app="myapp">
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> -->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Matrix</a>
            </div>
			</div>

        <div id="page-wrapper-home" >		
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Web page URL</label>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Is it a parent site</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="isparent" id="isparenttrue" value="" checked="">Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="isparent" id="isparentfalse" value="">No
                                            </label>
                                        </div>
                                        <div class="form-group" id="parentsite" style="display:none;">
                                            <label>Choose a parent site</label>
											
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                    </div>
             </div> 
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Web Page Test
                        </h1>
                    </div>
             </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Website Performance
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Site</th>
                                            <th>Parameter 1</th>
                                            <th>Parameter 2</th>
                                            <th>Parameter 3</th>
                                            <th>Parameter 4</th>
											<th>Parameter 5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>www.google.com</td>
                                            <td>10</td>
                                            <td>20</td>
                                            <td class="center">30</td>
                                            <td class="center">40</td>
											<td class="center">50</td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>www.google.com</td>
                                            <td>10</td>
                                            <td>20</td>
                                            <td class="center">30</td>
                                            <td class="center">40</td>
											<td class="center">50</td>
                                        </tr>
										<tr class="odd gradeX">
                                            <td>www.google.com</td>
                                            <td>10</td>
                                            <td>20</td>
                                            <td class="center">30</td>
                                            <td class="center">40</td>
											<td class="center">50</td>
                                        </tr>
										<tr class="odd gradeX">
                                            <td>www.google.com</td>
                                            <td>10</td>
                                            <td>20</td>
                                            <td class="center">30</td>
                                            <td class="center">40</td>
											<td class="center">50</td>
                                        </tr>
										<tr class="odd gradeX">
                                            <td>www.google.com</td>
                                            <td>10</td>
                                            <td>20</td>
                                            <td class="center">30</td>
                                            <td class="center">40</td>
											<td class="center">50</td>
                                        </tr>
										<tr class="odd gradeX">
                                            <td>www.google.com</td>
                                            <td>10</td>
                                            <td>20</td>
                                            <td class="center">30</td>
                                            <td class="center">40</td>
											<td class="center">50</td>
                                        </tr>
                                       
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
	</body>
  <?php include 'includes/footer.php'; ?>
   
