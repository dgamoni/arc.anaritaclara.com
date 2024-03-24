<?php if ( ashe_options( 'top_bar_label' ) === true ) : ?>

<!-- Instagram Widget -->
<?php

if ( ashe_options( 'general_instagram_position' ) === 'above' ) {
	get_template_part( 'templates/sidebars/instagram', 'widget' );
}

?>

<div id="top-bar" class="clear-fix">
	<div <?php echo ashe_options( 'general_header_width' ) === 'contained' ? 'class="boxed-wrapper"': ''; ?>>
		
		<?php

		// Social Icons
		if ( ashe_options( 'top_bar_show_socials' ) === true ) {	
			ashe_social_media( 'top-bar-socials' );
		}
		
		// Menu
		if ( ashe_options( 'top_bar_show_menu' ) === true ) {
		
			wp_nav_menu( array(
				'theme_location' 	=> 'top',
				'menu_id' 		 	=> 'top-menu',
				'menu_class' 		=> '',
				'container' 	 	=> 'nav',
				'container_class'	=> 'top-menu-container',
				'fallback_cb' 		=> 'ashe_top_menu_fallback'
			) );

			if ( ashe_options( 'main_nav_label' ) === false && has_nav_menu('top') ) { ?>
				
				<!-- Mobile Menu Button -->
				<span class="mobile-menu-btn">
					<i class="fas fa-bars"></i>
				</span>

				<?php

				// Mobile Menu
				wp_nav_menu( array(
					'theme_location' 	=> 'top',
					'menu_id'        	=> 'mobile-menu',
					'menu_class' 		=> '',
					'container' 	 	=> 'nav',
					'container_class'	=> 'mobile-menu-container',
					'fallback_cb' 		=> false
				) );
			}
		}

		?>

	</div>
</div><!-- #top-bar -->

<?php endif; ?>