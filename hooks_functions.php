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
# Login Redirect Function
if(get_setting('login_redirect_url',true)) {
	
	function admin_default_page() {
 
		return get_setting('login_redirect_url',true);
	}

	add_filter('login_redirect', 'admin_default_page');
}
 
# Removes Footer Version
if(get_setting('footer_verison_hide',true)) {
	function remove_footer_version() {
		#if (get_option('version_hide_data') == 1){ return "";}else { return "Version ".get_bloginfo ('version'); }
	return '';
	}
	add_filter( 'update_footer', 'remove_footer_version', 9999);
}

# close right menu bar
if(get_setting('collapse_menu_bar',true)) {
	function wp_admin_menu_colaps() {
		echo "<script> jQuery(document).ready(function() { if ( !jQuery(document.body).hasClass('folded') ) { jQuery(document.body).addClass('folded'); } }); </script>";
	} 
	add_filter('admin_head', 'wp_admin_menu_colaps');
}
 
# change footer text
if(get_setting('footer_text',true)) {
	function change_footer_text() { 
		get_setting('footer_text'); 
	} 
	add_filter('admin_footer_text', 'change_footer_text');
}


# custom login page style
if(get_setting('login_page_style',true)) {
	function login_style(){
 		echo '<style>'.get_setting('login_page_style',true).'</style>';
	}
	add_action( 'login_enqueue_scripts', 'login_style' );
}


# custom login page script
if(get_setting('login_page_script',true)) {
	function login_script(){
 		echo '<script>'.get_setting('login_page_script',true).'</script>';
	}
	add_action( 'login_enqueue_scripts', 'login_script' );
}


# custom login page script
if(get_setting('add_codex_search_form',true)) {
	function wp_codex_search_form() {
	echo '<form target="_blank" method="get" action="http://wordpress.org/search/do-search.php" class="alignright" style="margin: 11px 5px 0;">
		<input type="text" onblur="this.value=(this.value==\'\') ? \'Search the Codex\' : this.value;" onfocus="this.value=(this.value==\'Search the Codex\') ? \'\' : this.value;" maxlength="150" value="Search the Codex" name="search" class="text"> <input type="submit" value="Go" class="button" />
	</form>';
	} 
	add_filter( 'in_admin_header', 'wp_codex_search_form', 11 );
}
 

# Custom logout Time
if(get_setting('auto_logout_time',true)){
	function aut_logout_time( $expirein ) {
	   return get_setting('auto_logout_time',true); // 1 year in seconds
	}
	add_filter( 'auth_cookie_expiration', 'aut_logout_time' );
}


# Custom favicon
if(get_setting('custom_favicon',true)){
	function custom_favicon() {
	 echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_setting('custom_favicon',true) . '" />';
	}
	add_action( 'admin_head', 'custom_favicon' );
}



# Website Screen Shot
if(get_setting('web_shot',true)){

 function wpr_snap($atts, $content = null) {
        extract(shortcode_atts(array(
            "snap" => 'http://s.wordpress.com/mshots/v1/',
            "url" => 'http://www.sagive.co.il',
            "alt" => 'My image',
            "w" => '400', // width
            "h" => '300' // height
        ), $atts));

    $img = '<img src="' . $snap . '' . urlencode($url) . '?w=' . $w . '&h=' . $h . '" alt="' . $alt . '"/>';
        return $img;
}

add_shortcode("snap", "wpr_snap");
}

# Custom SMTP Settings
if(get_setting('smtp_status',true)){
	add_action('phpmailer_init','send_smtp_email');
	function send_smtp_email( $phpmailer ) {
		$phpmailer->isSMTP();
		$phpmailer->IsHTML(get_setting('smtp_is_html',true));
		$phpmailer->Host = get_setting('smtp_host',true);
		$phpmailer->SMTPAuth = get_setting('smtp_auth',true);
		$phpmailer->Port = get_setting('smtp_port',true);
		$phpmailer->Username = get_setting('smtp_username',true);
		$phpmailer->Password = get_setting('smtp_password',true);
		$phpmailer->SMTPSecure = get_setting('smtp_secure',true);
		$phpmailer->From =get_setting('smtp_fromid',true);
		$phpmailer->FromName = get_setting('smtp_from_name',true);
	}
}










if(get_setting('trans',true)){


function learn_gettext( $translation, $text ) {
   $trans = array_values(get_setting('trans',true));
   $dirty = false;
   $strings_map = array();
   $text_words = explode( ' ', $text );
 
   foreach($trans  as $mytrans) {
	   $strings_map[$mytrans['key']] = $mytrans['val'];
   }
	
   foreach ( $text_words as $k => $word ) {
	   $w = trim( $word, '.,:!?-_()' );
	   if ( isset( $strings_map[ $w ] ) ) {
		   $text_words[ $k ] = str_replace( $w, $strings_map[ $w ], $word );
		   $dirty = true;
	   }
   }
	
   if ( $dirty ) {
	   return implode( ' ', $text_words );
   }
   return $translation;
}
add_filter( 'gettext', 'learn_gettext', 10, 2 );
}
?>