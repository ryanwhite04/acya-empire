<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
/******************** FREESIAEMPIRE FRONTPAGE  *********************************************/
$acyaempire_settings = acyaempire_get_theme_options();
$wp_customize->add_section( 'acyaempire_frontpage_features', array(
	'title' => __('Display FrontPage Features','acya-empire'),
	'priority' => 400,
	'panel' =>'acyaempire_options_panel'
));
$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_disable_features]', array(
	'default' => 0,
	'sanitize_callback' => 'acyaempire_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_disable_features]', array(
	'priority' => 405,
	'label' => __('Disable in Front Page', 'acya-empire'),
	'section' => 'acyaempire_frontpage_features',
	'settings' => 'acyaempire_theme_options[acyaempire_disable_features]',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_features_title]', array(
	'default' => '',
	'sanitize_callback' => 'esc_textarea',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_features_title]', array(
	'priority' => 412,
	'label' => __( 'Title', 'acya-empire' ),
	'section' => 'acyaempire_frontpage_features',
	'settings' => 'acyaempire_theme_options[acyaempire_features_title]',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'acyaempire_theme_options[acyaempire_features_description]', array(
	'default' => '',
	'sanitize_callback' => 'esc_textarea',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_features_description]', array(
	'priority' => 415,
	'label' => __( 'Description', 'acya-empire' ),
	'section' => 'acyaempire_frontpage_features',
	'settings' => 'acyaempire_theme_options[acyaempire_features_description]',
	'type' => 'textarea',
	)
);
for ( $i=1; $i <= $acyaempire_settings['acyaempire_total_features'] ; $i++ ) {
	$wp_customize->add_setting('acyaempire_theme_options[acyaempire_frontpage_features_'. $i .']', array(
		'default' =>'',
		'sanitize_callback' =>'acyaempire_sanitize_page',
		'type' => 'option',
		'capability' => 'manage_options'
	));
	$wp_customize->add_control( 'acyaempire_theme_options[acyaempire_frontpage_features_'. $i .']', array(
		'priority' => 420 . $i,
		'label' => __(' Feature #', 'acya-empire') . ' ' . $i ,
		'section' => 'acyaempire_frontpage_features',
		'settings' => 'acyaempire_theme_options[acyaempire_frontpage_features_'. $i .']',
		'type' => 'dropdown-pages',
	));
}
?>