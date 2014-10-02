<?php
/*  Copyright 2014  Varun Sridharan  (email : varunsridharan23@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/
defined('ABSPATH') or die("No script kiddies please!");
global $fyb_postTypes;

function fyb_all_custom_fields($fyb_allposts) {
    $fyb_customfields = array();
    foreach ( $fyb_allposts as $fyb_post ) : 
        setup_postdata($fyb_post);
        $fyb_post_id = $fyb_post->ID; 
 
        $fyb_fields = get_post_custom_keys($fyb_post_id);
        if ($fyb_fields) {
            foreach ($fyb_fields as $fyb_key => $fyb_value) {
                if ($fyb_value[0] != '_') { 
					 
					if(! isset($fyb_customfields[$fyb_value])){ 
						$fyb_customfields[$fyb_value] = array();
						#$fyb_customfields[$fyb_value]['html'] = '<option value="'.$fyb_value.'">'.$fyb_value.'</option>';
						$fyb_customfields[$fyb_value]['count'] = 1; 
						$fyb_customfields[$fyb_value]['userPost'] = array();
						$fyb_customfields[$fyb_value]['userPost'][] = $fyb_post->ID;
						$fyb_customfields[$fyb_value]['usedPostType'] = array();
						$fyb_customfields[$fyb_value]['usedPostType'][] = $fyb_post->post_type;
					} else {
						$fyb_customfields[$fyb_value]['count'] = $fyb_customfields[$fyb_value]['count'] + 1; 
						$fyb_customfields[$fyb_value]['userPost'][] = $fyb_post->ID;
						if(! in_array($fyb_post->post_type, $fyb_customfields[$fyb_value]['usedPostType'])){ 
							$fyb_customfields[$fyb_value]['usedPostType'][] = $fyb_post->post_type;
						}
					} 
				}
            }
        }
    endforeach; 
	wp_reset_postdata();
    return $fyb_customfields;
} 

$fyb_posttypeva = 'any'; 
$fyb_poststatusva =  array('publish','draft','pending','future'); 

if(isset($_POST['file_post'])){
	if(!empty($_POST['fyb_posttype'])){
		$fyb_posttypeva = $_POST['fyb_posttype'];
	} 
}

if(isset($_POST['resyncAll'])){
	$fyb_args = array( 'post_status' => $fyb_poststatusva, 'post_type' => $fyb_posttypeva, 'posts_per_page' => -1); 
	$fyb_allposts = get_posts($fyb_args);
	$fyb_customfields = fyb_all_custom_fields($fyb_allposts);	
	update_option('funnybranding_customFields',json_encode($fyb_customfields));	
	echo '<div class="alert alert-success"> <a class="close" data-dismiss="alert">×</a>
  <strong>Data Synchronize : </strong> New Result Updated In DB </div>';
}



if(get_option('funnybranding_customFields')){
	$fyb_customfields = json_decode(get_option('funnybranding_customFields'),true);
	
 
} else {
	$fyb_args = array( 'post_status' => $fyb_poststatusva, 'post_type' => $fyb_posttypeva, 'posts_per_page' => -1); 
	$fyb_allposts = get_posts($fyb_args);
	$fyb_customfields = fyb_all_custom_fields($fyb_allposts);	
	update_option('funnybranding_customFields',json_encode($fyb_customfields));
}

 
$fyb_post_stats = get_post_stati();
add_action ('admin_init','fyb_get_post_types', 199); 
 	
echo '<table class="tab form-table inline-block">';
    echo '<tr>';
        echo '<td>';
            echo 'Post Type : ';
        echo '</td>';
        echo '<td>';
            echo '<select name="fyb_posttype">';
                echo '<option value="">All</option>';
                foreach($fyb_postTypes as $fyb_ptk => $fyb_ptv) {
                    if($fyb_ptv == 'nav_menu_item' || $fyb_ptv == 'revision' || $fyb_ptv == 'attachment'){continue;}
                    echo '<option value="'.$fyb_ptv.'">'.$fyb_ptv.'</option>';
                }
            echo '</select>';
        echo '</td>'; 
 
        echo '<td>';
             echo '<input class="button button-primary" type="submit"  name="file_post" value="Filter Data">';
        echo '</td>';
 
        echo '<td>';
             echo '<input class="button button-primary" type="submit" name="resyncAll" value="Clear & Sync Again">';
        echo '</td>';
    echo '</tr>';
echo '</table>';   
?> 

<hr style="margin-bottom: 15px;"/>

<table id="custom_fieldTbl">
	<thead>
		<tr>
			<th>SN</th>
			<th>Name</th>
			<th>Total Usage</th>
			<th>Used Post Types</th>
			<th>View Post</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$i = 1; 
			foreach($fyb_customfields as $fybcfk => $fybcfv) {
				echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td>'.$fybcfk.'</td>';
					echo '<td>'.$fybcfv['count'].'</td>';
					echo '<td>'.implode(", ",$fybcfv['usedPostType']).'</td>';
					echo '<td><input href="#viewAllPost" class="viewpost button button-primary" data-custom_field="'.$fybcfk.'" type="button" value="View All Post" name="file_post"></td>';
					echo '<td>
						<button href="#editFiled"  data-custom_field="'.$fybcfk.'" class="editField button button-secondary" type="button" ><i class="fa fa-pencil fa-lg"></i> </button> 
						<button href="#deleteField"  data-custom_field="'.$fybcfk.'" class="deleteField button button-secondary" type="button" ><i class="fa fa-trash fa-lg"></i></button> 
						</td>';

				echo '</tr>';
				$i++;
			}
			unset($fyb_customfields);
		?>
	</tbody>
	
</table>

 

<script>
	var loadingHTML = '<div class="loader">'+
            '<h4>Loading Please Wait</h4>'+
            '<div class="bubble"></div>'+
            '<div class="bubble"></div>'+
            '<div class="bubble"></div>'+
            '<div class="bubble"></div>'+
        '</div>';
    
    var deleteHTML = '<table style="text-align: center;" id="confirmDelete">'+
			'<tr>'+
			'	<td colspan="2"><h4 style="margin:0;">Are You Sure Want Delete " <span id="filedname"></span> " </h4></td>'+
			'</tr>'+
			'<tr>'+
			'	<td><button onclick="javascript:jQuery.fn.custombox(\'close\');" class="button button-secondary">No !</button></td>'+
			'	<td><button id="cDelteCField" class="button button-primary">Yes Delete It</button></td>'+
			'</tr>'+
		'</table>';
	jQuery(document).ready(function(){ 
	
		jQuery('div#adminmenuback').css('min-height','0');
		jQuery('div#adminmenuback').css('height','auto');	
		jQuery('div#viewAllPost div.fyb-model-body').html(loadingHTML);
		jQuery('div#editFiled div.fyb-model-body').html(loadingHTML);
		
		jQuery('#custom_fieldTbl').dataTable({
			
			"initComplete": function(settings, json) {
				jQuery('#custom_fieldTbl').removeAttr('class');
                jQuery('#custom_fieldTbl th').removeAttr('style');
                jQuery('#custom_fieldTbl').css('float','left');
				jQuery('div#adminmenuback').css('min-height',jQuery('div#adminmenuback').innerHeight()+'px');
			},
			
			"drawCallback": function (settings, data) {
				
			   jQuery('button.deleteField').on('click', function ( e ) {
					var data_id =  jQuery(this).attr('data-custom_field');
                   
                    var dlg = jQuery("<div id='deleteField' />").html(loadingHTML).appendTo("body");
                    dlg.dialog({
                        dialogClass : '',
                        modal : true,
                        autoOpen : false,
                        closeOnEscape : true,
                        height: 'auto',
                        width: 'auto',
                        buttons : [{
                                text :  'Close',
                                class : 'button-primary',
                                click : function() {
                                    jQuery(this).dialog('close');
                                }
                            }
                        ]
                    }).dialog('open');                   

 
				   
					jQuery('div#deleteField button#cDelteCField').click(function(){
						var data_id =  jQuery(this).attr('data-delete');
						jQuery('div#deleteField table#confirmDelete').hide();
						jQuery('div#deleteField ').append(loadingHTML);
						jQuery('div#deleteField div.loader h4').text('Deleting Please Wait');
						jQuery.ajax({
							type: "POST",
							url: location.href,
							data: { fyb_cfld_delete:"yes",fyb_cf_val : data_id}
						}).done(function( msg ) {
							jQuery('div#deleteField div.loader').remove();
														
							if(msg.indexOf('success') != -1){
								jQuery('div#deleteField ').append('<h2>Changes Updated Successfully</h2> <h4>Please Re-Sync Data In Plugin </h4>');
							} else {
								jQuery('div#deleteField ').append('<h3>Failed To Updated Changes Due To : </h3><ul><li>1) Database Error </li> <li>2) Custom Filed Not Exist In The Given Name </li> </ul>');
							}							
						});


					});				   
				    e.preventDefault(); 
			   });	
				
				
				
				
				
				
			   jQuery('button.editField').on('click', function ( e ) {
				   
					var data_id =  jQuery(this).attr('data-custom_field');
					jQuery('div#editFiled .fyb-model-header > h3').text('Editing Custom Filed " '+ data_id + ' "');
					jQuery.ajax({
						type: "POST",
						url: location.href,
						data: { fyb_cfld_edit:"yes",fyb_cfld_name: data_id }
					}).done(function( msg ) {
					   jQuery('div#editBox').html(msg);
					}); 
				   
                    var dlg = jQuery("<div id='editBox' />").html(loadingHTML).appendTo("body");
                    dlg.dialog({
                        dialogClass : '',
                        modal : true,
                        autoOpen : false,
                        closeOnEscape : true,
                        height: 'auto',
                        width: 'auto',
                        buttons : [{
                                text :  'Close',
                                class : 'button-primary',
                                click : function() {
                                    jQuery(this).dialog('close');
                                }
                            }
                        ]
                    }).dialog('open');                   
                   
					/*jQuery.fn.custombox( this, { 
						cache:false,
						open:function(){ jQuery('body').css('overflow-y','hidden'); },
						close: function () {
							jQuery('div.fyb-model-body').html(loadingHTML);
							jQuery('body').css('overflow-y','scroll');
						}
					});	*/			   
				  e.preventDefault(); 
			   });
				
               
               jQuery('input.viewpost').on('click', function ( e ) {
					var data_id =  jQuery(this).attr('data-custom_field');
					jQuery('div#viewAllPost .fyb-model-header > h3').text('Showing Post For '+ data_id + ' Field');
					jQuery.ajax({
						type: "POST",
						url: location.href,
						data: { fyb_cfld_show:"yes",fyb_cfld_name: data_id }
					}).done(function( msg ) {
                       
					   jQuery('div#myFancyDialog').html(msg);
					});  
                    var dlg = jQuery("<div id='myFancyDialog' />").html(loadingHTML).appendTo("body");
                    dlg.dialog({
                        dialogClass : '',
                        modal : true,
                        autoOpen : false,
                        height: 'auto',
                        width: 'auto',                        
                        closeOnEscape : true,
                        buttons : [{
                                text :  'Close',
                                class : 'button-primary',
                                click : function() {
                                    jQuery(this).dialog('close');
                                }
                            }
                        ]
                    }).dialog('open');
					/*jQuery.fn.custombox( this, { 
						cache:false,
						open:function(){ jQuery('body').css('overflow-y','hidden'); },
						close: function () {
                            
							jQuery('div#viewAllPost  div.fyb-model-body').html(loadingHTML);
							jQuery('body').css('overflow-y','scroll');
                            
						}
					});*/
					e.preventDefault();
                });
				 

			}
		} );
    })
</script>