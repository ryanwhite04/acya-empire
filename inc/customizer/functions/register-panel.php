<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
/******************** FREESIAEMPIRE CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'acyaempire_customize_register_wordpress_default' );
function acyaempire_customize_register_wordpress_default( $wp_customize ) {
	$wp_customize->add_panel( 'acyaempire_wordpress_default_panel', array(
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'ACYA Empire WordPress Settings', 'acya-empire' ),
		'description' => '',
	) );
}
add_action( 'customize_register', 'acyaempire_customize_register_options', 20 );
function acyaempire_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'acyaempire_options_panel', array(
		'priority' => 6,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'ACYA Empire Theme Options', 'acya-empire' ),
		'description' => '',
	) );
}
add_action( 'customize_register', 'acyaempire_customize_register_featuredcontent' );
function acyaempire_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'acyaempire_featuredcontent_panel', array(
		'priority' => 7,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'ACYA Empire Slider Options', 'acya-empire' ),
		'description' => '',
	) );
}
add_action( 'customize_register', 'acyaempire_customize_register_widgets' );
function acyaempire_customize_register_widgets( $wp_customize ) {
	$wp_customize->add_panel( 'widgets', array(
		'priority' => 8,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'ACYA Empire Widgets', 'acya-empire' ),
		'description' => '',
	) );
}
?>