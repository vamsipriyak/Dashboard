

<div class="main">
		<div class="login-form">
			<h1>Admin Login</h1>
			<h5><?php echo $error;?></h5>
					<div class="head">
						<img src="<?php echo $this->config->base_url(); ?>application/views/assets/img/user.png" alt=""/>
					</div>
				<form name="adminlogin" id="adminlogin" action="<?php echo $this->config->base_url(); ?>index.php/Admin/login" method="post">
						<input type="text" name="username" id="username" class="text" value="" required placeholder="Username"  >
						<input type="password" name="password" id="password"  value="" required placeholder="Password" >
						<div class="submit">
							<input type="submit" onclick="myFunction()" value="LOGIN" >
					</div>	
					
				</form>
			</div>
			<!--//End-login-form-->
		
		</div>
			 <!-----//end-main---->