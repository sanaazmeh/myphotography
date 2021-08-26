<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			global $wp_query;


			$myphotography_modifications = array();

			$myphotography_modifications['meta_query'][] = array( 'key' => '_thumbnail_id' );

			// Get current page and append to custom query parameters array.
			// $myphotography_modifications['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

			$myphotography_args = array_merge( 
				$wp_query->query_vars, 
				$myphotography_modifications 
			);


			$myphotography_query = new WP_Query( $myphotography_args );

			// Pagination fix.
			$myphotography_temp_query = $wp_query;
			$wp_query                 = NULL;
			$wp_query   = $myphotography_query;

			if ( $myphotography_query->have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
				<header class="page-header text-center">
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
					<?php
				endif;
			
				/* Start the Loop */
				while ( $myphotography_query->have_posts() ) : 
					$myphotography_query->the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					if ( is_singular() ) :
						get_template_part( 'template-parts/content', get_post_type() );
					else :
						get_template_part( 'template-parts/content-posts', get_post_type() );
					endif;

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

				// Reset postdata.
				wp_reset_postdata();

			else :

				get_template_part( 'template-parts/content', 'none' );
				?>

			</main><!-- #main -->

				<?php

			endif;
			
			// Reset main query object.
				$wp_query = NULL;
				$wp_query = $myphotography_temp_query;
			?>
</div>


<?php

get_footer();
