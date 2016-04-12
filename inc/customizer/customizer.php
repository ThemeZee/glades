<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );

// Load Customizer Settings
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-header.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );

// Add Theme Options section to Customizer
add_action( 'customize_register', 'glades_customize_register_options' );

function glades_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'glades_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'glades' ),
		'description'    => '',
	) );
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = esc_html__( 'Background', 'glades' );
	
	// Add Display Site Title Setting
	$wp_customize->add_setting( 'glades_theme_options[site_title]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'glades_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'glades_theme_options[site_title]', array(
        'label'    => esc_html__( 'Display Site Title', 'glades' ),
        'section'  => 'title_tagline',
        'settings' => 'glades_theme_options[site_title]',
        'type'     => 'checkbox',
		'priority' => 10
		)
	);
	
	// Add Header Tagline option
	$wp_customize->add_setting( 'glades_theme_options[header_tagline]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'glades_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'glades_control_header_tagline', array(
        'label'    => esc_html__( 'Display Tagline below site title.', 'glades' ),
        'section'  => 'title_tagline',
        'settings' => 'glades_theme_options[header_tagline]',
        'type'     => 'checkbox',
		'priority' => 11
		)
	);
	
	// Add Header Image Link
	$wp_customize->add_setting( 'glades_theme_options[custom_header_link]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url'
		)
	);
    $wp_customize->add_control( 'glades_control_custom_header_link', array(
        'label'    => esc_html__( 'Header Image Link', 'glades' ),
        'section'  => 'header_image',
        'settings' => 'glades_theme_options[custom_header_link]',
        'type'     => 'url',
		'priority' => 10
		)
	);
	
	// Add Custom Header Hide Checkbox
	$wp_customize->add_setting( 'glades_theme_options[custom_header_hide]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'glades_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'glades_control_custom_header_hide', array(
        'label'    => esc_html__( 'Hide header image on front page', 'glades' ),
        'section'  => 'header_image',
        'settings' => 'glades_theme_options[custom_header_hide]',
        'type'     => 'checkbox',
		'priority' => 15
		)
	);
	
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'glades_customize_preview_js' );

function glades_customize_preview_js() {
	wp_enqueue_script( 'glades-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151202', true );
}


// Embed JS file for Customizer Controls
add_action( 'customize_controls_enqueue_scripts', 'glades_customize_controls_js' );

function glades_customize_controls_js() {
	
	wp_enqueue_script( 'glades-customizer-controls', get_template_directory_uri() . '/js/customizer-controls.js', array(), '20151202', true );
	
	// Localize the script
	wp_localize_script( 'glades-customizer-controls', 'glades_theme_links', array(
		'title'	=> esc_html__( 'Theme Links', 'glades' ),
		'themeURL'	=> esc_url( __( 'https://themezee.com/themes/glades/', 'glades' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=glades&utm_content=theme-page' ),
		'themeLabel'	=> esc_html__( 'Theme Page', 'glades' ),
		'docuURL'	=> esc_url( __( 'https://themezee.com/docs/glades-documentation/', 'glades' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=glades&utm_content=documentation' ),
		'docuLabel'	=>  esc_html__( 'Theme Documentation', 'glades' ),
		'rateURL'	=> esc_url( 'http://wordpress.org/support/view/theme-reviews/glades?filter=5' ),
		'rateLabel'	=> esc_html__( 'Rate this theme', 'glades' ),
		)
	);

}


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'glades_customize_preview_css' );

function glades_customize_preview_css() {
	wp_enqueue_style( 'glades-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20151202' );

}