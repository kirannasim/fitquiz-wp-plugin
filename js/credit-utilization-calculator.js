// credit_card_calculator
if(jQuery('#credit_utilization_calculator_form').length > 0){
    function check_before_submit_credit(el){
        var form = jQuery('#credit_utilization_calculator_form');
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
                credit_calculate();
            }else{
            }
    }// check if form is valid and submit

    function credit_calculate(){
         var url = custom_vars.admin_url + 'admin-ajax.php';
         var cards =  []; // my array
            jQuery('.repeater_group').each(function(i, obj) {
             var credit = jQuery(this).find('.credit_input:eq( 0 )').val();
             var balance = jQuery(this).find('.credit_input:eq( 1 )').val();
             var card = {
                     credit: credit,
                     balance: balance
             }
             cards.push(card);
         });


        


         jQuery.ajax({
            url : url,
            type : 'post',
            dataType: 'json',
            data : {
            action : 'submit_calculator',
            data : jQuery('#credit_utilization_calculator_form').serialize()
            },
            beforeSend: function() {
                $j('#credit_utilization_calculator_form').after('<div id="loading"><span>Calculating...</span></div>');
            },
            success : function(response) {
                jQuery('#credit_utilization_calculator_form').hide();
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery('#loading').hide();
            }
         })



    }

    window.onload = function() {
        var form = jQuery("#credit_card_calculator");
        jQuery("#credit_card_calculator input").change(function() {
            form.validate().element(this);
        });	// fire validate for each field
    }// end onload
}