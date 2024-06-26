<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- Preloader -->
	<?php get_template_part( 'templates/header/preloader' ); ?>

	<!-- Page Wrapper -->
	<div id="page-wrap">

		<!-- Boxed Wrapper -->
		<div id="page-header" <?php echo ashe_options( 'general_header_width' ) === 'boxed' ? 'class="boxed-wrapper"': ''; ?>>

		<?php

		// Top Bar
		get_template_part( 'templates/header/top', 'bar' );

		// Main Navigation
		if ( ashe_options( 'main_nav_position' ) === 'above' ) {
			get_template_part( 'templates/header/main', 'navigation' );
		}

		// Page Header
		get_template_part( 'templates/header/page', 'header' );

		// Main Navigation
		if ( ashe_options( 'main_nav_position' ) === 'below' ) {
			get_template_part( 'templates/header/main', 'navigation' );
		}
		
		?>

		</div><!-- .boxed-wrapper -->

		<!-- Page Content -->
		<div id="page-content">

			<?php get_template_part( 'templates/sidebars/sidebar', 'alt' ); // Sidebar Alt ?>