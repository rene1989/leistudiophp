// toggle visibility for css3 animations 
$(document).ready(function() {
	$('header').addClass('visibility');
	$('.carousel-iphone').addClass('visibility');
	$('.payoff h1').addClass('visibility');
	$('.features .col-md-4').addClass('visibility');
	$('.social .col-md-12').addClass('visibility');
});


//iphone carousel animation
$(window).load(function () {
	$('header').addClass("animated fadeIn");
	$('.carousel-iphone').addClass("animated fadeInLeft");
});

// Fixed navbar
$(window).scroll(function () {

var scrollTop = $(window).scrollTop();

	if (scrollTop > 200) {
		$('.navbar-default').css('display', 'block');
		$('.navbar-default').addClass('fixed-to-top');
			
	} else if (scrollTop == 0)   {
	
		$('.navbar-default').removeClass('fixed-to-top');
	}
	
	
//animations	
	$('.payoff h1').each(function(){
			
		var imagePos = $(this).offset().top;
		var topOfWindow = $(window).scrollTop();
			
			if (imagePos < topOfWindow+650) {
				$(this).addClass("animated fadeInLeft");
			}		
				
	});
	
	$('.purchase button.app-store').each(function(){
			
		var imagePos = $(this).offset().top;
		var topOfWindow = $(window).scrollTop();
			
			if (imagePos < topOfWindow+650) {
				$(this).addClass("animated pulse");
			}		
				
	});
	
	$('.features .col-md-4').each(function(){
			
		var imagePos = $(this).offset().top;
		var topOfWindow = $(window).scrollTop();
			
			if (imagePos < topOfWindow+650) {
				$(this).addClass("animated flipInX");
			}		
				
	});
	
	$('.social .col-md-12').each(function(){
			
		var imagePos = $(this).offset().top;
		var topOfWindow = $(window).scrollTop();
			
			if (imagePos < topOfWindow+550) {
				$(this).addClass("animated fadeInLeft");
			}		
				
	});
	
	$('.get-it button.app-store').each(function(){
			
		var imagePos = $(this).offset().top;
		var topOfWindow = $(window).scrollTop();
			
			if (imagePos < topOfWindow+850) {
				$(this).addClass("animated pulse");
			}		
				
	});
	
	
});


// Parallax Content

function parallax() {

		// Turn parallax scrolling off for iOS devices
		   
		    var iOS = false,
		        p = navigator.platform;
		
		    if (p === 'iPad' || p === 'iPhone' || p === 'iPod') {
		        iOS = true;
		    }
	
		var scaleBg = -$(window).scrollTop() / 3;

        if (iOS === false) {
            $('.payoff').css('background-position-y', scaleBg - 150);
            $('.social').css('background-position-y', scaleBg + 200);
        }
   
}

function navbar() {

	if ($(window).scrollTop() > 1) {
	    $('#navigation').addClass('show-nav');
	} else {
	    $('#navigation').removeClass('show-nav');
	}
	
}

$(document).ready(function () {

	var browserWidth = $(window).width();
	
	if (browserWidth > 560){ 
	
		$(window).scroll(function() {
			parallax();
			navbar();
		});
	
	}

});	


$(window).resize(function () {

	var browserWidth = $(window).width();
	
	if (browserWidth > 560){ 
	
		$(window).scroll(function() {
			parallax();
			navbar();
		});
	
	}

});	



$(window).ready(function(){
    
    // Add validator
	var validator = $('#quote_request_form').validate({
		rules: {
	      contact_input_firstname: {
	        minlength: 2,
	        required: true
	      },
	      contact_input_email: {
	        required: true,
	        email: true
	      },
	      contact_input_telephone: {
	      	minlength: 5,
	        required: true,
	        number: true
	      },
	      contact_input_country: {
	        required: true
	      },
	      contact_input_prodType: {
	        required: true
	      },
	      contact_input_message: {
	        minlength: 30,
	        required: true
	      }
	    },
		
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('success').addClass('error');
		},
		success: function(element) {
			element
			.text('OK!').addClass('valid')
			.closest('.form-group').removeClass('error').addClass('success');
		}
	});
});	

$.validator.setDefaults({
    submitHandler: function() {
    	var ux_email_to, uxEmailTemplate, ux_result_log, ux_console_log, ux_email_subject, ux_btn_action, message, param, action;
    	var send_confirmation_letter = true;
    	
    	var language = $("#language").val();
    	var contact_sending_button = $("#contact_sending_button").val();
    	var contact_sent_button = $("#contact_sent_button").val();
        var contact_input_email_subject = $("#contact_input_email_subject").val();
        var quote_confirmation_letter = $("#quote_confirmation_letter_body").val();
        var contact_input_firstname = $("#contact_input_firstname").val();
        var contact_input_email = $("#contact_input_email").val();
        var contact_input_telephone = $("#contact_input_telephone").val();
        var contact_input_country = $("#contact_input_country").find("option:selected").text(); 
        var contact_input_prodType = $("#contact_input_prodType").val();
        var contact_input_message = $("#contact_input_message").val();  
        
        
        ux_email_to = contact_input_email;
        ux_result_log = '';
        ux_console_log = 'Please be patient';
        ux_email_subject = contact_input_email_subject;
        message = "Requestor: " + contact_input_firstname + "<br>" 
        		+ "Telephone: " + contact_input_telephone + "<br>" 
        		+ "E-Mail: " + contact_input_email + "<br>" 
        		+ "Region: " + contact_input_country + "<br>" 
        		+ "Interested service: " + contact_input_prodType + "<br>"
        		+ "Message: " + contact_input_message;
        uxEmailTemplate = message;
        ux_btn_action='Send Test Email';
        param = 'send_mail';
        action = 'add_mail_library';     

        $("#send_email").empty().html(contact_sending_button);
        $.post("/blog/wp-admin/admin-ajax.php",{language:language,
        										send_confirmation_letter:send_confirmation_letter,
        										quote_confirmation_letter:quote_confirmation_letter,
        										contact_input_prodType:contact_input_prodType,
        										ux_email_to:ux_email_to, 
        										uxEmailTemplate:uxEmailTemplate, 
        										ux_result_log:ux_result_log, 
        										ux_console_log:ux_console_log, 
        										ux_email_subject:ux_email_subject, ux_btn_action:ux_btn_action, message:message,param:param, action:action},function(data){
        	if(data == "sent")
        	{
	        	$("#send_email").empty().html("Error while sending");
        	}
        	else
        	{
				  $("#send_email").empty().html(contact_sent_button+contact_input_email+" !");

        	}
		});
    }
});
			

// iPhone Header Carousel
$('header .carousel').carousel({
  interval: 3000
})

// iPhone Features Carousel
$('.detail .carousel').carousel({
  interval: 4000
})

