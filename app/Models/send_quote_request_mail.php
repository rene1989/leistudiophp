<?php
 
namespace Models;

use Core\Model;
use Helpers\PhpMailer\Mail;

class send_quote_request extends Model 
{    
    function __construct(){
        parent::__construct();
    }  

	$mail = new \Helpers\PhpMailer\Mail();
	
	if (empty ($_POST['contact_label_input_email']) ) {
		die ( "Recipient is blank! ") ;
	}else{
    	$mailto = $_POST['contact_label_input_email'];
	}
	
	$mailsubject = (empty ($_POST['$contact_input_email_subject']) ) ? "Request for quote" : ($_POST['$contact_input_email_subject']);
	$mailbody = "Name: ".$_POST['contact_label_input_firstname']
				."<br>Telephone number:".$_POST['contact_label_input_telephone']
				."<br>Country: ".$_POST['contact_input_country']
				."<br>Questions = ".$_POST['contact_input_message'];		

	$mail->setFrom('noreply@domain.com');
	$mail->addAddress($mailto);
	$mail->subject($mailsubject);
	$mail->body($mailbody);
	$mail->send();	
  
}
  
  
?>