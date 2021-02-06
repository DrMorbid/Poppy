<?php $businesso_option=theme_default_data(); 
$front_page_options = wp_parse_args(  get_option( 'businesso_option', array() ), $businesso_option );
if ($front_page_options['front_page_enabled']=="1" && is_front_page()) {
	
		 get_header(); 
 /****** Home Slider ******/
get_template_part('home','slider');
 
/****** Home Service ******/
//get_template_part('home','service');	  
	  	  
/****** Home colout ******/
//get_template_part('home','callout');

/****** Home gallery ******/
get_template_part('home','gallery');
	 
/****** Home blog ******/
get_template_part('home','blog');
 
/*==== Footer ====*/
 get_footer(); 
 }  else {
		if(is_page())
		{ get_template_part('page'); } 
		else { get_template_part('index'); } }?>
</div> <!-- /main-wrapper -->
