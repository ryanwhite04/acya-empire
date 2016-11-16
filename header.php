<?php
/**
 * Displays the header content
 *
 * @package Theme ACYA
 * @subpackage ACYA Empire
 * @since ACYA Empire 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$acyaempire_settings = acyaempire_get_theme_options(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<!-- Masthead ============================================= -->
<header id="masthead" class="site-header">
	<?php
				if($header_image = $acyaempire_settings['acyaempire_display_header_image'] == 'top'){
					do_action('acyaempire_header_image');
				}
				echo '<div class="top-header">
						<div class="container clearfix">';
						do_action('acyaempire_site_branding');

						echo '<div class="menu-toggle">      
								<div class="line-one"></div>
								<div class="line-two"></div>
								<div class="line-three"></div>
							</div>';

						echo '<div class="header-info clearfix">';
							if(has_nav_menu('social-link') && $acyaempire_settings['acyaempire_top_social_icons'] == 0):
								echo '<div class="header-social-block">';
									do_action('social_links');
								echo '</div>'.'<!-- end .header-social-block -->';
							endif;
							if( is_active_sidebar( 'acyaempire_header_info' )) {
								dynamic_sidebar( 'acyaempire_header_info' );
							}
						echo ' </div> <!-- end .header-info -->';
						$search_form = $acyaempire_settings['acyaempire_search_custom_header'];
						if (1 != $search_form) { ?>
							<div id="search-toggle" class="header-search"></div>
							<div id="search-box" class="clearfix">
								<?php get_search_form();?>
							</div>  <!-- end #search-box -->
						<?php } 

					echo '</div> <!-- end .container -->
				</div> <!-- end .top-header -->';
			if($header_image = $acyaempire_settings['acyaempire_display_header_image'] == 'below'){
				do_action('acyaempire_header_image');
			} 
			?>
	<!-- Main Header============================================= -->
	<div id="sticky_header">
		<div class="container clearfix">
			<!-- Main Nav ============================================= -->
			<?php
				if (has_nav_menu('primary')) { ?>
			<?php $args = array(
				'theme_location' => 'primary',
				'container'      => '',
				'items_wrap'     => '<ul class="menu">%3$s</ul>',
				); ?>
			<nav id="site-navigation" class="main-navigation clearfix">
				<?php wp_nav_menu($args);//extract the content from apperance-> nav menu ?>
			</nav> <!-- end #site-navigation -->
			<?php } else {// extract the content from page menu only ?>
			<nav id="site-navigation" class="main-navigation clearfix">
				<?php	wp_page_menu(array('menu_class' => 'menu')); ?>
			</nav> <!-- end #site-navigation -->
			<?php } ?>
		</div> <!-- end .container -->
	</div> <!-- end #sticky_header -->
	<?php
		$enable_slider = $acyaempire_settings['acyaempire_enable_slider'];
		acyaempire_slider_value();
		if ($enable_slider=='frontpage'|| $enable_slider=='enitresite'){
			if(is_front_page() && ($enable_slider=='frontpage') ) {
				if($acyaempire_settings['acyaempire_slider_type'] == 'default_slider') {
						acyaempire_page_sliders();
				}else{
					if(class_exists('ACYA_Empire_Plus_Features')):
						acyaempire_image_sliders();
					endif;
				}
			}
			if($enable_slider=='enitresite'){
				if($acyaempire_settings['acyaempire_slider_type'] == 'default_slider') {
						acyaempire_page_sliders();
				}else{
					if(class_exists('ACYA_Empire_Plus_Features')):
						acyaempire_image_sliders();
					endif;
				}
			}
		}
		if(!is_page_template('page-templates/acyaempire-corporate.php') && !is_page_template('alter-front-page-template.php')) {
			if (('' != acyaempire_header_title()) || function_exists('bcn_display_list')) {
				if(is_home()){
					if($acyaempire_settings['acyaempire_blog_header_display'] == 'show'){ ?>
						<div class="page-header clearfix">
							<div class="container">
									<h2 class="page-title"><?php echo acyaempire_header_title();?></h2> <!-- .page-title -->
									<?php acyaempire_breadcrumb(); ?>
							</div> <!-- .container -->
						</div> <!-- .page-header -->
					<?php }
				} else { ?>
						<div class="page-header clearfix">
							<div class="container">
									<h1 class="page-title"><?php echo acyaempire_header_title();?></h1> <!-- .page-title -->
									<?php acyaempire_breadcrumb(); ?>
							</div> <!-- .container -->
						</div> <!-- .page-header -->
				<?php }
			}
		} ?>
</header> <!-- end #masthead -->
<!-- Main Page Start ============================================= -->
<div id="content">
<?php if (!is_page_template('page-templates/acyaempire-corporate.php') ){ 
  if(is_page_template('three-column-blog-template.php') || is_page_template('our-team-template.php') || is_page_template('about-us-template.php') || is_page_template('portfolio-template.php') ){

	}else{?>
<div class="container clearfix">
<?php }
	} ?>