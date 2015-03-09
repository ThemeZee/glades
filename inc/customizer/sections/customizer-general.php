<?php
/**
 * Register General section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'cardigan_customize_register_general_settings' );

function cardigan_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'cardigan_section_general', array(
        'title'    => __( 'General Settings', 'cardigan' ),
        'priority' => 10,
		'panel' => 'cardigan_options_panel' 
		)
	);
	
	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'cardigan_theme_options[layout]', array(
        'default'           => 'wide',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'cardigan_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'cardigan_control_layout', array(
        'label'    => __( 'Site Layout', 'cardigan' ),
        'section'  => 'cardigan_section_general',
        'settings' => 'cardigan_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'wide' => __( 'Wide Layout (default)', 'cardigan' ),
			'boxed' => __( 'Boxed Layout', 'cardigan' )
			)
		)
	);
	
	// Add Settings and Controls for Sidebar
	$wp_customize->add_setting( 'cardigan_theme_options[sidebar]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'cardigan_sanitize_sidebar'
		)
	);
    $wp_customize->add_control( 'cardigan_control_sidebar', array(
        'label'    => __( 'Sidebar', 'cardigan' ),
        'section'  => 'cardigan_section_general',
        'settings' => 'cardigan_theme_options[sidebar]',
        'type'     => 'radio',
		'priority' => 2,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'cardigan' ),
            'right-sidebar' => __( 'Right Sidebar', 'cardigan')
			)
		)
	);
	
	// Add Footer Settings
	$wp_customize->add_setting( 'cardigan_theme_options[footer_text]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'cardigan_sanitize_footer_text'
		)
	);
    $wp_customize->add_control( 'cardigan_control_footer_text', array(
        'label'    => __( 'Footer Text', 'cardigan' ),
        'section'  => 'cardigan_section_general',
        'settings' => 'cardigan_theme_options[footer_text]',
        'type'     => 'textarea',
		'priority' => 3
		)
	);
	
}

?>