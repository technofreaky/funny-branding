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
<form method="post">
<table>
	<tr>
		<td>Existing Name </td>
		<td><?php echo $_REQUEST['fyb_cfld_name']; ?></td>
	</tr>
	<tr>
		<td>New Name</td>
		<td><input type="text" id="custom_field_new_name" name="custom_field_new_name" value="<?php echo $_REQUEST['fyb_cfld_name'];?>" data-exname="<?php echo $_REQUEST['fyb_cfld_name'];?>" /></td>
	</tr>
	<tr>
		<td> </td>
		<td><input name="fyb_cfch" type="button" class="button button-primary" id="UpdateCF" onclick="save_changes_pop();" value="Save Changes" />  </td>
	</tr>
	
</table>

</form>

<script>
    
function save_changes_pop() {
    var ExName = jQuery('input#custom_field_new_name').attr('data-exname');
    var NewName = jQuery('input#custom_field_new_name').val();
    if(ExName == NewName){
        console.log('NoChanges');
    } else {
      jQuery('div#editFiled div.fyb-model-body').append(loadingHTML);
    jQuery('div#editFiled div.fyb-model-body div.loader h4').text('Updating Database Please Wait');
        jQuery.ajax({
            type: "POST",
            url: location.href,
            data: { fyb_cfld_edited:"yes",fyb_cfched: 'true',fyb_cfnw_val : NewName,fyb_cfol:ExName }
        }).done(function( msg ) {
           jQuery('div#editFiled div.fyb-model-body div.loader').remove();
            if(msg.indexOf('success') != -1){
                jQuery('div#editFiled div.fyb-model-body').html('<h2>Changes Updated Successfully</h2> <h4>Please Re-Sync Data In Plugin </h4>');
            } else {
                jQuery('div#editFiled div.fyb-model-body').html('<h3>Failed To Updated Changes Due To : </h3><ul><li>1) Database Error </li> <li>2) Custom Filed Not Exist In The Given Name </li> </ul>');
            }


        }); 
    }
}

</script>