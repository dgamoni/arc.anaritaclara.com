<?php get_header(); ?>

<div id="page-content">
	<div class="page-404">
	
		<h2><?php esc_html_e( 'Page not found!', 'ashe-pro' ); ?></h2>

		<p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to ', 'ashe-pro' ); ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'ashe-pro' ); ?></a></p>

	</div>
</div>

<?php get_footer(); ?>