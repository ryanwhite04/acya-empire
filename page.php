<?php
/**
 * The template for displaying all pages.
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
	}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<div id="primary">
	<?php }
	}?>
	<div id="main">
	<?php
	if( has_post_thumbnail() && $acyaempire_settings['acyaempire_display_page_featured_image']!=0) { ?>
		<figure class="post-featured-image">
			<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
			<?php the_post_thumbnail(); ?>
			</a>
		</figure><!-- end.post-featured-image  -->
	<?php }
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
		<div class="entry-content">
			<?php the_content();
				wp_link_pages( array( 
				'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'acya-empire' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1
				) ); ?>
		</div> <!-- entry-content clearfix-->
		<?php  comments_template(); ?>
	<?php }
	} else { ?>
	<h1 class="entry-title"> <?php _e( 'No Posts Found.', 'acya-empire' ); ?> </h1>
	<?php
	} ?>
	</div> <!-- #main -->
	<?php 
if( 'default' == $layout ) { //Settings from customizer
	if(($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'nosidebar') && ($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}else{ // for page/post
	if(($layout != 'no-sidebar') && ($layout != 'full-width')){
		echo '</div><!-- #primary -->';
	} 
}
get_sidebar();
get_footer(); ?>