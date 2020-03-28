<?php
function FT_OP_update()
{
	$settings = get_option('ft_op');
	$settings['id'] = 'ft_' . FT_scope::tool()->optionsName;
	update_option('ft_op', $settings);
}

function FT_OP_options()
{
	
	// Test data
	$test_array = array("1" => "Tutorials","2" => "Posts");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
	
		// Pull all the pages into an array
	$options_slider = array();  
	$options_slider_obj = get_posts('post_type=custom_slider');
	$options_slider[''] = 'Select a slider:';
	foreach ($options_slider_obj as $post) {
    	$options_slider[$post->ID] = $post->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
	
	
	$options[] = array( "name" => "Homepage",
						"type" => "heading");	

	$options[] = array( "name" => "Ad banner on header",
						"desc" => "480x60 banner",
						"id" => "fabthemes_topad",
						"std" => "",
						"type" => "textarea");							
						
						
	$options[] = array( "name" => "Carousal Category",
						"desc" => "Select a category for the post carousal",
						"id" => "fabthemes_slide_categories",
						"type" => "select",
						"options" => $options_categories);						
						
	$options[] = array( "name" => "Number of carousal items",
						"desc" => "Enter the number of carousal items",
						"id" => "fabthemes_slide_number",
						"std" => "",
						"type" => "text");						
										
	$options[] = array( "name" => "Featured post category",
						"desc" => "Select a category for the featured post slider",
						"id" => "fabthemes_slider_categories",
						"type" => "select",
						"options" => $options_categories);						
						
	$options[] = array( "name" => "Number of slider items",
						"desc" => "Enter the number of slider items",
						"id" => "fabthemes_slider_number",
						"std" => "",
						"type" => "text");		


	$options[] = array( "name" => "Style Settings",
						"type" => "heading");		


	$options[] = array( "name" => "Main Color scheme",
						"desc" => "",
						"id" => "fabthemes_primary_color",
						"std" => "",
						"type" => "color");
					
	$options[] = array( "name" => "Link color",
						"desc" => "",
						"id" => "fabthemes_link_color",
						"std" => "",
						"type" => "color");		
									
	$options[] = array( "name" => "Link hover color",
						"desc" => "",
						"id" => "fabthemes_hover_color",
						"std" => "",
						"type" => "color");							
						
					

	if (file_exists(dirname(__FILE__) . '/FT/options/banners.php'))
			include ('FT/options/banners.php');

	if (file_exists(dirname(__FILE__) . '/FT/options/colors.php'))
			include ('FT/options/colors.php');

	if (file_exists(dirname(__FILE__) . '/FT/options/common.php'))
			include ('FT/options/common.php');

	return $options;
}