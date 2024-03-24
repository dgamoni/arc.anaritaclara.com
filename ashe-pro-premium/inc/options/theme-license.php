<?php // Welcome Page

// Add Ashe Options Page
function ashe_license_page() {
	add_theme_page( 'Theme License', 'Theme License', 'edit_theme_options', 'theme-license', 'ashe_license_output' );
}
add_action( 'admin_menu', 'ashe_license_page' );

// Render Ashe Options HTML
function ashe_license_output() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Theme License', 'ashe-pro' ); ?></h1>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'ashe_license_tab'; ?>  

		<div class="nav-tab-wrapper">
			<a href="?page=theme-license&tab=ashe_license_tab" class="nav-tab <?php echo $active_tab == 'ashe_license_tab' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'License', 'ashe-pro' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'ashe_license_tab' ) : ?>

		<?php

		if ( ashe_freemius()->can_use_premium_code() ) {
			echo '<p>You have successfuly activated the <strong>Ashe Pro</strong> theme. Now, we higly recommend you to visit our welcome page.</p>';
			echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=ashe-options' ) ) .'" class="button button-primary">'. esc_html__( 'Get Started with Ashe Pro', 'ashe-pro' ) .'</a></p>';
		} else {
			echo '<p>To receive further automatic theme updates, you need to activate the <strong>Ashe Pro</strong> theme.</p>';
			echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=theme-license&tab=ashe_license_tab' ) ) .'" class="button button-primary">'. esc_html__( 'Activate Ashe Pro', 'ashe-pro' ) .'</a></p>';
		}
		
		?>

	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end ashe_license_output