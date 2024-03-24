<?php

function ashe_blog_shortcode( $atts ) {

	// Atributes
	$atts = shortcode_atts( array(
		'order' 		=> 'date',
		'amount' 		=> get_option('posts_per_page'),
		'categories' 	=> '',
		'post_ids' 		=> '',
	), $atts, 'ashe_blog' );

	extract($atts);

	// To String
    ob_start();

    // Get queried page
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	// Order Args
	$order_args = array(
		'date' 			=> 'date',
		'random' 		=> 'rand',
		'comments' 		=> 'comment_count',
	);

	// Query Args
	$args = array(
		'post_type'		 => 'post',
	 	'orderby'		 => $order_args[$order],
		'order'			 => 'DESC',
		'posts_per_page' => $amount,
		'paged' 		 => $paged
	);

	if ( $categories !== '' ) {
		$args['category_name'] = $categories;
	}

	if ( $post_ids !== '' ) {
		$args['post__in'] =  explode( ',', $post_ids );
	}

	$blog_feed = new WP_Query();
	$blog_feed->query( $args );

	$layout = substr(ashe_options( 'general_home_layout' ), 0, 4);

	echo '<div data-layout="'. $layout .'">';
	
	// Blog Grid
	echo '<ul class="blog-grid">';

	// Loop Start
	if ( $blog_feed->have_posts() ) :

		while ( $blog_feed->have_posts() ) : $blog_feed->the_post();

			echo '<li>';

			// Blog Feed Wrapper
			if ( strpos( $layout, 'list' ) === 0 ) {
				get_template_part( 'templates/grid/blog', 'list' );
			} else {
				get_template_part( 'templates/grid/blog', 'grid' );
			}

			echo '</li>';

		endwhile; // Loop End

		// Reset Query
		wp_reset_postdata();

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

	<?php
	
	endif; // have_posts()

	echo '</ul>';
	
	echo '</div>';


	// Post Pagination
	$range = 2;
	$showitems = ( $range * 2 ) + 1;
	$post_pagination = ashe_options( 'blog_page_post_pagination' );

	if ( empty( $paged ) ) {
		$paged = 1;
	}

	$pages = ceil( $blog_feed->found_posts / $blog_feed->post_count );

	if ( ! $pages ) {
		$pages = 1;
	}

	if ( $pages == 1 ) {
		return;
	}

	?>

	<nav class="blog-pagination clear-fix <?php echo esc_attr__( $post_pagination ); ?>" data-max-pages="<?php echo esc_attr( $pages ); ?>" data-loading="<?php esc_attr_e( 'Loading...', 'ashe-pro' ); ?>" >

	<?php

	// Numeric Pagination
	if ( $post_pagination === 'numeric' ) {

		//  Previous Page
		if ( $paged > 1 ) {
			echo '<a href="'. esc_url( get_pagenum_link( $paged - 1 ) ) .'" class="numeric-prev-page" ><i class="fa fa-long-arrow-alt-left"></i></a>';
		}
		
		// Pagination
		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages &&( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				if ( $paged == $i ) {
					echo '<span class="numeric-current-page">'. $i .'</span>';
				} else {
					echo '<a href="'. esc_url( get_pagenum_link( $i ) ). '">'. $i .'</a>';
				}
			}
		}

		// Next Page
		if ( $paged < $pages ) {
			echo '<a href="'. esc_url( get_pagenum_link( $paged + 1 ) ).'" class="numeric-next-page" ><i class="fa fa-long-arrow-alt-right"></i></a>';
		}

	// Default Pagination
	} elseif ( $post_pagination === 'default' ) {

		if ( get_next_posts_link() ) {
			echo '<div class="previous-page">';
				next_posts_link( '<i class="fa fa-long-arrow-alt-left"></i>&nbsp;'.esc_html__( 'Older Posts', 'ashe-pro' ) );
			echo '</div>';
		}
		
		if ( get_previous_posts_link() ) {
			echo '<div class="next-page">';
				previous_posts_link( esc_html__( 'Newer Posts', 'ashe-pro' ).'&nbsp;<i class="fa fa-long-arrow-alt-right"></i>' );
			echo '</div>';
		}

	// Load More / Infinite Scroll
	} else {
		next_posts_link( esc_html__( 'Load More', 'ashe-pro' ) );
	}

	echo '</nav>';


    // Retun the Content
    return ob_get_clean();

}

add_shortcode( 'ashe_blog', 'ashe_blog_shortcode' );