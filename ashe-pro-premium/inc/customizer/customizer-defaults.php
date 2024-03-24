<?php

function ashe_options( $control ) {

	$ashe_defaults = array(
		'colors_top_bar_bg' => '#ffffff',
		'colors_top_bar_link' => '#000000',
		'colors_top_bar_link_hover' => '#ca9b52',
		'colors_header_bg' => '#ffffff',
		'colors_main_nav_bg' => '#ffffff',
		'colors_main_nav_link' => '#000000',
		'colors_main_nav_link_hover' => '#ca9b52',
		'colors_content_bg' => '#ffffff',
		'colors_content_text' => '#464646',
		'colors_content_title' => '#030303',
		'colors_content_meta' => '#a1a1a1',
		'colors_content_accent' => '#ca9b52',
		'colors_text_selection' => '#ca9b52',
		'colors_content_border' => '#e8e8e8',
		'colors_button' => '#333333',
		'colors_button_text' => '#ffffff',
		'colors_button_hover' => '#ca9b52',
		'colors_button_hover_text' => '#ffffff',
		'colors_overlay' => '#494949',
		'colors_overlay_text' => '#ffffff',
		'colors_footer_bg' => '#f6f6f6',
		'colors_footer_text' => '#333333',
		'colors_footer_title' => '#111111',
		'colors_footer_accent' => '#ca9b52',
		'colors_footer_border' => '#e0dbdb',
		'colors_preloader_anim' => '#ffffff',
		'colors_preloader_bg' => '#333333',
		'general_site_width' => '1140',
		'general_content_padding' => '30',
		'general_sidebar_width' => '270',
		'general_sidebar_sticky' => true,
		'general_home_layout' => 'col1-rsidebar',
		'general_single_layout' => 'rsidebar',
		'general_shop_layout' => 'col3-fullwidth',
		'general_other_layout' => 'col1-rsidebar',
		'general_header_width' => 'contained',
		'general_slider_width' => 'boxed',
		'general_links_width' => 'boxed',
		'general_content_width' => 'boxed',
		'general_single_width' => 'boxed',
		'general_footer_width' => 'contained',	
		'general_instagram_position' => 'below',
		'top_bar_label' => true,
		'top_bar_align' => 'left-right',
		'top_bar_show_menu' => true,
		'top_bar_show_socials' => true,
		'top_bar_transparent' => false,
		'header_image_label' => true,
		'header_image_bg_type' => 'image',
		'header_image_video_mp4' => '',
		'header_image_video_webm' => '',
		'header_image_height' => '500',
		'header_image_bg_image_size' => 'cover',
		'header_image_parallax' => false,
		'header_image_slider_navigation' => true,
		'header_image_slider_pagination' => true,
		'header_image_slider_autoplay' => '1700',
		'title_tagline_logo_width' => '500',
		'title_tagline_logo_distance' => '120',
		'main_nav_label' => true,
		'main_nav_align' => 'center',
		'main_nav_position' => 'below',
		'main_nav_fixed' => true,
		'main_nav_show_socials' => false,
		'main_nav_show_search' => true,
		'main_nav_show_sidebar' => true,
		'main_nav_merge_menu' => false,
		'featured_slider_label' => true,
		'featured_slider_display' => 'all',
		'featured_slider_category' => 'null',
		'featured_slider_orderby' => 'rand',
		'featured_slider_amount' => '3',
		'featured_slider_columns' => '1',
		'featured_slider_autoplay' => '0',
		'featured_slider_navigation' => true,
		'featured_slider_pagination' => true,
		'featured_slider_categories' => true,
		'featured_slider_title' => true,
		'featured_slider_excerpt' => true,
		'featured_slider_more' => true,
		'featured_slider_date' => true,
		'featured_links_label' => false,
		'featured_links_sec_title' => '',
		'featured_links_window' => true,
		'featured_links_fill' => true,
		'featured_links_gutter_horz' => true,
		'featured_links_title_1' => '',
		'featured_links_url_1' => '',
		'featured_links_image_1' => '',
		'featured_links_title_2' => '',
		'featured_links_url_2' => '',
		'featured_links_image_2' => '',
		'featured_links_title_3' => '',
		'featured_links_url_3' => '',
		'featured_links_image_3' => '',
		'featured_links_title_4' => '',
		'featured_links_url_4' => '',
		'featured_links_image_4' => '',
		'featured_links_title_5' => '',
		'featured_links_url_5' => '',
		'featured_links_image_5' => '',
		'blog_page_gutter_horz' => '37',
		'blog_page_gutter_vert' => '30',
		'blog_page_grid_crop_width' => '500',
		'blog_page_grid_crop_height' => '330',
		'blog_page_list_crop_width' => '300',
		'blog_page_list_crop_height' => '300',
		'blog_page_post_description' => 'excerpt',
		'blog_page_excerpt_length' => '110',
		'blog_page_grid_excerpt_length' => '60',
		'blog_page_post_content_align' => 'center',
		'blog_page_post_pagination' => 'numeric',
		'blog_page_show_categories' => true,
		'blog_page_show_date' => true,
		'blog_page_show_comments' => true,
		'blog_page_show_dropcups' => true,
		'blog_page_more_text' => 'Read More',
		'blog_page_show_author' => true,
		'blog_page_show_facebook' => true,
		'blog_page_show_twitter' => true,
		'blog_page_show_pinterest' => true,
		'blog_page_show_google' => true,
		'blog_page_show_linkedin' => false,
		'blog_page_show_reddit' => false,
		'blog_page_show_tumblr' => false,
		'blog_page_related_title' => 'You May Also Like',
		'blog_page_related_orderby' => 'random',
		'single_page_show_categories' => true,
		'single_page_show_date' => true,
		'single_page_show_dropcups' => true,
		'single_page_show_tags' => true,
		'single_page_show_author' => true,
		'single_page_show_comments' => true,
		'single_page_show_author_desc' => true,
		'single_page_show_author_nav' => true,
		'single_page_related_title' => 'You May Also Like',
		'single_page_related_orderby' => 'random',
		'single_page_show_comments_area' => true,
		'social_media_window' => true,
		'social_media_icon_1' => 'facebook-f',
		'social_media_url_1' => '#',
		'social_media_icon_2' => 'twitter',
		'social_media_url_2' => '#',
		'social_media_icon_3' => 'instagram',
		'social_media_url_3' => '#',
		'social_media_icon_4' => 'pinterest',
		'social_media_url_4' => '#',
		'social_media_icon_5' => 'google-plus-g',
		'social_media_url_5' => '#',
		'social_media_icon_6' => '',
		'social_media_url_6' => '',
		'social_media_icon_7' => '',
		'social_media_url_7' => '',
		'social_media_icon_8' => '',
		'social_media_url_8' => '',
		'page_footer_columns' => 'three',
		'page_footer_align' => 'right-left',
		'page_footer_copyright' => 'Ashe Theme by Royal-Flush - $year $copy',
		'page_footer_show_socials' => true,
		'typography_logo_family' => 'Dancing+Script',
		'typography_logo_size' => '120',
		'typography_logo_tg_size' => '18',
		'typography_logo_height' => '120',
		'typography_logo_spacing' => '-1',
		'typography_logo_weight' => '700',
		'typography_logo_italic' => false,
		'typography_logo_uppercase' => false,
		'typography_nav_family' => 'Open+Sans',
		'typography_nav_size' => '15',
		'typography_nav_height' => '60',
		'typography_nav_spacing' => '1',
		'typography_nav_weight' => '600',
		'typography_nav_italic' => false,
		'typography_nav_uppercase' => true,
		'typography_head_family' => 'Playfair+Display',
		'typography_head_size' => '40',
		'typography_head_height' => '44',
		'typography_head_spacing' => '0.5',
		'typography_head_weight' => '400',
		'typography_head_italic' => false,
		'typography_head_uppercase' => false,
		'typography_body_family' => 'Open+Sans',
		'typography_body_size' => '15',
		'typography_body_height' => '25',
		'typography_body_spacing' => '0',
		'typography_body_weight' => '400',
		'typography_body_italic' => false,
		'typography_body_uppercase' => false,
		'typography_latin_subset' => false,
		'typography_cyrillic_subset' => false,
		'typography_greek_subset' => false,
		'typography_vietnamese_subset' => false,
		'preloader_label' => false,
		'preloader_type' => 'animation_1',

	);

	// merge defaults and options
	$ashe_defaults = wp_parse_args( get_option('ashe_options'), $ashe_defaults );

	// return control
	return $ashe_defaults[ $control ];

}