<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

?>


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog__item">
			<a href="<?php the_permalink(); ?>">
				<div class="blog__video">
				<?php
					$resource_url = get_field( 'resource_url' );

					if( $resource_url ) : 
						?>
						<div class="video">
							<iframe src="<?php	echo esc_url( $resource_url );?>"></iframe>
						</div>
						<?php
					else:
						if( has_post_thumbnail() ):
							the_post_thumbnail( 'blogita-landscape' );
						endif;
					endif;
				?>
				</div>
			</a>

			<div class="blog__content-wrapper">
				<?php get_template_part( '/template-parts/content', 'common' ); ?>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
