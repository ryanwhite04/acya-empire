<?php
/**
 * The template for displaying all single posts.
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
	<main id="main" class="site-main clearfix">
	<?php global $acyaempire_settings;
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
			<?php $format = get_post_format(); ?>
			<article <?php post_class('post-format'.' format-'.$format); ?><?php  ?> id="post-<?php the_ID(); ?>">
				<?php $featured_image_display = $acyaempire_settings['acyaempire_single_post_image'];
					if($featured_image_display == 'on'):
						if( has_post_thumbnail() ) { ?>
							<figure class="post-featured-image">
								<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							</figure><!-- end.post-featured-image  -->
						<?php }
					endif; ?>
				<header class="entry-header">
				<?php $entry_format_meta_blog = $acyaempire_settings['acyaempire_entry_meta_blog'];
				if($entry_format_meta_blog == 'show-meta' ){?>
					<div class="entry-meta">
						<?php	
							if ( current_theme_supports( 'post-formats', $format ) ) {
								printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
								sprintf( ''),
								esc_url( get_post_format_link( $format ) ),
								get_post_format_string( $format )
								);
							} ?>
						<span class="author vcard"><?php _e('Author :','acya-empire')?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>">
						<?php the_author(); ?> </a></span> <span class="posted-on"><?php _e('Date  :','acya-empire')?><a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
						<?php the_time( get_option( 'date_format' ) ); ?> </a></span>
						<?php if ( comments_open() ) { ?>
						<span class="comments"><?php _e('Comment  :','acya-empire')?>
							<?php comments_popup_link( __( 'No Comments', 'acya-empire' ), __( '1 Comment', 'acya-empire' ), __( '% Comments', 'acya-empire' ), '', __( 'Comments Off', 'acya-empire' ) ); ?>
						</span>
						<?php } ?>
					</div> <!-- .entry-meta -->
				<?php } ?>
				</header> <!-- .entry-header -->
				<div class="entry-content">
				<?php the_content();
					wp_link_pages( array( 
						'before'			=> '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'acya-empire' ),
						'after'			=> '</div>',
						'link_before'	=> '<span>',
						'link_after'	=> '</span>',
						'pagelink'		=> '%',
						'echo'			=> 1
					) ); ?>
				</div> <!-- .end entry-content -->
				<?php if( is_single() ) {
					$tag_list = get_the_tag_list( '', __( ' ', 'acya-empire' ) );
					$disable_entry_format = $acyaempire_settings['acyaempire_entry_format_blog'];
					if($disable_entry_format =='show' || $disable_entry_format =='show-button' || $disable_entry_format =='hide-button'){ ?>
					<footer class="entry-footer"> <span class="cat-links">
						<?php _e('Category : ','acya-empire');  the_category(', '); ?> </span> <!-- .cat-links -->
						<?php $tag_list = get_the_tag_list( '', __( ', ', 'acya-empire' ) );
							if(!empty($tag_list)){ ?>
							<span class="tag-links">  <?php   echo $tag_list; ?> </span> <!-- .tag-links -->
							<?php } ?>
					</footer> <!-- .entry-meta -->
					<?php }
				} ?>
			</article>
	<?php }
		}
	else { ?>
	<h1 class="entry-title"> <?php _e( 'No Posts Found.', 'acya-empire' ); ?> </h1>
	<?php } ?>
	</main> <!-- #main -->
	<?php 
	 if ( is_single() ) {
		if( is_attachment() ) { ?>
		<ul class="default-wp-page clearfix">
			<li class="previous"> <?php previous_image_link( false, __( '&larr; Previous', 'acya-empire' ) ); ?> </li>
			<li class="next">  <?php next_image_link( false, __( 'Next &rarr;', 'acya-empire' ) ); ?> </li>
		</ul>
		<?php } else { ?>
		<ul class="default-wp-page clearfix">
			<li class="previous"> <?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'acya-empire' ) . '</span> %title' ); ?> </li>
			<li class="next"> <?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'acya-empire' ) . '</span>' ); ?> </li>
		</ul>
			<?php }
					}
	comments_template();
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