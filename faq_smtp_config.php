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
$fyb_spcgqa = array();
$fyb_spcgqa['Use SMTP'] = 'Enable to send email using smtp';
$fyb_spcgqa['SMTP is HTML'] = 'Enable to send email as html email';
$fyb_spcgqa['SMTP Auth'] = 'Enable to set SMTP Authentication True';
$fyb_spcgqa['SMTP Host'] = 'Enter the SMTP Host To Connect Email Server';
$fyb_spcgqa['SMTP port'] = 'Enter the SMTP Port To Connect Email Server';
$fyb_spcgqa['SMTP Username'] = 'Enter Your Email ID';
$fyb_spcgqa['SMTP Password'] = 'Enter Your Email ID Password';
$fyb_spcgqa['SMTP Secure Type'] = 'Enter Secure Type Like [tls,ssl]';
$fyb_spcgqa['SMTP From ID'] = 'Enter An Email ID In Which The Email Has To Be Sent';
$fyb_spcgqa['SMTP From Name'] = 'Enter A Name In Which The Email Has To Be Sent';
$fyb_faq_array['SMTP Config'] = $fyb_spcgqa;
?>