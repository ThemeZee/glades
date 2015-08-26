<?php
/***
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard. 
 *
 */


// Add Theme Info page to admin menu
add_action('admin_menu', 'glades_add_theme_info_page');
function glades_add_theme_info_page() {
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
	add_theme_page( 
		sprintf( __( 'Welcome to %1s %2s', 'glades' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), 
		__('Theme Info', 'glades'), 
		'edit_theme_options', 
		'glades', 
		'glades_display_theme_info_page'
	);
	
}


// Display Theme Info page
function glades_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( __( 'Welcome to %1s %2s', 'glades' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->get( 'Description' ); ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php _e('Important Links:', 'glades'); ?></strong>
				<a href="http://themezee.com/themes/glades/" target="_blank"><?php _e('Theme Info Page', 'glades'); ?></a>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php _e('Changelog', 'glades'); ?></a>
				<a href="http://preview.themezee.com/glades/" target="_blank"><?php _e('Theme Demo', 'glades'); ?></a>
				<a href="http://themezee.com/docs/glades-documentation/" target="_blank"><?php _e('Theme Documentation', 'glades'); ?></a>
				<a href="http://wordpress.org/support/view/theme-reviews/glades?filter=5" target="_blank"><?php _e('Rate this theme', 'glades'); ?></a>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
				
					<h3><?php printf( __( 'Getting Started with %s', 'glades' ), $theme->get( 'Name' ) ); ?></h3>
						
					<div class="section">
						<h4><?php _e( 'Theme Documentation', 'glades' ); ?></h4>
						
						<p class="about">
							<?php _e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'glades' ); ?>
						</p>
						<p>
							<a href="http://themezee.com/docs/glades-documentation/" target="_blank" class="button button-secondary">
								<?php printf( __( 'View %s Documentation', 'glades' ), $theme->get( 'Name' ) ); ?>
							</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php _e( 'Theme Options', 'glades' ); ?></h4>
						
						<p class="about">
							<?php printf( __( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'glades' ), $theme->get( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary"><?php _e('Customize Theme', 'glades'); ?></a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php _e( 'Pro Version', 'glades' ); ?></h4>
						
						<p class="about">
							<?php _e( 'You need more features? Purchase the Pro Version to get additional features and advanced customization options.', 'glades' ); ?>
						</p>
						<p>
							<a href="http://themezee.com/themes/glades/#PROVersion-1" target="_blank" class="button button-secondary">
								<?php printf( __( 'Learn more about %s Pro', 'glades' ), $theme->get( 'Name' ) ); ?>
							</a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.jpg" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( __( '%1s is proudly brought to you by %2s. If you like this theme, %3s :) ', 'glades' ), 
				$theme->get( 'Name' ),
				'<a target="_blank" href="http://themezee.com" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="http://wordpress.org/support/view/theme-reviews/glades?filter=5" title="Glades Review">' . __( 'rate it', 'glades' ) . '</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'glades_theme_info_page_css');
function glades_theme_info_page_css($hook) { 

	// Load styles and scripts only on theme info page
	if ( 'appearance_page_glades' != $hook ) {
		return;
	}
	
	// Embed theme info css style
	wp_enqueue_style('glades-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');

}


?>