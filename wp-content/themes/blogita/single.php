<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blogita
 */

get_header();
?>

	<?php 
		if( !is_active_sidebar( 'blog-sidebar' ) ):
			$blogita_layout = "col-xxl-12";
			$blogita_container = "container";
		else:
			$blogita_layout = "col-xxl-8 col-xl-8 col-lg-8";
			$blogita_container = "container-fulid";
		endif;
	?>

	<main id="primary" class="site-main">

		<section class="blog__detail">
			<div class="fluid__outer">
				<div class="<?php echo esc_html( $blogita_container ); ?>">
					<div class="row">
						<div class="<?php echo esc_html( $blogita_layout ); ?>">
							<?php
								while ( have_posts() ) :
									the_post(); ?>
										<div class="blog__detail-wrapper">
											<?php get_template_part( 'template-parts/content', 'single' ); ?>
										</div>
										<?php
									the_post_navigation(
										array(
											'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Prev:', 'blogita' ) . '</span> <span class="nav-title">%title</span>',
											'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'blogita' ) . '</span> <span class="nav-title">%title</span>',
										)
									);
								endwhile; // End of the loop.
							?>
						</div>
						
						<?php
							if( is_active_sidebar('blog-sidebar') ):
								?>
								<div class="col-xxl-4 col-xl-4 col-lg-4">
									<div class="blog__sidebar">
										<?php	get_sidebar(); ?>
									</div>
								</div>
								<?php 
							endif;
						?>
					</div>
				</div>
			</div>
		</section>
		<!-- Blog detail end -->


		<?php
		while ( have_posts() ) :
			the_post();
			// If comments are open, load up the comment template.
			if ( comments_open() ) :
				comments_template();
			else:
				?>
					<div class="comment-disbaled">
						<?php echo __("Comment Disabled for this post!", "blogita" ); ?>
					</div>
				<?php
			endif;
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php get_footer(); ?>
