<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package myphotography
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header py-3">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title text-center">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title text-center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta py-3 text-center">
				<?php
					myphotography_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php myphotography_post_thumbnail( 'full' ); ?>

	<div class="entry-content py-3">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'myphotography' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'myphotography' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer py-3">
		<?php 
			myphotography_entry_footer(); 
		?>
	</footer> <!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
