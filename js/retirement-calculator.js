// retirement_calculator
if(jQuery('#retirement_calculator_form').length > 0){
    window.onload = function() {
        var form = $j("#retirement_calculator_form");
        $j("#retirement_calculator_form input").change(function() {
            form.validate().element(this);
        });	// fire validate for each field


        form.change(function() {
            var elements = $j("#retirement_calculator_form input");
            var counter = 0;
            for (var i = 0; i < elements.length; i++) {
                    if(elements[i].value != "") {
                    counter ++;
                    }
                    if(counter == elements.length){
                        // check_before_submit_form(form);
                    }
            }
        });	// check when form is complete

        // validate age
        $j("#input_1").change(function() {
            var age = $j(this).val();
            $j("#input_2").attr({
        "min" : parseInt(age)+1
            });
        });	// check when form is complete

    }// end onload

    function check_before_submit_form(el){
        var form = $j(el).closest('form');
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
                retirement_calculate();
            }else{
            }
    }// check if form is valid and submit
}