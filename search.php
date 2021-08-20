<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package myphotography
 */

get_header();
?>
<header class="page-header p-3 text-center">
	<h1 class="page-title">
		<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'myphotography' ), '<span>' . get_search_query() . '</span>' );
		?>
	</h1>
</header><!-- .page-header -->
<div class="container">
	<main id="primary" class="grid site-main min-vh-100">
		<div class="grid-sizer col-xs-12 col-md-6 col-lg-4"></div>

		<?php if ( have_posts() ) : ?>

			<div class="row p-5">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			?>
		</div>
		</main>
			<?php

				the_posts_navigation();
			
			else :

				get_template_part( 'template-parts/content', 'none' );
			
				?>

		</main>
		<?php endif; ?>

	<!-- </main> --><!-- #main -->
</div>

<?php

get_footer();
