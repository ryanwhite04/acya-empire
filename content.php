<?php
/**
 * The template for displaying content.
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
$acyaempire_settings = acyaempire_get_theme_options();
	$format = get_post_format(); ?>
	<article <?php post_class('post-format'.' format-'.$format); ?> id="post-<?php the_ID(); ?>">
	<?php
		$acyaempire_blog_post_image = $acyaempire_settings['acyaempire_blog_post_image'];
				if( has_post_thumbnail() && $acyaempire_blog_post_image == 'on') { ?>
					<figure class="post-featured-image">
						<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
						<?php the_post_thumbnail(); ?>
						</a>
					</figure><!-- end.post-featured-image  -->
				<?php } ?>
		<header class="entry-header">
			<h2 class="entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"> <?php the_title();?> </a> </h2> <!-- end.entry-title -->
		<?php 
			$entry_format_meta_blog = $acyaempire_settings['acyaempire_entry_meta_blog'];
			if($entry_format_meta_blog == 'show-meta' ){?>
			<div class="entry-meta">
			<?php	
				$format = get_post_format();
				if ( current_theme_supports( 'post-formats', $format ) ) {
					printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
						sprintf( ''),
						esc_url( get_post_format_link( $format ) ),
						get_post_format_string( $format )
					);
				} ?>
			<span class="author vcard"><?php _e('Author :','acya-empire')?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>">
						<?php the_author(); ?> </a></span> 
			<span class="posted-on"><?php _e('Date  :','acya-empire')?><a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>"> <?php the_time( get_option( 'date_format' ) ); ?> </a></span>
						<?php if ( comments_open() ) { ?>
			<span class="comments"><?php _e('Comment  :','acya-empire')?>
							<?php comments_popup_link( __( 'No Comments', 'acya-empire' ), __( '1 Comment', 'acya-empire' ), __( '% Comments', 'acya-empire' ), '', __( 'Comments Off', 'acya-empire' ) ); ?> </span>
			<?php } ?>
			</div> <!-- end .entry-meta -->
		<?php } ?>
		</header> <!-- end .entry-header -->
		<div class="entry-content">
			<?php $content_display = $acyaempire_settings['acyaempire_blog_content_layout'];
				if($content_display == 'fullcontent_display'):
					the_content();
				else:
					the_excerpt();
				endif; ?>
		</div> <!-- end .entry-content -->
		<?php 
			$excerpt = get_the_excerpt();
			$content = get_the_content();
			$disable_entry_format = $acyaempire_settings['acyaempire_entry_format_blog'];
			if($disable_entry_format =='show' || $disable_entry_format =='show-button' || $disable_entry_format =='hide-button'){ ?>
		<footer class="entry-footer">
			<?php if($disable_entry_format !='show-button'){ ?>
			<span class="cat-links">
			<?php _e('Category : ','acya-empire');  the_category(', '); ?>
			</span> <!-- end .cat-links -->
			<?php $tag_list = get_the_tag_list( '', __( ', ', 'acya-empire' ) );
				if(!empty($tag_list)){ ?>
				<span class="tag-links">
				<?php   echo $tag_list; ?>
				</span> <!-- end .tag-links -->
				<?php } 
			}
			$acyaempire_tag_text = $acyaempire_settings['acyaempire_tag_text'];
			if(strlen($excerpt) < strlen($content) && $disable_entry_format !='hide-button'){ ?>
			<a class="more-link" title="<?php echo the_title_attribute('echo=0');?>" href="<?php the_permalink();?>">
			<?php
				if($acyaempire_tag_text == 'Read More' || $acyaempire_tag_text == ''):
					_e('Read More', 'acya-empire');
				else:
					echo esc_attr($acyaempire_tag_text);
				endif;?></a>
			<?php } ?>
		</footer> <!-- .entry-meta -->
		<?php
		} ?>
		</article>