/**
 * Front End JS used for EDD for the Knapstack Theme
 */
jQuery(document).ready(function($){
	
	function mp_knapstack_edd_sort_by(){
				
		window.location.href = $("#knapstack_sort_downloads_by>option:selected").val();
		
		$(".knapstack-sorting-container").replaceWith('Sorting by ' + $("#knapstack_sort_downloads_by>option:selected").html()  + '...');
	}
	
	$('#knapstack_sort_downloads_by').change(function() {
		mp_knapstack_edd_sort_by();
	});
		
});