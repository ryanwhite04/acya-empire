<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
/******************** FREESIAEMPIRE LAYOUT OPTIONS ******************************************/
	$wp_customize->add_section('acyaempire_layout_options', array(
		'title' => __('Layout Options', 'acya-empire'),
		'priority' => 102,
		'panel' => 'acyaempire_options_panel'
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_responsive]', array(
		'default' => 'on',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_responsive]', array(
		'priority' =>10,
		'label' => __('Responsive Layout', 'acya-empire'),
		'section' => 'acyaempire_layout_options',
		'settings' => 'acyaempire_theme_options[acyaempire_responsive]',
		'type' => 'select',
		'checked' => 'checked',
		'choices' => array(
			'on' => __('ON ','acya-empire'),
			'off' => __('OFF','acya-empire'),
		),
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_animate_css]', array(
		'default' => 'on',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_animate_css]', array(
		'priority' =>15,
		'label' => __('Animation Options', 'acya-empire'),
		'section' => 'acyaempire_layout_options',
		'settings' => 'acyaempire_theme_options[acyaempire_animate_css]',
		'type' => 'select',
		'checked' => 'checked',
		'choices' => array(
			'on' => __('ON ','acya-empire'),
			'off' => __('OFF','acya-empire'),
		),
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_sidebar_layout_options]', array(
		'default' => 'right',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_sidebar_layout_options]', array(
		'priority' =>20,
		'label' => __('Sidebar Layout Options', 'acya-empire'),
		'section' => 'acyaempire_layout_options',
		'settings' => 'acyaempire_theme_options[acyaempire_sidebar_layout_options]',
		'type' => 'select',
		'checked' => 'checked',
		'choices' => array(
			'right' => __('Right Sidebar','acya-empire'),
			'left' => __('Left Sidebar','acya-empire'),
			'nosidebar' => __('No Sidebar','acya-empire'),
			'fullwidth' => __('Full Width','acya-empire'),
		),
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_blog_layout_temp]', array(
		'default' => 'large_image_display',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_blog_layout_temp]', array(
		'priority' =>30,
		'label' => __('Blog Image Display Layout', 'acya-empire'),
		'section'    => 'acyaempire_layout_options',
		'settings'	=> 'acyaempire_theme_options[acyaempire_blog_layout_temp]',
		'type' => 'select',
		'checked' => 'checked',
		'choices' => array(
			'large_image_display' => __('Blog large image display','acya-empire'),
			'medium_image_display' => __('Blog medium image display','acya-empire'),
		),
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_entry_format_blog]', array(
		'default' => 'show',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_entry_format_blog]', array(
		'priority'=>40,
		'label' => __('Disable Entry Format from Blog Page', 'acya-empire'),
		'section' => 'acyaempire_layout_options',
		'settings' => 'acyaempire_theme_options[acyaempire_entry_format_blog]',
		'type' => 'select',
		'choices' => array(
		'show' => __('Display Entry Format','acya-empire'),
		'hide' => __('Hide Entry Format','acya-empire'),
		'show-button' => __('Show Button Only','acya-empire'),
		'hide-button' => __('Hide Button Only','acya-empire'),
	),
	));
	$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_entry_meta_blog]', array(
		'default' => 'show-meta',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_entry_meta_blog]', array(
		'priority'=>45,
		'label' => __('Disable Entry Meta from Blog Page', 'acya-empire'),
		'section' => 'acyaempire_layout_options',
		'settings' => 'acyaempire_theme_options[acyaempire_entry_meta_blog]',
		'type' => 'select',
		'choices' => array(
		'show-meta' => __('Display Entry Meta','acya-empire'),
		'hide-meta' => __('Hide Entry Meta','acya-empire'),
	),
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_design_layout]', array(
		'default'        => 'wide-layout',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type'                  => 'option',
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_design_layout]', array(
	'priority'  =>50,
	'label'      => __('Design Layout', 'acya-empire'),
	'section'    => 'acyaempire_layout_options',
	'settings'  => 'acyaempire_theme_options[acyaempire_design_layout]',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'wide-layout' => __('Full Width Layout','acya-empire'),
		'boxed-layout' => __('Boxed Layout','acya-empire'),
		'small-boxed-layout' => __('Small Boxed Layout','acya-empire'),
	),
	));
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_blog_header_display]', array(
		'default'        => 'show',
		'sanitize_callback' => 'acyaempire_sanitize_select',
		'type'                  => 'option',
	));
	$wp_customize->add_control('acyaempire_theme_options[acyaempire_blog_header_display]', array(
	'priority'  =>50,
	'label'      => __('Design Layout', 'acya-empire'),
	'section'    => 'acyaempire_layout_options',
	'settings'  => 'acyaempire_theme_options[acyaempire_blog_header_display]',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'show' => __('Show Blog Header','acya-empire'),
		'hide' => __('Hide Blog Header','acya-empire'),
	),
	));
?>