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
	<div class="blog__quote">
		<span><i class="fa-solid fa-quote-left"></i></span>
		<?php the_content(); ?>
		<h2 class="title"><?php the_title(); ?></h2>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
