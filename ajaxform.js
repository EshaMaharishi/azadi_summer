jQuery(document).ready(function(){

    jQuery('.ajaxform').submit( function() {
		jQuery('#passcode').slideDown();
        $.ajax({
            url     : $(this).attr('action'),
            type    : $(this).attr('method'),
            data    : $(this).serialize()

        });

        return false;
    });

});