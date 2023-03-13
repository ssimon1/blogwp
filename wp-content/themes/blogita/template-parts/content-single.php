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
	<h2 class="blog__detail-title"><?php the_title(); ?></h2>
	<div class="blog__category"><?php the_category(" , "); ?></div>
	<ul class="blog__detail-meta">
		<li class="blog__author"><i class="fa-solid fa-user"></i> <?php the_author_posts_link(); ?></li>
		<li class="blog__date"><i class="fa-solid fa-calendar-days"></i> <?php the_date(); ?></li>
	</ul>
	

	<div class="blog__detail-thumb">
		<?php get_template_part( 'template-parts/post', get_post_format() ); ?>
	</div>

	<div class="blog__detail-content default__style">
		<?php the_content(); ?>
	</div>

	<div class="blog__detail-author">
		<div class="author__img">
			<?php echo  get_avatar( get_the_author_meta( 'ID' ) ); ?>
		</div>
		<div class="author__info">
			<h3 class="author-name"><?php the_author_posts_link(); ?></h3>
			<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
		</div>
	</div>
</article>

