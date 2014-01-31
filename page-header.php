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
		
        <?php do_action( 'mp_knapstack_header_before_page_title'); ?>
    	
        <div class="page-info">
        
            <h1 class="page-title">
                <?php function_exists ( 'mp_core_page_title' ) ? mp_core_page_title() : _e( 'Archives', 'mp_knapstack' ); ?>
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
					
				elseif ( is_tax() ) :
					 // show an optional tax description
                    $tax_description = $wp_query->queried_object->description;
                    if ( ! empty( $tax_description ) ) :
                        echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tax_description . '</div>' );
                    endif;
        
                endif;
            
			do_action( 'mp_knapstack_header_after_page_title'); 
            
			//If this is singular
            if ( is_singular() ){
				
				//Action to allow custom post types to filter the subtext output
				do_action( 'mp_knapstack_header_singular_entry_meta' );
						
			} 
						
			?>
            
        </div><!-- .page-info -->
        
        <div class="page-header-right-column">
			<?php
                //Action to allow for additional columns in the header
                do_action( 'mp_knapstack_header_right_column' );
            ?>
        </div>
        
	</div><!-- .page-header-inner -->
</div><!-- .page-header -->