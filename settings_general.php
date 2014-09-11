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
<table id="general" class="tab active form-table">
	<tbody> 

		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="footer_verison_hide">Add Wordpress CodeX Form</label> </th>
			<td class="forminp forminp-select"> <label><input name="add_codex_search_form" id="add_codex_search_form" type="checkbox" class="ios-switch" <?php if(get_setting('add_codex_search_form',true)) {echo 'checked'; } ?> /> </label>
				<p class="inline-block description">adds search form to search in Wordpress CodeX.</p>
			</td>
		</tr>
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="custom_favicon">Custom Favicon for Admin</label> </th>
			<td class="forminp forminp-select"> <input id="custom_favicon" class="regular-text" type="text" value="<?php get_setting('custom_favicon'); ?>" name="custom_favicon">
				<p class="description">Enter custom favicon url.</p>
			</td>
		</tr>
		
		
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="footer_verison_hide">Hide Wordpress Version</label> </th>
			<td class="forminp forminp-select"> <label><input name="footer_verison_hide" id="footer_verison_hide" type="checkbox" class="ios-switch" <?php if(get_setting('footer_verison_hide',true)) {echo 'checked'; } ?> /> </label>
				<p class="inline-block description">Removes version info from wp-admin.</p>
			</td>
		</tr>
		
		
		
 		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="footer_text">Footer Text </label> </th>
			<td class="forminp forminp-select">
				<input id="footer_text" class="regular-text" type="text" value="<?php get_setting('footer_text'); ?>" name="footer_text">
				<p class="description">Enter custom text to display in admin footer or leave empty for default text <code>[HTML Tags Allowed]</code> </p>
			</td>
		</tr>
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="collapse_menu_bar">Collapse Menu Bar</label> </th>
			<td class="forminp forminp-select"> <label><input name="collapse_menu_bar" id="collapse_menu_bar" type="checkbox" class="ios-switch" <?php if(get_setting('collapse_menu_bar',true)) {echo 'checked'; } ?> /> </label>
				<p class="inline-block description">Keep Right Menu Bar Closed.</p>
			</td>
		</tr>
		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="web_shot">Remote Web Screen Shot</label> </th>
			<td class="forminp forminp-select"> <label><input name="web_shot" id="web_shot" type="checkbox" class="ios-switch" <?php if(get_setting('web_shot',true)) {echo 'checked'; } ?> /> </label>
				<p class="description">Take Website Screen Shot Using Short Code <br/>
					How To Use : <code>[snap url="http://www.google.com" alt="Cool Site!" w="300px" h="300px"]</code>
					<br/>
					<code><strong>url </strong></code> = Website URL <br/>
					<code><strong>alt </strong></code> = Text For Image <br/>
					<code><strong>w </strong></code> = Image Width <br/>
					<code><strong>h </strong></code> = Image Height <br/>
					
				.</p>
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

 