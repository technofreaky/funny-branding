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
$total = 0;
if(get_setting('trans',true)){
$trans = array_values(get_setting('trans',true));
$total = count($trans);
$layout = '';


foreach($trans as $k => $tra){
 
	$layout .= '<tr valign="top">
		<td class="forminp forminp-select">
			<input id="trans['.$k.'][key]" class="regular-text" type="text" value="'.$tra['key'].'" name="trans['.$k.'][key]">
		</td>
		<td class="forminp forminp-select text-center"> ==> </td>
		<td class="forminp forminp-select">
			<input id="trans['.$k.'][val]" class="regular-text" type="text" value="'.$tra['val'].'" name="trans['.$k.'][val]">
		</td>
		<td class="forminp forminp-select">
			<input id="delete" class="button button-secondary" type="button" value="Delete" name="delete">
		</td>
	</tr>';	
}

} else  {
$layout .= '<tr valign="top">
		<td class="forminp forminp-select">
			<input id="trans[0][key]" class="regular-text" type="text" name="trans[0][key]">
		</td>
		<td class="forminp forminp-select text-center"> ==> </td>
		<td class="forminp forminp-select">
			<input id="trans[0][val]" class="regular-text" type="text"  name="trans[0][val]">
		</td>
		<td class="forminp forminp-select">
			<input id="delete" class="button button-secondary" type="button" value="Delete" name="delete">
		</td>
	</tr>';		
}


?>
<table id="translations" class="tab form-table hidden">
	<tbody> 
		<tr valign="top">
			<th class="titledesc" scope="row"> Old String</th>
			<th class="titledesc" scope="row">  </th>
			<th class="titledesc" scope="row"> New String</th>
			<th class="titledesc" scope="row">Option</th>
		</tr>
		<?php echo $layout; ?>
 		<tr valign="top">
			<th class="titledesc" scope="row"> <input id="addmore" class="button button-secondary" type="button" value="Add More" name="addmore"></th>
			<td class="forminp forminp-select">
				<input id="trans_update" class="button button-primary" type="submit" value="Save Translations" name="save_changes">
			</td>
		</tr>
		
	</tbody>
</table>
 
<script>
var current = <?php echo $total; ?>;
</script>