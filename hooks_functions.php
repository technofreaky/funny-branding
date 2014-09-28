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
	function fyb_admin_default_page() {
 		return funnyBranding_setting('login_redirect_url',true);
	}
	add_filter('login_redirect', 'fyb_admin_default_page');
}
 
# Removes Footer Version
if(funnyBranding_setting('footer_verison_hide',true)) {
	function fyb_remove_footer_version() { return ''; }
    function fyb_remove_version_header() { remove_action('wp_head', 'wp_generator'); }
    add_action('wp_head','fyb_remove_version_header');
	add_filter( 'update_footer', 'fyb_remove_footer_version', 9999);
}


# close right menu bar
if(funnyBranding_setting('collapse_menu_bar',true)) {
	function fyb_wp_admin_menu_colaps() {
		echo "<script> jQuery(document).ready(function() { if ( !jQuery(document.body).hasClass('folded') ) { jQuery(document.body).addClass('folded'); } }); </script>";
	} 
	add_filter('admin_head', 'fyb_wp_admin_menu_colaps');
}
 
# change footer text
if(funnyBranding_setting('footer_text',true)) {
	function fyb_change_footer_text() {  funnyBranding_setting('footer_text');  } 
	add_filter('admin_footer_text', 'fyb_change_footer_text');
}


# custom login page style
if(funnyBranding_setting('login_page_style',true)) {
	function fyb_login_style(){ echo '<style>'.funnyBranding_setting('login_page_style',true).'</style>'; }
     add_action('login_enqueue_scripts', 'fyb_login_style'); 
}



# Add jQuery In Login Page
if(funnyBranding_setting('user_jquery_login_page',true)) {
	function fyb_jquery_login(){ wp_enqueue_script( 'jquery' ); }
	add_action( 'login_footer', 'fyb_jquery_login' );
}

# custom login page script 
if(funnyBranding_setting('login_page_script',true)) {
	function fyb_login_script(){ echo '<script>'.funnyBranding_setting('login_page_script',true).'</script>'; }
    add_action('login_footer', 'fyb_login_script',200); 
}
 

# Custom logout Time
if(funnyBranding_setting('auto_logout_time',true)){
	function fyb_aut_logout_time( $expirein ) {
	   return funnyBranding_setting('auto_logout_time',true); 
	} 
	add_filter( 'auth_cookie_expiration', 'fyb_aut_logout_time' );
}


# Custom favicon
if(funnyBranding_setting('custom_favicon',true)){
	function fyb_custom_favicon() {
	 echo '<link rel="shortcut icon" type="image/x-icon" href="' . funnyBranding_setting('custom_favicon',true) . '" />';
	}
	add_action( 'admin_head', 'fyb_custom_favicon' );
}



# Website Screen Shot
if(funnyBranding_setting('webshot_code',true)){
	 function fyb_wpr_snap($fyb_atts, $fyb_content = null) {
			extract(shortcode_atts(array(
				"snap" => 'http://s.wordpress.com/mshots/v1/',
				"url" => 'http://www.sagive.co.il',
				"alt" => 'My image',
				"w" => '400', // width
				"h" => '300' // height
			), $fyb_atts));
			$fyb_img = '<img src="'.$snap.''.urlencode($url).'?w='.$w.'&h='.$h.'" alt="'.$alt.'"/>';
			return $fyb_img;
	}
	add_shortcode("snap", "fyb_wpr_snap");
}





# Iframe Short Code
if(funnyBranding_setting('iframe_code',true)){
	
	function fyb_GenerateIframe( $fyb_atts ) {
		extract( shortcode_atts( array(
			'url' => 'http://the-url',
			'h' => '550px',
			'w' => '600px',     
		), $fyb_atts ) );

		return '<iframe src="'.$url.'" width="'.$w.'" height="'.$h.'"> <p>Your Browser does not support Iframes.</p></iframe>';
	}
	add_shortcode('iframe', 'fyb_GenerateIframe');
}

 

# Blog Info Shortcode
if(funnyBranding_setting('blogInfo',true)){
function fyb_bloginfo_shortcode($fyb_atts) {
    extract(shortcode_atts(array( 'key' => '', ), $fyb_atts));
    return get_bloginfo($key);
}

add_shortcode('bloginfo', 'fyb_bloginfo_shortcode');

}


# Blog Info Shortcode
if(funnyBranding_setting('postInfo',true)){
	function fyb_shortcode_field($fyb_atts){
	  extract(shortcode_atts(array( 'post_id' => NULL, ), $fyb_atts));
	  if(!isset($fyb_atts[0])) return;
	  $field = esc_attr($fyb_atts[0]);
	  global $post;
	  $post_id = (NULL === $post_id) ? $post->ID : $post_id;
	  return get_post_meta($post_id, $field, true);
	}
	
	add_shortcode('field', 'fyb_shortcode_field');
}

if(funnyBranding_setting('adminBarmoveDown',true)){
	function fyb_stick_admin_bar_to_bottom_css() { 
		global $fyb_plug_url;
		$fyb_version = get_bloginfo( 'version' );

		if ( version_compare( $fyb_version, '3.3', '<' ) ) {
			$fyb_css_file = 'wordpress-3-1.css';
		} else {
			$fyb_css_file = 'wordpress-3-3.css';
		}
		 
		wp_enqueue_style( 'stick-admin-bar-to-bottom', $fyb_plug_url.'css/' . $fyb_css_file);
	}

	add_action( 'admin_init', 'fyb_stick_admin_bar_to_bottom_css' );
	add_action( 'wp_enqueue_scripts', 'fyb_stick_admin_bar_to_bottom_css' );
}
# Custom SMTP Settings
if(funnyBranding_setting('smtp_status',true)){
	add_action('phpmailer_init','fyb_send_smtp_email');
	function fyb_send_smtp_email( $fyb_phpmailer ) {
		$fyb_phpmailer->isSMTP();
		$fyb_phpmailer->IsHTML(funnyBranding_setting('smtp_is_html',true));
		$fyb_phpmailer->Host = funnyBranding_setting('smtp_host',true);
		$fyb_phpmailer->SMTPAuth = funnyBranding_setting('smtp_auth',true);
		$fyb_phpmailer->Port = funnyBranding_setting('smtp_port',true);
		$fyb_phpmailer->Username = funnyBranding_setting('smtp_username',true);
		$fyb_phpmailer->Password = funnyBranding_setting('smtp_password',true);
		$fyb_phpmailer->SMTPSecure = funnyBranding_setting('smtp_secure',true);
		$fyb_phpmailer->From =funnyBranding_setting('smtp_fromid',true);
		$fyb_phpmailer->FromName = funnyBranding_setting('smtp_from_name',true);
	}
}

# Dynimic Translation
if(funnyBranding_setting('trans',true)){
    
function wps_translate_words_array( $translated ) {
     $words = array( 'First Name' => 'Article' );
     $translated = str_ireplace(  array_keys($words),  $words,  $translated );
     return $translated;
}
    
function fyb_learn_gettext( $fyb_translation, $fyb_text ) {
   $fyb_trans = array_values(funnyBranding_setting('trans',true));
   $fyb_dirty = false;
   $fyb_strings_map = array();
   $fyb_text_words = explode( ' ', $fyb_text );
 
   foreach($fyb_trans  as $fyb_mytrans) {
	  $fyb_strings_map[$fyb_mytrans['key']] = $fyb_mytrans['val'];
   }
	
   foreach ( $fyb_text_words as $fyb_k => $fyb_word ) {
	   $fyb_w = trim( $fyb_word, '.,:!?-_()' ); 
	   if ( isset( $fyb_strings_map[ $fyb_w ] ) ) {
		   $fyb_text_words[ $fyb_k ] = str_replace( $fyb_w, $fyb_strings_map[ $fyb_w ], $fyb_word );
		   $fyb_dirty = true;
	   }
   }
	
   if ( $fyb_dirty ) {   return implode( ' ', $fyb_text_words );  }
   return $fyb_translation;
}
add_filter('gettext',  'fyb_learn_gettext', 10, 2 );
add_filter('ngettext', 'wps_translate_words_array');
}


if(funnyBranding_setting('welcome_text',true)){
	add_filter('gettext', 'fyb_change_howdy', 10, 3);
	function fyb_change_howdy($fyb_translated, $fyb_text, $fyb_domain) {
		if (!is_admin() || 'default' != $fyb_domain)
			return $fyb_translated;
		if (false !== strpos($fyb_translated, 'Howdy'))
			return str_replace('Howdy', funnyBranding_setting('welcome_text',true), $fyb_translated);
		return $fyb_translated;
	}
}


# Removes Shake Effect in login page
if(funnyBranding_setting('disable_login_shake_effect',true)){
    function fyb_wpb_remove_loginshake() {
        remove_action('login_head', 'wp_shake_js', 12);
    }
    add_action('login_head', 'fyb_wpb_remove_loginshake');
}

# Gets Users Ip
if(funnyBranding_setting('user_ip',true)){
	function fyb_get_the_user_ip() {
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) { $ip = $_SERVER['HTTP_CLIENT_IP']; }
		elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
		else {$ip = $_SERVER['REMOTE_ADDR'];}
		return apply_filters( 'wpb_get_ip', $ip );
	}

	add_shortcode('show_ip', 'fyb_get_the_user_ip');
}  


# Gets Users Ip
if(funnyBranding_setting('twitter_linking',true)){
	function twtreplace($content) {
		$twtreplace = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);
		return $twtreplace;
	}

	add_filter('the_content', 'twtreplace');   
	add_filter('comment_text', 'twtreplace');
	add_filter('the_excerpt', 'twtreplace'); 
}  




function fyb_get_post_types(){
	global $fyb_postTypes;
	$fyb_postTypes = get_post_types();
}
add_action ('admin_init','fyb_get_post_types', 199);



if(funnyBranding_setting('defaultContent',true)){
	add_filter( 'default_content', 'fyb_default_content', 10, 2 );
	function fyb_default_content( $content, $post ) {
		$fyb_defaultContent = funnyBranding_setting('defaultContent',true);
		if(isset($fyb_defaultContent[$post->post_type]) &&  ! empty($fyb_defaultContent[$post->post_type])) {
			$content = $fyb_defaultContent[$post->post_type];
		} else {
			$content = $content ;
		}
		return $content;
	}
}

if(funnyBranding_setting('custom_dashboard_logo',true)){
 	function fyb_custom_dashboard_logo() {
		echo ' <style type="text/css">
		#header-logo, #wp-admin-bar-wp-logo .ab-icon { background-image: url('.funnyBranding_setting('custom_dashboard_logo',true).') !important; background-position: 0 center !important;  background-size: auto 100% !important;}
		</style> ';
	}
	add_action('admin_head', 'fyb_custom_dashboard_logo');
}


if(funnyBranding_setting('thumbnails_rss_feeds',true)){
	function fyb_rss_post_thumbnail($content) {
		global $post;
		if(has_post_thumbnail($post->ID)) {
			$content = '<p>' . get_the_post_thumbnail($post->ID).'</p>'. get_the_content();
		}
		return $content;
	}
	add_filter('the_excerpt_rss', 'fyb_rss_post_thumbnail');
	add_filter('the_content_feed', 'fyb_rss_post_thumbnail');
}


if(funnyBranding_setting('custom_avatars',true)){
	function fyb_newgravatar ($avatar_defaults) {
		global $fyb_path,$fyb_plug_url; 
		$fyb_profile_path = $fyb_path.'profile_icons/';
		$fyb_profile_url = $fyb_plug_url.'profile_icons/';

		$fybfiles2 = scandir($fyb_profile_path, 1);
		foreach($fybfiles2 as $fyb_file) {
			if($fyb_file !== '..' && $fyb_file != '.')	 {
				$avatar_defaults[$fyb_profile_url.$fyb_file] = str_replace('.png','',$fyb_file);
			}
		}
		return $avatar_defaults;
	}
	add_filter( 'avatar_defaults', 'fyb_newgravatar' );
}


if(funnyBranding_setting('custom_excerpt_length',true)){
	function fyb_excerpt_length($length) {
		return funnyBranding_setting('custom_excerpt_length',true);
	}
	add_filter('excerpt_length', 'fyb_excerpt_length');
}

if(funnyBranding_setting('custom_excerpt_more',true)){
	function fyb_custom_excerpt_more($more) {
		return funnyBranding_setting('custom_excerpt_more',true);
	}
	add_filter('excerpt_more', 'fyb_custom_excerpt_more');
}






// add custom feed content
if(funnyBranding_setting('add_social_share',true)){
	function wpb_add_feed_content($content) { 
		global $fyb_plug_url; 
		#if(is_feed()) { 
			$permalink_encoded = urlencode(get_permalink()); 
			$post_title = get_the_title(); 
			$content .= ' <p class="share_container"> <a class="share fb_share" href="http://www.facebook.com/sharer/sharer.php?u=' . $permalink_encoded . '" title="Share on Facebook"> <img src="'.$fyb_plug_url.'/img/fb.png" title="Share on Facebook" alt="Share on Facebook" /> </a> <a class="share tw_share"  href="http://www.twitter.com/share?&text='. $post_title . '&amp;url=' . $permalink_encoded . '" title="Share on Twitter"> <img src="'.$fyb_plug_url.'/img/tw.png" title="Share on Twitter" alt="Share on Twitter" /> </a> </p>';
		#}

		return $content;
	}

	add_filter('the_excerpt_rss', 'wpb_add_feed_content');
	add_filter('the_content', 'wpb_add_feed_content');
}



if(funnyBranding_setting('add_post_thumbnail_section',true)){
    add_theme_support('post-thumbnails', array( 'post', 'page' ) );
    function fyb_AddThumbColumn($cols) {
        $cols['thumbnail'] = __('Thumbnail');
        return $cols;
    }

    function fyb_AddThumbValue($column_name, $post_id) {
            $width = 35;
            $height = 35;
            if ( 'thumbnail' == $column_name ) {
                $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
                $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
                if ($thumbnail_id) {  $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );  }
                elseif ($attachments) {
                    foreach ( $attachments as $attachment_id => $attachment ) {
                        $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
                    }
                }
                if ( isset($thumb) && $thumb ) { echo $thumb; }
                else { echo __('None'); }
            }
    }
    add_filter( 'manage_posts_columns', 'fyb_AddThumbColumn' );
    add_action( 'manage_posts_custom_column', 'fyb_AddThumbValue', 10, 2 );
    add_filter( 'manage_pages_columns', 'fyb_AddThumbColumn' );
    add_action( 'manage_pages_custom_column', 'fyb_AddThumbValue', 10, 2 );
}



if(funnyBranding_setting('register_success_redirect_url',true)){
    function wps_registration_redirect(){
        return home_url(funnyBranding_setting('register_success_redirect_url',true));
    }
    add_filter( 'registration_redirect', 'wps_registration_redirect' );
}


if(funnyBranding_setting('ps_color_status',true)){
    
add_action('admin_footer','posts_status_color');
    function posts_status_color(){
        $fyb_colors = funnyBranding_setting('ps_color',true);
        $fyb_psc_code = '<style>';
        foreach($fyb_colors as $fybCK => $fybCV) {
            if(!empty($fybCV)) {
             $fyb_psc_code .= '.status-'.$fybCK.'{background: '.$fybCV.' !important;}';
            }
        }
        $fyb_psc_code .= '<style>';
        echo $fyb_psc_code;
    }
}


if(funnyBranding_setting('link_qrcode',true)){
    function fyb_AddQrColumn($cols) {
        $cols['qrcode'] = __('QrCode');
        return $cols;
    }

    function fyb_AddQrValue($column_name, $post_id) {
            if ( 'qrcode' == $column_name ) { echo '<img src="http://chart.apis.google.com/chart?chs=87x87&cht=qr&chld=|0&chl='.urlencode(get_permalink($post_id)).'&choe=UTF-8" />'; }
    }
    add_filter( 'manage_posts_columns', 'fyb_AddQrColumn' );
    add_action( 'manage_posts_custom_column', 'fyb_AddQrValue', 10, 2 );
    add_filter( 'manage_pages_columns', 'fyb_AddQrColumn' );
    add_action( 'manage_pages_custom_column', 'fyb_AddQrValue', 10, 2 );
}



if(funnyBranding_setting('media_meta_info',true)){

    function fyb_media_meta($defaults){
        $defaults['fyb_media_meta'] = __('Meta Info'); 

        return $defaults;
    }
    function fyb_media_meta_show($column_name, $id){
        if($column_name === 'fyb_media_meta'){
           $meta = wp_get_attachment_metadata($id);
           $img_exist_size = implode(", ",array_keys($meta['sizes']));
            if(isset($meta['width'])){
                echo 'Dimensions (w, h) : '.$meta['width'].' x '.$meta['height']."<hr />";
            }
            
            echo '<span>Thumbnail Names : '.$img_exist_size.'</span> <hr />';  
          
           $CAMMETA = $meta['image_meta'];
           foreach($CAMMETA as $CMTKEY => $CMTVAL){
               if(!empty($CMTVAL)){ 
                   if($CMTKEY == 'orientation') { 
                       if($CMTVAL == 1) { $CMTVAL = 'Portrait'; } 
                       else if($CMTVAL == 0){ $CMTVAL = 'Landscape'; }
                       else {$CMTVAL = 'Unknow'; }
                   }
                   echo '<span style="text-transform: capitalize;"> '.$CMTKEY.":  ".$CMTVAL."</span> <hr />"; 
               }
           }
             
        } 
    }
    add_filter('manage_media_columns', 'fyb_media_meta', 1);
    add_action('manage_media_custom_column', 'fyb_media_meta_show', 1, 2);

}







if(funnyBranding_setting('fyb_google_trends',true)){
    function fyb_wps_trend($atts){
            extract( shortcode_atts( array(
                    'w' => '500',           // width
                    'h' => '330',           // height
                    'q' => '',              // query
                    'geo' => 'US',          // geolocation
            ), $atts ) ); 
            $h=(int)$h;
            $w=(int)$w;
            $q=esc_attr($q);
            $geo=esc_attr($geo);
             ob_start();
    ?>
    <script type="text/javascript" src="http://www.google.com/trends/embed.js?hl=en-US&q=<?php echo $q;?>&geo=<?php echo $geo;?>&cmpt=q&content=1&cid=TIMESERIES_GRAPH_0&export=5&w=<?php echo $w;?>&h=<?php echo $h;?>"></script>
    <?php
    return ob_get_clean();
    }
    add_shortcode("trends","fyb_wps_trend");
}





if(funnyBranding_setting('fyb_google_chart',true)){
    function fyb_google_chart_shortcode( $atts ) {
        $string = '';
            extract(shortcode_atts(array( 'data' => '','size' => '400x180','colors' => '', 'title' => '', 'labels' => '', 'type' => 'pie', 'advanced' => '' ), $atts));

            switch ($type) {
                    case 'line' :
                            $charttype = 'lc'; break;
                    case 'xyline' :
                            $charttype = 'lxy'; break;
                    case 'sparkline' :
                            $charttype = 'ls'; break;
                    case 'meter' :
                            $charttype = 'gom'; break;
                    case 'scatter' :
                            $charttype = 's'; break;
                    case 'venn' :
                            $charttype = 'v'; break;
                    case 'pie' :
                            $charttype = 'p3'; break;
                    case 'pie2d' :
                            $charttype = 'p'; break;
                    default :
                            $charttype = $type;
                    break;
            }

            if ($title) $string .= '&chtt='.$title.'';
            if ($labels) $string .= '&chl='.$labels.'';
            if ($colors) $string .= '&chco='.$colors.'';
            $string .= '&chs='.$size.'';
            $string .= '&chd=t:'.$data.'';

            return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" />';
    }
    add_shortcode('chart', 'fyb_google_chart_shortcode');
}

?>