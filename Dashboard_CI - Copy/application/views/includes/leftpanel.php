 <!--/. NAV TOP  -->
 
        <nav class="navbar-default navbar-side" role="navigation">
          <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<?php								
					   // iterate cursor to display title of documents
					   foreach ($getLeftPanelDetailsData as $document) {
						 //If the panel is clicked then include 'active-menu' class.		
						 if($param == $document['name'])
						 {
							$activeMenu =  'class="active-menu"';
						 } 
						 else{
							 $activeMenu =  '';
						 }
						print '<li>';
						print '<a href="'.$this->config->base_url().'/index.php/performancedetails/index/'.$pageid.'/'.$document['_id'].'" '.$activeMenu.' >'.$document['name'].'</a>';
						print '</li>';
					   }
					?>										
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->