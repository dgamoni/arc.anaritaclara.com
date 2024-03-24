<?php

/**
 * Promo Boxes Widget
 */

add_action( 'widgets_init', 'ashe_promo_box_widget_load' );
function ashe_promo_box_widget_load() {
    register_widget( 'ashe_promo_box_widget' );
}

class ashe_promo_box_widget extends WP_Widget {
 	
 	/**
     * Widget constructor.
     */
    public function __construct() {
        parent::__construct(
            'ashe_promo_box_widget',
            esc_html__( 'Ashe: Promo Boxes', 'ashe-pro' ),
            array(
                'classname'   => 'ashe_promo_box_widget',
                'description' => esc_html__( 'Displays Promo Boxes Widget', 'ashe-pro' )
            ),
            array( 
                'width' => 300,
                'id_base' => 'ashe_promo_box_widget'
            )
        );
    }

   /**
     * Widget output.
     */
    public function widget( $args, $instance ) {
        extract( $args );

        $title 		     = esc_attr( $instance['title'] );
        $title 		     = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $title_1         = esc_attr( $instance['title_1'] );
		$url_1	         = esc_attr( $instance['url_1'] );
	    $image_1	     = esc_attr( $instance['image_1'] );
        $title_2         = esc_attr( $instance['title_2'] );
        $url_2           = esc_attr( $instance['url_2'] );
        $image_2         = esc_attr( $instance['image_2'] );
        $title_3         = esc_attr( $instance['title_3'] );
        $url_3           = esc_attr( $instance['url_3'] );
        $image_3         = esc_attr( $instance['image_3'] );
        $window          = esc_attr( $instance['window'] );
        $links_window    = ( $window == 'true' )?'_blank':'_self';

        echo $before_widget;
        if ( $title )
        echo $before_title . esc_attr( $title ) . $after_title; ?>
        
        <?php if ( $url_1 !== '' ) : ?>
        <div class="promo-box">
            <img src="<?php echo esc_url( $url_1 ); ?>" alt="" />
            <?php if ( $image_1 !== '' ) : ?>
            <a href="<?php echo esc_url( $image_1 ); ?>" target="<?php echo esc_attr($links_window); ?>"></a>
            <?php endif; ?>
            <div class="cv-container">
            <div class="cv-outer">
                <div class="cv-inner">
                    <?php echo '<h6>' . esc_attr( $title_1 ) . '</h6>'; ?> 
                </div>
            </div>
            </div> 
        </div>
        <?php endif; ?>

        <?php if ( $url_2 !== '' ) : ?>
        <div class="promo-box">
            <img src="<?php echo esc_url( $url_2 ); ?>" alt="" />
            <?php if ( $image_2 !== '' ) : ?>
            <a href="<?php echo esc_url( $image_2 ); ?>" target="<?php echo esc_attr($links_window); ?>"></a>
            <?php endif; ?>
            <div class="cv-container">
            <div class="cv-outer">
                <div class="cv-inner">
                    <?php echo '<h6>' . esc_attr( $title_2 ) . '</h6>'; ?> 
                </div>
            </div>
            </div> 
        </div>
        <?php endif; ?>

        <?php if ( $url_3 !== '' ) : ?>
        <div class="promo-box">
            <img src="<?php echo esc_url( $url_3 ); ?>" alt="" />
            <?php if ( $image_3 !== '' ) : ?>
            <a href="<?php echo esc_url( $image_3 ); ?>" target="<?php echo esc_attr($links_window); ?>"></a>
            <?php endif; ?>
            <div class="cv-container">
            <div class="cv-outer">
                <div class="cv-inner">
                    <?php echo '<h6>' . esc_attr( $title_3 ) . '</h6>'; ?> 
                </div>
            </div>
            </div> 
        </div>
        <?php endif; ?>
        <?php
        echo $after_widget; 
    }

    /**
     * Saves widget settings.
     */
    public function update( $new_instance, $old_instance ) {
       
        $instance = $old_instance;
        $instance['title']		   = esc_attr( $new_instance['title'] );
        $instance['title_1']       = esc_attr( $new_instance['title_1'] );
        $instance['url_1']	       = esc_attr( $new_instance['url_1'] );
        $instance['image_1']	   = esc_attr( $new_instance['image_1'] );
        $instance['title_2']       = esc_attr( $new_instance['title_2'] );
        $instance['url_2']         = esc_attr( $new_instance['url_2'] );
        $instance['image_2']       = esc_attr( $new_instance['image_2'] );
        $instance['title_3']       = esc_attr( $new_instance['title_3'] );
        $instance['url_3']         = esc_attr( $new_instance['url_3'] );
        $instance['image_3']       = esc_attr( $new_instance['image_3'] );
        $instance['window']        = esc_attr( $new_instance['window'] );
 
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
            'title'        => '',
            'title_1'      => '',
            'url_1'	       => '',
            'image_1'	   => '',
            'title_2'      => '',
            'url_2'        => '',
            'image_2'      => '',
            'title_3'      => '',
            'url_3'        => '',
            'image_3'      => '',
            'window'       => 'true',
        )
    );

    $title       = esc_attr( $instance['title'] );
    $title_1     = esc_attr( $instance['title_1'] );
    $url_1       = esc_attr( $instance['url_1'] );
    $image_1     = esc_attr( $instance['image_1'] );
    $title_2     = esc_attr( $instance['title_2'] );
    $url_2       = esc_attr( $instance['url_2'] );
    $image_2     = esc_attr( $instance['image_2'] ); 
    $title_3     = esc_attr( $instance['title_3'] );
    $url_3       = esc_attr( $instance['url_3'] );
    $image_3     = esc_attr( $instance['image_3'] );
    $window      = esc_attr( $instance['window'] );
    $window_checked = '';
    if( $window ==='true' ) $window_checked = 'checked'; ?>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title_1')); ?>"><?php esc_html_e( 'Box 1 Title', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title_1')); ?>" name="<?php echo esc_attr($this->get_field_name('title_1')); ?>" type="text" value="<?php echo esc_attr($title_1); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image_1')); ?>"><?php esc_html_e( 'Boxed 1 Link', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_1')); ?>" name="<?php echo esc_attr($this->get_field_name('image_1')); ?>" type="text" value="<?php echo esc_attr($image_1); ?>" />
    </p>

	<p>
        <label for="<?php echo esc_attr($this->get_field_id('url_1')); ?>"><?php esc_html_e( 'Boxed 1 Image URL', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url_1')); ?>" name="<?php echo esc_attr($this->get_field_name('url_1')); ?>" type="text" value="<?php echo esc_attr($url_1); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title_2')); ?>"><?php esc_html_e( 'Box 2 Title', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title_2')); ?>" name="<?php echo esc_attr($this->get_field_name('title_2')); ?>" type="text" value="<?php echo esc_attr($title_2); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image_2')); ?>"><?php esc_html_e( 'Boxed 2 Link', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_2')); ?>" name="<?php echo esc_attr($this->get_field_name('image_2')); ?>" type="text" value="<?php echo esc_attr($image_2); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('url_2')); ?>"><?php esc_html_e( 'Boxed 2 Image URL', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url_2')); ?>" name="<?php echo esc_attr($this->get_field_name('url_2')); ?>" type="text" value="<?php echo esc_attr($url_2); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title_3')); ?>"><?php esc_html_e( 'Box 3 Title', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title_3')); ?>" name="<?php echo esc_attr($this->get_field_name('title_3')); ?>" type="text" value="<?php echo esc_attr($title_3); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image_3')); ?>"><?php esc_html_e( 'Boxed 3 Link', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_3')); ?>" name="<?php echo esc_attr($this->get_field_name('image_3')); ?>" type="text" value="<?php echo esc_attr($image_3); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('url_3')); ?>"><?php esc_html_e( 'Boxed 3 Image URL', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url_3')); ?>" name="<?php echo esc_attr($this->get_field_name('url_3')); ?>" type="text" value="<?php echo esc_attr($url_3); ?>" />
    </p>

    <p>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'window' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('window') ); ?>" type="checkbox" value="true" <?php echo $window_checked; ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'window' ) ); ?>"><?php esc_html_e( 'Open Image Link in New Window', 'ashe-pro' ); ?></label>
    </p>

    <?php
  }
}
