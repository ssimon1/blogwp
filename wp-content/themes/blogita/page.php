<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="default__page">
			<div class="container">
				<div class="row">
					<div class="col-xxl-12">
						<div class="default__style">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php get_footer(); ?>
