if(jQuery('#wci_cost_calculator_form').length > 0){
    function wci_cost_calculator(){
        var url = custom_vars.admin_url + 'admin-ajax.php';
        var data = jQuery('#wci_cost_calculator_form').serialize();
        jQuery.ajax({
            url:url,
            type : 'post',
            dataType: 'json',
            data : {
                    action : 'submit_calculator',
                    data : data,
            },
            beforeSend: function() {
                jQuery('.input-error-message').remove();
                jQuery('.input-error').removeClass('input-error');
                jQuery('#wci_cost_calculator_form').after('<div id="loading"><span>Calculating...</span></div>')
            },
            success : function(response) {

                if (response.status == false) {
                    jQuery('#' + response.input).addClass('input-error').parents('.form-group')
                        .append(response.message);
                    jQuery('#' + response.input).focus();
                }

                if (response.status == true) {

                    jQuery('#wci_cost_calculator_form').hide();
                    jQuery("#response").html(response.message);
                    jQuery("#response").show();
                    jQuery("#html").show();
                }

                jQuery('#loading').hide();
            }
        })
    }
}