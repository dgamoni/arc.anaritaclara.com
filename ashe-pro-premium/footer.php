		</div><!-- #page-content -->

		<!-- Page Footer -->
		<footer id="page-footer" class="<?php echo ashe_options( 'general_footer_width' ) === 'boxed' ? 'boxed-wrapper ': ''; ?>clear-fix">
			
			<!-- Scroll Top Button -->
			<span class="scrolltop icon-angle-up"></span>

			<!-- Instagram Widget -->
			<?php

			if ( ashe_options( 'general_instagram_position' ) === 'below' ) {
				get_template_part( 'templates/sidebars/instagram', 'widget' );
			}

			?>

			<div class="page-footer-inner <?php echo ashe_options( 'general_footer_width' ) === 'contained' ? 'boxed-wrapper': ''; ?>">

			<!-- Footer Widgets -->
			<?php

			if ( ashe_options( 'page_footer_columns' ) !== 'none' ) {
				echo get_template_part( 'templates/sidebars/footer', 'widgets' ); 
			}

			?>

			<div class="footer-copyright">

				<?php

				$copyright = ashe_options( 'page_footer_copyright' );
				$copyright = str_replace( '$year', date('Y'), $copyright);
				$copyright = str_replace( '$copy', '&copy;', $copyright);

				?>
				
				<div class="copyright-info"><?php echo wp_kses_post( $copyright ); ?></div>	

				<?php

				if ( ashe_options( 'page_footer_show_socials' ) === true ) {	
					ashe_social_media( 'footer-socials' );
				}

				?>
			</div>

			</div><!-- .boxed-wrapper -->

		</footer><!-- #page-footer -->

	</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>