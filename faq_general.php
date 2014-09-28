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
global $fyb_faq_array;
$fyb_seqa = array();
$fyb_seqa['Howdy Text']  = 'You can change the text <code>Howdy</code> in the adminBar [Right Upper Corner] to any text like <code>welcome</code>'; 
$fyb_seqa['Footer Text']  = 'You can change the text <code>Thank you for creating with WordPress</code> in the wp-admin footer to any text like <code>Site Developed By xxxx</code>'; 
$fyb_seqa['Custom Favicon For Admin'] = 'You can have your own favicon for <strong>wp-admin</strong> by uploading your custom image or by selecting an image from media';
$fyb_seqa['Custom Dashboard Logo'] = 'You can change the default <strong>WP</strong> logo in admin bar with your own image by uploading or by selecting an image from media';
$fyb_seqa['Custom Avatars'] = 'We have some built in Avatars for user profile. if enabled you can see all the Avatars in <code>Settings -> Discussion</code>';
$fyb_seqa['Move Admin Bar Down'] = 'You can move the Admin Bar From Top to Bottom';
$fyb_seqa['Hide Wordpress Version'] = 'Will Remove Wordpress Version From <code>wp-admin</code> and from site\'s <code>Meta Tag</code> if enabled';
$fyb_seqa['Collapse Menu Bar'] = 'Will Keep the left side menu bar closed if enabled';
$fyb_faq_array['General'] = $fyb_seqa;
?>