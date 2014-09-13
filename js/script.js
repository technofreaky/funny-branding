jQuery(document).ready(function(){
	
	jQuery('div.alert > a.close').click(function(){
		
		jQuery(this).parent().fadeOut('slow',function(){
			jQuery(this).remove();
		})
	});
	jQuery('#navContainer > a').click(function(){
		var open_tab = jQuery(this).attr('data-nav');
		jQuery('#navContainer > a.nav-tab-active').removeClass('nav-tab-active');
		jQuery(this).addClass('nav-tab-active');
		jQuery('.tab.active').removeClass('active').fadeOut('fast',function(){
			
				jQuery('#'+open_tab).addClass('active').fadeIn('fast');	
		});
		
	});
	
	
	jQuery('input#addmore').click(function(){
		var Ccount = current + 1;
		var addMoreLayout = '<tr valign="top"><td class="forminp forminp-select">'+
			
 					'<input id="trans['+Ccount+'][key]" class="regular-text" type="text" name="funnybranding[trans]['+Ccount+'][key]" value="">'+
			
					'</td> <td class="forminp forminp-select text-center"> ==> </td> <td class="forminp forminp-select">'+
			
					'<input id="trans['+Ccount+'][val]" class="regular-text" type="text" name="funnybranding[trans]['+Ccount+'][val]" value="">'+
			
					'</td> <td class="forminp forminp-select">'+
					'<input id="delete" class="button button-secondary" type="button" value="Delete" name="delete">'+
					'</td></tr>';
		current = Ccount;
		jQuery(this).parent().parent().before(addMoreLayout);
		
		jQuery('table#translations td').on('click','input#delete',function(){
		 
		var r = confirm("Are you sure you want to delete !");
		if (r == true) {
			jQuery(this).parent().parent().fadeOut('slow',function(){
				jQuery(this).remove();
			});
		} 
		
		});
		
	});
	
	jQuery('table#translations td').on('click','input#delete',function(){
		 
		var r = confirm("Are you sure you want to delete !");
		if (r == true) {
			jQuery(this).parent().parent().fadeOut('slow',function(){
				jQuery(this).remove();
			});
		} 
		
	});
	
	var switches = document.querySelectorAll('input[type="checkbox"].ios-switch');

	for (var i=0, sw; sw = switches[i++]; ) {
		var div = document.createElement('div');
		div.className = 'switch';
		sw.parentNode.insertBefore(div, sw.nextSibling);
	}
 
}); 