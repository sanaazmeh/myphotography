<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package myphotography
 */

get_header();
?>

	<main id="primary" class="site-main p-5">

		<section class="error-404 not-found">
			<header class="page-header">
				<div class="mp_404_image_div"><img src="<?php echo esc_attr( get_option( 'mp_404_image_url' ) ); ?>" id="mp_404_image"></div>
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'myphotography' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'myphotography' ); ?></p>
					<div class="row p-3">
					<?php
						get_search_form();
					?>
					</div>
					<div class="widget widget_categories row p-3">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'myphotography' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->
					<div class="row p-3"> 
					<?php
					/* translators: %1$s: smiley */
					$myphotography_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'myphotography' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$myphotography_archive_content" );
					?>
				</div>
				<div class="row p-3">
					<?php
					the_widget( 'WP_Widget_Tag_Cloud' );
					?>
				</div>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
<?php
get_footer();
