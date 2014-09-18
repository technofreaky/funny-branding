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
$funnybranding_settings = '';

$login_js_file = $path.'js/login.js';
$login_js_url = $plug_url.'js/login.js';
$login_css_file = $path.'css/login/custom_login.css';
$login_css_url = $plug_url.'css/login/custom_login.css';

$notice = '';
if(isset($_POST['save_changes'])){
  saveChanges(); 
}


function saveChanges() {
	global $notice, $path,$login_js_file,$login_css_file;
	$login_script = $_POST['funnybranding']['login_page_script'];
	$login_style = $_POST['funnybranding']['login_page_style'];
	unset($_POST['funnybranding']['login_page_script']);
	unset($_POST['funnybranding']['login_page_style']);
	
	if($login_script == '') {
		$_POST['funnybranding']['user_login_script'] = false;
	} else {
		$_POST['funnybranding']['user_login_script'] = true;
	} 
	
	if($login_style == '') {
		$_POST['funnybranding']['user_login_style'] = false;
	} else {
		$_POST['funnybranding']['user_login_style'] = true;
	} 
	
	if(is_writable($login_js_file)) 	{
		$fh = fopen($login_js_file, 'w') or die("can't open file");
		fwrite($fh, $login_script);
		fclose($fh);
	
	} else {
		$notice .= '<div class="alert alert-error">
  <a class="close" data-dismiss="alert">×</a>
  <strong> Write Error : </strong> Unable to write Login Script to login.js file in <code> '.$login_js_file.'.  </code> </div>';
	}

	if(is_writable($login_css_file)) 	{
		$fh = fopen($login_css_file, 'w') or die("can't open file");
		fwrite($fh, $login_style);
		fclose($fh);
	
	} else {
		$notice .= '<div class="alert alert-error">
  <a class="close" data-dismiss="alert">×</a>
  <strong> Write Error : </strong> Unable to write Login Style to login.css file in <code> '.$login_css_file.'.  </code> </div>';
	}
	
	$notice .= '<div class="alert alert-success"> <a class="close" data-dismiss="alert">×</a>
  <strong>Settings Updated : </strong> Your changes updated successfully </div>';
	
	update_option( 'funnybranding', json_encode($_POST['funnybranding']) );
	

} 

function get_exValues() {
	global $funnybranding_settings,$login_js_file,$notice,$login_css_file;
	$funnybranding_settings = '';
	$funnybranding_db_value = get_option('funnybranding');
 	$funnybranding_settings[] = json_decode($funnybranding_db_value,true);	
	if(is_string($funnybranding_db_value)){
		$funnybranding_settings[] = json_decode($funnybranding_db_value);	
	}

 
	if(!is_writable($login_js_file)) 	{
		 
		$notice .= '<div class="alert alert-info">
	<a class="close" data-dismiss="alert">×</a>
	<strong> Write Error : </strong> Unable to write Login Script to login.js file. <br/>
	<strong> Path : </strong>  <code> '.$login_js_file.'.  </code>. Please make sure the file is writable. To save login page script. </div>';
	}
	
	if(!is_writable($login_css_file)) 	{
		 
		$notice .= '<div class="alert alert-info">
	<a class="close" data-dismiss="alert">×</a>
	<strong> Write Error : </strong> Unable to write Login Style to login.css file. <br/>
	<strong> Path : </strong>  <code> '.$login_css_file.'.  </code>. Please make sure the file is writable. To save login page style. </div>';
	}
	
}

function funnyBranding_setting($key,$return = false) {
	global $funnybranding_settings,$login_css_file,$login_js_file;
	$value = "";
	if($key == 'login_page_script') {
		$value = file_get_contents($login_js_file);
	} else if($key == 'login_page_style'){
		$value =  file_get_contents($login_css_file);
	}else  if(isset($funnybranding_settings[0][$key])) {
		$value = $funnybranding_settings[0][$key];   
	}  else {
		$value =  false;	   
	}
	
	if($return) {
		return $value;
	} else {
	echo $value;
   }
   return false;
}
?>