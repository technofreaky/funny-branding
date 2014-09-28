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
<div id="postpage" class="tab tab-table hidden">
    <table class="tab-table">
        <tbody> 
            <tr valign="top">
                <th class="titledesc" scope="row"> <label for="smtp_is_html">Auto Twitter Username Linking</label> </th>
                <td class="forminp forminp-select">  
                    <select name="funnybranding[postpage][twitter_linking]" >
                        <?php
                            $fyb_twt_sel = '<option value="">Off</option>
                                            <option value="both">Post,Page & Comments</option>
                                            <option value="postpages">Only Post & Page</option>
                                            <option value="comments">Only Comments</option> ';
                            $fyb_twt_search = 'value="'.funnyBranding_setting( 'twitter_linking',true).'"';
                            $fyb_twt_replace = $fyb_twt_search.' selected';
                            echo str_replace($fyb_twt_search,$fyb_twt_replace,$fyb_twt_sel);
                        ?>
                    </select> 
                    <p class="inline-block description">Automatically Link's Twitter Usernames in WordPress content</p>
                </td>
            </tr>



            <tr valign="top">
                <th class="titledesc" scope="row"> <label for="smtp_is_html">Add Social Share in</label> </th>
                <td class="forminp forminp-select">  
                    <select name="funnybranding[postpage][add_social_share]" >
                        <?php
                            $fyb_twt_sel = '<option value="">Off</option>
                                            <option value="both">Post,Page & RSS Feeds</option>
                                            <option value="postpages">Only Post & Page</option>
                                            <option value="comments">Only RSS Feeds</option> ';
                            $fyb_twt_search = 'value="'.funnyBranding_setting( 'add_social_share',true).'"';
                            $fyb_twt_replace = $fyb_twt_search.' selected';
                            echo str_replace($fyb_twt_search,$fyb_twt_replace,$fyb_twt_sel);
                        ?>
                    </select> 
                    <p class="inline-block description">Automatically Link's Twitter Usernames in WordPress content</p>
                </td>
            </tr> 

            <tr valign="top">
                <th class="titledesc" scope="row"> <label for="smtp_is_html"> Post Thumbnails in RSS Feeds</label> </th>
                <td class="forminp forminp-select"> 
                    <label>
                        <input name="funnybranding[postpage][thumbnails_rss_feeds]" type="checkbox" <?php fyb_chkbx('thumbnails_rss_feeds') ?> />
                    </label>
                </td>
            </tr> 	


            <tr valign="top">
                <th class="titledesc" scope="row"> <label for="smtp_is_html">Generate Link QrCode</label> </th>
                <td class="forminp forminp-select"> 
                    <label>
                        <input name="funnybranding[postpage][link_qrcode]" type="checkbox" <?php fyb_chkbx('link_qrcode') ?> />
                    </label>
                </td>
            </tr>
            
            <tr valign="top">
                <th class="titledesc" scope="row"> <label for="smtp_is_html">Add Post Thumbnail Section</label> </th>
                <td class="forminp forminp-select"> 
                    <label>
                        <input name="funnybranding[postpage][add_post_thumbnail_section]" type="checkbox" <?php fyb_chkbx('add_post_thumbnail_section') ?> />
                    </label>
                </td>
            </tr> 		 
            <tr valign="top">
                <th class="titledesc" scope="row"> <label >Custom Excerpt Length</label> </th>
                <td class="forminp forminp-select"> 
                    <input class="regular-text" type="text" value="<?php funnyBranding_setting('custom_excerpt_length'); ?>" name="funnybranding[postpage][custom_excerpt_length]">				 
                </td>
            </tr>

            <tr valign="top">
                <th class="titledesc" scope="row"> <label >Customize Excerpt More</label> </th>
                <td class="forminp forminp-select">
                    <input class="regular-text" type="text" value="<?php funnyBranding_setting('custom_excerpt_more'); ?>" name="funnybranding[postpage][custom_excerpt_more]">				 
                </td>
            </tr>		       
        </tbody>
    </table>
        
    <?php 
    $fyb_class = '';
    $fyb_ex_color = funnyBranding_setting('ps_color',true);
    if(! funnyBranding_setting('ps_color_status',true)) {$fyb_class = 'hidden'; } 
    echo '<table class="inline-block"> ';
        echo '<thead>';
            echo '<tr>';
                echo '<td colspan="2">Add Post Status Colour</td>'; 
            echo '</tr>';
            echo '<tr>';
                echo '<th>Status Name </th>';
                echo '<th>Color </th>'; 
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            echo '<tr valign="top">';
                echo '<td class="titledesc" scope="row"> <label for="smtp_is_html">Custom Post Status Color</label> </td>';
                echo '<td colspan="2" class="forminp forminp-select"> ';
                    echo '<label>';
                    ?>
                     <input class="ps_color_status" name="funnybranding[postpage][ps_color_status]" type="checkbox" <?php fyb_chkbx('ps_color_status') ?> />
                    <?php
                       
                   echo ' </label>';
                   
                echo '</td>';
            echo '</tr> ';
            foreach(get_post_stati() as $fyb_psK => $fyb_psV){
                if($fyb_psK == 'auto-draft' || $fyb_psK == 'inherit' || $fyb_psK == 'future')
                    continue;
                
                echo '<tr class="'.$fyb_class.' custom_post_status_color">';
                    echo '<td>'.$fyb_psV.'</td>';
                    echo '<td><input data-default-color="" value="'.@$fyb_ex_color[$fyb_psV].'" type="text" name="funnybranding[postpage][ps_color]['.$fyb_psV.']" class="post_status_color regular-text" /></td>';
                echo '</tr>';
            }
        echo '</tbody>';
    
    echo '</table>';
    ?>
    
        <tbody>
            <tr valign="top">
                <th class="titledesc" scope="row"> </th>
                <td class="forminp forminp-select">
                    <input id="general_update" class="button button-primary" type="submit" value="Save Post/Page Settings" name="save_changes">
                </td>
            </tr>       
        </tbody>
    </table>
</div>