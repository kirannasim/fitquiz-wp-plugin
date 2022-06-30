// residential_rental_property_depreciation_calculator
if(jQuery('#residential_rental_property_depreciation_calculator_form').length > 0){
    window.onload = function() {
        var form = jQuery("#residential_rental_property_depreciation_calculator_form");
        jQuery("#gross_margin_markup_calculator_form input").change(function() {
            form.validate().element(this);
        });	// fire validate for each field
	}// end onload

    function check_before_submit_property_depreciation(el){
		var form = jQuery('#residential_rental_property_depreciation_calculator_form');
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
					property_depreciation_calculate();
				}else{
				}
	        }// check if form is valid and submit

    function property_depreciation_calculate(){
        var url = custom_vars.admin_url + 'admin-ajax.php';
        var data = $j('#residential_rental_property_depreciation_calculator_form').serialize();			 

        jQuery.ajax({
            url : url,
            type : 'post',
            dataType: 'json',
            data : {
            action : 'submit_calculator',
            data : data,
            },

            beforeSend: function() {
                jQuery('#residential_rental_property_depreciation_calculator_form').after('<div id="loading"><span>Calculating...</span></div>');
            },
            
            success : function(response) {
                jQuery('#residential_rental_property_depreciation_calculator_form').hide();
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery('#loading').hide();
            }
        })
    }
}