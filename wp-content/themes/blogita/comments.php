<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comment__area">
	<div class="container">
		<div class="row">
			<div class="col-xxl-12">
				<div class="comment__inner">
					<?php
					if ( have_comments() ) :
						?>
						<h2 class="comment__title">
							<?php
							$blogita_comment_count = get_comments_number();
							if ( '1' === $blogita_comment_count ) {
								printf(
									/* translators: 1: title. */
									esc_html__( '1 Comment on &ldquo;%1$s&rdquo;', 'blogita' ),
									'<span>' . wp_kses_post( get_the_title() ) . '</span>'
								);
							} else {
								printf( 
									/* translators: 1: comment count number, 2: title. */
									esc_html( _nx( '%1$s Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', $blogita_comment_count, 'comments title', 'blogita' ) ),
									number_format_i18n( $blogita_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'<span>' . wp_kses_post( get_the_title() ) . '</span>'
								);
							}
							?>
						</h2><!-- .comments-title -->

						<ul class="comment-list">
							<?php
							wp_list_comments(
								array(
									'style'      => 'ul',
									'short_ping' => true,
								)
							);
							?>
						</ul><!-- .comment-list -->

						<?php the_comments_pagination(); ?>

						<?php
						// If comments are closed and there are comments, let's leave a little note, shall we?
						if ( ! comments_open() ) :
							?>
							<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'blogita' ); ?></p>
							<?php
						endif;

					endif; // Check for have_comments().

					comment_form();
					?>
				</div>
			</div>
		</div>
	</div>
</div><!-- #comments -->
