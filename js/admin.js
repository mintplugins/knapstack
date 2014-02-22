/**
 * Admin End JS for the Knapstack Theme
 */
jQuery(document).ready(function($){
	
	function mp_knapstack_custom_page_width_metabox( args ){		
		
		//Hide custom page width metabox
		$('#mp_knapstack_page_template_metabox').css('display', 'none');	
	
		//Show correct content type metaboxes by looping through each item in the 1st drodown
		var values = $("#page_template>option:selected").map(function() { 
		
			if ( $(this).val() == 'default' ) {
				//Hide custom page width metabox
				$('#mp_knapstack_page_template_metabox').css('display', 'block');	
			}
						
		});
		
	}
	
	$('#page_template').change(function() {
		mp_knapstack_custom_page_width_metabox();
	});
	
	mp_knapstack_custom_page_width_metabox();
	
});