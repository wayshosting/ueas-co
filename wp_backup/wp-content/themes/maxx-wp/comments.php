<?php
/**
 * @package WordPress
 * @subpackage Maxx
 */
?>

<div id="comments">
<?php if ( post_password_required() ) : ?>
	<div class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'framework' ); ?></div>
	</div><!-- end comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>
<?php if ( have_comments() ) : ?>
			<h3 class="cufon first-word float-left"><?php
			printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'framework' ),
			number_format_i18n( get_comments_number() ));
			?></h3>
			<?php if ( comments_open() ){?><p class="write-comment-link float-right"><a href="#respond" class="maxx-primary-button"><?php _e( 'Leave a reply &rarr;', 'framework' ); ?></a></p><?php }?>
			<div class="clear"></div>
			<ul class="comment-list">
				<?php wp_list_comments( array( 'callback' => 'md_comment' ) ); ?>
			</ul>
            
            <br />
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<div class="nav-previous float-left"><?php previous_comments_link( __( '&larr; Older Comments', 'framework' ) ); ?></div>
			<div class="nav-next float-right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'framework' ) ); ?></div>
		</nav>
        <div class="sp"></div>
		<?php endif; // check for comment navigation ?>
		
	<?php else : // this is displayed if there are no comments so far ?>
	
		<?php if ( comments_open() ) : // If comments are open, but there are no comments ?>
		
		<?php else : // or, if we don't have comments:
		
			/* If there are no comments and comments are closed,
			 * let's leave a little note, shall we?
			 * But only on posts! We don't want the note on pages.
			 */
			if ( ! comments_open() && ! is_page() ) :
			?>
			<p class="nocomments"><?php _e( 'Comments are closed.', 'framework' ); ?></p>
			<?php endif; // end ! comments_open() && ! is_page() ?>
		<?php endif; ?>
		
	<?php endif; ?>
<?php comment_form(
array(
	'comment_notes_before' =>__( '<p class="comment-notes">Required fields are marked <span class="required">*</span>.</p>', 'framework'),
	'comment_notes_after' => '',
	'comment_field'  => '<p class="comment-form-comment"><label for="comment">' . _x( 'Message <span class="required">*</span>', 'noun', 'framework' ) . 	'</label><br/><textarea id="comment" name="comment" rows="8"></textarea></p>',
)
); ?>
</div><!-- end comments -->