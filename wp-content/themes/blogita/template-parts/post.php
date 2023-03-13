<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

?>

<div class="image">
	<?php
		if( has_post_thumbnail() ):
			the_post_thumbnail( 'full' );
		endif;
	?>
</div>