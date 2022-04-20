<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<div id="post-<?php the_ID(); ?>" class="blog-wrapper blog-list blog-details blue-blog mb-50 <?php post_class(); ?>">
	<div class="blog-thumb mb-35">
		<?php the_post_thumbnail(); ?>
		<span class="blog-text-offer">
		<?php 
		foreach((get_the_category()) as $category){
			echo $category->name."<br>";
			}
		?>
		</span>
	</div>

	<div class="blog-content news-content">
		<div class="meta-text">
			<span>
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php wp_bootstrap_starter_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</span>
		</div>
		
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; 
		?>
		
		<?php
			if ( is_single() ) :
				the_content();
			else :
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
			endif;

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
					'after'  => '</div>',
				) );
		?>
	</div>

</div><!-- #post-## -->
