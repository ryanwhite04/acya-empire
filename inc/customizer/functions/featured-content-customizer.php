<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
/******************** FREESIAEMPIRE SLIDER SETTINGS ******************************************/
$acyaempire_settings = acyaempire_get_theme_options();
$wp_customize->add_section( 'featured_content', array(
	'title' => __( 'Slider Settings', 'acya-empire' ),
	'priority' => 140,
	'panel' => 'acyaempire_featuredcontent_panel'
));
$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_enable_slider]', array(
	'default' => 'frontpage',
	'sanitize_callback' => 'acyaempire_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_enable_slider]', array(
	'priority'=>12,
	'label' => __('Enable Slider', 'acya-empire'),
	'section' => 'featured_content',
	'settings' => 'acyaempire_theme_options[acyaempire_enable_slider]',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
	'frontpage' => __('Front Page','acya-empire'),
	'enitresite' => __('Entire Site','acya-empire'),
	'disable' => __('Disable Slider','acya-empire'),
),
));
$wp_customize->add_section( 'acyaempire_page_post_options', array(
	'title' => __('Display Page Slider','acya-empire'),
	'priority' => 200,
	'panel' =>'acyaempire_featuredcontent_panel'
));
for ( $i=1; $i <= $acyaempire_settings['acyaempire_slider_no'] ; $i++ ) {
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_featured_page_slider_'. $i .']', array(
		'default' =>'',
		'sanitize_callback' =>'acyaempire_sanitize_page',
		'type' => 'option',
		'capability' => 'manage_options'
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_featured_page_slider_'. $i .']', array(
		'priority' => 220 . $i,
		'label' => __(' Page Slider #', 'acya-empire') . ' ' . $i ,
		'section' => 'acyaempire_page_post_options',
		'settings' => 'acyaempire_theme_options[acyaempire_featured_page_slider_'. $i .']',
		'type' => 'dropdown-pages',
	));
}
?>