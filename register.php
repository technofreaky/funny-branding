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
function funny_brands_activate() {
    add_action( 'admin_notices', 'funny_brands_upgrade_notice' );
    add_option("funnybranding_settings", '', '', 'yes');
	add_option("funnybranding_customFields", '', '', 'yes');
	if(get_option('funnybranding')){ 
		 update_option( 'funnybranding_settings', get_option('funnybranding') );
		 delete_option('funnybranding');
	} 
}

if ( is_admin() ){ 
 	add_action('admin_menu', 'funny_brands_menu');
	function funny_brands_menu() {
        add_menu_page('Funny Brands', 'Funny Brands', 'administrator','funny-brands', 'funny_brands_page', '', 200 );
		add_submenu_page( 'funny-brands', ' Settings', ' Settings', 'administrator', 'funny-brands', 'funny_brands_page' );
		add_submenu_page( 'funny-brands', ' Shortcodes', ' Shortcodes', 'administrator', 'funny-brands-short-codes', 'funny_brands_short_codes' );
		add_submenu_page( 'funny-brands', ' Custom Fields', ' Custom Fields', 'administrator', 'funny-brands-rename-custom-fields', 'funny_brands_custom_fields' );
		add_submenu_page( 'funny-brands', ' Translations', ' Translations', 'administrator', 'funny-brands-custom-translations', 'funny_brands_custom_translations' );
		add_submenu_page( 'funny-brands', ' F.A.Q', ' Help / F.A.Q', 'administrator', 'funny-brands-help', 'funny_brands_help' );
}

	
	function funny_brands_scripts_styles() {
		global $fyb_plug_url;
		wp_register_script('funny_branding_dbts', $fyb_plug_url.'js/jquery.dataTables.min.js', array('jquery'), '1.1.0', false );
		wp_register_script('funny_branding_jq_cbox',   $fyb_plug_url.'js/jquery.custombox.js', array('jquery'), '1.1.0', false );
 		wp_register_script( 'funny_branding_script', $fyb_plug_url.'js/script.js', array( 'jquery' ), '1.1.0', false );

        wp_enqueue_script('funny_branding_dbts' );
		wp_enqueue_script('funny_branding_jq_cbox' ); 
		wp_enqueue_script( 'funny_branding_script' ); 	
		wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-dialog');
        
		wp_register_style( 'funny_branding_datatbl_st', $fyb_plug_url.'css/jquery.dataTables.min.css', false, '0.5', 'all' );
		wp_register_style( 'funny_branding_style', $fyb_plug_url.'css/style.css', false, '0.5', 'all' );
        wp_register_style( 'funny_branding_style_custombox', $fyb_plug_url.'css/jquery.custombox.css', false, '0.5', 'all' );
		wp_register_style( 'funny_branding_fa', $fyb_plug_url.'css/font-awesome.min.css', false, '0.5', 'all' );
        
		wp_enqueue_style( 'funny_branding_style' );
		wp_enqueue_style( 'funny_branding_datatbl_st' ); 
        wp_enqueue_style( 'funny_branding_style_custombox' ); 
		wp_enqueue_style( 'funny_branding_fa' ); 
        wp_enqueue_style( 'wp-color-picker' ); 
        wp_enqueue_style("wp-jquery-ui-dialog");
	}
	
	 
	function fyb_addStyles() {
		funny_brands_scripts_styles();	
	}
}
?>