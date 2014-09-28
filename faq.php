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
global $fyb_path;
$fyb_faq_array = array();
// Add Few Sections
$fyb_faq_array['General'] = array();
$fyb_faq_array['Login Page'] = array();
$fyb_faq_array['Post Page'] = array();
$fyb_faq_array['SMTP Config'] = array();
$fyb_faq_array['Shortcodes'] = array();
$fyb_faq_array['Translations'] = array();

#$fyb_faq_array['Custom Translations'] = array();


$fyb_tab_layout = '<h2 id="navContainer" class="nav-tab-wrapper woo-nav-tab-wrapper">';
$fyb_faq_layout = '';

foreach($fyb_faq_array as $fyb_key => $fyb_val)  { 
    $fyb_search = array(" ", "/");
    $fyb_sreplace = '_';
    $fyb_replaced = str_replace($fyb_search,$fyb_sreplace,strtolower($fyb_key));
    
    require_once($fyb_path.'faq_'.$fyb_replaced.'.php'); 
    $fyb_id = 'faq_'.$fyb_replaced;
    $fyb_tab_layout .= '<a data-nav="'.$fyb_id.'" class="nav-tab"  >'.$fyb_key.'</a> '; 
    $fyb_faq_layout .= '<div id="'.$fyb_id.'" class="tab hidden tab-table">';
    $fyb_tbl = array();
    
    foreach($fyb_faq_array[$fyb_key] as $fyb_k => $fyb_v) {
        $fyb_tbl[] = ' <table> <tr> <th>Question ?</th> <td>'.$fyb_k.'</td> </tr> <tr> <th>Answer </th> <td>'.$fyb_v.'</td> </tr> </table> ';
    }
    $fyb_faq_layout .=  implode('<hr/>',$fyb_tbl);
    $fyb_faq_layout .= '</div>';
    
}
$fyb_tab_layout .= '</h2>';

echo $fyb_tab_layout;
echo $fyb_faq_layout;

?>

<style>
th{
text-align: left;
width: 90px;
}
</style>

<script>
jQuery(document).ready(function(){
    jQuery('a[data-nav=faq_general]').addClass('nav-tab-active');
    jQuery('div#faq_general').addClass('active').removeClass('hidden');
});
</script>