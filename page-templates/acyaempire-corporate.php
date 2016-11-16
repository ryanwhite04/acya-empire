<?php
/**
 * Template Name: Corporate Template
 *
 * Displays Corporate template.
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0.5
 */
get_header();
$acyaempire_settings = acyaempire_get_theme_options();
	echo '<div id="main">';
	if($acyaempire_settings['acyaempire_disable_features'] != 1){
		echo '<!-- Our Feature ============================================= -->';
		$acyaempire_features = '';
		$acyaempire_total_page_no = 0; 
		$acyaempire_list_page	= array();
		for( $i = 1; $i <= $acyaempire_settings['acyaempire_total_features']; $i++ ){
			if( isset ( $acyaempire_settings['acyaempire_frontpage_features_' . $i] ) && $acyaempire_settings['acyaempire_frontpage_features_' . $i] > 0 ){
				$acyaempire_total_page_no++;

				$acyaempire_list_page	=	array_merge( $acyaempire_list_page, array( $acyaempire_settings['acyaempire_frontpage_features_' . $i] ) );
			}

		}
		if (( !empty( $acyaempire_list_page ) || !empty($acyaempire_settings['acyaempire_features_title']) || !empty($acyaempire_settings['acyaempire_features_description']) )  && $acyaempire_total_page_no > 0 ) {
				$acyaempire_features 	.= '<section class="our_feature">
						<div class="container clearfix">
							<div class="container_container">';
								$get_featured_posts 		= new WP_Query(array(
								'posts_per_page'      	=> $acyaempire_settings['acyaempire_total_features'],
								'post_type'           	=> array('page'),
								'post__in'            	=> $acyaempire_list_page,
								'orderby'             	=> 'post__in',
							));
				if($acyaempire_settings['acyaempire_features_title'] != ''){
					$acyaempire_features .= '<h2 class="acya-animation fadeInUp">'. esc_attr($acyaempire_settings['acyaempire_features_title']).'</h2>';
				}
				if($acyaempire_settings['acyaempire_features_description'] != ''){
					$acyaempire_features .= '<p class="feature-sub-title acya-animation fadeInUp">'. esc_attr($acyaempire_settings['acyaempire_features_description']).'</p>';
				}
					$acyaempire_features .= '<div class="column clearfix">';
				$j = 1;
				while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
				$attachment_id = get_post_thumbnail_id();
				$image_attributes = wp_get_attachment_image_src($attachment_id,'full');
							$title_attribute       	 	 = apply_filters('the_title', get_the_title($post->ID));
							$excerpt               	 	 = get_the_excerpt();
					if( $j % 3 == 1 && $j >= 1 ) {
						$delay_value = "0.1s";
					}
					elseif ( $j % 3 == 2 && $j >= 1 ) {
						$delay_value = "0.2s";
					}	
					else {
						$delay_value = "0.3s";
					}
					$acyaempire_features .= '<div class="three-column acya-animation fadeInLeft" data-wow-delay="'.$delay_value .'">
					<div class="feature-content">';
					if ($image_attributes) {
						$acyaempire_features 	.= '<a class="feature-icon" href="'.get_permalink().'" title="'.the_title('', '', false).'"' .' alt="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'thumbnail').'</a>';
					}
					$acyaempire_features 	.= '<article>';
					if ($title_attribute != '') {
								$acyaempire_features .= '<h3 class="feature-title"><a href="'.get_permalink().'" title="'.the_title('', '', false).'" rel="bookmark">'.get_the_title().'</a></h3>';
					}
					if ($excerpt != '') {
						$excerpt_text = $acyaempire_settings['acyaempire_tag_text'];
						$excerpt_length = substr(get_the_excerpt(), 0 , 85);
						$acyaempire_features .= '<p>'.$excerpt_length.' </p>';
					}
					$acyaempire_features 	.= '</article>';
					$excerpt = get_the_excerpt();
					$content = get_the_content();
					if(strlen($excerpt) < strlen($content)){
						$excerpt_text = $acyaempire_settings['acyaempire_tag_text'];
						if($excerpt_text == '' || $excerpt_text == 'Read More') :
							$acyaempire_features 	.= '<a title='.'"'.get_the_title(). '"'. ' '.'href="'.get_permalink().'"'.' class="more-link">'.__('Read More', 'acya-empire').'</a>';
						else:
						$acyaempire_features 	.= '<a title='.'"'.get_the_title(). '"'. ' '.'href="'.get_permalink().'"'.' class="more-link">'.$acyaempire_settings[ 'acyaempire_tag_text' ].'</a>';
						endif;
					}
					$acyaempire_features 	.='</div> <!-- end .feature-content -->
					</div><!-- end .three-column -->';
					$j++;
					endwhile;
					$acyaempire_features 	.='</div><!-- .end column-->';
					$acyaempire_features 	.='</div><!-- end .container_container -->';
					$acyaempire_features 	.='</div><!-- .container -->
					</section><!-- end .our_feature -->';
				}
		echo $acyaempire_features;
	}
		wp_reset_postdata();
   if( is_active_sidebar( 'acyaempire_corporate_page_sidebar' ) ) {
			dynamic_sidebar( 'acyaempire_corporate_page_sidebar' );
	} ?>
</div>
<!-- end #main -->
<?php get_footer(); ?>