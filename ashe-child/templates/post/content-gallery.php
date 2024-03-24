<?php 

$images = get_field('select_gallery_images');

$_easy_image_gallery = get_field('_easy_image_gallery');



if ( $_easy_image_gallery ) :
	
	$attachment_ids = explode( ',', $_easy_image_gallery );
	$id_array = array_filter( $attachment_ids );

	// Stacked
	if ( is_single() && get_field('select_gallery_type') === 'stacked' ) :
		foreach ( $id_array as $image_id )  : ?>
			
			<?php $image = wpex_get_attachment( $image_id );	//var_dump($attachment); ?>
			<div class="post-slide stacked-slide">
				<img src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php if ( $image['caption'] ): ?>
				<span class="slide-caption"><?php echo $image['caption']; ?></span>	
				<?php endif; ?>
			</div>

		<?php
		endforeach;
	else :
	?>

	<div id="post-slider" class="post-slider">
		<?php foreach ( $id_array as $image_id )  : ?>
			<?php 
			$image = wpex_get_attachment( $image_id );
			//var_dump($attachment);

			?>
			<div class="post-slide">
				<img src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>" />
			</div>
		<?php endforeach; ?>
	</div>

<?php
	endif;





elseif ( $images ) :

	// Stacked
	if ( is_single() && get_field('select_gallery_type') === 'stacked' ) :
		foreach ( $images as $image )  : ?>
			<div class="post-slide stacked-slide">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php if ( $image['caption'] ): ?>
				<span class="slide-caption"><?php echo $image['caption']; ?></span>	
				<?php endif; ?>
			</div>
	<?php
		endforeach;
	else :
	?>

	<div id="post-slider" class="post-slider">
	<?php foreach ( $images as $image ) : ?>
		<div class="post-slide">
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		</div>
	<?php endforeach; ?>
	</div>

<?php
	endif;
endif;
?>