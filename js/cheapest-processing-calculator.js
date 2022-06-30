if(jQuery('#cheapest_processing_calculator_form').length > 0){
    function cheapest_processing_calculator(){
        var url = custom_vars.admin_url + 'admin-ajax.php';
        var data = jQuery('#cheapest_processing_calculator_form').serialize();
        jQuery.ajax({
            url : url,
            type : 'post',
            dataType: 'json',
            data : {
                    action : 'submit_calculator',
                    data : data,
            },
            beforeSend: function() {
                jQuery('.input-error-message').remove();
                jQuery('.input-error').removeClass('input-error');
                jQuery('#cheapest_processing_calculator_form').hide();
                jQuery('#cheapest_processing_calculator_form').after('<div id="loading"><span>Calculating...</span></div>')
            },
            success : function(response) {

                if (response.status == false) {
                    if ( response.input == 'error' ) {
                        jQuery('#cheapest_processing_calculator_form').after(response.message);
                    }
                    jQuery('#' + response.input).addClass('input-error').parents('.form-group');
                    jQuery('#' + response.input).after(response.message);
                    jQuery('#' + response.input).focus();
                    jQuery('#cheapest_processing_calculator_form').show();
                }

                if (response.status == true) {

                    jQuery('#cheapest_processing_calculator_form').remove();
                    jQuery("#response").html(response.message);
                    jQuery("#response").show();
                    jQuery("#html").show();
                }

                jQuery('#loading').remove();
            }
        })
    }
}