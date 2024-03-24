<?php 

$images = get_field('select_gallery_images');

if ( $images ) :

	// Stacked
	if ( is_single() && get_field('select_gallery_type') === 'stacked' ) :
		foreach ( $images as $image )  : ?>
			<div class="post-slide stacked-slide">
				<?php echo wp_get_attachment_image( $image['ID'],'ashe-full-thumbnail' ); ?>
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
		<?php
			if ( strpos( ashe_page_layout(), 'col1' ) === 0 || is_single() ) {
				echo wp_get_attachment_image( $image['ID'],'ashe-full-thumbnail' );	
			} else if ( strpos( ashe_page_layout(), 'list' ) === 0 ) {
				echo wp_get_attachment_image( $image['ID'],'ashe-list-thumbnail' );
			} else {
				echo wp_get_attachment_image( $image['ID'],'ashe-grid-thumbnail' );
			}
		?>
		</div>
	<?php endforeach; ?>
	</div>

<?php
	endif;
endif;
?>