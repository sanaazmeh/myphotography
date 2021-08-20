<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package myphotography
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function myphotography_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'myphotography_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function myphotography_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'myphotography_pingback_header' );

/**
 *  Hook css for primary and secondary.
 */
function myphotography_hook_css() {
	$primarycolor   = get_option( 'mp_primary_color' );
	$secondarycolor = get_option( 'mp_secondary_color' );
	$primarycolor   = ( '' === $primarycolor ) ? '#6c757d' : $primarycolor; 
	$secondarycolor = ( '' === $secondarycolor ) ? '#EDB2B2' : $secondarycolor;

	?>
		<style> 
			.text-primary, a{
				color: <?php echo esc_attr( $primarycolor ); ?> !important;
			}
			.text-secondary, a:hover{
				color: <?php echo esc_attr( $secondarycolor ); ?> !important;
			}
			.bg-primary{
				background-color: <?php echo esc_attr( $primarycolor ); ?> !important;
			}
			.bg-secondary{
				background-color: <?php echo esc_attr( $secondarycolor ); ?> !important;
			}
		</style>
	<?php
}

add_action( 'wp_head', 'myphotography_hook_css' );

