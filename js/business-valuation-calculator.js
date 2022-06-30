// business-valuation-calculator
if(jQuery('#business_valuation_calculation_form').length > 0){
    jQuery(document).ready(function($j){

        $j('#business_valuation_calculation_form input').on('blur', function(){
            $j(this).removeClass('input-error');
            $j(this).parent().siblings('.input-error-message').remove();
        });

        $j('#calculate_form').on('click', function(e){
            e.preventDefault();

            $j.ajax({
                url: custom_vars.admin_url+'admin-ajax.php',
                type: 'POST',
                dataType: 'JSON',
                data : {
                    action: 'submit_calculator',
                    data : $j("#business_valuation_calculation_form").serialize()
                },
                beforeSend: function() {
                    $j('.input-error-message').remove();
                    $j('.input-error').removeClass('input-error');
                    $j('#business_valuation_calculation_form').after('<div id="loading"><span>Calculating...</span></div>');
                },
                success: function( response ) {
                    if ( response.status == false) {
                        $j('#' + response.input).addClass('input-error').parents('.form-group').append(response.message);
                        $j('#' + response.input).focus();
                    }

                    if ( response.status == true ) {
                        $j('#business_valuation_calculation_form').remove();
                        $j("#response").html(response.message);
                        $j("#response").show();
                        $j("#html").show();
                    }

                    $j('#loading').remove();
                }
            });
        });

    });
}