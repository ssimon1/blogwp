<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogita
 */

?>

	<footer class="site-footer footer__area">
		<div class="fluid__outer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
						<div class="footer__logo">
							<?php
							if( has_custom_logo() ):
								the_custom_logo();
							else: ?>
								<h2><?php bloginfo( 'name' ); ?></h2>
								<p><?php bloginfo( 'description' ); ?></p>
								<?php
							endif;
							
							if( get_theme_mod( 'blogita_footer_after_logo_text', true ) == true ) :
								?>
								<p><?php
								if( get_theme_mod( 'blogita_footer_after_logo_text' ) ) :
									echo esc_html( get_theme_mod( 'blogita_footer_after_logo_text' ) ); 
								endif;
								?></p>
								<?php
							endif;
							?>
						</div>
					</div>
					<div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6">
						<div class="footer__links">
							<h2 class="footer__title"><?php echo __( 'quick links', 'blogita' ); ?></h2>
							<div class="footer__menu">
								<?php
								wp_nav_menu(array(
									'theme_location'   => 'footer-menu',
									'fallback_cb'      => true,
								));
								?>
							</div>
						</div>
					</div>

					<?php
					$blogita_rpost = new WP_Query( array(
						'posts_per_page'  => 5,
					));

					if( $blogita_rpost->have_posts() ):
						?>
						<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
							<div class="footer__posts">
								<h2 class="footer__title"><?php echo __( 'recent posts', 'blogita' ); ?></h2>
									<ul>
										<?php
										while( $blogita_rpost->have_posts() ):
											$blogita_rpost->the_post();
											?>
											<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
											<?php
										endwhile;
										?>
									</ul>
							</div>
						</div>
						<?php
					endif;
					?>
					<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
						<div class="footer__contact">
							<h2 class="footer__title"><?php echo __( 'get in touch', 'blogita' ); ?></h2>

							<?php
								$blogita_footer_phone_number = get_theme_mod( 'blogita_footer_phone_number' );
								$blogita_footer_email = get_theme_mod( 'blogita_footer_email' );
								$blogita_footer_location = get_theme_mod( 'blogita_footer_location' );
							?>
							<ul class="footer__address">
								<?php 
								if( $blogita_footer_phone_number ): ?>
									<li><a href="<?php _e( 'tel:', 'blogita' ); ?><?php echo esc_url( $blogita_footer_phone_number ); ?>"><?php echo esc_html( $blogita_footer_phone_number ); ?></a></li>
									<?php 
								endif; 
								
								if( $blogita_footer_email ): ?>
									<li><a href="<?php _e( 'mailto:', 'blogita' ); ?><?php echo esc_url( $blogita_footer_email ); ?>"><?php echo esc_html( $blogita_footer_email ); ?></a></li>
									<?php 
								endif; 
								
								if( $blogita_footer_location ): ?>
									<li><?php echo esc_html( $blogita_footer_location ); ?></li>
									<?php 
								endif; ?>
							</ul>
							<?php
								$blogita_facebook_url = get_theme_mod( 'blogita_facebook_url' );
								$blogita_twitter_url = get_theme_mod( 'blogita_twitter_url' );
								$blogita_linkedin_url = get_theme_mod( 'blogita_linkedin_url' );
								$blogita_pinterest_url = get_theme_mod( 'blogita_pinterest_url' );
								$blogita_instagram_url = get_theme_mod( 'blogita_instagram_url' );
								$blogita_github_url = get_theme_mod( 'blogita_github_url' );
								$blogita_youtube_url = get_theme_mod( 'blogita_youtube_url' );
							?>
							<ul class="footer__social">
								<?php
								if( $blogita_facebook_url ): ?>
									<li><a href="<?php echo esc_url( $blogita_facebook_url ); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
									<?php
								endif;
								
								if( $blogita_twitter_url ):	?>
									<li><a href="<?php echo esc_url( $blogita_facebook_url ); ?>"><i class="fa-brands fa-twitter" target="_blank"></i></a></li>
									<?php
								endif;

								if( $blogita_linkedin_url ) :	?>
									<li><a href="<?php echo esc_url( $blogita_linkedin_url ); ?>"><i class="fa-brands fa-linkedin-in" target="_blank"></i></a></li>
									<?php
								endif;

								if( $blogita_pinterest_url ) :	?>
									<li><a href="<?php echo esc_url( $blogita_pinterest_url ); ?>"><i class="fa-brands fa-pinterest" target="_blank"></i></a></li>
									<?php
								endif;

								if( $blogita_youtube_url ) :	?>
									<li><a href="<?php echo esc_url( $blogita_youtube_url ); ?>"><i class="fa-brands fa-youtube" target="_blank"></i></a></li>
									<?php
								endif;

								if( $blogita_instagram_url ) :	?>
									<li><a href="<?php echo esc_url( $blogita_instagram_url ); ?>"><i class="fa-brands fa-instagram" target="_blank"></i></a></li>
									<?php
								endif;

								if( $blogita_github_url ) :	?>
									<li><a href="<?php echo esc_url( $blogita_github_url ); ?>"><i class="fa-brands fa-github" target="_blank"></i></a></li>
									<?php
								endif; ?>
							</ul>
						</div>
					</div>
				</div>

				<?php
				if( get_theme_mod( 'blogita_footer_copyright_text' ) ) :
					?>
					<div class="row">
						<div class="xxl-12">
							<div class="copyright">
								<?php echo wp_kses_post( get_theme_mod( 'blogita_footer_copyright_text', true ) ); ?>
							</div>
						</div>
					</div>
					<?php
				endif;
				?>
			</div>
		</div>
	</footer>

	<!-- Go To Top -->
	<a href="#" id="scroll_top" class="scroll__top" title="Go to top"><i class="fa-solid fa-arrow-up"></i></a>
</div>

<?php wp_footer(); ?>

</body>
</html>
