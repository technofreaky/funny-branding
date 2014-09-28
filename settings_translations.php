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
$fyb_total = 0;

function fyb_give_layout($fyb_k,$value){
return '<tr id="'.$fyb_k.'" valign="top">
		<td class="forminp forminp-select">
			<input id="trans['.$fyb_k.'][key]" class="regular-text" type="text" value="'.@$value['key'].'" name="funnybranding[translate][trans]['.$fyb_k.'][key]">
		</td>
		 
		<td class="forminp forminp-select">
			<input id="trans['.$fyb_k.'][val]" class="regular-text" type="text" value="'.@$value['val'].'" name="funnybranding[translate][trans]['.$fyb_k.'][val]">
		</td>
		<td class="forminp forminp-select"> 
            <button data-id="'.$fyb_k.'" class="addmore button button-secondary" type="button" name="addmore"><i class="fa fa-plus fa-1x"></i>
</button>
            <button data-id="'.$fyb_k.'" class="delete button button-secondary" type="button" name="delete"><i class="fa fa-trash fa-1x"></i>
</button>

		</td>
	</tr>';
}    

if(funnyBranding_setting('trans',true)){
$fyb_trans = array_values(funnyBranding_setting('trans',true));
$fyb_total = count($fyb_trans);
$fyb_layout = '';
$fyb_count = 0;


    
foreach($fyb_trans as $fyb_k => $fyb_tra){
 	$fyb_layout .= fyb_give_layout($fyb_count,$fyb_tra);
    $fyb_count++; 
}

} else  {
$fyb_layout = fyb_give_layout(1,'');		
}
?>
<div  id="translate" class="tab tab-table">


    <table id="translations" class="tab tab-table">
        <tbody> 

            <tr valign="top">
                <th class="titledesc" scope="row">Existing String</th>
                <th class="titledesc" scope="row">New String</th>
                <th class="titledesc" scope="row">Options</th>
            </tr>
            <?php echo $fyb_layout; ?>

        </tbody>
    </table>
    <input id="trans_update" class="button button-primary" type="submit" value="Save Translations" name="save_changes">
</div>
<script>
var current = <?php echo $fyb_total; ?>;
</script>