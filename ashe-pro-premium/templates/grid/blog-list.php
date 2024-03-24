<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post clear-fix'); ?>>
	
	<div class="post-media">
		<?php get_template_part( 'templates/post/content', get_post_format() ); ?>
	</div>

	<div class="post-content-wrap">

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

			<?php if ( ashe_options( 'blog_page_show_date' ) || ashe_options( 'blog_page_show_comments' ) || ashe_options( 'blog_page_show_author' ) ) : ?>
			<div class="post-meta clear-fix">

				<?php if ( ashe_options( 'blog_page_show_author' ) === true ) : ?>
				<span class="post-author"><?php the_author_posts_link(); ?></span>
				<?php endif; ?>

				<?php if ( ashe_options( 'blog_page_show_date' ) === true ) : ?>			
				<span class="meta-sep">/</span>
				<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				<?php endif; ?>

				<?php if (  ashe_options( 'blog_page_show_comments' ) === true && comments_open() ) : ?>
				<span class="meta-sep">/</span>
					<?php comments_popup_link( esc_html__( 'No Comments', 'ashe-pro' ), esc_html__( '1 Comment', 'ashe-pro' ), '% '. esc_html__( 'Comments', 'ashe-pro' ), 'post-comments'); ?>
				<?php endif; ?>
				
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

		<?php ashe_post_sharing(); ?>

	</div>

</article>

<!-- Related Posts -->
<?php

if ( ashe_options( 'blog_page_related_orderby' ) !== 'none' ) {
	ashe_related_posts( ashe_options( 'blog_page_related_title' ), ashe_options( 'blog_page_related_orderby' ) );
}

?>