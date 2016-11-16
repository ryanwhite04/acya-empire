<?php
/**
 * Displays the searchform
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<?php
		$acyaempire_settings = acyaempire_get_theme_options();
		$acyaempire_search_form = $acyaempire_settings['acyaempire_search_text'];
		if($acyaempire_search_form !='Search ...'): ?>
	<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr($acyaempire_search_form); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="search-icon"></i></button>
	<?php else: ?>
	<input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search ...', 'acya-empire' ); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="search-icon"></i></button>
	<?php endif; ?>
</form> <!-- end .search-form -->