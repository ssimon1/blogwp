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
		<div class="blog__item-gallery">
			<div class="blog__gallery">
				<?php if ( class_exists( 'Attachments' ) ): ?>
					<div class="swiper blog__gallery-slider">
						<div class="swiper-wrapper">
							<?php 
								$attachments = new Attachments( 'blogita_gallery' );
								
								if( $attachments->exist() ) :
									while( $attachment = $attachments->get() ) :
										?>
										<div class="swiper-slide">
										<?php
											echo wp_kses_post( $attachments->image( 'blogita-landscape' ) );
										?>
										</div>
										<?php
									endwhile;
								else:
									if( has_post_thumbnail() ) {
										the_post_thumbnail('blogita-landscape');
									}
								endif; 
							?>
						</div>
					</div>
					<div class="swiper-pagination"></div>
					<?php else: 
						if( has_post_thumbnail() ) {
							the_post_thumbnail('blogita-landscape');
						}
					endif;
				?>
			</div>

			<div class="blog__content-wrapper">
				<?php get_template_part( '/template-parts/content', 'common' ); ?>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
