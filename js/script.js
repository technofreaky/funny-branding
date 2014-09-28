var custom_uploader;

jQuery(document).ready(function(){
	jQuery('div.alert > a.close').click(function(){
		jQuery(this).parent().fadeOut('slow',function(){
			jQuery(this).remove();
		});
	});

	//jQuery('div#adminmenuback').css('min-height',jQuery('div#adminmenuback').innerHeight()+'px');

    jQuery("input[data-img-select=true]").click(function(e){
        e.preventDefault();
		var InputTarget = '#'+jQuery(this).attr('data-target'); 
		custom_uploader = wp.media.frames.file_frame = wp.media({  title: 'Choose Image', button: {  text: 'Choose Image'  }, multiple: false });
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
			jQuery(InputTarget).val(attachment.url);
         });
        custom_uploader.open();		
    });
	
	jQuery('#navContainer > a').click(function(){
		var open_tab = jQuery(this).attr('data-nav');
		jQuery('#navContainer > a.nav-tab-active').removeClass('nav-tab-active');
		jQuery(this).addClass('nav-tab-active');
		jQuery('.tab.active').removeClass('active').fadeOut('fast',function(){
				jQuery('#'+open_tab).addClass('active').fadeIn('fast');	
				 
		});
	});
	
	jQuery('table#translations tr').find('.addmore').hide();
    jQuery('table#translations tr:last').find('.addmore').show();
    
    
	jQuery('table#translations').on('click','.addmore',function(){
		var Ccount = current + 1;
		var addMoreLayout = '<tr valign="top" id="'+Ccount+'"><td class="forminp forminp-select">'+ 
                            '<input id="trans['+Ccount+'][key]" class="regular-text" type="text" name="funnybranding[translate][trans]['+Ccount+'][key]" value="">'+
                    '</td> <td class="forminp forminp-select">'+
                    '<input id="trans['+Ccount+'][val]" class="regular-text" type="text" name="funnybranding[translate][trans]['+Ccount+'][val]" value="">'+
                    '</td> <td class="forminp forminp-select">'+
					' <button data-id="'+Ccount+'"  class="addmore button button-secondary" type="button" name="addmore"><i class="fa fa-plus fa-1x"></i> </button> <button data-id="'+Ccount+'"  class="delete button button-secondary" type="button" name="delete"><i class="fa fa-trash fa-1x"></i> </button>'+
					'</td></tr>';
		current = Ccount;
		jQuery('table#translations tr:last').after(addMoreLayout);
        jQuery('table#translations tr').find('.addmore').hide();
        jQuery('table#translations tr:last').find('.addmore').show();
	});
	
    
    jQuery('table#translations').on('click','.delete',function(){
        var delete_id = jQuery(this).attr('data-id');
        var r = confirm("Are you sure you want to delete !");
        if (r == true) {
            jQuery(this).parent().parent().fadeOut('fast',function(){
                jQuery(this).remove();
                jQuery('table#translations tr').find('.addmore').hide();
                jQuery('table#translations tr:last').find('.addmore').show();
            });
        } 	        
    });
	
	jQuery('input[type="checkbox"]').change(function(){
		if(jQuery(this).attr('checked')){ jQuery('input[name="'+jQuery(this).attr('id')+'"]').val('on'); return ;}
        else { jQuery('input[name="'+jQuery(this).attr('id')+'"]').val('');	return ;  }
	});
	
 	jQuery('input[type="checkbox"]').each(function(){
		var NewName = jQuery(this).attr('name');
		jQuery(this).parent().append('<input type="hidden" name="'+NewName+'" />');
		jQuery(this).removeAttr('name').attr('id',NewName);
		
		if(jQuery(this).attr('checked')){
			jQuery('input[name="'+jQuery(this).attr('id')+'"]').val('on');
			return ;
		} else {
			jQuery('input[name="'+jQuery(this).attr('id')+'"]').val('');
			return ;  
		}		
	});
    
    var myOptions = {
        defaultColor: true,
        change: function(event, ui){},
        clear: function() {},
        hide: true,
        palettes: true
    };
    
    jQuery('.post_status_color').wpColorPicker(myOptions);
    
    jQuery('.ps_color_status').change(function(){
        if(jQuery(this).attr('checked')){ jQuery('tr.custom_post_status_color').fadeIn('fast'); }
        else { jQuery('tr.custom_post_status_color').fadeOut('fast'); }
    });
    
	var switches = document.querySelectorAll('input[type="checkbox"]');
	for (var i=0, sw; sw = switches[i++]; ) {
		var div = document.createElement('div');
		div.className = 'switch';
		sw.parentNode.insertBefore(div, sw.nextSibling);
	}
    
}); 