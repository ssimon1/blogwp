<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogita
 */

?>



	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog__item">
			<div class="blog__audio">
				<?php
					$audio_file = get_field( 'audio_file' );

					if( $audio_file ) : ?>
						<audio id="player" src="<?php echo esc_html( $audio_file ); ?>" width="100%" height="42" controls="controls"></audio>
						<?php
					endif;

					if( has_post_thumbnail() ):
						the_post_thumbnail( 'blogita-landscape' );
					endif;
					
				?>
			</div>

			<div class="blog__content-wrapper">
				<?php get_template_part( '/template-parts/content', 'common' ); ?>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
