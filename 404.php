<?php
/**
 * The template for displaying 404 pages
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
<div class="site-content" role="main">
	<article id="post-0" class="post error404 not-found">
		<?php if ( is_active_sidebar( 'acyaempire_404_page' ) ) :
			dynamic_sidebar( 'acyaempire_404_page' );
		else:?>
		<section class="error-404 not-found">
			<header class="page-header">
				<h2 class="page-title"> <?php _e( 'Oops! That page can&rsquo;t be found.', 'acya-empire' ); ?> </h2>
			</header> <!-- .page-header -->
			<div class="page-content">
				<p> <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'acya-empire' ); ?> </p>
					<?php get_search_form(); ?>
			</div> <!-- .page-content -->
		</section> <!-- .error-404 -->
	<?php endif; ?>
	</article> <!-- #post-0 .post .error404 .not-found -->
</div> <!-- #content .site-content -->
<?php 
if( 'default' == $layout ) { //Settings from customizer
	if(($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'nosidebar') && ($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}
get_sidebar();
get_footer(); ?>