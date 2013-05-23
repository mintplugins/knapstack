<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to mp_knapstack_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package mp_knapstack
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 ?>
<div id="comments-container">
	<?php
    //Call the mp_core_comments_template function if it exists
    if ( function_exists ( 'mp_core_comments_template' ) ) {
        mp_core_comments_template();
    }else{
        wp_list_comments(); comment_form(); paginate_comments_links();
    }
    ?>
</div>