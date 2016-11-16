<?php
if(!function_exists('acyaempire_get_option_defaults_values')):
	/******************** FREESIAEMPIRE DEFAULT OPTION VALUES ******************************************/
	function acyaempire_get_option_defaults_values() {
		global $acyaempire_default_values;
		$acyaempire_default_values = array(
			'acyaempire_responsive'	=> 'on',
			'acyaempire_animate_css'	=> 'on',
			'acyaempire_design_layout' => 'wide-layout',
			'acyaempire_sidebar_layout_options' => 'right',
			'acyaempire_blog_layout_temp' => 'large_image_display',
			'acyaempire_enable_slider' => 'frontpage',
			'acyaempire_transition_effect' => 'fade',
			'acyaempire_transition_delay' => '4',
			'acyaempire_transition_duration' => '1',
			'acyaempire_search_custom_header' => 0,
			'acyaempire-img-upload-header-logo'	=> '',
			'acyaempire_header_display'=> 'header_text',
			'acyaempire_categories'	=> array(),
			'acyaempire_custom_css'	=> '',
			'acyaempire_scroll'	=> 0,
			'acyaempire_custom_header_options' => 'homepage',
			'acyaempire_slider_link' =>0,
			'acyaempire_tag_text' => 'Read More',
			'acyaempire_excerpt_length'	=> '65',
			'acyaempire_single_post_image' => 'off',
			'acyaempire_reset_all' => 0,
			'acyaempire_stick_menu'	=>0,
			'acyaempire_blog_post_image' => 'on',
			'acyaempire_entry_format_blog' => 'excerptblog_display',
			'acyaempire_search_text' => 'Search ...',
			'acyaempire_slider_type' => 'default_slider',
			'acyaempire_slider_textposition' => 'middle',
			'acyaempire_slider_no' => '4',
			'acyaempire_slider_button' => 0,
			'acyaempire_total_features' => '3',
			'acyaempire_features_title' => '',
			'acyaempire_features_description' => '',
			'acyaempire_disable_features' => 0,
			'acyaempire_display_header_image' => 'top',
			'acyaempire_disable_features_alterpage' => 0,
			'acyaempire_footer_column_section' =>'4',
			'acyaempire_entry_format_blog' => 'show',
			'acyaempire_entry_meta_blog' => 'show-meta',
			'acyaempire_slider_content'	=> 'on',
			'acyaempire_top_social_icons' =>0,
			'acyaempire_buttom_social_icons'	=>0,
			'acyaempire_menu_position'	=>'middle',
			'acyaempire_logo_display'	=>'left',
			'acyaempire_blog_content_layout'	=> '',
			'acyaempire_blog_header_display'	=> 'show',
			'acyaempire_display_page_featured_image'=>0

			);
		return apply_filters( 'acyaempire_get_option_defaults_values', $acyaempire_default_values );
	}
endif;
?>