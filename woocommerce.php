<?php
/**
 * This template to displays woocommerce page
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */

get_header();
	$acyaempire_settings = acyaempire_get_theme_options();
	global $acyaempire_content_layout;
	if( $post ) {
		$layout = get_post_meta( $post->ID, 'acyaempire_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}
	if( 'default' == $layout ) { //Settings from customizer
		if(($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'nosidebar') && ($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'fullwidth')){ ?>

<div id="primary">
	<?php }
	}?>
	<main id="main" class="site-main clearfix">
		<?php woocommerce_content(); ?>
	</main> <!-- #main -->
	<?php 
	if( 'default' == $layout ) { //Settings from customizer
		if(($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'nosidebar') && ($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}?>
<?php 
if( 'default' == $layout ) { //Settings from customizer
	if(($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'nosidebar') && ($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'fullwidth')){ ?>
<aside id="secondary">
	<?php }
} 
	if( 'default' == $layout ) { //Settings from customizer
		if(($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'nosidebar') && ($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'fullwidth')): ?>
		<?php dynamic_sidebar( 'acyaempire_woocommerce_sidebar' ); ?>
</aside> <!-- #secondary -->
<?php endif;
	}
get_footer(); ?>