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
 
?>

<table id="shortcode" class="tab hidden form-table">
	<tbody> 
      
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="webshot_code">Remote Web Screen Shot</label> </th>
			<td class="forminp forminp-select"> <label><input name="funnybranding[webshot_code]" id="web_shot" type="checkbox" class="ios-switch" <?php if(funnyBranding_setting('webshot_code',true)) {echo 'checked'; } ?> /> </label>
				<p class="description inline-block ">Take Website Screen Shot Using Short Code</p>
				<p class="description"> 
					How To Use : <code>[snap url="http://www.google.com" alt="Cool Site!" w="300px" h="300px"]</code>
					<br/>
					<code><strong>url </strong></code> = Website URL  <code><strong>alt </strong></code> = Text For Image <br/>
					<code><strong>w </strong></code> = Image Width  <code><strong>h </strong></code> = Image Height <br/>
					
				.</p>
			</td>
		</tr>
		
      
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="iframe_code">iFrame Shortcode</label> </th>
			<td class="forminp forminp-select"> <label><input name="funnybranding[iframe_code]" id="iframe_code" type="checkbox" class="ios-switch" <?php if(funnyBranding_setting('iframe_code',true)) {echo 'checked'; } ?> /> </label>
				<p class="description"> 
					How To Use : <code>[iframe href="http://www.exmaple.com" height="480" width="640"]</code>
									.</p>
			</td>
		</tr>		
		
		
      
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="rfilei_code">Remote File Include Shortcode</label> </th>
			<td class="forminp forminp-select"> <label><input name="funnybranding[rfilei_code]" id="rfilei_code" type="checkbox" class="ios-switch" <?php if(funnyBranding_setting('rfilei_code',true)) {echo 'checked'; } ?> /> </label>
				<p class="inline-block description">Easy to include remote file / doc with Shortcode</p>
				<p class="description">  How To Use : <code>[getfile fileurl="http://www.exmaple.com/somepage.html"]</code> .</p>
			</td>
		</tr>			
		
		
      
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="blogInfo">Get Blog / WP Info Shortcode</label> </th>
			<td class="forminp forminp-select"> <label><input name="funnybranding[blogInfo]" id="blogInfo" type="checkbox" class="ios-switch" <?php if(funnyBranding_setting('blogInfo',true)) {echo 'checked'; } ?> /> </label>
				<p class="inline-block description">Get Wordpress information using BlogInfo Shortcode</p>
				<p class="description">  How To Use : <code>[bloginfo key='name']</code>. <br/>
					For more Keys please refer <a href="http://codex.wordpress.org/Function_Reference/bloginfo">http://codex.wordpress.org/Function_Reference/bloginfo</a> 
				</p>
			</td>
		</tr>		
		
		
      
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="postInfo">Get Customfield Value Shortcode</label> </th>
			<td class="forminp forminp-select"> <label><input name="funnybranding[postInfo]" id="postInfo" type="checkbox" class="ios-switch" <?php if(funnyBranding_setting('postInfo',true)) {echo 'checked'; } ?> /> </label>
				<p class="inline-block description">Get Post / Page Custom Field Value Using Shortcode</p>
				<p class="description">  How To Use : <code>[field "my_key"]</code> or <code>[field "my_key" post_id=1]</code>. 			</p>
			</td>
		</tr>			
		<tr valign="top">
			<th class="titledesc" scope="row"> </th>
			<td class="forminp forminp-select">
				<input id="general_update" class="button button-primary" type="submit" value="Save Shortcode Settings" name="save_changes">
			</td>
		</tr>
		
	</tbody>
</table> 