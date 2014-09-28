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
$fyb_popaqa = array();
$fyb_popaqa['Default Content'] = 'You can set a default content for all your post types';
$fyb_popaqa['Auto Twitter Username Linking'] = 'Automatically Link\'s Twitter Usernames in WordPress content when username found like <code>@username</code> <br/>
Eg : <code>thanks for this code by @varunsridharan</code>  <br/>
Will be turned in to <code>thanks for this code by &lt;a href=&quot;http://twitter.com/varunsridharan&quot;&gt;@varunsridharan&lt;/a&gt;</code>. you can also select where to add enable [Post,Page & Comments] ';
$fyb_popaqa['Add Social Share in'] = 'Automatically adds <strong>Facebook</strong> and <strong>Twitter</strong> in [Post,Page & Rss]. you can write your own style using these classes [share_container,share,fb_share,tw_share]';
$fyb_popaqa['Post Thumbnails in RSS Feeds'] = 'Adds post thumbnail in rss if exist';
$fyb_popaqa['Add Post Thumbnail Section'] = 'Adds post thumbnail colum in post / page listing view. and show\'s if thumbnail image if exist.';
$fyb_popaqa['Generate Link QrCode'] = 'Will add a seperate colum in post / page listing which will have the post view link as qr code. <br/> to show in your custom post lising page please add the blow code to your theme\'s <strong>functions.php</strong> <br/> <code>add_filter( \'manage_<postname>_columns\', \'fyb_AddQrColumn\' );   add_action(\'manage_<postname>_custom_column\', \'fyb_AddQrValue\', 10, 2 );
    </code>  <br/> replace <strong> &lt;postname&gt; </strong> with your custom post type name..
To Add In Movies Post Type Use The Blow Code <br/> <code>add_filter( \'manage_movies_columns\', \'fyb_AddQrColumn\' ); add_action(\'manage_movies_custom_column\', \'fyb_AddQrValue\', 10, 2 );
    </code>


';
$fyb_popaqa['Post Status Colour'] = 'Will change the background colors of the post / page within the admin based on the current status. Draft, Pending, Published, Future, Private.';

$fyb_popaqa['Custom Excerpt Length'] = 'You can change the length from 55 to any number.. 55 is default';
$fyb_popaqa['Custom Excerpt More'] = 'You can change the continue code from <code><strong>...</strong></code>';
$fyb_faq_array['Post Page'] = $fyb_popaqa;
?>