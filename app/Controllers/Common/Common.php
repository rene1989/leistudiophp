<?php
/**
 * Common controller
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Controllers\Common;

use Core\View;
use Core\Controller;
use Helpers\SimpleCurl as Curl;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Common extends Controller
{
	

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }
    
	public function blog()
    {
        \Helpers\Url::redirect(DIR.'blog/index.php');
    }
  
	//Company contains support/press/carrer/policy/contact 
    public function company()
	{ 
		if(isset($_POST["language"]) && !empty($_POST["language"])){
		    define('LANGUAGE_CODE', $_POST["language"]);
			$this->language->load('Company', $_POST["language"]);
			$data['language'] = $_POST["language"];
		} else{
			$this->language->load('Company');
			$data['language'] = LANGUAGE_CODE;
		}
		
        //Header
        $data['title'] = $this->language->get('welcome_pagetitle');
        
       
		// Navbar
		$data['APPNAME'] = $this->language->get('APPNAME');
		$data['Start'] = $this->language->get('Start');
		$data['Service'] = $this->language->get('Service');
		$data['Features'] = $this->language->get('Features');
		$data['Contact'] = $this->language->get('Contact');
		
		
		$data['affix_menu_label_press'] = $this->language->get('affix_menu_label_press');
		$data['company_press_message'] = $this->language->get('company_press_message');
		
		$data['affix_menu_label_support'] = $this->language->get('affix_menu_label_support');
		$data['company_support_message'] = $this->language->get('company_support_message');
		
		$data['affix_menu_label_recruit'] = $this->language->get('affix_menu_label_recruit'); 
		$data['company_recruit_message'] = $this->language->get('company_recruit_message');
		
		$data['affix_menu_label_policy'] = $this->language->get('affix_menu_label_policy');
		$data['company_policy_message'] = $this->language->get('company_policy_message'); 
		

				
        View::renderTemplate('header', $data, 'company');
        View::renderTemplate('navbar', $data, 'company');
        View::renderTemplate('top', $data, 'company');
       
        View::renderTemplate('footer', $data, 'company');   
	
	
	

    } 
    
    
    public function hotel()
	{ 
		if(isset($_POST["language"]) && !empty($_POST["language"])){
		    define('LANGUAGE_CODE', $_POST["language"]);
			$this->language->load('Welcome', $_POST["language"]);
			$data['language'] = $_POST["language"];
		} else{
			$this->language->load('Welcome');
			$data['language'] = LANGUAGE_CODE;
		}
		
        //Header
        $data['title'] = $this->language->get('welcome_pagetitle');
        
       
		// Navbar
		$data['APPNAME'] = $this->language->get('APPNAME');
		$data['Start'] = $this->language->get('Start');
		$data['Service'] = $this->language->get('Service');
		$data['Features'] = $this->language->get('Features');
		$data['Contact'] = $this->language->get('Contact');
	
	
	
        \Helpers\Url::redirect(DIR.'blog/wp-admin/admin-ajax.php');
    } 
       
    public function send_quote_request_email_1()
	{
		$data['contact_input_email_subject'] = $_POST["contact_input_email_subject"];
		$data['contact_input_firstname'] = $_POST["contact_input_firstname"];
		$data['contact_input_email'] = $_POST["contact_input_email"];		
		$data['contact_input_telephone'] = $_POST["contact_input_telephone"];
		$data['contact_input_country'] = $_POST["contact_input_country"];
		$data['contact_input_message'] = $_POST["contact_input_message"];
		 /*       
		$data['title'] = "Send email data";        
        View::renderTemplate('header', $data);
        View::render('welcome/contact', $data);
        View::renderTemplate('footer', $data);
*/

		//require_once SMVC.'app/Controllers/Common/email.class.php';

		$smtpserver = "smtp.163.com";
		$smtpserverport = 25;
		$smtpusermail = "kshanlei@163.com";
		$smtpemailto = "kshanlei@126.com"; //$_POST['contact_input_email'];
		$smtpuser = "kshanlei";
		$smtppass = "hanlei1989";
		$mailtitle = $_POST['contact_input_email_subject'];
		$mailcontent =  "<h1> Hello this is a test mail</h1>";//"<h1>".$_POST['contact_input_message']."</h1>";
		$mailtype = "HTML";


		//$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);

		//$smtp->debug = true;
	
		//$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
/*
		$mail = new SaeMail();

		$ret = $mail->quickSend( 'kshanlei@126.com' , '邮件标题' , '邮件内容' , 'nascim@sina.com' , 'hanlei1989' , 'smtp.sina.com' , 25 ); // 指定smtp和端口
		if ($ret === false){
			$data['error_message'] = $mail->errmsg(); 
		}
		else{
			$data['error_message'] = "no error while sending message";
		}
*/

define('WPMS_ON', true);
define('WPMS_MAIL_FROM', 'nascim@sina.com');
define('WPMS_MAIL_FROM_NAME', 'nascim@sina.com');
define('WPMS_MAILER', 'smtp'); // Possible values 'smtp', 'mail', or 'sendmail'
define('WPMS_SET_RETURN_PATH', 'false'); // Sets $phpmailer->Sender if true
define('WPMS_SMTP_HOST', 'smtp.sina.com'); // The SMTP mail host
define('WPMS_SMTP_PORT', 25); // The SMTP server port number
define('WPMS_SSL', ''); // Possible values '', 'ssl', 'tls' - note TLS is not STARTTLS
define('WPMS_SMTP_AUTH', true); // True turns on SMTP authentication, false turns it off
define('WPMS_SMTP_USER', 'nascim@sina.com'); // SMTP authentication username, only used if WPMS_SMTP_AUTH is true
define('WPMS_SMTP_PASS', 'hanlei1989'); // SMTP authentication password, only used if WPMS_SMTP_AUTH is true


// Array of options and their default values
global $wpms_options; // This is horrible, should be cleaned up at some point
$wpms_options = array (
	'mail_from' => 'nascim@sina.com',
	'mail_from_name' => 'nascim@sina.com',
	'mailer' => 'smtp',
	'mail_set_return_path' => 'false',
	'smtp_host' => 'smtp.sina.com',
	'smtp_port' => '25',
	'smtp_ssl' => 'none',
	'smtp_auth' => false,
	'smtp_user' => 'nascim@sina.com',
	'smtp_pass' => 'hanlei1989'
);



	global $wpms_options, $phpmailer;
	
	$logs = array();
	if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) {
		require_once SMVC.'blog/wp-blog-header.php';
		require_once SMVC.'app/Helpers/WpMailer/class-phpmailer.php';
		require_once SMVC.'app/Helpers/WpMailer/class-smtp.php';	
		$phpmailer = new PHPMailer(true);
	}
	
		$to = 'kshanlei@126.com';
		$subject = 'WP Mail SMTP: Test mail to wp_mail_smtp' ;
		$message = 'This is a test email generated by the WP Mail SMTP WordPress plugin.';
		
		// Set SMTPDebug to level 2
		//$phpmailer->SMTPDebug = 2;
		
		// Start output buffering to grab smtp debugging output
		ob_start();

		// Send the test mail
		//$data['result'] = wp_mail($to,$subject,$message);
		
		// Strip out the language strings which confuse users
		//unset($phpmailer->language);
		// This property became protected in WP 3.2
		
		// Grab the smtp debugging output
		$smtp_debug = ob_get_clean();
		
		$data['title'] = "Send email data";        
        View::renderTemplate('header', $data);
        View::render('welcome/contact', $data);
        View::renderTemplate('footer', $data);
	


	}
	
	public function send_quote_request_email_origin()
	{

		$mail = new \Helpers\PhpMailer\SaeMail();
		\Helpers\Url::redirect('blog');
		$ret = $mail->quickSend( 'kshanlei@126.com' , '邮件标题' , '邮件内容' , 'kshanlei@163.com' , 'hanlei1989' , 'smtp.163.com' , 25 ); // 指定smtp和端口

		
		//发送失败时输出错误码和错误信息
		if ($ret === false){
			var_dump($mail->errno(), $mail->errmsg());  
			\Helpers\Url::redirect('blog');
		}

		$mail->clean(); // 重用此对象
		$ret = $mail->quickSend( 'kshanlei@126.com' , '邮件标题' , '邮件内容' , 'nascim@sina.com' , 'hanlei1989' );

		//发送失败时输出错误码和错误信息
		if ($ret === false) {
			var_dump($mail->errno(), $mail->errmsg());	 			
			\Helpers\Url::redirect('blog');
		}

	}

	
}
