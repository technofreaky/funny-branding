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
?>
<table id="scodes" class="fyb_table" cellspacing="5" cellpadding="5">
    <tbody>
        
        <tr>
            <th>Short Code</th>
            <td>
                <select id="fyb_scode_gen">
                    <option value="">Select A Shortcode </option>
                    <option data-show="tr#sc_url, tr#sc_w, tr#sc_h, tr#sc_alt" 
                            data-hide="tr#sc_field, tr#sc_fieldpid, tr#sc_google_trends_q, tr#sc_google_trends_geo" 
                            value="snap">Web Screenshot</option>
                    
                    <option data-show="tr#sc_url, tr#sc_w, tr#sc_h" 
                            data-hide="tr#sc_alt, tr#sc_field, tr#sc_fieldpid, tr#sc_google_trends_q, tr#sc_google_trends_geo" value="iframe">iframe</option>
                    
                    <option data-show="tr#sc_field, tr#sc_fieldpid" 
                            data-hide="tr#sc_url, tr#sc_w, tr#sc_h, tr#sc_alt, tr#sc_google_trends_q, tr#sc_google_trends_geo"  value="field">Custom Field</option>
                    <option data-show="tr#sc_google_trends_q, tr#sc_google_trends_geo, tr#sc_w, tr#sc_h" 
                            data-hide="tr#sc_url, tr#sc_alt, tr#sc_field, tr#sc_fieldpid" value="trends">Google Trends</option>
                    <option data-show="" data-hide="tr#sc_field, tr#sc_fieldpid, tr#sc_url, tr#sc_w, tr#sc_h, tr#sc_alt, tr#sc_google_trends_q, tr#sc_google_trends_geo" value="chart">Google charts</option>
                    <option data-show="tr#sc_field" 
                            data-hide="tr#sc_fieldpid, tr#sc_url, tr#sc_w, tr#sc_h, tr#sc_alt, tr#sc_google_trends_q, tr#sc_google_trends_geo" value="bloginfo" >Blog Info</option>
                    <option data-show="" data-hide="tr#sc_field, tr#sc_fieldpid, tr#sc_url, tr#sc_w, tr#sc_h, tr#sc_alt, tr#sc_google_trends_q, tr#sc_google_trends_geo" value="show_ip">Get User IP</option>
                </select>
            </td>
        </tr>
        
        
    </tbody>

</table> 
<table class="fyb_table" id="scodes_options" cellspacing="5" cellpadding="5" >
    <tbody>
        
        <tr id="sc_url">
            <th>URL</th>
            <td><input class="scodegen" type="text" id="sc_url" /></td> 
        </tr>     
        
         <tr id="sc_w">
            <th>Width</th>
            <td><input data-number="yes"  class="scodegen" type="text" id="sc_w" /> (enter values in "px". do not add "px" at the end)</td> 
        </tr>      
        <tr id="sc_h">
            <th>Height</th>
            <td><input data-number="yes" class="scodegen" type="text" id="sc_h" /> (enter values in "px". do not add "px" at the end)</td> 
        </tr>  
        <tr id="sc_alt">
            <th>Alt Text</th>
            <td><input class="scodegen" type="text" id="sc_alt" /></td> 
        </tr>  
        
        <tr id="sc_field">
            <th>Field Name</th>
            <td><input class="scodegen" type="text" id="sc_field" /></td> 
        </tr>         
        
        <tr id="sc_fieldpid">
            <th>Post ID</th>
            <td><input data-number="yes"  class="scodegen" type="text" id="sc_fieldpid" /></td> 
        </tr>  
        
        <tr id="sc_google_trends_q">
            <th>Google Trends Query</th>
            <td><input class="scodegen" type="text" id="sc_google_trends_q" /> (Enter Keyword by comma seperted "wordpress,billgates")</td> 
        </tr>  
        
        <tr id="sc_google_trends_geo">
            <th>Google Trends Geo Location</th>
            <td><input class="scodegen" type="text" id="sc_google_trends_geo" /> (Enter Geo Location Eg : "US") </td> 
        </tr>          
    </tbody>

</table>  
<table id="scodes_result" class="fyb_table" cellspacing="5" cellpadding="5">
    <tbody>
        <tr>
            <th>Generated Short Code </th>
            <td><textarea row="20" cols="100" id="shortcodeResult"></textarea></td> 
        </tr>     
           
    </tbody> 
</table>

<style>
.fyb_table th{text-align:left;}
</style>

<script>
    function shortCodeGenerator(scselect,sc,scop,scrs) {
        var selected = scselect.val(); 
        var gen_scode = '';
        var sc_url = jQuery('input#sc_url');
        var sc_w = jQuery('input#sc_w');
        var sc_h = jQuery('input#sc_h');
        var sc_alt = jQuery('input#sc_alt ');
        var sc_field = jQuery('input#sc_field');
        var sc_fieldpid = jQuery('input#sc_fieldpid');
        var sc_google_trends_q = jQuery('input#sc_google_trends_q');
        var sc_google_trends_geo = jQuery('input#sc_google_trends_geo');
        var result = jQuery('textarea#shortcodeResult');
        
        if(selected == 'snap') {
            var url = sc_url.val();
            var w = sc_w.val()+'px';
            var h = sc_h.val()+'px';
            var alt = sc_alt.val();
            result.html('[snap url="'+url+'" alt="'+alt+'" w="'+w+'" h="'+h+'"]');
        }
        
        if(selected == 'iframe') {
            var url = sc_url.val();
            var w = sc_w.val();
            var h = sc_h.val();
            result.html('[iframe url="'+url+'" w="'+w+'" h="'+h+'"]');
        }
        
        
        if(selected == 'field') {
            var fname = sc_field.val();
            var pid = sc_fieldpid.val(); 
            if(pid) {
                result.html('[field "'+fname+'" post_id='+pid+']');
            } else {
                result.html('[field "'+fname+'"]');
                
            }
            
        }  

        if(selected == 'bloginfo') {
            var fname = sc_field.val();  
            result.html('[bloginfo  key="'+fname+'"]');
        }  
        
        if(selected == 'show_ip') { 
            result.html('[show_ip]');
        }        
          
        if(selected == 'chart') { 
            result.html('[chart data="41,37.89" labels="Reffering+sites|Search+Engines" colors="ff0000,005599" size="488x200" title="Traffic Sources" type="pie"]');
        }    
        
        if(selected == 'trends') {
            var query = sc_google_trends_q.val();
            var geo = sc_google_trends_geo.val();
            var w = sc_w.val();
            var h = sc_h.val();
            result.html('[trends h="'+h+'" w="'+w+'" q="'+query+'" geo="'+geo+'"]');
        }        
        
        
        
    }
    
    
    jQuery(document).ready(function($){
        var sc = $('table#scodes');
        var scop = $('table#scodes_options');
        var scrs = $('table#scodes_result');
        var scselect = $('select#fyb_scode_gen');
        scop.hide();
        
    
        scselect.change(function(){
            scop.fadeIn().next().fadeIn();
            scrs.fadeIn();
            var value = $(this).val(); 
            var show = $(this).find(':selected').attr('data-show');
            var hide = $(this).find(':selected').attr('data-hide');
            $(show).fadeIn();
            $(hide).hide();
            shortCodeGenerator(scselect,sc,scop,scrs);
        });
        
        $('input[data-number]').keydown(function (e) {
            $('tr#'+$(this).parent().parent().attr('id') + ' small.fyb_erromsg').remove();
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
                     return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                $( '<small class="fyb_erromsg" style="margin:0 10px;color:red;display:none;">Only Numbers Allowed </small>' ).insertAfter(this ); 
                $('small.fyb_erromsg').fadeIn('slow',function(){
                    $(this).fadeOut(4000);
                });
                e.preventDefault();
            }
        });
        
        
        $('input[type=text]').change(function(){
            shortCodeGenerator(scselect,sc,scop,scrs);
        });
        
        $('input[type=text]').keyup(function(){
            shortCodeGenerator(scselect,sc,scop,scrs);
        });       
    });
</script>


