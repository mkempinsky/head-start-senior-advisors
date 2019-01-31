<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Norton
 * @since Norton 
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


<?php if ( have_comments() ) : ?>
    <div class="inner-box comment-area">
    <div class="theme-title-one">
        <h2>
        <?php
                $comments_number = get_comments_number();
                if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','norton' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx('%1$s Comment found','%1$s comments', $comments_number, 'comments title', 'norton' ),
                        esc_html (number_format_i18n( $comments_number ) ),
                        get_the_title()
                    );
                }
            ?>
    </h2>
    </div>

    <?php the_comments_navigation(); ?>

    <?php
        wp_list_comments( array(
            'style'       => '',
            'short_ping'  => true,
            'avatar_size' => 42,
            'callback' => 'norton_comments',
        ) );
    ?>
    <!-- .comment-list -->

    <?php the_comments_navigation(); ?>
    </div>

<?php endif; // Check for have_comments(). ?>

<?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'norton' ) ) :
?>
    <p class="no-comments"><?php esc_html__( 'Comments are closed.', 'norton' ); ?></p> 
<?php endif; ?>

<?php 
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $comments_args = array
    (
        'submit_button' => '<div class="comment-form">'.
          '<input  name="%1$s" type="submit" id="%2$s" class="theme-button-one commbtn" value="post comment" />'.
        '</div>',
        'title_reply'  =>  esc_html__( '<div class="theme-title-one"><h2>POST A COMMENTS</h2></div>', 'norton'  ), 
        'comment_notes_after' => '',  
            
        'comment_field' =>  
            '<textarea class="form-control" id="comment" name="comment" placeholder="' . esc_attr__( 'Comment here', 'norton' ) . '" rows="7" aria-required="true" '. $aria_req . '>' .
            '</textarea>',
        'fields' => apply_filters( 'comment_form_default_fields', array (
            'author' => '<div >'.               
                '<input id="author" class="form-control" name="author" placeholder="' . esc_attr__( 'Name', 'norton' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></div>',
            'email' =>'<div >'.
                '<input id="email" class="form-control" name="email" placeholder="' . esc_attr__( 'Email Address', 'norton' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></div>',
        
        ) ),
    );
    ?>
    </div>
    <div class="inner-box comment-form">
        <?php comment_form($comments_args); ?>
    </div> <!-- /.inner-box -->
    
<!-- .comments-area -->
