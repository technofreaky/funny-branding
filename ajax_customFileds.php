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

require_once(ABSPATH.'wp-includes/pluggable.php');
$fyb_cfaj_js = json_decode(get_option('funnybranding_customFields'),true);
$fyb_rq_cf = $_REQUEST['fyb_cfld_name'];
$fyb_cf_r = $fyb_cfaj_js[$fyb_rq_cf]; 
unset($fyb_cfaj_js);
$fyb_post_json = '';
$fyb_post_count = 1;
foreach ($fyb_cf_r['userPost'] as $fyb_used_post){
	
	$post_7 = get_post($fyb_used_post);
	$fyb_post_json_tmp = '<tr>';
		$fyb_post_json_tmp .= '<td> <a  target="_blank"  href="'.get_edit_post_link($fyb_used_post,'display').'" > '.$post_7->post_title.' </a> </td>';
		$fyb_post_json_tmp .= '<td>'.$post_7->post_status.'</td>';
		$fyb_post_json_tmp .= '<td>'.$post_7->post_type.'</td>';
        $fyb_post_json_tmp .= '<td>'.$post_7->post_date.'</td>';
        $fyb_post_json_tmp .= '<td>'.$post_7->post_modified.'</td>';
		 
	$fyb_post_json_tmp .= '</tr>';
	$fyb_post_json .= $fyb_post_json_tmp;
	$fyb_post_count++;
	unset($fyb_post_json_tmp);
} 
?> 
<table class="Single_CF_listing" data-id="Single_CF_listing" >
	<thead>
		<tr>
			<th>Name</th>
			<th>Status</th>
			<th>Type</th>
            <th>Created</th>
            <th>Modified</th> 
		</tr>
	</thead>
	<tbody>

		<?php echo $fyb_post_json; ?>
	</tbody>
	
</table>
<br/><br/>
 
<script>
 
jQuery(document).ready(function(){
	
       jQuery('.Single_CF_listing').dataTable({
		"initComplete": function(settings, json) {
			jQuery('table[data-id=Single_CF_listing]').removeAttr('class').addClass('inline-block').css('width','100%');
			jQuery('table[data-id=Single_CF_listing] th').removeAttr('style'); 
			 
		},		
	});
});
</script>