<?php
/**
 * The sidebar containing the main Sidebar area.
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
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

<aside id="secondary">
<?php }
}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<aside id="secondary">
  <?php }
	}?>
  <?php 
	if( 'default' == $layout ) { //Settings from customizer
		if(($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'nosidebar') && ($acyaempire_settings['acyaempire_sidebar_layout_options'] != 'fullwidth')): ?>
  <?php dynamic_sidebar( 'acyaempire_main_sidebar' ); ?>
</aside> <!-- #secondary -->
<?php endif;
	}else{ // for page/post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){
			dynamic_sidebar( 'acyaempire_main_sidebar' );
			echo '</aside><!-- #secondary -->';
		}
	}
?>