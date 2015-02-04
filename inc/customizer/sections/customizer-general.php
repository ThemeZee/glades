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
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'cardigan_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'cardigan_control_layout', array(
        'label'    => __( 'Theme Layout', 'cardigan' ),
        'section'  => 'cardigan_section_general',
        'settings' => 'cardigan_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'cardigan' ),
            'right-sidebar' => __( 'Right Sidebar', 'cardigan')
			)
		)
	);
	
}

?>