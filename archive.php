<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package myphotography
 */

get_header();
?>

	<div class="container">
		<main id="primary" class="grid site-main min-vh-100">
			<div class="grid-sizer col-xs-12 col-md-6 col-lg-4"></div>
			<?php 

			if ( have_posts() ) :
				
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content-archive', get_post_type() );

				endwhile;
				?>
				</main><!-- #main -->
				<?php

				the_posts_navigation( 
					array(
						'prev_text' => esc_html__( '<< Previous', 'myphotography' ),
						'next_text' => esc_html__( 'Next >>', 'myphotography' ),
					) 
				);
				paginate_links();

			else :

				get_template_part( 'template-parts/content', 'none' );
				?>
				</main><!-- #main -->
				<?php

			endif;
			?>
		</div>

<?php
get_footer();
