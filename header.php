<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myphotography
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'myphotography' ); ?></a>

<?php

$myphotography_custom_logo_id = get_theme_mod( 'custom_logo' );
$myphotography_logo           = wp_get_attachment_image_src( $myphotography_custom_logo_id, 'full' );

?>

<header id="masthead" style="background-image:url('<?php header_image(); ?>'); ">

	<nav class="navbar navbar-expand-lg navbar-light p-3">
		<div class="container">
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
				<?php 
				if ( display_header_text() ) {
					echo '<h1 id="blogtitle" class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</h1><h2 id="blogtagline" class="site-description">' . esc_html( get_bloginfo( 'description' ) ) . '</h2>';
				} elseif ( has_custom_logo() ) {
					echo '<img src="' . esc_url( $myphotography_logo[0] ) . '" alt="' . esc_html( get_bloginfo( 'name' ) ) . '" id="bloglogo" >';
				} 
				?>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">

			<?php

				wp_nav_menu(
					array(
						'theme_location'  => 'main-menu',
						'container'       => false,
						'menu_class'      => '',
						'fallback_cb'     => '__return_false',
						'items_wrap'      => '<ul id="%1$s" class="navbar-nav ms-auto text-center mb-2 mb-lg-0  %2$s">%3$s</ul>',
						'depth'           => 2,
						'walker'          => new Myphotography_Wp_Nav_Menu_Walker(), 
					)
				);

				?>

			</div>
		</div>
	</nav>
</header><!-- #masthead -->
<?php if ( is_archive() ) { ?>
<header class="page-header text-center">

	<?php

		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
   
	?>

</header><!-- .page-header -->
<?php } ?>
<div class="container">
<div class="row">
