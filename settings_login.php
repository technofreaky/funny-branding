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
<table id="login" class="tab tab-table hidden" style="width:100%;">
	<tbody> 
        
        <tr valign="top">
			<th class="titledesc" scope="row"> <label for="footer_verison_hide">Disable Shake Effect</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[login][disable_login_shake_effect]" type="checkbox" <?php fyb_chkbx('disable_login_shake_effect') ?> /> 
				</label>
				<p class="inline-block description">Disable Shake Effect in login page when invalid login is given.</p>
			</td>
		</tr>
        
        
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="login_redirect_url">Login Redirect URL </label> </th>
			<td class="forminp forminp-select">
				<input id="login_redirect_url" class="regular-text" type="text" value="<?php funnyBranding_setting('login_redirect_url'); ?>" name="funnybranding[login][login_redirect_url]">
				<p class="description">Custom url to redirect user after login</p>
			</td>
		</tr>
        
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="register_success_redirect_url">Registration Success Redirect URL </label> </th>
			<td class="forminp forminp-select">
				<input id="register_success_redirect_url" class="regular-text" type="text" value="<?php funnyBranding_setting('register_success_redirect_url'); ?>" name="funnybranding[login][register_success_redirect_url]">
				<p class="description">Custom url to redirect user after login</p>
			</td>
		</tr>
        
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="auto_logout_time">Auto Logout Time </label> </th>
			<td class="forminp forminp-select">
				<input id="auto_logout_time" class="regular-text" type="text" value="<?php funnyBranding_setting('auto_logout_time'); ?>" name="funnybranding[login][auto_logout_time]">
				<p class="description">Enter auto logout time in seconds</p>
			</td>
		</tr>		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="login_page_style">Login Page Style </label> </th>
			<td class="forminp forminp-select">
 
				<textarea rows="5" cols="39" id="login_page_style" name="funnybranding[login][login_page_style]" class="regular-text"><?php  echo  funnyBranding_setting('login_page_style'); ?></textarea>
				<p class="description">Enter your custom style for login page <br/> <strong>Note : </strong> Do not enter style code with <code>style tag</code></p>
				
			</td>
		</tr>
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="footer_verison_hide">Use jQuery In Login Page</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[login][user_jquery_login_page]" type="checkbox" <?php fyb_chkbx('user_jquery_login_page') ?>  /> 
				</label>
				<p class="inline-block description">add jQuery Library to WordPress Login page.</p>
			</td>
		</tr>		
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="login_page_script">Login Page Script </label> </th>
			<td class="forminp forminp-select">
 
				<textarea rows="5" cols="39" id="login_page_script" name="funnybranding[login][login_page_script]" class="regular-text"><?php echo funnyBranding_setting('login_page_script');?></textarea>
				<p class="description">Enter your custom script for login page <br/> <strong>Note : </strong> Do not enter script code with <code>script tag</code></p>
			</td>
		</tr>
 		<tr valign="top">
			<th class="titledesc" scope="row"> </th>
			<td class="forminp forminp-select">
				<input id="login_update" class="button button-primary" type="submit" value="Save Login Settings" name="save_changes">
			</td>
		</tr>
		
	</tbody>
</table>