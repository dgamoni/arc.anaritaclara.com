<?php

/**
 * Social Widget
 */
add_action( 'widgets_init', 'ashe_social_widget_load' );
function ashe_social_widget_load() {
    register_widget( 'ashe_social_widget' );
}

class ashe_social_widget extends WP_Widget {

    /**
     * Widget constructor.
     */
    public function __construct() {
        parent::__construct(
            'ashe_social_widget',
            esc_html__( 'Ashe: Social Icons', 'ashe-pro' ),
            array(
                'classname'   => 'ashe_social_widget',
                'description' => esc_html__( 'A widget that displays your social icons', 'ashe-pro' )
            ),
            array( 
                'width' => 300,
                'id_base' => 'ashe_social_widget'
            )
        );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
    }

    /**
     * Enqueue scripts.
     */
    public function enqueue_scripts( $hook ) {
        if ( 'widgets.php' !== $hook ) {
            return;
        }

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'underscore' );
    }

    /**
     * Print scripts.
     */
    public function print_scripts() {
        ?>
        <script>
            ( function( $ ){
                function initColorPicker( widget ) {
                    widget.find( '.color-picker' ).wpColorPicker( {
                        change: _.throttle( function() { // For Customizer
                            $(this).trigger( 'change' );
                        }, 3000 )
                    });
                }

                function onFormUpdate( event, widget ) {
                    initColorPicker( widget );
                }

                $( document ).on( 'widget-added widget-updated', onFormUpdate );

                $( document ).ready( function() {
                    $( '#widgets-right .widget:has(.color-picker)' ).each( function () {
                        initColorPicker( $( this ) );
                    } );
                } );
            }( jQuery ) );
        </script>
        <?php
    }

    /**
     * Widget output.
     */
    public function widget( $args, $instance ) {
        extract( $args );

        // Title
        $title = esc_attr( $instance['title'] );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        // Colors & Url
        $color          = esc_attr( $instance['color'] );
        $color_hv       = esc_attr( $instance['color_hv']  );
        $facebook       = esc_attr( $instance['facebook'] );
        $twitter        = esc_attr( $instance['twitter'] );
        $instagram      = esc_attr( $instance['instagram'] );
        $pinterest      = esc_attr( $instance['pinterest'] );
        $bloglovin      = esc_attr( $instance['bloglovin'] );
        $google_plus    = esc_attr( $instance['google_plus'] );
        $tumblr         = esc_attr( $instance['tumblr'] );
        $youtube        = esc_attr( $instance['youtube'] );
        $vine           = esc_attr( $instance['vine'] );
        $flickr         = esc_attr( $instance['flickr'] );
        $linkedin       = esc_attr( $instance['linkedin'] );
        $behance        = esc_attr( $instance['behance'] );
        $soundcloud     = esc_attr( $instance['soundcloud'] );
        $vimeo          = esc_attr( $instance['vimeo'] );
        $rss            = esc_attr( $instance['rss'] );
        $dribbble       = esc_attr( $instance['dribbble'] );
        $envelope       = esc_attr( $instance['envelope'] );
        $widget_id      = $args['widget_id'];

        echo $before_widget;
        if ( $title )
            echo $before_title . esc_attr( $title ) . $after_title;
       ?>
        <div class="social-icons">
          <?php if(!empty($facebook)): ?>
            <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($twitter)): ?>
            <a href="<?php echo esc_url($twitter); ?>" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($instagram)): ?>
            <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($pinterest)): ?>
            <a href="<?php echo esc_url($pinterest); ?>" target="_blank">
                <i class="fab fa-pinterest"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($bloglovin)): ?>
            <a href="<?php echo esc_url($bloglovin); ?>" target="_blank">
                <i class="fas fa-heart"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($google_plus)): ?>
            <a href="<?php echo esc_url($google_plus); ?>" target="_blank">
                <i class="fab fa-google-plus-g"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($tumblr)): ?>
            <a href="<?php echo esc_url($tumblr); ?>" target="_blank">
                <i class="fab fa-tumblr"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($youtube)): ?>
            <a href="<?php echo esc_url($youtube); ?>" target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($vine)): ?>
            <a href="<?php echo esc_url($vine); ?>" target="_blank">
                <i class="fab fa-vine"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($flickr)): ?>
            <a href="<?php echo esc_url($flickr); ?>" target="_blank">
                <i class="fab fa-flickr"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($linkedin)): ?>
            <a href="<?php echo esc_url($linkedin); ?>" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($behance)): ?>
            <a href="<?php echo esc_url($behance); ?>" target="_blank">
                <i class="fab fa-behance"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($soundcloud)): ?>
            <a href="<?php echo esc_url($soundcloud); ?>" target="_blank">
                <i class="fab fa-soundcloud"></i></a>
          <?php endif; ?>

          <?php if(!empty($vimeo)): ?>
            <a href="<?php echo esc_url($vimeo); ?>" target="_blank">
                <i class="fab fa-vimeo-v"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($rss)): ?>
            <a href="<?php echo esc_url($rss); ?>" target="_blank">
                <i class="fas fa-rss"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($dribbble)): ?>
            <a href="<?php echo esc_url($dribbble); ?>" target="_blank">
                <i class="fab fa-dribbble"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($envelope)): ?>
            <a href="<?php echo esc_url($envelope); ?>" target="_blank">
                <i class="fas fa-envelope"></i>
            </a>
          <?php endif; ?>

        </div>
        <style>
           <?php
            echo  '#'.$widget_id.' .social-icons a {
                    color: '. esc_attr($color) .';
                }
    
                #'.$widget_id.' .social-icons a:hover {
                    color: '. esc_attr($color_hv) .';
                }';
           ?>
        </style>
        <?php
        echo $after_widget;
    }

    /**
     * Saves widget settings.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance[ 'title' ]            = esc_attr( $new_instance['title'] );
        $instance[ 'color' ]            = esc_attr( ashe_sanitize_hex_color( $new_instance['color'] ) );
        $instance[ 'color_hv' ]         = esc_attr( ashe_sanitize_hex_color( $new_instance['color_hv'] ) );
        $instance['facebook']           = esc_attr( $new_instance['facebook'] );
        $instance['twitter']            = esc_attr( $new_instance['twitter'] );
        $instance['instagram']          = esc_attr( $new_instance['instagram'] );
        $instance['pinterest']          = esc_attr( $new_instance['pinterest'] );
        $instance['bloglovin']          = esc_attr( $new_instance['bloglovin'] );
        $instance['google_plus']        = esc_attr( $new_instance['google_plus'] );
        $instance['tumblr']             = esc_attr( $new_instance['tumblr'] );
        $instance['youtube']            = esc_attr( $new_instance['youtube'] );
        $instance['vine']               = esc_attr( $new_instance['vine'] );
        $instance['flickr']             = esc_attr( $new_instance['flickr'] );
        $instance['linkedin']           = esc_attr( $new_instance['linkedin'] );
        $instance['behance']            = esc_attr( $new_instance['behance'] );
        $instance['soundcloud']         = esc_attr( $new_instance['soundcloud'] );
        $instance['vimeo']              = esc_attr( $new_instance['vimeo'] );
        $instance['rss']                = esc_attr( $new_instance['rss'] );
        $instance['dribbble']           = esc_attr( $new_instance['dribbble'] );
        $instance['envelope']           = esc_attr( $new_instance['envelope'] );
 
        return $instance;
    }

    /**
     * Prints the settings form.
     */
    public function form( $instance ) {
        // Defaults
        $instance = wp_parse_args(
            $instance,
            array(
                'title'         => esc_html__( 'Follow Us', 'ashe-pro' ),
                'color'         => '#111111',
                'color_hv'      => '#ca9b52',
                'facebook'      => '#',
                'twitter'       => '#',
                'instagram'     => '#',
                'pinterest'     => '',
                'bloglovin'     => '',
                'google_plus'   => '',
                'tumblr'        => '',
                'youtube'       => '',
                'vine'          => '#',
                'flickr'        => '',
                'linkedin'      => '#',
                'behance'       => '',
                'soundcloud'    => '',
                'vimeo'         => '',
                'rss'           => '',
                'dribbble'      => '',
                'envelope'      => '#',
            )
        );

        $title          = esc_attr ( $instance[ 'title' ] );
        $color          = esc_attr ( $instance[ 'color' ] );
        $color_hv       = esc_attr ( $instance[ 'color_hv' ] );
        $facebook       = esc_attr ( $instance['facebook'] );
        $twitter        = esc_attr ( $instance['twitter'] );
        $instagram      = esc_attr ( $instance['instagram'] );
        $pinterest      = esc_attr ( $instance['pinterest'] );
        $bloglovin      = esc_attr ( $instance['bloglovin'] );
        $google_plus    = esc_attr ( $instance['google_plus'] );
        $tumblr         = esc_attr ( $instance['tumblr'] );
        $youtube        = esc_attr ( $instance['youtube'] );
        $vine           = esc_attr ( $instance['vine'] );
        $flickr         = esc_attr ( $instance['flickr'] );
        $linkedin       = esc_attr ( $instance['linkedin'] );
        $behance        = esc_attr ( $instance['behance'] );
        $soundcloud     = esc_attr ( $instance['soundcloud'] );
        $vimeo          = esc_attr ( $instance['vimeo'] );
        $rss            = esc_attr ( $instance['rss'] );
        $dribbble       = esc_attr ( $instance['dribbble'] );
        $envelope       = esc_attr ( $instance['envelope'] );
        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>"><?php esc_html_e( 'Text:', 'ashe-pro' ); ?></label><br>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'color' ) ); ?>" class="color-picker" id="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>" value="<?php echo esc_attr( $color ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'color_hv' ) ); ?>"><?php esc_html_e( 'Text Hover:', 'ashe-pro' ); ?></label><br>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'color_hv' ) ); ?>" class="color-picker" id="<?php echo esc_attr( $this->get_field_id( 'color_hv' ) ); ?>" value="<?php echo esc_attr( $color_hv ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebook') ); ?>"><?php esc_html_e( 'Facebook:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook') ); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e( 'Twitter:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e( 'Instagram:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e( 'Pinterest:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bloglovin')); ?>"><?php esc_html_e( 'Bloglovin:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('bloglovin')); ?>" name="<?php echo esc_attr($this->get_field_name('bloglovin')); ?>" type="text" value="<?php echo esc_attr($bloglovin); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('google_plus')); ?>"><?php esc_html_e( 'Google Plus:', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('google_plus')); ?>" name="<?php echo esc_attr($this->get_field_name('google_plus')); ?>" type="text" value="<?php echo esc_attr($google_plus); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e( 'Tumblr:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e( 'Youtube:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vine')); ?>"><?php esc_html_e( 'Vine:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vine')); ?>" name="<?php echo esc_attr($this->get_field_name('vine')); ?>" type="text" value="<?php echo esc_attr($vine); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>"><?php esc_html_e( 'Flickr:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e( 'Linkedin:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('behance')); ?>"><?php esc_html_e( 'Behance:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('behance')); ?>" name="<?php echo esc_attr($this->get_field_name('behance')); ?>" type="text" value="<?php echo esc_attr($behance); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>"><?php esc_html_e( 'Soundcloud:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>" name="<?php echo esc_attr($this->get_field_name('soundcloud')); ?>" type="text" value="<?php echo esc_attr($soundcloud); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php esc_html_e( 'Vimeo:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>"><?php esc_html_e( 'Rss:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_attr($rss); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('dribbble')); ?>"><?php esc_html_e( 'Dribbble:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('envelope')); ?>"><?php esc_html_e( 'Envelope:', 'ashe-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('envelope')); ?>" name="<?php echo esc_attr($this->get_field_name('envelope')); ?>" type="text" value="<?php echo esc_attr($envelope); ?>" />
        </p>

        <?php
    }
}


/**
 * Sanitize Hex Values
 */
function ashe_sanitize_hex_color( $color ) {
    if ( '' === $color )
        return '';

    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
        return $color;

    return null;
}

