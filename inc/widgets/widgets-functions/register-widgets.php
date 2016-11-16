<?php
/**
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
/**************** FREESIAEMPIRE REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'acyaempire_widgets_init');
function acyaempire_widgets_init() {
	register_widget( "acyaempire_contact_widgets" );
	register_widget("acyaempire_post_widget");
	register_widget("acyaempire_widget_testimonial" );
	register_widget("acyaempire_portfolio_widget");

	register_sidebar(array(
			'name' => __('Main Sidebar', 'acya-empire'),
			'id' => 'acyaempire_main_sidebar',
			'description' => __('Shows widgets at Main Sidebar.', 'acya-empire'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Display Contact Info at Header ', 'acya-empire'),
			'id' => 'acyaempire_header_info',
			'description' => __('Shows widgets on all page.', 'acya-empire'),
			'before_widget' => '<div id="%1$s" class="info clearfix">',
			'after_widget' => '</div>',
		));

	register_sidebar(array(
			'name' => __('Front Page Section', 'acya-empire'),
			'id' => 'acyaempire_corporate_page_sidebar',
			'description' => __('Shows widgets on Front Page. You may use some of this widgets: TF: Featured Recent Work, TF: Testimonial, TF: Slogan', 'acya-empire'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Contact Page Sidebar', 'acya-empire'),
			'id' => 'acyaempire_contact_page_sidebar',
			'description' => __('Shows widgets on Contact Page Template.', 'acya-empire'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Shortcode For Contact Page', 'acya-empire'),
			'id' => 'acyaempire_form_for_contact_page',
			'description' => __('Add Contact Form 7 Shortcode using text widgets Ex: [contact-form-7 id="137" title="Contact form 1"]', 'acya-empire'),
			'before_widget' => '<div id="A%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	global $acyaempire_settings;
	$acyaempire_settings = wp_parse_args( get_option( 'acyaempire_theme_options', array() ), acyaempire_get_option_defaults_values() );
	for($i =1; $i<= $acyaempire_settings['acyaempire_footer_column_section']; $i++){
	register_sidebar(array(
			'name' => __('Footer Column ', 'acya-empire') . $i,
			'id' => 'acyaempire_footer_'.$i,
			'description' => __('Shows widgets at Footer Column ', 'acya-empire').$i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	}
	register_sidebar(array(
			'name' => __('WooCommerce Sidebar', 'acya-empire'),
			'id' => 'acyaempire_woocommerce_sidebar',
			'description' => __('Add WooCommerce Widgets Only', 'acya-empire'),
			'before_widget' => '<div id="A%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
}
?>