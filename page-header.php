<?php
/**
 * The template part for displaying the header of a page - not the main header.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mp_knapstack
 */
?>


<div class="page-header">

	<div class="page-header-inner">

        <h1 class="page-title">
            <?php function_exists ( 'mp_core_archive_page_title' ) ? mp_core_archive_page_title() : _e( 'Archives', 'mt_malachi' ); ?>
        </h1>
        <?php
            if ( is_category() ) :
                // show an optional category description
                $category_description = category_description();
                if ( ! empty( $category_description ) ) :
                    echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
                endif;
    
            elseif ( is_tag() ) :
                // show an optional tag description
                $tag_description = tag_description();
                if ( ! empty( $tag_description ) ) :
                    echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
                endif;
    
            endif;
        
		//If this is a single pge, show the date
		if ( is_single() ){?>
        <div class="taxonomy-description">
			<?php mp_core_posted_on(); ?>
		</div>
        <?php } ?>
        
    </div>
    
</div><!-- .page-header -->