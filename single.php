<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package myphotography
 */

get_header();
?>

	<main id="primary" class="site-main col-12 min-vh-100" >

		<?php
		while ( have_posts() ) :
			the_post();

			if ( ( get_post_format( $post->ID ) === 'gallery' ) || ( get_post_format( $post->ID ) === 'video' ) ) {

				get_template_part( 'template-parts/content', get_post_format( $post->ID ) );

			} else {

				get_template_part( 'template-parts/content', get_post_type() );

			}

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle ">' . esc_html__( 'Previous:', 'myphotography' ) . '</span> <span class="nav-title ">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'myphotography' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			$myphotography_display_comments = get_option( 'mp_display_comments' );
			if ( '1' === $myphotography_display_comments ) {
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
