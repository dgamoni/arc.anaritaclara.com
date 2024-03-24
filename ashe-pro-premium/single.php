<?php

get_header();

if ( get_field( 'hide_post_sidebar' ) === 'yes' ) {
	$blog_single_layout = 'fullwidth';
} else {
	$blog_single_layout = ashe_page_layout();
}

?>


<div class="main-content clear-fix<?php echo ( ashe_options( 'general_single_width' ) === 'boxed' && get_field( 'full_width_post_content' )!== 'yes' ) ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( $blog_single_layout ); ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' ) ); ?>" data-sidebar-width="<?php echo esc_attr( ashe_options( 'general_sidebar_width' ) ); ?>">

	<?php

	// Sidebar Left
	if ( get_field( 'hide_post_sidebar' ) !== 'yes' ) {
		get_template_part( 'templates/sidebars/sidebar', 'left' );
	}

	?>

	<!-- Main Container -->
	<div class="main-container">

		<?php

		// Single Post
		get_template_part( 'templates/single/post', 'content' );

		// Author Description
		if ( ashe_options( 'single_page_show_author_desc' ) === true ) {
			get_template_part( 'templates/single/author', 'description' );
		}

		// Single Navigation
		if ( ashe_options( 'single_page_show_author_nav' ) === true ) {
			get_template_part( 'templates/single/single', 'navigation' );
		}
	
		// Related Posts
		if ( ashe_options( 'single_page_related_orderby' ) !== 'none' ) {
			ashe_related_posts( ashe_options( 'single_page_related_title' ), ashe_options( 'single_page_related_orderby' ) );
		}

		// Comments
		if ( ashe_options( 'single_page_show_comments_area' ) === true ) {
			get_template_part( 'templates/single/comments', 'area' );
		}

		?>

	</div><!-- .main-container -->


	<?php // Sidebar Right

	if ( get_field( 'hide_post_sidebar' ) !== 'yes' ) {
		get_template_part( 'templates/sidebars/sidebar', 'right' );
	}

	?>

</div>

<?php get_footer(); ?>