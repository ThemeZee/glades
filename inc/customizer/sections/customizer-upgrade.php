<?php
/**
 * Register PRO Version section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'cardigan_customize_register_upgrade_settings' );

function cardigan_customize_register_upgrade_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'cardigan_section_upgrade', array(
        'title'    => __( 'Cardigan Pro', 'cardigan' ),
        'priority' => 70,
		'panel' => 'cardigan_options_panel' 
		)
	);

	// Add PRO Version Section
	$wp_customize->add_setting( 'cardigan_theme_options[pro_version_label]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Cardigan_Customize_Header_Control(
        $wp_customize, 'cardigan_control_pro_version_label', array(
            'label' => __( 'Need more features?', 'cardigan' ),
            'section' => 'cardigan_section_upgrade',
            'settings' => 'cardigan_theme_options[pro_version_label]',
            'priority' => 	1
            )
        )
    );
	$wp_customize->add_setting( 'cardigan_theme_options[pro_version]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Cardigan_Customize_Text_Control(
        $wp_customize, 'cardigan_control_pro_version', array(
            'label' =>  __( 'Check out the PRO version which comes with additional features and advanced customization options.', 'cardigan' ),
            'section' => 'cardigan_section_upgrade',
            'settings' => 'cardigan_theme_options[pro_version]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'cardigan_theme_options[pro_version_button]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Cardigan_Customize_Button_Control(
        $wp_customize, 'cardigan_control_pro_version_button', array(
            'label' => __('Learn more about Cardigan Pro', 'cardigan'),
			'section' => 'cardigan_section_upgrade',
            'settings' => 'cardigan_theme_options[pro_version_button]',
            'priority' => 	3
            )
        )
    );

}

?>