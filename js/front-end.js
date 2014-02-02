/**
 * Front End JS for the Knapstack Theme
 */
jQuery(document).ready(function($){
	
	function mp_knapstack_resize_header(){
		//Get height of header - this is dynamic based on the user's logo size
		var header_height = $('#masthead').height();
		
		//Set top padding for content based on height of header
		$('#main-container').css('padding-top', header_height );
		
		$(window).trigger('resize');
	}
		
	mp_knapstack_resize_header();
	
	$(window).on('resize', function(){
		mp_knapstack_resize_header();
	});
	
});