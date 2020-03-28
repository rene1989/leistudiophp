	  <header>
		 <div class="container">
			 <div class="row">
				 <div class="col-md-12">
				 	<div class="pull-right language-button">
				 		<form action="company" method="post" target="_self">
				 			<button type="submit" name="language" value='en'/>English</button>
				 			<button type="submit" name="language" value='cn'/>中文</button>
				 			<button type="submit" name="language" value='fr'/>Français</button>
						</form>
					</div>									  
				</div>	  
			</div>    
		</div>
	 </header>
	 
	<section id="company">
		<div class="container">
			<div class="row">
        		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            		<ul class="nav nav-tabs nav-stacked">
                		<li class="active"><a href="#press" onclick="$('#press').animatescroll({padding:71});"><?php echo $data['affix_menu_label_press'];?><i class="icon-circle-right" style="float:right;"></i></a></li>
                		<li><a href="#support" onclick="$('#support').animatescroll({padding:71});"><?php echo $data['affix_menu_label_support'];?><i class="icon-circle-right" style="float:right;"></i></a></li>
                		<li><a href="#recruit" onclick="$('#recruit').animatescroll({padding:71});"><?php echo $data['affix_menu_label_recruit'];?><i class="icon-circle-right" style="float:right;"></i></a></li>
                		<li><a href="#policy" onclick="$('#policy').animatescroll({padding:71});"><?php echo $data['affix_menu_label_policy'];?><i class="icon-circle-right" style="float:right;"></i></a></li>
                	</ul>
        		</div>
        
        		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
								<h2 id="press"><?php echo $data['affix_menu_label_press'];?></h2>
            						<p><?php echo $data['company_press_message'];?></p>				
            						<hr>
								<h2 id="support"><?php echo $data['affix_menu_label_support'];?></h2>
            						<p><?php echo $data['company_support_message'];?></p>				
            						<hr>
            					<h2 id="recruit"><?php echo $data['affix_menu_label_recruit'];?></h2>
            						<p><?php echo $data['company_recruit_message'];?></p>				
            						<hr>
            					<h2 id="policy"><?php echo $data['affix_menu_label_policy'];?></h2>
            						<p><?php echo $data['company_policy_message'];?></p>				
            						<hr>
            	</div>            				
    		</div>    					
		</div>
	</section>