<?php 
/***
 * Custom Javascript Options
 *
 * Passing Variables from custom Theme Options to the javascript files
 * of theme navigation and frontpage slider. 
 *
 */

// Passing Variables to Featured Post Slider Slider ( js/slider.js)
add_action('wp_enqueue_scripts', 'cardigan_custom_slider_params');

if ( ! function_exists( 'cardigan_custom_slider_params' ) ):

function cardigan_custom_slider_params() { 
	
	// Get Theme Options from Database
	$theme_options = cardigan_theme_options();
	
	// Set Parameters array
	$params = array();
	
	// Define Slider Animation
	if( isset($theme_options['slider_animation']) ) :
		$params['animation'] = esc_attr($theme_options['slider_animation']);
	endif;
	
	// Passing Parameters to Javascript
	wp_localize_script( 'cardigan-post-slider', 'cardigan_slider_params', $params );
}

endif;


?>