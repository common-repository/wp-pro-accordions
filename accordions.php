<?php
/*
Plugin Name: Pro Accordions
Plugin URI: http://sohel.prowpexpert.com/
Description: Fully responsive and mobile ready accordion grid for wordpress.
Version: 1.0
Author: paratheme
Author URI: http://prowpexpert.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('pro_pro_pro_accordions_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('pro_accordions_plugin_dir', plugin_dir_path( __FILE__ ) );
define('pro_accordions_wp_url', 'http://wordpress.org/plugins/my-wp-accordion/' );
define('pro_accordions_wp_reviews', 'https://wordpress.org/support/view/plugin-reviews/my-wp-accordion' );
define('pro_accordions_pro_url','http://paratheme.com/items/pro_accordions-html-css3-responsive-accordion-grid-for-wordpress/' );
define('pro_accordions_demo_url', 'http://paisleyfarmersmarket.ca/sohels/my-accordions/' );
define('pro_accordions_conatct_url', 'http://sohelwpexpert@gmail.com' );
define('pro_accordions_qa_url', 'http://prowpexpert.com/' );
define('pro_pro_accordions_plugin_name', 'pro_accordions' );
define('pro_accordions_share_url', 'https://wordpress.org/plugins/pro_accordions/' );
define('pro_accordions_tutorial_video_url', '//www.youtube.com/embed/1111111111?rel=0' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/accordions-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/accordions-functions.php');


//Themes php files
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');




function pro_wp_pro_accordions_paratheme_init_scripts()
	{
		
		
		
		wp_enqueue_script('jquery');
		
		wp_enqueue_script('pro_accordions_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));

		wp_enqueue_style('pro_accordions_style', pro_pro_pro_accordions_plugin_url.'css/style.css');		
		wp_enqueue_style('responsive-accordion', pro_pro_pro_accordions_plugin_url.'css/responsive-accordion.css');	
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'pro_accordions_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		wp_enqueue_script('jquery-accordion', plugins_url( '/js/responsive-accordion.js' , __FILE__ ) , array( 'jquery' ));


		//ParaAdmin
		wp_enqueue_style('ParaAdmin', pro_pro_pro_accordions_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		wp_enqueue_style('ParaIcons', pro_pro_pro_accordions_plugin_url.'ParaAdmin/css/ParaIcons.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));




		
		// Style for themes
		wp_enqueue_style('pro_accordions-style-flat', pro_pro_pro_accordions_plugin_url.'themes/flat/style.css');			
	
		
	}
add_action("init","pro_wp_pro_accordions_paratheme_init_scripts");


register_activation_hook(__FILE__, 'pro_wp_pro_accordions_paratheme_activation');


function pro_wp_pro_accordions_paratheme_activation()
	{
		$pro_pro_accordions_version= "1.2";
		update_option('pro_pro_accordions_version', $pro_pro_accordions_version); //update plugin version.
		
		$pro_pro_accordions_customer_type= "free"; //customer_type "free"
		update_option('pro_pro_accordions_customer_type', $pro_pro_accordions_customer_type); //update plugin version.
	}


function pro_accordions_paratheme_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];

			$pro_accordions_themes = get_post_meta( $post_id, 'pro_accordions_themes', true );

			$pro_accordions_paratheme_display ="";

			if($pro_accordions_themes== "flat")
				{
					$pro_accordions_paratheme_display.= pro_accordions_themes_flat($post_id);
				}
			elseif($pro_accordions_themes== "rounded")
				{
					$pro_accordions_paratheme_display.= pro_accordions_themes_rounded($post_id);
				}	
			elseif($pro_accordions_themes== "rounded_top")
				{
					$pro_accordions_paratheme_display.= pro_accordions_themes_rounded_top($post_id);
				}					
				
							
				
				

return $pro_accordions_paratheme_display;



}

add_shortcode('pro_accordions', 'pro_accordions_paratheme_display');









add_action('admin_menu', 'pro_wp_pro_accordions_paratheme_menu_init');


	
function pro_accordions_paratheme_menu_help(){
	include('accordions-help.php');	
}





function pro_wp_pro_accordions_paratheme_menu_init()
	{

			
		add_submenu_page('edit.php?post_type=pro_accordions', __('Help & Upgrade','menu-wpt'), __('Help & Upgrade','menu-wpt'), 'manage_options', 'pro_accordions_paratheme_menu_help', 'pro_accordions_paratheme_menu_help');

	}





?>