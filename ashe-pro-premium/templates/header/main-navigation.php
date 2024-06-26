<?php if ( ashe_options( 'main_nav_label' ) === true ) : ?>

<div id="main-nav" class="clear-fix" data-fixed="<?php echo ashe_options( 'main_nav_fixed' ); ?>">

	<div <?php echo ashe_options( 'general_header_width' ) === 'contained' ? 'class="boxed-wrapper"': ''; ?>>	
		
		<!-- Alt Sidebar Icon -->
		<?php if ( ashe_options( 'main_nav_show_sidebar' ) === true ) : ?>
		<div class="main-nav-sidebar">
			<div>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<?php endif; ?>

		<!-- Social Trigger Icon -->
		<?php if ( ashe_options( 'main_nav_show_socials' ) === true ) : ?>
		<div class="main-nav-socials-trigger">
			<i class="fas fa-share-alt"></i>
			<i class="fa fa-times"></i>
		</div>
		<?php endif; ?>

		<!-- Icons -->
		<div class="main-nav-icons">
			<?php
			if ( ashe_options( 'main_nav_show_socials' ) === true ) {	
				ashe_social_media( 'main-nav-socials' );
			} 
			?>

			<?php if ( ashe_options( 'main_nav_show_search' ) === true ) : ?>
			<div class="main-nav-search">
				<i class="fa fa-search"></i>
				<i class="fa fa-times"></i>
				<?php get_search_form(); ?>
			</div>
			<?php endif; ?>
		</div>

		<?php // Navigation Menus

		wp_nav_menu( array(
			'theme_location' 	=> 'main',
			'menu_id'        	=> 'main-menu',
			'menu_class' 		=> '',
			'container' 	 	=> 'nav',
			'container_class'	=> 'main-menu-container',
			'fallback_cb' 		=> 'ashe_main_menu_fallback'
		) );
		 
		?>

		<!-- Mobile Menu Button -->
		<span class="mobile-menu-btn">
			<i class="fa fa-chevron-down"></i>
		</span>

	</div>

	<?php
	
	$mobile_menu_location = 'main';
	$mobile_menu_items = '';

	if ( ashe_options( 'main_nav_merge_menu' ) === true ) {
		$mobile_menu_items = wp_nav_menu( array(
			'theme_location' => 'top',
			'container'		 => '',
			'items_wrap' 	 => '%3$s',
			'echo'			 => false,
			'fallback_cb'	 => false,
		) );

		if ( ! has_nav_menu('main') ) {
			$mobile_menu_location = 'top';
			$mobile_menu_items = '';
		}
	}
	
	wp_nav_menu( array(
		'theme_location' 	=> $mobile_menu_location,
		'menu_id'        	=> 'mobile-menu',
		'menu_class' 		=> '',
		'container' 	 	=> 'nav',
		'container_class'	=> 'mobile-menu-container',
		'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s '. $mobile_menu_items .'</ul>',
		'fallback_cb'	    => false,
	) );
	
	?>
	
</div><!-- #main-nav -->
<?php endif; ?>