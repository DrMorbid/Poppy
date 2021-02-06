<?php add_action('admin_menu','asiathemes_add_opiotn_page');
function asiathemes_add_opiotn_page(){
$page = add_theme_page( __('businesso','businesso'), __('Theme Options','businesso'), 'edit_theme_options', 'businesso', 'asiathemes_option_panal_function' );
add_action('admin_print_styles-'.$page, 'asiathemes_admin_enqueue_scripts');
} 

 function asiathemes_admin_enqueue_scripts()
{
		/*====Becorp Option Panel Style====*/
		wp_enqueue_style('thickbox');	
		wp_enqueue_style('businesso-style', ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/style.css');//enqueu 
		wp_enqueue_style('businesso-bootstrap', ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/bootstrap.css');//enqueu option panel bootstrap
		wp_enqueue_style('businesso-font-awesome-4.2.0', ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/font-awesome-4.2.0/css/font-awesome.min.css');//enqueu option panel font-awesome-4.2.0
}
 
function asiathemes_option_panal_function()
{	require_once('businesso-option-panel.php'); }
?>
