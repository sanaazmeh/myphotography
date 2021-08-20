<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package myphotography
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item col-xs-12 col-md-6 col-lg-4' ); ?> >

	<div class="mpImgDiv">
		<?php myphotography_post_thumbnail( 'medium_large' ); ?>
		<a href="<?php the_permalink(); ?>">
			<div class="mpImgOverlay">
				<div class="mpImgText"><?php the_title( '<h5>', '</h5>' ); ?>
					<pre>
					<?php
					myphotography_posted_on();
					?>
					</pre>
				</div>
			</div>
		</a>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
