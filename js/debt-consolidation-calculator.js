// debt_consolidation_calculator
if(jQuery('#debt_consolidation_calculator_form').length > 0){
    jQuery(document).ready(function($j){

        jQuery('#debt_consolidation_calculator_form input').on('blur', function(){
            jQuery(this).removeClass('input-error');
            jQuery(this).parent().siblings('.input-error-message').remove();
        });

        jQuery('#calculate_form').on('click', function(e){
            e.preventDefault();

            jQuery.ajax({
                url: custom_vars.admin_url+'admin-ajax.php',
                type: 'POST',
                dataType: 'JSON',
                data : {
                    action: 'submit_calculator',
                    data : jQuery("#debt_consolidation_calculator_form").serialize()
                },
                beforeSend: function() {
                    jQuery('.input-error-message').remove();
                    jQuery('.input-error').removeClass('input-error');
                    jQuery('#debt_consolidation_calculator_form').after('<div id="loading"><span>Calculating...</span></div>');
                },
                success: function( response ) {
                    if ( response.status == false) {
                        if (response.input) {
                            jQuery('#' + response.input).addClass('input-error').parents('.form-group').append(response.message);
                            jQuery('#' + response.input).focus();
                        }   
                        jQuery('input').addClass('input-error').parents('.form-group');
                        jQuery("#response").html(response.message);
                    }

                    if ( response.status == true ) {
                        jQuery('#debt_consolidation_calculator_form').remove();
                        jQuery("#response").html(response.message);
                        jQuery("#response").show();
                        jQuery("#html").show();
                    }

                    jQuery('#loading').remove();
                }
            });
        });

    });
}