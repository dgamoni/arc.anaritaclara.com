<?php

if( is_single() && get_field( 'hide_featured_image' ) === 'yes' ) {
	return;
}

if ( ! is_single() ) {
	echo '<a href="'. esc_url( get_the_permalink() ). '"></a>';
}

$thumb_url =  wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
$params_news_img = array( 'width' => 700, 'height' => 330 );

//ashe_post_thumbnail();


echo get_the_post_thumbnail( $post->ID, 'ashe-grid-thumbnail' );
echo '<img src="'. bfi_thumb( $thumb_url, $params_news_img  ) .'" class="bfi_700">';

?>