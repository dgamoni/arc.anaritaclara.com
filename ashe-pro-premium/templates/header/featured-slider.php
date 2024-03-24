<?php

// Check for WooCommerce
if ( class_exists( 'WooCommerce' ) ) {
	if ( is_cart() || is_checkout() || is_account_page() ) {
		return;
	}
}

$slider_columns 	= (int)ashe_options( 'featured_slider_columns' );
$slider_autoplay 	= (int)ashe_options( 'featured_slider_autoplay' );
$slider_navigation 	= ashe_options( 'featured_slider_navigation' );
$slider_pagination 	= ashe_options( 'featured_slider_pagination' );
$slider_desktop  	= 3;
$slider_tablet  	= 2;

if ( $slider_columns === 1 ) {
	$slider_desktop	= 1;
	$slider_tablet 	= 1;
}

if ( $slider_columns === 2 ) {
	$slider_desktop  = 2;
}

$slider_data = '{';

	$slider_data .= '"slidesToShow": '.$slider_columns;

	if ( $slider_autoplay > 0 ) {
		$slider_data .= ', "autoplay": true, "autoplaySpeed": '. $slider_autoplay;
	}

	if ( !$slider_navigation ) {
		$slider_data .= ', "arrows": false';
	} 

	if ( $slider_pagination ) {
		$slider_data .= ', "dots": true';
	}

	if ( $slider_columns === 1 ) {
	  	$slider_data .= ', "fade": true';
	}


	$slider_data .= ', "responsive": [{"breakpoint":1250,"settings":{"slidesToShow": '.$slider_desktop.'}},{"breakpoint":980,"settings":{"slidesToShow": '.$slider_tablet.'}},{"breakpoint":769,"settings":{"slidesToShow": 1}}]';

$slider_data .= '}';

?>

<!-- Wrap Slider Area -->
<div class="featured-slider-area<?php echo ashe_options( 'general_slider_width' ) === 'boxed' ? ' boxed-wrapper': ''; ?>">

<!-- Featured Slider -->
<div id="featured-slider" class="<?php echo ashe_options( 'general_slider_width' ) === 'boxed' ? 'boxed-wrapper': ''; ?>" data-slider-columns="<?php echo esc_attr( $slider_columns ); ?>" data-slick="<?php echo esc_attr( $slider_data ); ?>">
	
	<?php 

	// Query Args
	$args = array(
		'post_type'		      	=> array( 'post', 'page' ),
	 	'orderby'		      	=> ashe_options( 'featured_slider_orderby' ),
		'order'			      	=> 'DESC',
		'posts_per_page'      	=> ashe_options( 'featured_slider_amount' ),
		'ignore_sticky_posts'	=> 1,
		'meta_query' 			=> array( 
			array(
				'key' 		=> '_thumbnail_id',
				'compare' 	=> 'EXISTS'
			) ),			
	);

	if ( ashe_options( 'featured_slider_display' ) === 'category' ) {
		$args['cat'] = ashe_options( 'featured_slider_category' );
	} 

	if ( ashe_options( 'featured_slider_display' ) === 'metabox' ) {
		$args['meta_query'] = array( 
		'relation'		=> 'AND',
		array(
			'relation'		=> 'OR',
			array(
				'key'	 	=> 'show_in_featured_slider',
				'value'	  	=> 'yes',
				'compare' 	=> 'EXISTS',
			),
			array(
				'key'	 	=> 'show_page_in_featured_slider',
				'value'	  	=> 'yes',
				'compare' 	=> 'EXISTS',
			),
		),
		array(
			'key' 		=> '_thumbnail_id',
			'compare' 	=> 'EXISTS'
		) );
	}

	$slider_query = new WP_Query();
	$slider_query->query( $args );


	// Loop Start
	if ( $slider_query->have_posts() ) :

	while ( $slider_query->have_posts() ) : $slider_query->the_post();

	?>

	<div class="slider-item">

		<?php if ( $slider_columns === 1 ) : ?>
			<div class="slider-item-bg" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>);"></div>
		<?php else : ?>
			<img src="<?php the_post_thumbnail_url('ashe-slider-grid-thumbnail'); ?>" alt="">
		<?php endif; ?>

		<div class="cv-container image-overlay">
			<div class="cv-outer">
				<div class="cv-inner">
					<div class="slider-info">

						<?php

						if ( ashe_options( 'featured_slider_more' ) === false && ashe_options( 'featured_slider_title' ) === false ) {
							echo '<a class="slider-image-link" href="'. esc_url( get_the_permalink() ) .'"></a>';
						}

						?>

						<?php $category_list = get_the_category_list( ', ' ); ?>		

						<?php if ( ashe_options( 'featured_slider_categories' ) === true && $category_list ) : ?>
						<div class="slider-categories">
							<?php echo '' . $category_list; ?>
						</div> 
						<?php endif; ?>

						<?php if( ashe_options( 'featured_slider_title' ) === true ) : ?>
						<h2 class="slider-title"> 
							<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>								
						</h2>
						<?php endif; ?>

						<?php if ( ashe_options( 'featured_slider_excerpt' ) === true ): ?>							
						<div class="slider-content"><?php ashe_excerpt( 30 ); ?></div>
						<?php endif; ?>

						<?php if ( ashe_options( 'featured_slider_more' ) === true ) : ?>
						<div class="slider-read-more">
							<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php esc_html_e( 'read more', 'ashe-pro' ); ?></a>
						</div>
						<?php endif; ?>

						<?php if( ashe_options( 'featured_slider_date' ) === true ) : ?>
						<div class="slider-date"><?php the_time( get_option('date_format') ); ?></div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>

	</div>

	<?php

	endwhile; // Loop end

	// restore original post data
	wp_reset_postdata();

	endif;

	?>

</div><!-- #featured-slider -->

</div><!-- .featured-slider-area -->