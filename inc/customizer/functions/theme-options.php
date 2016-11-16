<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
/********************  FREESIAEMPIRE THEME OPTIONS ******************************************/
	$wp_customize->add_section('title_tagline', array(
	'title' => __('Site Title & Logo Options', 'acya-empire'),
	'priority' => 10,
	'panel' => 'acyaempire_wordpress_default_panel'
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire-img-upload-header-logo]',array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'acyaempire_theme_options[acyaempire-img-upload-header-logo]', array(
		'label' => __('Site Logo','acya-empire'),
		'priority'	=> 101,
		'section' => 'title_tagline',
		'settings' => 'acyaempire_theme_options[acyaempire-img-upload-header-logo]'
		)
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_header_display]', array(
		'capability' => 'edit_theme_options',
		'default' => 'header_text',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_header_display]', array(
		'label' => __('Site Logo/ Text Options', 'acya-empire'),
		'priority' => 102,
		'section' => 'title_tagline',
		'settings' => 'acyaempire_theme_options[acyaempire_header_display]',
		'type' => 'select',
		'checked' => 'checked',
			'choices' => array(
			'header_text' => __('Display Site Title Only','acya-empire'),
			'header_logo' => __('Display Site Logo Only','acya-empire'),
			'show_both' => __('Show Both','acya-empire'),
			'disable_both' => __('Disable Both','acya-empire'),
		),
	));
	$wp_customize->add_section('header_image', array(
	'title' => __('Header Image', 'acya-empire'),
	'priority' => 20,
	'panel' => 'acyaempire_wordpress_default_panel'
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_display_header_image]', array(
		'capability' => 'edit_theme_options',
		'default' => 'top',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_display_header_image]', array(
		'label' => __('Display Header Image', 'acya-empire'),
		'priority' => 5,
		'section' => 'header_image',
		'settings' => 'acyaempire_theme_options[acyaempire_display_header_image]',
		'type' => 'select',
		'checked' => 'checked',
			'choices' => array(
			'below' => __('Display below Site Title','acya-empire'),
			'top' => __('Display above Site Title','acya-empire'),
		),
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_custom_header_options]', array(
		'default' => 'homepage',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
		'capability' => 'manage_options'
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_custom_header_options]', array(
		'label' => __('Enable Custom Header Image', 'acya-empire'),
		'section' => 'header_image',
		'type' => 'select',
		'settings' => 'acyaempire_theme_options[acyaempire_custom_header_options]',
		'checked' => 'checked',
		'choices' => array(
		'homepage' => __('Front Page','acya-empire'),
		'enitre_site' => __('Entire Site','acya-empire'),
		'header_disable' => __('Disable','acya-empire'),
	),
	));
	$wp_customize->add_section('acyaempire_custom_header', array(
		'title' => __('ACYA Empire Options', 'acya-empire'),
		'priority' => 503,
		'panel' => 'acyaempire_options_panel'
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_search_custom_header]', array(
		'default' => 0,
		'sanitize_callback' => 'acyaempire_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_search_custom_header]', array(
		'priority'=>20,
		'label' => __('Disable Search Form', 'acya-empire'),
		'section' => 'acyaempire_custom_header',
		'settings' => 'acyaempire_theme_options[acyaempire_search_custom_header]',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_stick_menu]', array(
		'default' => 0,
		'sanitize_callback' => 'acyaempire_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_stick_menu]', array(
		'priority'=>30,
		'label' => __('Disable Stick Menu', 'acya-empire'),
		'section' => 'acyaempire_custom_header',
		'settings' => 'acyaempire_theme_options[acyaempire_stick_menu]',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_scroll]', array(
		'default' => 0,
		'sanitize_callback' => 'acyaempire_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_scroll]', array(
		'priority'=>40,
		'label' => __('Disable Goto Top', 'acya-empire'),
		'section' => 'acyaempire_custom_header',
		'settings' => 'acyaempire_theme_options[acyaempire_scroll]',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_top_social_icons]', array(
		'default' => 0,
		'sanitize_callback' => 'acyaempire_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_top_social_icons]', array(
		'priority'=>43,
		'label' => __('Disable Top Social Icons', 'acya-empire'),
		'section' => 'acyaempire_custom_header',
		'settings' => 'acyaempire_theme_options[acyaempire_top_social_icons]',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_buttom_social_icons]', array(
		'default' => 0,
		'sanitize_callback' => 'acyaempire_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_buttom_social_icons]', array(
		'priority'=>46,
		'label' => __('Disable Buttom Social Icons', 'acya-empire'),
		'section' => 'acyaempire_custom_header',
		'settings' => 'acyaempire_theme_options[acyaempire_buttom_social_icons]',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_display_page_featured_image]', array(
		'default' => 0,
		'sanitize_callback' => 'acyaempire_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_display_page_featured_image]', array(
		'priority'=>48,
		'label' => __('Display Page Featured Image', 'acya-empire'),
		'section' => 'acyaempire_custom_header',
		'settings' => 'acyaempire_theme_options[acyaempire_display_page_featured_image]',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_reset_all]', array(
		'default' => 0,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'acyaempire_reset_alls',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_reset_all]', array(
		'priority'=>50,
		'label' => __('Reset all default settings. (Refresh it to view the effect)', 'acya-empire'),
		'section' => 'acyaempire_custom_header',
		'settings' => 'acyaempire_theme_options[acyaempire_reset_all]',
		'type' => 'checkbox',
	));
	$wp_customize->add_section( 'acyaempire_custom_css', array(
		'title' => __('Enter your custom CSS', 'acya-empire'),
		'priority' => 507,
		'panel' => 'acyaempire_options_panel'
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_custom_css]', array(
		'default' => '',
		'sanitize_callback' => 'acyaempire_sanitize_custom_css',
		'type' => 'option',
		)
	);
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_custom_css]', array(
		'label' => __('Custom CSS','acya-empire'),
		'section' => 'acyaempire_custom_css',
		'settings' => 'acyaempire_theme_options[acyaempire_custom_css]',
		'type' => 'textarea'
		)
	);
/********************** FREESIAEMPIRE WORDPRESS DEFAULT PANEL ***********************************/
	$wp_customize->add_section('colors', array(
	'title' => __('Colors', 'acya-empire'),
	'priority' => 30,
	'panel' => 'acyaempire_wordpress_default_panel'
	));
	$wp_customize->add_section('background_image', array(
	'title' => __('Background Image', 'acya-empire'),
	'priority' => 40,
	'panel' => 'acyaempire_wordpress_default_panel'
	));
	$wp_customize->add_section('nav', array(
	'title' => __('Navigation', 'acya-empire'),
	'priority' => 50,
	'panel' => 'acyaempire_wordpress_default_panel'
	));
	$wp_customize->add_section('static_front_page', array(
	'title' => __('Static Front Page', 'acya-empire'),
	'priority' => 60,
	'panel' => 'acyaempire_wordpress_default_panel'
	));
?>