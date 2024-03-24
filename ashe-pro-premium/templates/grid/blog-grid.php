<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post clear-fix'); ?>>
	
	<div class="post-media">
		<?php get_template_part( 'templates/post/content', get_post_format() ); ?>
	</div>

	<header class="post-header">

 		<?php

		$category_list = get_the_category_list( ',&nbsp;&nbsp;' );

		if ( ashe_options( 'blog_page_show_categories' ) === true && $category_list ) {
			echo '<div class="post-categories">' . $category_list . ' </div>';
		}

		?>

		<?php if ( get_the_title() ) : ?>
		<h1 class="post-title">
			<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
		</h1>
		<?php endif; ?>

		<?php if ( ashe_options( 'blog_page_show_date' ) || ashe_options( 'blog_page_show_comments' ) ): ?>
		<div class="post-meta clear-fix">
			<?php if ( ashe_options( 'blog_page_show_date' ) === true ) : ?>
			<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<?php endif; ?>

			<span class="meta-sep">/</span>

			<?php
			if ( ashe_options( 'blog_page_show_comments' ) === true && comments_open() ) {
				comments_popup_link( esc_html__( 'No Comments', 'ashe-pro' ), esc_html__( '1 Comment', 'ashe-pro' ), '% '. esc_html__( 'Comments', 'ashe-pro' ), 'post-comments');
			}
			?>
		</div>
		<?php endif; ?>
		
	</header>

	<?php if ( ashe_options( 'blog_page_post_description' ) !== 'none' ) : ?>

	<div class="post-content">
		<?php
		if ( ashe_options( 'blog_page_post_description' ) === 'content' ) {
			the_content('');
		} elseif ( ashe_options( 'blog_page_post_description' ) === 'excerpt' ) {
			if ( strpos( ashe_page_layout(), 'col1' ) === 0 ) {
				ashe_excerpt(  ashe_options( 'blog_page_excerpt_length' ) );
			} else {
				ashe_excerpt(  ashe_options( 'blog_page_grid_excerpt_length' ) );
			}						
		}
		?>
	</div>

	<?php endif; ?>

	<div class="read-more">
		<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( ashe_options( 'blog_page_more_text' ) ); ?></a>
	</div>
	
	<?php

	$post_footer_elements = array(
		ashe_options( 'blog_page_show_author' ),
		ashe_options( 'blog_page_show_facebook' ),
		ashe_options( 'blog_page_show_twitter' ),
		ashe_options( 'blog_page_show_pinterest' ),
		ashe_options( 'blog_page_show_google' ),
		ashe_options( 'blog_page_show_linkedin' ),
		ashe_options( 'blog_page_show_reddit' ),
		ashe_options( 'blog_page_show_tumblr' )
	);

	if ( ( strpos( ashe_page_layout(), 'col1' ) === 0 && ashe_options( 'blog_page_related_orderby' ) !== 'none' ) || array_search( true, $post_footer_elements ) !== false ) :

	?>
	<footer class="post-footer">

		<?php if ( ashe_options( 'blog_page_show_author' ) === true ) : ?>
		<span class="post-author">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?>
			</a>
			<?php the_author_posts_link(); ?>	
		</span>
		<?php endif; ?>

		<?php ashe_post_sharing(); ?>

	</footer>
	<?php endif; ?>

	<!-- Related Posts -->
	<?php
	
	if ( strpos( ashe_page_layout(), 'col1' ) === 0 && ashe_options( 'blog_page_related_orderby' ) !== 'none' ) {
		ashe_related_posts( ashe_options( 'blog_page_related_title' ), ashe_options( 'blog_page_related_orderby' ) );
	}

	?>

</article>