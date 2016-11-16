<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
/********************* FREESIAEMPIRE CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function acyaempire_customize_preview_js() {
	wp_enqueue_script( 'acyaempire_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
function acyaempire_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}
function acyaempire_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
function acyaempire_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}
function acyaempire_sanitize_custom_css( $input ) {
	if ( $input != '' ) { 
		$input = str_replace( '<=', '&lt;=', $input ); 
		$input = wp_kses_split( $input, array(), array() ); 
		$input = str_replace( '&gt;', '>', $input ); 
		$input = strip_tags( $input ); 
		return $input;
	}
	else {
		return '';
	}
}
function acyaempire_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'acyaempire_theme_options');
	} 
	else {
		return '';
	}
}
function acyaempire_sanitize_page( $input ) {
	if(  get_post( $input ) ){
		return $input;
	}
	else {
		return '';
	}
}
?>