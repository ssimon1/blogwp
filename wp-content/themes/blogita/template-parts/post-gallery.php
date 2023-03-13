<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

?>


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
								echo wp_kses_post( $attachments->image( 'full' ) );
							?>
							</div>
							<?php
						endwhile;
					else:
						if( has_post_thumbnail() ) {
							the_post_thumbnail('full');
						}
					endif; 
				?>
			</div>
		</div>
		<div class="swiper-pagination"></div>
		<?php else: 
			if( has_post_thumbnail() ) {
				the_post_thumbnail('full');
			}
		endif;
	?>
</div>