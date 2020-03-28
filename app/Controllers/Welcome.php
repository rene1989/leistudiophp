<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Controllers;

use Core\View;
use Core\Controller;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Welcome extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();       
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
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
		
		// Top
        $data['welcome_message'] = $this->language->get('welcome_message');
        $data['welcome_message_slogan'] = $this->language->get('welcome_message_slogan');
		
		// Purchase
		$data['ad_title'] = $this->language->get('ad_title');
		$data['ad_message'] = $this->language->get('ad_message');

		// Payoff
		$data['roadmap_1_label'] = $this->language->get('roadmap_1_label');
		$data['roadmap_1_message'] = $this->language->get('roadmap_1_message');
				
		// Details
		$data['product_1_name'] = $this->language->get('product_1_name');
		$data['product_1_description'] = $this->language->get('product_1_description');
		$data['product_2_name'] = $this->language->get('product_2_name');
		$data['product_2_description'] = $this->language->get('product_2_description');		
		$data['product_3_name'] = $this->language->get('product_3_name');
		$data['product_3_description'] = $this->language->get('product_3_description');
		$data['product_4_name'] = $this->language->get('product_4_name');
		$data['product_4_description'] = $this->language->get('product_4_description');
		
		// Features
		$data['feature_1_name'] = $this->language->get('feature_1_name');
		$data['feature_1_description'] = $this->language->get('feature_1_description');
		$data['feature_2_name'] = $this->language->get('feature_2_name');
		$data['feature_2_description'] = $this->language->get('feature_2_description');
		$data['feature_3_name'] = $this->language->get('feature_3_name');
		$data['feature_3_description'] = $this->language->get('feature_3_description');
		
		//Bottom
		$data['connect_with_us'] = $this->language->get('connect_with_us');
		$data['avaialable_on_AppStore'] = $this->language->get('avaialable_on_AppStore');
		$data['app_apple_ad'] = $this->language->get('app_apple_ad');	
		
		$data['contact_us'] = $this->language->get('contact_us');
		$data['contact_us_campaign'] = $this->language->get('contact_us_campaign');
		$data['contact_label_input_firstname'] = $this->language->get('contact_label_input_firstname');
		$data['contact_hint_input_firstname'] = $this->language->get('contact_hint_input_firstname');
		$data['contact_input_firstname_check_notempty'] = $this->language->get('contact_input_firstname_check_notempty');
		$data['contact_label_input_telephone'] = $this->language->get('contact_label_input_telephone');
		$data['contact_hint_input_telephone'] = $this->language->get('contact_hint_input_telephone');
		$data['contact_input_telephone_check_notempty'] = $this->language->get('contact_input_telephone_check_notempty');
		$data['contact_label_input_email'] = $this->language->get('contact_label_input_email');
		$data['contact_hint_input_email'] = $this->language->get('contact_hint_input_email');
		$data['contact_input_email_check_validform'] = $this->language->get('contact_input_email_check_validform');
		$data['contact_label_input_message'] = $this->language->get('contact_label_input_message');
		$data['contact_hint_input_message'] = $this->language->get('contact_hint_input_message'); 		
		$data['contact_input_message_check_notempty'] = $this->language->get('contact_input_message_check_notempty');
		$data['contact_label_input_country'] = $this->language->get('contact_label_input_country');
		$data['contact_hint_pleaseselect'] = $this->language->get('contact_hint_pleaseselect'); 
		$data['contact_input_prodType'] = $this->language->get('contact_input_prodType'); 						
		$data['contact_submit_button'] = $this->language->get('contact_submit_button'); 
		$data['contact_sending_button'] = $this->language->get('contact_sending_button');
		$data['contact_sent_button'] = $this->language->get('contact_sent_button');
		$data['contact_us_thanks'] = $this->language->get('contact_us_thanks');
		$data['quote_confirmation_letter_title'] = $this->language->get('quote_confirmation_letter_title');
		$data['quote_confirmation_letter_body'] = $this->language->get('quote_confirmation_letter_body');
		
		$data['bottom_menu_label_contact'] = $this->language->get('bottom_menu_label_contact');
		$data['bottom_contact_address'] = $this->language->get('bottom_contact_address');
		$data['bottom_contact_person'] = $this->language->get('bottom_contact_person');
		$data['bottom_contact_mail_label'] = $this->language->get('bottom_contact_mail_label');
		$data['bottom_contact_mail_box'] = $this->language->get('bottom_contact_mail_box');
		$data['bottom_contact_telephone'] = $this->language->get('bottom_contact_telephone');
		$data['bottom_menu_label_press'] = $this->language->get('bottom_menu_label_press');
		$data['bottom_menu_label_support'] = $this->language->get('bottom_menu_label_support');
		$data['bottom_menu_label_recruit'] = $this->language->get('bottom_menu_label_recruit');
		$data['bottom_menu_label_blog'] = $this->language->get('bottom_menu_label_blog');
		$data['bottom_menu_label_policy'] = $this->language->get('bottom_menu_label_policy'); 	
		
		//countrylist code and name
		$data['countrylist_code_cn'] = $this->language->get('countrylist_code_cn');
		$data['countrylist_code_us'] = $this->language->get('countrylist_code_us');
		$data['countrylist_code_uk'] = $this->language->get('countrylist_code_uk');
		$data['countrylist_code_fr'] = $this->language->get('countrylist_code_fr');
		$data['countrylist_code_au'] = $this->language->get('countrylist_code_au');
		$data['countrylist_code_jp'] = $this->language->get('countrylist_code_jp');
		$data['countrylist_code_de'] = $this->language->get('countrylist_code_de');
		$data['countrylist_code_other'] = $this->language->get('countrylist_code_other');
		
		
		$data['countrylist_name_cn'] = $this->language->get('countrylist_name_cn');
		$data['countrylist_name_us'] = $this->language->get('countrylist_name_us');
		$data['countrylist_name_uk'] = $this->language->get('countrylist_name_uk');
		$data['countrylist_name_fr'] = $this->language->get('countrylist_name_fr');
		$data['countrylist_name_au'] = $this->language->get('countrylist_name_au');
		$data['countrylist_name_jp'] = $this->language->get('countrylist_name_jp');
		$data['countrylist_name_de'] = $this->language->get('countrylist_name_de');
		$data['countrylist_name_other'] = $this->language->get('countrylist_name_other');		
		
		//prodTypelist code and name
		$data['prodType_code_webdesign'] = $this->language->get('prodType_code_webdesign');
		$data['prodType_code_webaudit'] = $this->language->get('prodType_code_webaudit');
		$data['prodType_code_mobile'] = $this->language->get('prodType_code_mobile');
		$data['prodType_code_OTA'] = $this->language->get('prodType_code_OTA');
		
		$data['prodType_name_webdesign'] = $this->language->get('prodType_name_webdesign');
		$data['prodType_name_webaudit'] = $this->language->get('prodType_name_webaudit');
		$data['prodType_name_mobile'] = $this->language->get('prodType_name_mobile');
		$data['prodType_name_OTA'] = $this->language->get('prodType_name_OTA');
				
        View::renderTemplate('header', $data);
        View::renderTemplate('navbar', $data);
        View::renderTemplate('top', $data);
        View::renderTemplate('purchase', $data);
        View::renderTemplate('payoff', $data);
        View::renderTemplate('detail', $data);
        View::renderTemplate('features', $data);        
        View::renderTemplate('bottom', $data);
        View::renderTemplate('footer', $data);   
    }

    /**
     * Define Subpage page title and load template files
     */
    public function subPage()
    {
        $data['title'] = $this->language->get('subpage_text');
        $data['welcome_message'] = $this->language->get('subpage_message');

        View::renderTemplate('header', $data);
        View::render('welcome/subpage', $data);
        View::renderTemplate('footer', $data);
    }
}
