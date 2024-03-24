<?php // One-Click Importer

function royal_import() {

    global $wpdb;

    if ( !defined('WP_LOAD_IMPORTERS') ) {
        define('WP_LOAD_IMPORTERS', true);
    }

    // Load Importer API
    require_once ABSPATH . 'wp-admin/includes/import.php';

    if ( ! class_exists( 'WP_Importer' ) ) {
        $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
        if ( file_exists( $class_wp_importer ) ) {
            require $class_wp_importer;
        }
    }

    if ( ! class_exists( 'WP_Import' ) ) {
        $class_wp_importer = get_parent_theme_file_path('inc/options/import/wordpress-importer.php');
        if ( file_exists( $class_wp_importer ) ) {
            require $class_wp_importer;
        }
    }

    if ( class_exists( 'WP_Import' ) ) {

        // Set Featured Links
        $featured_links = array(
            'featured_links_label' => true,
            'featured_links_sec_title' => '',
            'featured_links_window' => true,
            'featured_links_fill' => true,
            'featured_links_gutter_horz' => true,
            'featured_links_title_1' => 'Features',
            'featured_links_url_1' => 'http://wp-royal.com/themes/item-ashe-free/',
            'featured_links_image_1' => '43',
            'featured_links_title_2' => 'Test-Drive',
            'featured_links_url_2' => 'http://wp-royal.com/themes/ashe-pro/wp-content/plugins/open-house-theme-options/redirect.php?multisite=demo',
            'featured_links_image_2' => '37',
            'featured_links_title_3' => 'Try Pro Version',
            'featured_links_url_3' => 'http://wp-royal.com/ashe-trial/?ref=demo-ashe-pro-featured-links-try-pro',
            'featured_links_image_3' => '40',
            'featured_links_title_4' => '',
            'featured_links_url_4' => '',
            'featured_links_image_4' => '',
            'featured_links_title_5' => '',
            'featured_links_url_5' => '',
            'featured_links_image_5' => '',
        );
        update_option( 'ashe_options', $featured_links );

        // Import Demo Content
        $import_filepath = get_parent_theme_file_path('inc/options/import/data');
        $wp_import = new WP_Import();
        $wp_import->fetch_attachments = true;

        set_time_limit(0);
        ob_start();

            // Demo Content
            $wp_import->import( $import_filepath .'/demo_content.xml' );

            // Import Widgets
            $widget_file_path = $import_filepath .'/demo_widgets.wie';

        ob_end_clean();

        // Set Navigation Menu
        $menu_locations = get_theme_mod( 'nav_menu_locations' );
        $nav_menus      = wp_get_nav_menus();

        if ( $nav_menus ) {
            foreach ( $nav_menus as $nav_menu ) {
                if ( $nav_menu->name == 'Main Menu' ) {
                    $menu_locations['main'] = $nav_menu->term_id;
                }
                if ( $nav_menu->name == 'Top Menu' ) {
                    $menu_locations['top'] = $nav_menu->term_id;
                }
            }
        }

        set_theme_mod('nav_menu_locations', $menu_locations);

        // Import Widgets
        royal_widgets_import( $widget_file_path );

    } else {
        // error message
        echo 'Error Loading Files!';
    }
    
    die();

}

add_action( 'wp_ajax_royal_import', 'royal_import' );


// Widget Import Function
function royal_widgets_import( $file_path ) {

    if ( ! file_exists($file_path) ) {
        return;
    }

    // get import file and convert to array
    $widgets_wie  = file_get_contents( $file_path );
    $widgets_json = json_decode($widgets_wie, true);

    // get active widgets
    $active_widgets = get_option('sidebars_widgets');
    $active_widgets['sidebar-left'] = array();
    $active_widgets['sidebar-right'] = array();
    $active_widgets['sidebar-alt'] = array();
    $active_widgets['footer-widgets'] = array();
    $active_widgets['instagram-widget'] = array();

    // Sidebar Left
    $counter = 0;
    if ( isset($widgets_json['sidebar-left']) ) {
        foreach( $widgets_json['sidebar-left'] as $widget_id => $widget_data ) {

            // separate widget id/number
            $instance_id     = preg_replace( '/-[0-9]+$/', '', $widget_id );
            $instance_number = str_replace( $instance_id .'-', '', $widget_id );

            if ( ! get_option('widget_'. $instance_id) ) {

                // if is a single widget
                $update_arr = array(
                    $instance_number => $widget_data,
                    '_multiwidget' => 1
                );

            } else {

                // if there are multiple widgets
                $update_arr = get_option('widget_'. $instance_id);
                $update_arr[$instance_number] = $widget_data;

            }

            // update widget data
            update_option( 'widget_' . $instance_id, $update_arr );
            $active_widgets['sidebar-left'][$counter] = $widget_id;
            $counter++;

        }
    }

    // Sidebar Right
    $counter = 0;
    if ( isset($widgets_json['sidebar-right']) ) {
        foreach( $widgets_json['sidebar-right'] as $widget_id => $widget_data ) {

            // separate widget id/number
            $instance_id     = preg_replace( '/-[0-9]+$/', '', $widget_id );
            $instance_number = str_replace( $instance_id .'-', '', $widget_id );

            if ( ! get_option('widget_'. $instance_id) ) {

                // if is a single widget
                $update_arr = array(
                    $instance_number => $widget_data,
                    '_multiwidget' => 1
                );

            } else {

                // if there are multiple widgets
                $update_arr = get_option('widget_'. $instance_id);
                $update_arr[$instance_number] = $widget_data;

            }

            // update widget data
            update_option( 'widget_' . $instance_id, $update_arr );
            $active_widgets['sidebar-right'][$counter] = $widget_id;
            $counter++;

        }
    }

    // Sidebar Alt
    $counter = 0;
    if ( isset($widgets_json['sidebar-alt']) ) {
        foreach( $widgets_json['sidebar-alt'] as $widget_id => $widget_data ) {

            // separate widget id/number
            $instance_id     = preg_replace( '/-[0-9]+$/', '', $widget_id );
            $instance_number = str_replace( $instance_id .'-', '', $widget_id );

            if ( ! get_option('widget_'. $instance_id) ) {

                // if is a single widget
                $update_arr = array(
                    $instance_number => $widget_data,
                    '_multiwidget' => 1
                );

            } else {

                // if there are multiple widgets
                $update_arr = get_option('widget_'. $instance_id);
                $update_arr[$instance_number] = $widget_data;

            }

            // update widget data
            update_option( 'widget_' . $instance_id, $update_arr );
            $active_widgets['sidebar-alt'][$counter] = $widget_id;
            $counter++;

        }
    }

    // Footer Widgets
    $counter = 0;
    if ( isset($widgets_json['footer-widgets']) ) {
        foreach( $widgets_json['footer-widgets'] as $widget_id => $widget_data ) {

            // separate widget id/number
            $instance_id     = preg_replace( '/-[0-9]+$/', '', $widget_id );
            $instance_number = str_replace( $instance_id .'-', '', $widget_id );

            if ( ! get_option('widget_'. $instance_id) ) {

                // if is a single widget
                $update_arr = array(
                    $instance_number => $widget_data,
                    '_multiwidget' => 1
                );

            } else {

                // if there are multiple widgets
                $update_arr = get_option('widget_'. $instance_id);
                $update_arr[$instance_number] = $widget_data;

            }

            // update widget data
            update_option( 'widget_' . $instance_id, $update_arr );
            $active_widgets['footer-widgets'][$counter] = $widget_id;
            $counter++;

        }
    }

    // Instagram Widget
    $counter = 0;
    if ( isset($widgets_json['instagram-widget']) ) {
        foreach( $widgets_json['instagram-widget'] as $widget_id => $widget_data ) {

            // separate widget id/number
            $instance_id     = preg_replace( '/-[0-9]+$/', '', $widget_id );
            $instance_number = str_replace( $instance_id .'-', '', $widget_id );

            if ( ! get_option('widget_'. $instance_id) ) {

                // if is a single widget
                $update_arr = array(
                    $instance_number => $widget_data,
                    '_multiwidget' => 1
                );

            } else {

                // if there are multiple widgets
                $update_arr = get_option('widget_'. $instance_id);
                $update_arr[$instance_number] = $widget_data;

            }

            // update widget data
            update_option( 'widget_' . $instance_id, $update_arr );
            $active_widgets['instagram-widget'][$counter] = $widget_id;
            $counter++;

        }
    }

    
    update_option( 'sidebars_widgets', $active_widgets );

}