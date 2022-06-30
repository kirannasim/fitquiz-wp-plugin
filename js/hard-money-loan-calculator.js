// hard-money-loan-calculator
if(jQuery('#hard-money-loan-calculator_form').length > 0){
    var slider_points_charged = document.getElementById("points_charged");
    var output_points_charged_label = document.getElementById("points_charged_label");
    output_points_charged_label.innerHTML = slider_points_charged.value + "%";
    slider_points_charged.oninput = function() {
        output_points_charged_label.innerHTML = this.value + "%";
    }

    var slider_interest_rate = document.getElementById("interest_rate");
    var output_interest_rate_label = document.getElementById("interest_rate_label");
    output_interest_rate_label.innerHTML = slider_interest_rate.value + "%";
    slider_interest_rate.oninput = function() {
        output_interest_rate_label.innerHTML = this.value + "%";
    }

    var slider = document.getElementById("lender_fund");
    var output = document.getElementById("lender_fund_label");
    output.innerHTML = slider.value + "%";
    slider.oninput = function() {
    output.innerHTML = this.value + "%";
    }

    var slider_loan_need = document.getElementById("loan_need");
    var output_loan_need = document.getElementById("loan_need_label");
    output_loan_need.innerHTML = slider_loan_need.value;
    slider_loan_need.oninput = function() {
    output_loan_need.innerHTML = this.value;
    }

    window.onload = function() {
    var form = $j("#hard-money-loan-calculator_form");
    $j("#hard-money-loan-calculator_form input").change(function() {
        form.validate().element(this);
    });	// fire validate for each field
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
                form_submit();
            }else{
            }
    }// check if form is valid and submit

    function form_submit(){
        var url = custom_vars.admin_url+'admin-ajax.php';
        var data = $j('#hard-money-loan-calculator_form').serialize();
        $j.ajax({
            url : url,
            type : 'post',
            dataType: 'json',
            data : {
            action : 'submit_calculator',
            data : data,
            },
            success : function(response) {
                        $j("#response").html(response.message);
                        $j("#response").show();
                        $j("#html").show();

                        if(!submitted && view_id > 0){
                            if(!started){
                                started = true;
                                quiz_start(view_id);
                            }// in case user don't edit the form we send the start event
                            quiz_submit_calculator(view_id);
                            submitted = true;
                        }// submitted api
            }
        })
    }
}