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
$fyb_stcsqa = array();
$fyb_stcsqa['Website Screen Shot'] = '
You can Take Website Screen Shot Using  <strong> [snap] </strong> Short Code <br/> How To Use : <code>[snap url="http://www.google.com" alt="Cool Site!" w="300px" h="300px"]</code> <br> <code><strong>url </strong></code> = Website URL <br/>  <code><strong>alt </strong></code> = Text For Image <br>	<code><strong>w </strong></code> = Image Width <br/>  <code><strong>h </strong></code> = Image Height <br> If enabled you can see a google.com website screenshot below <br/> <code>'.do_shortcode('[snap url="http://www.google.com" alt="Testing ShortCode" w="300px" h="250px"]').'</code>';
$fyb_stcsqa['iFrame Shortcode'] = ' You can  add iFrame using short code  <strong> [iframe] </strong> Short Code <br/>
How To Use : <code>[iframe url="http://www.google.com"  w="300px" h="300px"]</code> <br> <code><strong>url </strong></code> = Website URL <br/> <code><strong>w </strong></code> = Width <br/>  <code><strong>h </strong></code> = Height ';
$fyb_stcsqa['Custom Field Value'] = 'Get Post, Page or custom post type  Custom Field Value Using Shortcode <br/> How To Use :-<br/> If You are using in post / page loop <code>[field "my_key"]</code><br/> or out of the loop <code>[field "my_key" post_id=1]</code>';

$fyb_stcsqa['Google Trends'] = 'This Google trends shortcode will embed a graph of any comma separated query you enter to display a trend over time. Make sure to add a + between multiple words that are part of a single query. By default the geolocation is set to United States so change geo praram for another location.';

$fyb_stcsqa['Google Chart'] = 'This shortcode will let you display a range of charts “lines, xyline, sparkline, meter, scatter, venn, pie, pie2d” See the below shortcode example of a 3D pie chart. Change the type attribute in your shortcode to specify the type of graph you wish to display.';

$fyb_stcsqa['Blog Info Shortcode'] = 'Get Wordpress information using BlogInfo Shortcode <br/> How To Use : <code>[bloginfo key=\'name\']</code> <br>For more Keys please refer <a href="http://codex.wordpress.org/Function_Reference/bloginfo">http://codex.wordpress.org/Function_Reference/bloginfo</a>';
$fyb_stcsqa['Blog Info Shortcode'] = 'Get users ip by using <code>[show_ip]</code>';
$fyb_faq_array['Shortcodes'] = $fyb_stcsqa;
?>