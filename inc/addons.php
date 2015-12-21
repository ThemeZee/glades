<?php
/**
 * Add Support for Theme Addons
 *
 * @package Glades
 */


// Register support for ThemeZee Addons
add_action( 'after_setup_theme', 'glades_theme_addons_setup' );

function glades_theme_addons_setup() {

	// Add Theme Support for Anderson Pro Plugin
	add_theme_support( 'glades-pro' );
	
	// Add Theme Support for ThemeZee Plugins
	add_theme_support( 'themezee-widget-bundle' );
	add_theme_support( 'themezee-breadcrumbs' );
	add_theme_support( 'themezee-related-posts' );
	
}


// Load addon stylesheets and scripts
add_action( 'wp_enqueue_scripts', 'glades_theme_addons_scripts' );

function glades_theme_addons_scripts() {

	// Load widget bundle styles if widgets are active
	if ( is_active_widget('TZWB_Facebook_Likebox_Widget', false, 'tzwb-facebook-likebox')
		or is_active_widget('TZWB_Recent_Comments_Widget', false, 'tzwb-recent-comments')
		or is_active_widget('TZWB_Recent_Posts_Widget', false, 'tzwb-recent-posts')
		or is_active_widget('TZWB_Social_Icons_Widget', false, 'tzwb-social-icons')
		or is_active_widget('TZWB_Tabbed_Content_Widget', false, 'tzwb-tabbed-content')
	) {
	
		// Enqueue Widget Bundle Stylesheet
		wp_enqueue_style( 'themezee-widget-bundle', get_template_directory_uri() . '/css/themezee-widget-bundle.css' );

	}
	
	// Load Related Posts stylesheet only on single posts
	if( is_singular( 'post' ) ) {
	
		// Enqueue Related Post Stylesheet
		wp_enqueue_style( 'themezee-related-posts', get_template_directory_uri() . '/css/themezee-related-posts.css' );

	}
	
}


// Add custom Image Sizes for addons
add_action( 'after_setup_theme', 'glades_theme_addons_image_sizes' );

function glades_theme_addons_image_sizes() {

	// Add Widget Bundle Thumbnail
	add_image_size( 'tzwb-thumbnail', 100, 70, true );
	
	// Add Related Posts Thumbnail
	add_image_size( 'themezee-related-posts', 490, 280, true );

}