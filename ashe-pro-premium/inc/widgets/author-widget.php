<?php

/**
 * Author Widget
 */

add_action( 'widgets_init', 'ashe_author_widget_load' );
function ashe_author_widget_load() {
    register_widget( 'ashe_author_widget' );
}

class ashe_author_widget extends WP_Widget {
 	
 	/**
     * Widget constructor.
     */
    public function __construct() {
        parent::__construct(
            'ashe_author_widget',
            esc_html__( 'Ashe: Author', 'ashe-pro' ),
            array(
                'classname'   => 'ashe_author_widget',
                'description' => esc_html__( 'Displays Author Widget', 'ashe-pro' )
            ),
            array( 
                'width' => 300,
                'id_base' => 'ashe_author_widget'
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
		$img_url	     = esc_attr( $instance['img_url'] );
	    $img_link	     = esc_attr( $instance['img_link'] );
        $img_circle      = esc_attr( $instance['img_circle'] );
        $description     = wp_kses_post( $instance['description'] );
        $window          = esc_attr( $instance['window'] );
        $img_circle      = ( $img_circle === 'true' )?'author-img-circle':'';
        $links_window    = ( $window == 'true' )?'_blank':'_self';

        echo $before_widget;
     
	    if( !empty( $img_url ) && !empty( $img_link ) ) { ?>
	    <a href="<?php echo esc_url( $img_link ); ?>" target="<?php echo esc_attr($links_window); ?>">
	    	<img src="<?php echo esc_url( $img_url ); ?>" class="<?php echo esc_attr( $img_circle ); ?>" alt="" />
	    </a>
	    <?php } else if( !empty( $img_url ) ) { ?>
            <img src="<?php echo esc_url( $img_url ); ?>" class="<?php echo esc_attr( $img_circle ); ?>" alt="" />
        <?php }

       if ( $title )
        echo '<h3>' . esc_attr( $title ) . '</h3>';

        if ( $description )
        echo '<p>' . wp_kses_post( $description ) . '</p>';

	    echo $after_widget;
    }

    /**
     * Saves widget settings.
     */
    public function update( $new_instance, $old_instance ) {
       
        $instance = $old_instance;
        $instance['title']		   = esc_attr( $new_instance['title'] );
        $instance['img_url']	   = esc_attr( $new_instance['img_url'] );
        $instance['img_link']	   = esc_attr( $new_instance['img_link'] );
        $instance['img_circle']    = esc_attr( $new_instance['img_circle'] );
        $instance['description']   = wp_kses_post( $new_instance['description'] );
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
            'img_url'	   => '',
            'img_link'	   => '',
            'img_circle'   => 'true',
            'description'  => '',
            'window'       => 'true'
        )
    );

    $title       = esc_attr( $instance['title'] );
    $img_url     = esc_attr( $instance['img_url'] );
    $img_link    = esc_attr( $instance['img_link'] );
    $img_circle  = esc_attr( $instance['img_circle'] );
    $description = wp_kses_post( $instance['description'] );
    $window  = esc_attr( $instance['window'] );
    $img_circle_checked = '';
    $window_checked = '';
    if( $window ==='true' ) $window_checked = 'checked';
    if( $img_circle ==='true' ) $img_circle_checked = 'checked'; ?>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

	<p>
        <label for="<?php echo esc_attr($this->get_field_id('img_url')); ?>"><?php esc_html_e( 'Image URL:', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_url')); ?>" name="<?php echo esc_attr($this->get_field_name('img_url')); ?>" type="text" value="<?php echo esc_attr($img_url); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('img_link')); ?>"><?php esc_html_e( 'Image Link:', 'ashe-pro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_link')); ?>" name="<?php echo esc_attr($this->get_field_name('img_link')); ?>" type="text" value="<?php echo esc_attr($img_link); ?>" />
    </p>
    
    <p>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'img_circle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('img_circle') ); ?>" type="checkbox" value="true" <?php echo $img_circle_checked; ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'img_circle' ) ); ?>"><?php esc_html_e( 'Make Image Circle ', 'ashe-pro' ); ?></label>
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e( 'Description:', 'ashe-pro' ); ?></label>
        <textarea style="height:200px;" class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text"><?php echo wp_kses_post($description); ?></textarea>
    </p>

    <p>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'window' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('window') ); ?>" type="checkbox" value="true" <?php echo $window_checked; ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'window' ) ); ?>"><?php esc_html_e( 'Open Image Link in New Window', 'ashe-pro' ); ?></label>
    </p>

    <?php
  }
}
