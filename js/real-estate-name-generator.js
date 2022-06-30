// real_estate_name_generator
if(jQuery('#real_estate_name_generator_form').length > 0){
    window.onload = function() {
        var form = jQuery("#real_estate_name_generator_form");
        jQuery("#real_estate_name_generator_form input").change(function() {
            form.validate().element(this);
        });	// fire validate for each field
	}// end onload

    function check_before_submit_real_estate_name_generator(el){
		var form = jQuery('#real_estate_name_generator_form');
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
					real_estate_name_generator();
				}else{
				}
    }// check if form is valid and submit

    function real_estate_name_generator(){
        var url = custom_vars.admin_url + 'admin-ajax.php';
        var data = $j('#real_estate_name_generator_form').serialize();

        jQuery.ajax({
            url : url,
            type : 'post',
            dataType: 'json',
            data : {
            action : 'submit_calculator',
            data : data,
            },

            beforeSend: function() {
                jQuery('#real_estate_name_generator_form').after('<div id="loading"><span>Calculating...</span></div>');
            },
            
            success : function(response) {
                // jQuery('#real_estate_name_generator_form').hide(); 
                jQuery("#response").html(response.message);
                jQuery("#response tr").slice(5).hide();
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery('#loading').hide();
                jQuery(".real-estate-name-gen_btn").html('GENERATE MORE NAMES');
                jQuery("#real-estate-name-gen_btn--back").show();
            }
        })
    }

    
    function real_estate_name_gen_back_btn(e) {
        jQuery("#response").hide();
        jQuery(".real-estate-name-gen_btn").html('GENERATE');
        jQuery("#real-estate-name-gen_btn--back").hide();
    }

}