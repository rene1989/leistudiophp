<?php
/**
 * iconwp Theme Customizer
 *
 * @package iconwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function iconwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'iconwp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function iconwp_customize_preview_js() {
	wp_enqueue_script( 'iconwp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'iconwp_customize_preview_js' );

if (!function_exists( 'iconwp_theme_customizer' ) ) :
	function iconwp_theme_customizer( $wp_customize ) {
		
		$wp_customize->remove_section( 'title_tagline');
		$wp_customize->remove_control("header_image");		
		/* logo option */
		$wp_customize->add_section( 'iconwp_logo_section' , array(
			'title'       => __( 'Site Logo', 'iconwp' ),
			'priority'    => 19,
			'description' => __( 'Upload a logo to replace the default site name in the header', 'iconwp' ),
		) );
		
		$wp_customize->add_setting( 'iconwp_logo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iconwp_logo', array(
			'label'    => __( 'Choose your logo (ideal width is 100-300px and ideal height is 40-100px)', 'iconwp' ),
			'section'  => 'iconwp_logo_section',
			'settings' => 'iconwp_logo',
		) ) );
		
		function iconwp_sanitize_text_field( $str ) {
			return sanitize_text_field( $str );
		}
		
		function iconwp_sanitize_textarea( $text ) {
			return esc_textarea( $text );
		}
		
		$wp_customize->add_panel( 'iconwp_home_featured_panel', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Home Page Features',
			'description'    => '',
		) );
		
		$wp_customize->add_section( 'iconwp_slider_section' , array(
			'title'       => __( 'Slider', 'iconwp' ),
			'priority'    => 20,
			'description' => __( '', 'iconwp' ),
			'panel'  => 'iconwp_home_featured_panel',
		) );
		
		$wp_customize->add_setting('iconwp_display_slider_setting', array(
			'default'        => 1,
			'sanitize_callback' => 'iconwp_sanitize_checkbox',
		));
	 
		$wp_customize->add_control('iconwp_display_slider_control', array(
			'settings' => 'iconwp_display_slider_setting',
			'label'    => __('Display Slider', 'iconwp'),
			'section'  => 'iconwp_slider_section',
			'type'     => 'checkbox',
		));
		
		//slider		
		$categories = get_categories();
				$cats = array();
				$i = 0;
				foreach($categories as $category){
					if($i==0){
						$default = $category->slug;
						$i++;
					}
					$cats[$category->slug] = $category->name;
				}
		
		//  =============================
		//  Select Box               
		//  =============================
		$wp_customize->add_setting('iconwp_category_setting', array(
			'default' => '',
			'sanitize_callback' => 'iconwp_sanitize_category',
		));
				 
		$wp_customize->add_control('iconwp_category_control', array(
			'settings' => 'iconwp_category_setting',
			'type' => 'select',
			'label' => 'Select Category:',
			'section' => 'iconwp_slider_section',
			'choices' => $cats,
		));
		// optional_pages
		$wp_customize->add_section( 'iconwp_optional_pages_section' , array(
			'title'       => __( 'Optional Pages', 'iconwp' ),
			'priority'    => 31,
			'description' => __( '', 'iconwp' ),
			'panel'  => 'iconwp_home_featured_panel',
		) );
		
		$wp_customize->add_setting('iconwp_display_optional_pages_setting', array(
			'default'        => 0,
			'sanitize_callback' => 'iconwp_sanitize_checkbox',
		));
	 
		$wp_customize->add_control('iconwp_display_optional_pages_control', array(
			'settings' => 'iconwp_display_optional_pages_setting',
			'label'    => __('Display Optional Pages', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'checkbox',
		));
		
		$wp_customize->add_setting( 'iconwp_page_one_title_setting', array (
			'default' => '',
			'sanitize_callback' => 'iconwp_sanitize_text_field'
		));
		
		$wp_customize->add_control( 'iconwp_page_one_title_control', array(
			'settings' => 'iconwp_page_one_title_setting',
			'label'    => __('First Page', 'iconwp'),
			'description' => __('First Page Title', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_one_desc_setting', array (
			'default' => '',
			'sanitize_callback' => 'iconwp_sanitize_text_field'
		));
		
		$wp_customize->add_control( 'iconwp_page_one_desc_control', array(
			'settings' => 'iconwp_page_one_desc_setting',
			'description' => __('First Page Description', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'textarea',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_one_url_setting', array (
			'default' => '',
			'sanitize_callback' => 'esc_url_raw'
		));
		
		$wp_customize->add_control( 'iconwp_page_one_url_control', array(
			'settings' => 'iconwp_page_one_url_setting',
			'description' => __('First Page Link URL', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_one_img_url_setting', array (
			'default' => '',
			'sanitize_callback' => 'esc_url_raw'
		));
		
		$wp_customize->add_control( 'iconwp_page_one_img_url_control', array(
			'settings' => 'iconwp_page_one_img_url_setting',
			'description' => __('First Page Image URL', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		//second
		$wp_customize->add_setting( 'iconwp_page_two_title_setting', array (
			'default' => '',
			'sanitize_callback' => 'iconwp_sanitize_text_field'
		));
		
		$wp_customize->add_control( 'iconwp_page_two_title_control', array(
			'settings' => 'iconwp_page_two_title_setting',
			'label' => __('Second Page', 'iconwp'),
			'description' => __('Second Page Title', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_two_desc_setting', array (
			'default' => '',
			'sanitize_callback' => 'iconwp_sanitize_text_field'
		));
		
		$wp_customize->add_control( 'iconwp_page_two_desc_control', array(
			'settings' => 'iconwp_page_two_desc_setting',
			'description' => __('Second Page Description', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'textarea',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_two_url_setting', array (
			'default' => '',
			'sanitize_callback' => 'esc_url_raw'
		));
		
		$wp_customize->add_control( 'iconwp_page_two_url_control', array(
			'settings' => 'iconwp_page_two_url_setting',
			'description' => __('Second Page Link URL', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_two_img_url_setting', array (
			'default' => '',
			'sanitize_callback' => 'esc_url_raw'
		));
		
		$wp_customize->add_control( 'iconwp_page_two_img_url_control', array(
			'settings' => 'iconwp_page_two_img_url_setting',
			'description' => __('Second Page Image URL', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		//third
		$wp_customize->add_setting( 'iconwp_page_three_title_setting', array (
			'default' => '',
			'sanitize_callback' => 'iconwp_sanitize_text_field'
		));
		
		$wp_customize->add_control( 'iconwp_page_three_title_control', array(
			'settings' => 'iconwp_page_three_title_setting',
			'label'    => __('Third Page', 'iconwp'),
			'description' => __('Third Page Title', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_three_desc_setting', array (
			'default' => '',
			'sanitize_callback' => 'iconwp_sanitize_text_field'
		));
		
		$wp_customize->add_control( 'iconwp_page_three_desc_control', array(
			'settings' => 'iconwp_page_three_desc_setting',
			'description' => __('Third Page Description', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'textarea',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_three_url_setting', array (
			'default' => '',
			'sanitize_callback' => 'esc_url_raw'
		));
		
		$wp_customize->add_control( 'iconwp_page_three_url_control', array(
			'settings' => 'iconwp_page_three_url_setting',
			'description' => __('Third Page Link URL', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		$wp_customize->add_setting( 'iconwp_page_three_img_url_setting', array (
			'default' => '',
			'sanitize_callback' => 'esc_url_raw'
		));
		
		$wp_customize->add_control( 'iconwp_page_three_img_url_control', array(
			'settings' => 'iconwp_page_three_img_url_setting',
			'description' => __('Third Page Image URL', 'iconwp'),
			'section'  => 'iconwp_optional_pages_section',
			'type'     => 'text',
			'priority' => 32,			
		) );
		
		
	}
endif;

add_action('customize_register', 'iconwp_theme_customizer');

/**
 * Sanitize checkbox
 */
if (!function_exists( 'iconwp_sanitize_checkbox' ) ) :
	function iconwp_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

if ( ! function_exists( 'iconwp_sanitize_category' ) ){
	function iconwp_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
}