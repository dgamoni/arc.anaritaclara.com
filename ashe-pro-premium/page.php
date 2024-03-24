<?php

get_header();

if ( have_posts() ) :

// Loop Start
while ( have_posts() ) : the_post();

	if ( get_field( 'show_page_featured_slider' ) === 'yes' || get_field( 'show_page_featured_links' ) !== 'no' ) {

		// Featured Slider
		if ( get_field( 'show_page_featured_slider' ) === 'yes' ) {
			get_template_part( 'templates/header/featured', 'slider' );
		}

		// Featured Links
		if ( get_field( 'show_page_featured_links' ) === 'yes' ) {
			get_template_part( 'templates/header/featured', 'links' );
		}
	}

?>


<div class="main-content clear-fix<?php echo ( get_field( 'full_width_page_content' ) !== 'yes' ) ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( get_field( 'show_page_sidebar' ) ); ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' ) ); ?>" data-sidebar-width="<?php echo esc_attr( ashe_options( 'general_sidebar_width' ) ); ?>" data-dropcaps="<?php echo esc_attr( get_field( 'show_page_dropcups' ) ); ?>">

	<?php

	if ( get_field( 'show_page_sidebar' ) !== 'fullwidth' ) {
		
		// Sidebar Left
		if ( get_field( 'show_page_sidebar' ) === 'lsidebar' ||  get_field( 'show_page_sidebar' ) === 'lrsidebar' ) {
			get_template_part( 'templates/sidebars/sidebar', 'left' );
		}
	}

 	?>

	<!-- Main Container -->
	<div class="main-container">
		
		<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php

			// Featured Image
			if ( has_post_thumbnail() && get_field( 'show_featured_image' ) !== 'no' ) {
				echo '<div class="post-media">';
					if ( get_field( 'full_width_page_content' ) !== 'yes' ) {
						the_post_thumbnail( 'ashe-full-thumbnail' );
					} else {
						the_post_thumbnail( 'full' );
					}
				echo '</div>';
			}

			// Page Title
			if ( get_field( 'show_page_title' ) !== 'no' && get_the_title() !== '' ) {
				echo '<header class="post-header">';
					echo '<h1 class="page-title">'. get_the_title() .'</h1>';
				echo '</header>';
			}

			// Page Content
			echo '<div class="post-content">';
				the_content('');
			echo '</div>';

			?>

		</article>

		<?php get_template_part( 'templates/single/comments', 'area' ); ?>

	</div><!-- .main-container -->


	<?php // Sidebar Right

	if ( get_field( 'show_page_sidebar' ) !== 'fullwidth' ) {
		if ( get_field( 'show_page_sidebar' ) === 'rsidebar' ||  get_field( 'show_page_sidebar' ) === 'lrsidebar' ) {
			get_template_part( 'templates/sidebars/sidebar', 'right' );
		}
	}

 	?>

</div>

<?php

// Loop End
endwhile;

endif;

get_footer();

?>