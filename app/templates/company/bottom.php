	 <!-- CONTACT
	     ================================================== -->
	  <section class="social">
	  	<div class="container">
	  		  <div class="row">
				<div class="col-lg-7 col-md-12">
					<h2><?php echo $data['contact_us'];?></h2>
					<h3><?php echo $data['contact_us_campaign'];?></h3>
				
					<form class="form-horizontal" role="form" method="post" id="quote_request_form" action="">
					<fieldset>
					<input type="hidden" name="language" id="language" value="<?php echo $data['language'];?>">  
					<input type="hidden" name="contact_sending_button" id="contact_sending_button" value="<?php echo $data['contact_sending_button'];?>"> 
					<input type="hidden" name="contact_sent_button" id="contact_sent_button" value="<?php echo $data['contact_sent_button'];?>"> 									
					<input type="hidden" name="contact_input_email_subject" id="contact_input_email_subject" value="<?php echo $data['contact_us_thanks'];?>">
   					<input type="hidden" name="quote_confirmation_letter_title" id="quote_confirmation_letter_title" value="<?php echo $data['quote_confirmation_letter_title'];?>">
   					<input type="hidden" name="quote_confirmation_letter_body" id="quote_confirmation_letter_body" value="<?php echo $data['quote_confirmation_letter_body'];?>">
   					
   					<div class="form-group">
      					<label for="contact_input_firstname" class="col-sm-4 control-label"><?php echo $data['contact_label_input_firstname'];?></label>
      					<div class="col-sm-8">
         					<input type="text" class="form-control" id="contact_input_firstname" name="contact_input_firstname"
         					required="required" required-message="<?php echo $data['contact_input_firstname_check_notempty'];?>" placeholder="<?php echo $data['contact_hint_input_firstname'];?>">
						</div>
   					</div>
   					<div class="form-group">
      					<label for="contact_input_email" class="col-sm-4 control-label"><?php echo $data['contact_label_input_email'];?></label>
      					<div class="col-sm-8">
         					<input type="text" class="form-control" id="contact_input_email" name="contact_input_email"
         					check-type="mail" mail-message="<?php echo $data['contact_input_email_check_validform'];?>" placeholder="<?php echo $data['contact_hint_input_email'];?>">
						</div>
   					</div> 	
   					<div class="form-group">
      					<label for="contact_input_telephone" class="col-sm-4 control-label"><?php echo $data['contact_label_input_telephone'];?></label>
      					<div class="col-sm-8">
         					<input type="text" class="form-control" id="contact_input_telephone" name="contact_input_telephone"
         					required="required" required-message="<?php echo $data['contact_input_telephone_check_notempty'];?>" placeholder="<?php echo $data['contact_hint_input_telephone'];?>">
						</div>
   					</div>
   					<div class="form-group">
      					<label for="contact_input_country" class="col-sm-4 control-label"><?php echo $data['contact_label_input_country'];?></label>
      					<div class="col-sm-8">
         					 <select name="contact_input_country" id="contact_input_country" class="form-control">
         					 	<option value=""><?php echo $data['contact_hint_pleaseselect'];?></option>
         					 	<option value="<?php echo $data['countrylist_code_cn'];?>"><?php echo $data['countrylist_name_cn'];?></option>
								<option value="<?php echo $data['countrylist_code_fr'];?>"><?php echo $data['countrylist_name_fr'];?></option>
								<option value="<?php echo $data['countrylist_code_us'];?>"><?php echo $data['countrylist_name_us'];?></option>
								<option value="<?php echo $data['countrylist_code_au'];?>"><?php echo $data['countrylist_name_au'];?></option>
								<option value="<?php echo $data['countrylist_code_uk'];?>"><?php echo $data['countrylist_name_uk'];?></option>
								<option value="<?php echo $data['countrylist_code_other'];?>"><?php echo $data['countrylist_name_other'];?></option>
         					 </select>
						</div>
   					</div>   					
   					
   					<div class="form-group">
      					<label for="contact_input_prodType" class="col-sm-4 control-label"><?php echo $data['contact_input_prodType'];?></label>
      					<div class="col-sm-8">
         					 <select name="contact_input_prodType" id="contact_input_prodType" class="form-control">
         					 	<option value=""><?php echo $data['contact_hint_pleaseselect'];?></option>
         					 	<option value="<?php echo $data['prodType_code_webdesign'];?>"><?php echo $data['prodType_name_webdesign'];?></option>
								<option value="<?php echo $data['prodType_code_webaudit'];?>"><?php echo $data['prodType_name_webaudit'];?></option>
								<option value="<?php echo $data['prodType_code_mobile'];?>"><?php echo $data['prodType_name_mobile'];?></option>
								<option value="<?php echo $data['prodType_code_OTA'];?>"><?php echo $data['prodType_name_OTA'];?></option>
							</select>
						</div>
   					</div>
   					
					<div class="form-group">
      					<label for="contact_input_message" class="col-sm-4 control-label"><?php echo $data['contact_label_input_message'];?></label>
      					<div class="col-sm-8">
         					<textarea type="textarea" class="form-control" id="contact_input_message" rows="4" name="contact_input_message"
         					required="required" required-message="<?php echo $data['contact_input_message_check_notempty'];?>" placeholder="<?php echo $data['contact_hint_input_message'];?>"></textarea>
						</div>
   					</div>
   					   					   					
					<div class="form-group">
      					<div class="col-sm-offset-2 col-xs-12 col-sm-12 pull-right col-md-8">
         					<button type="submit" id="send_email" class="btn btn-primary btn-block btn-lg"><?php echo $data['contact_submit_button'];?></button>
      					</div>
   					</div>		
   					</fieldset>	
					</form>
				</div>
				
				<div class="col-lg-5 col-md-12">
	  			  	<h2><?php echo $data['connect_with_us'];?></h2>
	  			  	<a class="icon-wechat"></a>
	  			   	<a class="icon-facebook"></a>
	  			   	<a class="icon-twitter"></a>
	  			   	<a class="icon-sina-weibo"></a>
	  			   </div>
	  		  </div>
	  	  </div>	  
	  </section>
	  
	 <!-- SOCIAL
	     ================================================== 
	  <section class="contact">
	  	<div class="container">
	  		  <div class="row">
	  			  <div class="col-md-12">
	  			  	<h2><?php echo $data['connect_with_us'];?></h2>
	  			  	<a class="icon-wechat"></a>
	  			   	<a class="icon-facebook"></a>
	  			   	<a class="icon-twitter"></a>
	  			   	<a class="icon-sina-weibo"></a>
	  			   </div>
	  		  </div>
	  	  </div>	  
	  </section>
	  -->
	  	
	 <!-- GET IT 
	     ================================================== -->
	  <section class="get-it">
	  	<div class="container">
	  		<div class="row">
	  			<div class="col-md-12">
	  				<h1><?php echo $data['avaialable_on_AppStore'];?></h1>
	  				<p class="lead"><?php echo $data['app_apple_ad'];?></p>
	  				<button type="button" class="app-store"></button>
	  			</div>
	  			<div class="col-md-12">
	  				<hr />
	  				<div class="col-sm-12 col-md-5">
	  					<ul><li><a href="#"><?php echo $data['bottom_menu_label_contact'];?></a></li></ul>
						<p class="address">
							<?php echo $data['bottom_contact_address'];?>
							<?php echo $data['bottom_contact_person'];?>
							<?php echo $data['bottom_contact_mail_label'];?>
							<a href="mailto:<?php echo $data['bottom_contact_mail_box'];?>?cc=kshanlei@126.com&subject=Request%20for%20sizing%20of%20my%20project&body=Project%20Description%20and%20Detailed%20requirement"><?php echo $data['bottom_contact_mail_box'];?></a><br/>
							<?php echo $data['bottom_contact_telephone'];?>						
						</p>
					</div>
					
					<div class="col-sm-12 col-md-7">
		  				<ul>	                	
	                		<li><a href="<?php echo DIR;?>press"><?php echo $data['bottom_menu_label_press'];?></a></li>
	                		<li><a href="<?php echo DIR;?>support"><?php echo $data['bottom_menu_label_support'];?></a></li>
	                		<li><a href="<?php echo DIR;?>blog"><?php echo $data['bottom_menu_label_blog'];?></a></li>
	                		<li><a href="<?php echo DIR;?>career"><?php echo $data['bottom_menu_label_recruit'];?></a></li>
	                		<li><a href="<?php echo DIR;?>policy"><?php echo $data['bottom_menu_label_policy'];?></a></li>
                		</ul>
                	</div>
	  			</div>
	  		</div>
	  	</div>
	  </section>
	  
	  
	  
	  <div class="footer"><div class="container">


