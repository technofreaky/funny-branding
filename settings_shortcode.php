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

<h2 id="navContainer" class="nav-tab-wrapper woo-nav-tab-wrapper">
	<a data-nav="post_shortcode" class="nav-tab nav-tab-active"  >Post / Pages</a>
	<a data-nav="utilites" class="nav-tab " >Utilites</a> 
</h2>

<table id="post_shortcode" class="tab active tab-table">
	<tbody> 
      
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="webshot_code">Website Screen Shot</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[shortcode][webshot_code]"  type="checkbox" <?php fyb_chkbx('webshot_code') ?> /> 
				</label> 
				<p class="description"> 
					How To Use : <code>[snap url="http://www.google.com" alt="Cool Site!" w="300px" h="300px"]</code> </p>
			</td>
		</tr>
		
      
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="iframe_code">iFrame Shortcode</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[shortcode][iframe_code]" type="checkbox" <?php fyb_chkbx('iframe_code') ?> /> 
				</label>
				<p class="description"> How To Use : <code>[iframe url="http://www.exmaple.com" h="480" w="640"]</code> .</p>
			</td>
		</tr>		
 

		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="postInfo">Custom Field Value </label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[shortcode][postInfo]" type="checkbox"   <?php fyb_chkbx('postInfo') ?>/>
				</label> 
				<p class="description">  How To Use : <code>[field "my_key"]</code> or <code>[field "my_key" post_id=1]</code>. </p>
			</td>
		</tr>
        
       
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="blogInfo">Google Trends</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[shortcode][fyb_google_trends]" type="checkbox"  <?php fyb_chkbx('fyb_google_trends') ?> />
				</label> 
				<p class="description">  How To Use : <code>[trends h="450" w="500" q="wpsnipp,wordpress,+wordpress+theme,+wordpress+plugin,+wordpress+snippets" geo="US"]</code>.  
				</p>
			</td>
		</tr>
        
       
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="blogInfo">Google charts</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[shortcode][fyb_google_chart]" type="checkbox"  <?php fyb_chkbx('fyb_google_chart') ?> />
				</label> 
				<p class="description">  How To Use : <code>[chart data="41,37.89" labels="Reffering+sites|Search+Engines"  colors="ff0000,005599" size="488x200" title="Traffic  Sources" type="pie"]</code>.  
				</p>
			</td>
		</tr>        
        
	</tbody>
</table>   
<table id="utilites" class="tab hidden tab-table">
	<tbody> 
      
		   
      
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="blogInfo">Blog Info Shortcode</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[shortcode][blogInfo]" type="checkbox"  <?php fyb_chkbx('blogInfo') ?> />
				</label> 
				<p class="description">  How To Use : <code>[bloginfo key='name']</code>. <br/>
					For more Keys please refer <a href="http://codex.wordpress.org/Function_Reference/bloginfo">http://codex.wordpress.org/Function_Reference/bloginfo</a> 
				</p>
			</td>
		</tr>		
 
		<tr valign="top">
			<th class="titledesc" scope="row"> <label for="blogInfo">Get User IP</label> </th>
			<td class="forminp forminp-select"> 
				<label>
					<input name="funnybranding[shortcode][user_ip]" type="checkbox"  <?php fyb_chkbx('user_ip') ?> />
				</label> 
				<p class="description">  How To Use : <code>[show_ip]</code>.</p>
			</td>
		</tr>		
	</tbody>
</table>

<input id="general_update" class="button button-primary" type="submit" value="Save Shortcode Settings" name="save_changes">