// gross_margin_markup_calculator
if(jQuery('#gross_margin_markup_calculator_form').length > 0){
    window.onload = function() {
        var form = jQuery("#gross_margin_markup_calculator_form");
        jQuery("#gross_margin_markup_calculator_form input").change(function() {
            form.validate().element(this);
        });	// fire validate for each field
    }// end onload

    function check_before_submit_margin_markup(el){
		var form = jQuery('#gross_margin_markup_calculator_form');
		form.validate({
		    errorPlacement: function(error, element){
			    if ( element.is(":radio") )
							{
								error.appendTo( element.parents('.radio_container') );
							}
							else
							{ // This is the default behavior
								error.insertAfter( element );
							}
					 }
				}).settings.ignore = ":disabled,:hidden";

				if( form.valid() ){
					margin_markup_calculate();
				}else{
				}
	}// check if form is valid and submit

    function margin_markup_calculate(){
			var url = custom_vars.admin_url + 'admin-ajax.php';
            var data = $j('#gross_margin_markup_calculator_form').serialize();
			 

            jQuery.ajax({
            url: url,
			type : 'post',
			dataType: 'json',
			data : {
			action : 'submit_calculator',
			data : data,
			},

            beforeSend: function() {
                jQuery('#gross_margin_markup_calculator_form').after('<div id="loading"><span>Calculating...</span></div>');
            },
            
			success : function(response) {
				jQuery('#gross_margin_markup_calculator_form').hide();
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery('#loading').hide();
			}
		})

 	}
}