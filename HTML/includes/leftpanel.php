 <?php
if(empty($_REQUEST['param'])){
    $param = '';
} else {
    $param = $_REQUEST['param'];
}
 ?>
 <!--/. NAV TOP  -->
 
        <nav class="navbar-default navbar-side" role="navigation">
          <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="performancedetails.php?param=pagespeed" <?php if($param =="" || $param=="pagespeed") { ?> class="active-menu" <?php } ?> > Page Score</a>
                    </li>
                    <li>
                        <a href="performancedetails.php?param=firstbyte" <?php if( $param=="firstbyte") { ?> class="active-menu" <?php } ?> > First Byte</a>
                    </li>
					<li>
                        <a href="performancedetails.php?param=Param 3" <?php if( $param=="Param 3") { ?> class="active-menu" <?php } ?>> Param 3</a>
                    </li>
                    <li>
                        <a href="performancedetails.php?param=Param 4" <?php if( $param=="Param 4") {  ?>class="active-menu" <?php } ?>> Param 4</a>
                    </li>
                    
                    <li>
                        <a href="performancedetails.php?param=Param 5" <?php if( $param=="Param 5") { ?> class="active-menu" <?php } ?>> Param 5</a>
                    </li>
                    <li>
                        <a href="performancedetails.php?param=Param 6" <?php if( $param=="Param 6") { ?> class="active-menu" <?php } ?>> Param 6 </a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->