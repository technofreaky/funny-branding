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
$fyb_funnybranding_settings = array();
$fyb_login_js_file = $fyb_path.'js/login.js';
$fyb_login_js_url = $fyb_plug_url.'js/login.js';
$fyb_login_css_file = $fyb_path.'css/login/custom_login.css';
$fyb_login_css_url = $fyb_plug_url.'css/login/custom_login.css';
$fyb_notice = '';


function get_exValues() {
	global $fyb_funnybranding_settings,$fyb_login_js_file,$fyb_notice,$fyb_login_css_file;
	$fyb_funnybranding_settings = '';
	$fyb_funnybranding_db_value = get_option('funnybranding_settings');
 	$fyb_funnybranding_settings[] = json_decode($fyb_funnybranding_db_value,true);	

}

function saveChanges() {
	global $fyb_notice, $fyb_path,$fyb_funnybranding_settings;

	if(!empty($_POST['funnybranding'])) { 
        $fyb_post_val = $_POST['funnybranding'];
        
        if(isset($fyb_post_val['translate'])){
            foreach($fyb_post_val['translate']['trans'] as $key => $val){
                if(empty($fyb_post_val['translate']['trans'][$key]['key'])){
                    unset($fyb_post_val['translate']['trans'][$key]);
                }
            }
        } 
        
		$fyb_Array = call_user_func_array('array_merge',$fyb_post_val);
		if(is_array($fyb_funnybranding_settings)) {
			$fyb_result = wp_parse_args($fyb_Array,$fyb_funnybranding_settings[0]);
			update_option( 'funnybranding_settings', json_encode($fyb_result) );
			 
		} else {
			$fyb_result = $fyb_Array;
			update_option( 'funnybranding_settings', json_encode($fyb_result) );
		}
		
		$fyb_notice .= '<div class="alert alert-success"> <a class="close" data-dismiss="alert">×</a>
  <strong>Settings Updated : </strong> Your changes updated successfully </div>';
		get_exValues();
 	} 
}

function fyb_chkbx($key,$echo = true)  {
	$fyb_result = '';
	if(funnyBranding_setting($key,true)) { $fyb_result = 'checked'; 	}
	if($echo){echo $fyb_result;}
	else {return $fyb_result;}
}

function funnyBranding_setting($fyb_key,$fyb_return = false) {
	global $fyb_funnybranding_settings,$fyb_login_css_file,$fyb_login_js_file;
	$fyb_value = "";
    
    if(isset($fyb_funnybranding_settings[0][$fyb_key])) {
		$fyb_value = $fyb_funnybranding_settings[0][$fyb_key];   
	}  else {
		$fyb_value =  false;	   
	}
	
	if($fyb_return) {
		return $fyb_value;
	} else {
	echo $fyb_value;
   }
   return false;
}


function fyb_dump($variable,$exit=false){
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    
    if($exit){
        exit();
    }
}


function myplugin_add_meta_box() {
    add_meta_box('Funny Brands','Funny Brands Short Code Generator','fyb_shortcodes','','advanced','default','');
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

function fyb_shortcodes() {
    global $fyb_path;
    require($fyb_path.'meta_box_shortcodes.php');
}

?>