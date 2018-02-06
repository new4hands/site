/**
 * Instagram Gallery 1.4.1
 * script for insta-gallery wp plugin
 * 
 */

( function( $ ) {
	// load insta gallery content
	function load_ig_gallery(){
		$('.ig-block').each(function(){
			var $e = $(this);
			if($e.hasClass('ig-block-loaded')){
				return true;
			}else{
	        	$e.addClass('ig-block-loaded');
			}
			var $spinner = $e.find('.ig-spinner');
			var insgalid = parseInt($e.data('insgalid'));
			if(!$spinner.length || isNaN(insgalid)){
				return;
			}
			
			jQuery.ajax({
				url : insgalajax.ajax_url,
				type : 'post',
	            dataType: 'JSON',
				data : {
					action : 'load_ig_item',
					insgalid : insgalid
				},
				cache: true,
				beforeSend : function()
				{
					$spinner.show();
				},
				success : function( response ) {
					if((typeof response == 'undefined') || (response == null) || (response == 0)) return;
					if ((typeof response === 'object') && response.success) {
	                    if (response.data) {
	        				$e.append( response.data );
	                    }
	                }
				}
			}).fail(function (jqXHR, textStatus) {
	            console.log(textStatus);
	        }).always(function()
			{
				$spinner.hide();
				if($e.find('.instagallery-actions').length){
					$spinner.prependTo($e.find('.instagallery-actions'));
				}
			});
		});
	}
	
	// start loading as the script loaded
	if($('.ig-block').length){
		load_ig_gallery();
	}
	
	jQuery(function($){
		load_ig_gallery();
	});
		
} )( jQuery );

