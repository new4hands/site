<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) { ?>
		<h3 class="comments-title">
			<?php comments_number(); ?>
		</h3>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 174,
					'callback'    => 'stm_comment'
				) );
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'cinderella' ); ?></h2>
				<div class="nav-links">
					<?php
					if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'cinderella' ) ) ) {
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					}
					if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'cinderella' ) ) ) {
						printf( '<div class="nav-next">%s</div>', $next_link );
					}
					?>
				</div>
			</nav>
		<?php } ?>

	<?php } ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'cinderella' ); ?></p>
	<?php } ?>

	<?php comment_form( array(
		'comment_notes_before' => '',
		'comment_notes_after' => ''
	) ); ?>

</div>