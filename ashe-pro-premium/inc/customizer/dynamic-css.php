<?php

function ashe_dynamic_css() {

// begin style block
$css = '<style id="ashe_dynamic_css">';

/*
** Colors =====
*/

	// Body
	if ( ! get_theme_mod( 'background_color' ) ) {
		$css .= '
			body {
				background-color: #ffffff;
			}
		';
	}
	if ( get_option( 'ashe_colors_body_bg' ) != null ) {
		$css .= '
			body {
				background-color: '. get_option( 'ashe_colors_body_bg' ) .';
			}
		';		
	}

	// Top Bar
	$css .= '
		#top-bar,
		#top-menu .sub-menu {
		  background-color: '. ashe_options( 'colors_top_bar_bg' ) .';
		}

		#top-bar a {
		  color: '. ashe_options( 'colors_top_bar_link' ) .';
		}

		#top-menu .sub-menu,
		#top-menu .sub-menu a {
			border-color: '. ashe_hex2rgba( ashe_options( 'colors_top_bar_link' ), 0.05 ) .';
		}

		#top-bar a:hover,
		#top-bar li.current-menu-item > a,
		#top-bar li.current-menu-ancestor > a,
		#top-bar .sub-menu li.current-menu-item > a,
		#top-bar .sub-menu li.current-menu-ancestor> a {
		  color: '. ashe_options( 'colors_top_bar_link_hover' ) .';
		}
	';

	// Page Header
	$header_text_color = get_header_textcolor();

	if ( $header_text_color === 'blank' ) {
		$css .= '
			.header-logo a,
			.site-description {
				color: #111111;
			}
		';	
	} else {
		$css .= '
			.header-logo a,
			.site-description {
				color: #'. esc_attr ( $header_text_color ) .';
			}
		';			
	}

	$css .= '
		.entry-header {
			background-color: '. ashe_options( 'colors_header_bg' ) .';
		}
	';

	// Main Navigation
	$css .= '
		#main-nav,
		#main-menu .sub-menu,
		#main-nav #s {
			background-color: '. ashe_options( 'colors_main_nav_bg' ) .';
		}

		#main-nav a,
		#main-nav .svg-inline--fa,
		#main-nav #s,
		.instagram-title h2 {
			color: '. ashe_options( 'colors_main_nav_link' ) .';
		}

		.main-nav-sidebar span,
		.sidebar-alt-close-btn span {
			background-color: '. ashe_options( 'colors_main_nav_link' ) .';
		}

		#main-nav {
			box-shadow: 0px 1px 5px '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.1 ) .';
		}

		#main-menu .sub-menu,
		#main-menu .sub-menu a {
			border-color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.05 ) .';
		}

		#main-nav #s::-webkit-input-placeholder { /* Chrome/Opera/Safari */
			color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.7 ) .';
		}
		#main-nav #s::-moz-placeholder { /* Firefox 19+ */
			color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.7 ) .';
		}
		#main-nav #s:-ms-input-placeholder { /* IE 10+ */
			color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.7 ) .';
		}
		#main-nav #s:-moz-placeholder { /* Firefox 18- */
			color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.7 ) .';
		}

		#main-nav a:hover,
		#main-nav .svg-inline--fa:hover,
		#main-nav li.current-menu-item > a,
		#main-nav li.current-menu-ancestor > a,
		#main-nav .sub-menu li.current-menu-item > a,
		#main-nav .sub-menu li.current-menu-ancestor> a {
			color: '. ashe_options( 'colors_main_nav_link_hover' ) .';
		}

		.main-nav-sidebar:hover span {
			background-color: '. ashe_options( 'colors_main_nav_link_hover' ) .';
		}
	';

	// Content
	$css .= '
		/* Background */
		.sidebar-alt,
		.main-content,
		.featured-slider-area,
		#featured-links,
		#page-content select,
		#page-content input,
		#page-content textarea {
			background-color: '. ashe_options( 'colors_content_bg' ) .';
		}

		#page-content #featured-links h6,
		.instagram-title h2 {
			background-color: '. ashe_hex2rgba( ashe_options( 'colors_content_bg' ), 0.85 ) .';
		}

		.ashe_promo_box_widget h6 {
			background-color: '. ashe_options( 'colors_content_bg' ) .';
		}

		.ashe_promo_box_widget .promo-box:after  {
			border-color: '. ashe_options( 'colors_content_bg' ) .';
		}


		/* Text */
		#page-content,
		#page-content select,
		#page-content input,
		#page-content textarea,
		#page-content .post-author a,
		#page-content .ashe-widget a,
		#page-content .comment-author,		
		#page-content #featured-links h6,
		.ashe_promo_box_widget h6 {
			color: '. ashe_options( 'colors_content_text' ) .';
		}

		/* Title */
		#page-content h1 a,
		#page-content h1,
		#page-content h2,
		#page-content h3,
		#page-content h4,
		#page-content h5,
		#page-content h6,
		#page-content .author-description h4 a,
		#page-content .related-posts h4 a,
		#page-content .blog-pagination .previous-page a,
      	#page-content .blog-pagination .next-page a,
      	blockquote,
		#page-content .post-share a {
			color: '. ashe_options( 'colors_content_title' ) .';
		}

		#page-content h1 a:hover {
			color: '. ashe_hex2rgba( ashe_options( 'colors_content_title' ) , 0.75 ).';
		}
	
		/* Meta */
		#page-content .post-date,
		#page-content .post-comments,
		#page-content .meta-sep,
		#page-content .post-author,
		#page-content [data-layout*="list"] .post-author a,
		#page-content .related-post-date,
		#page-content .comment-meta a,
		#page-content .author-share a,
		#page-content .post-tags a,
		#page-content .tagcloud a,
		.widget_categories li,
		.widget_archive li,
		.ashe-subscribe-text p,
		.rpwwt-post-author,
		.rpwwt-post-categories,
		.rpwwt-post-date,
		.rpwwt-post-comments-number {
			color: '. ashe_options( 'colors_content_meta' ) .';
		}

		#page-content input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: '. ashe_options( 'colors_content_meta' ) .';
		}
		#page-content input::-moz-placeholder { /* Firefox 19+ */
		  color: '. ashe_options( 'colors_content_meta' ) .';
		}
		#page-content input:-ms-input-placeholder { /* IE 10+ */
		  color: '. ashe_options( 'colors_content_meta' ) .';
		}
		#page-content input:-moz-placeholder { /* Firefox 18- */
		  color: '. ashe_options( 'colors_content_meta' ) .';
		}
	
		/* Accent */
		#page-content a,
		.post-categories,
		#page-wrap .ashe-widget.widget_text a,
		#page-wrap .ashe-widget.ashe_author_widget a {
			color: '. ashe_options( 'colors_content_accent' ) .';
		}
		
		.ps-container > .ps-scrollbar-y-rail > .ps-scrollbar-y {
			background: '. ashe_options( 'colors_content_accent' ) .';
		}

		#page-content a:hover {
			color: '. ashe_hex2rgba( ashe_options( 'colors_content_accent' ), 0.8 ) .';
		}

		blockquote {
			border-color: '. ashe_options( 'colors_content_accent' ) .';
		}

		.slide-caption {
			color: #ffffff;
			background: '. ashe_options( 'colors_content_accent' ) .';
		}

		/* Selection */
		::-moz-selection {
			color: #ffffff;
			background: '. ashe_options( 'colors_text_selection' ) .';
		}
		::selection {
			color: #ffffff;
			background: '. ashe_options( 'colors_text_selection' ) .';
		}

		#page-content .wprm-rating-star svg polygon {
			stroke: '. ashe_options( 'colors_content_accent' ) .';
		}

		#page-content .wprm-rating-star-full svg polygon,
		#page-content .wprm-comment-rating svg path,
		#page-content .comment-form-wprm-rating svg path{
			fill: '. ashe_options( 'colors_content_accent' ) .';
		}

		/* Border */
		#page-content .post-footer,
		[data-layout*="list"] .blog-grid > li,
		#page-content .author-description,
		#page-content .related-posts,
		#page-content .entry-comments,
		#page-content .ashe-widget li,
		#page-content #wp-calendar,
		#page-content #wp-calendar caption,
		#page-content #wp-calendar tbody td,
		#page-content .widget_nav_menu li a,
		#page-content .widget_pages li a,
		#page-content .tagcloud a,
		#page-content select,
		#page-content input,
		#page-content textarea,
		.widget-title h2:before,
		.widget-title h2:after,
		.post-tags a,
		.gallery-caption,
		.wp-caption-text,
		table tr,
		table th,
		table td,
		pre,
		#page-content .wprm-recipe-instruction {
			border-color: '. ashe_options( 'colors_content_border' ) .';
		}

		#page-content .wprm-recipe {
			box-shadow: 0 0 3px 1px '. ashe_options( 'colors_content_border' ) .';
		}

		hr {
			background-color: '. ashe_options( 'colors_content_border' ) .';
		}

		.wprm-recipe-details-container,
		.wprm-recipe-notes-container p {
			background-color: '. ashe_hex2rgba( ashe_options( 'colors_content_border' ), 0.4 ) .';
		}

		/* Buttons */
		.widget_search .svg-fa-wrap,
		.widget_search #searchsubmit,
		.single-navigation i,
		#page-content input.submit,
		#page-content .blog-pagination.numeric a,
		#page-content .blog-pagination.load-more a,
		#page-content .mc4wp-form-fields input[type="submit"],
		#page-content .widget_wysija input[type="submit"],
		#page-content .post-password-form input[type="submit"],
		#page-content .wpcf7 [type="submit"],
		#page-content .wprm-recipe-print,
		#page-content .wprm-jump-to-recipe-shortcode,
		#page-content .wprm-print-recipe-shortcode {
			color: '. ashe_options( 'colors_button_text' ) .';
			background-color: '. ashe_options( 'colors_button' ) .';
		}
		.single-navigation i:hover,
		#page-content input.submit:hover,
		#page-content .blog-pagination.numeric a:hover,
		#page-content .blog-pagination.numeric span,
		#page-content .blog-pagination.load-more a:hover,
		#page-content .mc4wp-form-fields input[type="submit"]:hover,
		#page-content .widget_wysija input[type="submit"]:hover,
		#page-content .post-password-form input[type="submit"]:hover,
		#page-content .wpcf7 [type="submit"]:hover,		
		#page-content .wprm-recipe-print:hover,
		#page-content .wprm-jump-to-recipe-shortcode:hover,
		#page-content .wprm-print-recipe-shortcode:hover {
			color: '. ashe_options( 'colors_button_hover_text' ) .';
			background-color: '. ashe_options( 'colors_button_hover' ) .';
		}

		/* Image Overlay */
		.image-overlay,
		#infscr-loading,
		#page-content h4.image-overlay,
		.image-overlay a,
		.post-slider .prev-arrow,
		.post-slider .next-arrow,
		.header-slider-prev-arrow,
		.header-slider-next-arrow,
		#page-content .image-overlay a,
		#featured-slider .slick-arrow,
		#featured-slider .slider-dots,
		.header-slider-dots {
			color: '. ashe_options( 'colors_overlay_text' ) .';
		}

		#featured-slider .slick-active,
		.header-slider-dots .slick-active {
			background: '. ashe_options( 'colors_overlay_text' ) .';
		}

		.image-overlay,
		#infscr-loading,
		#page-content h4.image-overlay {
			background-color: '. ashe_hex2rgba( ashe_options( 'colors_overlay' ), 0.3 ) .';
		}
	';

	// Footer
	$css .= '
		/* Background */
		#page-footer,
		#page-footer select,
		#page-footer input,
		#page-footer textarea {
			background-color: '. ashe_options( 'colors_footer_bg' ) .';
		}
		
		/* Text */
		#page-footer,
		#page-footer a,
		#page-footer select,
		#page-footer input,
		#page-footer textarea {
			color: '. ashe_options( 'colors_footer_text' ) .';
		}

		/* Title */
		#page-footer h1,
		#page-footer h2,
		#page-footer h3,
		#page-footer h4,
		#page-footer h5,
		#page-footer h6 {
			color: '. ashe_options( 'colors_footer_title' ) .';
		}

		/* Accent */
		#page-footer a:hover {
			color: '. ashe_options( 'colors_footer_accent' ) .';
		}

		/* Border */
		#page-footer a,
		#page-footer .ashe-widget li,
		#page-footer #wp-calendar,
		#page-footer #wp-calendar caption,
		#page-footer #wp-calendar th,
		#page-footer #wp-calendar td,
		#page-footer .widget_nav_menu li a,
		#page-footer select,
		#page-footer input,
		#page-footer textarea,
		#page-footer .widget-title h2:before,
		#page-footer .widget-title h2:after,
		.footer-widgets {
			border-color: '. ashe_options( 'colors_footer_border' ) .';
		}

		#page-footer hr {
			background-color: '. ashe_options( 'colors_footer_border' ) .';
		}
	';

	// Preloader
	$css .= '
		.ashe-preloader-wrap {
			background-color: '. ashe_options( 'colors_preloader_bg' ) .';
		}
	';


/*
** Typography =====
*/
	
	function ashe_typography_calc( $id, $percent, $depth = 0, $min = 10 ) {
		$size = abs( round( ashe_options( 'typography_'. $id ) - ( ashe_options( 'typography_'. $id ) / $percent ), $depth ) );

		if  ( $size > $min ) {
			return $size;
		} else {
			return $min;
		}
	}

	function ashe_typography_calc_plus( $id, $value ) {
		return abs( round( ashe_options( 'typography_'. $id ) + $value, 1 ) );
	}


	// Logo & Tagline
	$css .= "
		.header-logo {
			font-family: '". str_replace( '+', ' ', ashe_options( 'typography_logo_family' ) ) ."';
		}

		.header-logo a {
			font-size: ". ashe_options( 'typography_logo_size' ) ."px;
			line-height: ". ashe_options( 'typography_logo_height' ) ."px;
			letter-spacing: ". ashe_options( 'typography_logo_spacing' ) ."px;
			font-weight: ". ashe_options( 'typography_logo_weight' ) .";
		}

		.header-logo .site-description {
			font-size: ". ashe_options( 'typography_logo_tg_size' ) ."px;
		}
	";

	// Italic
	if ( ashe_options( 'typography_logo_italic' ) === true ) {
		$css .= "
			.header-logo {
				font-style: italic;
			}
		";
	}

	// Uppercase
	if ( ashe_options( 'typography_logo_uppercase' ) === true ) {
		$css .= "
			.header-logo {
				text-transform: uppercase;
			}
		";
	}


	// Top Bar
	$css .= "
		#top-menu li a {
			font-family: '". str_replace( '+', ' ', ashe_options( 'typography_nav_family' ) ) ."';
			font-size: ". ashe_typography_calc( 'nav_size', 6 ) ."px;
			line-height: ". ashe_typography_calc( 'nav_height', 6 ) ."px;
			letter-spacing: ". ashe_typography_calc( 'nav_spacing', 6, 1, 0 ) ."px;
			font-weight: ". ashe_options( 'typography_nav_weight' ) .";
		}
		
		.top-bar-socials a {
			font-size: ". ashe_typography_calc( 'nav_size', 6 ) ."px;
			line-height: ". ashe_typography_calc( 'nav_height', 6 ) ."px;
		}

		#top-bar .mobile-menu-btn {
			line-height: ". ashe_typography_calc( 'nav_height', 6 ) ."px;
		}

		#top-menu .sub-menu > li > a {
			font-size: ". ashe_typography_calc( 'nav_size', 4 ) ."px;
			line-height: ". ashe_typography_calc( 'nav_height', 3 ) ."px;
			letter-spacing: ". ashe_typography_calc( 'nav_spacing', 6, 1, 0 ) ."px;
		}
	";

	if ( ashe_options( 'main_nav_label' ) === true || ! has_nav_menu('top') || ! has_nav_menu('top') || ashe_options( 'top_bar_show_menu' ) === false ) {
		$css .= "
		@media screen and ( max-width: 979px ) {
			.top-bar-socials {
				float: none !important;
			}

			.top-bar-socials a {
				line-height: 40px !important;
			}
		}";
	}

	// Main Navigation
	$css .= "	
		#main-menu li a {
			font-family: '". str_replace( '+', ' ', ashe_options( 'typography_nav_family' ) ) ."';
			font-size: ". ashe_options( 'typography_nav_size' ) ."px;
			line-height: ". ashe_options( 'typography_nav_height' ) ."px;
			letter-spacing: ". ashe_options( 'typography_nav_spacing' ) ."px;
			font-weight: ". ashe_options( 'typography_nav_weight' ) .";
		}

		#mobile-menu li {
			font-family: '". str_replace( '+', ' ', ashe_options( 'typography_nav_family' ) ) ."';
			font-size: ". ashe_options( 'typography_nav_size' ) ."px;
			line-height: ". ashe_typography_calc( 'nav_height', 6 ) ."px;
			letter-spacing: ". ashe_options( 'typography_nav_spacing' ) ."px;
			font-weight: ". ashe_options( 'typography_nav_weight' ) .";
		}

		.main-nav-search,
		#main-nav #s,
		.main-nav-socials-trigger {
			font-size: ". ashe_options( 'typography_nav_size' ) ."px;
			line-height: ". ashe_options( 'typography_nav_height' ) ."px;
		}

		#main-nav #s {
			line-height: ". ( ashe_options( 'typography_nav_height' ) + 1 ) ."px;
		}

		#main-menu li.menu-item-has-children>a:after {
			font-size: ". ashe_options( 'typography_nav_size' ) ."px;
		}

		#main-nav {
			min-height:". ashe_options( 'typography_nav_height' ) ."px;
		}

		.main-nav-sidebar {
			height:". ashe_options( 'typography_nav_height' ) ."px;
		}

		#main-menu .sub-menu > li > a,
		#mobile-menu .sub-menu > li {
			font-size: ". ashe_typography_calc( 'nav_size', 5 ) ."px;
			line-height: ". ashe_typography_calc( 'nav_height', 4 ) ."px;
			letter-spacing: ". ashe_typography_calc( 'nav_spacing', 6, 1, 0 ) ."px;
		}

		.mobile-menu-btn {
			font-size: ". ashe_typography_calc( 'nav_size', 0.45 ) ."px;
			line-height: ". ashe_options( 'typography_nav_height' ) ."px;
		}

		.main-nav-socials a {
			font-size: ". ashe_typography_calc( 'nav_size', 10 ) ."px;
			line-height: ". ashe_options( 'typography_nav_height' ) ."px;
		}
	";

	// Italic
	if ( ashe_options( 'typography_nav_italic' ) === true ) {
		$css .= "
			#top-menu li a,
			#main-menu li a,
			#mobile-menu li {
				font-style: italic;
			}
		";
	}

	// Uppercase
	if ( ashe_options( 'typography_nav_uppercase' ) === true ) {
		$css .= "
			#top-menu li a,
			#main-menu li a,
			#mobile-menu li {
				text-transform: uppercase;
			}
		";
	}

	if ( ashe_options( 'typography_nav_size' ) >= 28 ) {
		$css .= "
			.main-nav-sidebar span {
				width: 26px;
				margin-bottom: 6px;
			}
		";
	} elseif ( ashe_options( 'typography_nav_size' ) >= 24 ) {
		$css .= "
			.main-nav-sidebar span {
				width: 26px;
				margin-bottom: 5px;
			}
		";
	} elseif ( ashe_options( 'typography_nav_size' ) >= 22 ) {
		$css .= "
			.main-nav-sidebar span {
				width: 22px;
				margin-bottom: 4px;
			}
		";
	} elseif ( ashe_options( 'typography_nav_size' ) >= 18 ) {
		$css .= "
			.main-nav-sidebar span {
				width: 20px;
				margin-bottom: 4px;
			}
		";
	}

	// Headings Fonts
	$css .= "
		.post-meta,
		#wp-calendar thead th,
		#wp-calendar caption,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		blockquote p,
		#reply-title,
		#reply-title a {
			font-family: '". str_replace( '+', ' ', ashe_options( 'typography_head_family' ) ) ."';	
		}

		/* font size 40px */
		h1 {
			font-size: ". ashe_options( 'typography_head_size' ) ."px;
		}

		/* font size 36px */		
		h2 {
			font-size: ". ashe_typography_calc( 'head_size', 10 ) ."px;
		}

		/* font size 30px */
		h3 {
			font-size: ". ashe_typography_calc( 'head_size', 4 ) ."px;
		}

		/* font size 24px */
		h4 {
			font-size: ". ashe_typography_calc( 'head_size', 2.5 ) ."px;
		}

		/* font size 22px */
		h5,
		#page-content .wprm-recipe-name,
		#page-content .wprm-recipe-header {
			font-size: ". ashe_typography_calc( 'head_size', 2.2 ) ."px;
		}

		/* font size 20px */
		h6 {
			font-size: ". ashe_typography_calc( 'head_size', 2 ) ."px;
		}

		/* font size 19px */
		blockquote p {
			font-size: ". ashe_typography_calc( 'head_size', 1.9, 0, 16 ) ."px;			
		}

		/* font size 18px */
		.related-posts h4 a {
			font-size: ". ashe_typography_calc( 'head_size', 1.8, 0, 16 ) ."px;	
		}

		/* font size 16px */
		.author-description h4,
		#reply-title,
		#reply-title a,
		.comment-title,
		.widget-title h2,
		.ashe_author_widget h3 {
			font-size: ". ashe_typography_calc( 'head_size', 1.7, 0, 15 ) ."px;
		}
		
		.post-title,
		.page-title {
			line-height: ". ashe_options( 'typography_head_height' ) ."px;
		}

		/* letter spacing 0.5px */
		.slider-title,
		.post-title,
		.page-title,
		.related-posts h4 a {
			letter-spacing: ". ashe_options( 'typography_head_spacing' ) ."px;
		}

		/* letter spacing 1.5px */
		.widget-title h2,
		.author-description h4,
		.comment-title,
		#reply-title,
		#reply-title a,
		.ashe_author_widget h3 {
			letter-spacing: ". ashe_typography_calc_plus( 'head_spacing', 1 ) ."px;
		}

		/* letter spacing 2px */
		.related-posts h3 {
			letter-spacing: ". ashe_typography_calc_plus( 'head_spacing', 1.5 ) ."px;
		}

		/* font weight */
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-weight: ". ashe_options( 'typography_head_weight' ) .";
		}
	";

	// Italic
	if ( ashe_options( 'typography_head_italic' ) === true ) {
		$css .= "
			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
				font-style: italic;
			}
		";
	} else {
		$css .= "
			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
				font-style: normal;
			}
		";
	}

	// Uppercase
	if ( ashe_options( 'typography_head_uppercase' ) === true ) {
		$css .= "
			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
				text-transform: uppercase;
			}
		";
	} else {
		$css .= "
			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
				text-transform: none;
			}
		";
	}

	// Body Text
	$css .= "
		body,
		.page-404 h2,
		#featured-links h6,
		.ashe_promo_box_widget h6,
		.comment-author,
		.related-posts h3,
		.instagram-title h2,
		input,
		textarea,
		select,
		.no-result-found h1,
		.ashe-subscribe-text h4,
		.widget_wysija_cont .updated,
		.widget_wysija_cont .error,
		.widget_wysija_cont .xdetailed-errors {
			font-family: '". str_replace( '+', ' ', ashe_options( 'typography_body_family' ) ) ."';
		}

		body,
		.page-404 h2,
		.no-result-found h1 {
			font-weight: ". ashe_options( 'typography_body_weight' ) .";
		}

		body,
		.comment-author {
			font-size: ". ashe_options( 'typography_body_size' ) ."px;
		}

		body p {
			line-height: ". ashe_options( 'typography_body_height' ) ."px;
		}

		/* letter spacing 0 */
		body p,
		.comment-author,
		.widget_recent_comments li,
		.widget_meta li,
		.widget_recent_comments li,
		.widget_pages > ul > li,
		.widget_archive li,
		.widget_categories > ul > li,
		.widget_recent_entries ul li,
		.widget_nav_menu li,
		.related-post-date,
		.post-media .image-overlay a,
		.post-meta,
		.rpwwt-post-title {
			letter-spacing: ". ashe_options( 'typography_body_spacing' ) ."px;
		}

		/* letter spacing 0.5 + */
		.post-author,
		.post-media .image-overlay span,
		blockquote p {
			letter-spacing: ". ashe_typography_calc_plus( 'body_spacing', 0.5 ) ."px;
		}

		/* letter spacing 1 + */
		#main-nav #searchform input,
		#featured-links h6,
		.ashe_promo_box_widget h6,
		.instagram-title h2,
		.ashe-subscribe-text h4,
		.page-404 p,
		#wp-calendar caption {
			letter-spacing: ". ashe_typography_calc_plus( 'body_spacing', 1 ) ."px;
		}

		/* letter spacing 2 + */
		.comments-area #submit,
		.tagcloud a,
		.mc4wp-form-fields input[type='submit'],
		.widget_wysija input[type='submit'],
		.slider-read-more a,
		.post-categories a,
		.read-more a,
		.no-result-found h1,
		.blog-pagination a,
		.blog-pagination span {
			letter-spacing: ". ashe_typography_calc_plus( 'body_spacing', 2 ) ."px;
		}

		/* font size 18px */
		.post-media .image-overlay p,
		.post-media .image-overlay a {
			font-size: ". ashe_typography_calc( 'body_size', 0.46 ) ."px;
		}

		/* font size 16px */
		.ashe_social_widget .social-icons a {
			font-size: ". ashe_typography_calc( 'body_size', 0.48 ) ."px;
		}

		/* font size 14px */
		.post-author,
		.post-share,
		.related-posts h3,
		input,
		textarea,
		select,
		.comment-reply-link,
		.wp-caption-text,
		.author-share a,
		#featured-links h6,
		.ashe_promo_box_widget h6,
		#wp-calendar,
		.instagram-title h2 {
			font-size: ". ashe_typography_calc( 'body_size', 10 ) ."px;
		}
		
		/* font size 13px */
		.slider-categories,
		.slider-read-more a,
		.read-more a,
		.blog-pagination a,
		.blog-pagination span,
		.footer-socials a,
		.rpwwt-post-author,
		.rpwwt-post-categories,
		.rpwwt-post-date,
		.rpwwt-post-comments-number,
		.copyright-info {
			font-size: ". ashe_typography_calc( 'body_size', 6 ) ."px;
		}
		
		/* font size 12px */
		.post-categories a,
		.post-tags a,
		.widget_recent_entries ul li span,
		#wp-calendar caption,
		#wp-calendar tfoot #prev a,
		#wp-calendar tfoot #next a {
			font-size: ". ashe_typography_calc( 'body_size', 5 ) ."px;
		}
		
		/* font size 11px */
		.related-post-date,
		.comment-meta,
		.tagcloud a {
			font-size: ". ashe_typography_calc( 'body_size', 4 ) ."px !important;
		}
		
	";

	// Italic
	if ( ashe_options( 'typography_body_italic' ) === true ) {
		$css .= "
			.post-content,
			.page-404 h2,
			.no-result-found h1 {
				font-style: italic;
			}
		";
	}

	// Uppercase
	if ( ashe_options( 'typography_body_uppercase' ) === true ) {
		$css .= "
			.post-content,
			.page-404 h2,
			.no-result-found h1 {
				text-transform: uppercase;
			}
		";
	}


/*
** General Layouts =====
*/
	// Site Width
	$css .= '
		.boxed-wrapper {
			max-width: '. ashe_options( 'general_site_width' ) .'px;
		}
	';
	
	// Sidebar Width
	$css .= '
		.sidebar-alt {
			max-width: '. ( ashe_options( 'general_sidebar_width' ) + 70 ) .'px;
			left: -'. ( ashe_options( 'general_sidebar_width' ) + 70 ) .'px; 
			padding: 85px 35px 0px;
		}

		.sidebar-left,
		.sidebar-right {
			width: '. ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) .'px;
		}

		[data-layout*="rsidebar"] .main-container,
		[data-layout*="lsidebar"] .main-container {
			float: left;
			width: calc(100% - '. ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) .'px);
			width: -webkit-calc(100% - '. ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) .'px);
		}

		[data-layout*="lrsidebar"] .main-container {
			width: calc(100% - '. ( ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) * 2 ) .'px);
			width: -webkit-calc(100% - '. ( ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) * 2 ) .'px);
		}

		[data-layout*="fullwidth"] .main-container {
			width: 100%;
		}
	';

	// Padding
	$css .= '
		#top-bar > div,
		#main-nav > div,
		#featured-links,
		.main-content,
		.page-footer-inner,
		.featured-slider-area.boxed-wrapper {
			padding-left: '. ashe_options( 'general_content_padding' ) .'px;
			padding-right: '. ashe_options( 'general_content_padding' ) .'px;
		}
	';

	// Blog Page
	$bp_home_layout = ashe_options( 'general_home_layout' );

	if ( $bp_home_layout === 'col1-lrsidebar' || $bp_home_layout === 'col2-lrsidebar' || 
		 $bp_home_layout === 'col3-lsidebar' || $bp_home_layout === 'col3-rsidebar' ) {
		$css .= '
			@media screen and ( max-width: 1050px ) {
				.sidebar-left,
				.sidebar-right {
					width: 100% !important;
					padding: 0 !important;
				}

				.sidebar-left-wrap,
				.sidebar-right-wrap,
				.footer-widgets .ashe-widget {
					float: none !important;
					width: 65% !important;
					margin-left: auto !important;
					margin-right: auto !important;
				}

				.main-container {
					width: 100% !important;
				}
			}
		';
	}

	if ( $bp_home_layout === 'col3-fullwidth' || $bp_home_layout === 'col3-lsidebar' || $bp_home_layout === 'col3-rsidebar' ) {
		$css .= '
			@media screen and ( max-width: 980px ) {
				.blog-grid > li {
					width: calc((100% - '. ashe_options( 'blog_page_gutter_horz' ) .'px ) / 2) !important;
					width: -webkit-calc((100% - '. ashe_options( 'blog_page_gutter_horz' ) .'px ) / 2) !important;
					margin-right: '. ashe_options( 'blog_page_gutter_horz' ) .'px !important;
				}

				.blog-grid > li:nth-of-type(2n+2) {
					margin-right: 0 !important;
				}
			}

			@media screen and ( max-width: 640px ) {
				.blog-grid > li {
					width: 100% !important;
					margin-right: 0 !important;
				}
			}
		';
	}

	if ( $bp_home_layout === 'col4-fullwidth' ) {
		$css .= '
			@media screen and ( max-width: 1050px ) {
				.blog-grid > li {
					width: calc((100% - 2 * '. ( ashe_options( 'blog_page_gutter_horz' ) ) .'px ) / 3 - 1px) !important;
					width: -webkit-calc((100% - 2 * '. ( ashe_options( 'blog_page_gutter_horz' ) ) .'px ) / 3 - 1px) !important;
					margin-right: '. ashe_options( 'blog_page_gutter_horz' ) .'px !important;
				}

				.blog-grid > li:nth-of-type(3n+3) {
					margin-right: 0 !important;
				}
			}

			@media screen and ( max-width: 980px ) {
				.blog-grid > li {
					width: calc((100% - '. ashe_options( 'blog_page_gutter_horz' ) .'px ) / 2 - 1px) !important;
					width: -webkit-calc((100% - '. ashe_options( 'blog_page_gutter_horz' ) .'px ) / 2 - 1px) !important;
					margin-right: '. ashe_options( 'blog_page_gutter_horz' ) .'px !important;
				}

				.blog-grid > li:nth-of-type(2n+2) {
					margin-right: 0 !important;
				}
			}

			@media screen and ( max-width: 640px ) {
				.blog-grid > li {
					width: 100% !important;
					margin-right: 0 !important;
				}
			}
		';
	}

	// List Layout
	if ( strpos( $bp_home_layout, 'list' ) !== false || strpos( ashe_options( 'general_other_layout' ), 'list' ) !== false ) {
		$css .= '
			[data-layout*="list"] .blog-grid .has-post-thumbnail .post-media {
				float: left;
				max-width: '. ashe_options( 'blog_page_list_crop_width' ) .'px;
				width: 100%;
			}

			[data-layout*="list"] .blog-grid .has-post-thumbnail .post-content-wrap {
				width: calc(100% - '. ashe_options( 'blog_page_list_crop_width' ) .'px);
				width: -webkit-calc(100% - '. ashe_options( 'blog_page_list_crop_width' ) .'px);
				float: left;
				padding-left: '. ashe_options( 'blog_page_gutter_horz' ) .'px;
			}

			[data-layout*="list"] .blog-grid > li {
				padding-bottom: '. ashe_options( 'blog_page_gutter_vert' ) .'px;
			}

		';

		if ( is_rtl() ) {
			$css .= '
				[data-layout*="list"] .blog-grid .post-media {
					float: right;
				}

				[data-layout*="list"] .blog-grid .post-content-wrap {
					float: right;
					padding-left: 0;
					padding-right: '. ashe_options( 'blog_page_gutter_horz' ) .'px;

				}
			';

		}
	}


/*
** Top Bar =====
*/
	// Transparent
	if ( ashe_options( 'top_bar_transparent' ) === true ) {
		$css .= '
			#top-bar {
				position: absolute;
				top: 0;
				left: 0;
				z-index: 1005;
				width: 100%;
				background-color: transparent !important;
				box-shadow: none;
			}
		'; 
	}

	// Align
	if ( ashe_options( 'top_bar_align' ) === 'left-right' ) {
		$css .= '
			#top-menu {
				float: left;
			}
			.top-bar-socials {
				float: right;
			}
		'; 
	} elseif ( ashe_options( 'top_bar_align' ) === 'right-left' ) {
		$css .= '
			#top-menu {
				float: right;
			}
			.top-bar-socials {
				float: left;
			}
		'; 
	}


/*
** Header Image & Video =====
*/
	// Height / Background
	$css .= '
		.entry-header {
			height: '. ashe_options( 'header_image_height' ) .'px;
			background-size: '. ashe_options( 'header_image_bg_image_size' ) .';
		}

		.entry-header-slider div {
			height: '. ashe_options( 'header_image_height' ) .'px;	
		}
	';

	// Cover Image
	if ( ashe_options( 'header_image_bg_image_size' ) === 'cover' ) {
		$css .= '
			.entry-header {
				background-position: center center;
			}
		';		
	}

	if ( ashe_options( 'header_image_bg_type' ) === 'video' ) {
		$css .= '
			.entry-header {
				background-color: transparent !important;
			}
		';	
	}


/*
** Site Identity =====
*/

	// Logo
	$css .= '
		.header-logo {
			padding-top: '. ashe_options( 'title_tagline_logo_distance' ) .'px;
		}

		.logo-img {
			max-width: '. ashe_options( 'title_tagline_logo_width' ) .'px;
		}
	';

	if ( ! display_header_text() ) {
		$css .= '
			.header-logo a:not(.logo-img),
			.site-description {
				display: none;
			}
		';		
	}

	// Responsive
	if ( ashe_options( 'title_tagline_logo_width' ) > 300 ) {
		$css .= '
			@media screen and (max-width: 880px) {
			    .logo-img {
			         max-width: 300px;
			    }
			}
		';
	}


/*
** Main Navigation =====
*/
	
	// Align
	$css .= '
		#main-nav {
			text-align: '. ashe_options( 'main_nav_align' ) .';
		}

		.main-nav-icons.main-nav-socials-mobile {
			left: '. ashe_options( 'general_content_padding' ) .'px;
		}

		.main-nav-socials-trigger {
		  position: absolute;
		  top: 0px;
		  left: '. ashe_options( 'general_content_padding' ) .'px;
		}

		.main-nav-sidebar + .main-nav-socials-trigger {
			  left: '. ( ashe_options( 'general_content_padding' ) + 30 ) .'px;
		}

	';

	if ( ashe_options( 'main_nav_align' ) === 'center' ) {
		$css .= '
			.main-nav-sidebar {
			  position: absolute;
			  top: 0px;
			  left: '. ashe_options( 'general_content_padding' ) .'px;
			  z-index: 1;
			}
				
			.main-nav-icons {
			  position: absolute;
			  top: 0px;
			  right: '. ashe_options( 'general_content_padding' ) .'px;
			  z-index: 2;
			}
		';
	} else {
		$css .= '
			.main-nav-sidebar {
			  float: left;
			  margin-right: 15px;
			}
						
			.main-nav-icons {
			 float: right;
			 margin-left: 15px;
			}
		';
	}


/*
** Featured Slider =====
*/

	if ( (int)ashe_options( 'featured_slider_columns' ) > 1 ) {
		$css .= '
			#featured-slider.boxed-wrapper .prev-arrow {
				left: 0 !important;
			}
			#featured-slider.boxed-wrapper .next-arrow {
				right: 0 !important;
			}
		';
	}


/*
** Featured Links =====
*/
	// Layout
	$featured_links = array(
		ashe_options( 'featured_links_image_1' ),
		ashe_options( 'featured_links_image_2' ),
		ashe_options( 'featured_links_image_3' ),
		ashe_options( 'featured_links_image_4' ),
		ashe_options( 'featured_links_image_5' )
	);

	$featured_links = ashe_options( 'featured_links_fill' ) ? array_filter( $featured_links ) : $featured_links;
	$featured_links_gutter = 0;

	// Gutter
	if ( ashe_options( 'featured_links_gutter_horz' ) === true ) {
		$featured_links_gutter = 20;
		$css .= '
			#featured-links .featured-link {
				margin-right: '. $featured_links_gutter .'px;
			}
			#featured-links .featured-link:last-of-type {
				margin-right: 0;
			}
		';
	}

	// Columns
	$css .= '
		#featured-links .featured-link {
			width: calc( (100% - '. ( (count(array_filter($featured_links)) - 1) * $featured_links_gutter ) .'px) / '. count( $featured_links ) .' - 1px);
			width: -webkit-calc( (100% - '. ( (count(array_filter($featured_links)) - 1) * $featured_links_gutter ) .'px) / '. count( $featured_links ) .' - 1px);
		}
	';

	if ( ashe_options( 'featured_links_title_1' ) === '' ) {
		$css .= '
			.featured-link:nth-child(1) .cv-inner {
			    display: none;
			}
		';
	}

	if ( ashe_options( 'featured_links_title_2' ) === '' ) {
		$css .= '
			.featured-link:nth-child(2) .cv-inner {
			    display: none;
			}
		';
	}
	
	if ( ashe_options( 'featured_links_title_3' ) === '' ) {
		$css .= '
			.featured-link:nth-child(3) .cv-inner {
			    display: none;
			}
		';
	}

	if ( ashe_options( 'featured_links_title_4' ) === '' ) {
		$css .= '
			.featured-link:nth-child(4) .cv-inner {
			    display: none;
			}
		';
	}

	if ( ashe_options( 'featured_links_title_5' ) === '' ) {
		$css .= '
			.featured-link:nth-child(5) .cv-inner {
			    display: none;
			}
		';
	}


/*
** Blog Page =====
*/

	// Gutter
	$css .= '	
		.blog-grid > li {
			margin-bottom: '. ashe_options( 'blog_page_gutter_vert' ) .'px;
		}

		[data-layout*="col2"] .blog-grid > li,
		[data-layout*="col3"] .blog-grid > li,
		[data-layout*="col4"] .blog-grid > li {
			display: inline-block;
			vertical-align: top;
			margin-right: '. ashe_options( 'blog_page_gutter_horz' ) .'px;
		}

		[data-layout*="col2"] .blog-grid > li:nth-of-type(2n+2),
		[data-layout*="col3"] .blog-grid > li:nth-of-type(3n+3),
		[data-layout*="col4"] .blog-grid > li:nth-of-type(4n+4) {
			margin-right: 0;
		}
		
		[data-layout*="col1"] .blog-grid > li {
			width: 100%;
		}

		[data-layout*="col2"] .blog-grid > li {
			width: calc((100% - '. ashe_options( 'blog_page_gutter_horz' ) .'px ) / 2 - 1px);
			width: -webkit-calc((100% - '. ashe_options( 'blog_page_gutter_horz' ) .'px ) / 2 - 1px);
		}

		[data-layout*="col3"] .blog-grid > li {
			width: calc((100% - 2 * '. ( ashe_options( 'blog_page_gutter_horz' ) ) .'px ) / 3 - 2px);
			width: -webkit-calc((100% - 2 * '. ( ashe_options( 'blog_page_gutter_horz' ) ) .'px ) / 3 - 2px);
		}

		[data-layout*="col4"] .blog-grid > li {
			width: calc((100% - 3 * '. ( ashe_options( 'blog_page_gutter_horz' ) ) .'px ) / 4 - 1px);
			width: -webkit-calc((100% - 3 * '. ( ashe_options( 'blog_page_gutter_horz' ) ) .'px ) / 4 - 1px);
		}

		[data-layout*="rsidebar"] .sidebar-right {
			padding-left: '. ashe_options( 'blog_page_gutter_horz' ) .'px;
		}

		[data-layout*="lsidebar"] .sidebar-left {
			padding-right: '. ashe_options( 'blog_page_gutter_horz' ) .'px;
		}

		[data-layout*="lrsidebar"] .sidebar-right {
			padding-left: '. ashe_options( 'blog_page_gutter_horz' ) .'px;
		}

		[data-layout*="lrsidebar"] .sidebar-left {
			padding-right: '. ashe_options( 'blog_page_gutter_horz' ) .'px;
		}
	';

	// Content Align
	$css .= '
		.blog-grid .post-header,
		.blog-grid .read-more,
		[data-layout*="list"] .post-share {
			text-align: '. ashe_options( 'blog_page_post_content_align' ) .';
		}
	';

	// Blog Page Dropcaps
	if ( ashe_options( 'blog_page_show_dropcups' ) === true ) {
		$css .= "
			.home .post-content > p:first-of-type:first-letter,
			.archive .post-content > p:first-of-type:first-letter {
				float: left;
				margin: 0px 12px 0 0;
				font-family: '". str_replace( '+', ' ', ashe_options( 'typography_head_family' ) ) ."';	
				font-size: 80px;
				line-height: 65px;
				text-align: center;
				text-transform: uppercase;
				color: ". ashe_options( 'colors_content_title' ) .";
			}

			@-moz-document url-prefix() {
				.home .post-content > p:first-of-type:first-letter,
				.archive .post-content > p:first-of-type:first-letter {
				    margin-top: 10px !important;
				}
			}
		";
	}

	// Single Page Dropcaps
	if ( ashe_options( 'single_page_show_dropcups' ) === true ) {
		$css .= "
			.single .post-content > p:first-of-type:first-letter {
			  	float: left;
				margin: 0px 12px 0 0;
				font-family: '". str_replace( '+', ' ', ashe_options( 'typography_head_family' ) ) ."';	
				font-size: 80px;
				line-height: 65px;
				text-align: center;
				text-transform: uppercase;
				color: ". ashe_options( 'colors_content_title' ) .";
			}

			@-moz-document url-prefix() {
				.single .post-content > p:first-of-type:first-letter {
				    margin-top: 10px !important;
				}
			}
		";
	}

	// Page Dropcaps
	$css .= "
		[data-dropcaps*='yes'] .post-content > p:first-of-type:first-letter {
			float: left;
			margin: 0px 12px 0 0;
			font-family: '". str_replace( '+', ' ', ashe_options( 'typography_head_family' ) ) ."';	
			font-size: 80px;
			line-height: 65px;
			text-align: center;
			text-transform: uppercase;
			color: ". ashe_options( 'colors_content_title' ) .";
		}

		@-moz-document url-prefix() {
			[data-dropcaps*='yes'] .post-content > p:first-of-type:first-letter {
			    margin-top: 10px !important;
			}
		}
			
	";

	if( ashe_options( 'blog_page_more_text' ) === '' ) {
		$css .= '
			.read-more {
			    display: none;
			}
		';	
	}

	if( ashe_options( 'blog_page_related_title' ) === '' ) {
		$css .= '
			body:not(.single) .related-posts h3 {
			    display: none;
			}
		';	
	}

	if( ashe_options( 'single_page_related_title' ) === '' ) {
		$css .= '
			.single .related-posts h3 {
			    display: none;
			}
		';	
	}


/*
** Page Footer =====
*/

	// Widget Columns

	if ( ashe_options( 'page_footer_columns' ) === 'three' ) {
		$css .= '
			.footer-widgets > .ashe-widget {
				width: 30%;
				margin-right: 5%;
			}

			.footer-widgets > .ashe-widget:nth-child(3n+3) {
				margin-right: 0;
			}

			.footer-widgets > .ashe-widget:nth-child(3n+4) {
				clear: both;
			}
		';
	}

	if ( ashe_options( 'page_footer_columns' ) === 'four' ) {
		$css .= '
			.footer-widgets > .ashe-widget {
				width: 22%;
				margin-right: 4%;
			}

			.footer-widgets > .ashe-widget:nth-child(4n+4) {
				margin-right: 0;
			}

			.footer-widgets > .ashe-widget:nth-child(4n+5) {
				clear: both;
			}
		';
	}



	// Align

	if ( ashe_options( 'page_footer_align' ) === 'center' ) {
		$css .= '
			.footer-copyright {
				text-align: center;
			}

			.footer-socials {
				margin-top: 12px;
			}
		'; 
	} elseif ( ashe_options( 'page_footer_align' ) === 'left-right' ) {
		$css .= '
			.copyright-info {
				float: left;
			}
			.footer-socials {
				float: right;
			}
		'; 
	} elseif ( ashe_options( 'page_footer_align' ) === 'right-left' ) {
		$css .= '
			.copyright-info {
				float: right;
			}
			.footer-socials {
				float: left;
			}
		'; 
	}


/*
** Woocommerce =====
*/

if ( class_exists( 'WooCommerce' ) ) {

	// get shop page ID
	$shop_page_id = get_option( 'woocommerce_shop_page_id' );

	// Hide Shop Page Title
	if ( get_field( 'show_page_title', $shop_page_id ) !== 'yes' ) {
		$css .= '
			.woocommerce-result-count,
			.woocommerce-products-header {
			    display: none;
			}

			.woocommerce-ordering {
				margin-top: 0 !important;
			}
		';	
	}

	/* Text */
	$css .= '
		.woocommerce div.product .stock,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce ul.products li.product .price,
		.woocommerce-Reviews .woocommerce-review__author,
		.woocommerce form .form-row .required,
		.woocommerce form .form-row.woocommerce-invalid label,
		.woocommerce #page-content div.product .woocommerce-tabs ul.tabs li a {
		    color: '. ashe_options( 'colors_content_text' ) .';
		}

		.woocommerce a.remove:hover {
		    color: '. ashe_options( 'colors_content_text' ) .' !important;
		}
	';

	/* Meta */
	$css .= '
		.woocommerce a.remove,
		.woocommerce .product_meta,
		#page-content .woocommerce-breadcrumb,
		#page-content .woocommerce-review-link,
		#page-content .woocommerce-breadcrumb a,
		#page-content .woocommerce-MyAccount-navigation-link a,
		.woocommerce .woocommerce-info:before,
		.woocommerce #page-content .woocommerce-result-count,
		.woocommerce-page #page-content .woocommerce-result-count,
		.woocommerce-Reviews .woocommerce-review__published-date,
		.woocommerce.product_list_widget .quantity,
		.woocommerce.widget_shopping_cart .quantity,
		.woocommerce.widget_products .amount,
		.woocommerce.widget_price_filter .price_slider_amount,
		.woocommerce.widget_recently_viewed_products .amount,
		.woocommerce.widget_top_rated_products .amount,
		.woocommerce.widget_recent_reviews .reviewer {
		    color: '. ashe_options( 'colors_content_meta' ) .';
		}

		.woocommerce a.remove {
		    color: '. ashe_options( 'colors_content_meta' ) .' !important;
		}
	';

	/* Accent */
	$css .= '
		p.demo_store,
		.woocommerce-store-notice,
		.woocommerce span.onsale {
		   background-color: '. ashe_options( 'colors_content_accent' ) .';
		}

		.woocommerce .star-rating::before,
		.woocommerce .star-rating span::before,
		.woocommerce #page-content ul.products li.product .button,
		#page-content .woocommerce ul.products li.product .button,
		#page-content .woocommerce-MyAccount-navigation-link.is-active a,
		#page-content .woocommerce-MyAccount-navigation-link a:hover {
		   color: '. ashe_options( 'colors_content_accent' ) .';
		}
	';

	/* Border Color */
	$css .= '
		.woocommerce form.login,
		.woocommerce form.register,
		.woocommerce-account fieldset,
		.woocommerce form.checkout_coupon,
		.woocommerce .woocommerce-info,
		.woocommerce .woocommerce-error,
		.woocommerce .woocommerce-message,
		.woocommerce.widget_shopping_cart .total,
		.woocommerce-Reviews .comment_container,
		.woocommerce-cart #payment ul.payment_methods,
		#add_payment_method #payment ul.payment_methods,
		.woocommerce-checkout #payment ul.payment_methods,
		.woocommerce div.product .woocommerce-tabs ul.tabs::before,
		.woocommerce div.product .woocommerce-tabs ul.tabs::after,
		.woocommerce div.product .woocommerce-tabs ul.tabs li,
		.woocommerce .woocommerce-MyAccount-navigation-link,
		.select2-container--default .select2-selection--single {
			border-color: '. ashe_options( 'colors_content_border' ) .';
		}

		.woocommerce-cart #payment,
		#add_payment_method #payment,
		.woocommerce-checkout #payment,
		.woocommerce .woocommerce-info,
		.woocommerce .woocommerce-error,
		.woocommerce .woocommerce-message,
		.woocommerce div.product .woocommerce-tabs ul.tabs li {
			background-color: '. ashe_hex2rgba( ashe_options( 'colors_content_border' ), 0.3 ) .';
		}

		.woocommerce-cart #payment div.payment_box::before,
		#add_payment_method #payment div.payment_box::before,
		.woocommerce-checkout #payment div.payment_box::before {
			border-color: '. ashe_hex2rgba( ashe_options( 'colors_content_border' ), 0.5 ) .';
		}

		.woocommerce-cart #payment div.payment_box,
		#add_payment_method #payment div.payment_box,
		.woocommerce-checkout #payment div.payment_box {
			background-color: '. ashe_hex2rgba( ashe_options( 'colors_content_border' ), 0.5 ) .';
		}
	';

	/* Buttons */
	$css .= '
		#page-content .woocommerce input.button,
		#page-content .woocommerce a.button,
		#page-content .woocommerce a.button.alt,
		#page-content .woocommerce button.button.alt,
		#page-content .woocommerce input.button.alt,
		#page-content .woocommerce #respond input#submit.alt,
		#page-content .woocommerce.widget_product_search input[type="submit"],
		#page-content .woocommerce.widget_price_filter .button,
		.woocommerce #page-content .woocommerce-message .button,
		.woocommerce #page-content a.button.alt,
		.woocommerce #page-content button.button.alt,
		.woocommerce #page-content #respond input#submit,
		.woocommerce #page-content .woocommerce-message .button,
		.woocommerce-page #page-content .woocommerce-message .button {
			color: '. ashe_options( 'colors_button_text' ) .';
			background-color: '. ashe_options( 'colors_button' ) .';
		}

		#page-content .woocommerce input.button:hover,
		#page-content .woocommerce a.button:hover,
		#page-content .woocommerce a.button.alt:hover,
		#page-content .woocommerce button.button.alt:hover,
		#page-content .woocommerce input.button.alt:hover,
		#page-content .woocommerce #respond input#submit.alt:hover,
		#page-content .woocommerce.widget_price_filter .button:hover,
		.woocommerce #page-content .woocommerce-message .button:hover,
		.woocommerce #page-content a.button.alt:hover,
		.woocommerce #page-content button.button.alt:hover,
		.woocommerce #page-content #respond input#submit:hover,
		.woocommerce #page-content .woocommerce-message .button:hover,
		.woocommerce-page #page-content .woocommerce-message .button:hover {
			color: '. ashe_options( 'colors_button_hover_text' ) .';
			background-color: '. ashe_options( 'colors_button_hover' ) .';
		}

	
	';

	// Typography
	$css .= "
		.woocommerce ul.products li.product .woocommerce-loop-category__title,
		.woocommerce ul.products li.product .woocommerce-loop-product__title,
		.woocommerce ul.products li.product h3 {
			font-size: ". ashe_typography_calc( 'head_size', 2.4 ) ."px;
		}

		.upsells.products > h2,
		.crosssells.products > h2,
		.related.products > h2 {
			font-family: '". str_replace( '+', ' ', ashe_options( 'typography_body_family' ) ) ."';
			font-size: ". ashe_typography_calc( 'body_size', 10 ) ."px;
		}

		/* letter-spacing 2+ */
		.woocommerce #page-content ul.products li.product .button,
		#page-content .woocommerce ul.products li.product .button {
			letter-spacing: ". ashe_typography_calc_plus( 'body_spacing', 2 ) ."px;
		}
	
		/* letter-spacing 1.5+ */
		.woocommerce div.product .woocommerce-tabs .panel > h2,
		.woocommerce #reviews #comments h2,
		.woocommerce .cart-collaterals .cross-sells > h2,
		.woocommerce-page .cart-collaterals .cross-sells > h2,
		.woocommerce .cart-collaterals .cart_totals > h2,
		.woocommerce-page .cart-collaterals .cart_totals > h2,
		.woocommerce-billing-fields > h3,
		.woocommerce-shipping-fields > h3,
		#order_review_heading,
		#customer_login h2,
		.woocommerce-Address-title h3,
		.woocommerce-order-details__title,
		.woocommerce-customer-details h2,
		.woocommerce-columns--addresses h3,
		.upsells.products > h2,
		.crosssells.products > h2,
		.related.products > h2 {
			letter-spacing: ". ashe_typography_calc_plus( 'body_spacing', 1.5 ) ."px;
		}

		/* font-size 16+ */
		.woocommerce div.product .woocommerce-tabs .panel > h2,
		.woocommerce #reviews #comments h2,
		.woocommerce .cart-collaterals .cross-sells > h2,
		.woocommerce-page .cart-collaterals .cross-sells > h2,
		.woocommerce .cart-collaterals .cart_totals > h2,
		.woocommerce-page .cart-collaterals .cart_totals > h2,
		.woocommerce-billing-fields > h3,
		.woocommerce-shipping-fields > h3,
		#order_review_heading,
		#customer_login h2,
		.woocommerce-Address-title h3,
		.woocommerce-order-details__title,
		.woocommerce-customer-details h2,
		.woocommerce-columns--addresses h3 {
			font-size: ". ashe_typography_calc( 'body_size', 0.48 ) ."px;
		}

		/* Font Size 11px */
		.woocommerce #page-content ul.products li.product .button,
		#page-content .woocommerce ul.products li.product .button,
		.woocommerce-Reviews .woocommerce-review__published-date {
			font-size: ". ashe_typography_calc( 'body_size', 4 ) ."px;
		}


		.woocommerce-Reviews .woocommerce-review__author {
			font-size: ". ashe_options( 'typography_body_size' ) ."px;
		}

		/* Font Size 13px */
		.woocommerce-result-count,
		.woocommerce ul.products li.product .price,
		.woocommerce .product_meta,
		.woocommerce.widget_shopping_cart .quantity,
		.woocommerce.product_list_widget .quantity,
		.woocommerce.widget_products .amount,
		.woocommerce.widget_price_filter .price_slider_amount,
		.woocommerce.widget_recently_viewed_products .amount,
		.woocommerce.widget_top_rated_products .amount,
		.woocommerce.widget_recent_reviews .reviewer,
		.woocommerce-Reviews .woocommerce-review__author {
			font-size: ". ashe_typography_calc( 'body_size', 6 ) ."px;
		}

		#page-content .woocommerce input.button,
		#page-content .woocommerce a.button,
		#page-content .woocommerce a.button.alt,
		#page-content .woocommerce button.button.alt,
		#page-content .woocommerce input.button.alt,
		#page-content .woocommerce #respond input#submit.alt,
		#page-content .woocommerce.widget_price_filter .button,
		.woocommerce #page-content .woocommerce-message .button,
		.woocommerce #page-content a.button.alt,
		.woocommerce #page-content button.button.alt,
		.woocommerce #page-content #respond input#submit,
		.woocommerce #page-content .woocommerce-message .button,
		.woocommerce-page #page-content .woocommerce-message .button,
		.woocommerce form .form-row .required {
			font-size: ". ashe_typography_calc( 'body_size', 10 ) ."px;
			letter-spacing: ". ashe_typography_calc_plus( 'body_spacing', 1 ) ."px;
		}

	";

	// Grid
	if ( class_exists( 'WooCommerce' ) ) {

		if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
		$css .= '

			.woocommerce [data-layout*="col2"] ul.products li.product,
			.woocommerce-page [data-layout*="col2"] ul.products li.product {
				width: 49%;
				margin-right: 2%;
				margin-bottom: 2.992em;
			}

			.woocommerce [data-layout*="col3"] ul.products li.product,
			.woocommerce-page [data-layout*="col3"] ul.products li.product {
				width: 32%;
				margin-right: 2%;
				margin-bottom: 2.992em;
			}

			.woocommerce [data-layout*="col4"] ul.products li.product,
			.woocommerce-page [data-layout*="col4"] ul.products li.product {
				width: 22.6%;
				margin-right: 3.2%;
				margin-bottom: 2.992em;
			}
		
		';
		}

	}
	
} // end check - woocommerce is active


/*
** Preloader =====
*/

	if ( ashe_options('preloader_type') === 'animation_1' ) {
		$css .= '.cssload-container{width:100%;height:36px;text-align:center}.cssload-speeding-wheel{width:36px;height:36px;margin:0 auto;border:2px solid '.ashe_options('colors_preloader_anim').';border-radius:50%;border-left-color:transparent;border-right-color:transparent;animation:cssload-spin 575ms infinite linear;-o-animation:cssload-spin 575ms infinite linear;-ms-animation:cssload-spin 575ms infinite linear;-webkit-animation:cssload-spin 575ms infinite linear;-moz-animation:cssload-spin 575ms infinite linear}@keyframes cssload-spin{100%{transform:rotate(360deg);transform:rotate(360deg)}}@-o-keyframes cssload-spin{100%{-o-transform:rotate(360deg);transform:rotate(360deg)}}@-ms-keyframes cssload-spin{100%{-ms-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes cssload-spin{100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@-moz-keyframes cssload-spin{100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_2' ) {
		$css .= '.cssload-container{width:100%;height:44px;text-align:center}.cssload-tube-tunnel{width:44px;height:44px;margin:0 auto;border:3px solid;border-radius:50%;border-color:'.ashe_options('colors_preloader_anim').';animation:cssload-scale 1035ms infinite linear;-o-animation:cssload-scale 1035ms infinite linear;-ms-animation:cssload-scale 1035ms infinite linear;-webkit-animation:cssload-scale 1035ms infinite linear;-moz-animation:cssload-scale 1035ms infinite linear}@keyframes cssload-scale{0%{transform:scale(0);transform:scale(0)}90%{transform:scale(0.7);transform:scale(0.7)}100%{transform:scale(1);transform:scale(1)}}@-o-keyframes cssload-scale{0%{-o-transform:scale(0);transform:scale(0)}90%{-o-transform:scale(0.7);transform:scale(0.7)}100%{-o-transform:scale(1);transform:scale(1)}}@-ms-keyframes cssload-scale{0%{-ms-transform:scale(0);transform:scale(0)}90%{-ms-transform:scale(0.7);transform:scale(0.7)}100%{-ms-transform:scale(1);transform:scale(1)}}@-webkit-keyframes cssload-scale{0%{-webkit-transform:scale(0);transform:scale(0)}90%{-webkit-transform:scale(0.7);transform:scale(0.7)}100%{-webkit-transform:scale(1);transform:scale(1)}}@-moz-keyframes cssload-scale{0%{-moz-transform:scale(0);transform:scale(0)}90%{-moz-transform:scale(0.7);transform:scale(0.7)}100%{-moz-transform:scale(1);transform:scale(1)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_3' ) {
		$css .= '.cssload-loader{display:block;margin:0 auto;width:29px;height:29px;position:relative;border:4px solid '.ashe_options('colors_preloader_anim').';animation:cssload-loader 2.3s infinite ease;-o-animation:cssload-loader 2.3s infinite ease;-ms-animation:cssload-loader 2.3s infinite ease;-webkit-animation:cssload-loader 2.3s infinite ease;-moz-animation:cssload-loader 2.3s infinite ease}.cssload-loader-inner{vertical-align:top;display:inline-block;width:100%;background-color:'.ashe_options('colors_preloader_anim').';animation:cssload-loader-inner 2.3s infinite ease-in;-o-animation:cssload-loader-inner 2.3s infinite ease-in;-ms-animation:cssload-loader-inner 2.3s infinite ease-in;-webkit-animation:cssload-loader-inner 2.3s infinite ease-in;-moz-animation:cssload-loader-inner 2.3s infinite ease-in}@keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-o-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-ms-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-webkit-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-moz-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-o-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-ms-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-webkit-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-moz-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}';
	} elseif ( ashe_options('preloader_type') === 'animation_4' ) {
		$css .= '.cssload-fond{position:relative;margin:auto}.cssload-container-general{animation:cssload-animball_two 1.15s infinite;-o-animation:cssload-animball_two 1.15s infinite;-ms-animation:cssload-animball_two 1.15s infinite;-webkit-animation:cssload-animball_two 1.15s infinite;-moz-animation:cssload-animball_two 1.15s infinite;width:43px;height:43px}.cssload-internal{width:43px;height:43px;position:absolute}.cssload-ballcolor{width:19px;height:19px;border-radius:50%}.cssload-ball_1,.cssload-ball_2,.cssload-ball_3,.cssload-ball_4{position:absolute;animation:cssload-animball_one 1.15s infinite ease;-o-animation:cssload-animball_one 1.15s infinite ease;-ms-animation:cssload-animball_one 1.15s infinite ease;-webkit-animation:cssload-animball_one 1.15s infinite ease;-moz-animation:cssload-animball_one 1.15s infinite ease}.cssload-ball_1{background-color:'.ashe_options('colors_preloader_anim').';top:0;left:0}.cssload-ball_2{background-color:'.ashe_options('colors_preloader_anim').';top:0;left:23px}.cssload-ball_3{background-color:'.ashe_options('colors_preloader_anim').';top:23px;left:0}.cssload-ball_4{background-color:'.ashe_options('colors_preloader_anim').';top:23px;left:23px}@keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-o-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-ms-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-webkit-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-moz-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@keyframes cssload-animball_two{0%{transform:rotate(0deg) scale(1)}50%{transform:rotate(360deg) scale(1.3)}100%{transform:rotate(720deg) scale(1)}}@-o-keyframes cssload-animball_two{0%{-o-transform:rotate(0deg) scale(1)}50%{-o-transform:rotate(360deg) scale(1.3)}100%{-o-transform:rotate(720deg) scale(1)}}@-ms-keyframes cssload-animball_two{0%{-ms-transform:rotate(0deg) scale(1)}50%{-ms-transform:rotate(360deg) scale(1.3)}100%{-ms-transform:rotate(720deg) scale(1)}}@-webkit-keyframes cssload-animball_two{0%{-webkit-transform:rotate(0deg) scale(1)}50%{-webkit-transform:rotate(360deg) scale(1.3)}100%{-webkit-transform:rotate(720deg) scale(1)}}@-moz-keyframes cssload-animball_two{0%{-moz-transform:rotate(0deg) scale(1)}50%{-moz-transform:rotate(360deg) scale(1.3)}100%{-moz-transform:rotate(720deg) scale(1)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_5' ) {
		$css .= '#loadFacebookG{width:35px;height:35px;display:block;position:relative;margin:auto}.facebook_blockG{background-color:'.ashe_options('colors_preloader_anim').';border:1px solid '.ashe_options('colors_preloader_anim').';float:left;height:25px;margin-left:2px;width:7px;opacity:.1;animation-name:bounceG;-o-animation-name:bounceG;-ms-animation-name:bounceG;-webkit-animation-name:bounceG;-moz-animation-name:bounceG;animation-duration:1.235s;-o-animation-duration:1.235s;-ms-animation-duration:1.235s;-webkit-animation-duration:1.235s;-moz-animation-duration:1.235s;animation-iteration-count:infinite;-o-animation-iteration-count:infinite;-ms-animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;-moz-animation-iteration-count:infinite;animation-direction:normal;-o-animation-direction:normal;-ms-animation-direction:normal;-webkit-animation-direction:normal;-moz-animation-direction:normal;transform:scale(0.7);-o-transform:scale(0.7);-ms-transform:scale(0.7);-webkit-transform:scale(0.7);-moz-transform:scale(0.7)}#blockG_1{animation-delay:.3695s;-o-animation-delay:.3695s;-ms-animation-delay:.3695s;-webkit-animation-delay:.3695s;-moz-animation-delay:.3695s}#blockG_2{animation-delay:.496s;-o-animation-delay:.496s;-ms-animation-delay:.496s;-webkit-animation-delay:.496s;-moz-animation-delay:.496s}#blockG_3{animation-delay:.6125s;-o-animation-delay:.6125s;-ms-animation-delay:.6125s;-webkit-animation-delay:.6125s;-moz-animation-delay:.6125s}@keyframes bounceG{0%{transform:scale(1.2);opacity:1}100%{transform:scale(0.7);opacity:.1}}@-o-keyframes bounceG{0%{-o-transform:scale(1.2);opacity:1}100%{-o-transform:scale(0.7);opacity:.1}}@-ms-keyframes bounceG{0%{-ms-transform:scale(1.2);opacity:1}100%{-ms-transform:scale(0.7);opacity:.1}}@-webkit-keyframes bounceG{0%{-webkit-transform:scale(1.2);opacity:1}100%{-webkit-transform:scale(0.7);opacity:.1}}@-moz-keyframes bounceG{0%{-moz-transform:scale(1.2);opacity:1}100%{-moz-transform:scale(0.7);opacity:.1}}';
	} elseif ( ashe_options('preloader_type') === 'animation_6' ) {
		$css .= '.loader{height:42px;left:50%;position:absolute;transform:translateX(-50%) translateY(-50%);-o-transform:translateX(-50%) translateY(-50%);-ms-transform:translateX(-50%) translateY(-50%);-webkit-transform:translateX(-50%) translateY(-50%);-moz-transform:translateX(-50%) translateY(-50%);width:42px}.loader span{background:'.ashe_options('colors_preloader_anim').';display:block;height:8px;opacity:0;position:absolute;width:8px;animation:load 3s ease-in-out infinite;-o-animation:load 3s ease-in-out infinite;-ms-animation:load 3s ease-in-out infinite;-webkit-animation:load 3s ease-in-out infinite;-moz-animation:load 3s ease-in-out infinite}.loader span.block-1{animation-delay:.686s;-o-animation-delay:.686s;-ms-animation-delay:.686s;-webkit-animation-delay:.686s;-moz-animation-delay:.686s;left:0;top:0}.loader span.block-2{animation-delay:.632s;-o-animation-delay:.632s;-ms-animation-delay:.632s;-webkit-animation-delay:.632s;-moz-animation-delay:.632s;left:11px;top:0}.loader span.block-3{animation-delay:.568s;-o-animation-delay:.568s;-ms-animation-delay:.568s;-webkit-animation-delay:.568s;-moz-animation-delay:.568s;left:22px;top:0}.loader span.block-4{animation-delay:.514s;-o-animation-delay:.514s;-ms-animation-delay:.514s;-webkit-animation-delay:.514s;-moz-animation-delay:.514s;left:34px;top:0}.loader span.block-5{animation-delay:.45s;-o-animation-delay:.45s;-ms-animation-delay:.45s;-webkit-animation-delay:.45s;-moz-animation-delay:.45s;left:0;top:11px}.loader span.block-6{animation-delay:.386s;-o-animation-delay:.386s;-ms-animation-delay:.386s;-webkit-animation-delay:.386s;-moz-animation-delay:.386s;left:11px;top:11px}.loader span.block-7{animation-delay:.332s;-o-animation-delay:.332s;-ms-animation-delay:.332s;-webkit-animation-delay:.332s;-moz-animation-delay:.332s;left:22px;top:11px}.loader span.block-8{animation-delay:.268s;-o-animation-delay:.268s;-ms-animation-delay:.268s;-webkit-animation-delay:.268s;-moz-animation-delay:.268s;left:34px;top:11px}.loader span.block-9{animation-delay:.214s;-o-animation-delay:.214s;-ms-animation-delay:.214s;-webkit-animation-delay:.214s;-moz-animation-delay:.214s;left:0;top:22px}.loader span.block-10{animation-delay:.15s;-o-animation-delay:.15s;-ms-animation-delay:.15s;-webkit-animation-delay:.15s;-moz-animation-delay:.15s;left:11px;top:22px}.loader span.block-11{animation-delay:.086s;-o-animation-delay:.086s;-ms-animation-delay:.086s;-webkit-animation-delay:.086s;-moz-animation-delay:.086s;left:22px;top:22px}.loader span.block-12{animation-delay:.032s;-o-animation-delay:.032s;-ms-animation-delay:.032s;-webkit-animation-delay:.032s;-moz-animation-delay:.032s;left:34px;top:22px}.loader span.block-13{animation-delay:-.032s;-o-animation-delay:-.032s;-ms-animation-delay:-.032s;-webkit-animation-delay:-.032s;-moz-animation-delay:-.032s;left:0;top:34px}.loader span.block-14{animation-delay:-.086s;-o-animation-delay:-.086s;-ms-animation-delay:-.086s;-webkit-animation-delay:-.086s;-moz-animation-delay:-.086s;left:11px;top:34px}.loader span.block-15{animation-delay:-.15s;-o-animation-delay:-.15s;-ms-animation-delay:-.15s;-webkit-animation-delay:-.15s;-moz-animation-delay:-.15s;left:22px;top:34px}.loader span.block-16{animation-delay:-.214s;-o-animation-delay:-.214s;-ms-animation-delay:-.214s;-webkit-animation-delay:-.214s;-moz-animation-delay:-.214s;left:34px;top:34px}@keyframes load{0%{opacity:0;transform:translateY(-70px)}15%{opacity:0;transform:translateY(-70px)}30%{opacity:1;transform:translateY(0)}70%{opacity:1;transform:translateY(0)}85%{opacity:0;transform:translateY(70px)}100%{opacity:0;transform:translateY(70px)}}@-o-keyframes load{0%{opacity:0;-o-transform:translateY(-70px)}15%{opacity:0;-o-transform:translateY(-70px)}30%{opacity:1;-o-transform:translateY(0)}70%{opacity:1;-o-transform:translateY(0)}85%{opacity:0;-o-transform:translateY(70px)}100%{opacity:0;-o-transform:translateY(70px)}}@-ms-keyframes load{0%{opacity:0;-ms-transform:translateY(-70px)}15%{opacity:0;-ms-transform:translateY(-70px)}30%{opacity:1;-ms-transform:translateY(0)}70%{opacity:1;-ms-transform:translateY(0)}85%{opacity:0;-ms-transform:translateY(70px)}100%{opacity:0;-ms-transform:translateY(70px)}}@-webkit-keyframes load{0%{opacity:0;-webkit-transform:translateY(-70px)}15%{opacity:0;-webkit-transform:translateY(-70px)}30%{opacity:1;-webkit-transform:translateY(0)}70%{opacity:1;-webkit-transform:translateY(0)}85%{opacity:0;-webkit-transform:translateY(70px)}100%{opacity:0;-webkit-transform:translateY(70px)}}@-moz-keyframes load{0%{opacity:0;-moz-transform:translateY(-70px)}15%{opacity:0;-moz-transform:translateY(-70px)}30%{opacity:1;-moz-transform:translateY(0)}70%{opacity:1;-moz-transform:translateY(0)}85%{opacity:0;-moz-transform:translateY(70px)}100%{opacity:0;-moz-transform:translateY(70px)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_7' ) {
		$css .= '.cssload-cube{background-color:'.ashe_options('colors_preloader_anim').';width:9px;height:9px;position:absolute;margin:auto;animation:cssload-cubemove 2s infinite ease-in-out;-o-animation:cssload-cubemove 2s infinite ease-in-out;-ms-animation:cssload-cubemove 2s infinite ease-in-out;-webkit-animation:cssload-cubemove 2s infinite ease-in-out;-moz-animation:cssload-cubemove 2s infinite ease-in-out}.cssload-cube1{left:13px;top:0;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube2{left:25px;top:0;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube3{left:38px;top:0;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube4{left:0;top:13px;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube5{left:13px;top:13px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube6{left:25px;top:13px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube7{left:38px;top:13px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube8{left:0;top:25px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube9{left:13px;top:25px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube10{left:25px;top:25px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube11{left:38px;top:25px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube12{left:0;top:38px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube13{left:13px;top:38px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube14{left:25px;top:38px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube15{left:38px;top:38px;animation-delay:.6s;-o-animation-delay:.6s;-ms-animation-delay:.6s;-webkit-animation-delay:.6s;-moz-animation-delay:.6s}.cssload-spinner{margin:auto;width:49px;height:49px;position:relative}@keyframes cssload-cubemove{35%{transform:scale(0.005)}50%{transform:scale(1.7)}65%{transform:scale(0.005)}}@-o-keyframes cssload-cubemove{35%{-o-transform:scale(0.005)}50%{-o-transform:scale(1.7)}65%{-o-transform:scale(0.005)}}@-ms-keyframes cssload-cubemove{35%{-ms-transform:scale(0.005)}50%{-ms-transform:scale(1.7)}65%{-ms-transform:scale(0.005)}}@-webkit-keyframes cssload-cubemove{35%{-webkit-transform:scale(0.005)}50%{-webkit-transform:scale(1.7)}65%{-webkit-transform:scale(0.005)}}@-moz-keyframes cssload-cubemove{35%{-moz-transform:scale(0.005)}50%{-moz-transform:scale(1.7)}65%{-moz-transform:scale(0.005)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_8' ) {
		$css .= '.cssload-loader{width:24px;height:24px;position:absolute;left:50%;transform:translate3d(-50%,-50%,0);-o-transform:translate3d(-50%,-50%,0);-ms-transform:translate3d(-50%,-50%,0);-webkit-transform:translate3d(-50%,-50%,0);-moz-transform:translate3d(-50%,-50%,0);perspective:1200px;-o-perspective:1200;-ms-perspective:1200;-webkit-perspective:1200;-moz-perspective:1200}.cssload-flipper{position:relative;display:block;height:inherit;width:inherit;animation:cssload-flip 1.38s infinite ease-in-out;-o-animation:cssload-flip 1.38s infinite ease-in-out;-ms-animation:cssload-flip 1.38s infinite ease-in-out;-webkit-animation:cssload-flip 1.38s infinite ease-in-out;-moz-animation:cssload-flip 1.38s infinite ease-in-out;transform-style:preserve-3d;-o-transform-style:preserve-3d;-ms-transform-style:preserve-3d;-webkit-transform-style:preserve-3d;-moz-transform-style:preserve-3d}.cssload-front,.cssload-back{position:absolute;top:0;left:0;display:block;background-color:'.ashe_options('colors_preloader_anim').';height:100%;width:100%;backface-visibility:hidden}.cssload-back{background-color:'.ashe_options('colors_preloader_anim').';z-index:800;transform:rotateY(-180deg);-o-transform:rotateY(-180deg);-ms-transform:rotateY(-180deg);-webkit-transform:rotateY(-180deg);-moz-transform:rotateY(-180deg)}@keyframes cssload-flip{0%{transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-o-keyframes cssload-flip{0%{-o-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-o-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-o-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-ms-keyframes cssload-flip{0%{-ms-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-ms-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-ms-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-webkit-keyframes cssload-flip{0%{-webkit-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-webkit-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-webkit-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-moz-keyframes cssload-flip{0%{-moz-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-moz-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-moz-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_9' ) {
		$css .= '.cssload-box-loading{width:37px;height:37px;margin:auto;position:absolute;left:0;right:0;top:0;bottom:0}.cssload-box-loading:before{content:"";width:37px;height:4px;background:'.ashe_options('colors_preloader_anim').';opacity:.1;position:absolute;top:44px;left:0;border-radius:50%;animation:shadow .58s linear infinite;-o-animation:shadow .58s linear infinite;-ms-animation:shadow .58s linear infinite;-webkit-animation:shadow .58s linear infinite;-moz-animation:shadow .58s linear infinite}.cssload-box-loading:after{content:"";width:37px;height:37px;background:'.ashe_options('colors_preloader_anim').';position:absolute;top:0;left:0;border-radius:2px;animation:cssload-animate .58s linear infinite;-o-animation:cssload-animate .58s linear infinite;-ms-animation:cssload-animate .58s linear infinite;-webkit-animation:cssload-animate .58s linear infinite;-moz-animation:cssload-animate .58s linear infinite}@keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{transform:translateY(7px) rotate(22.5deg)}50%{transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{transform:translateY(7px) rotate(67.5deg)}100%{transform:translateY(0) rotate(90deg)}}@-o-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-o-transform:translateY(7px) rotate(22.5deg)}50%{-o-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-o-transform:translateY(7px) rotate(67.5deg)}100%{-o-transform:translateY(0) rotate(90deg)}}@-ms-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-ms-transform:translateY(7px) rotate(22.5deg)}50%{-ms-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-ms-transform:translateY(7px) rotate(67.5deg)}100%{-ms-transform:translateY(0) rotate(90deg)}}@-webkit-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-webkit-transform:translateY(7px) rotate(22.5deg)}50%{-webkit-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-webkit-transform:translateY(7px) rotate(67.5deg)}100%{-webkit-transform:translateY(0) rotate(90deg)}}@-moz-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-moz-transform:translateY(7px) rotate(22.5deg)}50%{-moz-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-moz-transform:translateY(7px) rotate(67.5deg)}100%{-moz-transform:translateY(0) rotate(90deg)}}@keyframes shadow{0%,100%{transform:scale(1,1)}50%{transform:scale(1.2,1)}}@-o-keyframes shadow{0%,100%{-o-transform:scale(1,1)}50%{-o-transform:scale(1.2,1)}}@-ms-keyframes shadow{0%,100%{-ms-transform:scale(1,1)}50%{-ms-transform:scale(1.2,1)}}@-webkit-keyframes shadow{0%,100%{-webkit-transform:scale(1,1)}50%{-webkit-transform:scale(1.2,1)}}@-moz-keyframes shadow{0%,100%{-moz-transform:scale(1,1)}50%{-moz-transform:scale(1.2,1)}}';
	}



// end style block
$css .= '</style>';

// return generated & compressed CSS
echo str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css); 


} // end ashe_dynamic_css()
add_action( 'wp_head', 'ashe_dynamic_css' );