<?php
/**
 * Theme Customizer Functions
 *
 */

/*========================== CUSTOMIZER SANITIZE FUNCTIONS ==========================*/

// Sanitize checkboxes
function cardigan_sanitize_checkbox( $value ) {

	if ( $value == 1) :
        return 1;
	else:
		return '';
	endif;
}


// Sanitize the site layout value.
function cardigan_sanitize_layout( $value ) {

	if ( ! in_array( $value, array( 'wide', 'boxed' ), true ) ) :
        $value = 'wide';
	endif;

    return $value;
}


// Sanitize the sidebar value.
function cardigan_sanitize_sidebar( $value ) {

	if ( ! in_array( $value, array( 'left-sidebar', 'right-sidebar' ), true ) ) :
        $value = 'right-sidebar';
	endif;

    return $value;
}


// Sanitize the post length value.
function cardigan_sanitize_post_length( $value ) {

	if ( ! in_array( $value, array( 'index', 'excerpt' ), true ) ) :
        $value = 'excerpt';
	endif;

    return $value;
}


// Sanitize the slider animation value.
function cardigan_sanitize_slider_animation( $value ) {

	if ( ! in_array( $value, array( 'horizontal', 'fade' ), true ) ) :
        $value = 'horizontal';
	endif;

    return $value;
}

?>