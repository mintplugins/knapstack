<?php
/**
 * Remove Add To Cart Button from Single Download page
 */
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );

remove_action( 'wp_enqueue_scripts', 'edd_register_styles' );