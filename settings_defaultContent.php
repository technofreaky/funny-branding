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

global $fyb_postTypes,$fyb_funnybranding_settings;
$fyb_defaultContent = funnyBranding_setting('defaultContent',true);
add_action ('admin_init','fyb_get_post_types', 199);


?>

<div id="customcontent" class="tab form-table hidden">

			<?php
				foreach($fyb_postTypes as $fyb_postKey => $fyb_postVal) {
					if($fyb_postKey == 'nav_menu_item' || $fyb_postKey == 'revision' || $fyb_postKey == 'attachment'){continue;}
					echo '<h3>Default Content For <strong> "'.$fyb_postKey.'" </strong> </h3><table > <tr><td><div class="defaultContentContainer"> ';
						#echo '<span class=""> </span>';
						echo '<textarea  name="funnybranding[dcontent][defaultContent]['.$fyb_postKey.']" >'.@$fyb_defaultContent[$fyb_postKey].'</textarea>';
						
					echo '<div/> </td> </tr> </table>';
                    echo ' <hr/>  ';
				}
			?>		
			
		
    
    <input id="general_update" class="button button-primary" type="submit" value="Save Default Content" name="save_changes" />
</div>
