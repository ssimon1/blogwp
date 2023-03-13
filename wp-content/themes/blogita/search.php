<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blogita
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header search__area">
				<div class="fluid__outer">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xxl-12">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'blogita' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</div>
						</div>
					</div>
				</div>
			</header><!-- .page-header -->

			<section class="blog__area">
				<div class="fluid__outer">
					<div class="container-fluid">
						<div class="row">
							<?php
							while ( have_posts() ) :
								the_post();
								?>
								<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
								</div>
								<?php
							endwhile;
							?>
						</div>

						<div class="blog__pagination">
							<?php  
								the_posts_pagination();
							?>
						</div>
					</div>
				</div>
			</section>
		<?php	else : ?>
			<section class="blog__none">
				<div class="container">
					<div class="row">
						<div class="col-xxl-12">
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						</div>
					</div>
				</div>
			</section>
		<?php	endif; ?>

	</main><!-- #main -->

<?php get_footer(); ?>
