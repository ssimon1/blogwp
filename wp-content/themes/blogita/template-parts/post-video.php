<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

?>


	<?php
		$resource_url = get_field( 'resource_url' );

		if( $resource_url ) : 
			?>
			<div class="video">
				<iframe src="<?php	echo esc_url( $resource_url );?>"></iframe>
			</div>
			<?php
		else:
			if( has_post_thumbnail() ):
				the_post_thumbnail( 'full' );
			endif;
		endif;
	?>
