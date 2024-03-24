<?php // Welcome Page

// Add Ashe Options Page
function ashe_options_page() {
	add_theme_page( 'About Ashe', wp_kses_post('<span style="color:#00b9eb;font-weight:bold;">About Ashe</span>'), 'edit_theme_options', 'ashe-options', 'ashe_options_output' );
}
add_action( 'admin_menu', 'ashe_options_page' );

// Render Ashe Options HTML
function ashe_options_output() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Welcome to Ashe!', 'ashe-pro' ); ?></h1>
		<p class="welcome-text">
			<?php esc_html_e( 'Ashe Pro is a personal and multi-author Wordpress Blog theme. It\'s perfect for any kind of blog: personal, multi-author, food, lifestyle, etc... Is fully Responsive and Retina Display ready, clean, modern and minimal. Ashe is WooCommerce compatible, also has RTL support and for sure it\'s SEO friendly. Coded with latest Wordpress\' standards.', 'ashe-pro' ); ?>
		</p>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'ashe_tab_1'; ?>  

		<div class="nav-tab-wrapper">
			<a href="?page=ashe-options&tab=ashe_tab_1" class="nav-tab <?php echo $active_tab == 'ashe_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'ashe-pro' ); ?>
			</a>
			<a href="?page=ashe-options&tab=ashe_tab_2" class="nav-tab <?php echo $active_tab == 'ashe_tab_2' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Recommended Plugins', 'ashe-pro' ); ?>
			</a>
			<a href="?page=ashe-options&tab=ashe_tab_3" class="nav-tab <?php echo $active_tab == 'ashe_tab_3' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'ashe-pro' ); ?>
			</a>
			<a href="?page=ashe-options&tab=ashe_tab_4" class="nav-tab <?php echo $active_tab == 'ashe_tab_4' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Free vs Pro', 'ashe-pro' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'ashe_tab_1' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Demo Import', 'ashe-pro' ); ?></h3>
					<p>
						<?php esc_html_e( 'If you are a Wordpress beginner it\'s highly recommended to import Demo Content. After the import, you should get exactly same site as displayed on our demo page. Please note, this will add Menus, Posts, Pages, Widgets, etc... to your database, so it\' recommended to make an import on the fresh installation of Wordpress. ', 'ashe-pro' ); ?><br><br>
						<?php esc_html_e( 'Click this button and wait while the Demo Content is being imported. May take several minutes, depends on your internet connection and server config.', 'ashe-pro' ); ?>
					</p>
					<input type="button" value="Import Demo Content" class="button button-primary royal-import">
				</div>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Documentation', 'ashe-pro' ); ?></h3>
					<p>
						<?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Ashe. It is worth to spend 10 minutes and know almost everything about the theme.', 'ashe-pro' ); ?>
					</p>
					<a target="_blank" href="https://wp-royal.com/themes/ashe/docs/?ref=ashe-pro-backend-about-docs/" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'ashe-pro' ); ?></a>
				</div>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'ashe-pro' ); ?></h3>
					<p>
					<?php esc_html_e( 'All theme options are located here. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'ashe-pro' ); ?>
					</p>
					<a target="_blank" href="<?php echo get_site_url() . '/wp-admin/customize.php'?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'ashe-pro' ); ?></a>
				</div>

			</div>

			<!-- Predefined Styles -->
			<div class="four-columns-wrap">
			
				<h2><?php esc_html_e( 'Predefined Styles', 'ashe-pro' ); ?></h2>
				<p>
					<?php esc_html_e( 'Just activate any of these styles and you will get the same design(layouts, fonts, colors, etc..) as shown on our demo website.', 'ashe-pro' ); ?>
					<?php esc_html_e( 'More details in the theme ', 'ashe-pro' ); ?>
					<a target="_blank" href="http://wp-royal.com/themes/ashe/docs/?ref=ashe-pro-backend-about-predefined-styles#predefined"><?php esc_html_e( 'Documentation.', 'ashe-pro' ); ?></a>
				</p>

				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img1.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Main', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/demo/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_1" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/food.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Food', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/food/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_food" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/lifestyle.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Lifestyle', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/lifestyle/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_lifestyle" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img2.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Dark', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/color-black/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_2" class="button button-secondary ashe-style-activate">
					</div>
				</div>	
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img7.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 1', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/typography-v2/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_7" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img12.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 2', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/sample-v3/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_12" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img5.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 3', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/columns2-sidebar/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_5" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img3.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 4', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/sample-v5/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_3" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img4.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 5', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/color-colorful/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_4" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img6.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 6', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/columns4/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_6" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img8.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 7', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/columns3-sidebar/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_8" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img9.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 8', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/color-black-white/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_9" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img10.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 9', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/columns3-nsidebar/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_10" class="button button-secondary ashe-style-activate">
					</div>
				</div>
				<div class="column-wdith-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe-pro' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img11.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 10', 'ashe-pro' ); ?></h2>
						<a href="http://wp-royal.com/themes/ashe-pro/columns2-nsidebar/?ref=ashe-pro-backend-about-predefined-styles" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'ashe-pro' ); ?></a>
						<input type="button" value="<?php esc_html_e( 'Activate', 'ashe-pro' ); ?>" data-style="style_11" class="button button-secondary ashe-style-activate">
					</div>
				</div>

			</div>

			<!-- Theme Style Select -->
			<?php $ashe_active_style = get_option( 'ashe_active_style' ); ?>
			<select name="ashe_active_style" id="ashe_active_style">
				<option value="style_1" <?php echo esc_attr( selected( 'style_1', $ashe_active_style, false ) ) ?>></option>
				<option value="style_2" <?php echo esc_attr( selected( 'style_2', $ashe_active_style, false ) ) ?>></option>
				<option value="style_3" <?php echo esc_attr( selected( 'style_3', $ashe_active_style, false ) ) ?>></option>
				<option value="style_4" <?php echo esc_attr( selected( 'style_4', $ashe_active_style, false ) ) ?>></option>
				<option value="style_5" <?php echo esc_attr( selected( 'style_5', $ashe_active_style, false ) ) ?>></option>
				<option value="style_6" <?php echo esc_attr( selected( 'style_6', $ashe_active_style, false ) ) ?>></option>
				<option value="style_7" <?php echo esc_attr( selected( 'style_7', $ashe_active_style, false ) ) ?>></option>
				<option value="style_8" <?php echo esc_attr( selected( 'style_8', $ashe_active_style, false ) ) ?>></option>
				<option value="style_9" <?php echo esc_attr( selected( 'style_9', $ashe_active_style, false ) ) ?>></option>
				<option value="style_10" <?php echo esc_attr( selected( 'style_10', $ashe_active_style, false ) ) ?>></option>
				<option value="style_11" <?php echo esc_attr( selected( 'style_11', $ashe_active_style, false ) ) ?>></option>
				<option value="style_12" <?php echo esc_attr( selected( 'style_12', $ashe_active_style, false ) ) ?>></option>
				<option value="style_food" <?php echo esc_attr( selected( 'style_food', $ashe_active_style, false ) ) ?>></option>
				<option value="style_lifestyle" <?php echo esc_attr( selected( 'style_lifestyle', $ashe_active_style, false ) ) ?>></option>
			</select>

		<?php elseif ( $active_tab == 'ashe_tab_2' ) : ?>
			
			<div class="three-columns-wrap">
				
				<br>
				<p><?php esc_html_e( 'Recommended Plugins are fully supported by Ashe theme, they are styled to fit the theme design and performing well. Not mandatory, but may be usefl.', 'ashe-pro' ); ?></p>
				<br>

				<?php

				// WooCommerce
				ashe_recommended_plugin( 'woocommerce', 'woocommerce', 'WooCommerce', 'WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.' );

				// Contact Form 7
				ashe_recommended_plugin( 'contact-form-7', 'wp-contact-form-7', 'Contact Form 7', 'Just another contact form plugin. Simple but flexible.' );

				// Jetpack
				ashe_recommended_plugin( 'jetpack', 'jetpack', 'Jetpack by WordPress.com', 'Jetpack gives you tools to design, secure, and grow your site in one convenient bundle.' );

				// Ajax Thumbnail Rebuild
				ashe_recommended_plugin( 'ajax-thumbnail-rebuild', 'ajax-thumbnail-rebuild', 'Ajax Thumbnail Rebuild', 'AJAX Thumbnail Rebuild allows you to rebuild all thumbnails at once without script timeouts on your server.' );

				// WP Recipe Maker
				ashe_recommended_plugin( 'wp-recipe-maker', 'wp-recipe-maker', 'WP Recipe Maker', 'The easy and user-friendly recipe plugin for everyone. Automatic JSON-LD metadata for better SEO.' );

				// Recent Posts Widget
				ashe_recommended_plugin( 'recent-posts-widget-with-thumbnails', 'recent-posts-widget-with-thumbnails', 'Recent Posts Widget With Thumbnails', 'Small and fast plugin to display in the sidebar a list of linked titles and thumbnails of the most recent postings.' );

				// Instagram Slider
				ashe_recommended_plugin( 'instagram-slider-widget', 'instaram_slider', 'Instagram Slider Widget', 'Instagram Widget is a responsive slider widget that shows up to 18 images latest images from a public instagram user hashtag.' );

				// Instagram Widget
				ashe_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget', 'WP Instagram Widget', 'A WordPress widget for showing your latest Instagram photos.' );

				// Facebook Widget
				ashe_recommended_plugin( 'facebook-pagelike-widget', 'facebook_widget', 'Facebook Widget', 'This widget adds a Simple Facebook Page Like Widget into your wordpress website sidebar within few minutes.' );

				// MailChimp
				ashe_recommended_plugin( 'mailchimp-for-wp', 'mailchimp-for-wp', 'MailChimp for WordPress', 'MailChimp for WordPress by ibericode. Adds various highly effective sign-up methods to your site.' );

				// MailPoet 2
				ashe_recommended_plugin( 'wysija-newsletters', 'index', 'MailPoet 2', 'Create and send newsletters or automated emails. Capture subscribers with a widget. Import and manage your lists. MailPoet is made with love.' );

				?>


			</div>

		<?php elseif ( $active_tab == 'ashe_tab_3' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Forums', 'ashe-pro' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'ashe-pro' ); ?>
						<hr>
						<a target="_blank" href="https://wp-royal.com/support-ashe-pro/?ref=ashe-pro-backend-about-support-forum/"><?php esc_html_e( 'Go to Support Forums', 'ashe-pro' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Documentation', 'ashe-pro' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Need more details? Please check out Ashe Theme Documentation for detailed information.', 'ashe-pro' ); ?>
						<hr>
						<a target="_blank" href="https://wp-royal.com/themes/ashe/docs/?ref=ashe-pro-backend-about-docs/"><?php esc_html_e( 'Read Full Documentation', 'ashe-pro' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-admin-tools"></span>
						<?php esc_html_e( 'Changelog', 'ashe-pro' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Stay always up to date, check for fixes, updates and some new feauters you should not miss.', 'ashe-pro' ); ?>
						<hr>
						<a target="_blank" href="https://wp-royal.com/ashe-pro-changelog/?ref=ashe-pro-backend-about-changelog/"><?php esc_html_e( 'See Changelog', 'ashe-pro' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-smiley"></span>
						<?php esc_html_e( 'Donation', 'ashe-pro' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Even a small sum can help us a lot with theme development. If the Ashe theme is useful and our support is helpful, please don\'t hesitate to donate a little bit, at lets buy us a Coffee or a Beer :)', 'ashe-pro' ); ?>
						<hr>
						<a target="_blank" href="https://wp-royal.com/themes/ashe/ashe-donate.html"><?php esc_html_e( 'Donate with PayPal', 'ashe-pro' ); ?></a>
					</p>
				</div>

			</div>

		<?php elseif ( $active_tab == 'ashe_tab_4' ) : ?>

			<br><br>

			<table class="free-vs-pro form-table">
				<thead>
					<tr>
						<th>
							<a href="https://wp-royal.com/themes/item-ashe-pro/?ref=ashe-pro-backend-about-section-getpro-btn/" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Ashe Pro', 'ashe-pro' ); ?>
							</a>
						</th>
						<th>Ashe</th>
						<th>Ashe Pro</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<h3><?php esc_html_e( '100% Responsive and Retina Ready', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Translation Ready', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language "ashe.pot" file included.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'RTL Support', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'RTL stylesheet for languages that are read from right to left like Arabic, Hebrew, etc... Your content will adapt to RTL direction.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'WooCommerce Integration', 'ashe-pro' ); ?></h3>
							<p>
								<?php esc_html_e( 'The best eCommerce solution for Wordpress websites. Add your own Shop and sell anything from digital Goods to Coconuts.', 'ashe-pro' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe-pro' ); ?></strong> <?php esc_html_e( 'Left &amp; Right WooCommerce widgetised areas. Perfectly styled to fit the theme design.', 'ashe-pro' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Contact Form 7 Support', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'The most popular contact form plugin. You can build almost any kind of contact form. Very simple but super flexible.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Image &amp; Text Logos', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Upload your logo image(set the size) or simply type your text logo.', 'ashe-pro' ); ?><br><strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe-pro' ); ?></strong> <?php esc_html_e( 'Adjust Logo position to fit your custom header design.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Posts Slider', 'ashe-pro' ); ?></h3>
							<p>
								<?php esc_html_e( 'Showcase up to 5 most recent Blog Posts in header area.', 'ashe-pro' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe-pro' ); ?></strong> <?php esc_html_e( 'Unlimited number of Slides. Feature specific(custom) posts and order them by date, comments or even random. Change Slider columns from 1 up to 4, set Autoplay and enable/disable any element.', 'ashe-pro' ); ?>  
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Links (Promo Boxes)', 'ashe-pro' ); ?></h3>
							<p>
								<?php esc_html_e( 'Display up to 3 eye-catching linked images under header area, which could be a Custom Page Links or Banners(ads).', 'ashe-pro' ); ?> 
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe-pro' ); ?></strong> <?php esc_html_e( 'You can have 5 Featured Links.', 'ashe-pro' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Background Image/Color', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Set the custom body Background image or Color.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Header Background Image/Color', 'ashe-pro' ); ?></h3>
							<p>
								<?php esc_html_e( 'Set the custom header Background image or Color.', 'ashe-pro' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe-pro' ); ?></strong> <?php esc_html_e( 'Adjust Header size &amp; enable ', 'ashe-pro' ); ?><strong><?php esc_html_e( 'Parallax Scrolling', 'ashe-pro' ); ?></strong> <?php esc_html_e( 'to fit your custom website design.', 'ashe-pro' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Classic Layout', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Standard one column Blog Feed layout.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Multi-level Sub Menu Support', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Unlimited level of sub menus. Add as much as you need.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Left &amp; Right Sidebars', 'ashe-pro' ); ?></h3>
							<p>
								<?php esc_html_e( 'Left and Right Widgetised areas. Could be globally Enabled/Disabled.', 'ashe-pro' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe-pro' ); ?></strong> <?php esc_html_e( 'Full controll - Enable/Disable on specific Posts &amp; Pages.', 'ashe-pro' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Alternative Sidebar', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Stylish and modern Alternative Widgetised area, which is hidden by default and pops up on click.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					
					<!-- Only Pro -->
					<tr>
						<td>
							<h3><?php esc_html_e( 'One Click Demo Import', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Just a Single Click and you will get the same content as shown on our Demo website. Menus, Posts, Pages, Widgets, etc... will be imported.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Unlimited Colors', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Tons of color options. You can customize your Header, Content and Footer separately as much as possible.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( '800+ Google Fonts', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced WooCommerce Support', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Set 2, 3 or 4 Columns on WooCommerce Product Grid. Enable/Disable Left & Right WooCommerce widgetized areas.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Grid Layout', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Formats Support', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Create Audio, Video, Gallery, Link &amp; Quote Blog Posts with unique, modern and minimal styling. Full control over your Blog Posts.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Sharing Icons', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Ability to share your Blog Posts on the most popular social media: Facebook, Twitter, Pinterest, Google Plus, Linkedin, Reddit, Tumblr.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Post Options', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Custom Post Header image upload, Full-width Post option, ability to display current post in the Featured Slider.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Page Options', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Custom Page Header image, Full-width page option, enable/disable Featured Slider & Featured Links on current page, Show/hide page Title & Featured Image.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Different Blog Feed Pagination', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Choose from 4 Diffenet pagination styles: Default, Numeric, Load More Button and Infinite Page Scrolling.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Sticky Navigation', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Fix the main navigation to the page, it will be always visible at the top.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Instagram Widget Area', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Showcase your Instagram photos on your website footer area.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with MailChimp', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'This plugin helps you add more subscribers to your MailChimp lists using various methods.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with JetPack', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Jetpack is the ultimate toolkit for WordPress. It gives you everything you need to design, secure, and grow your site in one bundle.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Ashe Pro Widgets', 'ashe-pro' ); ?></h3>
							<p><?php esc_html_e( 'Ashe Author, Ads &amp; Social Icons widgets included.', 'ashe-pro' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td></td>
						<td colspan="2">
							<a href="https://wp-royal.com/themes/item-ashe-pro/?ref=ashe-pro-backend-about-section-getpro-btn/" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Ashe Pro', 'ashe-pro' ); ?>
							</a>
						</td>
					</tr>
				</tbody>
			</table>

	    <?php else : ?>
			<p>No Tabs Available</p>
	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end ashe_options_output

// Check if plugin is installed
function ashe_check_installed_plugin( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function ashe_recommended_plugin( $slug, $filename, $name, $description) {

	if ( $slug === 'facebook-pagelike-widget' ) {
		$size = '128x128';
	} else {
		$size = '256x256';
	}

?>

	<div class="plugin-card">
		<div class="name column-name">
			<h3>
				<?php echo esc_html( $name ); ?>

				<?php if ( $slug === 'ajax-thumbnail-rebuild' ) : ?>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/ajax-thumbnail-rebuild.jpeg'; ?>" class="plugin-icon" alt="">
				<?php else: ?>
					<img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
				<?php endif; ?>
			</h3>
		</div>
		<div class="action-links">
			<?php if ( ashe_check_installed_plugin( $slug, $filename ) ) : ?>
			<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'ashe-pro' ); ?></button>
			<?php else : ?>
			<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
				<?php esc_html_e( 'Install Now', 'ashe-pro' ); ?>
			</a>							
			<?php endif; ?>
		</div>
		<div class="desc column-description">
			<p><?php echo esc_html( $description ); ?></p>
		</div>
	</div>

<?php
}

function ashe_add_menu_item( $admin_bar )  {
$args = array(
    'id'        => 'about-ashe',
    'title'     => wp_kses_post('<span style="color:#00b9eb;font-weight:bold;">About Ashe</span>'),
    'href'      => esc_url( admin_url( 'themes.php?page=ashe-options' ) )
);
$admin_bar->add_node( $args);
}
add_action('admin_bar_menu', 'ashe_add_menu_item', 100);

// Theme Style Activation
function ashe_style_activation() {

    if ( $_POST['ashe_active_style'] === 'style_1' ) {
		$ashe_style_1 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#f6f6f6','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col1-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col1-rsidebar','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '500','title_tagline_logo_distance' => '160','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => true,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => true,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '60','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => true,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '120','typography_logo_tg_size' => '18','typography_logo_height' => '120','typography_logo_spacing' => '-1','typography_logo_weight' => '700','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '40','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_1);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', 'https://wp-royal.com/themes/ashe-pro/demo/wp-content/uploads/sites/2/2017/12/hdrimg.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_2' ) {
		$ashe_style_2 = array('colors_top_bar_bg' => '#111111','colors_top_bar_link' => '#ffffff','colors_top_bar_link_hover' => '#be9e5e','colors_header_bg' => '#111111','colors_main_nav_bg' => '#111111','colors_main_nav_link' => '#ffffff','colors_main_nav_link_hover' => '#be9e5e','colors_content_bg' => '#111111','colors_content_text' => '#c4c4c4','colors_content_title' => '#ffffff','colors_content_meta' => '#9e9e9e','colors_content_accent' => '#be9e5e','colors_text_selection' => '#be9e5e','colors_content_border' => '#383838','colors_button' => '#333333','colors_button_text' => '#c4c4c4','colors_button_hover' => '#be9e5e','colors_button_hover_text' => '#ffffff','colors_overlay' => '#000000','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#111111','colors_footer_text' => '#c4c4c4','colors_footer_title' => '#ffffff','colors_footer_accent' => '#be9e5e','colors_footer_border' => '#383838','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col1-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col1-rsidebar','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '500','title_tagline_logo_distance' => '120','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => true,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => true,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '60','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => true,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '19','typography_logo_height' => '150','typography_logo_spacing' => '5','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '40','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_2);
		set_theme_mod( 'background_color', '111111' );
		set_theme_mod( 'header_textcolor', 'ffffff' );
		set_theme_mod( 'header_image', 'http://wp-royal.com/themes/ashe-pro/color-black/wp-content/uploads/sites/23/2017/11/opt_sunset-2459855_1920.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_3' ) {
    	$ashe_style_3 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#000000','colors_main_nav_link' => '#ffffff','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#222222','colors_footer_text' => '#919191','colors_footer_title' => '#ededed','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#595959','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col1-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col1-rsidebar','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => false,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '230','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '300','title_tagline_logo_distance' => '75','main_nav_label' => true,'main_nav_align' => 'left','main_nav_position' => 'above','main_nav_fixed' => true,'main_nav_show_socials' => true,'main_nav_show_search' => false,'main_nav_show_sidebar' => false,'featured_slider_label' => true,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '1','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => false,'featured_slider_pagination' => false,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => false,'featured_links_label' => true,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'content','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '60','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => true,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Open+Sans','typography_logo_size' => '180','typography_logo_tg_size' => '16','typography_logo_height' => '100','typography_logo_spacing' => '7','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '14','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '40','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_3);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', '' );
    } elseif ( $_POST['ashe_active_style'] === 'style_4' ) {
    	$ashe_style_4 = array('colors_top_bar_bg' => '#111111','colors_top_bar_link' => '#ffffff','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#e10b26','colors_main_nav_link' => '#ffffff','colors_main_nav_link_hover' => '#111111','colors_content_bg' => '#ffffff','colors_content_text' => '#353535','colors_content_title' => '#111111','colors_content_meta' => '#d8d8d8','colors_content_accent' => '#333333','colors_text_selection' => '#686868','colors_content_border' => '#e8e8e8','colors_button' => '#f2f2f2','colors_button_text' => '#333333','colors_button_hover' => '#262626','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#e10b26','colors_footer_text' => '#ffffff','colors_footer_title' => '#ffffff','colors_footer_accent' => '#111111','colors_footer_border' => '#f98b8b','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#6395ba','general_site_width' => '1250','general_content_padding' => '20','general_sidebar_width' => '260','general_sidebar_sticky' => false,'general_home_layout' => 'col2-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col1-rsidebar','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => false,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '500','title_tagline_logo_distance' => '300','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => true,'main_nav_show_search' => false,'main_nav_show_sidebar' => true,'featured_slider_label' => false,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => false,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '53','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => false,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More..','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => false,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => '','social_media_icon_5' => 'google-plus-g','social_media_url_5' => '','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Open+Sans','typography_logo_size' => '180','typography_logo_tg_size' => '16','typography_logo_height' => '100','typography_logo_spacing' => '7','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '37','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_4);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', 'ffffff' );
		set_theme_mod( 'header_image', 'http://wp-royal.com/themes/ashe-pro/color-colorful/wp-content/uploads/sites/25/2017/11/girl-2940655_1920.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_5' ) {
    	$ashe_style_5 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#f6f6f6','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col2-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col2-rsidebar','general_header_width' => 'contained','general_slider_width' => 'full','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '605','title_tagline_logo_distance' => '120','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => true,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '4','featured_slider_columns' => '3','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => false,'featured_slider_more' => false,'featured_slider_date' => true,'featured_links_label' => false,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '41','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => true,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '19','typography_logo_height' => '150','typography_logo_spacing' => '5','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '30','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_5);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', 'http://wp-royal.com/themes/ashe-pro/columns2-sidebar/wp-content/uploads/sites/18/2018/01/header-background7.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_6' ) {
    	$ashe_style_6 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#f6f6f6','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col4-fullwidth','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col4-fullwidth','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'full','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '420','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '500','title_tagline_logo_distance' => '160','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => false,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => false,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '49','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'load-more','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => false,'blog_page_show_dropcups' => false,'blog_page_more_text' => 'Read More','blog_page_show_author' => false,'blog_page_show_facebook' => false,'blog_page_show_twitter' => false,'blog_page_show_pinterest' => false,'blog_page_show_google' => false,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'none','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Neucha','typography_logo_size' => '130','typography_logo_tg_size' => '15','typography_logo_height' => '100','typography_logo_spacing' => '14','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '30','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_6);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', 'ffffff' );
		set_theme_mod( 'header_image', 'http://wp-royal.com/themes/ashe-pro/columns4/wp-content/uploads/sites/22/2018/01/header-background-1.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_7' ) {
    	$ashe_style_7 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#f6f6f6','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col1-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col1-rsidebar','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '500','title_tagline_logo_distance' => '110','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => true,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => true,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '60','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => true,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '19','typography_logo_height' => '150','typography_logo_spacing' => '5','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Lato','typography_nav_size' => '17','typography_nav_height' => '60','typography_nav_spacing' => '0.9','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => false,'typography_head_family' => 'Dancing+Script','typography_head_size' => '55','typography_head_height' => '60','typography_head_spacing' => '0.5','typography_head_weight' => '700','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Lato','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_7);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', 'http://wp-royal.com/themes/ashe-pro/typography-v2/wp-content/uploads/sites/31/2018/01/cropped-about-me-header-1.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_8' ) {
    	$ashe_style_8 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#f6f6f6','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1200','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col3-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col3-fullwidth','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '709','title_tagline_logo_distance' => '120','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => false,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => false,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '25','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '30','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => false,'blog_page_show_comments' => false,'blog_page_show_dropcups' => false,'blog_page_more_text' => 'Read More','blog_page_show_author' => false,'blog_page_show_facebook' => false,'blog_page_show_twitter' => false,'blog_page_show_pinterest' => false,'blog_page_show_google' => false,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '19','typography_logo_height' => '150','typography_logo_spacing' => '5','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '29','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_8);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', 'http://wp-royal.com/themes/ashe-pro/columns3-sidebar/wp-content/uploads/sites/20/2017/08/cropped-ashe_bg_bk.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_9' ) {
    	$ashe_style_9 = array('colors_top_bar_bg' => '#222222','colors_top_bar_link' => '#ffffff','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#222222','colors_main_nav_link' => '#ffffff','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#222222','colors_footer_text' => '#919191','colors_footer_title' => '#ededed','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#595959','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col1-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col1-rsidebar','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => false,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => false,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '500','title_tagline_logo_distance' => '120','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => true,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => true,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '60','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => true,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '19','typography_logo_height' => '150','typography_logo_spacing' => '5','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '40','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_9);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', '' );
    } elseif ( $_POST['ashe_active_style'] === 'style_10' ) {
    	$ashe_style_10 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#f6f6f6','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col3-fullwidth','general_single_layout' => 'no-sidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col3-fullwidth','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '709','title_tagline_logo_distance' => '120','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => false,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => false,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '30','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => false,'blog_page_show_comments' => false,'blog_page_show_dropcups' => false,'blog_page_more_text' => 'Read More','blog_page_show_author' => false,'blog_page_show_facebook' => false,'blog_page_show_twitter' => false,'blog_page_show_pinterest' => false,'blog_page_show_google' => false,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '19','typography_logo_height' => '150','typography_logo_spacing' => '5','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '29','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_10);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', 'ffffff' );
		set_theme_mod( 'header_image', 'http://wp-royal.com/themes/ashe-pro/columns3-nsidebar/wp-content/uploads/sites/21/2018/01/header-background-1.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_11' ) {
    	$ashe_style_11 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#f6f6f6','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1090','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => false,'general_home_layout' => 'col2-fullwidth','general_single_layout' => 'no-sidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col2-fullwidth','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '500','title_tagline_logo_distance' => '120','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'featured_slider_label' => true,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => false,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '85','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => false,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'google-plus-g','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '19','typography_logo_height' => '150','typography_logo_spacing' => '5','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '40','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_11);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', 'http://wp-royal.com/themes/ashe-pro/demo/wp-content/uploads/sites/2/2017/12/hdrimg.jpg' );
    } elseif ( $_POST['ashe_active_style'] === 'style_12' ) {
    	$ashe_style_12 = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#ca9b52','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#222222','colors_main_nav_link' => '#ffffff','colors_main_nav_link_hover' => '#ca9b52','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#ca9b52','colors_text_selection' => '#ca9b52','colors_content_border' => '#e8e8e8','colors_button' => '#333333','colors_button_text' => '#ffffff','colors_button_hover' => '#ca9b52','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#222222','colors_footer_text' => '#fcfcfc','colors_footer_title' => '#f4f4f4','colors_footer_accent' => '#ca9b52','colors_footer_border' => '#473838','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col1-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col2-rsidebar','general_other_layout' => 'col1-rsidebar','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => false,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => false,'header_image_height' => '500','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '500','title_tagline_logo_distance' => '120','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'above','main_nav_fixed' => true,'main_nav_show_socials' => true,'main_nav_show_search' => false,'main_nav_show_sidebar' => true,'featured_slider_label' => false,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => false,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => '#features','featured_links_image_1' => '43','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => '#test-drive','featured_links_image_2' => '37','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => '#try-pro','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '60','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'load-more','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => true,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => '','social_media_icon_5' => 'google-plus-g','social_media_url_5' => '','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '19','typography_logo_height' => '150','typography_logo_spacing' => '5','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Open+Sans','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Playfair+Display','typography_head_size' => '40','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '400','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_12);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', '' );
    } elseif ( $_POST['ashe_active_style'] === 'style_food' ) {
    	$ashe_style_food = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#69a039','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#69a039','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#a1a1a1','colors_content_accent' => '#69a039','colors_text_selection' => '#69a039','colors_content_border' => '#e8e8e8','colors_button' => '#c5e1a5','colors_button_text' => '#ffffff','colors_button_hover' => '#69a039','colors_button_hover_text' => '#ffffff','colors_overlay' => '#666666','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#f6f6f6','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#69a039','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1140','general_content_padding' => '30','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'col1-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col1-rsidebar','general_header_width' => 'contained','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'contained','general_instagram_position' => 'below','top_bar_label' => false,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '250','header_image_bg_type' => 'image','header_image_video_mp4' => '','header_image_video_webm' => '','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => false,'header_image_slider_pagination' => false,'header_image_slider_autoplay' => '0','title_tagline_logo_width' => '600','title_tagline_logo_distance' => '80','main_nav_label' => true,'main_nav_align' => 'left','main_nav_position' => 'above','main_nav_fixed' => true,'main_nav_show_socials' => true,'main_nav_show_search' => true,'main_nav_show_sidebar' => false,'featured_slider_label' => true,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'comment_count','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '6000','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => true,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'QUICK AND EASY','featured_links_url_1' => '#quick-and-easy','featured_links_image_1' => '43','featured_links_title_2' => 'DESERTS','featured_links_url_2' => '#desserts','featured_links_image_2' => '37','featured_links_title_3' => 'VEGETARIAN','featured_links_url_3' => '#vegetarian','featured_links_image_3' => '40','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '30','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '113','blog_page_grid_excerpt_length' => '60','blog_page_post_content_align' => 'center','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => true,'blog_page_show_dropcups' => true,'blog_page_more_text' => 'Read More','blog_page_show_author' => true,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => true,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'random','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => 'http://wp-royal.com/themes/ashe/sociallinks/pinterestpro.html','social_media_icon_5' => 'tumblr','social_media_url_5' => 'http://wp-royal.com/themes/ashe/sociallinks/googlepro.html','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'left-right','page_footer_show_socials' => true,'typography_logo_family' => 'Courgette','typography_logo_size' => '130','typography_logo_tg_size' => '18','typography_logo_height' => '120','typography_logo_spacing' => '-1','typography_logo_weight' => '400','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Source+Serif+Pro','typography_nav_size' => '15','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '600','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Source+Serif+Pro','typography_head_size' => '40','typography_head_height' => '44','typography_head_spacing' => '0.5','typography_head_weight' => '700','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Lato','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_food);
		set_theme_mod( 'background_color', 'ffffff' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', '' );
    } elseif ( $_POST['ashe_active_style'] === 'style_lifestyle' ) {
    	$ashe_style_lifestyle = array('colors_top_bar_bg' => '#ffffff','colors_top_bar_link' => '#000000','colors_top_bar_link_hover' => '#21c3ff','colors_header_bg' => '#ffffff','colors_main_nav_bg' => '#ffffff','colors_main_nav_link' => '#000000','colors_main_nav_link_hover' => '#21c3ff','colors_content_bg' => '#ffffff','colors_content_text' => '#464646','colors_content_title' => '#030303','colors_content_meta' => '#bcbcbc','colors_content_accent' => '#21c3ff','colors_text_selection' => '#21c3ff','colors_content_border' => '#e8e8e8','colors_button' => '#21c3ff','colors_button_text' => '#ffffff','colors_button_hover' => '#21c3ff','colors_button_hover_text' => '#ffffff','colors_overlay' => '#494949','colors_overlay_text' => '#ffffff','colors_footer_bg' => '#ffffff','colors_footer_text' => '#333333','colors_footer_title' => '#111111','colors_footer_accent' => '#21c3ff','colors_footer_border' => '#e0dbdb','colors_preloader_anim' => '#ffffff','colors_preloader_bg' => '#333333','general_site_width' => '1150','general_content_padding' => '45','general_sidebar_width' => '270','general_sidebar_sticky' => true,'general_home_layout' => 'list-rsidebar','general_single_layout' => 'rsidebar','general_shop_layout' => 'col3-fullwidth','general_other_layout' => 'col3-fullwidth','general_header_width' => 'boxed','general_slider_width' => 'boxed','general_links_width' => 'boxed','general_content_width' => 'boxed','general_single_width' => 'boxed','general_footer_width' => 'boxed','general_instagram_position' => 'below','top_bar_label' => true,'top_bar_align' => 'left-right','top_bar_show_menu' => true,'top_bar_show_socials' => true,'top_bar_transparent' => false,'header_image_label' => true,'header_image_height' => '410','header_image_bg_type' => 'slider','header_image_bg_image_size' => 'cover','header_image_parallax' => false,'header_image_slider_navigation' => true,'header_image_slider_pagination' => true,'header_image_slider_autoplay' => '3000','title_tagline_logo_width' => '460','title_tagline_logo_distance' => '110','main_nav_label' => true,'main_nav_align' => 'center','main_nav_position' => 'below','main_nav_fixed' => true,'main_nav_show_socials' => false,'main_nav_show_search' => true,'main_nav_show_sidebar' => true,'main_nav_merge_menu' => false,'featured_slider_label' => false,'featured_slider_display' => 'all','featured_slider_category' => 'null','featured_slider_orderby' => 'rand','featured_slider_amount' => '3','featured_slider_columns' => '1','featured_slider_autoplay' => '0','featured_slider_navigation' => true,'featured_slider_pagination' => true,'featured_slider_categories' => true,'featured_slider_title' => true,'featured_slider_excerpt' => true,'featured_slider_more' => true,'featured_slider_date' => true,'featured_links_label' => false,'featured_links_window' => true,'featured_links_fill' => true,'featured_links_gutter_horz' => true,'featured_links_title_1' => 'Features','featured_links_url_1' => 'http://wp-royal.com/themes/item-ashe-free/?ref=demo-ashe-pro-featured-links-all-features/#features','featured_links_image_1' => '','featured_links_title_2' => 'Test-Drive','featured_links_url_2' => 'http://wp-royal.com/themes/ashe-pro/wp-content/plugins/open-house-theme-options/redirect.php?multisite=demo','featured_links_image_2' => '','featured_links_title_3' => 'Try Pro Version','featured_links_url_3' => 'http://wp-royal.com/ashe-trial/?ref=demo-ashe-pro-featured-links-try-pro','featured_links_image_3' => '','featured_links_title_4' => '','featured_links_url_4' => '','featured_links_image_4' => '','featured_links_title_5' => '','featured_links_url_5' => '','featured_links_image_5' => '','blog_page_gutter_horz' => '37','blog_page_gutter_vert' => '39','blog_page_grid_crop_width' => '500','blog_page_grid_crop_height' => '330','blog_page_list_crop_width' => '300','blog_page_list_crop_height' => '300','blog_page_post_description' => 'excerpt','blog_page_excerpt_length' => '110','blog_page_grid_excerpt_length' => '40','blog_page_post_content_align' => 'left','blog_page_post_pagination' => 'numeric','blog_page_show_categories' => true,'blog_page_show_date' => true,'blog_page_show_comments' => false,'blog_page_show_dropcups' => false,'blog_page_more_text' => '','blog_page_show_author' => false,'blog_page_show_facebook' => true,'blog_page_show_twitter' => true,'blog_page_show_pinterest' => true,'blog_page_show_google' => false,'blog_page_show_linkedin' => false,'blog_page_show_reddit' => false,'blog_page_show_tumblr' => false,'blog_page_related_title' => 'You May Also Like','blog_page_related_orderby' => 'none','single_page_show_categories' => true,'single_page_show_date' => true,'single_page_show_comments' => true,'single_page_show_dropcups' => true,'single_page_show_tags' => true,'single_page_show_author' => true,'single_page_show_author_desc' => true,'single_page_show_author_nav' => true,'single_page_related_title' => 'You May Also Like','single_page_related_orderby' => 'random','single_page_show_comments_area' => true,'social_media_window' => true,'social_media_icon_1' => 'facebook-f','social_media_url_1' => 'http://wp-royal.com/themes/ashe/sociallinks/facebookpro.html','social_media_icon_2' => 'twitter','social_media_url_2' => 'http://wp-royal.com/themes/ashe/sociallinks/twitterpro.html','social_media_icon_3' => 'instagram','social_media_url_3' => 'http://wp-royal.com/themes/ashe/sociallinks/instagrampro.html','social_media_icon_4' => 'pinterest','social_media_url_4' => '','social_media_icon_5' => 'google-plus-g','social_media_url_5' => '','social_media_icon_6' => 'null','social_media_url_6' => '','social_media_icon_7' => 'null','social_media_url_7' => '','social_media_icon_8' => 'null','social_media_url_8' => '','page_footer_columns' => 'three','page_footer_align' => 'right-left','page_footer_show_socials' => true,'typography_logo_family' => 'Dancing+Script','typography_logo_size' => '180','typography_logo_tg_size' => '18','typography_logo_height' => '120','typography_logo_spacing' => '10','typography_logo_weight' => '700','typography_logo_italic' => false,'typography_logo_uppercase' => false,'typography_nav_family' => 'Oswald','typography_nav_size' => '16','typography_nav_height' => '60','typography_nav_spacing' => '1','typography_nav_weight' => '400','typography_nav_italic' => false,'typography_nav_uppercase' => true,'typography_head_family' => 'Oswald','typography_head_size' => '28','typography_head_height' => '45','typography_head_spacing' => '0.5','typography_head_weight' => '300','typography_head_italic' => false,'typography_head_uppercase' => false,'typography_body_family' => 'Open+Sans','typography_body_size' => '15','typography_body_height' => '25','typography_body_spacing' => '0','typography_body_weight' => '400','typography_body_italic' => false,'typography_body_uppercase' => false,'typography_latin_subset' => false,'typography_cyrillic_subset' => false,'typography_greek_subset' => false,'typography_vietnamese_subset' => false,'preloader_label' => false,'preloader_type' => 'animation_1','page_footer_copyright' => '');
		update_option('ashe_options', $ashe_style_lifestyle);
		set_theme_mod( 'background_color', 'f9f9f9' );
		set_theme_mod( 'header_textcolor', '111111' );
		set_theme_mod( 'header_image', 'https://wp-royal.com/themes/ashe-pro/demo/wp-content/uploads/sites/2/2017/12/hdrimg.jpg' );
    }

    // activate current design
    update_option( 'ashe_active_style', $_POST['ashe_active_style'] );

}
add_action( 'wp_ajax_ashe_style_activation', 'ashe_style_activation' );

// enqueue ui CSS/JS
function enqueue_ashe_options_scripts($hook) {

	if ( 'appearance_page_ashe-options' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'theme-options-ui-css', get_theme_file_uri( '/inc/options/css/theme-options-ui.css' ) );

    // enqueue JS
    wp_enqueue_script( 'theme-options-ui-js', get_theme_file_uri( '/inc/options/js/theme-options-ui.js' ), array( 'jquery' ), false, true );

}
add_action( 'admin_enqueue_scripts', 'enqueue_ashe_options_scripts' );