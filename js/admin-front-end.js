/**
 * Admin End JS for the Knapstack Theme
 */
jQuery(document).ready(function($){
	
	//If the template chooser is on the page
	if ( $( '#mp_knapstack_pagetemplate_chooser' ) ){
		
		// Form the array to pass to the knapstack_get_page_templates php function
		var postData = {
			action: 'mp_knapstack_get_page_templates',
		};
		
		//Load in the names of the page templates
		$.ajax({
			type: "POST",
			data: postData,
			dataType:"html",
			url: mp_knapstack_vars.ajaxurl,
			success: function (response) {
				
				//Load in the Page Template Options
				$( '#mp_knapstack_pagetemplate_chooser').html( response );		
			}
		}).fail(function (data) {
			console.log(data);				
		});
	}
	
	//When the "Use Page-Template" button is clicked
	$( document ).on( 'click', '#mp_knapstack_pagetemplate_choose_button', function( event ){
			
			event.preventDefault();
			
			// Form the array to pass to the knapstack_get_page_templates php function
			var postData = {
				action: 'mp_knapstack_set_page_template',
				post_id: $(this).attr( 'post-id' ),
				nonce: $(this).attr( 'nonce' ),
				template_filename: $('#mp_knapstack_pagetemplate_chooser option:selected').val(),
			};
			
			$( '#mp_knapstack_pagetemplate_chooser_container').html( mp_knapstack_vars.page_template_changing_message );
			
			//Refresh the page when the action is complete
			$.ajax({
				type: "POST",
				data: postData,
				dataType:"json",
				url: mp_knapstack_vars.ajaxurl,
				success: function (response) {
					
					console.log(response);	
					location.reload();
						
				}
			}).fail(function (data) {
				console.log(data);				
			});
			
	});
	
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