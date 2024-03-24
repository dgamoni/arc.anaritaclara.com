<?php

if ( ashe_options('header_image_label') === true ) :

	$header_logo = 'yes';
	$header_image = get_header_image();
	$header_image_mtbx = false;

	// Single page
	if ( is_single() ) {

		if ( get_field( 'show_post_header' ) === 'no' ) {
			return;
		}

		if ( get_field( 'upload_custom_post_header_image' ) != '' ) {
			$header_image = get_field( 'upload_custom_post_header_image' );
			$header_image_mtbx = true;
		}

		$header_logo = get_field( 'show_post_header_logo' );

	}

	// Category Page
	if ( is_category() ) {

		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;

		if ( get_field( 'show_category_header', 'category_'. $cat_id ) === 'no' ) {
			return;
		}

		if ( get_field( 'upload_custom_cat_header_image', 'category_'. $cat_id ) != '' ) {
			$header_image = get_field( 'upload_custom_cat_header_image', 'category_'. $cat_id );
			$header_image_mtbx = true;
		}

		$header_logo = get_field( 'show_category_logo', 'category_'. $cat_id );

	}

	// Default Page
	if ( is_page() ) {

		if ( get_field( 'show_page_header' ) === 'no' ) {
			return;
		}

		if ( get_field( 'upload_custom_page_header_image' ) != '' ) {
			$header_image = get_field( 'upload_custom_page_header_image' );
			$header_image_mtbx = true;
		}

		$header_logo = get_field( 'show_page_logo' );

	}

	// Shop Page
	if ( class_exists( 'WooCommerce' ) ) {

		if ( is_shop() ) {

			$shop_page_id = get_option( 'woocommerce_shop_page_id' );

			if ( get_field( 'show_page_header', $shop_page_id ) === 'no' ) {
				return;
			}

			if ( get_field( 'upload_custom_page_header_image', $shop_page_id ) != '' ) {
				$header_image = get_field( 'upload_custom_page_header_image', $shop_page_id );
				$header_image_mtbx = true;
			}

			$header_logo = get_field( 'show_page_logo', $shop_page_id );

		}

	}

	if ( ashe_options( 'header_image_bg_type' ) !== 'image' && $header_image_mtbx === false ) {
		$header_image = '';
	}

?>

<div class="entry-header" data-bg-type="<?php echo ashe_options( 'header_image_bg_type' ); ?>" style="background-image:url(<?php echo esc_url( $header_image ); ?>)" data-video-mp4="<?php echo ashe_options( 'header_image_video_mp4' ); ?>" data-video-webm="<?php echo ashe_options( 'header_image_video_webm' ); ?>" data-parallax="<?php echo esc_attr(ashe_options( 'header_image_parallax' )); ?>" data-paroller-factor="0.5">

	<div class="cvr-container">
		<div class="cvr-outer">
			<div class="cvr-inner">

			<?php if ( $header_logo !== 'no' ) : ?>

			<div class="header-logo">

				<?php 
				
				if ( has_custom_logo() ) :

					$custom_logo = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
					
				?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( bloginfo('name') ); ?>" class="logo-img">
					<img src="<?php echo esc_url( $custom_logo ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>">
				</a>
				
				<?php else : ?>

				<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo bloginfo( 'title' ); ?></a>

				<?php endif; ?>
				
				<br>
				<p class="site-description"><?php echo bloginfo( 'description' ); ?></p>
				
			</div>
			
			<?php endif; ?>

			</div>
		</div>
	</div>

	<?php

	if ( ashe_options( 'header_image_bg_type' ) === 'slider' ) :  

	$header_images 			= get_uploaded_header_images();
	$header_slider_autoplay = (int)ashe_options( 'header_image_slider_autoplay' );

	$header_slider_data = '{';

		$header_slider_data .= '"slidesToShow": 1';

		if ( $header_slider_autoplay > 0 ) {	
			$header_slider_data .= ', "autoplay": true, "autoplaySpeed": '. $header_slider_autoplay;
		}

		if ( ashe_options( 'header_image_slider_navigation' ) === false ) {
			$header_slider_data .= ', "arrows": false';
		} 

		if ( ashe_options( 'header_image_slider_pagination' ) === true ) {
			$header_slider_data .= ', "dots": true';
		}

		$header_slider_data .= ', "fade": true';
	
	$header_slider_data .= '}';

	?>

	<div class="entry-header-slider" data-slick="<?php echo esc_attr( $header_slider_data ); ?>">
		<?php foreach( $header_images as $header_image ) : ?>
		<div  class="entry-header-slider-item" style="background-image:url(<?php echo $header_image['url']; ?>);"></div>
		<?php endforeach; ?>
	</div>
	
	<?php endif; ?>
	
</div>

<?php endif; ?>