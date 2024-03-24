<?php

/*
** Register Theme Customizer
*/
function ashe_customize_register( $wp_customize ) {

/*
** Sanitization Callbacks =====
*/
	// checkbox
	function ashe_sanitize_checkbox( $input ) {
		return $input ? true : false;
	}
	
	// select
	function ashe_sanitize_select( $input, $setting ) {
		
		// check for slug
		$input = sanitize_key( $input );
		
		// get all select options
		$options = $setting->manager->get_control( $setting->id )->choices;
		
		// return default if not valid
		return ( array_key_exists( $input, $options ) ? $input : $setting->default );
	}

	// number absint
	function ashe_sanitize_number_absint( $number, $setting ) {

		// ensure $number is an absolute integer
		$number = absint( $number );

		// return default if not integer
		return ( $number >= 0 ? $number : $setting->default );

	}

	// number float
	function ashe_sanitize_number_float( $number, $setting ) {

		// ensure $number is an absolute integer
		if ( $number != 0 ) {
			$number = floatval( $number );
		}

		// return default if not integer
		return ( $number >= 0 ? $number : $setting->default );

	}	

	// textarea
	function ashe_sanitize_textarea( $input ) {

		$allowedtags = array(
			'a' => array(
				'href' 		=> array(),
				'title' 	=> array(),
				'_blank'	=> array()
			),
			'img' => array(
				'src' 		=> array(),
				'alt' 		=> array(),
				'width'		=> array(),
				'height'	=> array(),
				'style'		=> array(),
				'class'		=> array(),
				'id'		=> array()
			),
			'br' 	 => array(),
			'em' 	 => array(),
			'strong' => array()
		);

		// return filtered html
		return wp_kses( $input, $allowedtags );

	}

	// fonts
	function ashe_sanitize_fonts( $font ) {
		return $font;
	}


/*
** Reusable Functions =====
*/
	// checkbox
	function ashe_checkbox_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'header_image' ) {
			$section_id = 'ashe_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_checkbox'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> $section_id,
			'type'		=> 'checkbox',
			'priority'	=> $priority
		) );
	}

	// text
	function ashe_text_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'ashe_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// color
	function ashe_color_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ashe_options['. $section .'_'. $id .']', array(
			'label' 	=> $name,
			'section' 	=> 'ashe_'. $section,
			'priority'	=> $priority
		) ) );
	}

	// textarea
	function ashe_textarea_control( $section, $id, $name, $description, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_textarea'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'description'	=> $description,
			'section'		=> 'ashe_'. $section,
			'type'			=> 'textarea',
			'priority'		=> $priority
		) );
	}

	// url
	function ashe_url_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'ashe_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// number absint
	function ashe_number_absint_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'title_tagline' && $section !== 'header_image' ) {
			$section_id = 'ashe_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_number_absint'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> $section_id,
			'type'			=> 'number',
			'input_attrs' 	=> $atts,
			'priority'		=> $priority
		) );
	}

	// number float
	function ashe_number_float_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_number_float'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> 'ashe_'. $section,
			'type'			=> 'number',
			'input_attrs' 	=> $atts,
			'priority'		=> $priority
		) );
	}

	// select
	function ashe_select_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'header_image' ) {
			$section_id = 'ashe_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_select'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> $section_id,
			'type'			=> 'select',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// radio
	function ashe_radio_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'header_image' ) {
			$section_id = 'ashe_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id ),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_select'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> $section_id,
			'type'			=> 'radio',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// image
	function ashe_image_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
		    'default' 	=> ashe_options( $section .'_'. $id ),
		    'type' 		=> 'option',
		    'transport' => $transport,
		    'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, 'ashe_options['. $section .'_'. $id .']', array(
				'label'    => $name,
				'section'  => 'ashe_'. $section,
				'priority' => $priority
			)
		) );
	}

	// image crop
	function ashe_image_crop_control( $section, $id, $name, $width, $height, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default' 	=> '',
			'type' 		=> 'option',
			'transport' => $transport,
			'sanitize_callback' => 'ashe_sanitize_number_absint'
		) );
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'ashe_options['. $section .'_'. $id .']', array(
				'label'    		=> $name,
				'section'  		=> 'ashe_'. $section,
				'flex_width'  	=> true,
				'flex_height' 	=> true,
				'width'       	=> $width,
				'height'      	=> $height,
				'priority' 		=> $priority
			)
		) );
	}


/*
** Custom Controls =====
*/

	class Ashe_Google_Fonts_Control extends WP_Customize_Control {
	    public $type = 'gfonts';
	 
	    public function render_content() {

	    	$html  = '<label>';
	    		$html .= '<span class="customize-control-title">'. esc_html( $this->label ) .'</span>';
	    		$html .= ashe_google_fonts_dropdown( $this->id, $this->value(), $this->get_link() );
	    	$html .= '</label>';
	        
	        echo $html;

	    }
	}


/*
** Colors =====
*/
	// add Colors section
	$wp_customize->add_section( 'ashe_colors' , array(
		'title'		 => esc_html__( 'Colors', 'ashe-pro' ),
		'priority'	 => 1,
		'capability' => 'edit_theme_options'
	) );

	$wp_customize->get_control( 'background_color' )->section = 'ashe_colors';
	$wp_customize->get_control( 'background_color' )->priority = 3;
	$wp_customize->get_control( 'background_image' )->section = 'ashe_colors';
	$wp_customize->get_control( 'background_image' )->priority = 4;
	$wp_customize->get_control( 'background_preset' )->section = 'ashe_colors';
	$wp_customize->get_control( 'background_preset' )->priority = 5;
	$wp_customize->get_control( 'background_position' )->section = 'ashe_colors';
	$wp_customize->get_control( 'background_position' )->priority = 6;
	$wp_customize->get_control( 'background_size' )->section = 'ashe_colors';
	$wp_customize->get_control( 'background_size' )->priority = 7;
	$wp_customize->get_control( 'background_repeat' )->section = 'ashe_colors';
	$wp_customize->get_control( 'background_repeat' )->priority = 8;
	$wp_customize->get_control( 'background_attachment' )->section = 'ashe_colors';
	$wp_customize->get_control( 'background_attachment' )->priority = 9;

	// Top Bar Background
	ashe_color_control( 'colors', 'top_bar_bg', esc_html__( 'Background', 'ashe-pro' ), 'postMessage', 24 );

	// Top Bar Link
	ashe_color_control( 'colors', 'top_bar_link', esc_html__( 'Link', 'ashe-pro' ), 'postMessage', 27 );

	// Top Bar Link Hover
	ashe_color_control( 'colors', 'top_bar_link_hover', esc_html__( 'Link Hover', 'ashe-pro' ), 'postMessage', 30 );
	
	// Header Background
	ashe_color_control( 'colors', 'header_bg', esc_html__( 'Background', 'ashe-pro' ), 'postMessage', 33 );

	// Header Text Color
	$wp_customize->get_control( 'header_textcolor' )->section = 'ashe_colors';
	$wp_customize->get_control( 'header_textcolor' )->priority = 36;
	$wp_customize->get_control( 'header_textcolor' )->label = 'Text';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Main Navigation
	ashe_color_control( 'colors', 'main_nav_bg', esc_html__( 'Background', 'ashe-pro' ), 'postMessage', 39 );
	
	// Main Navigation Link
	ashe_color_control( 'colors', 'main_nav_link', esc_html__( 'Link', 'ashe-pro' ), 'postMessage', 42 );
	
	// Main Navigation Link Hover
	ashe_color_control( 'colors', 'main_nav_link_hover', esc_html__( 'Link Hover', 'ashe-pro' ), 'postMessage', 45 );

	// Content Background
	ashe_color_control( 'colors', 'content_bg', esc_html__( 'Background', 'ashe-pro' ), 'postMessage', 48 );

	// Content Text
	ashe_color_control( 'colors', 'content_text', esc_html__( 'Text', 'ashe-pro' ), 'postMessage', 51 );

	// Content Title
	ashe_color_control( 'colors', 'content_title', esc_html__( 'Title', 'ashe-pro' ), 'postMessage', 54 );

	// Content Meta
	ashe_color_control( 'colors', 'content_meta', esc_html__( 'Meta', 'ashe-pro' ), 'postMessage', 57 );

	// Content Accent
	ashe_color_control( 'colors', 'content_accent', esc_html__( 'Accent', 'ashe-pro' ), 'postMessage', 60 );

	// Text Selection
	ashe_color_control( 'colors', 'text_selection', esc_html__( 'Text Selection', 'ashe-pro' ), 'postMessage', 63 );

	// Content Border
	ashe_color_control( 'colors', 'content_border', esc_html__( 'Border', 'ashe-pro' ), 'postMessage', 66 );

	// Button
	ashe_color_control( 'colors', 'button', esc_html__( 'Background', 'ashe-pro' ), 'postMessage', 69 );

	// Button Text
	ashe_color_control( 'colors', 'button_text', esc_html__( 'Text', 'ashe-pro' ), 'postMessage', 72 );

	// Button Hover
	ashe_color_control( 'colors', 'button_hover', esc_html__( 'Hover Background', 'ashe-pro' ), 'postMessage', 75 );

	// Button Hover Text
	ashe_color_control( 'colors', 'button_hover_text', esc_html__( 'Hover Text', 'ashe-pro' ), 'postMessage', 78 );

	// Image Overlay
	ashe_color_control( 'colors', 'overlay', esc_html__( 'Background', 'ashe-pro' ), 'postMessage', 81 );

	// Image Overlay Text
	ashe_color_control( 'colors', 'overlay_text', esc_html__( 'Text', 'ashe-pro' ), 'postMessage', 84 );

	// Footer Background
	ashe_color_control( 'colors', 'footer_bg', esc_html__( 'Background', 'ashe-pro' ), 'postMessage', 87 );

	// Footer Text
	ashe_color_control( 'colors', 'footer_text', esc_html__( 'Text', 'ashe-pro' ), 'postMessage', 90 );

	// Footer Title
	ashe_color_control( 'colors', 'footer_title', esc_html__( 'Title', 'ashe-pro' ), 'postMessage', 93 );

	// Footer Accent
	ashe_color_control( 'colors', 'footer_accent', esc_html__( 'Accent', 'ashe-pro' ), 'postMessage', 94 );

	// Footer Border
	ashe_color_control( 'colors', 'footer_border', esc_html__( 'Border', 'ashe-pro' ), 'postMessage', 96 );

	// Preloader Animation
	ashe_color_control( 'colors', 'preloader_anim', esc_html__( 'Animation', 'ashe-pro' ), 'postMessage', 99 );

	// Preloader Background
	ashe_color_control( 'colors', 'preloader_bg', esc_html__( 'Background', 'ashe-pro' ), 'postMessage', 102 );


/*
** General Layouts =====
*/
	// add General Layouts section
	$wp_customize->add_section( 'ashe_general' , array(
		'title'		 => esc_html__( 'General Layouts', 'ashe-pro' ),
		'priority'	 => 3,
		'capability' => 'edit_theme_options'
	) );

	// Site Width
	ashe_number_absint_control( 'general', 'site_width', esc_html__( 'Site Width', 'ashe-pro' ), array( 'step' => '10' ), 'postMessage', 1 );

	// Content Padding
	ashe_number_absint_control( 'general', 'content_padding', esc_html__( 'Content Padding', 'ashe-pro' ), array( 'step' => '1' ), 'postMessage', 1 );

	// Sidebar Width
	ashe_number_absint_control( 'general', 'sidebar_width', esc_html__( 'Sidebar Width', 'ashe-pro' ), array( 'step' => '10' ), 'refresh', 3 );

	// Sticky Sidebar
	ashe_checkbox_control( 'general', 'sidebar_sticky', esc_html__( 'Enable Sticky Sidebar', 'ashe-pro' ), 'refresh', 5 );

	// Page Layout Combinations
	$page_layouts = array(
		'col1-fullwidth' => esc_html__( '1 Column / No Sidebar', 'ashe-pro' ),
		'col1-lsidebar'  => esc_html__( '1 Column / Left Sidebar', 'ashe-pro' ),
		'col1-rsidebar'  => esc_html__( '1 Column / Right Sidebar', 'ashe-pro' ),
		'col1-lrsidebar' => esc_html__( '1 Column / Both Sidebars', 'ashe-pro' ),
		'col2-fullwidth' => esc_html__( '2 Columns / No Sidebar', 'ashe-pro' ),
		'col2-lsidebar'  => esc_html__( '2 Columns / Left Sidebar', 'ashe-pro' ),
		'col2-rsidebar'  => esc_html__( '2 Columns / Right Sidebar', 'ashe-pro' ),
		'col2-lrsidebar' => esc_html__( '2 Columns / Both Sidebars', 'ashe-pro' ),
		'col3-fullwidth' => esc_html__( '3 Columns / No Sidebar', 'ashe-pro' ),
		'col3-lsidebar'  => esc_html__( '3 Columns / Left Sidebar', 'ashe-pro' ),
		'col3-rsidebar'  => esc_html__( '3 Columns / Right Sidebar', 'ashe-pro' ),
		'col4-fullwidth' => esc_html__( '4 Columns / No Sidebar', 'ashe-pro' ),
		'list-fullwidth' => esc_html__( 'List Style / No Sidebar', 'ashe-pro' ),
		'list-lsidebar'  => esc_html__( 'List Style / Left Sidebar', 'ashe-pro' ),
		'list-rsidebar'  => esc_html__( 'List Style / Right Sidebar', 'ashe-pro' ),
		'list-lrsidebar' => esc_html__( 'List Style / Both Sidebar', 'ashe-pro' ),
	);

	// Blog Page Layout
	ashe_select_control( 'general', 'home_layout', esc_html__( 'Blog Page', 'ashe-pro' ), $page_layouts, 'refresh', 13 );

	$single_page_layout = array(
		'no-sidebar' => esc_html__( 'No Sidebar', 'ashe-pro' ),
		'lsidebar'   => esc_html__( 'Left Sidebar', 'ashe-pro' ),
		'rsidebar'   => esc_html__( 'Right Sidebar', 'ashe-pro' ),
		'lrsidebar'  => esc_html__( 'Both Sidebars', 'ashe-pro' ),
	);

	// Single Page Layout
	ashe_select_control( 'general', 'single_layout', esc_html__( 'Single Post Page', 'ashe-pro' ), $single_page_layout, 'refresh', 15 );

	// Shop Page Layout Combinations
	$shop_layouts = array(
		'col2-fullwidth' => esc_html__( '2 Columns / No Sidebar', 'ashe-pro' ),
		'col2-lsidebar'  => esc_html__( '2 Columns / Left Sidebar', 'ashe-pro' ),
		'col2-rsidebar'  => esc_html__( '2 Columns / Right Sidebar', 'ashe-pro' ),
		'col2-lrsidebar' => esc_html__( '2 Columns / Both Sidebars', 'ashe-pro' ),
		'col3-fullwidth' => esc_html__( '3 Columns / No Sidebar', 'ashe-pro' ),
		'col3-lsidebar'  => esc_html__( '3 Columns / Left Sidebar', 'ashe-pro' ),
		'col3-rsidebar'  => esc_html__( '3 Columns / Right Sidebar', 'ashe-pro' ),
		'col3-lrsidebar' => esc_html__( '3 Columns / Both Sidebars', 'ashe-pro' ),
		'col4-fullwidth' => esc_html__( '4 Columns / No Sidebar', 'ashe-pro' ),
		'col4-lsidebar'  => esc_html__( '4 Columns / Left Sidebar', 'ashe-pro' ),
		'col4-rsidebar'  => esc_html__( '4 Columns / Right Sidebar', 'ashe-pro' ),
	);

	// Shop Page Layout
	ashe_select_control( 'general', 'shop_layout', esc_html__( 'Shop Page', 'ashe-pro' ), $shop_layouts, 'refresh', 16 );

	// Other Page Layout
	ashe_select_control( 'general', 'other_layout', esc_html__( 'Other Pages', 'ashe-pro' ), $page_layouts, 'refresh', 17 );

	$boxed_width = array(
		'full' 		=> esc_html__( 'Full', 'ashe-pro' ),
		'contained' => esc_html__( 'Contained', 'ashe-pro' ),
		'boxed' 	=> esc_html__( 'Boxed', 'ashe-pro' ),
	);

	// Header Width
	ashe_select_control( 'general', 'header_width', esc_html__( 'Header Width', 'ashe-pro' ), $boxed_width, 'refresh', 25 );

	$boxed_width_slider = array(
		'full' => esc_html__( 'Full', 'ashe-pro' ),
		'boxed' => esc_html__( 'Boxed', 'ashe-pro' ),
	);

	// Slider Width
	ashe_select_control( 'general', 'slider_width', esc_html__( 'Featured Slider Width', 'ashe-pro' ), $boxed_width_slider, 'refresh', 27 );

	// Featured Links Width
	ashe_select_control( 'general', 'links_width', esc_html__( 'Featured Links Width', 'ashe-pro' ), $boxed_width_slider, 'refresh', 28 );

	// Content Width
	ashe_select_control( 'general', 'content_width', esc_html__( 'Content Width', 'ashe-pro' ), $boxed_width_slider, 'refresh', 29 );

	// Single Content Width
	ashe_select_control( 'general', 'single_width', esc_html__( 'Single Content Width', 'ashe-pro' ), $boxed_width_slider, 'refresh', 31 );

	// Footer Width
	ashe_select_control( 'general', 'footer_width', esc_html__( 'Footer Width', 'ashe-pro' ), $boxed_width, 'refresh', 33 );

	// Position Array
	$instagram_position = array(
		'none' 	=> esc_html__( 'None', 'ashe-pro' ),
		'above' => esc_html__( 'Above Page Header', 'ashe-pro' ),
		'below' => esc_html__( 'Below Page Content', 'ashe-pro' ),
	);

	// Instagram Position
	ashe_select_control( 'general', 'instagram_position', esc_html__( 'Position', 'ashe-pro' ), $instagram_position, 'refresh', 35 );


/*
** Top Bar =====
*/
	// add Top Bar section
	$wp_customize->add_section( 'ashe_top_bar' , array(
		'title'		 => esc_html__( 'Top Bar', 'ashe-pro' ),
		'priority'	 => 5,
		'capability' => 'edit_theme_options'
	) );

	// Top Bar label
	ashe_checkbox_control( 'top_bar', 'label', esc_html__( 'Top Bar', 'ashe-pro' ), 'refresh', 1 );

	$top_bar_align = array(
		'left-right' => esc_html__( 'Menu & Socials', 'ashe-pro' ),
		'right-left' => esc_html__( 'Socials & Menu', 'ashe-pro' ),
		'center' 	 => esc_html__( 'Menu & Socials Center', 'ashe-pro' )
	);

	// Align Content
	ashe_select_control( 'top_bar', 'align', esc_html__( 'Align', 'ashe-pro' ), $top_bar_align, 'postMessage', 3 );

	// Show Menu
	ashe_checkbox_control( 'top_bar', 'show_menu', esc_html__( 'Show Menu', 'ashe-pro' ), 'refresh', 7 );

	// Show Socials
	ashe_checkbox_control( 'top_bar', 'show_socials', esc_html__( 'Show Socials', 'ashe-pro' ), 'refresh', 9 );

	// Background Transparency
	ashe_checkbox_control( 'top_bar', 'transparent', esc_html__( 'Background Transparency', 'ashe-pro' ), 'refresh', 11 );


/*
** Header Image =====
*/

	$wp_customize->get_section( 'header_image' )->priority = 10;
	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Header Image, Slider & Video', 'ashe-pro' );

	// Page Header label
	ashe_checkbox_control( 'header_image', 'label', esc_html__( 'Page Header', 'ashe-pro' ), 'refresh', 1 );

	// Height
	ashe_number_absint_control( 'header_image', 'height', esc_html__( 'Height', 'ashe-pro' ), array( 'step' => '10' ), 'postMessage', 3 );
	
	$header_background = array(
		'image'  => esc_html__( 'Image', 'ashe-pro' ),
		'slider' => esc_html__( 'Slider', 'ashe-pro' ),
		'video'  => esc_html__( 'Video', 'ashe-pro' ),
	);

	// Background Style
	ashe_select_control( 'header_image', 'bg_type', esc_html__( 'Background Type', 'ashe-pro' ), $header_background, 'refresh', 5 );

	// Video Upload MP4
	$wp_customize->add_setting( 'ashe_options[header_image_video_mp4]', array(
		'default'	 => ashe_options( 'header_image_video_mp4' ),
		'type'		 => 'option',
		'transport'	 => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'ashe_options[header_image_video_mp4]', 
		array(
			'label'     	=> esc_html__( 'Upload MP4 Video', 'ashe-pro' ),
			'description' 	=> esc_html__( 'Please upload .mp4 video format to ensure cross-browser compatibility.', 'ashe-pro' ),
			'section'   	=> 'header_image',
			'priority'		=> 6
		) ) 
	);

	// Video Upload WebM
	$wp_customize->add_setting( 'ashe_options[header_image_video_webm]', array(
		'default'	 => ashe_options( 'header_image_video_webm' ),
		'type'		 => 'option',
		'transport'	 => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'ashe_options[header_image_video_webm]', 
		array(
			'label'     	=> esc_html__( 'Upload WebM Video', 'ashe-pro' ),
			'description' 	=> esc_html__( 'Please upload .ogg video format to ensure cross-browser compatibility.', 'ashe-pro' ),
			'section'   	=> 'header_image',
			'priority'		=> 7
		) ) 
	);

	// Background Image Size
	$bg_image_size = array(
		'cover'   => esc_html__( 'Cover', 'ashe-pro' ),
		'initial' => esc_html__( 'Pattern', 'ashe-pro' )
	);

	ashe_radio_control( 'header_image', 'bg_image_size', esc_html__( 'Background Image Size', 'ashe-pro' ), $bg_image_size, 'postMessage', 17 );

	// Enable Parallax
	ashe_checkbox_control( 'header_image', 'parallax', esc_html__( 'Enable Parallax Scrolling', 'ashe-pro' ), 'refresh', 19 );

	// Navigation
	ashe_checkbox_control( 'header_image', 'slider_navigation', esc_html__( 'Show Navigation Arrows', 'ashe-pro' ), 'refresh', 21 );
	
	// Pagination
	ashe_checkbox_control( 'header_image', 'slider_pagination', esc_html__( 'Show Pagination Dots', 'ashe-pro' ), 'refresh', 23 );

	// Autoplay
	ashe_number_absint_control( 'header_image', 'slider_autoplay', esc_html__( 'Autoplay', 'ashe-pro' ), array( 'step' => '500' ), 'refresh', 25 );


/*
** Site Identity =====
*/

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	
	// Logo Width
	ashe_number_absint_control( 'title_tagline', 'logo_width', esc_html__( 'Width', 'ashe-pro' ), array( 'step' => '10' ), 'postMessage', 13 );

	// Logo Top Distance
	ashe_number_absint_control( 'title_tagline', 'logo_distance', esc_html__( 'Top Distance', 'ashe-pro' ), array( 'step' => '10' ), 'postMessage', 15 );


/*
** Main Navigation =====
*/
	// add Main Navigation section
	$wp_customize->add_section( 'ashe_main_nav' , array(
		'title'		 => esc_html__( 'Main Navigation', 'ashe-pro' ),
		'priority'	 => 23,
		'capability' => 'edit_theme_options'
	) );

	// Main Navigation
	ashe_checkbox_control( 'main_nav', 'label', esc_html__( 'Main Navigation', 'ashe-pro' ), 'refresh', 1 );

	$main_nav_align = array(
		'left' => esc_html__( 'Left', 'ashe-pro' ),
		'center' => esc_html__( 'Center', 'ashe-pro' ),
		'right' => esc_html__( 'Right', 'ashe-pro' ),
	);

	// Align
	ashe_select_control( 'main_nav', 'align', esc_html__( 'Align', 'ashe-pro' ), $main_nav_align, 'refresh', 7 );

	// Position Array
	$main_nav_position = array(
		'above' => esc_html__( 'Above Page Header', 'ashe-pro' ),
		'below' => esc_html__( 'Below Page Header', 'ashe-pro' ),
	);

	// Position
	ashe_select_control( 'main_nav', 'position', esc_html__( 'Position', 'ashe-pro' ), $main_nav_position, 'refresh', 9 );

	// Fixed
	ashe_checkbox_control( 'main_nav', 'fixed', esc_html__( 'Fixed Navigation', 'ashe-pro' ), 'refresh', 10 );

	// Show Social Icons
	ashe_checkbox_control( 'main_nav', 'show_socials', esc_html__( 'Show Social Icons', 'ashe-pro' ), 'refresh', 11 );

	// Show Search Icon
	ashe_checkbox_control( 'main_nav', 'show_search', esc_html__( 'Show Search Icon', 'ashe-pro' ), 'refresh', 13 );

	// Show Sidebar Icon
	ashe_checkbox_control( 'main_nav', 'show_sidebar', esc_html__( 'Show Sidebar Icon', 'ashe-pro' ), 'refresh', 15 );

	// Merge to Responsive Menu
	ashe_checkbox_control( 'main_nav', 'merge_menu', esc_html__( 'Merge Top Menu - Responsive', 'ashe-pro' ), 'refresh', 17 );


/*
** Featured Slider =====
*/
	// add featured slider section
	$wp_customize->add_section( 'ashe_featured_slider' , array(
		'title'		 => esc_html__( 'Featured Slider', 'ashe-pro' ),
		'priority'	 => 25,
		'capability' => 'edit_theme_options'
	) );

	// Featured Slider
	ashe_checkbox_control( 'featured_slider', 'label', esc_html__( 'Featured Slider', 'ashe-pro' ), 'refresh', 1 );

	$slider_display = array(
		'all' 		=> 'All Posts',
		'category' 	=> 'by Post Category',
		'metabox' 	=> 'by Post Options - Metabox'
	);
	 
	// Display
	ashe_select_control( 'featured_slider', 'display', esc_html__( 'Display Posts', 'ashe-pro' ), $slider_display, 'refresh', 2 );

	$slider_cats = array();

	foreach ( get_categories() as $categories => $category ) {
	    $slider_cats[$category->term_id] = $category->name;
	}
	 
	// Category
	ashe_select_control( 'featured_slider', 'category', esc_html__( 'Select Category', 'ashe-pro' ), $slider_cats, 'refresh', 3 );

	$slider_orderby = array(
		'date' 			=> esc_html__( 'Date', 'ashe-pro' ),
		'comment_count'	=> esc_html__( 'Comments', 'ashe-pro' ),
		'rand'			=> esc_html__( 'Random', 'ashe-pro' )
	);

	// Order By
	ashe_select_control( 'featured_slider', 'orderby', esc_html__( 'Order by:', 'ashe-pro' ), $slider_orderby, 'refresh', 5 );

	// Amount
	ashe_number_absint_control( 'featured_slider', 'amount', esc_html__( 'Number of Slides', 'ashe-pro' ), array( 'step' => '1' ), 'refresh', 10 );

	$slider_culumns = array( 'step' => '1', 'min' => '1', 'max' => '4' );

	// Columns
	ashe_number_absint_control( 'featured_slider', 'columns', esc_html__( 'Columns', 'ashe-pro' ), $slider_culumns, 'refresh', 15 );

	// Autoplay
	ashe_number_absint_control( 'featured_slider', 'autoplay', esc_html__( 'Autoplay', 'ashe-pro' ), array( 'step' => '500' ), 'refresh', 20 );

	// Navigation
	ashe_checkbox_control( 'featured_slider', 'navigation', esc_html__( 'Show Navigation Arrows', 'ashe-pro' ), 'refresh', 25 );

	// Pagination
	ashe_checkbox_control( 'featured_slider', 'pagination', esc_html__( 'Show Pagination Dots', 'ashe-pro' ), 'refresh', 30 );

	// Categories
	ashe_checkbox_control( 'featured_slider', 'categories', esc_html__( 'Show Categories', 'ashe-pro' ), 'refresh', 35 );

	// Title
	ashe_checkbox_control( 'featured_slider', 'title', esc_html__( 'Show Title', 'ashe-pro' ), 'refresh', 40 );

	// Excerpt
	ashe_checkbox_control( 'featured_slider', 'excerpt', esc_html__( 'Show excerpt', 'ashe-pro' ), 'refresh', 45 );

	// Read More
	ashe_checkbox_control( 'featured_slider', 'more', esc_html__( 'Show Read More', 'ashe-pro' ), 'refresh', 50 );

	// Date
	ashe_checkbox_control( 'featured_slider', 'date', esc_html__( 'Show Date', 'ashe-pro' ), 'refresh', 55 );


/*
** Featured Links =====
*/
	// add featured links section
	$wp_customize->add_section( 'ashe_featured_links' , array(
		'title'		 => esc_html__( 'Featured Links', 'ashe-pro' ),
		'priority'	 => 27,
		'capability' => 'edit_theme_options'
	) );

	// Featured Links
	ashe_checkbox_control( 'featured_links', 'label', esc_html__( 'Featured Links', 'ashe-pro' ), 'refresh', 1 );

	// Links Window
	ashe_checkbox_control( 'featured_links', 'window', esc_html__( 'Open Links in New Window', 'ashe-pro' ), 'refresh', 3 );

	// Fill Container Width
	ashe_checkbox_control( 'featured_links', 'fill', esc_html__( 'Fill Container Width', 'ashe-pro' ), 'refresh', 5 );

	// Horizontal Gutter
	ashe_checkbox_control( 'featured_links', 'gutter_horz', esc_html__( 'Horizontal Gutter', 'ashe-pro' ), 'refresh', 7 );

	// Link #1 Title
	ashe_text_control( 'featured_links', 'title_1', esc_html__( 'Title', 'ashe-pro' ), 'postMessage', 9 );

	// Link #1 URL
	ashe_url_control( 'featured_links', 'url_1', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 11 );

	// Link #1 Image
	ashe_image_crop_control( 'featured_links', 'image_1', esc_html__( 'Image', 'ashe-pro' ), 600, 340, 'refresh', 13 );

	// Link #2 Title
	ashe_text_control( 'featured_links', 'title_2', esc_html__( 'Title', 'ashe-pro' ), 'postMessage', 15 );

	// Link #2 URL
	ashe_url_control( 'featured_links', 'url_2', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 17 );

	// Link #2 Image
	ashe_image_crop_control( 'featured_links', 'image_2', esc_html__( 'Image', 'ashe-pro' ), 600, 340, 'refresh', 19 );

	// Link #3 Title
	ashe_text_control( 'featured_links', 'title_3', esc_html__( 'Title', 'ashe-pro' ), 'postMessage', 21 );

	// Link #3 URL
	ashe_url_control( 'featured_links', 'url_3', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 23 );

	// Link #3 Image
	ashe_image_crop_control( 'featured_links', 'image_3', esc_html__( 'Image', 'ashe-pro' ), 600, 340, 'refresh', 25 );

	// Link #4 Title
	ashe_text_control( 'featured_links', 'title_4', esc_html__( 'Title', 'ashe-pro' ), 'postMessage', 27 );

	// Link #4 URL
	ashe_url_control( 'featured_links', 'url_4', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 29 );

	// Link #4 Image
	ashe_image_crop_control( 'featured_links', 'image_4', esc_html__( 'Image', 'ashe-pro' ), 600, 340, 'refresh', 31 );

	// Link #5 Title
	ashe_text_control( 'featured_links', 'title_5', esc_html__( 'Title', 'ashe-pro' ), 'postMessage', 33 );

	// Link #5 URL
	ashe_url_control( 'featured_links', 'url_5', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 35 );

	// Link #5 Image
	ashe_image_crop_control( 'featured_links', 'image_5', esc_html__( 'Image', 'ashe-pro' ), 600, 340, 'refresh', 37 );


/*
** Blog Page =====
*/
	// add Blog Page section
	$wp_customize->add_section( 'ashe_blog_page' , array(
		'title'		 => esc_html__( 'Blog Page', 'ashe-pro' ),
		'priority'	 => 29,
		'capability' => 'edit_theme_options'
	) );

	// Horizontal Gutter
	ashe_number_absint_control( 'blog_page', 'gutter_horz', esc_html__( 'Horizontal Gutter', 'ashe-pro' ), array( 'step' => '1' ), 'refresh', 3 );

	// Vertical Gutter
	ashe_number_absint_control( 'blog_page', 'gutter_vert', esc_html__( 'Vertical Gutter', 'ashe-pro' ), array( 'step' => '1' ), 'postMessage', 5 );

	// Grid Thumbnail Crop Width
	ashe_number_absint_control( 'blog_page', 'grid_crop_width', esc_html__( 'Grid Thumbnail Crop Width', 'ashe-pro' ), array( 'step' => '10' ), 'postMessage', 7 );

	// Grid Thumbnail Crop Height
	ashe_number_absint_control( 'blog_page', 'grid_crop_height', esc_html__( 'Grid Thumbnail Crop Height', 'ashe-pro' ), array( 'step' => '10' ), 'postMessage', 9 );

	// List Thumbnail Crop Width
	ashe_number_absint_control( 'blog_page', 'list_crop_width', esc_html__( 'List Thumbnail Crop Width', 'ashe-pro' ), array( 'step' => '10' ), 'postMessage', 11 );

	// List Thumbnail Crop Height
	ashe_number_absint_control( 'blog_page', 'list_crop_height', esc_html__( 'List Thumbnail Crop Height', 'ashe-pro' ), array( 'step' => '10' ), 'postMessage', 13 );

	$post_description = array(
		'none' 		=> esc_html__( 'None', 'ashe-pro' ),
		'excerpt' 	=> esc_html__( 'Post Excerpt', 'ashe-pro' ),
		'content' 	=> esc_html__( 'Post Content', 'ashe-pro' ),
	);

	// Post Description
	ashe_select_control( 'blog_page', 'post_description', esc_html__( 'Post Description', 'ashe-pro' ), $post_description, 'refresh', 15 );

	// Excerpt Length
	ashe_number_absint_control( 'blog_page', 'excerpt_length', esc_html__( 'Excerpt Length', 'ashe-pro' ), array( 'step' => '1' ), 'refresh', 17 );

	// Grid Excerpt Length
	ashe_number_absint_control( 'blog_page', 'grid_excerpt_length', esc_html__( 'Grid/List  Excerpt Length', 'ashe-pro' ), array( 'step' => '1' ), 'refresh', 19 );

	$post_content_align = array(
		'left' 	  => esc_html__( 'Left', 'ashe-pro' ),
		'right'	  => esc_html__( 'Right', 'ashe-pro' ),
		'center'  => esc_html__( 'Center', 'ashe-pro' )
	);

	// Align Content
	ashe_select_control( 'blog_page', 'post_content_align', esc_html__( 'Post Content Align', 'ashe-pro' ), $post_content_align, 'refresh', 21 );

	$post_pagination = array(
		'default' 	=> esc_html__( 'Default', 'ashe-pro' ),
		'numeric' 	=> esc_html__( 'Numeric', 'ashe-pro' ),
		'infinite' 	=> esc_html__( 'Infinite Scrolling', 'ashe-pro' ),
		'load-more' => esc_html__( 'Load More Button', 'ashe-pro' ),
	);

	// Post Pagination
	ashe_select_control( 'blog_page', 'post_pagination', esc_html__( 'Post Pagination', 'ashe-pro' ), $post_pagination, 'refresh', 23 );

	// Show Categories
	ashe_checkbox_control( 'blog_page', 'show_categories', esc_html__( 'Show Categories', 'ashe-pro' ), 'refresh', 25 );

	// Show Date
	ashe_checkbox_control( 'blog_page', 'show_date', esc_html__( 'Show Date', 'ashe-pro' ), 'refresh', 27 );

	// Show Comments
	ashe_checkbox_control( 'blog_page', 'show_comments', esc_html__( 'Show Comments', 'ashe-pro' ), 'refresh', 30 );

	// Show Drop Caps
	ashe_checkbox_control( 'blog_page', 'show_dropcups', esc_html__( 'Show Drop Caps', 'ashe-pro' ), 'refresh', 31 );

	// Show Read More
	ashe_text_control( 'blog_page', 'more_text', esc_html__( 'Read More Text', 'ashe-pro' ), 'postMessage', 33 );

	// Show Author
	ashe_checkbox_control( 'blog_page', 'show_author', esc_html__( 'Show Author', 'ashe-pro' ), 'refresh', 35 );

	// Show Facebook
	ashe_checkbox_control( 'blog_page', 'show_facebook', esc_html__( 'Show Facebook', 'ashe-pro' ), 'refresh', 37 );

	// Show Twitter
	ashe_checkbox_control( 'blog_page', 'show_twitter', esc_html__( 'Show Twitter', 'ashe-pro' ), 'refresh', 39 );

	// Show Pinterest
	ashe_checkbox_control( 'blog_page', 'show_pinterest', esc_html__( 'Show Pinterest', 'ashe-pro' ), 'refresh', 41 );

	// Show Google Plus
	ashe_checkbox_control( 'blog_page', 'show_google', esc_html__( 'Show Google Plus', 'ashe-pro' ), 'refresh', 43 );

	// Show Linkedin
	ashe_checkbox_control( 'blog_page', 'show_linkedin', esc_html__( 'Show Linkedin', 'ashe-pro' ), 'refresh', 45 );

	// Show reddit
	ashe_checkbox_control( 'blog_page', 'show_reddit', esc_html__( 'Show Reddit', 'ashe-pro' ), 'refresh', 47 );

	// Show Tumblr
	ashe_checkbox_control( 'blog_page', 'show_tumblr', esc_html__( 'Show Tumblr', 'ashe-pro' ), 'refresh', 49 );

	// Related Posts Title
	ashe_text_control( 'blog_page', 'related_title', esc_html__( 'Section Title', 'ashe-pro' ), 'postMessage', 51 );

	$related_posts = array(
		'none' 		=> esc_html__( 'None', 'ashe-pro' ),
		'related' 	=> esc_html__( 'Related', 'ashe-pro' ),
		'random' 	=> esc_html__( 'Random', 'ashe-pro' ),
	);

	// Related Posts Orderby
	ashe_select_control( 'blog_page', 'related_orderby', esc_html__( 'Display', 'ashe-pro' ), $related_posts, 'refresh', 53 );


/*
** Single Post =====
*/
	// add single post section
	$wp_customize->add_section( 'ashe_single_page' , array(
		'title'		 => esc_html__( 'Single Post', 'ashe-pro' ),
		'priority'	 => 31,
		'capability' => 'edit_theme_options'
	) );

	// Show Categories
	ashe_checkbox_control( 'single_page', 'show_categories', esc_html__( 'Show Categories', 'ashe-pro' ), 'refresh', 5 );

	// Show Date
	ashe_checkbox_control( 'single_page', 'show_date', esc_html__( 'Show Date', 'ashe-pro' ), 'refresh', 7 );

	// Show Comments
	ashe_checkbox_control( 'single_page', 'show_comments', esc_html__( 'Show Comments', 'ashe-pro' ), 'refresh', 9 );

	// Show Drop Caps
	ashe_checkbox_control( 'single_page', 'show_dropcups', esc_html__( 'Show Drop Caps', 'ashe-pro' ), 'refresh', 10 );
	
	// Show Tags
	ashe_checkbox_control( 'single_page', 'show_tags', esc_html__( 'Show Tags', 'ashe-pro' ), 'refresh', 11 );

	// Show Author
	ashe_checkbox_control( 'single_page', 'show_author', esc_html__( 'Show Author', 'ashe-pro' ), 'refresh', 13 );

	// Show Author Description
	ashe_checkbox_control( 'single_page', 'show_author_desc', esc_html__( 'Show Author Description', 'ashe-pro' ), 'refresh', 18 );

	// Show Author Description
	ashe_checkbox_control( 'single_page', 'show_author_nav', esc_html__( 'Show Navigation', 'ashe-pro' ), 'refresh', 19 );

	// Related Posts Title
	ashe_text_control( 'single_page', 'related_title', esc_html__( 'Related Posts - Section Title', 'ashe-pro' ), 'postMessage', 21 );

	// Related Posts Orderby
	ashe_select_control( 'single_page', 'related_orderby', esc_html__( 'Related Posts - Display', 'ashe-pro' ), $related_posts, 'refresh', 23 );

	// Show Comments Area
	ashe_checkbox_control( 'single_page', 'show_comments_area', esc_html__( 'Show Comments Area', 'ashe-pro' ), 'refresh', 25 );


/*
** Social Media =====
*/
	// add social media section
	$wp_customize->add_section( 'ashe_social_media' , array(
		'title'		 => esc_html__( 'Social Media', 'ashe-pro' ),
		'priority'	 => 33,
		'capability' => 'edit_theme_options'
	) );
	
	// Social Window
	ashe_checkbox_control( 'social_media', 'window', esc_html__( 'Show Social Icons in New Window', 'ashe-pro' ), 'refresh', 1 );

	// Social Icons Array
	$social_icons = array(
		'facebook-f' 			=> 'Facebook 1',
		'facebook'				=> 'Facebook 2',
		'twitter' 				=> 'Twitter 1',
		'twitter-square' 		=> 'Twitter 2',
		'google' 				=> 'Google',
		'google-plus-g'			=> 'Google Plus',
		'linkedin-in'			=> 'Linkedin 1',
		'linkedin' 				=> 'Linkedin 2',
		'pinterest' 			=> 'Pinterest 1',
		'pinterest-p' 			=> 'Pinterest 2',
		'pinterest-square'		=> 'Pinterest 3',
		'behance' 				=> 'Behance 1',
		'behance-square'		=> 'Behance 2',
		'tumblr' 				=> 'Tumblr 1',
		'tumblr-square' 		=> 'Tumblr 2',
		'reddit' 				=> 'Reddit 1',
		'reddit-alien' 			=> 'Reddit 2',
		'reddit-square' 		=> 'Reddit 3',
		'dribbble' 				=> 'Dribbble',
		'vk' 					=> 'vKontakte',
		'skype' 				=> 'Skype',
		'film' 					=> 'Film',
		'youtube' 				=> 'Youtube 1',
		'youtube-square' 		=> 'Youtube 2',
		'vimeo-v' 				=> 'Vimeo 1',
		'vimeo' 				=> 'Vimeo 2',
		'soundcloud' 			=> 'Soundcloud',
		'instagram' 			=> 'Instagram',
		'flickr' 				=> 'Flickr',
		'rss' 					=> 'RSS',
		'heart' 				=> 'Heart',
		'github' 				=> 'Github 1',
		'github-alt' 			=> 'Github 2',
		'github-square' 		=> 'Github 3',
		'stack-overflow' 		=> 'Stack Overflow',
		'qq' 					=> 'QQ',
		'weibo' 				=> 'Weibo',
		'weixin' 				=> 'Weixin',
		'xing' 					=> 'Xing 1',
		'xing-square' 			=> 'Xing 2',
		'gamepad' 				=> 'Gamepad',
		'medium' 				=> 'Medium',
		'envelope' 				=> 'Envelope',
		'etsy' 					=> 'Etsy',
		'snapchat' 				=> 'Snapchat 1',
		'snapchat-ghost' 		=> 'Snapchat 2',
		'snapchat-square'		=> 'Snapchat 3',
		'meetup' 				=> 'Meetup',
		'book' 					=> 'Book',
		'tablet-alt'			=> 'Tablet',
		'amazon' 				=> 'Amazon',
		'paypal' 				=> 'PayPal 1',
		'cc-paypal' 			=> 'PayPal 2',
		'credit-card' 			=> 'Credit Card',
		'cc-visa' 				=> 'Visa Card',
		'goodreads' 			=> 'Goodreads 1',
		'goodreads-g' 			=> 'Goodreads 2',
	);

	// Social #1 Icon
	ashe_select_control( 'social_media', 'icon_1', esc_html__( 'Select Icon', 'ashe-pro' ), $social_icons, 'refresh', 3 );

	// Social #1 Icon
	ashe_url_control( 'social_media', 'url_1', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 5 );

	// Social #2 Icon
	ashe_select_control( 'social_media', 'icon_2', esc_html__( 'Select Icon', 'ashe-pro' ), $social_icons, 'refresh', 7 );

	// Social #2 Icon
	ashe_url_control( 'social_media', 'url_2', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 9 );

	// Social #3 Icon
	ashe_select_control( 'social_media', 'icon_3', esc_html__( 'Select Icon', 'ashe-pro' ), $social_icons, 'refresh', 11 );

	// Social #3 Icon
	ashe_url_control( 'social_media', 'url_3', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 13 );

	// Social #4 Icon
	ashe_select_control( 'social_media', 'icon_4', esc_html__( 'Select Icon', 'ashe-pro' ), $social_icons, 'refresh', 15 );

	// Social #4 Icon
	ashe_url_control( 'social_media', 'url_4', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 17 );

	// Social #5 Icon
	ashe_select_control( 'social_media', 'icon_5', esc_html__( 'Select Icon', 'ashe-pro' ), $social_icons, 'refresh', 19 );

	// Social #5 Icon
	ashe_url_control( 'social_media', 'url_5', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 21 );

	// Social #6 Icon
	ashe_select_control( 'social_media', 'icon_6', esc_html__( 'Select Icon', 'ashe-pro' ), $social_icons, 'refresh', 23 );

	// Social #6 Icon
	ashe_url_control( 'social_media', 'url_6', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 25 );

	// Social #7 Icon
	ashe_select_control( 'social_media', 'icon_7', esc_html__( 'Select Icon', 'ashe-pro' ), $social_icons, 'refresh', 27 );

	// Social #7 Icon
	ashe_url_control( 'social_media', 'url_7', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 29 );

	// Social #8 Icon
	ashe_select_control( 'social_media', 'icon_8', esc_html__( 'Select Icon', 'ashe-pro' ), $social_icons, 'refresh', 31 );

	// Social #8 Icon
	ashe_url_control( 'social_media', 'url_8', esc_html__( 'URL', 'ashe-pro' ), 'refresh', 33 );


/*
** Page Footer =====
*/
	// add page footer section
	$wp_customize->add_section( 'ashe_page_footer' , array(
		'title'		 => esc_html__( 'Page Footer', 'ashe-pro' ),
		'priority'	 => 35,
		'capability' => 'edit_theme_options'
	) );


	$widget_columns = array(
		'none' 		=> esc_html__( 'None', 'ashe-pro' ),
		'three' 	=> esc_html__( 'Three', 'ashe-pro' ),
		'four' 		=> esc_html__( 'Four', 'ashe-pro' )
	);
	
	// Align Footer
	ashe_select_control( 'page_footer', 'columns', esc_html__( 'Widget Columns:', 'ashe-pro' ), $widget_columns, 'refresh', 1 );

	$copyright_align = array(
		'center' 		=> esc_html__( 'Center', 'ashe-pro' ),
		'left-right' 	=> esc_html__( 'Copyright & Socials', 'ashe-pro' ),
		'right-left' 	=> esc_html__( 'Socials & Copyright', 'ashe-pro' )
	);
	
	// Align Footer
	ashe_select_control( 'page_footer', 'align', esc_html__( 'Align', 'ashe-pro' ), $copyright_align, 'refresh', 2 );

	$copyright_description = 'Enter <strong>$year</strong> to update the year automatically and <strong>$copy</strong> for the copyright symbol.';

	// Copyright
	ashe_textarea_control( 'page_footer', 'copyright', esc_html__( 'Copyright', 'ashe-pro' ), $copyright_description, 'refresh', 3 );

	// Show Socials
	ashe_checkbox_control( 'page_footer', 'show_socials', esc_html__( 'Show Social Icons', 'ashe-pro' ), 'refresh', 5 );


/*
** Typography =====
*/
	// add Typography section
	$wp_customize->add_section( 'ashe_typography' , array(
		'title'		 => esc_html__( 'Typography', 'ashe-pro' ),
		'priority'	 => 40,
		'capability' => 'edit_theme_options'
	) );

	// Logo Font Family
	$wp_customize->add_setting( 'ashe_options[typography_logo_family]', array(
	    'default' 	=> 'Dancing+Script',
	    'type' 		=> 'option',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'ashe_sanitize_fonts'
	) );

	$wp_customize->add_control(
		new Ashe_Google_Fonts_Control( $wp_customize, 'ashe_options[typography_logo_family]', array(
			'label'    => esc_html__( 'Logo Font Family', 'ashe-pro' ),
			'section'  => 'ashe_typography',
			'priority' => 1
		)
	) );

	$font_size_args = array( 'step' => '1', 'min' => '10', 'max' => '250' );
	$letter_spacing_args = array( 'step' => '0.1', 'min' => '-10', 'max' => '50' );
	$font_weight_args = array( 'step' => '100', 'min' => '100', 'max' => '900' );

	// Font Size - Logo
	ashe_number_absint_control( 'typography', 'logo_size', esc_html__( 'Logo Font Size', 'ashe-pro' ), $font_size_args, 'postMessage', 3 );

	// Font Size - Tagline
	ashe_number_absint_control( 'typography', 'logo_tg_size', esc_html__( 'Tagline Font Size', 'ashe-pro' ), $font_size_args, 'postMessage', 4 );

	// Line Height
	ashe_number_absint_control( 'typography', 'logo_height', esc_html__( 'Line Height', 'ashe-pro' ), $font_size_args, 'postMessage', 5 );

	// Letter Spacing
	ashe_number_float_control( 'typography', 'logo_spacing', esc_html__( 'Letter Spacing', 'ashe-pro' ), $letter_spacing_args, 'postMessage', 7 );

	// Font Weight
	ashe_number_absint_control( 'typography', 'logo_weight', esc_html__( 'Font Weight', 'ashe-pro' ), $font_weight_args, 'postMessage', 9 );

	// Italic
	ashe_checkbox_control( 'typography', 'logo_italic', esc_html__( 'Italic', 'ashe-pro' ), 'postMessage', 11 );

	// Uppercase
	ashe_checkbox_control( 'typography', 'logo_uppercase', esc_html__( 'Uppercase', 'ashe-pro' ), 'postMessage', 13 );


	// Navigation Font Family
	$wp_customize->add_setting( 'ashe_options[typography_nav_family]', array(
	    'default' 	=> 'Open+Sans',
	    'type' 		=> 'option',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'ashe_sanitize_fonts'
	) );

	$wp_customize->add_control(
		new Ashe_Google_Fonts_Control( $wp_customize, 'ashe_options[typography_nav_family]', array(
			'label'    => esc_html__( 'Navigation Font Family', 'ashe-pro' ),
			'section'  => 'ashe_typography',
			'priority' => 21
		)
	) );

	$font_size_args = array( 'step' => '1', 'min' => '10', 'max' => '100' );
	$letter_spacing_args = array( 'step' => '0.1', 'min' => '-5', 'max' => '5' );
	$font_weight_args = array( 'step' => '100', 'min' => '100', 'max' => '900' );

	// Font Size
	ashe_number_absint_control( 'typography', 'nav_size', esc_html__( 'Font Size', 'ashe-pro' ), $font_size_args, 'postMessage', 22 );

	// Line Height
	ashe_number_absint_control( 'typography', 'nav_height', esc_html__( 'Line Height', 'ashe-pro' ), $font_size_args, 'postMessage', 23 );

	// Letter Spacing
	ashe_number_float_control( 'typography', 'nav_spacing', esc_html__( 'Letter Spacing', 'ashe-pro' ), $letter_spacing_args, 'postMessage', 24 );

	// Font Weight
	ashe_number_absint_control( 'typography', 'nav_weight', esc_html__( 'Font Weight', 'ashe-pro' ), $font_weight_args, 'postMessage', 25 );

	// Italic
	ashe_checkbox_control( 'typography', 'nav_italic', esc_html__( 'Italic', 'ashe-pro' ), 'postMessage', 26 );

	// Uppercase
	ashe_checkbox_control( 'typography', 'nav_uppercase', esc_html__( 'Uppercase', 'ashe-pro' ), 'postMessage', 27 );

	// Heading Font Family
	$wp_customize->add_setting( 'ashe_options[typography_head_family]', array(
	    'default' 	=> 'Playfair+Display',
	    'type' 		=> 'option',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'ashe_sanitize_fonts'
	) );

	$wp_customize->add_control(
		new Ashe_Google_Fonts_Control( $wp_customize, 'ashe_options[typography_head_family]', array(
			'label'    => esc_html__( 'Heading Font Family', 'ashe-pro' ),
			'section'  => 'ashe_typography',
			'priority' => 31
		)
	) );

	// Font Size
	ashe_number_absint_control( 'typography', 'head_size', esc_html__( 'Font Size', 'ashe-pro' ), $font_size_args, 'postMessage', 32 );

	// Line Height
	ashe_number_absint_control( 'typography', 'head_height', esc_html__( 'Line Height', 'ashe-pro' ), $font_size_args, 'postMessage', 33 );

	// Letter Spacing
	ashe_number_float_control( 'typography', 'head_spacing', esc_html__( 'Letter Spacing', 'ashe-pro' ), $letter_spacing_args, 'postMessage', 34 );

	// Font Weight
	ashe_number_absint_control( 'typography', 'head_weight', esc_html__( 'Font Weight', 'ashe-pro' ), $font_weight_args, 'postMessage', 35 );

	// Italic
	ashe_checkbox_control( 'typography', 'head_italic', esc_html__( 'Italic', 'ashe-pro' ), 'postMessage', 36 );

	// Uppercase
	ashe_checkbox_control( 'typography', 'head_uppercase', esc_html__( 'Uppercase', 'ashe-pro' ), 'postMessage', 37 );

	// Body Font Family
	$wp_customize->add_setting( 'ashe_options[typography_body_family]', array(
	    'default' 	=> 'Open+Sans',
	    'type' 		=> 'option',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'ashe_sanitize_fonts'
	) );

	$wp_customize->add_control(
		new Ashe_Google_Fonts_Control( $wp_customize, 'ashe_options[typography_body_family]', array(
			'label'    => esc_html__( 'Body Font Family', 'ashe-pro' ),
			'section'  => 'ashe_typography',
			'priority' => 41
		)
	) );

	// Font Size
	ashe_number_absint_control( 'typography', 'body_size', esc_html__( 'Font Size', 'ashe-pro' ), $font_size_args, 'postMessage', 43 );

	// Line Height
	ashe_number_absint_control( 'typography', 'body_height', esc_html__( 'Line Height', 'ashe-pro' ), $font_size_args, 'postMessage', 45 );

	// Letter Spacing
	ashe_number_float_control( 'typography', 'body_spacing', esc_html__( 'Letter Spacing', 'ashe-pro' ), $letter_spacing_args, 'postMessage', 47 );

	// Font Weight
	ashe_number_absint_control( 'typography', 'body_weight', esc_html__( 'Font Weight', 'ashe-pro' ), $font_weight_args, 'postMessage', 49 );

	// Italic
	ashe_checkbox_control( 'typography', 'body_italic', esc_html__( 'Italic', 'ashe-pro' ), 'postMessage', 51 );

	// Uppercase
	ashe_checkbox_control( 'typography', 'body_uppercase', esc_html__( 'Uppercase', 'ashe-pro' ), 'postMessage', 53 );

	// Latin Subset
	ashe_checkbox_control( 'typography', 'latin_subset', esc_html__( 'Latin', 'ashe-pro' ), 'postMessage', 55 );

	// Cyrillic Subset
	ashe_checkbox_control( 'typography', 'cyrillic_subset', esc_html__( 'Cyrillic', 'ashe-pro' ), 'postMessage', 57 );

	// Greek Subset
	ashe_checkbox_control( 'typography', 'greek_subset', esc_html__( 'Greek', 'ashe-pro' ), 'postMessage', 59 );

	// Vietnamese Subset
	ashe_checkbox_control( 'typography', 'vietnamese_subset', esc_html__( 'Vietnamese', 'ashe-pro' ), 'postMessage', 61 );


/*
** Preloader =====
*/
	// add Preloader section
	$wp_customize->add_section( 'ashe_preloader' , array(
		'title'		 => esc_html__( 'Preloader', 'ashe-pro' ),
		'priority'	 => 45,
		'capability' => 'edit_theme_options'
	) );

	// Preloading Animation
	ashe_checkbox_control( 'preloader', 'label', esc_html__( 'Preloading Animation', 'ashe-pro' ), 'refresh', 1 );

	$preloader_type = array(
		'none' 			=> esc_html__( 'None', 'ashe-pro' ),
		'logo' 			=> esc_html__( 'Site Logo', 'ashe-pro' ),
		'animation_1' 	=> esc_html__( 'Animation 1', 'ashe-pro' ),
		'animation_2' 	=> esc_html__( 'Animation 2', 'ashe-pro' ),
		'animation_3' 	=> esc_html__( 'Animation 3', 'ashe-pro' ),
		'animation_4' 	=> esc_html__( 'Animation 4', 'ashe-pro' ),
		'animation_5' 	=> esc_html__( 'Animation 5', 'ashe-pro' ),
		'animation_6' 	=> esc_html__( 'Animation 6', 'ashe-pro' ),
		'animation_7' 	=> esc_html__( 'Animation 7', 'ashe-pro' ),
		'animation_8' 	=> esc_html__( 'Animation 8', 'ashe-pro' ),
		'animation_9' 	=> esc_html__( 'Animation 9', 'ashe-pro' ),
	);
	
	// Preloader Type
	ashe_select_control( 'preloader', 'type', esc_html__( 'Preloader Type', 'ashe-pro' ), $preloader_type, 'refresh', 3 );



/*
** Freemius =====
*/
	$wp_customize->remove_section('freemius_upsell');
	

}
add_action( 'customize_register', 'ashe_customize_register' );



/*
** Bind JS handlers to instantly live-preview changes
*/
function ashe_customize_preview_js() {
	wp_enqueue_script( 'ashe-customize-preview', get_theme_file_uri( '/inc/customizer/js/customize-preview.js' ), array( 'customize-preview' ), '3.1', true );
}
add_action( 'customize_preview_init', 'ashe_customize_preview_js' );

/*
** Load dynamic logic for the customizer controls area.
*/
function ashe_panels_js() {
	wp_enqueue_style( 'customizer-ui-css', get_theme_file_uri( '/inc/customizer/css/customizer-ui.css' ), array(), '3.1' );
	wp_enqueue_script( 'ashe-customize-controls', get_theme_file_uri( '/inc/customizer/js/customize-controls.js' ), array(), '3.1', true );

}
add_action( 'customize_controls_enqueue_scripts', 'ashe_panels_js' );
