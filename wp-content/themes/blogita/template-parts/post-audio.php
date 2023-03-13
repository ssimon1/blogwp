<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

?>

<div class="blog__audio">
	<?php
		$audio_file = get_field( 'audio_file' );

		if( $audio_file ) : ?>
			<audio id="player" src="<?php echo esc_html( $audio_file ); ?>" width="100%" height="42" controls="controls"></audio>
			<?php
		endif;

		if( has_post_thumbnail() ):
			the_post_thumbnail( 'full' );
		endif;
		
	?>
</div>