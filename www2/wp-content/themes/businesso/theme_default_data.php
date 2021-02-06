<?php 
function theme_default_data()
  	{
	return $businesso_option=array(
	//Front-page 
	'front_page_enabled'=> 1,
	
	//Header Settings
	'header_info_phone' =>get_theme_mod('header_info_phone',__('(2)245 23 68','businesso')),
	'header_info_mail'=> get_theme_mod('header_info_mail',__('asiathemes.com','businesso')),
	
	//header logo setting
	'upload_image_logo'=> ASIATHEMES_TEMPLATE_DIR_URI.'/images/logo.png',
	'upload_image_favicon' => get_template_directory_uri().'/images/favicon.png',
	'text_title' => '' ,
	'height' => '50',
	'width' => '250',
	'businesso_custom_css'=> '',
		
	//Slider settings
	'home_banner_enabled' => 1,
	'slider_options' => get_theme_mod('slider_options',__('slide','businesso')),
	'slider_transition_delay' => 2000,
	'slider_image_one' => get_template_directory_uri().'/images/slide/slide1.jpg',
	'slider_image_title_one' => get_theme_mod('slider_image_title_one',__('businesso Responsive','businesso')),
	'slider_image_description_one' => get_theme_mod('slider_image_description_one',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
		
	'slider_image_two' => get_template_directory_uri().'/images/slide/slide2.jpg',
	'slider_image_title_two' => get_theme_mod('slider_image_title_two',__('businesso Responsive','businesso')),
	'slider_image_description_two' => get_theme_mod('slider_image_description_two',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
		
	'slider_image_three' => get_template_directory_uri().'/images/slide/slide3.jpg',
	'slider_image_title_three' => get_theme_mod('slider_image_title_three',__('businesso Responsive','businesso')),
	'slider_image_description_three' => get_theme_mod('slider_image_description_three',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
	'slider_button_text' => get_theme_mod('slider_button_text',__('More Details!','businesso')),
	'slider_image_link' => '#',
	'slider_button_tab' => 1,
	
	//Project Portfolio Section
	'enable_home_portfolio' => 1,
	'portfolio_title_one' => get_theme_mod('portfolio_title_one',__('Recent Works','businesso')),
	'upload_image_one' => get_template_directory_uri().'/images/gallery/1.jpg',
	'portfolio_image_one_title' => get_theme_mod('portfolio_image_one_title',__('businesso Responsive','businesso')),
	'portfolio_image_one_description' => get_theme_mod('portfolio_image_one_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
	'portfolio_image_one_link' => '#',
	'portfolio_new_tab' => 1,
	'upload_image_two' => get_template_directory_uri() .'/images/gallery/2.jpg',
	'portfolio_image_two_title' => get_theme_mod('portfolio_image_two_title',__('Awesome Layout','businesso')),
	'portfolio_image_two_description' => get_theme_mod('portfolio_image_two_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
	'portfolio_image_two_link' => '#',
	'portfolio_two_new_tab' => 1,
	'upload_image_three' => get_template_directory_uri() .'/images/gallery/3.jpg',
	'portfolio_image_three_title' => get_theme_mod('portfolio_image_three_title',__('Businesso Responsive','businesso')),
	'portfolio_image_three_description' => get_theme_mod('portfolio_image_three_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
	'portfolio_image_three_link' => '#',
	'portfolio_three_new_tab' => 1,
	
	//Home Latest Blog Post
	'home_blog_enabled' => 1,
	'blog_title_one' => get_theme_mod('blog_title_one',__('Latest News','businesso')),
	'post_display_count' => 4,
	
	// Fooetr Customization
	'footer_customization_text' => get_theme_mod('footer_customization_text',__('Copyright @ 2016 Businesso Theme','businesso')),
	'footer_customization_develop' => get_theme_mod('footer_customization_develop',__('All rights reserved. Developed By','businesso')),
	'develop_by_name' => get_theme_mod('develop_by_name',__('Asisa Themes ','businesso')),
	'develop_by_link' => get_theme_mod('develop_by_link',__('http://asiathemes.com/','businesso')),
	
	);
  	}
  ?>