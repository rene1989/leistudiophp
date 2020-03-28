	  <header id="header">
		 <div class="container">
			 <div class="row">
				 <div class="col-md-12">
				 	<div class="pull-right language-button">
				 		<form action="<?php echo DIR;?>" method="post" target="_self">
				 			<button type="submit" name="language" value='en'/>English</button>
				 			<button type="submit" name="language" value='cn'/>中文</button>
				 			<button type="submit" name="language" value='fr'/>Français</button>
						</form>
					</div>
				 	
					  <h1><?php echo $data['welcome_message'];?></h1>
					  <p class="lead"><?php echo $data['welcome_message_slogan'];?></p>
					  
					  <div class="carousel-iphone">
					  	<div id="carousel-example-generic" class="carousel slide">
					    
					    <!-- Indicators -->
					    <ol class="carousel-indicators">
					      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					    </ol>
					  
					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
					      <div class="item active">
					        <img src="<?php echo DIR;?>app/templates/default/img/screenshots/app-OTA-product.jpg" alt="App Screen 1">
					      </div>
					      <div class="item">
					        <img src="<?php echo DIR;?>app/templates/default/img/screenshots/app-4.jpg" alt="App Screen 2">
					      </div>
					      <div class="item">
					        <img src="<?php echo DIR;?>app/templates/default/img/screenshots/app-5.jpg" alt="App Screen 3">
					      </div>
					      <div class="item">
					        <img src="<?php echo DIR;?>app/templates/default/img/screenshots/app-6.jpg" alt="App Screen 3">
					      </div>					      
					    </div>
					  </div>
					</div>
				</div>	  
			</div>    
		</div>
	 </header>