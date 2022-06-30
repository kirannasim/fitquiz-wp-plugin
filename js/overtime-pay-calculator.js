if(jQuery('#overtime_calculator_form').length > 0){
	jQuery(".datepicker").datepicker({
		beforeShow: function () {
			jQuery(".input-error").removeClass("input-error");
			jQuery(".input-error-message").hide();
		},
	});
	jQuery("#calculator_button").on("click",overtime_calculator);
    function overtime_calculator(quiz_id){
        var url = custom_vars.admin_url + 'admin-ajax.php';
        var data = jQuery("#overtime_calculator_form").serialize();
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data : {
                action : 'submit_calculator',
                data : data
            },
            beforeSend: function() {
                jQuery('.input-error-message').remove();
                jQuery('.input-error').removeClass('input-error');
                jQuery('#overtime_calculator_form').after('<div id="loading"><span>Calculating...</span></div>');
            },
            success: function( response ) {
            
                if ( response.status == false) {
                    jQuery('#' + response.input).addClass('input-error').parents('.col-sm-8').append(response.message);
                    jQuery('#' + response.input).focus();
                }

                if ( response.status == true ) {
                    
                    jQuery('#overtime_calculator_form').hide();
                    jQuery("#response").html(response.message);
                    jQuery("#response").show();
                    jQuery("#html").show();
                }

                jQuery('#loading').remove();
            }
        });
    };
}