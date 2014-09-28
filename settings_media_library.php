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
defined('ABSPATH') or die("No script kiddies please!"); ?>
<div id="mediaLib" class="tab tab-table hidden">
    <table class="tab-table">
        <tbody>  
            
            <tr valign="top">
                <th class="titledesc" scope="row"> <label for="smtp_is_html">Show Image Metadata in Library</label> </th>
                <td class="forminp forminp-select"> 
                    <label>
                        <input name="funnybranding[postpage][media_meta_info]" type="checkbox" <?php fyb_chkbx('media_meta_info') ?> />
                    </label>
                </td>
            </tr> 		 
 		       
        </tbody>
    </table>
     
        <tbody>
            <tr valign="top">
                <th class="titledesc" scope="row"> </th>
                <td class="forminp forminp-select">
                    <input id="general_update" class="button button-primary" type="submit" value="Save Media Library Settings" name="save_changes">
                </td>
            </tr>       
        </tbody>
    </table>
</div>