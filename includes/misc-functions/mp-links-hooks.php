<?php
/**
 * Add styling before the mp-links widget
 */
function mp_knapstack_mp_links_before_widget(){
	echo '<div class="social-holder">';
}
add_action( 'mp_links_before_widget', 'mp_knapstack_mp_links_before_widget');

/**
 * Add styling before the mp-links widget
 */
function mp_knapstack_mp_links_after_widget(){
	echo '</div>';
}
add_action( 'mp_links_after_widget', 'mp_knapstack_mp_links_after_widget');

/**
 * Modify the types of links available as default for the mp_links plugin custom post type
 */
function mp_knapstack_mp_links_array($mp_links_array){
	$mp_links_array = array('mp-links-facebook' => 'Facebook', 'mp-links-twitter' => 'Twitter', 'mp-links-youtube' => 'YouTube', 'mp-links-vimeo' => 'Vimeo', 'mp-links-email' => 'Email');
	return $mp_links_array;
}
//add_filter( 'mp_links_array', 'mp_knapstack_mp_links_array');