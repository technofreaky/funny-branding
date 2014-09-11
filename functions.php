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
$settings = '';

if(isset($_POST['save_changes'])){
	 
  saveChanges();	
}


function saveChanges() {
	update_option( 'funnybrands', serialize($_POST) );
}

function get_exValues() {
	global $settings;
	$db_value = get_option('funnybrands');
	if(!empty($db_value)){
		$settings = unserialize($db_value);	
	}
	
}

function get_setting($key,$return = false) {
	global $settings;
	if(isset($settings[$key])) {
	   if($return) {
		return $settings[$key];   
	   } else {
	    echo $settings[$key];
	   }
	   
	}  else {
		return false;	   
	}
   return false;
}
?>