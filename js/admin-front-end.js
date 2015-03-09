/**
 * Admin End JS for the Knapstack Theme
 */
jQuery(document).ready(function($){
	
	$( '.knapstack-notice-hide, .knapstack-notice-dismiss' ).on('click', function(){
		$(this).parent().css( 'display', 'none' );
	});
	
	$( '.knapstack-notice-dismiss' ).on( 'click', function( event ){
		
		event.preventDefault();
		
		// Form the array to pass to the knapstack_dismiss_notice php function
		var postData = {
			action: 'mp_knapstack_dismiss_notice',
			post_id: $(this).attr( 'post-id' ),
			notice_name: $(this).attr( 'knapstack-notice-name' ),
		};
		
		//Ajax to save that the user doesn't want to see this error for this page
		$.ajax({
			type: "POST",
			data: postData,
			dataType:"json",
			url: mp_knapstack_vars.ajaxurl,
			success: function (response) {
				console.log(response);					
			}
		}).fail(function (data) {
			console.log(data);				
		});
		
	});
	
});