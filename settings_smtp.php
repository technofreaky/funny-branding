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
<table id="smtp" class="tab tab-table hidden">
	<tbody> 
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_status">Use SMTP</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[smtp][smtp_status]" type="checkbox" <?php fyb_chkbx('smtp_status') ?> /> 
				</label>
				 
			</td>
		</tr>
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_is_html">SMTP is HTML</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[smtp][smtp_is_html]" type="checkbox" <?php fyb_chkbx('smtp_is_html') ?> />
				</label>
			</td>
		</tr>
		
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_auth">SMTP Auth</label> </th>
			 
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[smtp][smtp_auth]" type="checkbox" <?php fyb_chkbx('smtp_auth') ?> />
				</label>
				 
			</td>
		</tr>		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_host">SMTP Host</label> </th>
			<td class="forminp forminp-select">
				<input id="smtp_host" class="regular-text" type="text" value="<?php funnyBranding_setting('smtp_host'); ?>" name="funnybranding[smtp][smtp_host]">
 			</td>
		</tr>		

		
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_port">SMTP port</label> </th>
			<td class="forminp forminp-select"> <input id="smtp_port" class="regular-text" type="text" value="<?php funnyBranding_setting('smtp_port'); ?>" name="funnybranding[smtp][smtp_port]">				 
			</td>
		</tr>
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_username">SMTP Username</label> </th>
			<td class="forminp forminp-select"> <input id="smtp_username" class="regular-text" type="text" value="<?php funnyBranding_setting('smtp_username'); ?>" name="funnybranding[smtp][smtp_username]">				 
			</td>
		</tr>
		
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_password">SMTP Password</label> </th>
			<td class="forminp forminp-select"> <input id="smtp_password" class="regular-text" type="text" value="<?php funnyBranding_setting('smtp_password'); ?>" name="funnybranding[smtp][smtp_password]">				 
			</td>
		</tr>		
	
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_secure">SMTP Secure Type</label> </th>
			<td class="forminp forminp-select"> <input id="smtp_secure" class="regular-text" type="text" value="<?php funnyBranding_setting('smtp_secure'); ?>" name="funnybranding[smtp][smtp_secure]">				 
			</td>
		</tr>
	
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_fromid">From Email ID</label> </th>
			<td class="forminp forminp-select"> <input id="smtp_fromid" class="regular-text" type="text" value="<?php funnyBranding_setting('smtp_fromid'); ?>" name="funnybranding[smtp][smtp_fromid]">				 
			</td>
		</tr>
	
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="smtp_from_name">From Name</label> </th>
			<td class="forminp forminp-select"> <input id="smtp_from_name" class="regular-text" type="text" value="<?php funnyBranding_setting('smtp_from_name'); ?>" name="funnybranding[smtp][smtp_from_name]">				 
			</td>
		</tr>		 
		
 		<tr valign="top">
			<th class="titledesc" scope="row"> </th>
			<td class="forminp forminp-select">
				<input id="smtp_update" class="button button-primary" type="submit" value="Save SMTP Settings" name="save_changes">
			</td>
		</tr>
		
	</tbody>
</table>