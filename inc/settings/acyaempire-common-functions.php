<?php
/**
 * Custom functions
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */

/****************** acyaempire DISPLAY COMMENT NAVIGATION *******************************/
function acyaempire_comment_nav() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'acya-empire' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'acya-empire' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;
				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'acya-empire' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
/******************** Remove div and replace with ul**************************************/
add_filter('wp_page_menu', 'acyaempire_wp_page_menu');
function acyaempire_wp_page_menu($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass   = $matches[1];
	$replace    = array('<div class="'.$divclass.'">', '</div>');
	$new_markup = str_replace($replace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
	return $new_markup;
}
/*******************************acyaempire MetaBox *********************************************************/
global $acyaempire_layout_options;
$acyaempire_layout_options = array(
'default-sidebar'=> array(
						'id'			=> 'acyaempire_sidebarlayout',
						'value' 		=> 'default',
						'label' 		=> __( 'Default Layout Set in', 'acya-empire' ).' '.'<a href="'.wp_customize_url() .'?autofocus[section]=acyaempire_layout_options" target="_blank">'.__( 'Customizer', 'acya-empire' ).'</a>',
						'thumbnail' => ' '
					),
	'no-sidebar' 	=> array(
							'id'			=> 'acyaempire_sidebarlayout',
							'value' 		=> 'no-sidebar',
							'label' 		=> __( 'No sidebar Layout', 'acya-empire' )
						),
	'full-width' => array(
									'id'			=> 'acyaempire_sidebarlayout',
									'value' 		=> 'full-width',
									'label' 		=> __( 'Full Width Layout', 'acya-empire' )
								),
	'left-sidebar' => array(
							'id'			=> 'acyaempire_sidebarlayout',
							'value' 		=> 'left-sidebar',
							'label' 		=> __( 'Left sidebar Layout', 'acya-empire' )
						),
	'right-sidebar' => array(
							'id' 			=> 'acyaempire_sidebarlayout',
							'value' 		=> 'right-sidebar',
							'label' 		=> __( 'Right sidebar Layout', 'acya-empire' )
						)
			);
/*************************** Add Custom Box **********************************/
function acyaempire_add_custom_box() {
	add_meta_box(
		'siderbar-layout',
		__( 'Select layout for this specific Page only', 'acya-empire' ),
		'acyaempire_layout_options',
		'page', 'side', 'default'
	);
	add_meta_box(
		'siderbar-layout',
		__( 'Select layout for this specific Post only', 'acya-empire' ),
		'acyaempire_layout_options',
		'post','side', 'default'
	);
}
add_action( 'add_meta_boxes', 'acyaempire_add_custom_box' );
function acyaempire_layout_options() {
	global $acyaempire_layout_options;
	// Use nonce for verification
	wp_nonce_field( basename( __FILE__ ), 'acyaempire_custom_meta_box_nonce' ); // for security purpose ?>
	<?php
		global $post;
				foreach ($acyaempire_layout_options as $field) {
					$acyaempire_layout_meta = get_post_meta( $post->ID, $field['id'], true );
					if(empty( $acyaempire_layout_meta ) ){
						$acyaempire_layout_meta='default';
					} ?>
				<input type="radio" class ="post-format" name="<?php echo $field['id']; ?>" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $acyaempire_layout_meta ); ?>/>
				&nbsp;&nbsp;<?php echo $field['label']; ?> <br/>
				<?php
				} // end foreach  ?>
<?php }
/******************* Save metabox data **************************************/
add_action('save_post', 'acyaempire_save_custom_meta');
function acyaempire_save_custom_meta( $post_id ) {
	global $acyaempire_layout_options;
	// Verify the nonce before proceeding.
	if ( !isset( $_POST[ 'acyaempire_custom_meta_box_nonce' ] ) || !wp_verify_nonce( $_POST[ 'acyaempire_custom_meta_box_nonce' ], basename( __FILE__ ) ) )
		return;
	// Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
		return;
	if ('page' == $_POST['post_type']) {
		if (!current_user_can( 'edit_page', $post_id ) )
			return $post_id;
	}
	elseif (!current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	foreach ($acyaempire_layout_options as $field) {
		//Execute this saving function
		$old = get_post_meta( $post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // end foreach
}
/***************Pass slider effect  parameters from php files to jquery file ********************/
function acyaempire_slider_value() {
	$acyaempire_settings = acyaempire_get_theme_options();
	$acyaempire_transition_effect   = esc_attr($acyaempire_settings['acyaempire_transition_effect']);
	$acyaempire_transition_delay    = absint($acyaempire_settings['acyaempire_transition_delay'])*1000;
	$acyaempire_transition_duration = absint($acyaempire_settings['acyaempire_transition_duration'])*1000;
	wp_localize_script(
		'acyaempire_slider',
		'acyaempire_slider_value',
		array(
			'transition_effect'   => $acyaempire_transition_effect,
			'transition_delay'    => $acyaempire_transition_delay,
			'transition_duration' => $acyaempire_transition_duration,
		)
	);
}
/**************************** Display Header Title ***********************************/
function acyaempire_header_title() {
	$format = get_post_format();
	if( is_archive() ) {
		if ( is_category() ) :
			$acyaempire_header_title = single_cat_title( '', FALSE );
		elseif ( is_tag() ) :
			$acyaempire_header_title = single_tag_title( '', FALSE );
		elseif ( is_author() ) :
			the_post();
			$acyaempire_header_title =  sprintf( __( 'Author: %s', 'acya-empire' ), '<span class="vcard">' . get_the_author() . '</span>' );
			rewind_posts();
		elseif ( is_day() ) :
			$acyaempire_header_title = sprintf( __( 'Day: %s', 'acya-empire' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) :
			$acyaempire_header_title = sprintf( __( 'Month: %s', 'acya-empire' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif ( is_year() ) :
			$acyaempire_header_title = sprintf( __( 'Year: %s', 'acya-empire' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		elseif ( $format == 'audio' ) :
			$acyaempire_header_title = __( 'Audios', 'acya-empire' );
		elseif ( $format =='aside' ) :
			$acyaempire_header_title = __( 'Asides', 'acya-empire');
		elseif ( $format =='image' ) :
			$acyaempire_header_title = __( 'Images', 'acya-empire' );
		elseif ( $format =='gallery' ) :
			$acyaempire_header_title = __( 'Galleries', 'acya-empire' );
		elseif ( $format =='video' ) :
			$acyaempire_header_title = __( 'Videos', 'acya-empire' );
		elseif ( $format =='status' ) :
			$acyaempire_header_title = __( 'Status', 'acya-empire' );
		elseif ( $format =='quote' ) :
			$acyaempire_header_title = __( 'Quotes', 'acya-empire' );
		elseif ( $format =='link' ) :
			$acyaempire_header_title = __( 'links', 'acya-empire' );
		elseif ( $format =='chat' ) :
			$acyaempire_header_title = __( 'Chats', 'acya-empire' );
		elseif ( class_exists('WooCommerce') && (is_shop() || is_product_category()) ):
  			$acyaempire_header_title = woocommerce_page_title( false );
  		elseif ( class_exists('bbPress') && is_bbpress()) :
  			$acyaempire_header_title = get_the_title();
		else :
			$acyaempire_header_title = __( 'Archives', 'acya-empire' );
		endif;
	} elseif (is_home()){
		$acyaempire_header_title = get_the_title( get_option( 'page_for_posts' ) );
	} elseif (is_404()) {
		$acyaempire_header_title = __('Page NOT Found', 'acya-empire');
	} elseif (is_search()) {
		$acyaempire_header_title = __('Search Results', 'acya-empire');
	} elseif (is_page_template()) {
		$acyaempire_header_title = get_the_title();
	} else {
		$acyaempire_header_title = get_the_title();
	}
	return $acyaempire_header_title;
}

/********************* Header Image ************************************/
function acyaempire_header_image_display(){
	$acyaempire_settings = acyaempire_get_theme_options();
	$acyaempire_header_image = get_header_image();
	$acyaempire_header_image_options = $acyaempire_settings['acyaempire_custom_header_options'];
	if($acyaempire_header_image_options == 'homepage'){
		if(is_front_page() || (is_home() && is_front_page())) :
			if (!empty($acyaempire_header_image)): ?>
			<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php echo esc_url($acyaempire_header_image);?>" class="header-image" width="<?php echo get_custom_header()->width;?>" height="<?php echo get_custom_header()->height;?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"> </a>
			<?php
			endif;
		endif;
	}elseif($acyaempire_header_image_options == 'enitre_site'){
		if (!empty($acyaempire_header_image)):?>
			<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php echo esc_url($acyaempire_header_image);?>" class="header-image" width="<?php echo get_custom_header()->width;?>" height="<?php echo get_custom_header()->height;?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"> </a>
			<?php
			 endif;
	}
}
add_action ('acyaempire_header_image','acyaempire_header_image_display');
/********************* Custom Header setup ************************************/
function acyaempire_custom_header_setup() {
	$args = array(
		'default-text-color'     => '',
		'default-image'          => '',
		'height'                 => apply_filters( 'acyaempire_header_image_height', 400 ),
		'width'                  => apply_filters( 'acyaempire_header_image_width', 2500 ),
		'random-default'         => false,
		'max-width'              => 2500,
		'flex-height'            => true,
		'flex-width'             => true,
		'random-default'         => false,
		'header-text'				 => false,
		'uploads'				 => true,
		'wp-head-callback'       => '',
		'admin-preview-callback' => 'acyaempire_admin_header_image',
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'acyaempire_custom_header_setup' );
?>
