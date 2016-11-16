<?php
/**
 * @package Themeacya
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
?>
<?php
/************************* FREESIAEMPIRE FOOTER DETAILS **************************************/
function acyaempire_site_footer() {
if ( is_active_sidebar( 'acyaempire_footer_options' ) ) :
		dynamic_sidebar( 'acyaempire_footer_options' );
	else:
		echo '<div class="copyright">' .'&copy; ' . date('Y') .' '; ?>
		<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | 
						<?php _e('Designed by:','acya-empire'); ?> <a title="<?php echo esc_attr__( 'Themeacya', 'acya-empire' ); ?>" target="_blank" href="<?php echo esc_url( 'http://themeacya.com' ); ?>"><?php _e('Theme ACYA','acya-empire');?></a> | 
						<?php _e('Powered by:','acya-empire'); ?> <a title="<?php echo esc_attr__( 'WordPress', 'acya-empire' );?>" target="_blank" href="<?php echo esc_url( 'http://wordpress.org' );?>"><?php _e('WordPress','acya-empire'); ?></a>
					</div>
	<?php endif;
}
add_action( 'acyaempire_sitegenerator_footer', 'acyaempire_site_footer');
?>