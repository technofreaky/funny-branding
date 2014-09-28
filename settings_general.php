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
<table id="general" class="tab active tab-table">
	<tbody> 
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="welcome_text">Howdy Text </label> </th>
			<td class="forminp forminp-select"> <input id="welcome_text" class="regular-text" type="text" value="<?php funnyBranding_setting('welcome_text'); ?>" name="funnybranding[general][welcome_text]">
				<p class="description  inline-block">Enter a custom text to change " Howdy ".</p>
			</td>
		</tr>
		
		
		
		
 		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="footer_text">Footer Text </label> </th>
			<td class="forminp forminp-select">
				<input id="footer_text" class="regular-text" type="text" value="<?php funnyBranding_setting('footer_text'); ?>" name="funnybranding[general][footer_text]">
				<p class="description inline-block">Custom text to display in admin footer or leave empty for default text <code>[HTML Tags Allowed]</code> </p>
			</td>
		</tr>
		
 
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="custom_favicon">Custom Favicon for Admin</label> </th>
			<td class="forminp forminp-select"> 
                
                <input data-target="custom_favicon" data-img-select="true"  class="button" type="button" value="Upload / Choose Image"  style=" vertical-align: middle;"/> or
                <input id="custom_favicon" type="text" size="36" name="funnybranding[general][custom_favicon]" placeholder="Enter Custom URL " value="<?php funnyBranding_setting('custom_favicon'); ?>" />
				<p class="description inline-block"> Enter custom favicon url.</p>
			</td>
		</tr>
		
		
 
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="custom_favicon">Custom Dashboard Logo</label> </th>
			<td class="forminp forminp-select"> 
                
                <input  data-target="custom_dashboard_logo" data-img-select="true" class="button" type="button" value="Upload / Choose Image"  style="    vertical-align: middle;"/> or
                <input id="custom_dashboard_logo" type="text" size="36" name="funnybranding[general][custom_dashboard_logo]" placeholder="Enter Custom URL " value="<?php funnyBranding_setting('custom_dashboard_logo'); ?>" />
				<p class="description inline-block"> Custom Dashboard Logo url.</p>
			</td>
		</tr>
		
		
 
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="adminBarmoveDown">Custom Avatars</label> </th>
			<td class="forminp forminp-select"> 
 				<label>
					<input name="funnybranding[general][custom_avatars]" type="checkbox" <?php fyb_chkbx('custom_avatars')?>/> 
				</label>
				<p class="description inline-block">Few Avatars Will Be Displayed Under <code>Settings -> Discussion</code></p>
			</td>
		</tr>		
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="adminBarmoveDown">Move Admin Bar Down</label> </th>
			<td class="forminp forminp-select"> 
 				<label>
					<input name="funnybranding[general][adminBarmoveDown]" type="checkbox" <?php fyb_chkbx('adminBarmoveDown')?>/> 
				</label>
			</td>
		</tr>

		
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="footer_verison_hide">Hide Wordpress Version</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[general][footer_verison_hide]" type="checkbox" <?php fyb_chkbx('footer_verison_hide')?>   />
				</label>
					<p class="inline-block description">Removes version info from wp-admin and also from site meta_tag.</p>
			</td>
		</tr>

		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="collapse_menu_bar">Collapse Menu Bar</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[general][collapse_menu_bar]" type="checkbox" <?php fyb_chkbx('collapse_menu_bar')?> /> 
				</label>
				<p class="inline-block description">Keep Right Menu Bar Closed.</p>
			</td>
		</tr>
 
		<tr valign="top">
			<th class="titledesc" scope="row"> </th>
			<td class="forminp forminp-select">
				<input id="general_update" class="button button-primary" type="submit" value="Save General Settings" name="save_changes">
			</td>
		</tr>
		
	</tbody>
</table>  