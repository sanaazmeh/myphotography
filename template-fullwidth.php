<?php
/**
 * Template Name: Full Width Page
 *
 * @package myphotography
 */

get_header( 'fullwidth' );
?>
	<main id="primary" class="site-main col-sm-12 min-vh-100" >

		<?php
		while ( have_posts() ) :
			the_post();
			if ( is_front_page() ) {
				get_template_part( 'template-parts/content', 'homepage' );

			} else {
				get_template_part( 'template-parts/content', 'page' );
			}
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
<?php
get_footer();
