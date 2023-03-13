<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Doyel Blog
 */
if ( ! is_singular( ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-item ">
		<?php if ( has_post_thumbnail () ): ?>
	    <div class="blog-img">
		    <?php doyel_post_thumbnail(); ?>                                    
	    </div><!-- .blog-img -->
	    <?php endif; ?>
	    <div class="full-blog-content">
	    	<div class="blog-title">
	        	<?php
					the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				?>
	        </div>
	        <div class="title-wrap">  
	            <div class="blog-meta">
	                <ul class="btm-cate">          
	                    <li>
	                    	<div class="blog-date">
	                    		<?php doyel_posted_on(); ?> 
	                    	</div>
	                    </li>
	                </ul> 
	    		</div>
	 		</div>
	        <div class="blog-desc">   
	        <?php the_excerpt(); ?>                                    
	        </div>

	        <div class="blog-button ">
	            <?php
	            echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'"><span>'.esc_html__('Read More','doyel-blog').'</span></a>'; 
	            ?>
	        </div>                          
	    </div>
	</div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php doyel_post_thumbnail(); ?>
	<div class="single-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );

			endif; 

			if ( 'post' === get_post_type() ) : ?>
				<div class="footer-meta">

					<?php 
						doyel_posted_by();
						doyel_posted_on(); 
					?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'doyel-blog' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'doyel-blog' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php doyel_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>