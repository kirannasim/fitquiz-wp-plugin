if(jQuery('#bofa_chase_basic_calculator_form').length > 0){
    function bofa_chase_basic_calculator(quiz_id){
        var url = custom_vars.admin_url + 'admin-ajax.php';
        var data = jQuery('#bofa_chase_basic_calculator_form').serialize();
        jQuery.ajax({
            url : url,
            type : 'post',
            dataType: 'json',
            data : {
                    action : 'submit_calculator',
                    data : data,
            },
            beforeSend: function() {
                jQuery('#bofa_chase_basic_calculator_form .input-error-message').remove();
                jQuery('#bofa_chase_basic_calculator_form .input-error').removeClass('input-error');
                jQuery('#bofa_chase_basic_calculator_form').hide();
                jQuery('#bofa_chase_basic_calculator_form').after('<div id="loading-'+ quiz_id +'"><span>Calculating...</span></div>')
            },
            success : function(response) {

                if (response.status == false) {
                    jQuery('#bofa_chase_basic_calculator_form #' + response.input).addClass('input-error').parents('.form-group')
                        .append(response.message);
                    jQuery('#bofa_chase_basic_calculator_form #' + response.input).focus();
                    jQuery('#bofa_chase_basic_calculator_form').show();
                }

                if (response.status == true) {

                    jQuery('#bofa_chase_basic_calculator_form').hide();
                    jQuery("#response-" + quiz_id).html(response.message);
                    jQuery("#response-" + quiz_id).show();
                    jQuery("#html-" + quiz_id).show();
                }

                jQuery('#loading-' + quiz_id).hide();
            }
        })
    }
}