<?php
/**
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
/****************** FREESIAEMPIRE POST WIDGETS **************************************/
  class acyaempire_post_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'widget_latest_blog', 'description' => __('Displays Blog Widgets on FrontPage', 'acya-empire'));
		$control_ops = array('width'     => 200, 'height'     => 250);
		parent::__construct(false, $name = __('TF: FP Blog Widget', 'acya-empire'), $widget_ops, $control_ops);
	}
	function form($instance) {
		$instance = wp_parse_args(( array ) $instance, array('title' => '','description' => '','number' => '4','post_type'=> 'latest','category' => '', 'checkbox' => ''));
		$checkbox = esc_attr($instance['checkbox']); 
		$title    = esc_attr($instance['title']);
		$description    = esc_attr($instance['description']);
		$number = absint( $instance[ 'number' ] );
		$post_type = $instance[ 'post_type' ];
		$category = $instance[ 'category' ];
		?>
				<p>
			<input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?>/>
			<label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Check to hide entry format','acya-empire'); ?></label>
		</p>
				<p>
				<label for="<?php echo $this->get_field_id('title');?>">
		<?php _e('Title:', 'acya-empire');?>
				</label>
				<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
				</p>
				<p>
			<label for="<?php echo $this->get_field_id('description');?>">
				<?php _e('Description:', 'acya-empire');?>
			</label>
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('description');?>" name="<?php echo $this->get_field_name('description');?>"><?php echo stripslashes( wp_filter_post_kses( addslashes ($description)));
	?></textarea></p>
				<p>
				<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e( 'Number of Post:', 'acya-empire' ); ?>
				</label>
				<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
				</p>
				<p><input type="radio" <?php checked($post_type, 'latest') ?> id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>"
				 value="latest"/><?php _e( 'Show latest Posts', 'acya-empire' );?><br />  
		 <input type="radio" <?php checked($post_type,'category') ?> id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'acya-empire' );?><br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'acya-empire' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>
		</p>
		<?php
	}
	function update($new_instance, $old_instance) {

		$instance  = $old_instance;
		$instance['description'] = strip_tags($new_instance['description']);
		$instance['checkbox'] = strip_tags($new_instance['checkbox']);
		$instance['title'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['title']) ) );
		$instance[ 'number' ] = absint( $new_instance[ 'number' ] );
		$instance[ 'post_type' ] = $new_instance[ 'post_type' ];
		$instance[ 'category' ] = $new_instance[ 'category' ];
		return $instance;
	}
	function widget($args, $instance) {
		global $acyaempire_settings;
		extract($args);
		extract($instance);
		$checkbox    = esc_attr('checkbox', empty($instance['checkbox'])?'':$instance['checkbox'], $instance);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$description = isset( $instance[ 'description' ] ) ? $instance[ 'description' ] : '';
		$number = empty( $instance[ 'number' ] ) ? 4 : $instance[ 'number' ];
		$post_type = isset( $instance[ 'post_type' ] ) ? $instance[ 'post_type' ] : 'latest' ;
		$category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

		if( $post_type == 'latest' ) {
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' 			=> $number,
				'post_type'					=> 'post',
				'ignore_sticky_posts' 	=> true
			) );
		}
		else {
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' 			=> $number,
				'post_type'					=> 'post',
				'category__in'				=> $category
			) );
		}
		echo '<!-- Latest Blog Widget ============================================= -->' .$before_widget;
		?>
				<div class="container clearfix">
				<?php
				if ( !empty( $title ) || !empty( $description ) ) {
				echo '<h2 class="widget-title acya-animation fadeInDown" data-wow-delay="1s">' . esc_html( $title ) . '</h2>'; ?>
				<p class="latest-blog-sub-title acya-animation fadeInDown" data-wow-delay="1s"><?php echo esc_textarea( $description ); ?></p>
				<?php } ?>
					<div class="column clearfix">
			<?php
 			$i=1;
 			while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post(); ?>
				<div class="two-column">
						<?php
							$format = get_post_format();
							if($format != ''){ ?>
							<article class="format-<?php echo $format; ?>">
							<?php
							}
								if( has_post_thumbnail() ) { ?>
								<div class="blog-img acya-animation fadeInDown" data-wow-delay="0.3s">
								<?php the_post_thumbnail(); ?>
									<div class="blog-overlay">
										<a href="<?php the_permalink(); ?>">
											<span class="ico-link"></span>
										</a>
									</div><!-- end.blog-overlay -->
								</div><!-- end.blog-img -->
								<?php } ?>
								<div class="blog-content acya-animation fadeInUp" data-wow-delay="0.3s">
									<header class="entry-header">
											<h3 class="entry-title"><a rel="bookmark" href="<?php the_permalink();?>"><?php the_title(); ?> </a></h3>
									<?php if ( $checkbox != '' ) { ?>
									<div class="entry-meta clearfix">
									<?php if ( current_theme_supports( 'post-formats', $format ) ) {
										printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
											sprintf(''),
											esc_url( get_post_format_link( $format ) ),
											get_post_format_string( $format ) );
										} ?> 
									<span class="author vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>

										<span class="posted-on"><a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
									</div>  <!-- end .entry-meta -->
									<?php } ?>
									</header><!-- end.entry-header -->
									<div class="entry-content"><p><?php echo substr(get_the_excerpt(), 0 , 120); ?> </p>
									<?php $acyaempire_tag_text = $acyaempire_settings['acyaempire_tag_text'];
									$excerpt = get_the_excerpt();
									$content = get_the_content();
									if(strlen($excerpt) < strlen($content)){ ?>
										<a class="more-link" title="<?php the_title_attribute();?>" href="<?php the_permalink();?>">
											<?php
											if($acyaempire_tag_text == 'Read More' || $acyaempire_tag_text == ''):
												_e('Read More', 'acya-empire');
											else:
												echo esc_attr($acyaempire_tag_text);
											endif;?>
										</a>
									<?php } ?>
									</div> <!-- end .entry-content -->
								</div> <!-- end .blog-content -->
							<?php if($format != ''){ ?>
						</article>
						<?php } ?>
					</div> <!-- end .two-column -->
				<?php $i++;
			endwhile;
			// Reset Post Data
			wp_reset_postdata(); 
			echo '</div> <!-- end .column -->';
			echo '</div> <!-- end .container -->';?>
		<?php echo $after_widget .'<!-- end .widget_latest_blog -->';
	}
}
?>