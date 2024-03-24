<?php 

get_header();

if ( is_home() ) {

	if ( ashe_options( 'featured_slider_label' ) === true || ashe_options( 'featured_links_label' ) === true ) {
		// Featured Slider, Carousel
		if ( ashe_options( 'featured_slider_label' ) === true ) {
			get_template_part( 'templates/header/featured', 'slider' );
		}

		// Featured Links, Banners
		if ( ashe_options( 'featured_links_label' ) === true ) {
			get_template_part( 'templates/header/featured', 'links' ); 
		}
	}
}

?>

<div class="main-content clear-fix<?php echo ashe_options( 'general_content_width' ) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( ashe_page_layout() ); ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' ) ); ?>" data-sidebar-width="<?php echo esc_attr( ashe_options( 'general_sidebar_width' ) ); ?>">
	
	<?php get_template_part( 'templates/sidebars/sidebar', 'left' ); ?>

	<div class="main-container">

		<ul class="blog-grid">

		<?php

		// Loop Start
		if ( have_posts() ) : while ( have_posts() ) : the_post();

		echo '<li>';

		// Blog Feed Wrapper
		if ( strpos( ashe_page_layout(), 'list' ) === 0 ) {
			get_template_part( 'templates/grid/blog', 'list' );
		} else {
			get_template_part( 'templates/grid/blog', 'grid' );
		}

		echo '</li>';

		endwhile; // Loop End

		else:

	 	?>

		<div class="no-result-found">
			<h1><?php esc_html_e( 'Nothing Found!', 'ashe-pro' ); ?></h1>
			<p>
				<?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to ', 'ashe-pro' ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'ashe-pro' ); ?></a>
			</p>
			<div class="ashe-widget widget_search">
				<?php get_search_form(); ?>
			</div> 	
		</div>

		<?php endif; ?>

		</ul>

		<?php get_template_part( 'templates/grid/blog', 'pagination' ); ?>

	</div><!-- .main-container -->

	<?php get_template_part( 'templates/sidebars/sidebar', 'right' ); ?>

</div>

<?php get_footer(); ?>