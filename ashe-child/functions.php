<?php

/**
 * Enqueue Styles
 */

function ashe_pro_child_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'ashe_pro_child_enqueue_styles' );

function ashe_post_thumbnail() {
	if ( has_post_thumbnail() ) {
		if ( substr( ashe_page_layout(), 0, 4 ) === 'col1' || is_single() ) {
			the_post_thumbnail( 'ashe-full-thumbnail' );	
		} else {
			the_post_thumbnail();
		}
	}
}

add_action('wp_footer', 'add_custom_css');
function add_custom_css() { ?>
	<script>
		jQuery(document).ready(function($) {

		});
	</script>
	<style>
		.bfi_700 {
			display: none;
		}
		[data-layout*="col2"] .blog-grid > li:nth-of-type(2n+2) {
		    /*margin-right: 0;*/
		    margin-right: 37px;
		}
		[data-layout*="col2"] .blog-grid > li:nth-of-type(2n+1) {
		    margin-right: 0;
		}	
		[data-layout*="col2"] .blog-grid > li:nth-child(1) {
		  width: 100%;
		  margin-right: 0;
		}
		[data-layout*="col2"] .blog-grid > li:nth-child(1) .size-ashe-grid-thumbnail {
			display: none;
		}
		[data-layout*="col2"] .blog-grid > li:nth-child(1) .bfi_700 {
			display: block;
		}
		[data-layout*="col2"] .blog-grid > li:nth-child(2) {
		  width: 100%;
		  margin-right: 0;
		}
		[data-layout*="col2"] .blog-grid > li:nth-child(2) .size-ashe-grid-thumbnail {
			display: none;
		}
		[data-layout*="col2"] .blog-grid > li:nth-child(2) .bfi_700 {
			display: block;
		}
		[data-layout*="col2"] .blog-grid > li:nth-child(3) {
		  width: 100%;
		  margin-right: 0;
		}
		[data-layout*="col2"] .blog-grid > li:nth-child(3) .size-ashe-grid-thumbnail {
			display: none;
		}
		[data-layout*="col2"] .blog-grid > li:nth-child(3) .bfi_700 {
			display: block;
		}

		[data-layout*="rsidebar"] .main-container, [data-layout*="lsidebar"] .main-container {
		    float: left;
		    width: calc(100% - 380px);
		    width: -webkit-calc(100% - 380px);
		}
		.sidebar-right-wrap {
			width:	380px !important;
		}
		.sidebar-left, .sidebar-right {
		    width: 380px;
		}

		@media screen and ( max-width: 979px ) {
			.sidebar-left-wrap, .sidebar-right-wrap {
			    width: 65% !important;
			}
		}

		@media screen and (max-width: 640px) {
			.sidebar-left-wrap, .sidebar-right-wrap {
			    width: 100% !important;
			}
		}

	</style>
	<?php
}

//add_action('pre_get_posts', 'myprefix_query_offset', 1 );
function myprefix_query_offset(&$query) {

	if ( !is_admin() && $query->is_paged && $query->is_main_query() ) {
			    $ppp = get_option('posts_per_page');

			    if ( $query->is_paged ) {
			        $query->set( 'posts_per_page', $ppp+1 );
			    }
			    else {

			    }
	}
}

require_once( get_stylesheet_directory(). '/inc/metaboxes/gmb-admin.php' );
require_once 'core/load.php'; 