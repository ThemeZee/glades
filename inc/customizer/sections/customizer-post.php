<?php
/**
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'cardigan_customize_register_post_settings' );

function cardigan_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'cardigan_section_post', array(
        'title'    => __( 'Post Settings', 'cardigan' ),
        'priority' => 30,
		'panel' => 'cardigan_options_panel' 
		)
	);

	// Add Settings and Controls for Posts
	$wp_customize->add_setting( 'cardigan_theme_options[posts_length]', array(
        'default'           => 'excerpt',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'cardigan_sanitize_post_length'
		)
	);
    $wp_customize->add_control( 'cardigan_control_posts_length', array(
        'label'    => __( 'Post Length on archives', 'cardigan' ),
        'section'  => 'cardigan_section_post',
        'settings' => 'cardigan_theme_options[posts_length]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'index' => __( 'Show full posts', 'cardigan' ),
            'excerpt' => __( 'Show post summaries (excerpt)', 'cardigan' )
			)
		)
	);
	
	// Add Post Images Headline
	$wp_customize->add_setting( 'cardigan_theme_options[post_images]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Cardigan_Customize_Header_Control(
        $wp_customize, 'cardigan_control_post_images', array(
            'label' => __( 'Post Images', 'cardigan' ),
            'section' => 'cardigan_section_post',
            'settings' => 'cardigan_theme_options[post_images]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'cardigan_theme_options[post_thumbnails_index]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'cardigan_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'cardigan_control_posts_thumbnails_index', array(
        'label'    => __( 'Display featured images on archive pages', 'cardigan' ),
        'section'  => 'cardigan_section_post',
        'settings' => 'cardigan_theme_options[post_thumbnails_index]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);

	$wp_customize->add_setting( 'cardigan_theme_options[post_thumbnails_single]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'cardigan_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'cardigan_control_posts_thumbnails_single', array(
        'label'    => __( 'Display featured images on single posts', 'cardigan' ),
        'section'  => 'cardigan_section_post',
        'settings' => 'cardigan_theme_options[post_thumbnails_single]',
        'type'     => 'checkbox',
		'priority' => 4
		)
	);
	
	// Add Excerpt Text setting
	$wp_customize->add_setting( 'cardigan_theme_options[excerpt_text_headline]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Cardigan_Customize_Header_Control(
        $wp_customize, 'cardigan_control_excerpt_text_headline', array(
            'label' => __( 'Excerpt More Text', 'cardigan' ),
            'section' => 'cardigan_section_post',
            'settings' => 'cardigan_theme_options[excerpt_text_headline]',
            'priority' => 5
            )
        )
    );
	$wp_customize->add_setting( 'cardigan_theme_options[excerpt_text]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'cardigan_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'cardigan_control_excerpt_text', array(
        'label'    => __( 'Display [...] after text excerpts.', 'cardigan' ),
        'section'  => 'cardigan_section_post',
        'settings' => 'cardigan_theme_options[excerpt_text]',
        'type'     => 'checkbox',
		'priority' => 6
		)
	);

}

?>