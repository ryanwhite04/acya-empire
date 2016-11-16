<?php
/**
 * Custom functions
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */

/********************* acyaempire RESPONSIVE AND CUSTOM CSS OPTIONS ***********************************/
function acyaempire_resp_and_custom_css() {
	$acyaempire_settings = acyaempire_get_theme_options();
	if( $acyaempire_settings['acyaempire_responsive'] == 'on' ) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php } else{ ?>
	<meta name="viewport" content="width=1070" />
	<?php  }
	if (!empty($acyaempire_settings['acyaempire_custom_css'] ) ){
		$acyaempire_internal_css = '<!-- Custom CSS -->'."\n";
		$acyaempire_internal_css .= '<style type="text/css" media="screen">'."\n";
		if (!empty($acyaempire_settings['acyaempire_custom_css']) ) {
			$acyaempire_internal_css .= $acyaempire_settings['acyaempire_custom_css']."\n";
		}
		$acyaempire_internal_css .= '</style>'."\n";
	}
	if (isset($acyaempire_internal_css)) {
		echo $acyaempire_internal_css;
	}
}
add_filter( 'wp_head', 'acyaempire_resp_and_custom_css');

/******************************** EXCERPT LENGTH *********************************/
function acyaempire_acyaempire_excerpt_length($length) {
	$acyaempire_settings = acyaempire_get_theme_options();
	$acyaempire_excerpt_length = $acyaempire_settings['acyaempire_excerpt_length'];
	return absint($acyaempire_excerpt_length);// this will return 65 words in the excerpt
}
add_filter('excerpt_length', 'acyaempire_acyaempire_excerpt_length');

/********************* CONTINUE READING LINKS FOR EXCERPT *********************************/
function acyaempire_continue_reading() {
	 return '&hellip; ';
}
add_filter('excerpt_more', 'acyaempire_continue_reading');

/***************** USED CLASS FOR BODY TAGS ******************************/
function acyaempire_body_class($classes) {
	global $acyaempire_site_layout, $acyaempire_content_layout, $post;
	$acyaempire_settings = acyaempire_get_theme_options();
	if ($post) {
		$layout = get_post_meta($post->ID, 'acyaempire_sidebarlayout', true);
	}
	$acyaempire_site_layout = $acyaempire_settings['acyaempire_design_layout'];
	$acyaempire_blog_layout_temp = $acyaempire_settings['acyaempire_blog_layout_temp'];
	$acyaempire_content_layout = $acyaempire_settings['acyaempire_sidebar_layout_options'];
	if (empty($layout) || is_archive() || is_search() || is_home()) {
		$layout = 'default';
	}
	if(!is_page_template('page-templates/acyaempire-corporate.php')) {
		if ('default' == $layout) {
			$themeoption_layout = $acyaempire_content_layout;
			if ('left' == $themeoption_layout) {
				$classes[] = 'left-sidebar-layout';
			} elseif ('right' == $themeoption_layout) {
				$classes[] = '';
			} elseif ('fullwidth' == $themeoption_layout) {
				$classes[] = 'full-width-layout';
			} elseif ('nosidebar' == $themeoption_layout) {
				$classes[] = 'no-sidebar-layout';
			}
		} elseif ('left-sidebar' == $layout) {
			$classes[] = 'left-sidebar-layout';
		} elseif ('right-sidebar' == $layout) {
			$classes[] = '';//css blank
		} elseif ('full-width' == $layout) {
			$classes[] = 'full-width-layout';
		} elseif ('no-sidebar' == $layout) {
			$classes[] = 'no-sidebar-layout';
		}
		if($acyaempire_blog_layout_temp == 'large_image_display'){
			$classes[] = "blog-large";
		}elseif ($acyaempire_blog_layout_temp == 'medium_image_display'){
			$classes[] = "small_image_blog";
		}
	}
	if (!is_page_template('page-templates/acyaempire-corporate.php') && !is_page_template('alter-front-page-template.php') ){
		$classes[] = '';
	}elseif (is_page_template('page-templates/acyaempire-corporate.php')) {
		$classes[] = 'tf-business-template';
		$classes[] = 'page-template-default';
	}
	if (is_page_template('page-templates/page-template-contact.php')) {
			$classes[] = 'contact';
	}
	if ($acyaempire_site_layout =='boxed-layout') {
		$classes[] = 'boxed-layout';
	}
	if ($acyaempire_site_layout =='small-boxed-layout') {
		$classes[] = 'boxed-layout-small';
	}
	return $classes;
}
add_filter('body_class', 'acyaempire_body_class');

/********************** SCRIPTS FOR DONATE/ UPGRADE BUTTON ******************************/
function acyaempire_customize_scripts() {
	if(!class_exists('ACYA_Empire_Plus_Features')){
	wp_enqueue_script( 'acyaempire_customizer_custom', get_template_directory_uri() . '/inc/js/customizer-custom-scripts.js', array( 'jquery' ), '20140108', true );

	$acyaempire_upgrade_links = array(
							'upgrade_link'              => esc_url('http://themeacya.com/themes/acya-empire'),
							'upgrade_text'              => __( 'Upgrade to Pro', 'acya-empire' ),
							);
		wp_localize_script( 'acyaempire_customizer_custom', 'acyaempire_upgrade_links', $acyaempire_upgrade_links );
		wp_enqueue_script( 'acyaempire_customizer_custom' );
	wp_enqueue_style( 'acyaempire_customizer_custom', get_template_directory_uri() . '/inc/js/acyaempire-customizer.css');wp_enqueue_script( 'acyaempire_customizer_custom' );
}
}
add_action( 'customize_controls_print_scripts', 'acyaempire_customize_scripts');
/***************************** wp_enqueue_script ********* *******************/
function acyaempire_jquery_javascript_file($hook) {
	if( $hook != 'widgets.php' )
	return;
	wp_enqueue_script( 'acyaempire-script', get_template_directory_uri() . '/inc/js/acya-empire-image-upload.js');
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'acyaempire_jquery_javascript_file' );

/**************************** SOCIAL MENU *********************************************/
function acyaempire_social_links() {
	if ( has_nav_menu( 'social-link' ) ) : ?>
	<div class="social-links clearfix">
	<?php
		wp_nav_menu( array(
			'container' 	=> '',
			'theme_location' => 'social-link',
			'depth'          => 1,
			'items_wrap'      => '<ul>%3$s</ul>',
			'link_before'    => '<span class="screen-reader-text">',
			'link_after'     => '</span>',
		) );
	?>
	</div><!-- end .social-links -->
	<?php endif;
}
add_action ('social_links', 'acyaempire_social_links');

/******************* DISPLAY BREADCRUMBS ******************************/
function acyaempire_breadcrumb() {
	if (function_exists('bcn_display')) { ?>
		<div class="breadcrumb home">
			<?php bcn_display(); ?>
		</div> <!-- .breadcrumb -->
	<?php }
}

/*********************** acyaempire PAGE SLIDERS ***********************************/
function acyaempire_page_sliders() {
	$acyaempire_settings = acyaempire_get_theme_options();
	$excerpt = get_the_excerpt();
	global $acyaempire_excerpt_length;
	global $post;
	$acyaempire_page_sliders_display = '';
	$acyaempire_total_page_no 		= 0;
	$acyaempire_list_page				= array();
	for( $i = 1; $i <= $acyaempire_settings['acyaempire_slider_no']; $i++ ){
		if( isset ( $acyaempire_settings['acyaempire_featured_page_slider_' . $i] ) && $acyaempire_settings['acyaempire_featured_page_slider_' . $i] > 0 ){
			$acyaempire_total_page_no++;
			$acyaempire_list_page	=	array_merge( $acyaempire_list_page, array( esc_attr($acyaempire_settings['acyaempire_featured_page_slider_' . $i] )) );
		}
	}
		if ( !empty( $acyaempire_list_page ) && $acyaempire_total_page_no > 0 ) {
			$acyaempire_page_sliders_display 	.= '<div class="main-slider"> <div class="layer-slider">';
					$get_featured_posts 		= new WP_Query(array( 'posts_per_page'=> $acyaempire_settings['acyaempire_slider_no'], 'post_type' => array('page'), 'post__in' => $acyaempire_list_page, 'orderby' => 'post__in', ));
					$j=1; $i=0;
			while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
			$attachment_id = get_post_thumbnail_id();
			$image_attributes = wp_get_attachment_image_src($attachment_id,'acyaempire_slider_image');
						$i++;
						$title_attribute       	 	 = apply_filters('the_title', get_the_title($post->ID));
						$excerpt               	 	 = substr(get_the_excerpt(), 0 , 160);
						if (1 == $i) {$classes   	 = "slides show-display";} else { $classes = "slides hide-display";}
				$acyaempire_page_sliders_display    	.= '<div class="'.$classes.'">';
				if ($image_attributes) {
					$acyaempire_page_sliders_display 	.= '<div class="image-slider clearfix" title="'.the_title('', '', false).'"' .' style="background-image:url(' ."'" .esc_url($image_attributes[0])."'" .')">';
				}
				if ($title_attribute != '' || $excerpt != '') {
					$acyaempire_page_sliders_display 	.= '<div class="container">';
					if($j == 1){
					$acyaempire_page_sliders_display 	.= '<article class="slider-content clearfix acya-animation fadeInRight">';
					}else{
						$acyaempire_page_sliders_display 	.= '<article class="slider-content clearfix">';
					}

				$remove_link = $acyaempire_settings['acyaempire_slider_link'];
					if($remove_link == 0){
						if ($title_attribute != '') {
							$acyaempire_page_sliders_display .= '<h2 class="slider-title"><a href="'.get_permalink().'" title="'.the_title('', '', false).'" rel="bookmark">'.get_the_title().'</a></h2><!-- .slider-title -->';
						}
					}else{
						$acyaempire_page_sliders_display .= '<h2 class="slider-title">'.get_the_title().'</h2><!-- .slider-title -->';
					}
					if ($excerpt != '') {
						$excerpt_text = $acyaempire_settings['acyaempire_tag_text'];
						$acyaempire_page_sliders_display .= '<div class="slider-text">';
						$acyaempire_page_sliders_display .= '<h3>'.$excerpt.' </h3></div><!-- end .slider-text -->';
						$acyaempire_page_sliders_display .= '<div class="slider-buttons">';
						if($acyaempire_settings['acyaempire_slider_button'] == 0){
							if($excerpt_text == '' || $excerpt_text == 'Read More') :
								$acyaempire_page_sliders_display 	.= '<a title='.'"'.get_the_title(). '"'. ' '.'href="'.get_permalink().'"'.' class="btn-default vivid">'.__('Read More', 'acya-empire').'<span>&#10093;</span></a>';
							else:
							$acyaempire_page_sliders_display 	.= '<a title='.'"'.get_the_title(). '"'. ' '.'href="'.get_permalink().'"'.' class="btn-default vivid">'.$acyaempire_settings[ 'acyaempire_tag_text' ].'<span>&#10093;</span></a>';
							endif;
								}
						$acyaempire_page_sliders_display 	.='</div>';
						}
						$acyaempire_page_sliders_display 	.='</article><!-- end .slider-content --> </div><!-- end .container -->';
				}
				if ($image_attributes) {
					$acyaempire_page_sliders_display 	.='</div><!-- end .image-slider -->';
				}
				$acyaempire_page_sliders_display 	.='</div><!-- end .slides -->';
				$j++;
			endwhile;
			wp_reset_postdata();
			$acyaempire_page_sliders_display .= '</div>	  <!-- end .layer-slider -->
					<a class="slider-prev" id="prev2" href="#">&#10092;</a> <a class="slider-next" id="next2" href="#">&#10093;</a>
  <nav class="slider-button"> </nav>
  <!-- end .slider-button -->
</div>
<!-- end .main-slider -->';
		}
				echo $acyaempire_page_sliders_display;
}

/*************************** ENQUEING STYLES AND SCRIPTS ****************************************/
function acyaempire_scripts() {
	$acyaempire_settings = acyaempire_get_theme_options();
	wp_enqueue_style( 'acyaempire-style', get_stylesheet_uri() );
	wp_enqueue_script('jquery_cycle_all', get_template_directory_uri().'/js/jquery.cycle.all.js', array('jquery'), '3.0.3', true);

	wp_register_style( 'acyaempire_google_fonts', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700' );

	$enable_slider = $acyaempire_settings['acyaempire_enable_slider'];
	$acyaempire_stick_menu = $acyaempire_settings['acyaempire_stick_menu'];
		wp_enqueue_script('acyaempire_slider', get_template_directory_uri().'/js/acyaempire-slider-setting.js', array('jquery_cycle_all'), false, true);
	wp_enqueue_script('acyaempire-main', get_template_directory_uri().'/js/acyaempire-main.js', array('jquery'));
	if($acyaempire_stick_menu != 1):
	wp_enqueue_script('sticky-scroll', get_template_directory_uri().'/js/acyaempire-sticky-scroll.js', array('jquery'));
	endif;
	wp_enqueue_script('acyaempire-quote-slider', get_template_directory_uri().'/js/acyaempire-quote-slider.js', array('jquery'),'4.2.2', true);
	wp_enqueue_style( 'acyaempire_google_fonts' );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Load the html5 shiv.
	wp_enqueue_script( 'acyaempire-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'acyaempire-html5', 'conditional', 'lt IE 9' );
	wp_style_add_data('acyaempire-ie', 'conditional', 'lt IE 9');
	if( $acyaempire_settings['acyaempire_responsive'] == 'on' ) {
		wp_enqueue_style('acyaempire-responsive', get_template_directory_uri().'/css/responsive.css');
	}
	if( $acyaempire_settings['acyaempire_animate_css'] == 'on' ) {
		wp_enqueue_style('acyaempire-animate', get_template_directory_uri().'/assets/wow/css/animate.min.css');
		wp_enqueue_script('wow', get_template_directory_uri().'/assets/wow/js/wow.min.js', array('jquery'));
		wp_enqueue_script('wow-settings', get_template_directory_uri().'/assets/wow/js/wow-settings.js', array('jquery'));
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'acyaempire_scripts' );
?>
