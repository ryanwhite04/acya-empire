<?php
/**
 * The template for displaying search results.
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
	<div id="main">
	<?php
	if( have_posts() ) {
		while( have_posts() ) {
			the_post();
			get_template_part( 'content', get_post_format() );
		}
	}
	else { ?>
	<h2 class="entry-title">
		<?php get_search_form(); ?>
		<p>&nbsp; </p>
		<?php _e( 'No Posts Found.', 'acya-empire' ); ?>
	</h2>
	<?php
	} ?>
	</div> <!-- #content -->
	<?php get_template_part( 'navigation', 'none' );
if( 'default' == $layout ) { //Settings from customizer
	if(($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'nosidebar') && ($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}
get_sidebar();
get_footer(); ?>