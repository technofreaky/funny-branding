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
 
    Plugin Name: Funny Brands
    Plugin URI: http://varunsridharan.in/
    Description: A Funny Plugin to brand wp admin panel
    Version: 1.0
    Author: Varun Sridharan
    Author URI: http://varunsridharan.in/
    License: GPL2
*/
defined('ABSPATH') or die("No script kiddies please!");
register_activation_hook( __FILE__, 'funny_brands_activate' );	
$fyb_plug_url = plugins_url('',__FILE__).'/';
$fyb_path = plugin_dir_path( __FILE__ );
$fyb_page_title = 'Funny Brands Settings';
$fyb_postTypes = '';

# Register Plugin
require($fyb_path.'register.php');

# Load Required Core Function
require($fyb_path.'functions.php');

# Get Existing DB Values
get_exValues();

# Save New Values IF Exist 
if(isset($_POST['save_changes'])){
  saveChanges(); 
}	

if(isset($_REQUEST['fyb_cfld_show'])){
	require($fyb_path.'ajax_customFileds.php');	# Plugin Ajax File
	exit();
}	

if(isset($_REQUEST['fyb_cfld_edit'])){
	require($fyb_path.'ajax_customFieldEdit.php');	# Plugin Ajax File
	exit();
}

if(isset($_REQUEST['fyb_cfld_edited'])){
	global $wpdb;
	$fyb_cfUpdateQ = $wpdb->prepare( "UPDATE `".$wpdb->postmeta."` SET `meta_key` = '%s' WHERE `meta_key` = '%s'",$_REQUEST['fyb_cfnw_val'],$_REQUEST['fyb_cfol']);
	if($wpdb->query($fyb_cfUpdateQ)){
		echo 'success';
	} else {
		echo 'falied';
	}
 	exit();
}

if(isset($_REQUEST['fyb_cfld_delete'])){
	global $wpdb;
	sleep(1);
	$fyb_cfUpdateQ = $wpdb->prepare( "DELETE FROM `".$wpdb->postmeta."` WHERE `meta_key` = '%s'",$_REQUEST['fyb_cf_val']);
	if($wpdb->query($fyb_cfUpdateQ)){
		echo 'success';
	} else {
		echo 'falied';
	}
 	exit();
}

# Load Required hooks Function
require($fyb_path.'hooks_functions.php');

function funny_brands_page() {
    global $fyb_path,$fyb_page_title;
	fyb_addStyles();
	wp_enqueue_media();	# Add Media Uploader
	$fyb_page_title = 'Funny Brands Settings'; 	# Page Title
	require($fyb_path.'header.php'); # Plugin Header File
	require($fyb_path.'header-tab.php'); # Plugin Header File
	require($fyb_path.'settings_general.php'); # General Settings Page  
	require($fyb_path.'settings_login.php'); # Login Settings Page 
	require($fyb_path.'settings_postpage.php'); # Post Page Settings Page 
	require($fyb_path.'settings_defaultContent.php'); # Default Content Page Settings Page 
	require($fyb_path.'settings_smtp.php'); # SMTP Settings Page 
    require($fyb_path.'settings_media_library.php'); # SMTP Settings Page
	require($fyb_path.'footer.php');	# Plugins Footer File
}


function funny_brands_short_codes() {
	global $fyb_path,$fyb_page_title;
	fyb_addStyles();	
	$fyb_page_title = 'Funny Brands Shortcode';	# Page Title
	require($fyb_path.'header.php');	# Plugin Header File
	require($fyb_path.'settings_shortcode.php');	# settings_translations Page 
	require($fyb_path.'footer.php');	# Plugins Footer File
}



function funny_brands_custom_translations() {
	global $fyb_path,$fyb_page_title;
	fyb_addStyles();	
	$fyb_page_title = 'Funny Brands Custom Translations';	# Page Title
	require($fyb_path.'header.php');	# Plugin Header File
	require($fyb_path.'settings_translations.php');	# settings_translations Page 
	require($fyb_path.'footer.php');	# Plugins Footer File
}


function funny_brands_custom_fields() {
    global $fyb_path,$fyb_page_title;
	fyb_addStyles();
	$fyb_page_title = 'Funny Brands Custom Field Rename';	# Page Title
	require($fyb_path.'header.php');	# Plugin Header File
	require($fyb_path.'settings_replacecustomfields.php');	# settings_translations Page 
	require($fyb_path.'footer.php');	# Plugins Footer File
    
}



function funny_brands_help() {
    global $fyb_path,$fyb_page_title;
	fyb_addStyles();
	$fyb_page_title = 'Funny Brands F.A.Q';	# Page Title
    require($fyb_path.'header.php');	# Plugin Header File
    require($fyb_path.'faq.php');	# settings_translations Page 
    require($fyb_path.'footer.php');	# Plugins Footer File
}
?>