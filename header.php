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
global $plug_url,$notice;

?> 

<link href="<?php echo $plug_url; ?>css/font-awesome.min.css" rel="stylesheet"/>
<link href="<?php echo $plug_url; ?>css/style.css" rel="stylesheet"/>
<script src="<?php echo $plug_url; ?>js/script.js"></script>
<div class="wrap">
	<?php echo $notice; ?>
	<h2>Funny Brandings</h2>
 
 	
		 <h2 id="navContainer" class="nav-tab-wrapper woo-nav-tab-wrapper">
			<a data-nav="general" class="nav-tab nav-tab-active"  >General</a>
			<a data-nav="login" class="nav-tab " >Login Page</a>
			<a data-nav="smtp"  class="nav-tab " >SMTP</a>
			 <a data-nav="shortcode"  class="nav-tab " >Shortcodes</a>
			<a data-nav="translations"  class="nav-tab " >Custom Translations</a>
		</h2>
	
	<form enctype="multipart/form-data" action="" id="mainform" method="post">
	<?php wp_nonce_field('update-options');  ?>