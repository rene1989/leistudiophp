	  <!-- NAVBAR
	      ================================================== -->	
	  <nav class="navbar navbar-default" role="navigation">
	  	  <div class="container">
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    
			    <!--Replace text with your app name or logo image-->

			    <a class="navbar-brand" href="#"><?php echo $data['APPNAME'];?></a>
			    
			  </div>
			  <div class="collapse navbar-collapse navbar-ex1-collapse">
			    <ul class="nav navbar-nav">
			      <li><a href="#header" onclick="$('header').animatescroll({padding:71});"><?php echo $data['Start'];?></a></li>
			      <li><a href="#detail" onclick="$('.detail').animatescroll({padding:71});"><?php echo $data['Service'];?></a></li>
			      <li><a href="#features" onclick="$('.features').animatescroll({padding:71});"><?php echo $data['Features'];?></a></li>
			      <li><a href="#social" onclick="$('.social').animatescroll({padding:71});"><?php echo $data['Contact'];?></a></li>
			    </ul>
			    <!--
			    <img class="hidden-md hidden-sm hidden-xs pull-right" src="<?php echo DIR;?>app/templates/default/img/Nav_Logo_80x80.png" alt="Logo 1">
				-->
			  </div>
		  </div>
	  </nav>