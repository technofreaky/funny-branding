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
 
    Plugin Name: Funny Brandings
    Plugin URI: http://varunsridharan.in/
    Description: A Funny Plugin to brand wp admin panel
    Version: 0.1
    Author: Varun Sridharan
    Author URI: http://varunsridharan.in/
    License: GPL2
*/

defined('ABSPATH') or die("No script kiddies please!");	
$plug_url = plugins_url().'/funny_branding/';
$path = plugin_dir_path( __FILE__ );

# Register Plugin
require_once($path.'register.php');

# Load Required Core Function
require_once($path.'functions.php');

# Get Existing DB Values
get_exValues();

# Load Required hooks Function
require_once($path.'hooks_functions.php');

 
function funny_brands() {
	# Plugin Header File
	require_once($path.'header.php');
	
	# General Settings Page  
	require_once($path.'settings_general.php');
	
	# Login Settings Page 
	require_once($path.'settings_login.php');
	
	# SMTP Settings Page 
	require_once($path.'settings_smtp.php');
	
	# settings_translations Page 
	require_once($path.'settings_translations.php');
	
	# Plugins Footer File
	require_once($path.'footer.php');
 

}
?>