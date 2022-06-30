// ultimate_business_name_generator
if(jQuery('#ultimate_business_name_generator_form').length > 0){
    window.onload = function() {
        var form = jQuery("#ultimate_business_name_generator_form");
        jQuery("#gross_margin_markup_calculator_form input").change(function() {
            form.validate().element(this);
        });	// fire validate for each field
	}// end onload

    function check_before_submit_business_name_generator(el){
		var form = jQuery('#ultimate_business_name_generator_form');
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
					business_name_generator();
				}else{
				}
	        }// check if form is valid and submit

    function business_name_generator(){
        var url = custom_vars.admin_url + 'admin-ajax.php';
        var data = $j('#ultimate_business_name_generator_form').serialize();            

        jQuery.ajax({
            url : url,
            type : 'post',
            dataType: 'json',
            data : {
            action : 'submit_calculator',
            data : data,
            },

            beforeSend: function() {
                jQuery('#ultimate_business_name_generator_form').after('<div id="loading"><span>Calculating...</span></div>');
            },
            
            success : function(response) {
                jQuery('#ultimate_business_name_generator_form').hide();
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery('#loading').hide();
            }
        })
 	}
}