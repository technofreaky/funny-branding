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
$fyb_tlsqa = array();

$fyb_tlsqa['What is Custom Translations'] = 'You can change the text which are dynimicaly generated. for eg you can change <code>Posts</code> as <code>My Book </code>. <br/> add <code>Posts</code> in <strong>Existing String</strong> and add <code>My Book</code> in <strong>New String</strong>';
  
 
$fyb_tlsqa['Given Text Not Getting Changed'] = 'If your text is not getting changed. may be the orginal text is called individually. <br/>  For eg if you need to  change <strong>First Name</strong> which could be called as <code><strong>First</strong></code>,<code><strong>Name</strong></code> ';


$fyb_faq_array['Translations'] = $fyb_tlsqa;
?>