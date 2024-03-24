<?php

/*
** Sets up theme defaults and registers support for various WordPress features
*/
function ashe_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'ashe-pro' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title for us
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );
	
	// Add theme support for Custom Logo.
	$custom_logo_defaults = array(
		'width'       => 450,
		'height'      => 200,
		'flex-width'  => true,
		'flex-height' => true,
	);
	add_theme_support( 'custom-logo', $custom_logo_defaults );

	// Add theme support for Custom Header.
	$custom_header_defaults = array(
		'width'       			=> 1300,
		'height'      			=> 500,
		'flex-width'  			=> true,
		'flex-height' 			=> true,
		'default-image' 		=> 'https://wp-royal.com/themes/ashe-pro/demo/wp-content/uploads/sites/2/2017/12/hdrimg.jpg',
		'default-text-color'	=> '111',
	);
	add_theme_support( 'custom-header', $custom_header_defaults );

	// Add theme support for Custom Background.
	$custom_background_defaults = array(
		'default-color'	=> '',
	);
	add_theme_support( 'custom-background', $custom_background_defaults );

	// Set the default content width.
	$GLOBALS['content_width'] = 960;

	// This theme uses wp_nav_menu() in two locations
	register_nav_menus( array(
		'top'	=> __( 'Top Menu', 'ashe-pro' ),
		'main' 	=> __( 'Main Menu', 'ashe-pro' ),
	) );

	// Switch default core markup to output valid HTML5
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Formats support
	add_theme_support( 'post-formats', array(
		'audio',
		'video',
		'gallery',
		'link',
		'quote'
	) );

	// Custom Image Sizes
	add_image_size( 'ashe-slider-full-thumbnail', 1080, 540, true );
	add_image_size( 'ashe-slider-grid-thumbnail', 720, 450, true );
	add_image_size( 'ashe-full-thumbnail', 1140, 0, true );
	add_image_size( 'ashe-grid-thumbnail', ashe_options( 'blog_page_grid_crop_width' ), ashe_options( 'blog_page_grid_crop_height' ), true );
	add_image_size( 'ashe-list-thumbnail', ashe_options( 'blog_page_list_crop_width' ), ashe_options( 'blog_page_list_crop_height' ), true );
	add_image_size( 'ashe-single-navigation', 75, 75, true );


	// WooCommerce support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
}
add_action( 'after_setup_theme', 'ashe_setup' );


/*
** Integrate Freemius
*/
function ashe_freemius() {
    global $ashe_freemius;

    if ( ! isset( $ashe_freemius ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $ashe_freemius = fs_dynamic_init( array(
            'id'                  => '1802',
            'slug'                => 'ashe-pro',
            'type'                => 'theme',
            'public_key'          => 'pk_4fc51483fc5c6bb76d3804ff790c4',
            'is_premium'          => true,
            'is_premium_only'     => true,
            // If your theme is a serviceware, set this option to false.
            'has_premium_version' => true,
            'has_addons'          => false,
            'has_paid_plans'      => true,
            'is_org_compliant'    => false,
            'menu'                => array(
                'slug'           => 'theme-license',
                'override_exact' => true,
                'contact'        => false,
                'support'        => false,
                'parent'         => array(
                    'slug' => 'themes.php',
                ),
            ),
        ) );
    }

    return $ashe_freemius;
}

// Init Freemius.
ashe_freemius();
// Signal that SDK was initiated.
do_action( 'ashe_freemius_loaded' );

function ashe_freemius_settings_url() {
    return admin_url( 'themes.php?page=theme-license&tab=ashe_license_tab' );
}

ashe_freemius()->add_filter( 'connect_url', 'ashe_freemius_settings_url' );
ashe_freemius()->add_filter( 'after_skip_url', 'ashe_freemius_settings_url' );
ashe_freemius()->add_filter( 'after_connect_url', 'ashe_freemius_settings_url' );
ashe_freemius()->add_filter( 'after_pending_connect_url', 'ashe_freemius_settings_url' );



/*
** Enqueue scripts and styles
*/
function ashe_scripts() {

	// Theme stylesheet
	wp_enqueue_style( 'ashe-style', get_stylesheet_uri(), array(), '3.1' );

	// Theme Responsive CSS
	wp_enqueue_style( 'ashe-responsive', get_theme_file_uri( '/assets/css/responsive.css' ), array(), '3.1'  );

	// Fontello Icons
	wp_enqueue_style( 'fontello', get_theme_file_uri( '/assets/css/fontello.css' ), array(), '3.1' );

	// Slick Slider
	wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/slick.css' ) );

	// Scrollbar
	wp_enqueue_style( 'scrollbar', get_theme_file_uri( '/assets/css/perfect-scrollbar.css' ) );

	// WooCommerce
	wp_enqueue_style( 'ashe-woocommerce', get_theme_file_uri( '/assets/css/woocommerce.css' ) );


	// Enqueue Custom Scripts
	wp_enqueue_script( 'ashe-plugins', get_theme_file_uri( '/assets/js/custom-plugins.js' ), array( 'jquery' ), '3.1', true );
	wp_enqueue_script( 'ashe-custom-scripts', get_theme_file_uri( '/assets/js/custom-scripts.js' ), array( 'jquery' ), '3.1', true );

	// Comment reply link
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'ashe_scripts' );



/*
** Register widget areas.
*/
function ashe_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar Right', 'ashe-pro' ),
		'id'            => 'sidebar-right',
		'description'   => __( 'Add widgets here to appear in your Right Sidebar.', 'ashe-pro' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'ashe-pro' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Add widgets here to appear in your Left Sidebar.', 'ashe-pro' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Alt', 'ashe-pro' ),
		'id'            => 'sidebar-alt',
		'description'   => __( 'Add widgets here to appear in your alternative/fixed sidebar.', 'ashe-pro' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'ashe-pro' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Add widgets here to appear in your Footer Widgetised Area.', 'ashe-pro' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Instagram Widget', 'ashe-pro' ),
		'id'            => 'instagram-widget',
		'description'   => __( 'Add widget here to appear in your Footer Instagram Area.', 'ashe-pro' ),
		'before_widget' => '<div id="%1$s" class="ashe-instagram-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="instagram-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

		register_sidebar( array(
		'name'          => __( 'WooCommerce Sidebar Right', 'ashe-pro' ),
		'id'            => 'sidebar-shop-right',
		'description'   => __( 'Add widgets here to appear in your Shop Page Right Sidebar.', 'ashe-pro' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'WooCommerce Sidebar Left', 'ashe-pro' ),
		'id'            => 'sidebar-shop-left',
		'description'   => __( 'Add widgets here to appear in your Shop Page Left Sidebar.', 'ashe-pro' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );
}
add_action( 'widgets_init', 'ashe_widgets_init' );



/*
**  Top Menu Fallback
*/

function ashe_top_menu_fallback() {
	if ( current_user_can( 'edit_theme_options' ) ) {
		echo '<ul id="top-menu">';
			echo '<li>';
				echo '<a href="'. esc_url( admin_url('nav-menus.php') ) .'">'. esc_html__( 'Set up Menu', 'ashe' ) .'</a>';
			echo '</li>';
		echo '</ul>';
	}
}


/*
**  Main Menu Fallback
*/

function ashe_main_menu_fallback() {
	if ( current_user_can( 'edit_theme_options' ) ) {
		echo '<ul id="main-menu">';
			echo '<li>';
				echo '<a href="'. esc_url( admin_url('nav-menus.php') ) .'">'. esc_html__( 'Set up Menu', 'ashe' ) .'</a>';
			echo '</li>';
		echo '</ul>';
	}	
}


/*
**  Custom Excerpt Length
*/

function ashe_excerpt_length() {	
	return 2000;
}
add_filter( 'excerpt_length', 'ashe_excerpt_length', 999 );

function ashe_new_excerpt( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'ashe_new_excerpt' );

if ( ! function_exists( 'ashe_excerpt' ) ) {

	function ashe_excerpt( $limit = 50 ) {
	    echo '<p>'.wp_trim_words(get_the_excerpt(), $limit).'</p>';
	}

}


/*
** Custom Functions
*/

// Include Theme Defaults
require get_parent_theme_file_path( '/inc/customizer/customizer-defaults.php' );

// Page Layouts
function ashe_page_layout() {

	// WooCommerce check
	$shop_page = false;
	
	if ( class_exists( 'WooCommerce' ) ) {
		$shop_page = is_shop();
	}

	// get layout
 	if ( $shop_page ) {
		return ashe_options( 'general_shop_layout' );
	} elseif ( is_page() ) {
		return  substr(ashe_options( 'general_home_layout' ), 0, 4) .'-rsidebarlrsidebar';
	} elseif ( is_home() ) {
		return ashe_options( 'general_home_layout' );
	} elseif ( is_single() ) {
		return ashe_options( 'general_single_layout' );
	} else {
		return ashe_options( 'general_other_layout' );
	}

}
add_action( 'wp', 'ashe_page_layout' );


// HEX to RGBA Converter
function ashe_hex2rgba( $color, $opacity = 1 ) {

	// remove '#' from string
	$color = substr( $color, 1 );

	// get values from string
	$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );

    // convert HEX to RGB
    $rgb = array_map( 'hexdec', $hex );

    // convert HEX to RGBA
	$output = 'rgba('. implode( ",", $rgb ) .', '. $opacity .')';

    return $output;
}

// Get Thumbnail
if ( ! function_exists( 'ashe_post_thumbnail' ) ) {
	function ashe_post_thumbnail() {
		if ( has_post_thumbnail() ) {
			if ( strpos( ashe_page_layout(), 'col1' ) === 0 || is_single() ) {
				the_post_thumbnail( 'ashe-full-thumbnail' );	
			} else if ( strpos( ashe_page_layout(), 'list' ) === 0 ) {
				the_post_thumbnail( 'ashe-list-thumbnail' );
			} else {
				the_post_thumbnail( 'ashe-grid-thumbnail' );
			}
		}
	}
}

// Social Media
if ( ! function_exists( 'ashe_social_media' ) ) {

	function ashe_social_media( $social_class='' ) {

	?>

		<div class="<?php echo esc_attr( $social_class ); ?>">

			<?php
			$social_window = ( ashe_options( 'social_media_window' ) === true )?'_blank':'_self';
			if ( ashe_options( 'social_media_url_1' ) !== '' ) :
			?>

			<a href="<?php echo esc_url( ashe_options( 'social_media_url_1' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<?php ashe_social_media_icon( '1' ); ?>
			</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_2' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_2' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<?php ashe_social_media_icon( '2' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_3' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_3' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<?php ashe_social_media_icon( '3' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_4' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_4' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<?php ashe_social_media_icon( '4' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_5' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_5' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<?php ashe_social_media_icon( '5' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_6' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_6' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<?php ashe_social_media_icon( '6' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_7' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_7' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<?php ashe_social_media_icon( '7' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_8' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_8' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<?php ashe_social_media_icon( '8' ); ?>
				</a>
			<?php endif; ?>

		</div>

	<?php

	} // ashe_social_media()

	function ashe_social_media_icon( $icon ) {

		$icon = ashe_options( 'social_media_icon_'. $icon );

		$social_icons_fab = array(
			'facebook-f',
			'facebook',
			'twitter',
			'twitter-square',
			'google',
			'google-plus-g',
			'linkedin-in',
			'linkedin',
			'pinterest',
			'pinterest-p',
			'pinterest-square',
			'behance',
			'behance-square',
			'tumblr',
			'tumblr-square',
			'reddit',
			'reddit-alien',
			'reddit-square',
			'dribbble',
			'vk',
			'skype',
			'youtube',
			'youtube-square',
			'vimeo-v',
			'vimeo',
			'soundcloud',
			'instagram',
			'flickr',
			'github',
			'github-alt',
			'github-square',
			'stack-overflow',
			'qq',
			'weibo',
			'weixin',
			'xing',
			'xing-square',
			'medium',
			'etsy',
			'snapchat',
			'snapchat-ghost',
			'snapchat-square',
			'meetup',
			'amazon',
			'paypal',
			'cc-paypal',
			'amazon',
			'cc-visa',
			'goodreads',
			'goodreads-g'
		);

		$social_icons_fas = array(
			'film',
			'rss',
			'heart',
			'gamepad',
			'envelope',
			'book',
			'tablet-alt',
			'credit-card',

		);

		if ( in_array( $icon, $social_icons_fab ) ) {
		    echo '<i class="fab fa-'.  $icon .'"></i>';
		}

		if ( in_array( $icon, $social_icons_fas ) ) {
		    echo '<i class="fas fa-'.  $icon .'"></i>';
		}
		
	}

}

// Related Posts
if ( ! function_exists( 'ashe_related_posts' ) ) {
	
	function ashe_related_posts( $title, $orderby ) {

		global $post;
		$current_categories	= get_the_category();

		if ( $current_categories ) {

			$first_category	= $current_categories[0]->term_id;

			// Random
			if ( $orderby === 'random' ) {
				$args = array(
					'post_type'				=> 'post',
					'post__not_in'			=> array( $post->ID ),
					'orderby'				=> 'rand',
					'posts_per_page'		=> 3,
					'ignore_sticky_posts'	=> 1,
				    'meta_query' => array(
				        array(
				         'key' => '_thumbnail_id',
				         'compare' => 'EXISTS'
				        ),
				    )
				);

			// Similar
			} else {
				$args = array(
					'post_type'				=> 'post',
					'category__in'			=> array( $first_category ),
					'post__not_in'			=> array( $post->ID ),
					'orderby'				=> 'rand',
					'posts_per_page'		=> 3,
					'ignore_sticky_posts'	=> 1,
				    'meta_query' => array(
				        array(
				         'key' => '_thumbnail_id',
				         'compare' => 'EXISTS'
				        ),
				    )
				);
			}

			$similar_posts = new WP_Query( $args );	

			if ( $similar_posts->have_posts() ) {

			?>

			<div class="related-posts">
				<h3><?php echo esc_html( $title ); ?></h3>

				<?php 

				while ( $similar_posts->have_posts() ) { 
					$similar_posts->the_post();
					if ( has_post_thumbnail() ) {
				?>
					<section>
						<a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail('ashe-grid-thumbnail'); ?></a>
						<h4><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h4>
						<span class="related-post-date"><?php echo get_the_time( get_option('date_format') ); ?></span>
					</section>

				<?php

					} // end if
				} // end while

				?>

				<div class="clear-fix"></div>
			</div>

			<?php

			} // end have_posts()

		} // if ( $current_categories )

		wp_reset_postdata();

	} // ashe_related_posts()
} // function_exists( 'ashe_related_posts' )


/*
** Custom Search Form
*/
function ashe_custom_search_form( $html ) {

	$html  = '<form role="search" method="get" id="searchform" class="clear-fix" action="'. esc_url( home_url( '/' ) ) .'">';
	$html .= '<input type="search" name="s" id="s" placeholder="'. esc_attr__( 'Search...', 'ashe-pro' ) .'" data-placeholder="'. esc_attr__( 'Type & hit Enter...', 'ashe-pro' ) .'" value="'. get_search_query() .'" />';
	$html .= '<span class="svg-fa-wrap"><i class="fa fa-search"></i></span>';
	$html .= '<input type="submit" id="searchsubmit" value="st" />';
	$html .= '</form>';

	return $html;
}
add_filter( 'get_search_form', 'ashe_custom_search_form' );



/*
**  Facebook Sharing Meta
*/
function ashe_meta_sharing() {

	global $post;
	$post_id = get_the_ID();
    $temp = $post;
    $post = get_post( $post_id );
    setup_postdata( $post );
    $excerpt = get_the_excerpt();
    wp_reset_postdata();
    $post = $temp;
	$fb_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );

	if ( has_custom_logo() ) {
		$fb_default_image = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
	} else {
		$fb_default_image = get_header_image();
	}

	// Home Page
	if ( ! is_single() && ! is_page() ) {
		
        echo '<meta property="og:image" content="'. $fb_default_image .'"/>';
		echo '<meta property="og:title" content="'. get_bloginfo('name') .'"/>';
		echo '<meta property="og:description" content="'.get_bloginfo('description') .'" />';
		echo '<meta property="og:url" content="'. get_site_url() .'/" />';

	// Other Pages
	} else {

		if ( isset( $fb_image ) && has_post_thumbnail( $post_id ) ) {
			echo '<meta property="og:image" content="'. $fb_image[0] .'"/>';
			echo '<meta property="og:image:width" content="'. $fb_image[1] .'"/>';
			echo '<meta property="og:image:height" content="'. $fb_image[2] .'"/>';
		} else {
			echo '<meta property="og:image" content="'. $fb_default_image .'"/>';
		}

		echo '<meta property="og:title" content="'. get_the_title() .'"/>';
		echo '<meta property="og:description" content="'. $excerpt .'" />';
		echo '<meta property="og:url" content="'. esc_url( get_permalink() ) .'"/>';

	}

	echo '<meta property="og:type" content="website">';
	echo '<meta property="og:locale" content="'. strtolower( str_replace( '-', '_', get_bloginfo('language') ) ) .'" />';
	echo '<meta property="og:site_name" content="'. get_bloginfo('name') .'"/>';
}
add_action( 'wp_head', 'ashe_meta_sharing' );


/*
**  Post Share
*/
if ( ! function_exists( 'ashe_post_sharing' ) ) { 
	function ashe_post_sharing() {	
	
	global $post; ?>	
	<div class="post-share">

		<?php if ( ashe_options( 'blog_page_show_facebook' ) ) : 
		$facebook_src = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( get_the_permalink() ); ?>
		<a class="facebook-share" target="_blank" href="<?php echo esc_url ( $facebook_src ); ?>">
			<i class="fab fa-facebook-f"></i>
		</a>
		<?php endif; ?>

		<?php if ( ashe_options( 'blog_page_show_twitter' ) ) : 
		$twitter_src = 'https://twitter.com/home?status=Check%20out%20this%20article:%20'.get_the_title().'%20-%20'.esc_url( get_the_permalink() ); ?>
		<a class="twitter-share" target="_blank" href="<?php echo esc_url ( $twitter_src ); ?>">
			<i class="fab fa-twitter"></i>
		</a>
		<?php endif; ?>

		<?php if ( ashe_options( 'blog_page_show_pinterest' ) ) : 
		$pinterest_src = 'https://pinterest.com/pin/create/button/?url='.esc_url( get_the_permalink() ).'&amp;media='.esc_url( wp_get_attachment_url( get_post_thumbnail_id($post->ID)) ).'&amp;description='.get_the_title(); ?>
		<a class="pinterest-share" target="_blank" href="<?php echo esc_url ( $pinterest_src ); ?>">
			<i class="fab fa-pinterest"></i>
		</a>
		<?php endif; ?>

		<?php if ( ashe_options( 'blog_page_show_google' ) ) : 
		$google_src = 'https://plus.google.com/share?url='. esc_url( get_the_permalink() ); ?>
		<a class="googleplus-share" target="_blank" href="<?php echo esc_url ( $google_src ); ?>">
			<i class="fab fa-google-plus-g"></i>
		</a>										
		<?php endif; ?>

		<?php if ( ashe_options( 'blog_page_show_linkedin' ) ) :
		$linkedin_src = 'http://www.linkedin.com/shareArticle?url='.esc_url( get_the_permalink() ).'&amp;title='.get_the_title(); ?>
		<a class="linkedin-share" target="_blank" href="<?php echo esc_url( $linkedin_src ); ?>">
			<i class="fab fa-linkedin"></i>
		</a>
		<?php endif; ?>

		<?php if ( ashe_options( 'blog_page_show_tumblr' ) ) : 
		$tumblr_src = 'http://www.tumblr.com/share/link?url='. urlencode( esc_url(get_permalink()) ) .'&amp;name='.urlencode( get_the_title() ).'&amp;description='.urlencode( wp_trim_words( get_the_excerpt(), 50 ) ); ?>
		<a class="tumblr-share" target="_blank" href="<?php echo esc_url( $tumblr_src ); ?>">
			<i class="fab fa-tumblr"></i>
		</a>
		<?php endif; ?>

		<?php if ( ashe_options( 'blog_page_show_reddit' ) ) : 
		$reddit_src = 'http://reddit.com/submit?url='. esc_url( get_the_permalink() ) .'&amp;title='.get_the_title(); ?>
		<a class="reddit-share" target="_blank" href="<?php echo esc_url( $reddit_src ); ?>">
			<i class="fab fa-reddit"></i>
		</a>
		<?php endif; ?>

	</div>
	<?php
	}
}


/*
** Comments Form Section
*/

if ( ! function_exists( 'ashe_comments' ) ) {

	function ashe_comments ( $comment, $args, $depth ) {
		$_GLOBAL['comment'] = $comment;

		if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ) : ?>
			
		<li class="pingback" id="comment-<?php comment_ID(); ?>">
			<article <?php comment_class('entry-comments'); ?> >
				<div class="comment-content">
					<h3 class="comment-author"><?php esc_html_e( 'Pingback:', 'ashe-pro' ); ?></h3>	
					<div class="comment-meta">		
						<a class="comment-date" href=" <?php echo esc_url( get_comment_link() ); ?> "><?php comment_date( get_option('date_format') ); esc_html_e( '&nbsp;at&nbsp;', 'ashe-pro' ); comment_time( get_option('time_format') ); ?></a>
						<?php echo edit_comment_link( esc_html__('[Edit]', 'ashe-pro' ) ); ?>
						<div class="clear-fix"></div>
					</div>
					<div class="comment-text">			
					<?php comment_author_link(); ?>
					</div>
				</div>
			</article>

		<?php elseif ( get_comment_type() == 'comment' ) : ?>

		<li id="comment-<?php comment_ID(); ?>">
			
			<article <?php comment_class( 'entry-comments' ); ?> >					
				<div class="comment-avatar">
					<?php 
						$avatar_size = 75;
						if( $comment->comment_parent != 0 ) {
							$avatar_size = 70;
						}
						echo get_avatar( $comment, $avatar_size );
					?>
				</div>
				<div class="comment-content">
					<h3 class="comment-author"><?php comment_author_link(); ?></h3>
					<div class="comment-meta">		
						<a class="comment-date" href=" <?php echo esc_url( get_comment_link() ); ?> "><?php comment_date( get_option('date_format') ); esc_html_e( '&nbsp;at&nbsp;', 'ashe-pro' ); comment_time( get_option('time_format') ); ?></a>
			
						<?php 
						echo edit_comment_link( esc_html__('[Edit]', 'ashe-pro' ) );
						comment_reply_link(array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']) ) );
						?>
						
						<div class="clear-fix"></div>
					</div>

					<div class="comment-text">
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'ashe-pro' ); ?></p>
						<?php endif; ?>
						<?php comment_text(); ?>
					</div>
				</div>
				
			</article>

		<?php endif;
	}
}

// Move Comments Textarea
function ashe_move_comments_field( $fields ) {

	// unset/set
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'ashe_move_comments_field' );

  
/*
**  Author Social
*/

function ashe_contactmethods( $contactmethods ) {

 	$contactmethods['facebook']     = esc_html__( 'Facebook', 'ashe-pro' );
    $contactmethods['twitter']      = esc_html__( 'Twitter', 'ashe-pro' );
    $contactmethods['instagram']    = esc_html__( 'Instagram', 'ashe-pro' );
    $contactmethods['pinterest']	= esc_html__( 'Pinterest', 'ashe-pro' );
    $contactmethods['bloglovin']    = esc_html__( 'Bloglovin', 'ashe-pro' );
    $contactmethods['google_plus']	= esc_html__( 'Google Plus', 'ashe-pro' );
    $contactmethods['tumblr']       = esc_html__( 'Tumblr', 'ashe-pro' );
    $contactmethods['youtube']      = esc_html__( 'Youtube', 'ashe-pro' );
    $contactmethods['vine']         = esc_html__( 'Vine', 'ashe-pro' );
    $contactmethods['flickr']       = esc_html__( 'Flickr', 'ashe-pro' );
    $contactmethods['linkedin']     = esc_html__( 'Linkedin', 'ashe-pro' );
    $contactmethods['behance']      = esc_html__( 'Behance', 'ashe-pro' );
    $contactmethods['soundcloud']   = esc_html__( 'Soundcloud', 'ashe-pro' );
    $contactmethods['vimeo']        = esc_html__( 'Vimeo', 'ashe-pro' );
    $contactmethods['rss']          = esc_html__( 'Rss', 'ashe-pro' );
    $contactmethods['dribbble']     = esc_html__( 'Dribbble', 'ashe-pro' );
    $contactmethods['envelope']     = esc_html__( 'Envelope', 'ashe-pro' );

	return $contactmethods;
}

add_filter( 'user_contactmethods', 'ashe_contactmethods', 10, 1 );


/*
** WooCommerce
*/

if ( class_exists( 'WooCommerce' ) ) {

	// get shop page ID
	$shop_page_id = get_option( 'woocommerce_shop_page_id' );

	// wrap woocommerce content - start
	function ashe_woocommerce_output_content_wrapper() {

		$shop_page_id 	= get_option('woocommerce_shop_page_id');
		$sidebars 	= is_shop() ? ashe_page_layout() : '';
		$layout 	= get_field( 'full_width_page_content', $shop_page_id ) !== 'yes' ? ' boxed-wrapper': '';

		echo '<div class="main-content clear-fix'. $layout .'" data-layout="'. esc_attr( $sidebars ) .'">';

		// Sidebar Left
		if ( is_shop() ) {
			get_template_part( 'templates/sidebars/sidebar-shop', 'left' );
		}	

		echo '<div class="main-container">';

	}
	add_action( 'woocommerce_before_main_content', 'ashe_woocommerce_output_content_wrapper', 5 );

	// wrap woocommerce content - end
	function ashe_woocommerce_output_content_wrapper_end() {

		echo '</div><!-- .main-container -->';

		// Sidebar Right
		if ( is_shop() ) {
			get_template_part( 'templates/sidebars/sidebar-shop', 'right' );
		}

		echo '</div><!-- .main-content -->';

	}
	add_action( 'woocommerce_after_main_content', 'ashe_woocommerce_output_content_wrapper_end', 50 );

	// Remove Default Sidebar
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

	// Change product grid columns
	if ( ! function_exists('ashe_woocommerce_grid_columns') ) {
		function ashe_woocommerce_grid_columns() {

			if ( is_product() ) {
				return;
			}

			if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
				$columns = substr( ashe_options( 'general_shop_layout' ), 3, 1 );
				return $columns;
			}
			
		}
	}
	add_filter('loop_shop_columns', 'ashe_woocommerce_grid_columns');

	// Change related products grid columns
	add_filter( 'woocommerce_output_related_products_args', 'ashe_related_products_args' );
	  function ashe_related_products_args( $args ) {
	  	$args['posts_per_page'] = 3;
		$args['columns'] = 3;
		return $args;
	}

	// Remove Breadcrumbs
	if ( ! function_exists('ashe_remove_wc_breadcrumbs') ) {
		function ashe_remove_wc_breadcrumbs() {
		    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		}
	}
	add_action( 'init', 'ashe_remove_wc_breadcrumbs' );


	// Shop Per Page Field
	function ashe_shop_posts_per_page() {

		add_settings_section( 'reading_settings_section',
			'',
			'',
			'reading'
		);

		add_settings_field( 
			'shop_posts_per_page',
			esc_html__( 'Shop pages show at most', 'ashe-pro' ),
			'ashe_shop_posts_per_page_callback',
			'reading',
			'reading_settings_section',
			array(                       
				esc_html__( 'posts', 'ashe-pro' )
			)
		);

		register_setting(
			'reading',
			'shop_posts_per_page'
		);

	}
	add_action('admin_init', 'ashe_shop_posts_per_page');

	function ashe_shop_posts_per_page_callback( $args ) {

		$value = ( get_option( 'shop_posts_per_page' ) ) ? get_option( 'shop_posts_per_page' ) : 9;

		echo '<input type="number" id="shop_posts_per_page" name="shop_posts_per_page" value="'. $value .'" class="small-text"/>';

		echo '<label for="shop_posts_per_page"> '  . $args[0] . '</label>';

	}

	// Shop Per Page
	function ashe_set_shop_post_per_page( $cols ) {
		$cols = ( get_option( 'shop_posts_per_page' ) ) ? get_option( 'shop_posts_per_page' ) : 9;
		return $cols;
	}
	add_filter( 'loop_shop_per_page', 'ashe_set_shop_post_per_page', 20 );


	// Pagination
	remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );

	function woocommerce_pagination() {
		get_template_part( 'templates/grid/blog', 'pagination' );
	}
	add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );


} // end check - woocommerce is active


/*
** Integrate ACF PRO
*/
 
function my_acf_settings_path( $path ) {
    $path = get_template_directory() . '/plugins/acf-pro/';
    return $path;
}
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_dir( $dir ) {
    $dir = get_template_directory_uri() . '/plugins/acf-pro/';
    return $dir;
}
add_filter('acf/settings/dir', 'my_acf_settings_dir');

include_once( get_template_directory() . '/plugins/acf-pro/acf.php' );

// Enable WordPress Custom Fields
add_filter('acf/settings/remove_wp_meta_box', '__return_false');


/*
** Includes
*/

// Customizer
require get_parent_theme_file_path( '/inc/customizer/fonts/google-fonts.php' );
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );
require get_parent_theme_file_path( '/inc/customizer/dynamic-css.php' );

// Options
require get_parent_theme_file_path( '/inc/options/theme-options.php' );
require get_parent_theme_file_path( '/inc/options/theme-license.php' );
require get_parent_theme_file_path( '/inc/options/import/royal-importer.php' );

// Metaboxes
require get_parent_theme_file_path( '/inc/metaboxes/metabox.php' );

// Custom Widget
require get_parent_theme_file_path( '/inc/widgets/social-widget.php' );
require get_parent_theme_file_path( '/inc/widgets/author-widget.php' );
require get_parent_theme_file_path( '/inc/widgets/promo-box-widget.php' );

// Shortcodes
require get_parent_theme_file_path( '/inc/shortcodes/shortcodes.php' );


/*
** v3.1 Update Fix (from v1.4.4)
*/
$ashe_pro_unsr = $wpdb->get_results("select * from wp_options where option_name='theme_mods_ashe-pro'");
$ashe_pro_mods = ! empty($ashe_pro_unsr) ? maybe_unserialize($ashe_pro_unsr[0]->option_value) : null;
$get_current_theme = wp_get_theme();

if ( $get_current_theme->template === 'ashe-pro-premium' && ! is_null($ashe_pro_mods) && get_option('ashe_pro_3_freemius_update') !== 'updated' ) {
	
	if ( isset($ashe_pro_mods['custom_logo']) ) 
	set_theme_mod( 'custom_logo', $ashe_pro_mods['custom_logo'] );
	if ( isset($ashe_pro_mods['header_textcolor']) )
	set_theme_mod( 'header_textcolor', $ashe_pro_mods['header_textcolor'] );
	if ( isset($ashe_pro_mods['header_image']) )
	set_theme_mod( 'header_image', $ashe_pro_mods['header_image'] );
	if ( isset($ashe_pro_mods['background_color']) )
	set_theme_mod( 'background_color', $ashe_pro_mods['background_color'] );
	if ( isset($ashe_pro_mods['background_image']) )
	set_theme_mod( 'background_image', $ashe_pro_mods['background_image'] );
	if ( isset($ashe_pro_mods['background_position_x']) )
	set_theme_mod( 'background_position_x', $ashe_pro_mods['background_position_x'] );
	if ( isset($ashe_pro_mods['background_position_y']) )
	set_theme_mod( 'background_position_y', $ashe_pro_mods['background_position_y'] );
	if ( isset($ashe_pro_mods['background_size']) )
	set_theme_mod( 'background_size', $ashe_pro_mods['background_size'] );
	if ( isset($ashe_pro_mods['background_repeat']) )
	set_theme_mod( 'background_repeat', $ashe_pro_mods['background_repeat'] );
	if ( isset($ashe_pro_mods['custom_css_post_id']) )
	set_theme_mod( 'custom_css_post_id', $ashe_pro_mods['custom_css_post_id'] );
	update_option( 'ashe_pro_3_freemius_update', 'updated' );

}