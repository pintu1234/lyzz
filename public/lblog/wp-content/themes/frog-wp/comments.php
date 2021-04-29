<?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'anthemes'); ?></p>
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
    <?php // comments_number('No Comments', '1 Comment', '% Comments' );?>
 
            <ul class="comment">
                <?php wp_list_comments( array( 'callback' => 'anthemes_comment' ) ); ?>
            </ul>
            <div class="clear"></div>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <div class="pagination">
            <?php previous_comments_link('&lsaquo; Older Comments'); ?>
            <?php next_comments_link('Newer Comments &rsaquo;'); ?>
            <div class="clear"></div>
        </div>
<?php endif; // check for comment navigation ?>


<?php else : // or, if we don't have comments:
    if ( ! comments_open() ) : ?>
    <p class="nocomments"><?php _e('Comments are closed.', 'anthemes'); ?></p>
<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>

 
<?php comment_form(); ?>