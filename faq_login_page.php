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
global $fyb_faq_array;
$fyb_lpqa = array();

$fyb_lpqa['Disable Shake Effect'] = 'Remove\'s The Shake effect when used wrong credentials while login-in';
$fyb_lpqa['Login Redirect URL'] = 'Redirect user after successful login to any part of wordpress by providing the whole url <code>http://www.example.com/?p=30</code> or <code>http://www.example.com/cateogry/my-post</code> or <code>http://www.example.com/wp-admin/post-new.php</code>';
$fyb_lpqa['Registration Success Redirect URL '] = 'Redirect user after successful registration to any part of wordpress by providing the whole url <code>http://www.example.com/?p=30</code> or <code>http://www.example.com/cateogry/my-post</code> or <code>http://www.example.com/wp-admin/post-new.php</code>';

$fyb_lpqa['Auto Logout Time '] = 'You can change the Auto logout time. values to be entered in seconds for Eg: <code>60 = 1 Minute</code>';
$fyb_lpqa['Login Page Style  '] = 'You can add your own style for login page.. Note : do not add <code>&lt;style&gt; &lt;/style&gt;</code> tag. it will be automaticaly added <br/>
To Change login logo please add the below css code. <br/> 
<code>.login h1 a {<br/>
    background-image: none, url("< your image location >");<br/>
    background-position: center top;<br/>
    background-repeat: no-repeat;<br/>
    background-size: 84px auto;<br/>
    height: 84px;  width: 84px;<br/>
    display: block; line-height: 1.3em;<br/>
    margin: 0 auto 25px;<br/>
}
</code><br/>
replace <strong>< your image location ></strong> With your logo url </strong>';
$fyb_lpqa['Use jQuery In Login Page'] = 'If enabled adds jquery library to login page.';
$fyb_lpqa['Login Page Script'] = 'You can add your own javascript / jQuery code for login page.. Note : do not add <code>&lt;script&gt; &lt;/script&gt;</code> tag. it will be automaticaly added'; 
$fyb_faq_array['Login Page'] = $fyb_lpqa;
?>