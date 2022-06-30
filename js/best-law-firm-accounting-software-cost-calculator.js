if(jQuery('#blfasc_calculator_form').length > 0){
    function blfasc_calculator(){
        jQuery.ajax({
            url:custom_vars.admin_url+'admin-ajax.php',
            type : 'post',
            dataType: 'json',
            data : {
                    action : 'submit_calculator',
                    data : jQuery('#blfasc_calculator_form').serialize(),
            },
            beforeSend: function() {
                jQuery('.input-error-message').remove();
                jQuery('.input-error').removeClass('input-error');
                jQuery('#blfasc_calculator_form').after('<div id="loading"><span>Calculating...</span></div>')
            },
            success : function(response) {

                if (response.status == false) {
                    jQuery('#' + response.input).addClass('input-error').parents('.form-group')
                        .append(response.message);
                    jQuery('#' + response.input).focus();
                }

                if (response.status == true) {

                    jQuery('#blfasc_calculator_form').remove();
                    jQuery("#response").html(response.message);
                    jQuery("#response").show();
                    jQuery("#html").show();
                }

                jQuery('#loading').remove();
            }
        })
    }
}