<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myphotography
 */

?>
</div>
</div>
	<footer id="colophon" class="site-footer p-3">
		<div class="site-info text-center">
				<?php
				/* translators: 1: Copyright  */
				printf( esc_html__( '&copy; Copyright %1$s %2$s', 'myphotography' ), esc_html( date( 'Y' ) ), '<a href="' . esc_url( home_url() ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>' );

				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
