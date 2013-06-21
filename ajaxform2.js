jQuery(document).ready(function(){

    jQuery('.ajaxform2').submit( function() {

        $.ajax({
            url     : $(this).attr('action'),
            type    : $(this).attr('method'),
            data    : $(this).serialize()

        });

        return false;
    });

});