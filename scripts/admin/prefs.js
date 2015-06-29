/**
 * Created by gopi on 3/31/15.
 */
$(document).ready(function(){
    $('#updatePrefsForm').validate({

        //validation rules here

        submitHandler: function(form) {
            $.ajax({
                url: 'admin/prefs/updatePrefs',
                //data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    alert("Preferences updated!")
                }


            });
        }
    });
});