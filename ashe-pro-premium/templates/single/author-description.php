<?php

$authordesc = get_the_author_meta( 'description' );

if ( !empty( $authordesc ) ) : ?>

<div class="author-description">  

	<a class="author-avatar" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
	</a>

	<h4><?php the_author_posts_link(); ?></h4>

	<div class="author-share">      
      <?php if( get_the_author_meta( 'facebook' ) ) : ?>
      <a href="<?php echo the_author_meta( 'facebook' ); ?>" target="_blank" >
        <i class="fab fa-facebook-f"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'twitter' ) ) : ?>
      <a href="<?php echo the_author_meta( 'twitter' ); ?>" target="_blank" >
        <i class="fab fa-twitter"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'instagram' ) ) : ?>
      <a href="<?php echo the_author_meta( 'instagram' ); ?>" target="_blank" >
        <i class="fab fa-instagram"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'pinterest' ) ) : ?>
      <a href="<?php echo the_author_meta( 'pinterest' ); ?>" target="_blank" >
        <i class="fab fa-pinterest-p"></i>
      </a>
      <?php endif; ?>
      
      <?php if( get_the_author_meta( 'bloglovin' ) ) : ?>
      <a href="<?php echo the_author_meta( 'bloglovin' ); ?>" target="_blank" >
        <i class="fab fa-heart"></i>
      </a>
      <?php endif; ?>
      
      <?php if( get_the_author_meta( 'google_plus' ) ) : ?>
      <a href="<?php echo the_author_meta( 'google_plus' ); ?>" target="_blank" >
        <i class="fab fa-google-plus-g"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'tumblr' ) ) : ?>
      <a href="<?php echo the_author_meta( 'tumblr' ); ?>" target="_blank" >
        <i class="fab fa-tumblr"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'youtube' ) ) : ?>
      <a href="<?php echo the_author_meta( 'youtube' ); ?>" target="_blank" >
        <i class="fab fa-youtube-play"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'vine' ) ) : ?>
      <a href="<?php echo the_author_meta( 'vine' ); ?>" target="_blank" >
        <i class="fab fa-vine"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'flickr' ) ) : ?>
      <a href="<?php echo the_author_meta( 'flickr' ); ?>" target="_blank" >
        <i class="fab fa-flickr"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'linkedin' ) ) : ?>
      <a href="<?php echo the_author_meta( 'linkedin' ); ?>" target="_blank" >
        <i class="fab fa-linkedin"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'behance' ) ) : ?>
      <a href="<?php echo the_author_meta( 'behance' ); ?>" target="_blank" >
        <i class="fab fa-behance"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'soundcloud' ) ) : ?>
      <a href="<?php echo the_author_meta( 'soundcloud' ); ?>" target="_blank" >
        <i class="fab fa-soundcloud"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'vimeo' ) ) : ?>
      <a href="<?php echo the_author_meta( 'vimeo' ); ?>" target="_blank" >
        <i class="fab fa-vimeo"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'rss' ) ) : ?>
      <a href="<?php echo the_author_meta( 'rss' ); ?>" target="_blank" >
        <i class="fab fa-rss"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'dribbble' ) ) : ?>
      <a href="<?php echo the_author_meta( 'dribbble' ); ?>" target="_blank" >
        <i class="fab fa-dribbble"></i>
      </a>
      <?php endif; ?>

      <?php if( get_the_author_meta( 'envelope' ) ) : ?>
      <a href="<?php echo the_author_meta( 'envelope' ); ?>" target="_blank" >
        <i class="fab fa-envelope-o"></i>
      </a>
      <?php endif; ?>
    </div>

	<p><?php the_author_meta( 'description' ); ?></p>

</div>

<?php endif; ?>