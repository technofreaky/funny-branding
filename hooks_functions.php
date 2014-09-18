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
if(funnyBranding_setting('login_redirect_url',true)) {
	
	function admin_default_page() {
 
		return funnyBranding_setting('login_redirect_url',true);
	}

	add_filter('login_redirect', 'admin_default_page');
}
 
# Removes Footer Version
if(funnyBranding_setting('footer_verison_hide',true)) {
	function remove_footer_version() {
		#if (get_option('version_hide_data') == 1){ return "";}else { return "Version ".get_bloginfo ('version'); }
	return '';
	}
	add_filter( 'update_footer', 'remove_footer_version', 9999);
}

# close right menu bar
if(funnyBranding_setting('collapse_menu_bar',true)) {
	function wp_admin_menu_colaps() {
		echo "<script> jQuery(document).ready(function() { if ( !jQuery(document.body).hasClass('folded') ) { jQuery(document.body).addClass('folded'); } }); </script>";
	} 
	add_filter('admin_head', 'wp_admin_menu_colaps');
}
 
# change footer text
if(funnyBranding_setting('footer_text',true)) {
	function change_footer_text() { 
		funnyBranding_setting('footer_text'); 
	} 
	add_filter('admin_footer_text', 'change_footer_text');
}


# custom login page style
if(funnyBranding_setting('user_login_style',true)) {
	function login_style(){
 		global $login_css_url;
		wp_enqueue_style('funny-branding-custom-login-style', $login_css_url, '', '2', false );  
	}
		add_action( 'login_enqueue_scripts', 'login_style' );
	
}

# Add jQuery In Login Page
if(funnyBranding_setting('user_jquery_login_page',true)) {
	function jquery_login(){
		wp_enqueue_script( 'jquery' );
	}
	add_action( 'login_footer', 'jquery_login' );
}

# custom login page script
if(funnyBranding_setting('user_login_script',true)) {
	function login_script(){
		global $login_js_url;
 		wp_enqueue_script('funny-branding-custom-login-script', $login_js_url, 'jquery', '1', true );  
	}
	add_action( 'login_footer', 'login_script' );
}

# Add Codex Form
if(funnyBranding_setting('add_codex_search_form',true)) {
	function wp_codex_search_form() {
	echo '<form target="_blank" method="get" action="http://wordpress.org/search/do-search.php" class="alignright" style="margin: 11px 5px 0;">
		<input type="text" onblur="this.value=(this.value==\'\') ? \'Search the Codex\' : this.value;" onfocus="this.value=(this.value==\'Search the Codex\') ? \'\' : this.value;" maxlength="150" value="Search the Codex" name="search" class="text"> <input type="submit" value="Go" class="button" />
	</form>';
	} 
	add_filter( 'in_admin_header', 'wp_codex_search_form', 11 );
}
 

# Custom logout Time
if(funnyBranding_setting('auto_logout_time',true)){
	function aut_logout_time( $expirein ) {
	   return funnyBranding_setting('auto_logout_time',true); // 1 year in seconds
	}
	add_filter( 'auth_cookie_expiration', 'aut_logout_time' );
}


# Custom favicon
if(funnyBranding_setting('custom_favicon',true)){
	function custom_favicon() {
	 echo '<link rel="shortcut icon" type="image/x-icon" href="' . funnyBranding_setting('custom_favicon',true) . '" />';
	}
	add_action( 'admin_head', 'custom_favicon' );
}



# Website Screen Shot
if(funnyBranding_setting('webshot_code',true)){

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





# Iframe Short Code
if(funnyBranding_setting('iframe_code',true)){
	
	function GenerateIframe( $atts ) {
		extract( shortcode_atts( array(
			'href' => 'http://the-url',
			'height' => '550px',
			'width' => '600px',     
		), $atts ) );

		return '<iframe src="'.$href.'" width="'.$width.'" height="'.$height.'"> <p>Your Browser does not support Iframes.</p></iframe>';
	}
	add_shortcode('iframe', 'GenerateIframe');
}


# Remote File Include Short code
if(funnyBranding_setting('rfilei_code',true)){
	function getfile_content( $atts ) {
 
		extract( shortcode_atts( array( 'fileurl' => 'http://the-url' ), $atts ) );
		 
		if ($fileurl!='') {
			return @file_get_contents($fileurl);
		}
			
	}
	add_shortcode( 'getfile', 'getfile_content' );
}

# Blog Info Shortcode
if(funnyBranding_setting('blogInfo',true)){
function bloginfo_shortcode($atts) {
     extract(shortcode_atts(array( 'key' => '', ), $atts));
    return get_bloginfo($key);
}

add_shortcode('bloginfo', 'bloginfo_shortcode');

}


# Blog Info Shortcode
if(funnyBranding_setting('postInfo',true)){
	

	function shortcode_field($atts){
	  extract(shortcode_atts(array( 'post_id' => NULL, ), $atts));

	  if(!isset($atts[0])) return;
	  $field = esc_attr($atts[0]);

	  global $post;
	  $post_id = (NULL === $post_id) ? $post->ID : $post_id;

	  return get_post_meta($post_id, $field, true);
	}
	
	add_shortcode('field', 'shortcode_field');
}

if(funnyBranding_setting('adminBarmoveDown',true)){
	function stick_admin_bar_to_bottom_css() { 
		global $plug_url;
		$version = get_bloginfo( 'version' );

		if ( version_compare( $version, '3.3', '<' ) ) {
			$css_file = 'wordpress-3-1.css';
		} else {
			$css_file = 'wordpress-3-3.css';
		}
		 
		wp_enqueue_style( 'stick-admin-bar-to-bottom', $plug_url.'css/' . $css_file);
	}

	add_action( 'admin_init', 'stick_admin_bar_to_bottom_css' );
	add_action( 'wp_enqueue_scripts', 'stick_admin_bar_to_bottom_css' );
}
# Custom SMTP Settings
if(funnyBranding_setting('smtp_status',true)){
	add_action('phpmailer_init','send_smtp_email');
	function send_smtp_email( $phpmailer ) {
		$phpmailer->isSMTP();
		$phpmailer->IsHTML(funnyBranding_setting('smtp_is_html',true));
		$phpmailer->Host = funnyBranding_setting('smtp_host',true);
		$phpmailer->SMTPAuth = funnyBranding_setting('smtp_auth',true);
		$phpmailer->Port = funnyBranding_setting('smtp_port',true);
		$phpmailer->Username = funnyBranding_setting('smtp_username',true);
		$phpmailer->Password = funnyBranding_setting('smtp_password',true);
		$phpmailer->SMTPSecure = funnyBranding_setting('smtp_secure',true);
		$phpmailer->From =funnyBranding_setting('smtp_fromid',true);
		$phpmailer->FromName = funnyBranding_setting('smtp_from_name',true);
	}
}

# Dynimic Translation
if(funnyBranding_setting('trans',true)){
function learn_gettext( $translation, $text ) {
   $trans = array_values(funnyBranding_setting('trans',true));
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


if(funnyBranding_setting('welcome_text',true)){

	add_filter('gettext', 'change_howdy', 10, 3);

	function change_howdy($translated, $text, $domain) {

		if (!is_admin() || 'default' != $domain)
			return $translated;

		if (false !== strpos($translated, 'Howdy'))
			return str_replace('Howdy', funnyBranding_setting('welcome_text',true), $translated);

		return $translated;
	}
}
?>