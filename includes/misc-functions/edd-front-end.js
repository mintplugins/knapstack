/**
 * Front End JS used for EDD for the Knapstack Theme
 */
jQuery(document).ready(function($){
	
	function mp_knapstack_edd_sort_by(){
				
		window.location.href = $("#knapstack_sort_downloads_by>option:selected").val();
	}
	
	$('#knapstack_sort_downloads_by').change(function() {
		mp_knapstack_edd_sort_by();
	});
		
});